<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication | Register</title>
    <!-- Add Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap/dist/css/bootstrap.min.css">
    <style>
        body {
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            height: 100vh;
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
                <h2>Register New Account</h2>
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name"
                            placeholder="Enter your name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" name="email" class="form-control" id="email"
                            placeholder="Enter your email" required>
                    </div>
                    <div class="form-group">
                        <label for="Mobile No:">Mobile No:</label>
                        <input type="number" name="mobile" class="form-control" id="Mobile No:"
                            placeholder="Enter your Mobile No:" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" name="password" class="form-control" id="password"
                            placeholder="Enter your password" required>
                    </div>
                    <div class="form-group">
                        <label for="password">Retype Password</label>
                        <input type="password" name="password_confirmation" class="form-control" id="password"
                            placeholder="Enter your password" required>
                    </div>
                    <div class="form-group">
                        <label for="package">Package</label>
                        <select name="package" class="form-control" id="package" required>
                            <option value="Silver">Silver: 499</option>
                            <option value="Gold">Gold: 799</option>
                            <option value="Dimond">Dimond: 1499</option>
                        </select>
                    </div>
                    <input type="text" name="referral" value="{{ $referral }}" hidden>
                    <button type="submit" class="btn btn-login">Submit</button>
                </form>
                <a href="{{ route('login') }}">Already have an account!</a>
            </div>
        </div>
    </div>

    <!-- Add Bootstrap JS and jQuery CDN (for Bootstrap functionality) -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap/dist/js/bootstrap.min.js"></script>
</body>

</html>
