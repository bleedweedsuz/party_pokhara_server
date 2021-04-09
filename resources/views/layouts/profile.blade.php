@extends('mainframe')
@section('content')
    <div class="mdl-cell" style="width:100% !important;">
        <div class="mdl-card mdl-shadow--2dp" >
            @if ($errors->any())
                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif


            <div class="mdl-card__title">
                <h5 class="mdl-card__title-text text-color--white">PROFILE INFO</h5>
            </div>
            <div class="mdl-card__supporting-text">
                <div class="mdl-grid">
                    <div class="mdl-cell mdl-cell--8-col-desktop mdl-cell--8-col-tablet mdl-cell--4-col-phone form__article">
                        @if(session('success-profile'))
                            <div class="alert alert-success">
                                {!! session('success-profile') !!}
                            </div>
                        @endif

                        <form method="POST" action="{{ route("profile-update") }}">
                            @csrf
                            <div class="mdl-textfield mdl-js-textfield full-size">
                                <input class="mdl-textfield__input" type="text" id="email" name="email" value="{{ Auth::user()->email }}" readonly>
                                <label class="mdl-textfield__label" for="email">Email</label>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield full-size">
                                <input class="mdl-textfield__input" type="text" id="name" name="name" value="{{ Auth::user()->name }}">
                                <label class="mdl-textfield__label" for="name">Full Name</label>                            
                            </div>
                            <div style="margin-top:20px;">
                                <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-light-blue" data-upgraded=",MaterialButton,MaterialRipple">Save <span class="mdl-button__ripple-container"><span class="mdl-ripple is-animating" style="width: 262.161px; height: 262.161px; transform: translate(-50%, -50%) translate(106px, 14px);"></span></span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>        

            <div class="mdl-card__title">
                <h5 class="mdl-card__title-text text-color--white">Change Password</h5>
            </div>
            <div class="mdl-card__supporting-text">
                <div class="mdl-grid">
                    <div class="mdl-cell mdl-cell--8-col-desktop mdl-cell--8-col-tablet mdl-cell--4-col-phone form__article">
                        @if(session('success-password'))
                            <div class="alert alert-success">
                                {!! session('success-password') !!}
                            </div>
                        @endif

                        <form method="POST" action="{{ route("profile-update-password") }}">
                            @csrf
                            <div class="mdl-textfield mdl-js-textfield full-size">
                                <input class="mdl-textfield__input" type="password" id="cpass" name="cpass">
                                <label class="mdl-textfield__label" for="cpass">Old Password</label>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield full-size">
                                <input class="mdl-textfield__input" type="password" id="pass" name="pass">
                                <label class="mdl-textfield__label" for="pass">New Password</label>
                            </div>
                            <div class="mdl-textfield mdl-js-textfield full-size">
                                <input class="mdl-textfield__input" type="password" id="rpass" name="rpass">
                                <label class="mdl-textfield__label" for="rpass">Retype Password</label>
                            </div>
                            <div style="margin-top:20px;">
                                <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect button--colored-light-blue" data-upgraded=",MaterialButton,MaterialRipple">Save <span class="mdl-button__ripple-container"><span class="mdl-ripple is-animating" style="width: 262.161px; height: 262.161px; transform: translate(-50%, -50%) translate(106px, 14px);"></span></span></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('css_script')
@endsection
