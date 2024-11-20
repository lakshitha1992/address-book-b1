<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login: Address Book</title>
    <!-- Bootstrap CSS -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Custom CSS -->
    <style>
        body {
            background: linear-gradient(to bottom right, #6b73ff, #000dff);
            background-size: cover;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Arial', sans-serif;
            margin: 0;
        }

        .glass-container {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
            border-radius: 15px;
            padding: 20px 40px;
            width: 100%;
            max-width: 400px;
            animation: fadeIn 1.5s ease-in-out;
            color: white;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #ffffff;
        }

        .form-control {
            background: rgba(255, 255, 255, 0.3);
            border: 1px solid rgba(255, 255, 255, 0.5);
            color: #ffffff;
        }

        .form-control:focus {
            background: rgba(255, 255, 255, 0.5);
            color: #000;
        }

        .btn-primary {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 5px;
            background-color: #6b73ff;
            border: none;
            transition: all 0.3s ease-in-out;
        }

        .btn-primary:hover {
          
            transform: scale(1.05);
        }

        a {
            color: black;
        }

        a:hover {
            color: #ffffff;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }

    .error-box {
        background-color: rgba(255, 0, 0, 0.1);
        border: 1px solid rgba(255, 0, 0, 0.4);
        border-radius: 8px;
        padding: 15px;
        margin-bottom: 20px;
        color: #d9534f;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        font-family: 'Arial', sans-serif;
        position: relative;
    }

    .error-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-weight: bold;
        margin-bottom: 10px;
    }

    .close-btn {
        background: none;
        border: none;
        font-size: 18px;
        color: #d9534f;
        cursor: pointer;
    }

    .close-btn:hover {
        color: #b52a25;
    }

    .error-list {
        margin: 0;
        padding-left: 20px;
        list-style-type: square;
    }

    .error-list li {
        margin-bottom: 5px;
    }
</style>

</head>
<body>

<div class="glass-container">
    <h2>Login</h2>

    <!-- Display validation errors -->
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Login Form -->
    <form action="{{ route('login') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Login</button>
    </form>

    <!-- Register link -->
    <p class="text-center mt-3">Don't have an account? <a href="{{ route('register') }}">Register</a></p>
</div>

</body>
</html>
