<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <style>
        /* Glass Style for Form */
        body {
           
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Arial', sans-serif;
        }

        .container {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            box-shadow: 0 8px 32px rgba(31, 38, 135, 0.37);
            padding: 30px;
            border-radius: 15px;
            width: 100%;
            max-width: 400px;
            color: white;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
        }

        label {
            color: white;
        }

        .btn-primary {
            background: linear-gradient(90deg, #667eea, #764ba2);
            border: none;
        }

        .btn-primary:hover {
            background: linear-gradient(90deg, #764ba2, #667eea);
        }

        a {
            color: black;
            text-decoration: underline;
        }

        /* Error Box Styles */
        .error-box {
            background-color: rgba(255, 0, 0, 0.1);
            border: 1px solid rgba(255, 0, 0, 0.4);
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 20px;
            color: #d9534f;
            font-family: 'Arial', sans-serif;
        }

        .error-list {
            list-style-type: square;
            margin: 0;
            padding-left: 20px;
        }


    </style>
</head>
<body>

<div class="container">
    <h2>Register</h2>

    <!-- Display validation errors -->
    @if ($errors->any())
        <div class="error-box">
            <ul class="error-list">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Registration Form -->
    <form action="{{ route('register') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirm Password:</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Register</button>
    </form>

    <!-- Login link -->
    <p class="text-center mt-3">Already have an account? <a href="{{ route('login') }}">Login</a></p>
</div>

</body>
</html>
