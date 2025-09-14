<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\admin\PlanTasks;
use App\Models\admin\Task;
use App\Models\admin\Whatsapp;
use App\Models\User;
use App\Models\User\History;
use App\Models\User\officialChannel;
use App\Models\User\Setting;
use App\Models\User\Wallet;
use App\Models\User\WidthrawReq;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index()
    {
        $channel_link = officialChannel::first();
        $whatsapp = Whatsapp::first();
        return view('user.dashboard', compact('whatsapp', 'channel_link'));
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

        // check if user refer someone in a weak or not
        $sevenDaysAgo = Carbon::now()->subDays(7);
        $refer_check = User::where('referral', auth()->user()->email)->whereDate('created_at', '>=', $sevenDaysAgo)->get();
        if ($refer_check == null) {
            return response()->redirect()->back('error', 'You have not refer anyone in a week');
        }

        $widthraw_amount = $validated['amount'];
        if (auth()->user()->balance < $widthraw_amount) {
            return redirect()->back()->with('error', 'You have not enough balance');
        }
        // check limit of withdraw
        $check_limit = Setting::where('status', '1')->first();
        // amount should be not bigger than limit
        if ($check_limit->min_widthraw > $validated['amount']) {
            return redirect()->back()->with('error', 'The Minimum amount you can withdraw is ' . $check_limit->min_widthraw . '.');
        }
        // check if user get his first withdraw more than 50 pkr and its his second withdraw
        $check_first_widthraw = WidthrawReq::where('user_id', auth()->user()->id)->where('status', 'approved')->first();
        if ($check_first_widthraw) {
            if ($check_first_widthraw->amount <= 50) {
                return redirect()->back()->with('error', 'You have withdraw more than 500 in second time.');
            }
        }

        // check pending request
        $check_request = WidthrawReq::where('user_id', auth()->user()->id)->where('status', 'pending')->first();
        if ($check_request !== null) {
            return redirect()->back()->with('error', 'Wait for your first request to approve then you can request for more widthraw');
        }

        $widthraw = new WidthrawReq();
        $widthraw->user_id = auth()->user()->id;
        $widthraw->user_name = $validated['user_name'];
        $widthraw->account = $validated['account'];
        $widthraw->type = $validated['type'];
        $widthraw->amount = $validated['amount'];
        $widthraw->save();
        return redirect()->back()->with('success', 'Your widthraw request submited successfully');
    }

    public function task()
    {
        $tasks = PlanTasks::where('level', auth()->user()->level)->where('plan', auth()->user()->package)->get();
        return view('user.work.task', compact('tasks'));
    }

    public function profit($id)
    {
        $task = PlanTasks::find($id);

        // check if user already got profit for this task today

        $profit_check = History::where('user_id', auth()->user()->id)->where('task_id', $task->id)->whereDate('created_at', Carbon::today())->first();
        if ($profit_check) {
            return redirect()->back()->with('error', 'You already get profit of this task today');
        } else {
            $user = User::find(auth()->user()->id);
            $user->balance += $task->price;
            $user->save();
            // making history
            $history = new History();
            $history->user_id = auth()->user()->id;
            $history->task_id = $task->id;
            $history->amount = $task->price;
            $history->type = 'profit';
            $history->save();
            return redirect()->back()->with('success', 'You have got task amount successfully');
        }
    }


    public function earnMore()
    {
        $tasks = Task::where('level', auth()->user()->level)->where('plan', auth()->user()->package)->get();
        return view('user.work.earnMore', compact('tasks'));
    }

    public function history()
    {
        $history = WidthrawReq::where('user_id', auth()->user()->id)->get();
        return view('user.account.history', compact('history'));
    }

    public function team()
    {
        $referrals = User::where('referral', auth()->user()->email)->get();
        return view('user.work.team', compact('referrals'));
    }

    public function exter_money($id)
    {
        $task_item = Task::find($id);
        // check if this task has already in wallet today
        $task_check = Wallet::where('user_id', auth()->user()->id)->where('product_id', $task_item->id)->whereDate('created_at', today())->first();
        if ($task_check != null) {
            return redirect()->back()->with('error', 'You have already got this task amount today');
        }
        // saving in wallet
        $wallet = new Wallet();
        $wallet->user_id = auth()->user()->id;
        $wallet->product_id = $task_item->id;
        $wallet->amount = $task_item->price;
        $wallet->save();
        return redirect()->back()->with('success', 'You have got task amount successfully');
    }

    public function withdraw_return()
    {
        return redirect()->back()->with('error', 'For Withdraw Your Level Must Be 10');
    }
}
