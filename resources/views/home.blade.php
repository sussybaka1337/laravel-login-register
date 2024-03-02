@extends('layouts.master')
@section('title', 'Home')
@section('content')
    <div class="container">
        <div class="wrapper">
        <div class="title"><span>Home</span></div>
        <div class="row">
            <form method="POST" action="{{ route('logout') }}">
            <p>Hello, here is your information</p>
            <br>
            <p>Username: {{ $user->username }}</p>
            <br>
            <p>Email: {{ $user->email }}</p>
            <br>
            <div class="row button">
            <input type="submit" value="Log out">
            {{ csrf_field() }}
            </div>
        </form>
        </div>
        </div>
    </div>
@stop
