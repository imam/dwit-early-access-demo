<!DOCTYPE html>
<html>
<head>
    <title>Dwit</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    <link rel="stylesheet" href="http://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="\css\style.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <a class="navbar-brand" href="#">Dwit</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#"><i class="icon ion-home"></i> Home <span class="sr-only">(current)</span></a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="#"><i class="icon ion-ios-bell-outline"> </i>Notifications</a>
      </li> -->
    </ul>
    <!-- <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
      <a href="" class="btn btn-outline-success my-2 my-sm-0">Search</a href="">
    </form> -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a href="/profile" class="nav-link">
                <span class="profile-picture nav-profile-picture d-inline-block align-bottom"></span>
                <span>{{auth()->user()->name}}</span>
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                         document.getElementById('logout-form').submit();">
                Logout
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                {{ csrf_field() }}
            </form>
        </li>
        <!-- <li class="nav-item">
            <a href="#" class="btn btn-primary nav-dweet">
                Dweet
            </a>
        </li> -->
    </ul>
  </div>
  </div>
</nav>
<div class="container main-container">
    <div class="row">
        <div class="col-lg-4">
            <div class="dwit-card account-detail-card">
                <a href="">
                    <div class="account-detail-card__image"></div>
                </a>
                <a href="">
                    <div class="profile-picture account-detail-card__profile-picture">
                    </div>
                </a>
                <div class="account-detail-card__profile-name"><a href="" class="account-detail-card__profile-name-link">{{auth()->user()->name}}</a></div>
                <div class="account-detail-card__profile-username">
                    <a class="account-detail-card__profile-username-link" href="">{{'@'.auth()->user()->username}}</a>
                </div>
                <div class="account-detail-card__meta">
                    
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="new-dweet">
                <div class="profile-picture new-dweet__profile-picture"></div>
                <form action="/dweet" method="post" class="new-dweet__form">
                    {{csrf_field()}}
                    <div class="">
                        <input type="text" class="new-dweet__input-text form-control" placeholder="Let's dweet" name="text">
                        <input type="submit" style="visibility: hidden; position: absolute;" />
                    </div>
                </form>
            </div>
            @foreach(auth()->user()->dweet->sortByDesc('id') as $dweet)
            <a href="" class="dweet-link">
                <div class="dweet">
                    <div class="profile-picture dweet-profile-picture"></div>
                    <div class="dweet-meta">
                        <span class="dweet-name">{{auth()->user()->name}}</span>
                        {{'@'.auth()->user()->username}}
                    </div>
                    <div class="dweet-text">
                        {{$dweet->text}}
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
</body>
</html>