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
            <div class="new-dweet">
                <div class="profile-picture new-dweet__profile-picture"></div>
                <form action="/dweet" method="post" class="new-dweet__form">
                    {{csrf_field()}}
                    <textarea class="new-dweet__input-text form-control" placeholder="Let's dweet"
                              name="text" rows="1" id="new-dweet"></textarea>
                    <div class="d-flex">
                        <button type="submit" onclick="submit_dweet(event)" class="btn btn-primary ml-auto btn-sm mt-2">Dweet</button>
                    </div>
                </form>
            </div>
            <div id="dweet-timeline">
                <dweet-timeline :d="d" v-for="d in dweet" :key="d.dweet.id"></dweet-timeline>
            </div>
        </div>
    </div>
@endsection

@push('footer')
    <script src="/js/dweet-timeline.js"></script>
@endpush