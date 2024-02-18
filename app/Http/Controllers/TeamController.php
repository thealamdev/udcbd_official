<?php

namespace App\Http\Controllers;

use App\Domains\Auth\Models\User;
use Illuminate\Http\Request;
use App\Models\Team;
use Illuminate\Support\Facades\File;

class TeamController extends Controller
{
    public function tech_web_team()
    {
        $team = Team::get();
        return view('backend.content.team.index', compact('team'));
    }
    public function tech_web_team_store(Request $request)
    {
        $team = new Team;
        if ($request->image) {
            $newImageName = time() . '.' . $request->image->extension();
            $image = $request->image->move(public_path('setting/team'), $newImageName);
        }
        if ($request->banner) {
            $newImageName1 = time() . 'banner' . '.' . $request->banner->extension();
            $image = $request->banner->move(public_path('setting/team'), $newImageName1);
        }
        $team->type = $request->type ?? null;
        $team->name = $request->name ?? null;
        $team->description = $request->description ?? null;
        $team->image = $newImageName ?? null;
        $team->banner = $newImageName1 ?? null;
        $team->save();

        return redirect()->back()->withFlashSuccess('Team Stored Successfully');
    }
    public function tech_web_team_edit($id)
    {
        $team = Team::find($id);
        return view('backend.content.team.edit', compact('team'));
    }
    public function tech_web_team_update(Request $request)
    {
        $team = Team::find($request->id);
        $photo_path = public_path('setting/team/') . $team->image;
        $photo_path2 = public_path('setting/team/') . $team->banner;
        if ($request->image) {
            if (File::exists($photo_path)) {
                File::delete($photo_path);
            }
            $newImageName = time() . '.' . $request->image->extension();
            $image = $request->image->move(public_path('setting/team'), $newImageName);
        }
        if ($request->banner) {
            if (File::exists($photo_path2)) {
                File::delete($photo_path2);
            }
            $newImageName1 = time() . 'banner' . '.' . $request->banner->extension();
            $image = $request->banner->move(public_path('setting/team'), $newImageName1);
        }
        $team->type = $request->type ?? $team->type;
        $team->name = $request->name ?? $team->name;
        $team->description = $request->description ?? $team->description;
        $team->image = $newImageName ?? $team->image;
        $team->banner = $newImageName1 ??  $team->banner;
        $team->save();
        return redirect('/admin/settings/team')->withFlashSuccess('Team Updated Successfully');
    }

    public function tech_web_team_player($type)
    {
        $team = Team::where('type', $type)->get();
        $banner = Team::where('type', $type)->whereNotNull('banner')->latest()->first();

        return view('frontend.team.index', compact('team', 'banner'));
    }

    /**
     * topup method for balance.
     */

    public function topUp()
    {
        return view('backend.content.about.topup.index');
    }
}
