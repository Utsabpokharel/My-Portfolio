@section('sidebar')
<!-- Sidebar -->
<ul class="navbar-nav sidebar sidebar-dark accordion text-gray-100" id="accordionSidebar"
    style="background-color: #33a9b9;">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3"></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="{{route('dashboard')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        People
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUser" aria-expanded="true"
            aria-controls="collapseUser">
            <i class="fa fa-fw fa-user"></i>
            <span>Users</span>
        </a>
        <div id="collapseUser" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">User Components:</h6>
                <a class="collapse-item" href="{{route('user.index')}}">All User</a>
                <a class="collapse-item" href="{{route('user.create')}}">Add User</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseRoles" aria-expanded="true"
            aria-controls="collapseRoles">
            <i class="fas fa-fw fa-user-circle"></i>
            <span>Roles</span>
        </a>
        <div id="collapseRoles" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Role Components:</h6>
                <a class="collapse-item" href="{{route('role.index')}}">All Role</a>
                <a class="collapse-item" href="{{route('role.create')}}">Add Role</a>
            </div>
        </div>
    </li>
    <!-- Nav Item - Pages Collapse Menu -->

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        About
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseAbout" aria-expanded="true"
            aria-controls="collapseAbout">
            <i class="fa fa-fw fa-info"></i>
            <span>About</span>
        </a>
        <div id="collapseAbout" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">About Components:</h6>
                <a class="collapse-item" href="">About Me</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSkills" aria-expanded="true"
            aria-controls="collapseSkills">
            <i class="fas fa-fw fa-user-circle"></i>
            <span>Skills</span>
        </a>
        <div id="collapseSkills" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Skills Components:</h6>
                <a class="collapse-item" href="">My Skills</a>
                <a class="collapse-item" href="">Add Skills</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseInterest"
            aria-expanded="true" aria-controls="collapseInterest">
            <i class="fas fa-fw fa-building"></i>
            <span>Interests</span>
        </a>
        <div id="collapseInterest" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Interests Components:</h6>
                <a class="collapse-item" href="">My Interests</a>
                <a class="collapse-item" href="">Add Interest</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTestimonials"
            aria-expanded="true" aria-controls="collapseTestimonials">
            <i class="fas fa-fw fa-user-tie"></i>
            <span>Testimonials</span>
        </a>
        <div id="collapseTestimonials" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Testimonials Components:</h6>
                <a class="collapse-item" href="">My Testimonials</a>
                <a class="collapse-item" href="">Add Testimonial</a>
            </div>
        </div>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Sidebar Message -->
    <!-- Heading -->
    <div class="sidebar-heading">
        Resume
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSummary"
            aria-expanded="true" aria-controls="collapseSummary">
            <i class="fa fa-fw fa-user"></i>
            <span>Summary</span>
        </a>
        <div id="collapseSummary" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Summary Components:</h6>
                <a class="collapse-item" href="">My Summary</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEducations"
            aria-expanded="true" aria-controls="collapseEducations">
            <i class="fas fa-fw fa-user-circle"></i>
            <span>Educations</span>
        </a>
        <div id="collapseEducations" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Educations Components:</h6>
                <a class="collapse-item" href="">My Educations</a>
                <a class="collapse-item" href="">All Educations</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseExperiences"
            aria-expanded="true" aria-controls="collapseExperiences">
            <i class="fas fa-fw fa-building"></i>
            <span>Experiences</span>
        </a>
        <div id="collapseExperiences" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Experiences Components:</h6>
                <a class="collapse-item" href="">My Experiences</a>
                <a class="collapse-item" href="">Add Experiences</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTrainings"
            aria-expanded="true" aria-controls="collapseTrainings">
            <i class="fas fa-fw fa-user-tie"></i>
            <span>Trainings</span>
        </a>
        <div id="collapseTrainings" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Trainings Components:</h6>
                <a class="collapse-item" href="">My Trainings</a>
                <a class="collapse-item" href="">Add Trainings</a>
            </div>
        </div>
    </li>


    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Sidebar Message -->
    <!-- Heading -->
    <div class="sidebar-heading">
        Miscellaneous
    </div>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseHomePage"
            aria-expanded="true" aria-controls="collapseHomePage">
            <i class="fa fa-fw fa-user"></i>
            <span>HomePage</span>
        </a>
        <div id="collapseHomePage" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">HomePage Components:</h6>
                <a class="collapse-item" href="">My HomePage</a>
            </div>
        </div>
    </li>

    <!-- Nav Item - Pages Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseServices"
            aria-expanded="true" aria-controls="collapseServices">
            <i class="fas fa-fw fa-user-circle"></i>
            <span>Services</span>
        </a>
        <div id="collapseServices" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Services Components:</h6>
                <a class="collapse-item" href="">My Services</a>
                <a class="collapse-item" href="">Add Services</a>
            </div>
        </div>
    </li>

    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePortfolio"
            aria-expanded="true" aria-controls="collapsePortfolio">
            <i class="fas fa-fw fa-building"></i>
            <span>Portfolio</span>
        </a>
        <div id="collapsePortfolio" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Portfolio Components:</h6>
                <a class="collapse-item" href="">All Projects</a>
                <a class="collapse-item" href="">Add Projects</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseSocialAccount"
            aria-expanded="true" aria-controls="collapseSocialAccount">
            <i class="fas fa-fw fa-user-tie"></i>
            <span>Social Accounts</span>
        </a>
        <div id="collapseSocialAccount" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Social Components:</h6>
                <a class="collapse-item" href="">My Social Accounts</a>
                <a class="collapse-item" href="">Add Social Accounts</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseFeedbacks"
            aria-expanded="true" aria-controls="collapseFeedbacks">
            <i class="fa fa-fw fa-user"></i>
            <span>Feedbacks</span>
        </a>
        <div id="collapseFeedbacks" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Feedbacks Components:</h6>
                <a class="collapse-item" href="">My Feedbacks</a>
            </div>
        </div>
    </li>
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseChangePassword"
            aria-expanded="true" aria-controls="collapseChangePassword">
            <i class="fas fa-fw fa-user-tie"></i>
            <span>Password Settings</span>
        </a>
        <div id="collapseChangePassword" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
            <div class="bg-white py-2 collapse-inner rounded">
                <h6 class="collapse-header">Password Components:</h6>
                <a class="collapse-item" href="">Change Password</a>
            </div>
        </div>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">
    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>
</ul>
<!-- End of
 Sidebar -->
@endsection
