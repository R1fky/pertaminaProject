<!-- login.html -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f5f5f5;
        }
       .login-form {
            width: 400px;
            margin: 40px auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ddd;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
       .login-form h2 {
            text-align: center;
            margin-bottom: 20px;
        }
       .form-control {
            height: 40px;
            padding: 10px;
            font-size: 16px;
            border: 1px solid #ccc;
        }
       .btn-login {
            width: 100%;
            height: 40px;
            padding: 10px;
            font-size: 16px;
            background-color: #337ab7;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
       .btn-login:hover {
            background-color: #23527c;
        }
    </style>
</head>
<body>
    <div class="login-form">
        <h2>Login</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                @foreach ($errors->all() as $item)
                    <li>{{ $item }}</li>
                @endforeach
            </div>
        @endif
        <form action="" method="post">
            @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" class="form-control" value="{{ old('email') }}" placeholder="Enter email" name="email">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" class="form-control" value="" placeholder="Enter password" name="password">
            </div>
            <div class="form-group">
                <input type="checkbox" id="remember" class="form-check-input">
                <label for="remember">Remember me</label>
            </div>
            <button type="submit" class="btn-login">Login</button>
            <p>Don't have an account? <a href="#">Sign up</a></p>
        </form>
    </div>
</body>
</html>