<div id="left-sidebar" class="sidebar">
    <div class="navbar-brand">
        <a href="{{route('dashboard')}}">
            <img src="{{asset('assets/images/logo-with-name-learnifyid.svg')}}" alt="Smart School Logo" class="img-fluid">
        </a>
        <button type="button" class="btn-toggle-offcanvas btn btn-sm float-right"><i class="lnr lnr-menu icon-close"></i></button>
    </div>
    <div class="sidebar-scroll">
        <div class="user-account">
            <div class="user_div">
                <img src="{{asset('assets/images/user.png')}}" class="user-photo" alt="User Profile Picture">
            </div>
            <div class="dropdown">
                <span>Halo,</span>
                <a href="javascript:void(0);" class="dropdown-toggle user-name" data-toggle="dropdown"><strong>{{ Auth::user()->name }}</strong></a>
                <ul class="dropdown-menu dropdown-menu-right account vivify flipInY p-0">
                    <li><a href="{{ route('change-password') }}" ><i class="icon-lock"></i>Ganti Password</a></li>
                    <li><a href="#" class="js-sweetalert" data-type="confirm-logout"><i class="icon-power"></i>Keluar</a></li>
                </ul>
            </div>                
        </div>  
        <nav id="left-sidebar-nav" class="sidebar-nav">
            <ul id="main-menu" class="metismenu">
                @if (Auth::user()->role === "ADMIN")
                    @include('layouts.admin._menu')
                @endif
                @if (Auth::user()->role === "TEACHER")
                    @if(Request::is('subject/*/course/*/topic/*/detail/*'))
                        @include('layouts.teacher._menu_topic_detail')
                    @elseif(Request::is('subject/*/course/*/topic/*'))
                        @include('layouts.teacher._menu_topic')
                    @elseif(Request::is('subject/*/course/*'))
                        @include('layouts.teacher._menu_course')
                    @elseif(Request::is('subject/*'))
                        @include('layouts.teacher._menu_subject')
                    @else 
                        @include('layouts.teacher._menu')
                    @endif
                @endif
            </ul>
        </nav>     
    </div>
</div>