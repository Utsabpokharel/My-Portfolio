@section('header')
<!-- ======= Header ======= -->
<header id="header">
    <div class="container">
        <div class="row">
            <div class="col-md-7">
                <h1 style="margin-top: 10px"><a href="">{{$user->name}}</a></h1>
            </div>
            <div class="col-md-5">
                <nav id="navbar" class="navbar mt-3">
                    <ul>
                        <li><a class="nav-link active" href="#header">Home</a></li>
                        <li><a class="nav-link" href="#about">About</a></li>
                        <li><a class="nav-link" href="#resume">Resume</a></li>
                        <li><a class="nav-link" href="#services">Services</a></li>
                        <li><a class="nav-link" href="#portfolio">Portfolio</a></li>
                        <li><a class="nav-link" href="#contact">Contact</a></li>
                    </ul>
                    <i class="bi bi-list mobile-nav-toggle"></i>
                </nav>
            </div>
            <!-- .navbar -->
            <div class="social-links">
                <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
                <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
                <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div>
        </div>
        @if ($home != [])
        <h2 class="text-secondary text-center" style="margin:20% 0 0 50%">{{$home->description}}</h2>
        @else
        <h2 class="text-secondary text-center" style="margin:20% 0 0 50%">Update here...</h2>
        @endif
    </div>
</header>
<!-- End Header -->
@endsection
