<nav class="navbar default-layout col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <div class="text-center navbar-brand-wrapper d-flex align-items-top justify-content-center">
        <a class="navbar-brand brand-logo" href="{{ url('/') }}">
            <img src="{{ url('assets/images/logo.png') }}" alt="logo" style="object-fit: contain; height: 4rem;" />
        </a>
    </div>
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item dropdown d-none d-xl-inline-block">
                <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-toggle="dropdown"
                    aria-expanded="false">
                    <span class="profile-text d-none d-md-inline-flex">
                        {{ auth()->user()->username }}
                    </span>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                        <a href="/change-password" class="dropdown-item">Ganti Password</a>
                        <a href="/login" class="dropdown-item">Logout</a>
                    </div>
            </li>
        </ul>
    </div>
</nav>
