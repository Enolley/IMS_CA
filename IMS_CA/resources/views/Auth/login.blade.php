<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{url('/css/style.css')}}">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<body>
    <header>
        <div class="logo">
            <img src="{{url('/images/logo.png')}}" alt="">
        </div>
    </header>
    <div class="login">
        <div class="container">
            <h1>Login</h1>
            <div class="row">
                <form action="{{route('login-user')}}" method="post">
                @if(Session::has('success'))
                        <div class="response">
                            {{Session::get('success')}}
                        </div>
                    @endif
                    @if(Session::has('fail'))
                        <div class="response">
                            {{Session::get('fail')}}
                        </div>
                    @endif
                    @csrf
                    <input type="email" name="email" id="email" placeholder="Enter your Email" value="{{old('email')}}">
                    <span class="danger">@error('email') {{$message}} @enderror</span>
                    <input type="password" name="password" id="password" placeholder="Enter your password">
                    <span class="danger">@error('password') {{$message}} @enderror</span>
                    <button type="submit">Login</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>