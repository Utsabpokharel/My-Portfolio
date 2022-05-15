@include('Frontend.Layout.head')
@section('title', 'Details')
@yield('head')
<main id="main">

    <!-- ======= Portfolio Details ======= -->
    <div id="portfolio-details" class="portfolio-details">
        <div class="container">

            <div class="row">

                <div class="col-lg-8">
                    <h2 class="portfolio-title">{{$portfolio->project_name}}</h2>

                    <div class="portfolio-details-slider swiper-container">
                        <div class="swiper-wrapper align-items-center">
                            <div class="swiper-slide">
                                <img src="{{asset('Uploads/Portfolio/'.$portfolio->image)}}" alt="" width="300px">
                            </div>
                        </div>
                        <div class="swiper-pagination"></div>
                    </div>

                </div>

                <div class="col-lg-4 portfolio-info">
                    <h3>Project information</h3>
                    <ul>
                        <li><strong>Category</strong>: {{$portfolio->category}}</li>
                        <li><strong>Client</strong>: {{$portfolio->client}}</li>
                        <li><strong>Project date</strong>: {{$portfolio->project_date}}</li>
                        @if ($portfolio->project_url !=[])
                        <li><strong>Project URL</strong>: <a href="{{$portfolio->project_url}}"
                                target="_blank">{{$portfolio->project_url}}</a>
                        </li>
                        @else
                        <li><strong>Project URL</strong>: N/A</li>
                        @endif
                    </ul>

                    <p>
                        {{$portfolio->description}}
                    </p>
                </div>

            </div>

        </div>
    </div><!-- End Portfolio Details -->

</main><!-- End #main -->
