<div class="mdl-layout__drawer">
    <header>Dashboard</header>
    <div class="scroll__wrapper" id="scroll__wrapper">
        <div class="scroller" id="scroller">
            <div class="scroll__container" id="scroll__container">
                <nav class="mdl-navigation" style="padding-top:0px !important;">
                    <a class="mdl-navigation__link {{ Request::routeIs("dashboard")?"mdl-navigation__link--current":"" }}" href="{{ URL::route("dashboard") }}"><i class="material-icons" role="presentation">dashboard</i>Dashboard</a>
                    <a class="mdl-navigation__link {{ Request::routeIs("events")?"mdl-navigation__link--current":"" }}" href="{{ route("events") }}"><i class="material-icons">event</i>Events</a>
                    <a class="mdl-navigation__link {{ Request::routeIs("profile")?"mdl-navigation__link--current":"" }}" href="{{ route("profile") }}"><i class="material-icons">account_circle</i>Profile</a>
                    <a class="mdl-navigation__link " href="#" onclick="event.preventDefault(); document.getElementById('logout').submit(); " ><i class="material-icons">settings_power</i>Logout</a>
                    <form method="POST" id="logout" action="{{ route('logout') }}">@csrf </form>
                    <div class="mdl-layout-spacer"></div>
                </nav>
            </div>
        </div>
        <div class='scroller__bar' id="scroller__bar"></div>
    </div>
</div>