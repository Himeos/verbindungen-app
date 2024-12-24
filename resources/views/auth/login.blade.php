<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Login</title>
    @vite('resources/css/login.css')
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.0.2/tailwind.min.css"
    />
</head>

<body>
    <form action=" {{ route('login') }}" method="POST" id="loginform">
        @csrf
        <h1>Sign in</h1>
        <div class="form-group">
            <label for="Username">Username</label>
            <input type="text" name="username" id="username" spellcheck=false required placeholder="Username"
                autocomplete="off" />
            <label for="password">Password</label>
            <input type="password" name="password" required placeholder="Password" autocomplete="off" />
            <button type="submit" class="submitbtn">Login</button>
        </div>

        @if($errors->any())
            <div class="error-messages">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    </form>
</body>