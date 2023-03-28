<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Register</h1>

    <div class="container">
        <div class="row">
            <form action="{{route('register-user')}}" method="post">
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
                <input type="text" name="firstname" id="firstname" placeholder="Enter your First Name" value="{{old('firstname')}}">
                <span class="danger">@error('firstname') {{$message}} @enderror</span>
                <br>
                <input type="text" name="lastname" id="lastname" placeholder="Enter your Last Name" value="{{old('lastname')}}">
                <span class="danger">@error('lastname') {{$message}} @enderror</span>
                <br>
                <input type="email" name="email" id="email" placeholder="Enter your Email" value="{{old('email')}}">
                <span class="danger">@error('email') {{$message}} @enderror</span>
                <br>
                <input type="password" name="password" id="password" placeholder="Enter your password">
                <span class="danger">@error('password') {{$message}} @enderror</span>
                <br>
                <select name="department" id="department" value="{{old('department')}}">
                    <option value="0" disabled selected>Department</option>
                    <option value="ICT">ICT</option>
                    <option value="HRA">HRA</option>
                    <option value="CPA">CPA</option>
                    <option value="RPQM">RPQM</option>
                    <option value="IRD">IRD</option>
                    <option value="MMS">MMS</option>
                    <option value="F&A">F & A</option>
                    <option value="LS">LS</option>
                </select>
                <span class="danger">@error('department') {{$message}} @enderror</span>
                <br>
                <select name="role" id="role" value="{{old('role')}}">
                    <option value="0" disabled selected>What's your role?</option>
                    <option value="Director General">Director General</option>
                    <option value="Director">Director</option>
                    <option value="Deputy Director">Deputy Director</option>
                    <option value="Principle Officer">Principle Officer</option>
                    <option value="Senior Officer">Senior Officer</option>
                    <option value="Senior Assistant Officer">Senior Assistant Officer</option>
                    <option value="Officer">Officer</option>
                    <option value="Assistant Officer">Assistant Officer</option>
                    <option value="Senior Office Assistant">Senior Office Assistant</option>
                    <option value="Office Assistant">Office Assistant</option>
                    <option value="Contract Staff">Contract Staff</option>
                    <option value="Intern">Intern</option>
                </select>
                <span class="danger">@error('role') {{$message}} @enderror</span>
                <br>
                <button type="submit">Register</button>
            </form>
        </div>
    </div>
</body>
</html>