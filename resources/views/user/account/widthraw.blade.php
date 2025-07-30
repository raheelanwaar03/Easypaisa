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
            <a href="{{ route('User.Dashboard') }}"
                style="text-align: center;margin-left:180px;color: #fff;"><span><b>{{ env('APP_NAME') }}</b></span></a>
            <a href="#" style="float: right;"><i class="fa fa-bell-o" style="color: #fff !important;"></i></a>
            <a href="#" style="float: right;"><i class="fa fa-search" style="color: #fff !important;"></i></a>

        </div>
        <div class="wrapper_one" style="background-color: #2ABC71;width: 100%;height: 170px;padding-left: 10px;">
            <div>&nbsp;</div>
            <div class="inner_box_div"
                style="background-color: #fff;border-radius: 10px;padding:12px;margin: 0px 20px;">
                <div class="row_box" style="">
                    <div class="column_box" style="float: left;"><span><b>Widthraw Balance</b></span></div>
                    <div class="column_box" style="float: right;text-align: right;padding-top: 5px;">
                        <a href="{{ route('User.Widthraw.History') }}"><button
                                style="background-color: #2ABC71;border-radius: 10px;border: none;color: #fff;font-size:15px;padding:8px 12px;">Widthraw
                                History</button></a>
                    </div>
                    <div class="column_box" style="float: right;padding-top: 5px;">
                        &nbsp;
                    </div>
                    <div class="column_box" style="float: left;padding-top: 5px;">
                        <span style=""><b>Rs.{{ auth()->user()->balance }}</b></span> <i
                            class="fa fa-arrow-circle-o-right" aria-hidden="true" style="color: #000 !important;"></i>
                    </div>
                    <div class="column_box" style="float: right;text-align: right;padding-top: 5px;">&nbsp;</div>
                    <div class="column_box" style="float: left;padding-top: 5px;">
                        <a href="{{ route('User.Widthraw.Amount') }}" style="text-decoration: none;color:#000">
                            <i class="fa fa-refresh" aria-hidden="true" style="color: #000;"></i>
                            <span style="font-size: 12px;padding-top: 5px;">Update Just Now</span>
                        </a>
                    </div>
                </div>

            </div>
        </div>
        <div class="container" style="margin-top: 30px">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <p class="text-center mt-4" style="font-size: 14px">Daily profit is ({{ wallet_balance() }}) you can move it to main wallet for requsting widthraw. <a href="{{ route('User.Convert.Balance') }}" class="btn btn-success">Move to main</a></p>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('User.Store.Widthraw') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>Amount</label>
                                <input type="number" name="amount" class="form-control"
                                    placeholder="Enter amount you want to widthraw" required>
                            </div>
                            <div class="form-group">
                                <label>Account Title</label>
                                <input type="textx" name="user_name" class="form-control"
                                    placeholder="Enter your account title" autocomplete="on" required>
                            </div>
                            <div class="form-group">
                                <label>Account Number</label>
                                <input type="number" name="account" class="form-control"
                                    placeholder="Enter your account number" autocomplete="on" required>
                            </div>
                            <div class="form-group">
                                <label>Select Account Type</label>
                                <select name="type" class="form-control" required>
                                    <option value="Easypaisa">Easypaisa</option>
                                    <option value="Jazzcash">Jazzcash</option>
                                </select>
                            </div>
                            <div class="m-2">
                                <button
                                    style="background-color: #2ABC71;border-radius: 10px;border: none;color: #fff;font-size:18px;padding:12px 25px;">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>

    @include('layouts.links')

    </div>
    <script src="{{ asset('assets/js/slider.js') }}"></script>
</body>

</html>
