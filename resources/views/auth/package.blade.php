<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication | Package</title>
    <!-- Add Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css">
    <style>
        body {
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-container {
            background-color: rgba(255, 255, 255, 0.9);
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.3);
        }

        .login-container h2 {
            color: #28a745;
            text-align: center;
        }

        .brand-logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .brand-logo img {
            max-width: 100px;
            /* Adjust the max width of your logo as needed */
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-control {
            border-color: #28a745;
        }

        .btn-login {
            background-color: #28a745;
            color: white;
            width: 100%;
        }

        .btn-login:hover {
            background-color: white;
            color: green;
            width: 100%;
            border: 1px solid green;
        }
    </style>
</head>

<body style="background-image: url('{{ asset('assets/image/bg.jpg') }}')">

    <x-alert />

    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3 login-container">
                <div class="brand-logo">
                    <img src="your-logo.png" alt="Your Logo">
                </div>
                @foreach ($plans as $item)
                    <h2>{{ $item->plan_name }}</h2>
                    <p>{{ $item->details }}.</p>
                @endforeach
            </div>
        </div>

        <div class="row">
            <div class="col-md-6 offset-md-3 login-container mt-3">
                <form action="{{ route('Store.Package.Fees') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label>Easypaisa Number</label>
                        <input type="number" class="form-control" name="easypaisa_number"
                            placeholder="Enter your easypaisa number where you send package details">
                    </div>
                    <div class="form-group">
                        <label>Trx Id:</label>
                        <input type="number" class="form-control" name="trx_id"
                            placeholder="Enter your Trx Id Correctly">
                    </div>
                    <div class="form-group">
                        <label>Sender Name</label>
                        <input type="text" class="form-control" name="sender_name" placeholder="Enter sender name">
                    </div>
                    <div class="">
                        <button class="btn btn-login">Submit</button>
                    </div>
                </form>
            </div>
        </div>


    </div>

    <!-- Add Bootstrap JS and jQuery CDN (for Bootstrap functionality) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>
