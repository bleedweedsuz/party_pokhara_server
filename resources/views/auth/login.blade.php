@extends('loginframe')
@section('content')
<main class="mdl-layout__content">
    <div class="mdl-card mdl-card__login mdl-shadow--2dp">
        <div class="mdl-card__supporting-text color--dark-gray">
            <div class="mdl-grid">
                <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
                    <span class="login-name text-color--white">Sign in</span>
                    <span class="login-secondary-text text-color--smoke">Enter fields to sign in to Dashboard</span>
                </div>
                <x-auth-session-status class="mb-4" :status="session('status')" />
                <x-auth-validation-errors class="mb-4" :errors="$errors" />

                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                            <input class="mdl-textfield__input" style="padding:10px;" id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus>
                            <label class="mdl-textfield__label" for="e-mail">Email</label>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label full-size">
                            <input class="mdl-textfield__input"  style="padding:10px;" id="password" type="password" name="password" required autocomplete="current-password">
                            <label class="mdl-textfield__label" for="password">Password</label>
                        </div>
                        <div class="mdl-textfield mdl-js-textfield full-size">
                            <input id="remember_me" type="checkbox" class="rounded" name="remember">
                            <label for="remember_me">Remember me</label>
                        </div>
                    </div>
                    <div class="mdl-cell mdl-cell--12-col mdl-cell--4-col-phone submit-cell">
                        <div class="mdl-layout-spacer"></div>
                        <input type="submit" class="mdl-button mdl-js-button mdl-button--raised color--light-blue" value="SIGNIN" />
                    </div>
                </form>
            </div>
        </div>
    </div>
</main>
@endsection

@section('css_script')
@endsection