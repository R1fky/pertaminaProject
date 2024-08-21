<x-layouts>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="container">
        @if (Session::has('success'))
            <div class="alert alert-success mt-3">
                {{ Session::get('success') }}
            </div>
        @endif

        @if (session('danger'))
            <div class="alert alert-danger">
                {{ session('danger') }}
            </div>
        @endif
        {{-- header --}}
        <div class="row mt-5 align-items-center justify-content-between border-bottom border-dark">
            <div class="col-md-6 col-sm-12">
                <h1 class="">Daftar TKJP</h1>
            </div>
            <div class="col-md-6 col-sm-12">
                <form class="d-flex flex-column flex-sm-row" role="search">
                    <button type="button" class="btn btn-outline-info mb-2 mb-sm-0 me-sm-2" data-bs-toggle="modal"
                        data-bs-target="#tambahTkjp">
                        <i class="bi bi-person-plus"></i>
                    </button>

                    {{-- Button searching --}}
                    <form action="{{ route('daftartkjp') }}" method="GET">
                        <input class="form-control me-2" type="search" name="search" placeholder="Search"
                            aria-label="Search">
                        <button class="btn btn-outline-dark" type="submit"><i class="bi bi-search"></i></button>
                    </form>
                </form>
            </div>
        </div>
        {{-- end header --}}

        {{-- card --}}
        <div class="row">
            @if ($users->count() == 0)
                <div class="card mt-3 bg-danger text-white">
                    <div class="card-body">
                        <h5 class="card-title">Tidak ada data yang ditemukan</h5>
                        <p class="card-text">Maaf, tidak ada hasil untuk "{{ $search }}".</p>
                        <a href="{{ route('daftartkjp') }}" class="btn btn-success"><i class="bi bi-skip-backward"></i>
                            Back to Daftar TKJP</a>
                    </div>
                </div>
            @else
                @foreach ($users as $user)
                    @if (auth()->user()->role_id === 2 || auth()->user()->role_id === 1)
                        @if ($user->role_id === 3)
                            <div class="col-lg-4">
                                {{-- @if (auth()->user->role_id !== 2 && auth()->user->role_id !== 1) --}}
                                <div class="card mt-5" style="width: 100%; max-width: 500px;">
                                    <div class="card-body row">
                                        <div class="col-md-8">
                                            <h5 class="card-title">{{ $user->name }}</h5>
                                            <h5>{{ $user->bagian }}</h5>
                                            <h5>{{ $user->role->role_name }}</h5>
                                            {{-- menampilkan Role  --}}
                                            {{-- btn edit data --}}
                                            <button type="button" class="btn btn-warning mb-2 mb-sm-0 me-sm-2"
                                                data-bs-toggle="modal" data-bs-target="#edit{{ $user->id }}">
                                                <i class="bi bi-pencil-square"></i>
                                            </button>
                                            {{-- end btn edit data --}}
                                            {{-- button delet data  --}}
                                            <button type="button" class="btn btn-danger mb-2 mb-sm-0 me-sm-2"
                                                data-bs-toggle="modal" data-bs-target="#hapusModal{{ $user->id }}">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                            {{-- end button delet data  --}}

                                            <!-- Modal Delet data-->
                                            <div class="modal fade" id="hapusModal{{ $user->id }}" tabindex="-1"
                                                role="dialog" aria-labelledby="hapusModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Delete
                                                                Data
                                                                TKJP
                                                                {{ $user->name }}
                                                            </h1>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Yakin ingin hapus data? {{ $user->email }}
                                                        </div>
                                                        <div class="modal-footer">
                                                            <a href="{{ route('daftartkjp.delete', $user->email) }}"
                                                                class="btn btn-danger">Hapus</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- end dalete data  --}}

                                            <!-- Modal Edit Data -->
                                            <div class="modal fade" id="edit{{ $user->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Edit
                                                                Data ?
                                                                {{ $user->name }}</h1>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            {{-- form validate  --}}
                                                            <form action="/daftartkjp/edit/{{ $user->id }}"
                                                                method="POST" enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="mb-3">
                                                                            <label for="name"
                                                                                class="form-label">Name</label>
                                                                            <input type="text"
                                                                                class="form-control @error('name') is-invalid @enderror"
                                                                                id="name" name="name"
                                                                                value="{{ $user->name }}">
                                                                            @error('name')
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="mb-3">
                                                                            <label for="email"
                                                                                class="form-label">Email</label>
                                                                            <input type="email"
                                                                                class="form-control @error('email') is-invalid @enderror"
                                                                                id="email" name="email"
                                                                                value="{{ $user->email }}">
                                                                            @error('email')
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-7">
                                                                        <div class="mb-3">
                                                                            <label for="email"
                                                                                class="form-label">Upload
                                                                                Image</label>
                                                                            <input type="file"
                                                                                class="form-control @error('image') is-invalid @enderror"
                                                                                id="image" name="image"
                                                                                value="{{ $user->image }}">
                                                                            @error('image')
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="mb-3">
                                                                            <label for="password"
                                                                                class="form-label">Password</label>
                                                                            <input type="password"
                                                                                class="form-control @error('password') is-invalid @enderror"
                                                                                id="password" name="password"
                                                                                value="{{ old('password') }}">
                                                                            @error('password')
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="mb-3">
                                                                            <label for="bagian"
                                                                                class="form-label">Bagian</label>
                                                                            <input type="text"
                                                                                class="form-control @error('bagian') is-invalid @enderror"
                                                                                id="bagian" name="bagian"
                                                                                value="{{ $user->bagian }}">
                                                                            @error('bagian')
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <div class="mb-3">
                                                                            <label for="first_name"
                                                                                class="form-label">First
                                                                                Name</label>
                                                                            <input type="text"
                                                                                class="form-control @error('first_name') is-invalid @enderror"
                                                                                id="first_name" name="first_name"
                                                                                value="{{ $user->first_name }}">
                                                                            @error('first_name')
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="mb-3">
                                                                            <label for="last_name"
                                                                                class="form-label">Last
                                                                                Name</label>
                                                                            <input type="text"
                                                                                class="form-control @error('last_name') is-invalid @enderror"
                                                                                id="last_name" name="last_name"
                                                                                value="{{ $user->last_name }}">
                                                                            @error('last_name')
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="mb-3">
                                                                            <label for="role_id"
                                                                                class="form-label">Role</label>
                                                                            <select
                                                                                class="form-select @error('role_id') is-invalid @enderror"
                                                                                aria-label="Default select example"
                                                                                name="role_id">
                                                                                <option selected
                                                                                    value="{{ $user->role->id }}">
                                                                                    {{ $user->role->role_name }}
                                                                                </option>
                                                                                @foreach ($roles as $role)
                                                                                    <option
                                                                                        value="{{ $role->id }}">
                                                                                        {{ $role->role_name }}
                                                                                    </option>
                                                                                @endforeach
                                                                            </select>
                                                                            @error('role_id')
                                                                                <div class="invalid-feedback">
                                                                                    {{ $message }}
                                                                                </div>
                                                                            @enderror
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <button type="submit" class="btn btn-warning"
                                                                    data-bs-dismiss="modal">Edit</button>
                                                            </form>
                                                            {{-- end form validate  --}}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- end Edit Modal --}}
                                        </div>
                                        <div class="col-md-4">
                                            <img src="{{ asset('storage/images/' . $user->image) }}"
                                                class="img-fluid rounded"
                                                style="width: 100%; height: 150px; object-fit: cover;" alt="...">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @else
                        <div class="col-lg-4">
                            {{-- @if (auth()->user->role_id !== 2 && auth()->user->role_id !== 1) --}}
                            <div class="card mt-5" style="width: 100%; max-width: 500px;">
                                <div class="card-body row">
                                    <div class="col-md-8">
                                        <h5 class="card-title">{{ $user->name }}</h5>
                                        <h5>{{ $user->bagian }}</h5>
                                        <h5>{{ $user->role->role_name }}</h5>
                                        {{-- menampilkan Role  --}}
                                        {{-- btn edit data --}}
                                        <button type="button" class="btn btn-warning mb-2 mb-sm-0 me-sm-2"
                                            data-bs-toggle="modal" data-bs-target="#edit{{ $user->id }}">
                                            <i class="bi bi-pencil-square"></i>
                                        </button>
                                        {{-- end btn edit data --}}
                                        {{-- button delet data  --}}
                                        <button type="button" class="btn btn-danger mb-2 mb-sm-0 me-sm-2"
                                            data-bs-toggle="modal" data-bs-target="#hapusModal{{ $user->id }}">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                        {{-- end button delet data  --}}

                                        <!-- Modal Delet data-->
                                        <div class="modal fade" id="hapusModal{{ $user->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="hapusModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete
                                                            Data
                                                            TKJP
                                                            {{ $user->name }}
                                                        </h1>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Yakin ingin hapus data? {{ $user->email }}
                                                    </div>
                                                    <div class="modal-footer">
                                                        <a href="{{ route('daftartkjp.delete', $user->email) }}"
                                                            class="btn btn-danger">Hapus</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- end dalete data  --}}

                                        <!-- Modal Edit Data -->
                                        <div class="modal fade" id="edit{{ $user->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Data
                                                            ?
                                                            {{ $user->name }}</h1>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        {{-- form validate  --}}
                                                        <form action="/daftartkjp/edit/{{ $user->id }}"
                                                            method="POST" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label for="name"
                                                                            class="form-label">Name</label>
                                                                        <input type="text"
                                                                            class="form-control @error('name') is-invalid @enderror"
                                                                            id="name" name="name"
                                                                            value="{{ $user->name }}">
                                                                        @error('name')
                                                                            <div class="invalid-feedback">
                                                                                {{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label for="email"
                                                                            class="form-label">Email</label>
                                                                        <input type="email"
                                                                            class="form-control @error('email') is-invalid @enderror"
                                                                            id="email" name="email"
                                                                            value="{{ $user->email }}">
                                                                        @error('email')
                                                                            <div class="invalid-feedback">
                                                                                {{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-7">
                                                                    <div class="mb-3">
                                                                        <label for="email"
                                                                            class="form-label">Upload
                                                                            Image</label>
                                                                        <input type="file"
                                                                            class="form-control @error('image') is-invalid @enderror"
                                                                            id="image" name="image"
                                                                            value="{{ $user->image }}">
                                                                        @error('image')
                                                                            <div class="invalid-feedback">
                                                                                {{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label for="password"
                                                                            class="form-label">Password</label>
                                                                        <input type="password"
                                                                            class="form-control @error('password') is-invalid @enderror"
                                                                            id="password" name="password"
                                                                            value="{{ old('password') }}">
                                                                        @error('password')
                                                                            <div class="invalid-feedback">
                                                                                {{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="mb-3">
                                                                        <label for="bagian"
                                                                            class="form-label">Bagian</label>
                                                                        <input type="text"
                                                                            class="form-control @error('bagian') is-invalid @enderror"
                                                                            id="bagian" name="bagian"
                                                                            value="{{ $user->bagian }}">
                                                                        @error('bagian')
                                                                            <div class="invalid-feedback">
                                                                                {{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="mb-3">
                                                                        <label for="first_name"
                                                                            class="form-label">First
                                                                            Name</label>
                                                                        <input type="text"
                                                                            class="form-control @error('first_name') is-invalid @enderror"
                                                                            id="first_name" name="first_name"
                                                                            value="{{ $user->first_name }}">
                                                                        @error('first_name')
                                                                            <div class="invalid-feedback">
                                                                                {{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="mb-3">
                                                                        <label for="last_name" class="form-label">Last
                                                                            Name</label>
                                                                        <input type="text"
                                                                            class="form-control @error('last_name') is-invalid @enderror"
                                                                            id="last_name" name="last_name"
                                                                            value="{{ $user->last_name }}">
                                                                        @error('last_name')
                                                                            <div class="invalid-feedback">
                                                                                {{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="mb-3">
                                                                        <label for="role_id"
                                                                            class="form-label">Role</label>
                                                                        <select
                                                                            class="form-select @error('role_id') is-invalid @enderror"
                                                                            aria-label="Default select example"
                                                                            name="role_id">
                                                                            <option selected
                                                                                value="{{ $user->role->id }}">
                                                                                {{ $user->role->role_name }}</option>
                                                                            @foreach ($roles as $role)
                                                                                <option value="{{ $role->id }}">
                                                                                    {{ $role->role_name }}
                                                                                </option>
                                                                            @endforeach
                                                                        </select>
                                                                        @error('role_id')
                                                                            <div class="invalid-feedback">
                                                                                {{ $message }}
                                                                            </div>
                                                                        @enderror
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <button type="submit" class="btn btn-warning"
                                                                data-bs-dismiss="modal">Edit</button>
                                                        </form>
                                                        {{-- end form validate  --}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        {{-- end Edit Modal --}}
                                    </div>
                                    <div class="col-md-4">
                                        <img src="{{ asset('storage/images/' . $user->image) }}"
                                            class="img-fluid rounded"
                                            style="width: 100%; height: 150px; object-fit: cover;" alt="...">
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            @endif
            @if ($users->count() == 1)
                <a href="{{ route('daftartkjp') }}" class="mt-2"><i class="bi bi-skip-backward"></i>
                    Back to Daftar TKJP</a>
            @endif
        </div>
        {{-- end card --}}

        <!-- Modal -->
        <div class="modal fade" id="tambahTkjp" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Tkjp </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        {{-- form validate  --}}
                        <form action="{{ route('daftartkjp.add') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text"
                                            class="form-control @error('name') is-invalid @enderror" id="name"
                                            name="name" value="{{ old('name') }}">
                                        @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email"
                                            class="form-control @error('email') is-invalid @enderror" id="email"
                                            name="email" value="{{ old('email') }}">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Upload Image</label>
                                        <input type="file"
                                            class="form-control @error('image') is-invalid @enderror" id="image"
                                            name="image" value="{{ old('image') }}">
                                        @error('image')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="password" class="form-label">Password</label>
                                        <input type="password"
                                            class="form-control @error('password') is-invalid @enderror"
                                            id="password" name="password">
                                        @error('password')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="bagian" class="form-label">Bagian</label>
                                        <input type="text"
                                            class="form-control @error('bagian') is-invalid @enderror" id="bagian"
                                            name="bagian" value="{{ old('bagian') }}">
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
                                        <input type="text"
                                            class="form-control @error('first_name') is-invalid @enderror"
                                            id="first_name" name="first_name" value="{{ old('first_name') }}">
                                        @error('first_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="last_name" class="form-label">Last Name</label>
                                        <input type="text"
                                            class="form-control @error('last_name') is-invalid @enderror"
                                            id="last_name" name="last_name" value="{{ old('last_name') }}">
                                        @error('last_name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="mb-3">
                                        <label for="role_id" class="form-label">Role</label>
                                        <select class="form-select @error('role_id') is-invalid @enderror"
                                            aria-label="Default select example" name="role_id">
                                            <option selected>Pilih Role</option>
                                            @foreach ($roles as $role)
                                                <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                                            @endforeach
                                        </select>
                                        @error('role_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-primary">Save</button>
                        </form>
                        {{-- end form validate  --}}
                    </div>
                </div>
            </div>
        </div>
        {{-- end Modal --}}
</x-layouts>
