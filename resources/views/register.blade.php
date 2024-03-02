@extends('layouts.master')
@section('title', 'Register')
@section('content')
    <div class="container">
        <div class="wrapper">
        <div class="title"><span>Register</span></div>
        <form>
            <div class="row">
            <i class="fas fa-user"></i>
            <input type="text" placeholder="Username" name="username" required>
            </div>
            <div class="row">
            <i class="fas fa-lock"></i>
            <input type="text" placeholder="Email" name="email" required>
            </div>
            <div class="row">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Password" name="password" required>
            </div>
            <div class="row">
            <i class="fas fa-lock"></i>
            <input type="password" placeholder="Enter password again" name="againPassword" required>
            </div>
            {{ csrf_field() }}
            <div class="row button">
            <input type="submit" value="Register">
            </div>
            <div class="signup-link">Already have an account? <a href="{{ route('login') }}">Login now</a></div>
        </form>
        </div>
    </div>
    <script>
        document.querySelectorAll('form')[0].addEventListener('click', async event => {
            event.preventDefault();
            const username = document.querySelector('*[name="username"]').value;
            const email = document.querySelector('*[name="email"]').value;
            const password = document.querySelector('*[name="password"]').value;
            const againPassword = document.querySelector('*[name="againPassword"]').value;
            const response = await fetch('/public/storeRegistration', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({
                    username: username,
                    email: email,
                    password: password,
                    againPassword: againPassword,
                    _token: '{{ csrf_token() }}'
                })
            });
            const data = await response.json();
            document.querySelector('div[class="title"] > span').textContent = data.message;
            if (!data.error) {
                setTimeout(() => {
                    window.location.href = '/public/login';
                }, 3000);
            }
        }, false);
    </script>
@stop
