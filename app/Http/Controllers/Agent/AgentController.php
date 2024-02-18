<?php

namespace App\Http\Controllers\Agent;

use App\Domains\Auth\Models\User;
use App\Http\Controllers\Controller;
use App\Models\AgentSetting;
use App\Models\Balance;
use App\Models\Debit;
use App\Models\Transaction;
use App\Models\Withdraw;
use App\Models\WithdrawProve;
use App\Models\WithdrawRequest;
use Illuminate\Http\Request;

use function PHPUnit\Framework\returnSelf;

class AgentController extends Controller
{
    /**
     * method for display all agents
     */
    public function index()
    {
        $agents = User::query()->where('register_for', 'এজেন্ট')->get();
        return view('agents.index', compact('agents'));
    }

    /**
     * method for update status of agents
     * @param Request $request
     * @param User $agent
     */
    public function update(Request $request, User $agent)
    {
        $status = $request->status;
        $update_staus = null;
        if ($status == 1) {
            $update_staus = 0;
        } else {
            $update_staus = 1;
        }
        $response = $agent->update(['status' => $update_staus]);
        return back()->withFlashSuccess('Status update successfully');
    }

    /**
     * method for generate unique link for registered.
     */
    public function linkGenerate()
    {
        $unique_id = auth()->user()->id;
        $encoded_id = base64_encode($unique_id);
        $link = route('frontend.auth.client.register', ['id' => $encoded_id]);
        return view('agents.links.link-generate', compact('link'));
    }

    /**
     * method for getting all clients of agent
     */
    public function agnetClient()
    {
        $setting = AgentSetting::query()->first();
        $clients = User::query()->with('agent_client', fn ($query) => $query->with('user', fn ($query) => $query->with('balance', fn ($query) => $query->with('debit', fn ($query) => $query->where('withdraw_status', 0)))))
            ->where('id', auth()->user()->id)->first();
        $agent_clients = User::query()->with('agent_client')->where('id', auth()->user()->id)->first();
        $client_count = $agent_clients->agent_client->count();

        $total_debit = 0;
        $processing = null;
        $requested_client = null;
        foreach ($clients->agent_client as $each) {
            if (!is_null($each->user) && !is_null($each->user->balance) && !is_null($each->user->balance->debit)) {
                $total_debit += collect($each->user?->balance?->debit->where('withdraw_status', '0'))->sum('amount');

                foreach ($each->user->balance->debit as $debit) {
                    $requested_client = $debit->where('withdraw_status', '0')->select('id')->get();
                    $processing = $debit->where('withdraw_status', 'processing')->select('id', 'amount')->get();
                }
            }
        }

        return view('agents.links.clients', compact('clients', 'setting', 'processing', 'total_debit', 'requested_client', 'client_count'));
    }

    /**
     * method for withdraw money of agent
     * @param Request $request
     */
    public function withdraw(Request $request)
    {
        $withdraw = Withdraw::create([
            'user_id' => auth()->user()->id,
            'requested_amount' => $request->amount,
            'status' => 'pending',
        ]);

        $detail = WithdrawRequest::create([
            'withdraw_id' => $withdraw->getKey(),
            'method' => $request->method,
            'phone' => $request->phone,
            'comments' => $request->comments
        ]);

        foreach ($request->debit_id as $id) {
            $ids[] = $id;
            $records[] = [
                'withdraw_id' => $withdraw->getkey(),
                'debit_id' => $id,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }
        $withdrawTransaction = Transaction::insert($records);
        Debit::query()->whereIn('id', $ids)->update(['withdraw_status' => 'processing']);
        return back();
    }

    /**
     * method for getting withdraw request
     */
    public function withDrawRequest()
    {
        $withdrawRequest = Withdraw::query()
            ->with('user')
            ->with('withdrawProve')
            // ->where('status', 'pending')
            ->with('transaction')
            ->with('withdrawRequest')
            ->get();

        // return $withdrawRequest;

        return view('agents.links.withdraw-request', compact('withdrawRequest'));
    }

    /**
     * method for withDrawRequestExecute
     * @param $id(withdraws table primary key)
     */
    public function withDrawRequestExecute($id)
    {
        $withdrawRequest = Withdraw::query()->where('id', $id)
            ->where('status', 'pending')
            ->with('transaction')
            ->first();

        $transactions = null;
        $ids = null;
        foreach ($withdrawRequest->transaction as $transaction) {
            $transactions = $transaction->select('debit_id')->get();
        }

        foreach ($transactions as $t) {
            $ids[] = $t->debit_id;
        }

        $balance = Debit::query()->whereIn('id', $ids)->update(['withdraw_status' => 1]);
        Withdraw::where('id', $id)->update(['status' => 'approved']);

        return back();
    }

    /**
     * method for withdraw prove add page
     */
    public function withdrawProve($id)
    {
        $withdraw_prove = WithdrawProve::query()->where('withdraw_id',$id)->first();
        return view('agents.withdraw.prove', compact('withdraw_prove','id'));
    }

    /**
     * method for withdraw prove store
     * @param Request $request
     */
    public function withdrawProveStore(Request $request)
    {
        $withdraw_prove = WithdrawProve::updateOrCreate(
            ['withdraw_id' => $request->withdraw_id],
            ['prove' => $request->prove]
        );
        return redirect(route('admin.agent.withdrawRequest'))->withFlashSuccess('Prove Added Successfull');
    }
}
