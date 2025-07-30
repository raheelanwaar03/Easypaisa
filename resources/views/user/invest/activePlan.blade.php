<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slider.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>User | Dashboard</title>

    <style>
        /* The Modal (background) */
        .modal {
            display: none;
            /* Hidden by default */
            position: fixed;
            /* Stay in place */
            z-index: 1;
            /* Sit on top */
            padding-top: 100px;
            /* Location of the box */
            left: 0;
            top: 0;
            width: 100%;
            /* Full width */
            height: 100%;
            /* Full height */
            overflow: auto;
            /* Enable scroll if needed */
            background-color: rgb(0, 0, 0);
            /* Fallback color */
            background-color: rgba(0, 0, 0, 0.4);
            /* Black w/ opacity */
        }

        /* Modal Content */
        .modal-content {
            background-color: #fefefe;
            margin: 60px;
            padding: 60px;
            border: 1px solid #888;
            width: 80%;
        }

        /* The Close Button */
        .close {
            color: #aaaaaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: #000;
            text-decoration: none;
            cursor: pointer;
        }
    </style>

</head>

<body style="background-color: #eee !important;height: 740px;">

<x-alert />

    <div class="container" style="border: 0px solid red;background-color: #eee !important;">
        <div class="topnav">
            <a href="#"
                style="text-align: center;margin-left:180px;color: #fff;"><span><b>{{ env('APP_NAME') }}</b></span></a>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button
                    style="float: right;text-decoration:none;border:none;background-color:#2ABC71;margin-top:12px;margin-right:8px;"
                    type="submit"><i class="fa fa-bell-o" style="color: #fff !important;"></i></button>
            </form>
            <a href="#" style="float: right;"><i class="fa fa-search" style="color: #fff !important;"></i></a>

        </div>
        <div class="wrapper_one" style="background-color: #2ABC71;width: 100%;height: 170px;padding-left: 10px;">
            <div>&nbsp;</div>
            <div class="inner_box_div"
                style="background-color: #fff;border-radius: 10px;padding:12px;margin: 0px 20px;">
                <div class="row_box" style="">
                    <div class="column_box" style="float: left;"><span><b>{{ env('APP_NAME') }}</b></span></div>
                    <div class="column_box" style="float: right;text-align: right;padding-top: 5px;"><img
                            src="{{ asset('assets/images/gift.png') }}" alt="gift" width="15px"> <span
                            style="font-size: 12px;">My Rewards</span></div>
                    <div class="column_box" style="float: left;text-align: left;padding-top: 5px;"><span
                            style="font-size: 11px;">Wallet Balance</span></div>
                    <div class="column_box" style="float: right;padding-top: 5px;">
                        &nbsp;
                    </div>
                    <div class="column_box" style="float: left;padding-top: 5px;">
                        <span style=""><b>Rs.{{ wallet_balance() }}</b></span> <i
                            class="fa fa-arrow-circle-o-right" aria-hidden="true" style="color: #000 !important;"></i>
                    </div>
                    <div class="column_box" style="float: right;text-align: right;padding-top: 5px;">&nbsp;</div>
                    <div class="column_box" style="float: left;padding-top: 5px;">
                        <i class="fa fa-refresh" aria-hidden="true" style="color: #000;"></i>
                        <span style="font-size: 12px;padding-top: 5px;">Update Just Now</span>
                    </div>
                    <div class="column_box" style="float: right;text-align: right;padding-top: 5px;">
                        <a href="{{ route('User.Daily.Profit') }}"><button
                                style="background-color: #2ABC71;border-radius: 10px;border: none;color: #fff;font-size:15px;padding:8px 12px;cursor: pointer;">Daily Profit</button></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="wrapper_two" style="margin: 0px 10px;">
            <div class="row">
                @forelse ($plans as $item)
                    <div class="column">
                        <div class="inner_data" style="background-color: #fff;border-radius: 10px;padding:20px;">
                            <h3>{{ $item->plan_name }}</h3>
                            <h3>Investment: {{ $item->plan_investment }}</h3>
                            <h3>Status:{{ $item->status }}</h3>
                        </div>
                    </div>
                @empty
                    <h3 style="text-align: center">You have not buy any plan yet</h3>
                @endforelse
            </div>
        </div>
    </div>

    @include('layouts.links')
    </div>
    <script src="{{ asset('assets/js/slider.js') }}"></script>
</body>

</html>
