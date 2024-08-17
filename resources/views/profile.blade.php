<x-layouts>
    <x-slot:title>{{ $title . auth()->user()->name }}</x-slot:title>
    <div class="container mt-3">
        <div class="row">
            <div class="col-md-12">
                <h1>Profile Page {{ auth()->user()->name }}</h1>
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
                            <b>Joined :</b>
                            <span style="float: right;">{{ auth()->user()->created_at->format('d-M-Y') }}</span>
                        </h6>
                        <div class="d-flex justify-content-center mb-3">
                            <a href="/updateProfil/{{ auth()->user()->id }}" class="btn btn-outline-danger me-2" style="min-width: 150px;"><i
                                    class="bi bi-shield-lock-fill"></i>
                                Privacy</a>
                            <a href="#" class="btn btn-outline-success me-2" style="min-width: 150px;"><i
                                    class="bi bi-menu-down"></i> Other
                                Menu</a>
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
