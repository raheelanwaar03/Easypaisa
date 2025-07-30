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
    <div class="container" style="border: 0px solid red;background-color: #eee !important;">
        <div class="topnav">
            <a href="#"
                style="text-align: center;margin-left:180px;color: #fff;"><span><b>{{ env('APP_NAME') }}</b></span></a>
            @if (auth()->user())
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button
                        style="float: right;text-decoration:none;border:none;background-color:#2ABC71;margin-top:12px;margin-right:8px;"
                        type="submit"><i class="fa fa-power-off" style="color: #fff !important;"></i></button>
                </form>
            @else
                <button
                    style="float: right;text-decoration:none;border:none;background-color:#2ABC71;margin-top:12px;margin-right:8px;"
                    type="submit"><a href="{{ route('login') }}"><i class="fa fa-sign-in"
                            style="color: #fff !important;"></i></a></button>
            @endif
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
                            style="font-size: 11px;">Available Balance</span></div>
                    <div class="column_box" style="float: right;padding-top: 5px;">
                        &nbsp;
                    </div>
                    <div class="column_box" style="float: left;padding-top: 5px;">
                        <span style=""><b>Rs.{{ auth()->user()->balance }}</b></span> <i
                            class="fa fa-arrow-circle-o-right" aria-hidden="true" style="color: #000 !important;"></i>
                    </div>
                    <div class="column_box" style="float: right;text-align: right;padding-top: 5px;">&nbsp;</div>
                    <div class="column_box" style="float: left;padding-top: 5px;">
                        <i class="fa fa-refresh" aria-hidden="true" style="color: #000;"></i>
                        <span style="font-size: 12px;padding-top: 5px;">Update Just Now</span>
                    </div>
                    <div class="column_box" style="float: right;text-align: right;padding-top: 5px;">
                        <a href=""><button
                                style="background-color: #2ABC71;border-radius: 10px;border: none;color: #fff;font-size:11px;padding:2px 10px;">Add
                                Cash</button></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="wrapper_two" style="margin: 0px 10px;">
            <div class="row">
                <div class="column">
                    <a href="{{ route('User.Widthraw.Amount') }}" style="text-decoration:none;color:#000">
                        <div class="inner_data" style="background-color: #fff;border-radius: 10px;padding:20px;">
                            <i class="fa fa-money" aria-hidden="true" style="font-size: 30px !important;"></i>
                            <h5 style="font-size: 11px;">Widthraw Money</h5>
                        </div>
                    </a>
                </div>
                <a href="{{ route('User.Team.Members') }}" style="text-decoration:none;color:#000">
                    <div class="column">
                        <div class="inner_data" style="background-color: #fff;border-radius: 10px;padding:20px;">
                            <i class="fa fa-users" aria-hidden="true" style="font-size: 30px !important;"></i>
                            <!-- <h5 style="font-size: 11px;">Easycash Loan</h5> -->
                            <h5 style="font-size: 11px;">Team Members</h5>
                        </div>
                    </div>
                </a>
                <div class="column" id="myBtn">
                    <div class="inner_data" style="background-color: #fff;border-radius: 10px;padding:20px;">
                        <i class="fa fa-user-plus" style="font-size: 30px !important;" aria-hidden="true"></i>
                        <h5 style="font-size: 11px;">Invite & Earn</h5>
                    </div>
                </div>
            </div>
        </div>

        {{-- model --}}

        <div id="myModal" class="modal">

            <!-- Modal content -->
            <div class="modal-content">
                <span class="close">&times;</span>
                <div class="my-5">
                    <input type="text" style="padding: 15px;width:90%;border:1px solid black;"
                        value="{{ route('register', ['referral' => Auth::user()->email]) }}" id="myInput" readonly>
                    <div class="">
                        <button onclick="copy()"
                            style="padding: 16px 25px;margin-top:10px;border:none;border-radius:12px;background-color:green;color:white">copy</button>
                    </div>
                    <script>
                        function copy() {
                            // Get the text field
                            var copyText = document.getElementById("myInput");
                            copyText.select();
                            copyText.setSelectionRange(0, 99999);
                            navigator.clipboard.writeText(copyText.value);
                            // Alert the copied text
                            alert("Copied the text: " + copyText.value);
                        }
                    </script>
                </div>
            </div>

        </div>

        <div class="wrapper_three" style="border: 0px solid green;padding: 0px 15px;">
            <p style="margin: 10px 0px;font-size: 16px;"><b>More With {{ env('APP_NAME') }}</b></p>
            <div class="center">
                <div class="slider" data-pos="0">
                    <div class="slider__slides">
                        <div class="slider__slide">
                            <div class="row" style="padding: 17px 0px;">
                                <div class="column_slider">
                                    <div class="inner_data">
                                        <a href="{{ route('User.Investment.Plans') }}"
                                            style="text-decoration: none;color:black">
                                            <i class="fa fa-handshake-o" aria-hidden="true"
                                                style="font-size: 35px !important;"></i>
                                            <br />
                                            <span style="font-size: 15px;">Invest & Earn</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="column_slider">
                                    <div class="inner_data">
                                        <a href="{{ route('User.Active.Plan') }}"
                                            style="text-decoration: none;color:black">
                                            <i class="fa fa-superpowers" aria-hidden="true"
                                                style="font-size: 35px !important;"></i>
                                            <br />
                                            <span style="font-size: 15px;">Active Plans</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="column_slider">
                                    <div class="inner_data">
                                        <a href="{{ route('User.Convert.Balance') }}"
                                            style="text-decoration: none;color:black">
                                            <i class="fa fa-money" aria-hidden="true"
                                                style="font-size: 35px !important;"></i>
                                            <br />
                                            <span style="font-size: 15px;">Convert Balance</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="slider__slide">
                            <h1></h1>
                        </div>
                        <div class="slider__slide"></div>
                        <div class="slider__slide"></div>
                    </div>
                </div>
                <div class="slider__dots">
                    <a href="#" class="slider__indicator"></a>
                    <a href="#" class="slider__dot" data-pos="0"></a>
                    <a href="#" class="slider__dot" data-pos="1"></a>
                    <!-- <a href="#" class="slider__dot" data-pos="2"></a> -->
                    <!-- <a href="#" class="slider__dot" data-pos="3"></a> -->
                </div>
            </div>

        </div>
    </div>

    @include('layouts.links')

    </div>

    <footer>
        <script>
            // Get the modal
            var modal = document.getElementById("myModal");

            // Get the button that opens the modal
            var btn = document.getElementById("myBtn");

            // Get the <span> element that closes the modal
            var span = document.getElementsByClassName("close")[0];

            // When the user clicks the button, open the modal
            btn.onclick = function() {
                modal.style.display = "block";
            }

            // When the user clicks on <span> (x), close the modal
            span.onclick = function() {
                modal.style.display = "none";
            }

            // When the user clicks anywhere outside of the modal, close it
            window.onclick = function(event) {
                if (event.target == modal) {
                    modal.style.display = "none";
                }
            }
        </script>
    </footer>

    <script src="{{ asset('assets/js/slider.js') }}"></script>
</body>

</html>
