<?php

namespace App\Http\Controllers;

use App\Models\AgentSetting;
use Illuminate\Http\Request;

class AgentSettingController extends Controller
{
    /**
     * method for rendering index page
     */
    public function index()
    {
        $setting = AgentSetting::query()->first();
        return view('agents.settings.index', compact('setting'));
    }

    /**
     * method for store agent setting detail
     * @param Request $request
     */
    public function store(Request $request)
    {
        $setting = AgentSetting::where('id', 1)->updateOrCreate(
            ['id' => $request->id],
            [
                'min_amount' => $request->min_amount,
                'min_client' => $request->min_client,
                'discount_percentage' => $request->discount_percentage,
            ]);
        return back()->withFlashSuccess('Agent setting update successfully');
    }
}
