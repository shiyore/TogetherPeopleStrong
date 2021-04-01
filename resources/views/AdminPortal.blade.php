@extends('layouts.noNav')
<nav class="navbar navbar-expand-md navbar-light bg-green shadow-sm nav-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('Together People Strong', 'Together People Strong') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Left Side Of Navbar -->
            <ul class="navbar-nav mr-auto">

            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                 @guest
                    <li class="nav-item bg-tan">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item bg-tan">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown bg-tan">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
@section('content')
<div>
<table class="table" style="width:100%">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Username</th>
        <th scope="col">Email</th>
        <th scope="col">Suspend</th>
        <th scope="col">Delete</th>
      </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
        	<form action="manageUser" method="post">
        		{{csrf_field()}}
        		<td>{{$user->getUsername()}}<input type="hidden" id="name" name="name" value="{{$user->getUsername()}}"></td>
        		<td>{{$user->getEmail()}}<input type="hidden" id="email" name="email" value="{{$user->getUsername()}}">
        			<input type="hidden" id="password" name="password" value="{{$user->getPassword()}}">
        		</td>
        		<td><button id="suspend_button" name="suspend_button" type="submit">Suspend</button></td>
        		<td><button id="delete_button" name="delete_button" type="submit">Delete</button></td>
        	</form>
        </tr>
    @endforeach
    </tbody>
</table>
</div>