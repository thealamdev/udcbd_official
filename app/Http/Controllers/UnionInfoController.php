<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UnionInfo;
use App\Models\Division;
use App\Models\District;
use App\Models\Upzilla;
use App\Models\Union;
use Illuminate\Support\Facades\File;

class UnionInfoController extends Controller
{
    public function techweb_union_index()
    {
        $divisions = Division::get();
        $union = UnionInfo::where('user_id', auth()->user()->id)->latest()->first();
        $div = Division::find($union->division_id);
        $district = District::find($union->district_id);
        $upzilla = Upzilla::find($union->upazilla_id);
        $uni = Union::find($union->union_id);

        return view('frontend.user.union_info.index', compact('union', 'divisions', 'div', 'district', 'upzilla', 'uni'));
    }
    public function techweb_union_store(Request $request)
    {
        if ($request->union_id) {
            $union = UnionInfo::find($request->union_id);
            $union->division_id = $request->present_division;
            $union->district_id = $request->present_district;
            $union->upazilla_id = $request->present_thana;
            $union->union_id = $request->present_union;
            $union->vie = $request->vie;
            $union->zee = $request->zee;
            $union->upe = $request->upe;
            $union->une = $request->une;
            $union->noe = $request->noe;
            $union->che = $request->che;
            $union->user_id = auth()->user()->id;
            $union->chairman = $request->chairman_name;
            $union->union_no = $request->union_no;
            if ($request->logo) {
                $photo_path = public_path('setting/unioninfo/') . $union->logo;
                if (File::exists($photo_path)) {
                    File::delete($photo_path);
                }
                $logo = time() . 'union' . $request->union_id . '.' . $request->logo->extension();
                $image = $request->logo->move(public_path('setting/unioninfo'), $logo);
            }
            $union->logo = $logo;
            $union->save();
        } else {
            $union = new UnionInfo;
            $union->division_id = $request->present_division;
            $union->district_id = $request->present_district;
            $union->upazilla_id = $request->present_thana;
            $union->union_id = $request->present_union;
            $union->vie = $request->vie;
            $union->zee = $request->zee;
            $union->upe = $request->upe;
            $union->une = $request->une;
            $union->noe = $request->noe;
            $union->che = $request->che;
            $union->user_id = auth()->user()->id;
            $union->chairman = $request->chairman_name;
            $union->union_no = $request->union_no;
            if ($request->logo) {
                $logo = time() . 'union' . $request->union_id . '.' . $request->logo->extension();
                $image = $request->logo->move(public_path('setting/unioninfo'), $logo);
            }
            $union->logo = $logo;
            $union->save();
        }
        return back();
    }
}
