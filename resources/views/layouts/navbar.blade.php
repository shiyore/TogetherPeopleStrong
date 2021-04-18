<nav style="background-color: white;"class="navbar navbar-light navbar-expand-md navigation-clean-button border border-dark">
    <div class="container"><a class="navbar-brand" href="{{ url('/home') }}">
	<img style="height:50px; width:100px; margin-right:25px;" alt="TogetherPeopleStrong" src="/TogetherPeopleStrong/resources/img/logo.png">
    {{ config('Together People Strong', 'Together People Strong') }}
    </a>
        <div class="collapse navbar-collapse" id="navcol-1">
        </div>
        	<div class="d-flex justify-content-start">
                <ul class="navbar-nav mr-auto">
                	@guest
                    	<li class="nav-item"><a class="login btn btn-secondary" href="{{ route('login') }}">{{ __('Login') }}</a></li>
                    @if (Route::has('register'))
                    	<li class="nav-item"><a class="btn btn-light action-button" role="button" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                    @endif
                    @else
                        <li class="nav-item"><a class="nav-link active" href="/TogetherPeopleStrong/portfolio/create">Manage Portfolio</a></li>
                        <li class="nav-item"><a class="nav-link" href="/TogetherPeopleStrong/portfolio/viewAll">Portfolios</a></li>
                        <li class="nav-item"><a class="nav-link" href="/TogetherPeopleStrong/affinities">Affinity Groups</a></li>
                        <li class="nav-item"><a class="nav-link" href="/TogetherPeopleStrong/job_postings">Jobs</a></li>
        		</ul>
    		</div>
            <div class="d-flex justify-content-end navbar-text actions">
<!--                 <span class="navbar-text actions"> -->
                        <a class="nav-item btn btn-secondary" href="{{ route('logout') }}"
                           	onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                    <a  class="nav-link btn btn-light" href="/TogetherPeopleStrong/editUserInfo" role="button">
                        {{ Auth::user()->name }} 
                    </a>
<!--             	</span> -->
        	</div>
            @endguest
        </div>
    </div>
    <form class="nav-item" id="logout-form" action="{{ route('logout') }}" method="POST">
        @csrf
    </form>
</nav>