<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Committee;
use App\Models\CommitteeType;
use Illuminate\Support\Facades\File;

class AboutController extends Controller
{
    public function tech_web_about_index()
    {
        $about = About::latest()->first();
        return view('frontend.about.index', compact('about'));
    }
    public function tech_web_about()
    {
        $about = About::latest()->first();
        return view('backend.content.about.index', compact('about'));
    }
    public function store(Request $request)
    {
        if ($request->banner_image) {
            $banner = time() . 'banner' . '.' . $request->banner_image->extension();
            $banner_image = $request->banner_image->move(public_path('setting/about'), $banner);
        } else {
            $banner = null;
        }
        if ($request->about_image) {
            $about_p = time() . 'about' . '.' . $request->about_image->extension();
            $about_image = $request->about_image->move(public_path('setting/about'), $about_p);
        } else {
            $about_p = null;
        }

        $about = new About;
        $about->banner_img = $banner;
        $about->title = $request->title;
        $about->description = $request->description;
        $about->mission = $request->mission;
        $about->vision = $request->vision;
        $about->about_image = $about_p;
        $about->save();
        return redirect()->back()->withFlashSuccess('About Created Successfully');
    }

    public function tech_web_about_edit($id)
    {
        $about = About::find($id);
        return view('backend.content.about.edit', compact('about'));
    }
    public function tech_web_about_update(Request $request)
    {
        $id = $request->about_id;
        $about = About::find($id);

        if ($request->banner_image != null) {
            $photo_path = public_path('setting/about/') . $about->banner_image;
            if (File::exists($photo_path)) {
                File::delete($photo_path);
            }
            $banner = time() . 'banner' . '.' . $request->banner_image->extension();
            $banner_image = $request->banner_image->move(public_path('setting/about'), $banner);
        } else {
            $banner = $about->banner_img;
        }
        if ($request->about_image != null) {
            $photo_path = public_path('setting/about/') . $about->about_image;
            if (File::exists($photo_path)) {
                File::delete($photo_path);
            }
            $about_p = time() . 'about' . '.' . $request->about_image->extension();
            $about_image = $request->about_image->move(public_path('setting/about'), $about_p);
        } else {
            $about_p = $about->about_image;
        }
        $about->banner_img = $banner;
        $about->title = $request->title ?? $about->title;
        $about->description = $request->description ?? $about->description;
        $about->mission = $request->mission ?? $about->mission;
        $about->vision = $request->vision ?? $about->vision;
        $about->about_image = $about_p;
        $about->save();
        return redirect('/admin/about/settings')->withFlashSuccess('About Updated Successfully');
    }

    // committee type
    public function tech_web_committee_type()
    {
        $type = CommitteeType::get();
        return view('backend.content.about.committee.type.index', compact('type'));
    }
    public function tech_web_committee_type_edit($id)
    {
        $type = CommitteeType::find($id);
        return view('backend.content.about.committee.type.edit', compact('type'));
    }
    public function tech_web_committee_type_store(Request $request)
    {
        $type = new CommitteeType;
        $type->type = $request->type ?? null;
        $type->description = $request->description ?? null;
        $type->save();
        return redirect('/admin/committee/type')->withFlashSuccess('Committee Type Created Successfully');
    }
    public function tech_web_committee_type_update(Request $request)
    {
        $type = CommitteeType::find($request->id);
        $type->type = $request->type ?? null;
        $type->description = $request->description ?? null;
        $type->save();
        return redirect('/admin/committee/type')->withFlashSuccess('Committee Type Updated Successfully');
    }
    // committee type end



    // committee

    public function tech_web_committee()
    {
        $type = CommitteeType::get();
        $committees = Committee::get();
        return view('backend.content.about.committee.index', compact('type', 'committees'));
    }

    public function tech_web_committee_store(Request $request)
    {
        if ($request->photo) {
            $photo = time() . 'photo' . '.' . $request->photo->extension();
            $committee_photo = $request->photo->move(public_path('setting/committee'), $photo);
        } else {
            $photo = null;
        }
        $committee = new Committee;
        $committee->name = $request->name ?? null;
        $committee->type_id = $request->type_id ?? null;
        $committee->details = $request->details ?? null;
        $committee->position = $request->position ?? null;
        $committee->description = $request->description ?? null;
        $committee->has_description = $request->has_description ?? null;
        $committee->serial = $request->serial ?? null;
        $committee->color = $request->color ?? null;
        $committee->section = $request->section ?? null;
        $committee->photo = $photo;
        $committee->save();
        return redirect('/admin/committee')->withFlashSuccess('Committee Created Successfully');
    }
    public function tech_web_committee_edit($id)
    {
        $type = CommitteeType::get();
        $committee = Committee::find($id);
        return view('backend.content.about.committee.edit', compact('committee', 'type'));
    }

    public function tech_web_committee_update(Request $request)
    {
        $committee = Committee::find($request->id);
        if ($request->photo) {
            $photo_path = public_path('setting/committee/') . $committee->photo;
            if (File::exists($photo_path)) {
                File::delete($photo_path);
            }
            $photo = time() . 'photo' . '.' . $request->photo->extension();
            $committee_photo = $request->photo->move(public_path('setting/committee'), $photo);
        } else {
            $photo = $committee->photo;
        }
        $committee->name = $request->name ?? $committee->name;
        $committee->type_id = $request->type_id ?? $committee->type_id;
        $committee->details = $request->details ?? $committee->details;
        $committee->position = $request->position ?? $committee->position;
        $committee->description = $request->description ?? $committee->description;
        $committee->has_description = $request->has_description ?? $committee->has_description;
        $committee->serial = $request->serial ?? $committee->serial;
        $committee->color = $request->color ?? $committee->color;
        $committee->section = $request->section ?? $committee->section;
        $committee->photo = $photo;
        $committee->save();
        return redirect('/admin/committee')->withFlashSuccess('Committee Updated Successfully');
    }
    // committee end



    // committee frontend
    public  function tech_web_about_committee_index()
    {
        $type = CommitteeType::get();
        $committees = Committee::get();
        $about = About::latest()->first();
        return view('frontend.about.committee.index', compact('type', 'committees', 'about'));
    }
    // committee frontend end


    public  function tech_web_about_executive_board_index($id)
    {
        $type = CommitteeType::find($id);
        $committees = Committee::where('type_id', $id)->get();
        $about = About::latest()->first();
        return view('frontend.about.executive_board.index', compact('type', 'committees', 'about'));
    }
    public  function tech_web_about_honorable_members_index()
    {
        $type = CommitteeType::get();
        $committees = Committee::where('section', 'honorable-members')->get();
        $about = About::latest()->first();
        return view('frontend.about.member.index', compact('type', 'committees', 'about'));
    }
    public  function tech_web_about_ambassador_index()
    {
        $type = CommitteeType::get();
        $committees = Committee::where('section', 'honorable-members')->get();
        $about = About::latest()->first();
        return view('frontend.about.ambassador.index', compact('type', 'committees', 'about'));
    }
}
