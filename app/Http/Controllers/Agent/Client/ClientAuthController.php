<?php

namespace App\Http\Controllers\Agent\Client;

use App\Domains\Auth\Models\User;
use App\Rules\Captcha;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Http\Controllers\Controller;
use App\Models\AgentsClient;
use Hash;
use LangleyFoxall\LaravelNISTPasswordRules\PasswordRules;

class ClientAuthController extends Controller
{
    /**
     * method for generate unique link for registered.
     */
    public function register()
    {
        return view('agents.clients.register');
    }

    /**
     * method for registed a new agent's client as user.
     * @return Request $request
     */
    public function registered(Request $request)
    {
        $agent_id = base64_decode($request->agent_id);
        $validated = $request->validate(
            [
                'name' => ['required', 'string', 'max:100'],
                'phone' => ['required', 'string', 'max:100'],
                'register_for' => ['required', 'string', 'max:100'],
                'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')],
                'password' => array_merge(['max:100'], PasswordRules::register($data['email'] ?? null)),
                'terms' => ['required', 'in:1'],
                'g-recaptcha-response' => ['required_if:captcha_status,true', new Captcha],
            ],
            [
                'terms.required' => __('You must accept the Terms & Conditions.'),
                'g-recaptcha-response.required_if' => __('validation.required', ['attribute' => 'captcha']),
            ]
        );

        if ($validated == true) {
            $user = User::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'register_for' => $request->register_for,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'terms' => $request->terms,
            ]);

            if (!empty($user)) {
                $agentClient = AgentsClient::create(['agent_id' => $agent_id, 'client_id' => $user->getKey()]);
            }
        }

        return redirect(route('frontend.auth.login'));
    }
}
