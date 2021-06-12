@section('sidebar')
<!-- ======= About Section ======= -->
<section id="about" class="about">

    <!-- ======= About Me ======= -->
    <div class="about-me container">

        <div class="section-title">
            <h2>About</h2>
            <p>Learn more about me</p>
        </div>

        <div class="row">
            <div class="col-lg-4" data-aos="fade-right">
                @if ($about == [])
                <img src="Frontend/assets/img/u1.jpg" class="img-fluid" alt="">
                @else
                <img src="{{asset('Uploads/About/'.$about->photo)}}" class="img-fluid" alt="">
                @endif
            </div>
            <div class="col-lg-8 pt-4 pt-lg-0 content" data-aos="fade-left">
                <h3>Software Developer</h3>
                <p class="fst-italic">
                    @if ($about == [])
                    <h6>Update here......</h6>
                    @else
                    {{$about->short_description}}
                    @endif
                </p>
                <div class="row">
                    <div class="col-lg-6">
                        <ul>
                            <li><i class="bi bi-chevron-right"></i> <strong>Birthday :</strong>
                                <span>{{$user->dob}}</span>
                            </li>
                            <li><i class="bi bi-chevron-right"></i> <strong>Phone:</strong>
                                <span>{{$user->contact}}</span>
                            </li>
                            <li><i class="bi bi-chevron-right"></i> <strong>Address:</strong>
                                <span>{{$user->address}}</span>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-6">
                        <ul>
                            <li><i class="bi bi-chevron-right"></i> <strong>Degree:</strong>
                                <span>{{$user->degree}}</span></li>
                            <li><i class="bi bi-chevron-right"></i> <strong>Email:</strong>
                                <span>{{$user->email}}</span></li>
                            <li><i class="bi bi-chevron-right"></i> <strong>Freelance:</strong> <span>Available</span>
                            </li>
                        </ul>
                    </div>
                </div>
                <p>
                    @if ($about == [])
                    <h6>Update here......</h6>
                    @else
                    {{$about->about}}
                    @endif
                </p>
            </div>
        </div>

    </div><!-- End About Me -->

    <!-- ======= Counts ======= -->
    <div class="counts container">

        <div class="row">

            <div class="col-lg-3 col-md-6">
                <div class="count-box">
                    <i class="bi bi-gear"></i>
                    <span data-purecounter-start="0" data-purecounter-end="{{$skill_count}}"
                        data-purecounter-duration="1" class="purecounter"></span>
                    <p>Skills</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
                <div class="count-box">
                    <i class="bi bi-journal-richtext"></i>
                    <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1"
                        class="purecounter"></span>
                    <p>Projects</p>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                <div class="count-box">
                    <i class="bi bi-laptop"></i>
                    <span data-purecounter-start="0" data-purecounter-end="{{$training_count}}"
                        data-purecounter-duration="1" class="purecounter"></span>
                    <p>Trainings</p>
                </div>
            </div>

            {{-- <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
                <div class="count-box">
                    <i class="bi bi-award"></i>
                    <span data-purecounter-start="0" data-purecounter-end="24" data-purecounter-duration="1"
                        class="purecounter"></span>
                    <p>Awards</p>
                </div>
            </div> --}}

        </div>

    </div><!-- End Counts -->

    <!-- ======= Skills  ======= -->
    <div class="skills container">

        <div class="section-title">
            <h2>Skills</h2>
        </div>
        @if ($skill != [])
        <div class="row skills-content">
            @foreach ($skill as $skills)
            <div class="progress col-md-4">
                <span class="skill">{{$skills->skill_name}} <i class="val">{{$skills->ability}}%</i></span>
                <div class="progress-bar-wrap">
                    <div class="progress-bar" role="progressbar" aria-valuenow="{{$skills->ability}}" aria-valuemin="0"
                        aria-valuemax="100"></div>
                </div>
            </div>
            @endforeach
            @else
            <h6>Update here......</h6>
            @endif
        </div>
    </div>
    <!-- End Skills -->

    <!-- ======= Interests ======= -->
    <div class="interests container">

        <div class="section-title">
            <h2>Interests</h2>
        </div>
        <div class="row">
            @if ($interest == [])
            <div class="icon-box">
                <i>
                    <img src="{{asset('Frontend/assets/img/u1.jpg')}}" class="img-fluid" alt="Interest" width="50px">
                </i>
                <h6>Update here......</h6>
            </div>
            @else
            @foreach ($interest as $interest )
            <div class="icon-box col-md-4">
                <i>
                    <img src="{{asset('Uploads/Interest/'.$interest->icon)}}" class="img-fluid" alt="Interest"
                        width="50px">
                </i>
                <h3>{{$interest->interest_field}}</h3>
            </div>
            @endforeach
            @endif
        </div>

    </div><!-- End Interests -->

    <!-- ======= Testimonials ======= -->
    <div class="testimonials container">

        <div class="section-title">
            <h2>Testimonials</h2>
        </div>

        <div class="testimonials-slider swiper-container" data-aos="fade-up" data-aos-delay="100">
            <div class="swiper-wrapper">
                @if ($testimonial !=[])
                @foreach ($testimonial as $test)
                <div class="swiper-slide">
                    <div class="testimonial-item">
                        <p>
                            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
                            {{$test->description}}
                            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
                        </p>
                        <img src="{{asset('Uploads/Testimonial/'.$test->photo)}}" class="testimonial-img" alt="">
                        <h3>{{$test->name}}</h3>
                        <h4>{{$test->designation}}</h4>
                    </div>
                </div>
                @endforeach
                @else
                <h6>Update here......</h6>
                @endif
                <!-- End testimonial item -->
            </div>
            <div class="swiper-pagination"></div>
        </div>

        <div class="owl-carousel testimonials-carousel">

        </div>

    </div><!-- End Testimonials  -->

</section><!-- End About Section -->

<!-- ======= Resume Section ======= -->
<section id="resume" class="resume">
    <div class="container">

        <div class="section-title">
            <h2>Resume</h2>
            <p>Check My Resume</p>
        </div>

        <div class="row">
            <div class="col-lg-6">
                {{-- summary --}}
                @if ($summary !=[])
                <h3 class="resume-title">Summary</h3>
                <div class="resume-item pb-0">
                    <h4>{{$summary->title}}</h4>
                    <p>
                        {{$summary->summary}}
                    </p>
                </div>
                @else
                <h6>Update here......</h6>
                @endif

                {{-- trainings --}}
                <h3 class="resume-title">Trainings</h3>
                @foreach ($training as $train )
                <div class="resume-item">
                    <h4>{{$train->training_title}}({{$train->duration}})</h4>
                    <h5>{{$train->year}}</h5>
                    <p><em>{{$train->trained_at}}</em></p>
                </div>
                @endforeach
                {{-- education --}}
                <h3 class="resume-title">Education</h3>
                @foreach ($education as $educ )
                <div class="resume-item">
                    <h4>{{$educ->course}}</h4>
                    <h5>{{$educ->year}}</h5>
                    <p><em>{{$educ->institute}}</em></p>
                    <p>{{$educ->description}}</p>
                </div>
                @endforeach
            </div>
            <div class="col-lg-6">
                {{-- experience --}}
                <h3 class="resume-title">Professional Experience</h3>
                @foreach ($experience as $exp)
                <div class="resume-item">
                    <h4>{{$exp->title}}</h4>
                    <h5>{{$exp->year}}</h5>
                    <p><em>{{$exp->company}}, {{$exp->location}} </em></p>
                    <p>
                        {{$exp->description}}
                    </p>
                </div>
                @endforeach
            </div>
        </div>

    </div>
</section><!-- End Resume Section -->

<!-- ======= Services Section ======= -->
<section id="services" class="services">
    <div class="container">

        <div class="section-title">
            <h2>Services</h2>
            <p>My Services</p>
        </div>

        <div class="row">
            @foreach ($service as $service)
            <div class="col-md-4 p-1">
                <div class="icon-box">
                    <div class="icon"><i><img src="{{asset('Uploads/Services/'.$service->thumbnail)}}" alt=""
                                width="65px"></i></div>
                    <h4><a href="">{{$service->service_name}}</a></h4>
                    <p>{{$service->description}}</p>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section><!-- End Services Section -->

<!-- ======= Portfolio Section ======= -->
<section id="portfolio" class="portfolio">
    <div class="container">

        <div class="section-title">
            <h2>Portfolio</h2>
            <p>My Works</p>
        </div>

        <div class="row">
            <div class="col-lg-12 d-flex justify-content-center">
                <ul id="portfolio-flters">
                    <li data-filter="*" class="filter-active">All</li>
                    <li data-filter=".filter-app">App</li>
                    <li data-filter=".filter-web">Web</li>
                    <li data-filter=".filter-card">Other</li>
                </ul>
            </div>
        </div>

        <div class="row portfolio-container">
            {{-- App --}}
            @foreach ($app as $app)
            <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-wrap">
                    <img src="{{ asset('Uploads/Portfolio/'.$app->image) }}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>{{$app->project_name}}</h4>
                        <p>{{$app->category}}</p>
                        <div class="portfolio-links">
                            <a href="{{ asset('Uploads/Portfolio/'.$app->image) }}" data-gallery="portfolioGallery"
                                class="portfolio-lightbox" title="{{$app->project_name}}"><i class="bx bx-plus"></i></a>
                            <a href="{{route('details',$app->id)}}" data-gallery="portfolioDetailsGallery"
                                data-glightbox="type: external" class="portfolio-details-lightbox"
                                title="Portfolio Details"><i class="bx bx-link"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            {{-- web --}}
            @foreach ($web as $web)
            <div class="col-lg-4 col-md-6 portfolio-item filter-web">
                <div class="portfolio-wrap">
                    <img src="{{ asset('Uploads/Portfolio/'.$web->image) }}" class="img-fluid" alt="web projects">
                    <div class="portfolio-info">
                        <h4>{{$web->project_name}}</h4>
                        <p>{{$web->category}}</p>
                        <div class="portfolio-links">
                            <a href="{{ asset('Uploads/Portfolio/'.$web->image) }}" data-gallery="portfolioGallery"
                                class="portfolio-lightbox" title="{{$web->project_name}}"><i class="bx bx-plus"></i></a>
                            <a href="{{route('details',$web->id)}}" data-gallery="portfolioDetailsGallery"
                                data-glightbox="type: external" class="portfolio-details-lightbox"
                                title="Portfolio Details"><i class="bx bx-link"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            {{-- card --}}
            @foreach ($other as $other)
            <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                <div class="portfolio-wrap">
                    <img src="{{ asset('Uploads/Portfolio/'.$other->image) }}" class="img-fluid" alt="">
                    <div class="portfolio-info">
                        <h4>{{$other->project_name}}</h4>
                        <p>{{$other->category}}</p>
                        <div class="portfolio-links">
                            <a href="{{ asset('Uploads/Portfolio/'.$other->image) }}" data-gallery="portfolioGallery"
                                class="portfolio-lightbox" title="{{$other->project_name}}"><i
                                    class="bx bx-plus"></i></a>
                            <a href="{{route('details',$other->id)}}" data-gallery="portfolioDetailsGallery"
                                data-glightbox="type: external" class="portfolio-details-lightbox"
                                title="Portfolio Details"><i class="bx bx-link"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section><!-- End Portfolio Section -->

<!-- ======= Contact Section ======= -->
<section id="contact" class="contact">
    <div class="container">

        <div class="section-title">
            <h2>Contact</h2>
            <p>Contact Me</p>
        </div>

        <div class="row mt-2">

            <div class="col-md-6 d-flex align-items-stretch">
                <div class="info-box">
                    <i class="bx bx-map"></i>
                    <h3>My Address</h3>
                    <p>{{$user->address}}</p>
                </div>
            </div>

            <div class="col-md-6 mt-4 mt-md-0 d-flex align-items-stretch">
                <div class="info-box">
                    <i class="bx bx-share-alt"></i>
                    <h3>Social Profiles</h3>
                    <div class="social-links">
                        @foreach ($socialaccount as $social)
                        <a href="{{$social->url}}" target="_blank" class="p-1"><img
                                src="{{asset('Uploads/SocialAccount/'.$social->icon)}}" alt="social icons"
                                width="30px"></a>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-md-6 mt-4 d-flex align-items-stretch">
                <div class="info-box">
                    <i class="bx bx-envelope"></i>
                    <h3>Email Me</h3>
                    <p>{{$user->email}}</p>
                </div>
            </div>
            <div class="col-md-6 mt-4 d-flex align-items-stretch">
                <div class="info-box">
                    <i class="bx bx-phone-call"></i>
                    <h3>Call Me</h3>
                    <p>{{$user->contact}}</p>
                </div>
            </div>
        </div>

        {{-- <form action="{{route('feedback.store')}}" method="post" role="" class="php-email-form mt-4"> --}}
        <form class="user form form-control mt-4" method="post" action="{{route('feedback.store')}}"
            enctype="multipart/form-data" style="background: #13456e;">
            @csrf
            <div class="row">
                <div class="col-md-6 form-group">
                    <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                    <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
                </div>
            </div>
            <div class="form-group mt-3">
                <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
            </div>
            <div class="form-group mt-3">
                <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
            </div>
            <div class="text-center mt-1"><button class="btn btn-success" type="submit">Send Message</button></div>
        </form>

    </div>
</section>
<!-- End Contact Section -->
@endsection
