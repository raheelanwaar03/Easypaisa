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

    <style>
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background: #fff;
            margin: 10% auto;
            padding: 20px;
            border-radius: 10px;
            width: 300px;
            text-align: center;
        }

        .close {
            float: right;
            font-size: 22px;
            cursor: pointer;
        }

        .stars {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .star {
            font-size: 30px;
            color: gray;
            cursor: pointer;
            transition: color 0.2s;
        }

        .star.active {
            color: gold;
        }

        .submit-btn {
            margin-top: 20px;
            padding: 10px 20px;
            background: #22c55e;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .submit-btn:hover {
            background: #1aa94e;
        }
    </style>

</head>

<body style="background-color: #eee !important;height: 740px;">
    <x-alert />
    <div class="container" style="border: 0px solid red;background-color: #eee !important;">
        <div class="topnav">
            <a href="{{ route('User.Dashboard') }}" style="text-align: center;margin-left:180px;color: #fff;"><span><img
                        src="{{ asset('assets/image/easypaisa.png') }}" height="70px" width="70px"></span></a>
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
                        <a href="{{ route('User.Widthraw.Amount') }}"><button
                                style="background-color: #2ABC71;border-radius: 10px;border: none;color: #fff;font-size:11px;padding:2px 10px;">Withdraw</button></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container" style="margin-top: 25px;margin-bottom: 90px;">
            <div class="row">
                @foreach ($tasks as $task)
                    <div class="col-md-4 mb-5">
                        <div class="card mt-3" style="width: 28rem;">
                            <img class="card-img-top" src="{{ asset('task/' . $task->image) }}" height="250px"
                                width="277px">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">
                                    {{ $task->name }}
                                    <span style="float: right;">{{ $task->price }}</span>
                                </li>
                            </ul>
                            <div class="card-footer">
                                <a href="{{ route('User.Task.Profit', $task->id) }}"
                                    onclick="window.open('{{ $task->link }}', '_blank')"
                                    class="btn btn-success">Earn</a>
                                <a href="javascript:void(0)" class="rateBtn" data-id="{{ $task->id }}"
                                    style="text-decoration:none; background:#22c55e; padding:8px 16px; color:#fff; border-radius:5px;">
                                    Review
                                </a>
                            </div>

                            <div id="ratingModal" class="modal">
                                <div class="modal-content">
                                    <span class="close">&times;</span>
                                    <h2>Rate this Product</h2>
                                    <div class="stars">
                                        <span class="star" data-value="1">&#9733;</span>
                                        <span class="star" data-value="2">&#9733;</span>
                                        <span class="star" data-value="3">&#9733;</span>
                                        <span class="star" data-value="4">&#9733;</span>
                                        <span class="star" data-value="5">&#9733;</span>
                                    </div>
                                    <p id="ratingText" style="margin-top:10px;">Click a star to rate</p>
                                    <button class="submit-btn" id="submitReview">Submit Review</button>
                                </div>
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

    <script>
        const modal = document.getElementById("ratingModal");
        const closeBtn = document.querySelector(".close");
        const stars = document.querySelectorAll(".star");
        const ratingText = document.getElementById("ratingText");
        const submitBtn = document.getElementById("submitReview");

        let selectedRating = 0;
        let currentProductId = null;

        // Open modal on click for ANY review button
        document.addEventListener("click", function(e) {
            if (e.target.classList.contains("rateBtn")) {
                currentProductId = e.target.getAttribute("data-id");
                selectedRating = 0;
                stars.forEach(s => s.classList.remove("active"));
                ratingText.innerText = "Click a star to rate";
                modal.style.display = "block";
            }
        });

        // Close modal
        closeBtn.onclick = function() {
            modal.style.display = "none";
        }

        // Close modal if clicking outside
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }

        // Star click event
        stars.forEach(star => {
            star.addEventListener("click", function() {
                selectedRating = this.getAttribute("data-value");

                stars.forEach(s => s.classList.remove("active"));
                for (let i = 0; i < selectedRating; i++) {
                    stars[i].classList.add("active");
                }

                ratingText.innerText =
                    `You rated this product ${selectedRating} star${selectedRating > 1 ? 's' : ''}`;
            });
        });

        // Submit review button
        submitBtn.addEventListener("click", function() {
            if (selectedRating > 0) {
                // Send data to Laravel via fetch or AJAX
                fetch("/submit-review", {
                        // method: "POST",
                        // headers: {
                        //     "Content-Type": "application/json",
                        //     "X-CSRF-TOKEN": "{{ csrf_token() }}"
                        // },
                        body: JSON.stringify({
                            product_id: currentProductId,
                            rating: selectedRating
                        })
                    })
                    .then(res => res.json())
                    .then(data => {
                        alert(data.message || "Thank you! Review submitted.");
                        modal.style.display = "none";
                    })
                    .catch(err => {
                        console.error(err);
                        alert("Thanks for review.");
                        modal.style.display = "none";
                    });

            } else {
                alert("Please select a rating before submitting.");
            }
        });
    </script>

</body>

</html>
