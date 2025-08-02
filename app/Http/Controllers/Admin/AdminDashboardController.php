<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

use App\Models\User\ReferalLevel;
use App\Models\User\Setting;
use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        return view('admin.dashboard');
    }

    public function editUser($id)
    {
        $user = User::find($id);
        return view('admin.user.edit', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        $user = User::find($id);
        $user->balance = $request->balance;
        $user->save();
        return redirect()->back()->with('success', 'User Details Updated');
    }

    public function pending()
    {
        $users = User::where('status', 'pending')->with('trxIds')->get();
        return view('admin.user.pending', compact('users'));
    }

    public function makeApprove($id)
    {
        $levelCheck = ReferalLevel::where('status', 1)->first();
        $level1 = $levelCheck->level1;
        $level2 = $levelCheck->level2;
        $level3 = $levelCheck->level3;
        $level4 = $levelCheck->level4;
        $level5 = $levelCheck->level5;
        $level6 = $levelCheck->level6;
        $level7 = $levelCheck->level7;
        $level8 = $levelCheck->level8;
        $level9 = $levelCheck->level9;
        $level10 = $levelCheck->level10;

        // Taking the admin commission
        $setting = Setting::where('status', '1')->first();
        $silver = $setting->planA;
        $silver_Second_Commission = $silver * 15 / 100;
        $silver_Third_Commission = $silver * 5 / 100;
        // getting gold commission
        $gold = $setting->planB;
        $gold_Second_Commission = $gold * 15 / 100;
        $gold_Third_Commission = $gold * 5 / 100;
        // Getting dimond Commissions
        $dimond = $setting->planC;
        $dimond_Second_Commission = $dimond * 15 / 100;
        $dimond_Third_Commission = $dimond * 5 / 100;

        $user = User::find($id);
        $user->status = 'approved';
        $user->save();
        // getting user package
        $userPlan = $user->package;

        if ($userPlan == 'Silver') {
            $firstUpliner = User::where('email', $user->referral)->where('status', 'approved')->first();
            if ($firstUpliner == '') {
                return redirect()->back()->with('success', 'Account has beed Approved successfully');
            } else {
                $firstUpliner->balance += $silver;
                // giving upliner his level
                $allUsers = User::where('referral', $firstUpliner->email)->where('status', 'approved')->get();
                $referCount = $allUsers->count();

                if ($allUsers != '') {
                    if ($referCount <= 4) {
                        $firstUpliner->level = 'Level 0';
                        $firstUpliner->save();
                    }
                    if ($referCount >= $level1) {
                        $firstUpliner->level = 'Level 1';
                        $firstUpliner->save();
                    }
                    if ($referCount >= $level2) {
                        $firstUpliner->level = 'Level 2';
                        $firstUpliner->save();
                    }
                    if ($referCount >= $level3) {
                        $firstUpliner->level = 'Level 3';
                        $firstUpliner->save();
                    }
                    if ($referCount >= $level4) {
                        $firstUpliner->level = 'Level 4';
                        $firstUpliner->save();
                    }
                    if ($referCount >= $level5) {
                        $firstUpliner->level = 'Level 5';
                        $firstUpliner->save();
                    }
                    if ($referCount >= $level6) {
                        $firstUpliner->level = 'Level 6';
                        $firstUpliner->save();
                    }
                    if ($referCount >= $level7) {
                        $firstUpliner->level = 'Level 7';
                        $firstUpliner->save();
                    }
                    if ($referCount >= $level8) {
                        $firstUpliner->level = 'Level 8';
                        $firstUpliner->save();
                    }
                    if ($referCount >= $level9) {
                        $firstUpliner->level = 'Level 9';
                        $firstUpliner->save();
                    }
                    if ($referCount >= $level10) {
                        $firstUpliner->level = 'Level 10';
                        $firstUpliner->save();
                    }
                }

                //  Second Upliner
                $indirectCommission1 = $silver_Second_Commission;
                // getting user
                $secondUpliner = User::where('email', $firstUpliner->referral)->where('status', 'approved')->first();
                if ($secondUpliner == '') {
                    return redirect()->back()->with('success', 'Account has beed Approved successfully');
                } else {
                    $secondUpliner->balance += $indirectCommission1;
                    $secondUpliner->save();
                }
                // Third UPliner
                $indirectCommission2 = $silver_Third_Commission;
                // getting third person;
                $thirdUpliner = User::where('email', $secondUpliner->referral)->where('status', 'approved')->first();
                if ($thirdUpliner == '') {
                    return redirect()->back()->with('success', 'Account has beed Approved successfully');
                } else {
                    $thirdUpliner->balance += $indirectCommission2;
                    $thirdUpliner->save();
                }
            }
        }

        if ($userPlan == 'Gold') {
            $firstUpliner = User::where('email', $user->referral)->where('status', 'approved')->first();
            if ($firstUpliner == '') {
                return redirect()->back()->with('success', 'Account has beed Approved successfully');
            } else {
                $firstUpliner->balance += $gold;
                // giving upliner his level
                $mainUser = User::where('referral', $firstUpliner->email)->where('status', 'approved')->get();
                $referCount = $mainUser->count();

                if ($mainUser != '') {
                    if ($referCount <= 4) {
                        $firstUpliner->level = 'Level 0';
                        $firstUpliner->save();
                    }
                    if ($referCount >= $level1) {
                        $firstUpliner->level = 'Level 1';
                        $firstUpliner->save();
                    }
                    if ($referCount >= $level2) {
                        $firstUpliner->level = 'Level 2';
                        $firstUpliner->save();
                    }
                    if ($referCount >= $level3) {
                        $firstUpliner->level = 'Level 3';
                        $firstUpliner->save();
                    }
                    if ($referCount >= $level4) {
                        $firstUpliner->level = 'Level 4';
                        $firstUpliner->save();
                    }
                    if ($referCount >= $level5) {
                        $firstUpliner->level = 'Level 5';
                        $firstUpliner->save();
                    }
                    if ($referCount >= $level6) {
                        $firstUpliner->level = 'Level 6';
                        $firstUpliner->save();
                    }
                    if ($referCount >= $level7) {
                        $firstUpliner->level = 'Level 7';
                        $firstUpliner->save();
                    }
                    if ($referCount >= $level8) {
                        $firstUpliner->level = 'Level 8';
                        $firstUpliner->save();
                    }
                    if ($referCount >= $level9) {
                        $firstUpliner->level = 'Level 9';
                        $firstUpliner->save();
                    }
                    if ($referCount >= $level10) {
                        $firstUpliner->level = 'Level 10';
                        $firstUpliner->save();
                    }
                }

                //  Second Upliner
                $indirectCommission1 = $gold_Second_Commission;
                // getting user
                $secondUpliner = User::where('email', $firstUpliner->referral)->where('status', 'approved')->first();
                if ($secondUpliner == '') {
                    return redirect()->back()->with('success', 'Account has beed Approved successfully');
                } else {
                    $secondUpliner->balance += $indirectCommission1;
                    $secondUpliner->save();
                }
                // Third UPliner
                $indirectCommission2 = $gold_Third_Commission;
                // getting third person;
                $thirdUpliner = User::where('email', $secondUpliner->referral)->where('status', 'approved')->first();
                if ($thirdUpliner == '') {
                    return redirect()->back()->with('success', 'Account has beed Approved successfully');
                } else {
                    $thirdUpliner->balance += $indirectCommission2;
                    $thirdUpliner->save();
                }
            }
        }

        if ($userPlan == 'Dimond') {
            $firstUpliner = User::where('email', $user->referral)->where('status', 'approved')->first();
            if ($firstUpliner == '') {
                return redirect()->back()->with('success', 'Account has beed Approved successfully');
            } else {
                $firstUpliner->balance += $dimond;
                // giving upliner his level
                $mainUser = User::where('referral', $firstUpliner->email)->where('status', 'approved')->get();
                $referCount = $mainUser->count();

                if ($mainUser != '') {
                    if ($referCount <= 4) {
                        $firstUpliner->level = 'Level 0';
                        $firstUpliner->save();
                    }
                    if ($referCount >= $level1) {
                        $firstUpliner->level = 'Level 1';
                        $firstUpliner->save();
                    }
                    if ($referCount >= $level2) {
                        $firstUpliner->level = 'Level 2';
                        $firstUpliner->save();
                    }
                    if ($referCount >= $level3) {
                        $firstUpliner->level = 'Level 3';
                        $firstUpliner->save();
                    }
                    if ($referCount >= $level4) {
                        $firstUpliner->level = 'Level 4';
                        $firstUpliner->save();
                    }
                    if ($referCount >= $level5) {
                        $firstUpliner->level = 'Level 5';
                        $firstUpliner->save();
                    }
                    if ($referCount >= $level6) {
                        $firstUpliner->level = 'Level 6';
                        $firstUpliner->save();
                    }
                    if ($referCount >= $level7) {
                        $firstUpliner->level = 'Level 7';
                        $firstUpliner->save();
                    }
                    if ($referCount >= $level8) {
                        $firstUpliner->level = 'Level 8';
                        $firstUpliner->save();
                    }
                    if ($referCount >= $level9) {
                        $firstUpliner->level = 'Level 9';
                        $firstUpliner->save();
                    }
                    if ($referCount >= $level10) {
                        $firstUpliner->level = 'Level 10';
                        $firstUpliner->save();
                    }
                }

                //  Second Upliner
                $indirectCommission1 = $dimond_Second_Commission;
                // getting user
                $secondUpliner = User::where('email', $firstUpliner->referral)->where('status', 'approved')->first();
                if ($secondUpliner == '') {
                    return redirect()->back()->with('success', 'Account has beed Approved successfully');
                } else {
                    $secondUpliner->balance += $indirectCommission1;
                    $secondUpliner->save();
                }
                // Third UPliner
                $indirectCommission2 = $dimond_Third_Commission;
                // getting third person;
                $thirdUpliner = User::where('email', $secondUpliner->referral)->where('status', 'approved')->first();
                if ($thirdUpliner == '') {
                    return redirect()->back()->with('success', 'Account has beed Approved successfully');
                } else {
                    $thirdUpliner->balance += $indirectCommission2;
                    $thirdUpliner->save();
                }
            }
        }



        return redirect()->back()->with('success', 'User Approved Successfully');
    }

    public function approved()
    {
        $users = User::where('status', 'approved')->get();
        return view('admin.user.approved', compact('users'));
    }

    public function makeReject($id)
    {
        $user = User::find($id);
        $user->status = 'rejected';
        $user->save();
        return redirect()->back()->with('success', 'User has been rejected successfully');
    }

    public function rejected()
    {
        $users = User::where('status', 'rejected')->get();
        return view('admin.user.rejected', compact('users'));
    }

    public function makePending($id)
    {
        $user = User::find($id);
        $user->status = 'pending';
        $user->save();
        return redirect()->back()->with('success', 'User has been Pending now');
    }
}
