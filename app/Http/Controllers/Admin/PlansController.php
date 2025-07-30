<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\admin\Plans;
use App\Models\User\BuyPlan;
use Illuminate\Http\Request;

class PlansController extends Controller
{
    public function add()
    {
        return view('admin.plans.add');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required',
            'investment' => 'required',
            'duration' => 'required',
            'total_profit' => 'required',
        ]);

        $plan = new Plans();
        $plan->name = $validated['name'];
        $plan->investment = $validated['investment'];
        $plan->duration = $validated['duration'];
        $plan->total_profit = $validated['total_profit'];
        $plan->save();
        return redirect()->back()->with('success','Plan added successfully');
    }

    public function all()
    {
        $plans = Plans::get();
        return view('admin.plans.all',compact('plans'));
    }

    public function edit($id)
    {
        $plan = Plans::find($id);
        return view('admin.plans.edit',compact('plan'));
    }

    public function update(Request $request,$id)
    {
        $plan = Plans::find($id);
        $plan->name = $request->name;
        $plan->investment = $request->investment;
        $plan->duration = $request->duration;
        $plan->total_profit = $request->total_profit;
        $plan->save();
        return redirect()->back()->with('success','Plan details has updated successfully');
    }

    public function pendingRequests()
    {
        $requests = BuyPlan::where('status','pending')->get();
        return view('admin.plans.requests.pending',compact('requests'));
    }

    public function approvedRequests()
    {
        $requests = BuyPlan::where('status','approved')->get();
        return view('admin.plans.requests.approve',compact('requests'));
    }

    public function rejectedRequests()
    {
        $requests = BuyPlan::where('status','rejected')->get();
        return view('admin.plans.requests.rejected',compact('requests'));
    }

    public function pendingRequest($id)
    {
        $request = BuyPlan::find($id);
        $request->status = 'pending';
        $request->save();
        return redirect()->back()->with('success','Request has been pending successfully');
    }

    public function approveRequest($id)
    {
        $request = BuyPlan::find($id);
        $request->status = 'approved';
        $request->save();
        return redirect()->back()->with('success','Request has been Approved successfully');
    }

    public function rejectedRequest($id)
    {
        $request = BuyPlan::find($id);
        $request->status = 'rejected';
        $request->save();
        return redirect()->back()->with('success','Request has been Rejected successfully');
    }



}
