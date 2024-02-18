<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Blog;
use App\Models\Union;
use App\Models\Oarish;
use App\Models\Balance;
use App\Models\Upzilla;
use App\Models\District;
use App\Models\Division;
use App\Models\UserInfo;
use App\Models\Application;
use App\Models\PrintHistory;
use App\Models\Uttoradhikar;
use Illuminate\Http\Request;
use App\Models\CertificatePrice;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Crypt;

class UserInfoController extends Controller
{
    public function tech_web_info_store(Request $request)
    {
        if ($request->info_id) {
            $info = UserInfo::find($request->info_id);

            if ($request->voter_birth_photo) {
                $photo_path = public_path('setting/user-info/') . $info->voter_birth_photo;
                if (File::exists($photo_path)) {
                    File::delete($photo_path);
                }
                $voterphoto = time() . 'voter' . '.' . $request->voter_birth_photo->extension();
                $image = $request->voter_birth_photo->move(public_path('setting/user-info'), $voterphoto);
            }
            if ($request->photo) {
                $photo_path = public_path('setting/user-info/') . $info->photo;
                if (File::exists($photo_path)) {
                    File::delete($photo_path);
                }
                $photo = time() . '.' . $request->photo->extension();
                $image = $request->photo->move(public_path('setting/user-info'), $photo);
            }
        } else {
            $info = new UserInfo;
            if ($request->voter_birth_photo) {
                $voterphoto = time() . 'voter' . '.' . $request->voter_birth_photo->extension();
                $image = $request->voter_birth_photo->move(public_path('setting/user-info'), $voterphoto);
            }
            if ($request->photo) {
                $photo = time() . '.' . $request->photo->extension();
                $image = $request->photo->move(public_path('setting/user-info'), $photo);
            }
        }


        $info->user_id = auth()->user()->id;

        $info->voter_birth_photo = $voterphoto;
        $info->photo = $photo;

        $info->name_en = $request->name_en;
        $info->name_bn = $request->name_bn;
        $info->father_or_husband_en = $request->father_or_husband_en;
        $info->father_or_husband_bn = $request->father_or_husband_bn;
        $info->mother_en = $request->mother_en;
        $info->mother_bn = $request->mother_bn;
        $info->e_mail = $request->e_mail;
        $info->mobile = $request->mobile;
        $info->certificate_type = $request->certificate_type;
        $info->voter_birth_id = $request->voter_birth_id;
        $info->birth_date = $request->birth_date;
        $info->gender = $request->gender;
        $info->blood_group = $request->blood_group;
        $info->present_village_en = $request->present_village_en;
        $info->present_village_bn = $request->present_village_bn;
        $info->present_holding_no_en = $request->present_holding_no_en;
        $info->present_holding_no_bn = $request->present_holding_no_bn;
        $info->present_road_en = $request->present_road_en;
        $info->present_road_bn = $request->present_road_bn;
        $info->present_address_type = $request->present_address_type;
        $info->present_division = $request->present_division;
        $info->present_district = $request->present_district;
        $info->present_thana = $request->present_thana;
        $info->present_post_office = $request->present_post_office;
        $info->present_union = $request->present_union;
        $info->present_owner_type = $request->present_owner_type;
        $info->present_ward_no = $request->present_ward_no;

        if ($request->same == 'same') {
            $info->permanent_village_en = $request->present_village_en;
            $info->permanent_village_bn = $request->present_village_bn;
            $info->permanent_holding_no_en = $request->present_holding_no_en;
            $info->permanent_holding_no_bn = $request->present_holding_no_bn;
            $info->permanent_road_en = $request->present_road_en;
            $info->permanent_road_bn = $request->present_road_bn;
            $info->permanent_address_type = $request->present_address_type;
            $info->permanent_division = $request->present_division;
            $info->permanent_district = $request->present_district;
            $info->permanent_thana = $request->present_thana;
            $info->permanent_post_office = $request->present_post_office;
            $info->permanent_union = $request->present_union;
            $info->permanent_owner_type = $request->present_owner_type;
            $info->permanent_ward_no = $request->present_ward_no;
        } else {
            $info->permanent_village_en = $request->permanent_village_en;
            $info->permanent_village_bn = $request->permanent_village_bn;
            $info->permanent_holding_no_en = $request->permanent_holding_no_en;
            $info->permanent_holding_no_bn = $request->permanent_holding_no_bn;
            $info->permanent_road_en = $request->permanent_road_en;
            $info->permanent_road_bn = $request->permanent_road_bn;
            $info->permanent_address_type = $request->permanent_address_type;
            $info->permanent_division = $request->permanent_division;
            $info->permanent_district = $request->permanent_district;
            $info->permanent_thana = $request->permanent_thana;
            $info->permanent_post_office = $request->permanent_post_office;
            $info->permanent_union = $request->permanent_union;
            $info->permanent_owner_type = $request->permanent_owner_type;
            $info->permanent_ward_no = $request->permanent_ward_no;
        }
        $info->save();


        return redirect()->route('frontend.user.info');
    }


    public function district($id)
    {
        $district = District::where('division_id', $id)->get();
        return $district;
    }
    public function upzilla($id)
    {
        $upzilla = Upzilla::where('district_id', $id)->get();
        return $upzilla;
    }
    public function union($id)
    {
        $union = Union::where('upazilla_id', $id)->get();
        return $union;
    }

    public function tech_web_application_status(Request $request)
    {
        $application = Application::find($request->application_id);
        $application->status = $request->status;
        $application->save();
        return back()->withFlashSuccess('Status changed Successfully');
    }
    public function tech_web_application_sanad(Request $request)
    {
        $application = Application::find($request->application_id);
        if ($request->sanad_file) {
            $sanad = time() . 'sanad' . '.' . $request->sanad_file->extension();
            $file = $request->sanad_file->move(public_path('setting/sanadfile'), $sanad);
            $application->sanad_file = $sanad;
        }
        $application->save();
        return back()->withFlashSuccess('Sanad Uploaded Successfully');
    }

    public function tech_web_applications(Request $request)
    {
        $user = auth()->user();

        if ($user->id == 1) {
            $application = Application::latest();
        } else {
            $application = Application::where('user_id', $user->id)->latest();
        }
        if ($request->tracking_no) {
            $application->where('tracking_no', $request->tracking_no);
        }
        if ($request->start_date && $request->end_date) {
            $application->whereBetween('created_at', [$request->start_date, $request->end_date]);
        }
        if ($request->start_date) {
            $application->whereDate('created_at', $request->start_date);
        }
        if ($request->end_date) {
            $application->whereDate('created_at', $request->end_date);
        }
        if ($request->status) {
            $application->where('status', $request->status);
        }
        $application_count = $application->count();
        $applications = $application->paginate(20)->withQueryString();

        return view('backend.content.applications.view-application', compact('applications', 'application_count'));
    }

    public function tech_web_application_delete($id)
    {
        $application = Application::find($id);
        $application->delete();
        return redirect()->back()->withFlashSuccess('Application Deleted Successfully');
    }
    public function tech_web_application_detail($id)
    {
        $language = "bn";
        $account = Balance::where('user_id', auth()->user()?->id)->first();
        $certificate_pricing = CertificatePrice::query()->first();
        $application_id = encrypt($id);
        $application = Application::find($id);
        // $infos = UserInfo::find($applications->user_info_id);
        $sanad = Blog::find($application->sanad_id);
        $uttoradhikar = Uttoradhikar::where('application_id', $id)->first();
        $oarish = Oarish::where('application_id', $id)->first();
        $historyCount = PrintHistory::where('application_id', $id)->count();
        return view('backend.content.applications.application-details', compact('certificate_pricing','application', 'sanad', 'uttoradhikar', 'oarish', 'historyCount', 'application_id', 'account', 'language'));
    }


    public function tech_web_apply_applications()
    {
        $blogs = Blog::where('is_active', 1)->get();
        return view('backend.content.applications.apply-application', compact('blogs'));
    }

    public function user_info_edit($id)
    {
        $infos = UserInfo::find($id);
        $divisions = Division::get();
        if (auth()->user()->type == 'admin') {
            return view('backend.content.user-info.edit', compact('divisions', 'infos'));
        } else {
            return view('frontend.content.user-info.edit', compact('divisions', 'infos'));
        }
    }

    public function user_info()
    {
        $infos = UserInfo::where('user_id', auth()->user()->id)->first();
        if ($infos == null) {
            $divisions = Division::get();
            if (auth()->user()->type == 'admin') {
                return view('backend.content.user-info.user_info_create', compact('divisions'));
            } else {
                return view('frontend.content.user-info.user_info_create', compact('divisions'));
            }
        } else {
            if (auth()->user()->type == 'admin') {
                return view('backend.content.user-info.index', compact('infos'));
            } else {
                return view('frontend.content.user-info.index', compact('infos'));
            }
        }
    }


    public function registerd_user_apply_application(Request $request)
    {
        $infos = UserInfo::where('mobile', $request->mobile)->latest()->first();
        $sanad_id = $request->sanad_id;
        if ($infos != null) {
            $sanad = Blog::find($sanad_id);
            $divisions = Division::get();
            $district = District::where('id', $infos->present_district)->first();
            $union = Union::where('id', $infos->present_union)->first();
            $upzilla = Upzilla::where('id', $infos->present_thana)->first();
            return view('frontend.content.registeredApplication', compact('infos', 'sanad', 'divisions', 'district', 'union', 'upzilla'));
        } else {
            return redirect()->back()->withErrors(['sorry' => 'Sorry phone number not found']);
        }
    }
}
