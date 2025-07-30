<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\admin\Task;
use App\Models\User;
use App\Models\User\WidthrawReq;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index()
    {
        return view('user.dashboard');
    }

    public function widthraw()
    {
        return view('user.account.widthraw');
    }

    public function storeWidthraw(Request $request)
    {
        $validated = $request->validate([
            'user_name' => 'required',
            'account' => 'required',
            'type' => 'required',
            'amount' => 'required',
        ]);

        $widthraw_amount = $validated['amount'];
        if(auth()->user()->balance < $widthraw_amount)
        {
            return redirect()->back()->with('error','You have not enough balance');
        }

        $check_request = WidthrawReq::where('user_id',auth()->user()->id)->where('status','pending')->first();
        if($check_request != null)
        {
            return redirect()->back()->with('error','Wait for your first request to approve then you can request for more widthraw');
        }

        $widthraw = new WidthrawReq();
        $widthraw->user_id = auth()->user()->id;
        $widthraw->user_name = $validated['user_name'];
        $widthraw->account = $validated['account'];
        $widthraw->type = $validated['type'];
        $widthraw->amount = $validated['amount'];
        $widthraw->save();
        return redirect()->back()->with('success','Your widthraw request submited successfully');

    }

    public function task()
    {
        $tasks = Task::get();
        return view('user.work.task',compact('tasks'));
    }

    public function history()
    {
        $history = WidthrawReq::where('user_id',auth()->user()->id)->get();
        return view('user.account.history',compact('history'));
    }

    public function team()
    {
        $referrals = User::where('referral',auth()->user()->email)->get();
        return view('user.work.team',compact('referrals'));
    }


}
