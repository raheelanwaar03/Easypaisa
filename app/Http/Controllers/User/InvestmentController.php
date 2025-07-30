<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\admin\Plans;
use App\Models\User;
use App\Models\User\BuyPlan;
use App\Models\User\EasyPaisaMangement;
use App\Models\User\GivenProfit;
use App\Models\User\Wallet;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InvestmentController extends Controller
{
    public function index()
    {
        $plans = Plans::get();
        return view('user.invest.index',compact('plans'));
    }

    public function buyPlan($id)
    {
        $plan = Plans::find($id);
        $easypaisa = EasyPaisaMangement::where('status','1')->first();
        return view('user.invest.buyPlan',compact('plan','esaypaisa'));
    }

    public function storePlan(Request $request,$id)
    {
        $validated = $request->validate([
            'number' => 'required',
            'trxId' => 'required',
            'name' => 'required',
        ]);

        $plan = Plans::find($id);

        $user_plan = new BuyPlan();
        $user_plan->user_id = auth()->user()->id;
        $user_plan->plan_id = $plan->id;
        $user_plan->plan_name = $plan->name;
        $user_plan->plan_investment = $plan->investment;
        $user_plan->name = $validated['name'];
        $user_plan->number = $validated['number'];
        $user_plan->trxId = $validated['trxId'];
        $user_plan->save();
        return redirect()->back()->with('success','Your request has been submitted successfully');
    }

    public function activePlan()
    {
        $plans = BuyPlan::where('user_id',auth()->user()->id)->get();
        return view('user.invest.activePlan',compact('plans'));
    }

    public function dailyProfit()
    {
        // check the user status open day

        $buy_plan = BuyPlan::where('user_id',auth()->user()->id)->where('status','approved')->latest();
        if($buy_plan == null)
        {
            return redirect()->back()->with('error','you have not invest in any plan yet');
        }
        else
        {
            $twoDaysAgo = Carbon::now()->subDays(2);

            $buy_plan = BuyPlan::where('user_id',auth()->user()->id)->where('status','approved')->whereDate('created_at','<',$twoDaysAgo)->first();
            if($buy_plan !== null)
            {
                $user = User::where('referral',auth()->user()->email)->whereDate('created_at','<',$twoDaysAgo)->get();
                if($user == null)
                {
                    return redirect()->back()->with('error','Add more members in your team to get your daily bouns');
                }

            }
            // check if user refer someone in two days or not
        }





        $plans = BuyPlan::where('user_id',auth()->user()->id)->where('status','approved')->get();
        $investment = 0;
        foreach($plans as $plan)
        {
            $investment += $plan->plan_investment;
        }

        // check if user take today profit already
        $daily_profit = GivenProfit::where('user_id',auth()->user()->id)->whereDate('created_at',Carbon::today())->first();
        if($daily_profit == null)
        {
            $profit = $investment * 10 / 100;

            $wallet = new Wallet();
            $wallet->user_id = auth()->user()->id;
            $wallet->wallet += $profit;
            $wallet->save();

            $today_profit = new GivenProfit();
            $today_profit->user_id = auth()->user()->id;
            $today_profit->profit = $profit;
            $today_profit->save();

            return redirect()->back()->with('success','you have got your 10% commission on your investment');
        }
        else
        {
            return redirect()->back()->with('error','You have been received today reward');
        }

    }

    public function convert()
    {
        $user = User::where('id',auth()->user()->id)->first();
        $user->balance += wallet_balance();
        $user->save();

        $wallet = Wallet::where('user_id',auth()->user()->id)->first();
        $wallet->wallet = 0;
        $wallet->save();
        return redirect()->back()->with('success','your wallet balance has been moved to main wallet');
    }


}
