<x-layouts>
    <div class="container">
        @if (Session::has('success'))
            <div class="alert alert-success mt-3">
                {{ Session::get('success') }}
            </div>
        @endif
        {{-- header --}}
        <div class="row mt-5 align-items-center justify-content-between border-bottom border-dark">
            <div class="col-md-6 col-sm-12">
                <h1 class="">Daftar TKJP</h1>
            </div>
            <div class="col-md-6 col-sm-12">
                <form class="d-flex flex-column flex-sm-row" role="search">
                    <button type="button" class="btn btn-primary mb-2 mb-sm-0 me-sm-2" data-bs-toggle="modal"
                        data-bs-target="#tambahTkjp">
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
            @foreach ($users as $user)
                <div class="col-lg-4">
                    <div class="card mt-5" style="width: 18rem;">
                        <div class="card-body row">
                            <div class="col-8">
                                <h5 class="card-title">{{ $user->name }}</h5>
                                <h5>{{ $user->bagian }}</h5>
                                <h5>{{ $user->role->role_name }}</h5>
                                {{-- menampilkan Role  --}}
                                <a href="#" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                                <a href="#" class="btn btn-primary"><i class="bi bi-clipboard2-data"></i></a>
                                <a href="#" class="btn btn-danger"><i class="bi bi-trash"></i></a>
                            </div>
                            <div class="col-4">
                                <img src="/img/profil/profile-tkjp.jfif" class="img-fluid"
                                    style="width: 120px; height: 150px;" alt="...">
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
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Tkjp </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{-- <form action="{{ route('daftartkjp.add') }}" method="POST">
              @csrf
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                      <label for="name" class="form-label">Name</label>
                      <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                      @error('name')
                          <div class="invalid-feedback">{{ $message }}</div>
                      @enderror
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                </div>
                <div class="col-md-6">
                  <div class="mb-3">
                    <label for="bagian" class="form-label">Bagian</label>
                    <input type="text" class="form-control @error('bagian') is-invalid @enderror" id="bagian" name="bagian" value="{{ old('bagian') }}">
                    @error('bagian')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-4">
                  <div class="mb-3">
                    <label for="first_name" class="form-label">First Name</label>
                    <input type="text" class="form-control @error('first_name') is-invalid @enderror" id="first_name" name="first_name" value="{{ old('first_name') }}">
                    @error('first_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="mb-3">
                    <label for="last_name" class="form-label">Last Name</label>
                    <input type="text" class="form-control @error('last_name') is-invalid @enderror" id="last_name" name="last_name" value="{{ old('last_name') }}">
                    @error('last_name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
                <div class="col-md-4">
                  <div class="mb-3">
                    <label for="role_id" class="form-label">Role</label>
                    <select class="form-select @error('role_id') is-invalid @enderror" aria-label="Default select example" name="role_id">
                        <option selected>Pilih Role</option>
                        @foreach ($roles as $role)
                        <option value="{{ $role->role_id }}">{{ $role->role_name }}</option>
                        @endforeach
                    </select>
                    @error('role_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                  </div>
                </div>
              </div>
          
              <button class="btn btn-primary">Save</button>
          </form> --}}
                        <form action="{{ route('daftartkjp.add') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <div class="row">
                                    <div class="col-6">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" class="form-control" id="name" name="name">
                                    </div>
                                    <div class="col-6">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control" id="email" name="email">
                                    </div>
                                    <div class="col-6">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password" class="form-control" id="password" name="password">
                                    </div>
                                    <div class="col-6">
                                        <label for="bagian" class="form-label">Bagian</label>
                                        <input type="text" class="form-control" id="bagian" name="bagian">
                                    </div>
                                    <div class="col-6">
                                        <label for="firt_name" class="form-label">First Name</label>
                                        <input type="text" class="form-control" id="first_name" name="first_name">
                                    </div>
                                    <div class="col-6">
                                        <label for="last_name" class="form-label">Last Name</label>
                                        <input type="text" class="form-control" id="last_name" name="last_name">
                                    </div>
                                </div>
                                <select class="form-select mt-3" aria-label="Default select example" name="role_id">
                                    <option selected>Pilih Role</option>
                                    @foreach ($roles as $role)
                                        <option value="{{ $role->role_id }}">{{ $role->role_name }}</option>
                                    @endforeach
                                </select>
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
