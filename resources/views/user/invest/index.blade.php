<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/slider.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>User | Dashboard</title>

</head>

<body style="background-color: #eee !important;height: 740px;">
    <x-alert />
    <div class="container" style="border: 0px solid red;background-color: #eee !important;">
        <div class="topnav">
            <a href="#"
                style="text-align: center;margin-left:180px;color: #fff;"><span><b>{{ env('APP_NAME') }}</b></span></a>
            <a href="#" style="float: right;"><i class="fa fa-bell-o" style="color: #fff !important;"></i></a>
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

        <div class="container" style="margin-top: 25px;margin-bottom: 90px;">
            <div class="row">
                @foreach ($plans as $plan)
                    <div class="col-md-4 mb-5">
                        <div class="card mt-3" style="width: 28rem;">
                            <img class="card-img-top" src="{{ asset('assets/image/invest.jpg') }}" height="250px"
                                width="277px" alt="Card image cap">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Investment: {{ $plan->investment }}</li>
                                <li class="list-group-item">Daily Commission: 10%</li>
                                <li class="list-group-item">Duration: {{ $plan->duration }}days</li>
                                <li class="list-group-item">Total Return: {{ $plan->total_profit }}</li>
                            </ul>
                            <div class="card-footer">
                                <a href="{{ route('User.Buy.Plan', ['id' => $plan->id]) }}"
                                    class="btn btn-success">Buy</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

    @include('layouts.links')

    </div>
    <script src="{{ asset('assets/js/slider.js') }}"></script>
</body>

</html>
