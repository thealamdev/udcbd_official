<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CV;
use App\Models\UserCVInformation;
use App\Models\UserCVEducation;
use App\Models\UserCVJob;
use App\Models\UserCVProject;
use App\Models\UserCVReference;
use Illuminate\Support\Facades\File;

class CVController extends Controller
{
    public function techweb_cv_information()
    {
        return view('frontend.user.cv.index');
    }
    public function techweb_cv_information_store(Request $request)
    {

        $user_id = auth()->user()->id;
        $exists = UserCVInformation::where('user_id', $user_id)->get();
        if ($exists == null) {

            $skills = implode(',', request()->skills ?? null);

            $cvinfo = new UserCVInformation;
            if ($request->photo) {
                $user_img = time() . $user_id . '.' . $request->photo->extension();
                $image = $request->photo->move(public_path('setting/cvinfo'), $user_img);
            } else {
                $user_img = null;
            }
            $cvinfo->user_id = $user_id ?? null;
            $cvinfo->name = $request->name ?? null;
            $cvinfo->phone = $request->phone ?? null;
            $cvinfo->email = $request->email ?? null;
            $cvinfo->photo = $user_img;
            $cvinfo->address = $request->address ?? null;
            $cvinfo->linkedin = $request->linkedin ?? null;
            $cvinfo->github = $request->github ?? null;
            $cvinfo->carrer_objective = $request->description ?? null;
            $cvinfo->skills = $skills ?? null;
            $cvinfo->save();



            foreach ($request->institute as $key => $value) {
                $education = new UserCVEducation;
                $education->info_id = $cvinfo->id;
                $education->user_id = $user_id;
                $education->institute = $request->institute[$key] ?? null;
                $education->academic_qualification = $request->academic_qualification[$key] ?? null;
                $education->passing_year = $request->passing_year[$key] ?? null;
                $education->result = $request->result[$key] ?? null;
                $education->save();
            }

            foreach ($request->office_name as $key => $value) {
                $job = new UserCVJob;
                $job->info_id = $cvinfo->id;
                $job->user_id = $user_id;
                $job->office_name = $request->office_name[$key] ?? null;
                $job->designation = $request->designation[$key] ?? null;
                $job->service_year = $request->service_year[$key] ?? null;
                $job->job_description = $request->job_description[$key] ?? null;
                $job->save();
            }

            foreach ($request->refer_name as $key => $value) {
                $reference = new UserCVReference;
                $reference->info_id = $cvinfo->id;
                $reference->user_id = $user_id;
                $reference->name = $request->refer_name[$key] ?? null;
                $reference->phone = $request->refer_phone[$key] ?? null;
                $reference->email = $request->refer_email[$key] ?? null;
                $reference->designation = $request->refer_designation[$key] ?? null;
                $reference->institution = $request->refer_institution[$key] ?? null;
                $reference->save();
            }


            foreach ($request->project_name as $key => $value) {
                $project = new UserCVProject;
                $project->info_id = $cvinfo->id;
                $project->user_id = $user_id;
                $project->project_name = $request->project_name[$key] ?? null;
                $project->details = $request->project_details[$key] ?? null;
                $project->save();
            }

            return back()->withFlashSuccess('Information Stored Successfully');
        } else {
            $info = UserCVInformation::where('user_id', $user_id)->latest()->first();
            $educations = UserCVEducation::where('info_id', $info->id)->get();
            $jobs = UserCVJob::where('info_id', $info->id)->get();
            $references = UserCVReference::where('info_id', $info->id)->get();
            $projects = UserCVProject::where('info_id', $info->id)->get();
            $skills = explode(',', $info->skills ?? null);
            return view('frontend.user.cv.cvinfo', compact('info', 'educations', 'jobs', 'projects', 'references', 'skills'));
        }
    }


    public function techweb_cv_profile()
    {
        $user_id = auth()->user()->id;

        $info = UserCVInformation::where('user_id', $user_id)->latest()->first();
        $educations = UserCVEducation::where('info_id', $info->id)->get();
        $jobs = UserCVJob::where('info_id', $info->id)->get();
        $references = UserCVReference::where('info_id', $info->id)->get();
        $projects = UserCVProject::where('info_id', $info->id)->get();
        $skills = explode(',', $info->skills ?? null);

        return view('frontend.user.cv.cvinfo', compact('info', 'educations', 'jobs', 'projects', 'references', 'skills'));
    }


    public function techweb_cv_profile_edit($id)
    {
        $user_id = auth()->user()->id;

        $info = UserCVInformation::find($id);
        $educations = UserCVEducation::where('info_id', $info->id)->get();
        $jobs = UserCVJob::where('info_id', $info->id)->get();
        $references = UserCVReference::where('info_id', $info->id)->get();
        $projects = UserCVProject::where('info_id', $info->id)->get();
        $skills = explode(',', $info->skills ?? null);

        return view('frontend.user.cv.CVedit', compact('info', 'educations', 'jobs', 'projects', 'references', 'skills'));
    }


    public function techweb_cv_information_update(Request $request)
    {
        $user_id = auth()->user()->id;
        $skills = implode(',', request()->skills ?? null);

        $cvinfo = UserCVInformation::find($request->info_id);

        if ($request->photo) {
            $photo_path = public_path('setting/cvinfo/') . $cvinfo->photo;
            if (File::exists($photo_path)) {
                File::delete($photo_path);
            }
            $user_img = time() . $user_id . '.' . $request->photo->extension();
            $image = $request->photo->move(public_path('setting/cvinfo'), $user_img);
        } else {
            $user_img = $cvinfo->photo;
        }
        $cvinfo->user_id = $user_id ?? null;
        $cvinfo->name = $request->name ?? null;
        $cvinfo->phone = $request->phone ?? null;
        $cvinfo->email = $request->email ?? null;
        $cvinfo->photo = $user_img;
        $cvinfo->address = $request->address ?? null;
        $cvinfo->linkedin = $request->linkedin ?? null;
        $cvinfo->github = $request->github ?? null;
        $cvinfo->carrer_objective = $request->description ?? null;
        $cvinfo->skills = $skills ?? null;
        $cvinfo->save();


        foreach ($request->institute as $key => $value) {
            $edu = UserCVEducation::find($request->edu_id[$key]);
            if ($edu) {
                $edu = UserCVEducation::find($request->edu_id[$key]);
                $edu->info_id = $cvinfo->id;
                $edu->user_id = $user_id;
                $edu->institute = $request->institute[$key] ?? null;
                $edu->academic_qualification = $request->academic_qualification[$key] ?? null;
                $edu->passing_year = $request->passing_year[$key] ?? null;
                $edu->result = $request->result[$key] ?? null;
                $edu->save();
            } else {
                $edu = new UserCVEducation;
                $edu->info_id = $cvinfo->id;
                $edu->user_id = $user_id;
                $edu->institute = $request->institute[$key] ?? null;
                $edu->academic_qualification = $request->academic_qualification[$key] ?? null;
                $edu->passing_year = $request->passing_year[$key] ?? null;
                $edu->result = $request->result[$key] ?? null;
                $edu->save();
            }
        }


        foreach ($request->office_name as $key => $value) {
            $job = UserCVJob::find($request->job_id[$key]);
            if ($job) {
                $job->info_id = $cvinfo->id;
                $job->user_id = $user_id;
                $job->office_name = $request->office_name[$key] ?? null;
                $job->designation = $request->designation[$key] ?? null;
                $job->service_year = $request->service_year[$key] ?? null;
                $job->job_description = $request->job_description[$key] ?? null;
                $job->save();
            } else {
                $jobs = new UserCVJob;
                $jobs->info_id = $cvinfo->id;
                $jobs->user_id = $user_id;
                $jobs->office_name = $request->office_name[$key] ?? null;
                $jobs->designation = $request->designation[$key] ?? null;
                $jobs->service_year = $request->service_year[$key] ?? null;
                $jobs->job_description = $request->job_description[$key] ?? null;
                $jobs->save();
            }
        }


        foreach ($request->refer_name as $key => $value) {
            $reference = UserCVReference::find($request->ref_id[$key]);
            if ($reference) {
                $reference->info_id = $cvinfo->id;
                $reference->user_id = $user_id;
                $reference->name = $request->refer_name[$key] ?? null;
                $reference->phone = $request->refer_phone[$key] ?? null;
                $reference->email = $request->refer_email[$key] ?? null;
                $reference->designation = $request->refer_designation[$key] ?? null;
                $reference->institution = $request->refer_institution[$key] ?? null;
                $reference->save();
            } else {
                $refer = new UserCVReference;
                $refer->info_id = $cvinfo->id;
                $refer->user_id = $user_id;
                $refer->name = $request->refer_name[$key] ?? null;
                $refer->phone = $request->refer_phone[$key] ?? null;
                $refer->email = $request->refer_email[$key] ?? null;
                $refer->designation = $request->refer_designation[$key] ?? null;
                $refer->institution = $request->refer_institution[$key] ?? null;
                $refer->save();
            }
        }


        foreach ($request->project_name as $key => $value) {
            $project = UserCVProject::find($request->project_id[$key]);
            if ($project) {
                $project->info_id = $cvinfo->id;
                $project->user_id = $user_id;
                $project->project_name = $request->project_name[$key] ?? null;
                $project->details = $request->project_details[$key] ?? null;
                $project->save();
            } else {
                $projects = new UserCVProject;
                $projects->info_id = $cvinfo->id;
                $projects->user_id = $user_id;
                $projects->project_name = $request->project_name[$key] ?? null;
                $projects->details = $request->project_details[$key] ?? null;
                $projects->save();
            }
        }


        $info = UserCVInformation::where('user_id', $user_id)->latest()->first();
        $educations = UserCVEducation::where('info_id', $info->id)->get();
        $jobs = UserCVJob::where('info_id', $info->id)->get();
        $references = UserCVReference::where('info_id', $info->id)->get();
        $projects = UserCVProject::where('info_id', $info->id)->get();
        $skills = explode(',', $info->skills ?? null);

        return view('frontend.user.cv.cvinfo', compact('info', 'educations', 'jobs', 'projects', 'references', 'skills'));
    }


    public function techweb_cv_profile_edu_delete($id)
    {
        $edu = UserCVEducation::find($id);
        $edu->delete();
        return redirect()
            ->back()
            ->withFlashSuccess('Education Deleted Successfully');
    }
    public function techweb_cv_profile_job_delete($id)
    {
        $job = UserCVJob::find($id);
        $job->delete();
        return redirect()
            ->back()
            ->withFlashSuccess('Job Deleted Successfully');
    }
    public function techweb_cv_profile_project_delete($id)
    {
        $pro = UserCVProject::find($id);
        $pro->delete();
        return redirect()
            ->back()
            ->withFlashSuccess('Project Deleted Successfully');
    }
    public function techweb_cv_profile_ref_delete($id)
    {
        $ref = UserCVReference::find($id);
        $ref->delete();
        return redirect()
            ->back()
            ->withFlashSuccess('Reference Deleted Successfully');
    }


    public function techweb_cv_template()
    {
        $cv = CV::get();
        return view('backend.content.cv.index', compact('cv'));
    }
    public function techweb_cv_template_store(Request $request)
    {
        if ($request->banner) {
            $banner = time() . 'banner' . '.' . $request->banner->extension();
            $image1 = $request->banner->move(public_path('setting/cvtemplate'), $banner);
        }
        if ($request->template) {
            $template = time() . 'template' . '.' . $request->template->extension();
            $image = $request->template->move(public_path('setting/cvtemplate'), $template);
        }

        $cv = new CV;
        $cv->template = $template ?? null;
        $cv->banner = $banner ?? null;
        $cv->save();
        return back()->withFlashSuccess('CV Template uploaded Successfully');
    }
    public function index()
    {
        $cv = CV::get();
        $banner = CV::whereNotNull('banner')->latest()->first();
        return view('frontend.cv.template', compact('cv', 'banner'));
    }
    public function techweb_template($id)
    {
        if (auth()->check()) {

            $user_id = auth()->user()->id;
            $info = UserCVInformation::where('user_id', $user_id)->latest()->first();
            if ($info) {
                $educations = UserCVEducation::where('info_id', $info->id)->get();
                $jobs = UserCVJob::where('info_id', $info->id)->get();
                $references = UserCVReference::where('info_id', $info->id)->get();
                $projects = UserCVProject::where('info_id', $info->id)->get();
                $skills = explode(',', $info->skills ?? null);
            } else {
                return redirect()->route('frontend.user.cv.information');
            }


            if ($id == 1) {
                return view('frontend.cv.template1', compact('info', 'educations', 'jobs', 'projects', 'references', 'skills'));
            }
            if ($id == 2) {
                return view('frontend.cv.template2', compact('info', 'educations', 'jobs', 'projects', 'references', 'skills'));
            }
            if ($id == 3) {
                return view('frontend.cv.template3', compact('info', 'educations', 'jobs', 'projects', 'references', 'skills'));
            }
        } else {
            return view('frontend.auth.login');
        }
    }
}
