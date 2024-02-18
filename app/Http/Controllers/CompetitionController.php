<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\CourseType;
use App\Models\TrainingUserInfo;
use App\Models\TrainingApplication;
use Illuminate\Support\Facades\File;

class CompetitionController extends Controller
{
    public function tech_web_competition()
    {
        $competition = Course::get();
        $type = CourseType::get();

        return view('backend.content.competition.index', compact('competition', 'type'));
    }
    public function tech_web_competition_store(Request $request)
    {
        if ($request->banner_image) {
            $banner = time() . 'banner' . '.' . $request->banner_image->extension();
            $banner_image = $request->banner_image->move(public_path('setting/competition'), $banner);
        } else {
            $banner = null;
        }
        if ($request->photo) {
            $photo = time() . 'photo' . '.' . $request->photo->extension();
            $image = $request->photo->move(public_path('setting/competition'), $photo);
        } else {
            $photo = null;
        }

        $competition = new Course;
        $competition->title = $request->title;
        $competition->type_id = $request->type;
        $competition->link = $request->link ?? null;
        $competition->password = $request->password ?? null;
        $competition->address = $request->address;
        $competition->description1 = $request->description1;
        $competition->description2 = $request->description2;
        $competition->banner_image = $banner;
        $competition->photo = $photo;
        $competition->save();
        return redirect()->back()->withFlashSuccess('Course Created Successfully');
    }
    public function tech_web_competition_edit($id)
    {
        $competition = Course::find($id);
        $type = CourseType::get();
        return view('backend.content.competition.edit', compact('competition', 'type'));
    }
    public function tech_web_competition_update(Request $request)
    {
        $competition = Course::find($request->id);
        if ($request->banner_image) {
            $photo_path = public_path('setting/competition/') . $competition->banner_image;
            if (File::exists($photo_path)) {
                File::delete($photo_path);
            }
            $banner = time() . 'banner' . '.' . $request->banner_image->extension();
            $banner_image = $request->banner_image->move(public_path('setting/competition'), $banner);
        } else {
            $banner = $competition->banner_image;
        }
        if ($request->photo) {
            $photo_path = public_path('setting/competition/') . $competition->photo;
            if (File::exists($photo_path)) {
                File::delete($photo_path);
            }
            $photo = time() . 'photo' . '.' . $request->photo->extension();
            $image = $request->photo->move(public_path('setting/competition'), $photo);
        } else {
            $photo = $competition->photo;
        }

        $competition->title = $request->title ?? $competition->title;
        $competition->type_id = $request->type ?? $competition->type_id;
        $competition->link = $request->link ?? $competition->link;
        $competition->password = $request->password ?? $competition->password;
        $competition->address = $request->address ?? $competition->address;
        $competition->description1 = $request->description1 ?? $competition->description1;
        $competition->description2 = $request->description2 ?? $competition->description2;
        $competition->banner_image = $banner;
        $competition->photo = $photo;
        $competition->save();
        return redirect('/admin/course')->withFlashSuccess('Course Updated Successfully');
    }

    public function tech_web_course_type_details($id)
    {
        $competition = Course::where('type_id', $id)->get();
        $banner = Course::where('type_id', $id)->whereNotNull('banner_image')->latest()->first();
        return view('frontend.competition.courseType', compact('competition', 'banner'));
    }
    public function tech_web_competition_details($id)
    {
        $competition = Course::find($id);
        return view('frontend.competition.details', compact('competition'));
    }

    public function tech_web_training_application_store(Request $request)
    {
        $user_info = TrainingUserInfo::where('mobile', $request->mobile)->latest()->first();
        if ($user_info == null) {
            $info = new TrainingUserInfo;

            if ($request->voter_birth_photo) {
                $voterphoto = time() . 'trainingvoter' . '.' . $request->voter_birth_photo->extension();
                $image = $request->voter_birth_photo->move(public_path('setting/user-info'), $voterphoto);
            }
            if ($request->photo) {
                $photo = time() . 'user' . '.' . $request->photo->extension();
                $image = $request->photo->move(public_path('setting/user-info'), $photo);
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
        }
        $uid = $user_info->user_id ?? auth()->user()->id;
        $app = new TrainingApplication;
        $app->user_id = $user_info->user_id ?? auth()->user()->id;
        $app->training_user_info_id = $user_info->id ?? $info->id;
        $app->tracking_no = 'training' . generate_sanad_number($uid, 6);


        $app->transaction_no = null;
        $app->phone = null;
        $app->amount = null;
        $app->certificate_file = null;
        $app->permanent_village_en = null;
        $app->permanent_village_bn = null;
        $app->permanent_holding_no_en = null;
        $app->permanent_holding_no_bn = null;
        $app->permanent_road_en = null;
        $app->permanent_road_bn = null;
        $app->permanent_address_type = null;
        $app->permanent_division = null;
        $app->permanent_district = null;
        $app->permanent_thana = null;
        $app->permanent_post_office = null;
        $app->permanent_union = null;
        $app->permanent_owner_type = null;
        $app->permanent_ward_no = null;



        $app->status = $request->status;
        $app->course_id = $request->course_id;
        $app->save();
        return back();
    }

    public function tech_web_view_training_applications()
    {
        $applications = TrainingApplication::orderBy('id', 'DESC')->get();
        return view('backend.content.computer.index', compact('applications'));
    }
    public function tech_web_view_training_applicant_details($id)
    {
        $applications = TrainingApplication::find($id);
        $infos = TrainingUserInfo::find($applications->training_user_info_id);
        $sanad = Course::find($applications->course_id);
        return view('backend.content.computer.details', compact('applications', 'infos', 'sanad'));
    }

    public function tech_web_training_application_status(Request $request)
    {
        $application = TrainingApplication::find($request->application_id);
        if ($request->status) {
            $application->status = $request->status;
        }

        if ($request->certificate_file) {
            $sanad = time() . 'certificate' . '.' . $request->certificate_file->extension();
            $file = $request->certificate_file->move(public_path('setting/certificate'), $sanad);
            $application->certificate_file = $sanad;
        }

        $application->save();
        return back()->withFlashSuccess('Status changed Successfully');
    }



    public function tech_web_course_type()
    {
        $type = CourseType::get();
        return view('backend.content.computer.type.index', compact('type'));
    }
    public function tech_web_course_type_store(Request $request)
    {
        $type = new CourseType;

        if ($request->image) {
            $typeimage = time() . 'coursetype' . '.' . $request->image->extension();
            $image = $request->image->move(public_path('setting/competition'), $typeimage);
        }

        $type->type = $request->type ?? null;
        $type->image = $typeimage ?? null;
        $type->save();
        return back()->withFlashSuccess('Type Created Successfully');
    }
    public function tech_web_course_type_edit($id)
    {
        $type = CourseType::find($id);
        return view('backend.content.computer.type.edit', compact('type'));
    }
    public function tech_web_course_type_update(Request $request)
    {
        $type = CourseType::find($request->id);
        if ($request->image) {
            $photo_path = public_path('setting/competition/') . $type->image;
            if (File::exists($photo_path)) {
                File::delete($photo_path);
            }
            $typeimage = time() . 'coursetype' . '.' . $request->image->extension();
            $image = $request->image->move(public_path('setting/competition'), $typeimage);
        } else {
            $banner = $type->image;
        }
        $type->type = $request->type ?? null;
        $type->image = $typeimage ?? null;
        $type->save();
        return redirect('/admin/course-type')->withFlashSuccess('Type Updated Successfully');
    }
}
