<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User\EasyPaisaMangement;
use App\Models\User\PlanDetails;
use App\Models\User\ReferalLevel;
use App\Models\User\Setting;
use App\Models\User\verificationText;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function allLevels()
    {
        $levels = ReferalLevel::where('status','1')->get();
        return view('admin.setting.level',compact('levels'));
    }

    public function editLevel($id)
    {
        $level = ReferalLevel::find($id);
        return view('admin.setting.editlevel');
    }

    public function updateLevel(Request $request,$id)
    {
        $level = ReferalLevel::find($id);
        $level->level1 = $request->level1;
        $level->level2 = $request->level2;
        $level->level3 = $request->level3;
        $level->level4 = $request->level4;
        $level->level5 = $request->level5;
        $level->level6 = $request->level6;
        $level->level7 = $request->level7;
        $level->level8 = $request->level8;
        $level->level9 = $request->level9;
        $level->level10 = $request->level10;
        $level->save();
        return redirect()->back()->with('success','Level Changed successfully');
    }

    // Widthraw Limits

    public function widthrawLimites()
    {
        $limites = Setting::where('status','1')->get();
        return view('admin.setting.widthraw.limite',compact('limites'));
    }

    public function editWidthrawLimites($id)
    {
        $limite = Setting::find($id);
        return view('admin.setting.widthraw.editlimite',compact('limite'));
    }

    public function updateLimite(Request $request,$id)
    {
        $limite = Setting::find($id);
        $limite->mini_widthraw = $request->mini_widthraw;
        $limite->max_widthraw = $request->max_widthraw;
        $limite->planA = $request->planA;
        $limite->planB = $request->planB;
        $limite->planC = $request->planC;
        $limite->save();
        return redirect()->back()->with('success','Limite updated successfully');
    }

    public function text()
    {
        $texts = verificationText::where('status','1')->get();
        return view('admin.setting.text.index',compact('texts'));
    }

    public function editText($id)
    {
        $text = verificationText::find($id);
        return view('admin.setting.text.edit',compact('text'));
    }

    public function updateText(Request $request,$id)
    {
        $text = verificationText::find($id);
        $text->text = $request->text;
        $text->save();
        return redirect()->back()->with('success','Text updated successfully');
    }

    public function easypaisa()
    {
        $easypaisa = EasyPaisaMangement::where('status','1')->get();
        return view('admin.setting.easypaisa.index',compact('easypaisa'));
    }

    public function editEasypaisa($id)
    {
        $easypaisa = EasyPaisaMangement::find($id);
        return view('admin.setting.easypaisa.edit',compact('easypaisa'));
    }

    public function updateEasypaisa(Request $request,$id)
    {
        $easypaisa = EasyPaisaMangement::find($id);
        $easypaisa->easy_num = $request->esay_num;
        $easypaisa->easy_name = $request->esay_name;
        $easypaisa->sava();
        return redirect()->back()->with('success','Easypaisa details updated');
    }

    public function homePlans()
    {
        $home_plans = PlanDetails::where('status','1')->get();
        return view('admin.setting.plan.all',compact('home_plans'));
    }

    public function editPlan($id)
    {
        $home_plan = PlanDetails::find($id);
        return view('admin.setting.plan.edit',compact('home_plan'));
    }

    public function updatePlan(Request $request,$id)
    {
        $home_plan = PlanDetails::find($id);
        $home_plan->plan_name = $request->plan_name;
        $home_plan->details = $request->details;
        $home_plan->save();
        return redirect()->back()->with('success','Plans details updated');
    }

}
