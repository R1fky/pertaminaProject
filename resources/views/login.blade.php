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
            <ul>
                @foreach ($errors->all() as $item)
                    <div class="alert alert-danger">
                        <li>{{ $item }}</li>
                    </div>
                @endforeach
            </ul>
        @endif
        <form action="" method="post">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email"
                    name="email" value="{{ old('email') }}">
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Password</label>
                <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                    name="password" value="">
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
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
