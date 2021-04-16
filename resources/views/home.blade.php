@extends('layouts.app')

@section('content')
<section id="portfolio" class="content-section">
    <div class="container">
        <div class="text-center content-section-heading">
            <h3 class="text-secondary mb-0">TogetherPeopleStrong</h3>
            <h2 class="mb-5">"Apes alone weak. Apes together strong." - Caesar from Rise of the Planet of the Apes</h2>
        </div>
        <div class="row no-gutters">
            <div class="col-lg-6"><a class="portfolio-item" href="#">
                    <div class="caption">
                        <div class="caption-content">
                            <h2>Affinity Groups</h2>
                            <p class="mb-0">A yellow pencil with envelopes on a clean, blue backdrop!</p>
                        </div>
                    </div><img class="img-fluid" src="resources/img/monkeySocial.png">
                </a></div>
            <div class="col-lg-6"><a class="portfolio-item" href="#">
                    <div class="caption">
                        <div class="caption-content">
                            <h2>Job Postings</h2>
                            <p class="mb-0">A dark blue background with a colored pencil, a clip, and a tiny ice cream cone!</p>
                        </div>
                    </div><img class="img-fluid" src="resources/img/monkeySearch.jpg">
                </a></div>
            <div class="col-lg-6"><a class="portfolio-item" href="#">
                <div class="caption">
                    <div class="caption-content">
                        <h2>View Portfolios</h2>
                        <p class="mb-0">Strawberries are such a tasty snack, especially with a little sugar on top!</p>
                    </div>
                </div><img class="img-fluid" src="resources/img/monkeyLaptop.jpg">
            </a></div>
            <div class="col-lg-6"><a class="portfolio-item" href="#">
                <div class="caption">
                    <div class="caption-content">
                        <h2>Edit your Portfolio</h2>
                        <p class="mb-0">A yellow workspace with some scissors, pencils, and other objects.</p>
                    </div>
                </div><img class="img-fluid" src="resources/img/monkeySuit.jpg">
            </a></div>
        </div>
    </div>
</section>
@endsection
