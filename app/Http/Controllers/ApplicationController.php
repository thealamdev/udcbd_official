<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\Balance;
use App\Models\Blog;
use App\Models\CertificatePrice;
use App\Models\Debit;
use App\Models\District;
use App\Models\Division;
use App\Models\Oarish;
use App\Models\PrintHistory;
use App\Models\TradeLicense;
use App\Models\Union;
use App\Models\UnionInfo;
use App\Models\Upzilla;
use App\Models\UserInfo;
use App\Models\Uttoradhikar;
use App\Models\VoterInfoCorrection;
use App\Models\VoterMigration;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ApplicationController extends Controller
{
    public function application_for_sanad(Request $request)
    {
        // dd($request->applied_union_id);
        // dd(implode(',', $request->post_code_1));

        $sanad = Blog::find($request->sanad_id);
        $union_info = UnionInfo::find($request->applied_union_id);
        if ($union_info) {
            if ($sanad->description == 'উত্তরাধিকার সনদ') {
                $uttoradhikar = new Uttoradhikar;
                $uttoradhikar->sanad_id = $request->sanad_id;
                $uttoradhikar->chairman_name = $request->chairman_name;
                $uttoradhikar->dead_person_name = $request->dead_person_name;
                $uttoradhikar->dead_person_father_husband_name = $request->dead_person_father_husband_name;
                $uttoradhikar->dead_person_mother_name = $request->dead_person_mother_name;
                $uttoradhikar->dead_person_village = $request->dead_person_village;
                $uttoradhikar->dead_person_union = $request->dead_person_union;
                $uttoradhikar->dead_person_upazilla = $request->dead_person_upazilla;
                $uttoradhikar->dead_person_zilla = $request->dead_person_zilla;
                $uttoradhikar->no = implode(',', $request->no);
                $uttoradhikar->rnid = implode(',', $request->rnid);
                $uttoradhikar->rbirth = implode(',', $request->rbirth);
                $uttoradhikar->rcom = implode(',', $request->rcom);
                $uttoradhikar->u_name = implode(',', $request->o_name);
                $uttoradhikar->relation = implode(',', $request->o_relation);
                $uttoradhikar->save();
            }
            if ($sanad->description == 'ওয়ারিশ সনদ') {
                $oarish = new Oarish;
                $oarish->sanad_id = $request->sanad_id;
                $oarish->chairman_name = $request->chairman_name;
                $oarish->dead_person_name = $request->dead_person_name;
                $oarish->dead_person_father_husband_name = $request->dead_person_father_husband_name;
                $oarish->dead_person_mother_name = $request->dead_person_mother_name;
                $oarish->dead_person_village = $request->dead_person_village;
                $oarish->dead_person_union = $request->dead_person_union;
                $oarish->dead_person_upazilla = $request->dead_person_upazilla;
                $oarish->dead_person_zilla = $request->dead_person_zilla;
                $oarish->no = implode(',', $request->no);

                $oarish->rnid = implode(',', $request->rnid);
                $oarish->rbirth = implode(',', $request->rbirth);
                $oarish->rcom = implode(',', $request->rcom);
                $oarish->o_name = implode(',', $request->o_name);
                $oarish->o_relation = implode(',', $request->o_relation);
                $oarish->save();
            }
            if ($sanad->description == 'পারিবারিক সনদ') {
                $oarish = new Oarish;
                $oarish->sanad_id = $request->sanad_id;
                $oarish->chairman_name = $request->chairman_name;
                $oarish->dead_person_name = $request->dead_person_name;
                $oarish->dead_person_father_husband_name = $request->dead_person_father_husband_name;
                $oarish->dead_person_mother_name = $request->dead_person_mother_name;
                $oarish->dead_person_village = $request->dead_person_village;
                $oarish->dead_person_union = $request->dead_person_union;
                $oarish->dead_person_upazilla = $request->dead_person_upazilla;
                $oarish->dead_person_zilla = $request->dead_person_zilla;
                $oarish->no = implode(',', $request->no);
                $oarish->rnid = implode(',', $request->rnid);
                $oarish->rbirth = implode(',', $request->rbirth);
                $oarish->rcom = implode(',', $request->rcom);
                $oarish->o_name = implode(',', $request->o_name);
                $oarish->o_relation = implode(',', $request->o_relation);
                $oarish->save();
            }

            if ($sanad->description == 'জাতীয় পরিচয় তথ্য সংশোধন') {
                $voterinfo = new VoterInfoCorrection;
                $voterinfo->sanad_id = $request->sanad_id;
                // $voterinfo->first_name = $request->first_name;
                $voterinfo->second_name = $request->second_name;
                $voterinfo->second_nid = $request->second_nid;
                $voterinfo->b1 = $request->b1;
                $voterinfo->b2 = $request->b2;
                $voterinfo->b3 = $request->b3;
                $voterinfo->e1 = $request->e1;
                $voterinfo->e2 = $request->e2;
                $voterinfo->e3 = $request->e3;
                $voterinfo->f1 = $request->f1;
                $voterinfo->f2 = $request->f2;
                $voterinfo->f3 = $request->f3;
                $voterinfo->m1 = $request->m1;
                $voterinfo->m2 = $request->m2;
                $voterinfo->m3 = $request->m3;
                $voterinfo->h1 = $request->h1;
                $voterinfo->h2 = $request->h2;
                $voterinfo->h3 = $request->h3;
                $voterinfo->birth1 = $request->birth1;
                $voterinfo->birth2 = $request->birth2;
                $voterinfo->birth3 = $request->birth3;
                $voterinfo->add1 = $request->add1;
                $voterinfo->add2 = $request->add2;
                $voterinfo->add3 = $request->add3;
                $voterinfo->blood1 = $request->blood1;
                $voterinfo->blood2 = $request->blood2;
                $voterinfo->blood3 = $request->blood3;
                $voterinfo->other1 = $request->other1;
                $voterinfo->other2 = $request->other2;
                $voterinfo->other3 = $request->other3;
                $voterinfo->fee = $request->fee;
                $voterinfo->description = $request->description;
                $voterinfo->gar_name = $request->gar_name;
                $voterinfo->gar_add = $request->gar_add;
                $voterinfo->gar_pho = $request->gar_pho;
                $voterinfo->gar_em = $request->gar_em;
                $voterinfo->app_name = $request->app_name;
                $voterinfo->app_add = $request->app_add;
                $voterinfo->app_pho = $request->app_pho;
                $voterinfo->app_em = $request->app_em;
                $voterinfo->form_serial2 = $request->form_serial2;
                $voterinfo->applicant_name = $request->applicant_name;
                $voterinfo->projojjo = $request->projojjo;
                $voterinfo->applied_date = $request->applied_date;
                $voterinfo->next_date = $request->next_date;
                $voterinfo->form_serial3 = $request->form_serial3;
                $voterinfo->a_name = $request->a_name;
                $voterinfo->a_nid = $request->a_nid;
                $voterinfo->a_date = $request->a_date;
                $voterinfo->a_place = $request->a_place;
                $voterinfo->save();
            }

            if ($sanad->description == 'ভোটার এলাকা স্থানান্তর প্রত্যয়ন') {
                $migration = new VoterMigration;
                $migration->sanad_id = $request->sanad_id;
                $migration->upazila = $request->upazila;
                $migration->zila = $request->zila;
                $migration->applicant_dob = $request->applicant_dob;
                $migration->present_votar_number = $request->present_votar_number;
                $migration->present_address_name = $request->present_address_name;
                $migration->present_upazila = $request->present_upazila;
                $migration->present_village = $request->present_village;
                $migration->present_address_number = $request->present_address_number;
                $migration->present_zila = $request->present_zila;
                $migration->present_basha = $request->present_basha;
                $migration->transfer_zila = $request->transfer_zila;
                $migration->transfer_upazila = $request->transfer_upazila;
                $migration->transfer_city = $request->transfer_city;
                $migration->transfer_address = $request->transfer_address;
                $migration->transfer_address_number = $request->transfer_address_number;
                $migration->transfer_village = $request->transfer_village;
                $migration->transfer_basha = $request->transfer_basha;
                $migration->transfer_phone = $request->transfer_phone;
                $migration->transfer_union = $request->transfer_union;
                $migration->time = $request->time;
                $migration->reason = $request->reason;
                $migration->identify_name = $request->identify_name;
                $migration->identify_number = $request->identify_number;
                $migration->identify_address = $request->identify_address;
                $migration->first_votar_alaka = $request->first_votar_alaka;
                $migration->second_votar_alaka = $request->second_votar_alaka;
                $migration->paptishikar = $request->paptishikar;
                $migration->abadon_form = $request->abadon_form;
                $migration->save();
            }

            if ($sanad->description == 'ট্রেড লাইসেন্স') {
                $trade = new TradeLicense;
                $trade->sanad_id = $request->sanad_id;
                $trade->organization_name = $request->organization_name;
                $trade->address = $request->address;
                $trade->business_type = $request->business_type;
                $trade->business_place = $request->business_place;
                $trade->validity_period = $request->validity_period;
                $trade->money_year = $request->money_year;
                $trade->fee_amount = $request->fee_amount;
                $trade->vat_amount = $request->vat_amount;
                $trade->tax_amount = $request->tax_amount;
                $trade->total_amount = $request->total_amount;

                $trade->save();
            }

            $user_id = auth()->user()->id;

            $application = new Application;
            $application->user_id = $user_id;
            $application->sanad_id = $request->sanad_id;
            $application->union_id = $request->union_id;
            $application->applied_union_no = $request->applied_union_no;
            $application->applied_upazilla_name = $request->applied_upazilla_name;
            $application->applied_zilla_name = $request->applied_zilla_name;
            $application->applied_chairman_name = $request->applied_chairman_name;
            $application->tracking_no = $request->tracking_no;
            $application->form_serial = $request->form_serial;
            $application->form_date = $request->form_date;
            $application->noe = $request->noe;
            $application->applicant = $request->applicant ?? $request->lname;
            $application->father_husband_name = $request->father_husband_name ?? $request->father_name;
            $application->mother_name = $request->mother_name;
            $application->date = date('d/m/Y');
            $application->nid_birth = $request->nid_birth;
            $application->mrgram = $request->village_name;
            $application->union_name = $request->union_name;
            $application->upazilla_name = $request->upazila_name;
            $application->zilla_name = $request->zila_name;
            $application->ward_no = $request->ward_no;
            $application->mrword = $request->mrword;
            $application->mrdak = $request->mrdak;
            $application->qr_code = $request->qrcode;
            $application->status = "approved";
            $application->death_date = $request->death_date;
            $application->death_cause = $request->death_cause;
            $application->dead_age = $request->dead_age;
            $application->death_reg_no = $request->death_reg_no;
            $application->battalion_name = $request->battalion_name;
            $application->relation = $request->relation;
            $application->relation2 = $request->relation2;
            $application->gajet_no = $request->gajet_no;
            $application->obodan = $request->obodan;
            $application->gurdian_profession = $request->gurdian_profession;
            $application->gurdian_yearly_earn = $request->gurdian_yearly_earn;
            $application->lal = $request->lal;
            $application->eng = $request->eng;
            $application->bstan = $request->bstan;
            $application->btype = $request->btype;
            $application->thikhana = $request->thikhana;
            $application->lname = $request->lname;
            $application->pname = $request->pname;
            $application->present_zila = $request->present_zila;
            $application->present_upazila = $request->present_upazila;
            $application->present_village = $request->present_village;
            $application->transfer_village = $request->transfer_village;
            $application->transfer_basha = $request->transfer_basha;
            $application->transfer_upazila = $request->transfer_upazila;
            $application->celer = $request->celer;
            $application->bahinir = $request->bahinir;
            $application->transfer_zila = $request->transfer_zila;

            $application->rdt1 = $request->rdt1;
            $application->rdt2 = $request->rdt2;
            $application->rtt1 = $request->rtt1;
            $application->rtt2 = $request->rtt2;
            $application->rtt3 = $request->rtt3;
            $application->rtt4 = $request->rtt4;

            $application->geg = $request->geg;
            $application->eng = $request->eng;
            $application->rn1 = $request->rn1;
            $application->rn2 = $request->rn2;
            $application->rr1 = $request->rr1;
            $application->rr2 = $request->rr2;
            $application->che = $request->che;
            $application->eng = $request->eng;
            $application->upe = $request->upe;
            $application->une = $request->une;
            $application->gurdian_yearly_earn_description = $request->gurdian_yearly_earn_description;
            $application->gurdian_monthly_earn = $request->gurdian_monthly_earn;
            $application->gurdian_monthly_earn_description = $request->gurdian_monthly_earn_description;
            $application->name = $request->name;
            $application->first_heading = $request->first_heading;
            $application->second_heading = $request->second_heading;
            $application->third_heading = $request->third_heading;
            $application->subject = $request->subject;
            $application->law = $request->law;
            $application->other_app_date = $request->other_app_date;
            $application->first_body = $request->first_body;
            $application->second_body = $request->second_body;
            $application->third_body = $request->third_body;
            File::copy(public_path('setting/unioninfo/') . $union_info->logo, public_path('setting/application/application-logo/') . $union_info->logo);
            $application->union_logo = $union_info->logo;
            // if ($union_info) {
            //     File::copy(public_path('setting/unioninfo/') . $union_info->logo, public_path('setting/application/application-logo/') . $union_info->logo);
            // }
            // $application->union_logo = $union_info->logo;

            if ($sanad->description == 'উত্তরাধিকার সনদ') {
                $application->other_table_id = $uttoradhikar->id;
            }
            if ($sanad->description == 'ওয়ারিশ সনদ') {
                $application->other_table_id = $oarish->id;
            }
            if ($sanad->description == 'জাতীয় পরিচয় তথ্য সংশোধন') {
                $application->other_table_id = $voterinfo->id;
            }
            if ($sanad->description == 'ভোটার এলাকা স্থানান্তর প্রত্যয়ন') {
                $application->other_table_id = $migration->id;
            }
            if ($sanad->description == 'ট্রেড লাইসেন্স') {
                $application->other_table_id = $trade->id;
            }

            $application->save();

            if ($sanad->description == 'উত্তরাধিকার সনদ') {
                $uttoradhikar->update([
                    'application_id' => $application->id,
                ]);
            }
            if ($sanad->description == 'ওয়ারিশ সনদ') {
                $oarish->update([
                    'application_id' => $application->id,
                ]);
            }
            if ($sanad->description == 'পারিবারিক সনদ') {
                $oarish->update([
                    'application_id' => $application->id,
                ]);
            }
            if ($sanad->description == 'জাতীয় পরিচয় তথ্য সংশোধন') {
                $voterinfo->update([
                    'application_id' => $application->id,
                ]);
            }
            if ($sanad->description == 'ভোটার এলাকা স্থানান্তর প্রত্যয়ন') {
                $migration->update([
                    'application_id' => $application->id,
                ]);
            }
            if ($sanad->description == 'ট্রেড লাইসেন্স') {
                $trade->update([
                    'application_id' => $application->id,
                ]);
            }

            return back();
        } else {
            $divisions = Division::get();
            $union = UnionInfo::where('user_id', auth()->user()->id)->latest()->first();
            if ($union) {
                $div = Division::find($union->division_id);
                $district = District::find($union->district_id);
                $upzilla = Upzilla::find($union->upazilla_id);
                $uni = Union::find($union->union_id);
            } else {
                $div = null;
                $district = null;
                $upzilla = null;
                $uni = null;
            }
            if (auth()->user()->type == 'admin') {
                return view('backend.content.union_info.index', compact('union', 'divisions', 'div', 'district', 'upzilla', 'uni'));
            } else {
                return view('frontend.user.union_info.index', compact('union', 'divisions', 'div', 'district', 'upzilla', 'uni'));
            }
        }
    }

    public function application_certificate_info(Request $request)
    {
        $certificate_price = CertificatePrice::query()->first();
        $history = new PrintHistory;
        $history->application_id = $request->application_id;
        $history->printed_on = $request->printed_on;
        $history->printed_by = auth()->user()->id;
        $history->sanad_id = $request->sanad_id;
        $history->union_id = $request->union_id;
        $history->save();

        $user = auth()->user();
        if ($user) {
            $balance = Balance::where('user_id', $user->id)->first();
            Balance::where('user_id', $user->id)->decrement('balance', $certificate_price->price_rate);

            Debit::create([
                'user_id' => $balance->user_id,
                'balance_id' => $balance->getKey(),
                'amount' => $certificate_price->price_rate,
            ]);
        }
        return back();
    }

    public function tech_web_shonod_details($name)
    {
        $union = UnionInfo::where('user_id', auth()->user()->id)->latest()->first();
        $info = UserInfo::where('user_id', auth()->user()->id)->latest()->first();
        if ($info) {
            # code...

            if ($union) {
                $uni = Union::find($union->union_id);
                $district = District::find($union->district_id);
                $upzilla = Upzilla::find($union->upazilla_id);

                //generate serial no start
                $sanad = Blog::where('description', $name)->first();
                $app = Application::where('sanad_id', $sanad->id)->count();
                $sl_no = generate_sanad_number($app + 1, 4);
                //generate serial no end
                $sanad = Blog::where('description', $name)->first();

                $q = auth()->user()->id . $sl_no . $sanad->id . $uni->id;
                $qr = base64_encode(QrCode::generate($q));

                return view('backend.content.applications.sanad-application', compact('sl_no', 'sanad', 'qr', 'union', 'uni', 'district', 'upzilla', 'q'));
            } else {
                $divisions = Division::get();
                $union = UnionInfo::where('user_id', auth()->user()->id)->latest()->first();
                if ($union) {
                    $div = Division::find($union->division_id);
                    $district = District::find($union->district_id);
                    $upzilla = Upzilla::find($union->upazilla_id);
                    $uni = Union::find($union->union_id);
                } else {
                    $div = null;
                    $district = null;
                    $upzilla = null;
                    $uni = null;
                }
                return view('backend.content.union_info.index', compact('union', 'divisions', 'div', 'district', 'upzilla', 'uni'));
            }
        } else {
            $divisions = Division::get();
            return view('backend.content.user-info.user_info_create', compact('divisions'));
        }
    }
    public function techweb_union_index()
    {
        $divisions = Division::get();
        $union = UnionInfo::where('user_id', auth()->user()->id)->latest()->first();
        if ($union) {
            $div = Division::find($union->division_id);
            $district = District::find($union->district_id);
            $upzilla = Upzilla::find($union->upazilla_id);
            $uni = Union::find($union->union_id);
        } else {
            $div = null;
            $district = null;
            $upzilla = null;
            $uni = null;
        }

        return view('backend.content.union_info.index', compact('union', 'divisions', 'div', 'district', 'upzilla', 'uni'));
    }

    public function techweb_certificate_history(Request $request)
    {
        if (auth()->user()->id == 1) {
            $history = PrintHistory::latest();
        } else {
            $history = PrintHistory::where('printed_by', auth()->user()->id)->latest();
        }
        if ($request->union) {
            $history->where('union_id', $request->union);
        }
        if ($request->start_date) {
            $history->whereDate('created_at', $request->start_date);
        }
        if ($request->start_date && $request->end_date) {
            $history->whereBetween('created_at', [$request->start_date, $request->end_date]);
        }
        $unions = Union::get();
        $history_count = $history->count();
        $histories = $history->paginate(20)->withQueryString();

        return view('backend.content.applications.print-history.history', compact('histories', 'history_count', 'unions'));
    }
}
