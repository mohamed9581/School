<!-- ========== App Menu ========== -->
<div class="app-menu navbar-menu">
    <!-- LOGO -->
    <div class="navbar-brand-box">
        <!-- Dark Logo-->
        <a href="index.html" class="logo logo-dark">
            <span class="logo-sm">
                <img src="{{ URL::asset('assets/images/logo-sm.png') }}" alt="" height="22">
            </span>
            <span class="logo-lg">
                <img src="{{ URL::asset('assets/images/logo-dark.png') }}" alt="" height="17">
            </span>
        </a>
        <!-- Light Logo-->


        @if (Auth::guard('web')->check())
            <a href="{{ route('dashboard') }}" class="logo logo-light">
            @elseif (Auth::guard('student')->check())
                <a href="{{ route('dashboardStudent') }}" class="logo logo-light">
                @elseif (Auth::guard('teacher')->check())
                    <a href="{{ route('dashboardTeacher') }}" class="logo logo-light">
                    @elseif (Auth::guard('parent')->check())
                        <a href="{{ route('dashboardParent') }}" class="logo logo-light">
        @endif


        <span class="logo-sm">
            <img src="{{ URL::asset('assets/images/logo-sm.png') }}" alt="" height="22">
        </span>
        <span class="logo-lg">
            <img src="{{ URL::asset('attachments/logo/' . $settings['logo']) }}" alt="" height="60">
        </span>
        </a>
        <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover"
            id="vertical-hover">
            <i class="ri-record-circle-line"></i>
        </button>
    </div>

    <div id="scrollbar">
        <div class="container-fluid">
            @if (auth('web')->check())
                @include('partials.sidebare.admin-sidebar')
            @endif

            @if (auth('student')->check())
                @include('partials.sidebare.student-sidebar')
            @endif

            @if (auth('teacher')->check())
                @include('partials.sidebare.teacher-sidebar')
            @endif

            @if (auth('parent')->check())
                @include('partials.sidebare.parent-sidebar')
            @endif
        </div>
        <!-- Sidebar -->
    </div>

    <div class="sidebar-background"></div>
</div>
<!-- Left Sidebar End -->
<!-- Vertical Overlay-->
<div class="vertical-overlay"></div>
