<?php

use App\Models\User\Wallet;
use App\Models\User;
use App\Models\User\WidthrawReq;
use Carbon\Carbon;

function wallet_balance()
{
    $balance = Wallet::where('user_id',auth()->user()->id)->first();
    if($balance == null)
    {
        $wallet_balance = 0;
    }
    else{
        $wallet_balance = $balance->wallet;
    }
    return $wallet_balance;
}

function total_users()
{
    $users = User::get()->count();
    return $users;
}

function approved_users()
{
    $users = User::where('status','approved')->get()->count();
    return $users;
}

function pending_users()
{
    $users = User::where('status','pending')->get()->count();
    return $users;
}

function rejected_users()
{
    $users = User::where('status','rejected')->get()->count();
    return $users;
}

function given_widthraw()
{
    $widthraw = WidthrawReq::where('status','approved')->get();
    $total_widthraw_given = 0;
    foreach( $widthraw as $item)
    {
        $total_widthraw_given += $item->amount;
    }
    return $total_widthraw_given;
}

function today_widthraw()
{
    $widthraw = WidthrawReq::where('status','approved')->whereDate('created_at',Carbon::today())->get();
    $total_widthraw_given = 0;
    foreach( $widthraw as $item)
    {
        $total_widthraw_given += $item->amount;
    }
    return $total_widthraw_given;
}
