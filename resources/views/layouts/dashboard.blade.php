@extends('mainframe')
@section('content')
     <div class="mdl-grid mdl-grid--no-spacing dashboard">
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--6-col-desktop mdl-cell--12-col-tablet mdl-cell--12-col-phone">
                    <div class="mdl-card mdl-shadow--2dp cotoneaster">
                        <div class="mdl-card__supporting-text">
                            <h4>Events</h4>
                            <div>This module show all the events and used for to modify information like, Setting category, Marked as expired, Marked as removed etc</div>
                            <a href="{{ URL::route('events') }}" target="_blank">Events</a>
                        </div>
                    </div>
                </div>
                <div class="mdl-cell mdl-cell--6-col-desktop mdl-cell--12-col-tablet mdl-cell--12-col-phone">
                    <div class="mdl-card mdl-shadow--2dp cotoneaster">
                        <div class="mdl-card__supporting-text">
                            <h4>Profile</h4>
                            <div>This module helps to update profile info of admin.</div>
                            <a href="{{ URL::route('profile') }}" target="_blank">Profile</a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
@endsection

@section('css_script')
@endsection
