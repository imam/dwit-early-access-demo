<!DOCTYPE html>
<html>
<head>
    <title>Dwit</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
          integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="\css\style.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        @auth
            <a class="navbar-brand" href="/">Dwit</a>
        @endauth
        @guest
            <a class="navbar-brand" href="{{route('login')}}">Dwit</a>
        @endguest
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                @auth
                    <li class="nav-item active">
                        @if(is_active('/'))
                            <a class="nav-link" href="/"><i class="icon ion-ios-home"></i> <strong>Home</strong></a>
                        @else
                            <a class="nav-link" href="/"><i class="icon ion-ios-home-outline"></i> Home</a>
                        @endif
                    </li>
                @endauth
            </ul>
            <ul class="navbar-nav">
                @auth
                    <li class="nav-item dropdown">
                        <a href="#" class="nav-link dropdown-toggle" id="profile-menu-link" data-toggle="dropdown"
                           aria-haspopup="true" aria-expanded="false">
                            <span class="profile-picture nav-profile-picture d-inline-block align-bottom"></span>
                            <span>{{auth()->user()->name}}</span>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="profile-menu-link">
                            <a href="#" class="dropdown-item">Your Profile</a>
                            <a href="{{route('profile')}}" class="dropdown-item">Edit Profile</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                                Logout
                            </a>
                        </div>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                @endauth
                @guest
                    <li class="nav-item">
                        <a href="{{route('login')}}" class="nav-link">Login</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{route('register')}}" class="nav-link">Register</a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
<div class="container main-container">
    @yield('content')
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
        integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
        crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
        integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1"
        crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.ns-autogrow/1.1.6/jquery.ns-autogrow.min.js"></script>
<script>
    $('.new-dweet__input-text').css('overflow', 'hidden').autogrow({vertical:true})
</script>
<script src="/js/app.js"></script>
<script>
    window.user_id = {{auth()->id()}}
    window.getStream = {};
    window.getStream.id = '{{env('GETSTREAM_APP_ID')}}';
    window.getStream.key = '{{env('GETSTREAM_API_KEY')}}'
</script>
@include('footer')
@stack('footer')
</body>
</html>
