<?php

namespace App\Http\Controllers\Frontend;

use App\Domains\Products\Models\Product;
use Illuminate\Http\Request;

/**
 * Class HomeController.
 */

use App\Models\Info;
use App\Models\Notice;
use App\Models\Event;
use App\Models\Page;
use App\Models\Blog;
use App\Models\Slider;
use App\Models\Project;
use App\Models\Brand;
use App\Models\Donate;
use App\Models\Activity;
use App\Models\CourseType;
use App\Models\Course;
use App\Models\Link;
use App\Models\Form;
use Mail;
use App\Mail\ContactMail;
use App\Mail\EventMail;
use App\Mail\VolentiarMail;
use App\Models\About;
use App\Models\Application;
use App\Models\Division;
use App\Models\Oarish;
use App\Models\PrintHistory;
use App\Models\Uttoradhikar;
use Auth;

class HomeController
{
    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index()
    {
        $product = Product::all();
        $sliders = Slider::where('is_active', 1)
            ->get();

        $projects = Project::where('is_active', 1)
            ->get();

        $course = CourseType::get();

        $link = Link::orderBy('id', 'DESC')
            // ->limit(5)
            ->get();
        $form = Form::orderBy('id', 'DESC')
            // ->limit(5)
            ->get();

        $blogs = Blog::where('is_active', 1)->get();

        $brands = Brand::where('is_active', 1)
            ->orderBy('id', 'DESC')
            ->get();

        return view('frontend.index', compact('course', 'product', 'sliders', 'brands', 'blogs', 'projects', 'link', 'form'));
    }



    public function training($id)
    {
        if (Auth::check()) {
            $blog = Course::find($id);
            $divisions = Division::get();
            return view('frontend.competition.apply', compact('blog', 'divisions', 'id'));
        } else {
            return view('frontend.auth.login');
        }
    }

    public function noticedetails($id)
    {
        $notice = Notice::find($id);
        return view('frontend.content.noticedetails', compact('notice'));
    }
    public function presidentdetails($id)
    {
        $president = President::find($id);
        $about = About::whereNotNull('banner_img')->latest()->first();
        return view('frontend.content.presidentdetails', compact('president', 'about'));
    }
    public function infodetails($id)
    {
        $info = Info::find($id);

        return view('frontend.content.infodetails', compact('info'));
    }
    public function noticeall()
    {
        $notices = Notice::orderBy('id', 'DESC')->get();
        return view('frontend.content.noticeall', compact('notices'));
    }
    public function donatenow()
    {
        $donates = Donate::where('is_active', 1)
            ->orderBy('title', 'ASC')
            ->get();
        return view('frontend.content.donatenow', compact('donates'));
    }
    public function allevent()
    {
        $events = Event::where('is_active', 1)
            ->orderBy('id', 'DESC')
            ->get();
        return view('frontend.content.allevent', compact('events'));
    }



    public function contact()
    {
        $page = Page::where('slug', '/contact')->get()->first();
        return view('frontend.content.contact', compact('page'));
    }
    public function contactsubmit(Request $request)
    {
        $item = $request;
        $adminEmail = get_setting('received_email');
        Mail::to($adminEmail)->send(new ContactMail($item));
        return back()->with('status', 'Thank you for your message. It has been sent');
    }


    public function eventsubmit(Request $request)
    {
        $item = $request;
        $adminEmail = get_setting('received_email');
        Mail::to($adminEmail)->send(new EventMail($item));
        return back()->with('status', 'Thank you for your message. It has been sent');
    }
    public function volunteersubmit(Request $request)
    {
        $item = $request;
        $adminEmail = get_setting('received_email');
        Mail::to($adminEmail)->send(new VolentiarMail($item));
        return back()->with('status', 'Thank you for your message. It has been sent');
    }
    public function eventdetails($id)
    {
        $event = Event::find($id);
        return view('frontend.content.eventdetails', compact('event'));
    }

    public function projectdetails($id)
    {
        $service = Project::find($id);
        $photo = json_decode($service->photos ?? null);
        return view('frontend.content.projectdetails', compact('service', 'photo'));
    }
    public function blogindex()
    {
        $cat = [];
        $arc = [];
        $blogs = Blog::get();
        foreach ($blogs as $key => $val) {
            $cat[] = $val->categories;
            $arc[] = date('Y', strtotime($val->created_at));
        }
        $archive = (array_count_values($arc));
        $count = (array_count_values($cat));
        $blog = Blog::where('is_active', 1)->get();
        $banner = Blog::whereNotNull('banner')->latest()->first();


        return view('frontend.blog.index', compact('blog', 'count', 'archive', 'banner'));
    }


    public function infoall()
    {
        $infos = Info::orderBy('id', 'DESC')->get();
        return view('frontend.content.infoall', compact('infos'));
    }
    public function allbrand()
    {
        $brands = Brand::where('is_active', 1)
            ->orderBy('id', 'DESC')
            ->get();
        return view('frontend.content.allbrand', compact('brands'));
    }
    public function allactivities()
    {

        $activities = Activity::where('is_active', 1)
            ->orderBy('id', 'DESC')
            ->get();

        return view('frontend.content.allactivities', compact('activities'));
    }
    public function pageshow($slug)
    {
        $slug = '/page/' . $slug;
        $page = Page::where('slug', $slug)->get()->first();
        return view('frontend.content.dynamicpage', compact('page'));
    }



    public function sanadViewer($id)
    {
        $language = "bn";
        $application_id = $id;
        $id = decrypt($id);
        $application = Application::find($id);
        // $infos = UserInfo::find($applications->user_info_id);
        $sanad = Blog::find($application->sanad_id);
        $uttoradhikar = Uttoradhikar::where('application_id', $id)->first();
        $oarish = Oarish::where('application_id', $id)->first();
        $historyCount = PrintHistory::where('application_id', $id)->count();
        return view('frontend.applications.application-details', compact('application', 'sanad', 'uttoradhikar', 'oarish', 'historyCount', 'application_id', 'language'));
    }
}
