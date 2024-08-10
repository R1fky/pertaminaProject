<x-layouts>
    <!-- Modal Structure -->
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

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
                                <h2 style="margin-top: 20px;" class="mt-4-md text-lg fs-4">
                                    Selamat Datang
                                    <span style="color: #F9E400; font-weight: bold">{{ auth()->user()->name }}</span>
                                </h2>
                                <p class="text-lg fs-6"></p>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12 text-center">
                                <img src="{{ asset('storage/images/' . auth()->user()->image) }}" alt="Image"
                                    class="img-fluid img-md-50" style="max-width: 40%; height: auto;">
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
            @foreach ($categorys as $category)
                <div class="col-lg-3 col-md-4 col-sm-6 col-xs-12">
                    <div class="card mt-5 mx-auto"
                        style="width: 16rem; 
            @if ($category->category_name == 'health') background-color: #F8DFC2;
            @elseif($category->category_name == 'safety')
                background-color: #F50537;
            @elseif($category->category_name == 'security')
                background-color: #3399FF;
            @else
                background-color: #0EB24E; @endif ">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="/kategorikerja/{{ $category->category_name }}"
                                    style="text-decoration: none; color: inherit;">{{ $category->category_name }}</a>
                            </h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary">Jumlah Tugas</h6>
                            <div class="progress" role="progressbar" aria-label="Info example" aria-valuenow="50"
                                aria-valuemin="0" aria-valuemax="100">
                                <div class="progress-bar bg-info text-dark" style="width: 50%">50%</div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {{-- end daftar kerja --}}


    {{-- jadwal kerja --}}
    <div class="container mt-5"
        style="background-color: #F6F5F5; box-shadow: 0 0 10px rgba(0, 0, 0, 0.2); padding-top: 20px; border-radius: 15px; padding-bottom: 20px;">
        <h1 class="text-center mb-5" style="margin-top: 20px;">Jadwal Kalender Kerja</h1>

        <div class="row justify-content-center">
            @foreach ($bulans as $bulan)
                <div class="col-md-2 col-sm-4 col-6 mb-4">
                    <div class="card" style="width: 100%; margin-bottom: 20px;">
                        <div class="card-body">
                            <h5 class="card-title">{{ $bulan->nama_bulan }}</h5>
                            <h6 class="card-subtitle mb-2 text-body-secondary"></h6>
                            <a href="/daftartugas/{{ $bulan->nama_bulan }}" class="btn btn-outline-info btn-sm">Lihat
                                Tugas</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    {{-- end jadwal kerja --}}

</x-layouts>
