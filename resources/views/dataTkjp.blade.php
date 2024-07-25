<x-layouts>
    <div class="container">
      @if(session()->has('success'))
        <div class="alert alert-success mt-3">
          {{ session()->get('success') }}
        </div>
      @endif
      {{-- header --}}
      <div class="row mt-5 align-items-center justify-content-between border-bottom border-dark">
        <div class="col-md-6 col-sm-12">
          <h1 class="">Daftar TKJP</h1>
        </div>
        <div class="col-md-6 col-sm-12">
          <form class="d-flex flex-column flex-sm-row" role="search">
            <button type="button" class="btn btn-primary mb-2 mb-sm-0 me-sm-2" data-bs-toggle="modal" data-bs-target="#tambahTkjp">
              <i class="bi bi-person-plus"></i>
            </button>
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit"><i class="bi bi-search"></i></button>
          </form>
        </div>
      </div>
      {{-- end header --}}
      
          {{-- card --}}
          <div class="row">
            @foreach ( $datatkjp as $data)
            <div class="col-lg-4">
                <div class="card mt-5" style="width: 18rem;">
                  <div class="card-body row">
                    <div class="col-8">
                      <h5 class="card-title">{{ $data->name }}</h5>
                      <h5>{{ $data->nip }}</h5>
                      <h5>{{ $data->bagian }}</h5>
                      {{-- menampilkan Role  --}}
                      <a href="#" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                      <a href="#" class="btn btn-primary"><i class="bi bi-clipboard2-data"></i></a>
                      <a href="#" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                    </div>
                    <div class="col-4">
                      <img src="/img/profil/profile-tkjp.jfif" class="img-fluid" style="width: 120px; height: 150px;" alt="...">
                    </div>
                  </div>
                </div>
            </div>
            @endforeach
          </div>
          {{-- end card --}}

    <!-- Modal -->
    <div class="modal fade" id="tambahTkjp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Tkjp   </h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <form action="{{ route('daftartkjp.add') }}" method="POST">
              @csrf
              <div class="mb-3">
                  <label for="name" class="form-label">Name</label>
                  <input type="text" class="form-control" id="name" name="name">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" id="email" name="email">
                  <label for="nip" class="form-label">Nip</label>
                  <input type="number" class="form-control" id="nip" name="nip">
                  <label for="bagian" class="form-label">Bagian</label>
                  <input type="bagian" class="form-control" id="bagian" name="bagian">
                  <label for="password" class="form-label">Password</label>
                  <input type="password" class="form-control" id="password" name="password">
              </div>
              <button class="btn btn-primary">Save</button>
            </form>
          </div>

        </div>
      </div>
    </div>
    {{-- end Modal --}}
    </div>
</x-layouts>
