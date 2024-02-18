<?php

namespace App\Http\Controllers\Frontend\User;

use App\Models\Blog;
use App\Models\UserInfo;
use App\Models\Application;
use App\Models\Course;
use App\Models\CourseType;
use App\Models\TrainingApplication;
use App\Models\TrainingUserInfo;
use Auth;
use App\Models\UnionInfo;
use App\Models\Division;
use App\Models\District;
use App\Models\Upzilla;
use App\Models\Union;

use App\Models\Uttoradhikar;
use App\Models\Oarish;
use App\Models\VoterInfoCorrection;
use App\Models\VoterMigration;
use App\Models\TradeLicense;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

/**
 * Class DashboardController.
 */
class DashboardController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $blogs = Blog::where('is_active', 1)->get();
        return view('frontend.user.dashboard', compact('blogs'));
    }
    public function tech_web_sanad_application(Request $request)
    {
        $user_id = auth()->user()->id;
        $application = Application::where('user_id', $user_id)->latest();

        if ($request->tracking_no) {
            $application->where('tracking_no', $request->tracking_no);
        }

        $applications = $application->paginate(17)->withQueryString();
        return view('frontend.user.sanad.sanad', compact('applications'));
    }

    public function tech_web_sanad_certificate($id)
    {
        $application = Application::find($id);
        $sanad = Blog::find($application->sanad_id);
        $union = Union::find($application->union_id);

        if ($sanad->description == 'বাৎসরিক আয়ের সনদপত্র') {
            return view('frontend.user.sanad.sanad-certificate.c_batshorik', compact('application', 'sanad', 'union'));
        }
        if ($sanad->description == 'মাসিক আয়ের সনদ') {
            return view('frontend.user.sanad.sanad-certificate.c_monthly', compact('application', 'sanad', 'union'));
        }
        if ($sanad->description == 'মৃত্যু সনদ') {
            return view('frontend.user.sanad.sanad-certificate.c_dead', compact('application', 'sanad', 'union'));
        }
        if ($sanad->description == 'জাতীয়তা সনদ') {
            return view('frontend.user.sanad.sanad-certificate.c_nationality', compact('application', 'sanad', 'union'));
        }
        if ($sanad->description == 'নাগরিক সনদ') {
            return view('frontend.user.sanad.sanad-certificate.c_nagorik', compact('application', 'sanad', 'union'));
        }
        if ($sanad->description == 'পুনঃবিবাহ না হওয়ার প্রত্যয়ন') {
            return view('frontend.user.sanad.sanad-certificate.c_punobibaho', compact('application', 'sanad', 'union'));
        }
        if ($sanad->description == 'ভূমিহীন সনদ') {
            return view('frontend.user.sanad.sanad-certificate.c_bhumihin', compact('application', 'sanad', 'union'));
        }
        if ($sanad->description == 'অভিভাবকের অনুমতিপত্র') {
            return view('frontend.user.sanad.sanad-certificate.c_obivabok', compact('application', 'sanad', 'union'));
        }
        if ($sanad->description == 'মুক্তিযোদ্ধা প্রত্যয়ন') {
            return view('frontend.user.sanad.sanad-certificate.c_freedomfighter', compact('application', 'sanad', 'union'));
        }
        if ($sanad->description == 'বিবিধ সনদ') {
            return view('frontend.user.sanad.sanad-certificate.c_others', compact('application', 'sanad', 'union'));
        }
        if ($sanad->description == 'অবিবাহিত সনদ') {
            return view('frontend.user.sanad.sanad-certificate.c_obibahito', compact('application', 'sanad', 'union'));
        }
        if ($sanad->description == 'স্থায়ী বাসিন্দা সনদ') {
            return view('frontend.user.sanad.sanad-certificate.c_permanentResident', compact('application', 'sanad', 'union'));
        }
        if ($sanad->description == 'প্রত্যায়ন পত্র নাম') {
            return view('frontend.user.sanad.sanad-certificate.c_samename', compact('application', 'sanad', 'union'));
        }
        if ($sanad->description == 'প্রত্যায়ন পত্র নাম') {
            return view('frontend.user.sanad.sanad-certificate.c_samename', compact('application', 'sanad', 'union'));
        }
        if ($sanad->description == 'চারিত্রিক সনদ') {
            return view('frontend.user.sanad.sanad-certificate.c_charitrik', compact('application', 'sanad', 'union'));
        }
        if ($sanad->description == 'উত্তরাধিকার সনদ') {
            $uttoradhikar = Uttoradhikar::where('application_id', $id)->first();
            return view('frontend.user.sanad.sanad-certificate.c_uttoradhikar', compact('application', 'sanad', 'union', 'uttoradhikar'));
        }
        if ($sanad->description == 'ওয়ারিশ সনদ') {
            $oarish = Oarish::where('application_id', $id)->first();
            return view('frontend.user.sanad.sanad-certificate.c_oarish', compact('application', 'sanad', 'union', 'oarish'));
        }
    }

    public function tech_web_course_application()
    {
        $user_info = TrainingUserInfo::where('mobile', Auth::user()->phone)->latest()->first();
        if ($user_info) {
            $applications = TrainingApplication::where('training_user_info_id', $user_info->id)->get();
        } else {
            $applications = null;
        }
        return view('frontend.user.computer.index', compact('user_info', 'applications'));
    }

    public function tech_web_all_sanad()
    {
        $sanads = Blog::where('is_active', 1)->get();
        return view('frontend.user.sanad.allsanad', compact('sanads'));
    }
    public function tech_web_shonod_details($name)
    {
        $union = UnionInfo::where('user_id', auth()->user()->id)->latest()->first();

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

            if ($name == 'অবিবাহিত সনদ') {
                return view('frontend.user.sanad.applications.obibahito', compact('sl_no', 'sanad', 'qr', 'union', 'uni', 'district', 'upzilla', 'q'));
            }
            if ($name == 'ওয়ারিশ সনদ') {
                return view('frontend.user.sanad.applications.oarish', compact('sl_no', 'sanad', 'qr', 'union', 'uni', 'district', 'upzilla', 'q'));
            }
            if ($name == 'চারিত্রিক সনদ') {
                return view('frontend.user.sanad.applications.charitrik', compact('sl_no', 'sanad', 'qr', 'union', 'uni', 'district', 'upzilla', 'q'));
            }
            if ($name == 'অভিভাবকের অনুমতিপত্র') {
                return view('frontend.user.sanad.applications.obivabok', compact('sl_no', 'sanad', 'qr', 'union', 'uni', 'district', 'upzilla', 'q'));
            }
            if ($name == 'নাগরিক সনদ') {
                return view('frontend.user.sanad.applications.nagorik', compact('sl_no', 'sanad', 'qr', 'union', 'uni', 'district', 'upzilla', 'q'));
            }
            if ($name == 'বাৎসরিক আয়ের সনদপত্র') {
                return view('frontend.user.sanad.applications.batshorik', compact('sl_no', 'sanad', 'qr', 'union', 'uni', 'district', 'upzilla', 'q'));
            }
            if ($name == 'মাসিক আয়ের সনদ') {
                return view('frontend.user.sanad.applications.monthly', compact('sl_no', 'sanad', 'qr', 'union', 'uni', 'district', 'upzilla', 'q'));
            }
            if ($name == 'পুনঃবিবাহ না হওয়ার প্রত্যয়ন') {
                return view('frontend.user.sanad.applications.punobibaho', compact('sl_no', 'sanad', 'qr', 'union', 'uni', 'district', 'upzilla', 'q'));
            }
            if ($name == 'ভূমিহীন সনদ') {
                return view('frontend.user.sanad.applications.bhumihin', compact('sl_no', 'sanad', 'qr', 'union', 'uni', 'district', 'upzilla', 'q'));
            }
            if ($name == 'মুক্তিযোদ্ধা প্রত্যয়ন') {
                return view('frontend.user.sanad.applications.freedomfighter', compact('sl_no', 'sanad', 'qr', 'union', 'uni', 'district', 'upzilla', 'q'));
            }
            if ($name == 'জাতীয় পরিচয় তথ্য সংশোধন') {
                return view('frontend.user.sanad.applications.voterinfoCorrection', compact('sl_no', 'sanad', 'qr', 'union', 'uni', 'district', 'upzilla', 'q'));
            }
            if ($name == 'প্রত্যায়ন পত্র নাম') {
                return view('frontend.user.sanad.applications.samename', compact('sl_no', 'sanad', 'qr', 'union', 'uni', 'district', 'upzilla', 'q'));
            }
            if ($name == 'ভোটার এলাকা স্থানান্তর প্রত্যয়ন') {
                return view('frontend.user.sanad.applications.voterMigration', compact('sl_no', 'sanad', 'qr', 'union', 'uni', 'district', 'upzilla', 'q'));
            }
            if ($name == 'উত্তরাধিকার সনদ') {
                return view('frontend.user.sanad.applications.uttoradhikar', compact('sl_no', 'sanad', 'qr', 'union', 'uni', 'district', 'upzilla', 'q'));
            }
            if ($name == 'জাতীয়তা সনদ') {
                return view('frontend.user.sanad.applications.nationality', compact('sl_no', 'sanad', 'qr', 'union', 'uni', 'district', 'upzilla', 'q'));
            }
            if ($name == 'বিবিধ সনদ') {
                return view('frontend.user.sanad.applications.others', compact('sl_no', 'sanad', 'qr', 'union', 'uni', 'district', 'upzilla', 'q'));
            }
            if ($name == 'স্থায়ী বাসিন্দা সনদ') {
                return view('frontend.user.sanad.applications.permanentResident', compact('sl_no', 'sanad', 'qr', 'union', 'uni', 'district', 'upzilla', 'q'));
            }
            if ($name == 'ট্রেড লাইসেন্স') {
                return view('frontend.user.sanad.applications.tradelicense', compact('sl_no', 'sanad', 'qr', 'union', 'uni', 'district', 'upzilla', 'q'));
            }
            if ($name == 'মৃত্যু সনদ') {
                return view('frontend.user.sanad.applications.dead', compact('sl_no', 'sanad', 'qr', 'union', 'uni', 'district', 'upzilla', 'q'));
            }
            if ($name == 'পুনঃবিবাহ না হওয়া সনদ') {
                return view('frontend.user.sanad.applications.biya', compact('sl_no', 'sanad', 'qr', 'union', 'uni', 'district', 'upzilla', 'q'));
            }
            
            if ($name == 'নতুন ভোটার প্রত্যয়ন') {
                return view('frontend.user.sanad.applications.newVoter', compact('sl_no', 'sanad', 'qr', 'union', 'uni', 'district', 'upzilla', 'q'));
            }
            if ($name == 'বিধবা প্রত্যয়ন') {
                return view('frontend.user.sanad.applications.bidovah', compact('sl_no', 'sanad', 'qr', 'union', 'uni', 'district', 'upzilla', 'q'));
            }
            if ($name == 'সম্প্রদায় সনদ') {
                return view('frontend.user.sanad.applications.sampro', compact('sl_no', 'sanad', 'qr', 'union', 'uni', 'district', 'upzilla', 'q'));
            }
            if ($name == 'কৃষি প্রত্যয়ন') {
                return view('frontend.user.sanad.applications.krishi', compact('sl_no', 'sanad', 'qr', 'union', 'uni', 'district', 'upzilla', 'q'));
            }
            if ($name == 'এতিম সনদ') {
                return view('frontend.user.sanad.applications.etim', compact('sl_no', 'sanad', 'qr', 'union', 'uni', 'district', 'upzilla', 'q'));
            }
            if ($name == 'পারিবারিক সনদ') {
                return view('frontend.user.sanad.applications.pari', compact('sl_no', 'sanad', 'qr', 'union', 'uni', 'district', 'upzilla', 'q'));
            }
            if ($name == 'বিবাহিত সনদ') {
                return view('frontend.user.sanad.applications.biba', compact('sl_no', 'sanad', 'qr', 'union', 'uni', 'district', 'upzilla', 'q'));
            }
            if ($name == 'উপজাতি সনদ') {
                return view('frontend.user.sanad.applications.opoj', compact('sl_no', 'sanad', 'qr', 'union', 'uni', 'district', 'upzilla', 'q'));
            }
            if ($name == 'নিঃসন্তান প্রত্যয়ন') {
                return view('frontend.user.sanad.applications.jatio', compact('sl_no', 'sanad', 'qr', 'union', 'uni', 'district', 'upzilla', 'q'));
            }
            if ($name == 'আর্থিক অস্বচ্ছলতার সনদ') {
                return view('frontend.user.sanad.applications.arthik', compact('sl_no', 'sanad', 'qr', 'union', 'uni', 'district', 'upzilla', 'q'));
            }
            if ($name == 'অনাপত্তি সনদ') {
                return view('frontend.user.sanad.applications.onapotti', compact('sl_no', 'sanad', 'qr', 'union', 'uni', 'district', 'upzilla', 'q'));
            }
            if ($name == 'অবকাঠামো নির্মাণের অনুমতি সনদ') {
                return view('frontend.user.sanad.applications.obokathamo', compact('sl_no', 'sanad', 'qr', 'union', 'uni', 'district', 'upzilla', 'q'));
            }
            if ($name == 'প্রতিবন্ধী সনদ') {
                return view('frontend.user.sanad.applications.protibondi', compact('sl_no', 'sanad', 'qr', 'union', 'uni', 'district', 'upzilla', 'q'));
            }
            if ($name == 'পুনঃবিবাহ  প্রত্যয়ন') {
                return view('frontend.user.sanad.applications.biya', compact('sl_no', 'sanad', 'qr', 'union', 'uni', 'district', 'upzilla', 'q'));
            }
            if ($name == 'বেকারত্ব সনদ') {
                return view('frontend.user.sanad.applications.bekar', compact('sl_no', 'sanad', 'qr', 'union', 'uni', 'district', 'upzilla', 'q'));
            }
             if ($name == 'অটো রিক্সা ট্রেডলাইসেন্স') {
                return view('frontend.user.sanad.applications.auto', compact('sl_no', 'sanad', 'qr', 'union', 'uni', 'district', 'upzilla', 'q'));
            }
            
            
            
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
            return view('frontend.user.union_info.index', compact('union', 'divisions', 'div', 'district', 'upzilla', 'uni'));
        }
    }
}
