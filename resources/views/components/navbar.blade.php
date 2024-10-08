{{-- navbar --}}
<nav class="navbar navbar-expand-lg bg-white sticky-top">
    <div class="container">
        <a class="navbar-brand" href="#" style="font-weight: bold;">Pertamina</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item {{ Request::is('home') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('home') }}">Home</a>
                </li>
                @if (auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
                    <li class="nav-item {{ Request::is('daftartkjp') ? 'active' : '' }}">
                        <a class="nav-link" href="{{ route('daftartkjp') }}">Daftar TKJP</a>
                    </li>
                @endif
                <li class="nav-item {{ Request::is('daftarkerja') ? 'active' : '' }}">
                    <a class="nav-link" href="{{ route('daftarkerja') }}">Daftar Kerja</a>
                </li>
                @auth
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ auth()->user()->name }}
                        </a>
                        <ul class="dropdown-menu mt-2 ">
                            <li><a class="dropdown-item" href="/profil">Profil</a></li>
                            <li>
                                <form action="/logout" method="post">
                                    @csrf

                                    <button type="submit" class="dropdown-item px-3 border-0">Log- Out</button>
                                </form>
                            </li>
                            {{-- <li><a class="dropdown-item" href="">Log- Out</a></li> --}}
                        </ul>
                    </li>
                @endauth
            </ul>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>

<style>
    .active {
        background-color: #ccc;
        color: #fff;
    }
</style>

<style>
    .navbar {
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    @media (max-width: 768px) {
        .navbar-toggler {
            position: absolute;
            top: 10px;
            right: 10px;
        }
    }
</style>

{{-- end navbar --}}
