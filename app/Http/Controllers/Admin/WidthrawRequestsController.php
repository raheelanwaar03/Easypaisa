<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\User\WidthrawReq;


class WidthrawRequestsController extends Controller
{
    public function pending()
    {
        $widthraws = WidthrawReq::where('status','pending')->get();
        return view('admin.widthraw.pending',compact('widthraws'));
    }

    public function approved()
    {
        $widthraws = WidthrawReq::where('status','approved')->get();
        return view('admin.widthraw.approved',compact('widthraws'));
    }

    public function rejected()
    {
        $widthraws = WidthrawReq::where('status','rejected')->get();
        return view('admin.widthraw.rejected',compact('widthraws'));
    }

    public function makePending($id)
    {
        $widthraw = WidthrawReq::find($id);
        $widthraw->status = 'pending';
        $widthraw->save();
        return redirect()->with('success','Widthraw Request Made Pending now');
    }

    public function makeApproved($id)
    {
        $widthraw = WidthrawReq::find($id);
        $widthraw->status = 'approved';
        $widthraw->save();
        // deducting balance from user account
        $user = User::where('id',$widthraw->user_id)->first();
        $user->balance -= $widthraw->amount;
        $user->save();

        return redirect()->with('success','Widthraw Request Made Approved now');
    }

    public function makeRejected($id)
    {
        $widthraw = WidthrawReq::find($id);
        $widthraw->status = 'Rejected';
        $widthraw->save();
        return redirect()->with('success','Widthraw Request Made Rejected now');
    }

}
