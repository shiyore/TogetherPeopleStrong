@extends('layouts.app')

@section('content')
<section id="portfolio" class="content-section">
    <div class="container">
        <div class="text-center content-section-heading">
            <h1 class="text-secondary mb-0">TogetherPeopleStrong</h1>
            <br/>
            <h2 class="mb-5">"Apes alone weak. Apes together strong." - Caesar from Rise of the Planet of the Apes</h2>
        </div>
        <div class="row no-gutters">
            <div class="col-lg-6"><a class="portfolio-item" href="/TogetherPeopleStrong/affinities">
                    <div class="caption">
                        <div class="caption-content">
                            <h2>Affinity Groups</h2>
                            <p class="mb-0">Join together with other like-minded monkey's in an Affinity Group!</p>
                        </div>
                    </div><img class="img-fluid" src="resources/img/monkeySocial.png">
                </a></div>
            <div class="col-lg-6"><a class="portfolio-item" href="/TogetherPeopleStrong/job_postings">
                    <div class="caption">
                        <div class="caption-content">
                            <h2>Job Postings</h2>
                            <p class="mb-0">Search for work to buy more bananas</p>
                        </div>
                    </div><img class="img-fluid" src="resources/img/monkeySearch.jpg">
                </a></div>
            <div class="col-lg-6"><a class="portfolio-item" href="/TogetherPeopleStrong/portfolio/viewAll">
                <div class="caption">
                    <div class="caption-content">
                        <h2>View Portfolios</h2>
                        <p class="mb-0">View what other monkeys are showing off</p>
                    </div>
                </div><img class="img-fluid" src="resources/img/monkeyLaptop.jpg">
            </a></div>
            <div class="col-lg-6"><a class="portfolio-item" href="/TogetherPeopleStrong/portfolio/create">
                <div class="caption">
                    <div class="caption-content">
                        <h2>Edit your Portfolio</h2>
                        <p class="mb-0">Manage what YOU are showing off to other monkeys</p>
                    </div>
                </div><img class="img-fluid" src="resources/img/monkeySuit.jpg">
            </a></div>
        </div>
    </div>
</section>
@endsection
