<x-layouts>
    <x-slot:title>{{ $title . auth()->user()->name }}</x-slot:title>

    <div class="container mt-3">
        @if (session('success'))
            <div class="alert alert-success">
                <button type="button" class="btn-close" aria-label="Close"></button>
                {{ session('success') }}
            </div>
        @endif

        <div class="row">
            <div class="col-md-12">
                <h1>Profile {{ auth()->user()->name }}</h1>
            </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-4">
                <img src="{{ asset('storage/images/' . auth()->user()->image) }}" alt="Profile Picture"
                    class="img-fluid rounded-circle">


            </div>

            <div class="col-md-8">
                <div class="card" style="width: 45rem; height:250px; box-shadow: 0 0 10px rgba(0,0,0,0.2);">
                    <div class="card-body">
                        <h5 class="card-title">{{ auth()->user()->name }}</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">{{ auth()->user()->email }}</h6>
                        <h6 class="card-subtitle mb-5 text-body-secondary">
                            <b>Akun ini dibuat pada :</b>
                            <span style="float: right;">{{ auth()->user()->created_at->format('d-M-Y') }}</span>
                        </h6>
                        <div class="d-flex justify-content-center mb-3">
                            <a href="/updateProfil/{{ auth()->user()->email }}" class="btn btn-outline-danger me-2"
                                style="min-width: 150px;"><i class="bi bi-shield-lock-fill"></i>
                                Privacy</a>
                            <div class="dropdown">
                                <a href="#" class="btn btn-outline-success dropdown-toggle me-2"
                                    style="min-width: 150px;" data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="bi bi-menu-down"></i> Other Menu
                                </a>
                                <ul class="dropdown-menu">
                                    <li><a class="dropdown-item" href="/daftartugas/status/progress">Daftar Tugas
                                            Menunggu Review</a></li>
                                    <li><a class="dropdown-item" href="/daftartugas/status/approve">Daftar Tugas
                                            Aproval</a></li>
                                    <li><a class="dropdown-item" href="/daftartugas/status/completed">Daftar Tugas
                                            Compeleted</a></li>
                                </ul>
                            </div>
                            <a href="#" class="btn btn-outline-info me-2" style="min-width: 150px;"><i
                                    class="bi bi-file-earmark-person"></i>
                                About</a>
                            <a href="#" class="btn btn-outline-warning" style="min-width: 150px;"><i
                                    class="bi bi-bell-fill"></i>
                                Notification</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layouts>
