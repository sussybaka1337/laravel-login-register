@extends('layouts.master')
@section('title', 'Login')
@section('content')
    <div class="container">
        <div class="wrapper">
        <div class="title"><span>Login</span></div>
        <form>
            <div class="row">
            <i class="fas fa-user"></i>
            <input id="usernameField" type="text" placeholder="Username" name="username" required>
            </div>
            <div class="row">
            <i class="fas fa-lock"></i>
            <input id="passwordField" type="password" placeholder="Password" name="password" required>
            </div>
            <div class="row button">
            <input id="submitLogin" type="submit" value="Login">
            </div>
            <div class="signup-link">Not a member? <a href="{{ route('register') }}">Signup now</a></div>
        </form>
        </div>
    </div>
    <script>
        document.getElementById('submitLogin').addEventListener('click', async event => {
            event.preventDefault();
            const username = document.getElementById('usernameField').value;
            const password = document.getElementById('passwordField').value;
            const response = await fetch('/public/checkUserLogin', {
                method: 'POST',
                body: JSON.stringify({
                    username: username,
                    password: password,
                    _token: '{{ csrf_token() }}'
                }),
                headers: new Headers({
                    'Content-Type': 'application/json; charset=UTF-8'
                })
            });
            const data = await response.json();
            document.querySelector('div[class="title"] > span').textContent = data.message;
            if (!data.error) {
                setTimeout(() => {
                    window.location.href = '/public/home';
                }, 3000);
            }
        }, false);
    </script>
@stop
