<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Club;
use Illuminate\Support\Facades\File;

class ClubController extends Controller
{
    public function club()
    {
        $clubs = Club::get();
        return view('backend.content.club.index', compact('clubs'));
    }

    public function clubstore(Request $request)
    {
        $club = new Club;
        if ($request->banner) {
            $banner = time() . 'clubbanner' . '.' . $request->banner->extension();
            $image = $request->banner->move(public_path('setting/team'), $banner);
        }
        if ($request->logo) {
            $logo = time() . 'clublogo' . '.' . $request->logo->extension();
            $image1 = $request->logo->move(public_path('setting/team'), $logo);
        }
        $club->name = $request->name ?? null;
        $club->address = $request->address ?? null;
        $club->type = $request->type ?? null;
        $club->phone = $request->phone ?? null;
        $club->description = $request->description ?? null;
        $club->banner = $banner ?? null;
        $club->logo = $logo ?? null;
        $club->save();

        return redirect()->back()->withFlashSuccess('Club Stored Successfully');
    }
    public function clubedit($id)
    {
        $club = Club::find($id);
        return view('backend.content.club.edit', compact('club'));
    }
    public function clubupdate(Request $request)
    {
        $club = Club::find($request->id);
        if ($request->banner) {
            $photo_path = public_path('setting/team/') . $club->banner;
            if (File::exists($photo_path)) {
                File::delete($photo_path);
            }
            $banner = time() . 'clubbanner' . '.' . $request->banner->extension();
            $image = $request->banner->move(public_path('setting/team'), $banner);
        }
        if ($request->logo) {
            $photo_path = public_path('setting/team/') . $club->logo;
            if (File::exists($photo_path)) {
                File::delete($photo_path);
            }
            $logo = time() . 'clublogo' . '.' . $request->logo->extension();
            $image1 = $request->logo->move(public_path('setting/team'), $logo);
        }
        $club->name = $request->name ?? null;
        $club->type = $request->type ?? null;
        $club->address = $request->address ?? null;
        $club->phone = $request->phone ?? null;
        $club->description = $request->description ?? null;
        $club->banner = $banner ?? $club->banner;
        $club->logo = $logo ??  $club->logo;
        $club->save();

        return redirect('/admin/club')->withFlashSuccess('Club Updated Successfully');
    }
    public function clubindex($type)
    {
        $clubs = Club::where('type', $type)->get();
        $clubbanner = Club::whereNotNull('banner')->latest()->first();
        return view('frontend.club.index', compact('clubs', 'clubbanner'));
    }
}
