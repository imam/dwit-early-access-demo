@extends('layouts.app')

@section('content')
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
                <div class="account-detail-card__profile-name"><a href=""
                                                                  class="account-detail-card__profile-name-link">{{auth()->user()->name}}</a>
                </div>
                <div class="account-detail-card__profile-username">
                    <a class="account-detail-card__profile-username-link" href="">{{'@'.auth()->user()->username}}</a>
                </div>
                <div class="account-detail-card__meta">

                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">Edit Profile</div>
                <div class="card-body">
                    <form action="/profile" method="post">
                        <input type="hidden" name="_method" value="put">
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control" name="name" value="{{auth()->user()->name}}">
                        </div>
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input type="text" class="form-control" name="username" value="{{auth()->user()->username}}">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" value="{{auth()->user()->email}}">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password">
                        </div>
                        <div class="form-group">
                            <label for="password">Konfirmasi Password</label>
                            <input type="password" class="form-control" name="password-confirm">
                        </div>
                        <button type="submit" class="btn btn-primary">Perbarui</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection