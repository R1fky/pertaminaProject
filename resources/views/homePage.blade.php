<x-layouts>
    <!-- Carousel -->
    <div id="carousel" class="carousel slide" data-bs-ride="carousel">
        <!-- Carousel inner -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="color-block"
                    style="background-color: #C40C0C; display: flex; justify-content: center; align-items: center;">
                    <div class="container">
                        <div class="row align-items-center">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                                <h2 style="margin-top: 20px;" class="mt-4-md text-lg fs-4">Selamat Datang</h2>
                                <p class="text-lg fs-6">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed sit
                                    amet nulla auctor, vestibulum magna sed, convallis ex.</p>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 text-center">
                                <img src="/img/profill.png" alt="Image" class="img-fluid img-md-50"
                                    style="max-width: 60%; height: auto;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end carousel  --}}

    {{-- daftar kerja --}}
    <div class="container">
        <h1 class="text-center mt-5">Daftar Kerja</h1>
        <div class="row d-flex justify-content-between kotak-kerja">
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="card mt-5 mx-auto" style="width: 16rem; background-color: #F8DFC2;">
                    <div class="card-body">
                        <h5 class="card-title"><a href="/health"
                                style="text-decoration: none; color: inherit;">Health</a></h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">Jumlah Tugas</h6>
                        <div class="progress" role="progressbar" aria-label="Info example" aria-valuenow="50"
                            aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar bg-info text-dark" style="width: 50%">50%</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="card mt-5 mx-auto" style="width: 16rem; background-color: #F50537;">
                    <div class="card-body">
                        <h5 class="card-title"><a href="/safety"
                                style="text-decoration: none; color: inherit;">Safety</a></h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">Jumlah Tugas</h6>
                        <div class="progress" role="progressbar" aria-label="Info example" aria-valuenow="50"
                            aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar bg-info text-dark" style="width: 50%">50%</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="card mt-5 mx-auto" style="width: 16rem; background-color: #3399FF;">
                    <div class="card-body">
                        <h5 class="card-title"><a href="/security"
                                style="text-decoration: none; color: inherit;">Security</a></h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">Jumlah Tugas</h6>
                        <div class="progress" role="progressbar" aria-label="Info example" aria-valuenow="50"
                            aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar bg-info text-dark" style="width: 50%">50%</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                <div class="card mt-5 mx-auto" style="width: 16rem; background-color: #0EB24E;">
                    <div class="card-body">
                        <h5 class="card-title"><a href="/environment"
                                style="text-decoration: none; color: inherit;">Environment</a></h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">Jumlah Tugas</h6>
                        <div class="progress" role="progressbar" aria-label="Info example" aria-valuenow="50"
                            aria-valuemin="0" aria-valuemax="100">
                            <div class="progress-bar bg-info text-dark" style="width: 50%">50%</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end daftar kerja --}}


    {{-- jadwal kerja --}}
    <div class="container mt-5"
        style="background-color: #F6F5F5; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); padding-top: 20px; border-radius: 15px; padding-bottom: 20px;">
        <h1 class="text-center mb-5" style="margin-top: 20px;">Jadwal Kalender Kerja</h1>
        <div class="row justify-content-center">
            <div class="col-md-2 col-sm-4 col-6 mb-4">
                <div class="card" style="width: 100%; margin-bottom: 20px;">
                    <div class="card-body">
                        <h5 class="card-title">1</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">Jumlah Tugas</h6>
                        <a href="{{ route('daftartugas') }}" class="btn btn-outline-info btn-sm">Lihat Tugas</a>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-sm-4 col-6 mb-4">
                <div class="card" style="width: 100%; margin-bottom: 20px;">
                    <div class="card-body">
                        <h5 class="card-title">2</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">Jumlah Tugas</h6>
                        <a href="" class="btn btn-outline-info btn-sm">Lihat Tugas</a>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-sm-4 col-6 mb-4">
                <div class="card" style="width: 100%; margin-bottom: 20px;">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-sm-4 col-6 mb-4">
                <div class="card" style="width: 100%; margin-bottom: 20px;">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-sm-4 col-6 mb-4">
                <div class="card" style="width: 100%; margin-bottom: 20px;">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                    </div>
                </div>
            </div>
            <div class="col-md-2 col-sm-4 col-6 mb-4">
                <div class="card" style="width: 100%; margin-bottom: 20px;">
                    <div class="card-body">
                        <h5 class="card-title">Card title</h5>
                        <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end jadwal kerja --}}
</x-layouts>
