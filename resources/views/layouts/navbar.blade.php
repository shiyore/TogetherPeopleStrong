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
					<li class="nav-item bg-tan">
						<a class="nav-link" href="/TogetherPeopleStrong/public/portfolio/viewAll">Portfolios</a>
					</li>
                    <li class="nav-item bg-tan">
                    	<div>
                            <a class="nav-item bg-tan" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form class="nav-item bg-tan" id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                            </form>
                        </div>
                    </li>
					<li class="nav-item bg-tan">
                        <a  class="nav-link " href="#" role="button">
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>