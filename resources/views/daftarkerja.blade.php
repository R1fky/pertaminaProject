<x-layouts>
    <div class="container">
        <h1 class="mt-5 mb-4">Daftar Tugas Kerja HSSE</h1>
        @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
        @if (Session::has('danger'))
            <div class="alert alert-danger">
                {{ Session::get('danger') }}
            </div>
        @endif

        <!-- Button trigger modal -->
        <div class="d-flex align-items-center mb-4">
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahTugas">
                <i class="bi bi-plus">Tambah tugas</i>
            </button>
            <select class="form-select form-select-sm ms-2" style="width: 110px;" aria-label="Default select example">
                <option selected>Category</option>
                @foreach ($categorys as $category)
                    <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                @endforeach
            </select>
        </div>

        <table class="table table-striped ">
            <thead>
                <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col">Nama Tugas</th>
                    <th scope="col">Frekuensi</th>
                    <th scope="col">Bulan</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">PIC</th>
                    <th scope="col">Status</th>
                    <th scope="col" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tugass as $no => $tugas)
                    <tr>
                        <td class="text-center">{{ $no + 1 }}</td>
                        <td>{{ $tugas->nama_tugas }}</td>
                        <td>{{ $tugas->frekuensi }}</td>
                        <td>{{ $tugas->bulan->nama_bulan }}</td>
                        <td>{{ $tugas->category->category_name }}</td>
                        <td>{{ $tugas->pic->name_pic }}</td>
                        <td>{{ $tugas->status }}</td>
                        <td class="text-center">
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-info btn-sm me-2" data-bs-toggle="modal"
                                    data-bs-target="#infoTugas{{ $tugas->id }}"><i class="bi bi-info-lg"></i> </i>
                                </button>
                                <button type="button" class="btn btn-warning btn-sm me-2" data-bs-toggle="modal"
                                    data-bs-target="#editTugas{{ $tugas->id }}"><i class="bi bi-pencil-square"></i>
                                </button>
                                <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                    data-bs-target="#deleteTugas{{ $tugas->id }}"><i class="bi bi-trash3"></i></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal tambah Tugas -->
    <div class="modal fade" id="tambahTugas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Tugas</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    {{-- form validate  --}}
                    <form action="{{ route('daftartugas.add') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="nama_tugas" class="form-label">Name Tugas</label>
                                    <input type="text" class="form-control @error('nama_tugas') is-invalid @enderror"
                                        id="nama_tugas" name="nama_tugas" value="{{ old('nama_tugas') }}">
                                    @error('nama_tugas')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="frekuensi" class="form-label">Frekuensi</label>
                                    <select class="form-select @error('frekuensi') is-invalid @enderror"
                                        aria-label="Default select example" name="frekuensi">
                                        <option selected>Pilih Frekuensi</option>
                                        <option value="tahunan">Tahunan</option>
                                        <option value="bulanan">Bulanan</option>
                                        <option value="mingguan">Mingguan</option>
                                    </select>
                                    @error('frekuensi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="bulan" class="form-label">Bulan</label>
                                        <select class="form-select @error('bulan_id') is-invalid @enderror"
                                            aria-label="Default select example" name="bulan_id">
                                            <option selected>Pilih Bulan</option>
                                            @foreach ($bulans as $bulan)
                                                <option value="{{ $bulan->id }}">{{ $bulan->nama_bulan }}</option>
                                            @endforeach
                                        </select>
                                        @error('bulan_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="category_id" class="form-label">Category</label>
                                        <select class="form-select @error('category_id') is-invalid @enderror"
                                            aria-label="Default select example" name="category_id">
                                            <option selected>Pilih Category</option>
                                            @foreach ($categorys as $category)
                                                <option value="{{ $category->id }}">
                                                    {{ $category->category_name }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="pic_id" class="form-label">PIC</label>
                                    <select class="form-select @error('pic_id') is-invalid @enderror"
                                        aria-label="Default select example" name="pic_id">
                                        <option selected>Pilih PIC</option>
                                        @foreach ($pics as $pic)
                                            <option value="{{ $pic->id }}">{{ $pic->name_pic }}</option>
                                        @endforeach
                                    </select>
                                    @error('pic_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            {{-- <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <input type="text" class="form-control @error('status') is-invalid @enderror"
                                        id="status" name="status" value="{{ old('status') }}">
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div> --}}
                        </div>
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi"
                                value="{{ old('deskripsi') }}" rows="3"></textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <button class="btn btn-primary">Save changes</button>
                    </form>
                    {{-- end form validate  --}}
                </div>
            </div>
        </div>
    </div>
    {{-- end modal tambah Tugas --}}

    {{-- Modal delete Tugas --}}
    @foreach ($tugass as $tugas)
        <div class="modal fade" id="deleteTugas{{ $tugas->id }}" tabindex="-1" role="dialog"
            aria-labelledby="hapusModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Tugas {{ $tugas->nama_tugas }}
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Yakin ingin hapus data? {{ $tugas->nama_tugas }}
                    </div>
                    <div class="modal-footer">
                        <a href="/daftartugas/delete/{{ $tugas->id }}" class="btn btn-danger">Hapus</a>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{-- end dalete data  --}}

    {{-- Modal info Tugas --}}
    @foreach ($tugass as $tugas)
        <div class="modal fade" id="infoTugas{{ $tugas->id }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Info Tugas {{ $tugas->nama_tugas }}
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <label for="nama_tugas" class="form-label">Nama Tugas</label>
                        <textarea class="form-control" rows="2" disabled>{{ $tugas->nama_tugas }}</textarea>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label for="frekuensi" class="form-label">Frekuensi</label>
                                <input class="form-control" type="text" placeholder="Disabled input"
                                    aria-label="Disabled input example" value="{{ $tugas->frekuensi }}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="bulan" class="form-label">Bulan</label>
                                <input class="form-control" type="text" placeholder="Disabled input"
                                    aria-label="Disabled input example" value="{{ $tugas->bulan->nama_bulan }}"
                                    disabled>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label for="category" class="form-label">Category</label>
                                <input class="form-control" type="text" placeholder="Disabled input"
                                    aria-label="Disabled input example" value="{{ $tugas->category->category_name }}"
                                    disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="pic" class="form-label">PIC</label>
                                <input class="form-control" type="text" placeholder="Disabled input"
                                    aria-label="Disabled input example" value="{{ $tugas->pic->name_pic }}" disabled>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6">
                                <label for="status" class="form-label">Status</label>
                                <input class="form-control" type="text" placeholder="Disabled input"
                                    aria-label="Disabled input example" value="{{ $tugas->status }}" disabled>
                            </div>
                            <div class="col-md-6">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea class="form-control" rows="2" disabled>{{ $tugas->deskripsi }}</textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{-- end Modal info Tugas  --}}


    {{-- Modal edit Tugas --}}
    @foreach ($tugass as $tugas)
        <div class="modal fade" id="editTugas{{ $tugas->id }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Tugas {{ $tugas->nama_tugas }}</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        {{-- form validate  --}}
                        <form action="/daftartugas/edit/{{ $tugas->id }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="nama_tugas" class="form-label">Name Tugas</label>
                                        <input type="text"
                                            class="form-control @error('nama_tugas') is-invalid @enderror"
                                            id="nama_tugas" name="nama_tugas" value="{{ $tugas->nama_tugas }}">
                                        @error('nama_tugas')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="frekuensi" class="form-label">Frekuensi</label>
                                        <select class="form-select @error('frekuensi') is-invalid @enderror"
                                            aria-label="Default select example" name="frekuensi">
                                            <option selected>{{ $tugas->frekuensi }}</option>
                                            <option value="tahunan">Tahunan</option>
                                            <option value="bulanan">Bulanan</option>
                                            <option value="mingguan">Mingguan</option>
                                        </select>
                                        @error('frekuensi')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="bulan_id" class="form-label">Bulan</label>
                                            <select class="form-select @error('bulan_id') is-invalid @enderror"
                                                aria-label="Default select example" name="bulan_id">
                                                <option selected>{{ $tugas->bulan->nama_bulan }}</option>
                                                @foreach ($bulans as $bulan)
                                                    <option value="{{ $bulan->id }}">
                                                        {{ $bulan->nama_bulan }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('bulan_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="category_id" class="form-label">Category</label>
                                            <select class="form-select @error('category_id') is-invalid @enderror"
                                                aria-label="Default select example" name="category_id">
                                                <option selected value="{{ $tugas->category->id }}" >{{ $tugas->category->category_name }}</option>
                                                @foreach ($categorys as $category)
                                                    <option value="{{ $category->id }}">
                                                        {{ $category->category_name }}
                                                    </option>
                                                @endforeach
                                            </select>
                                            @error('category_id')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="pic_id" class="form-label">PIC</label>
                                        <select class="form-select @error('pic_id') is-invalid @enderror"
                                            aria-label="Default select example" name="pic_id">
                                            <option selected value="{{ $tugas->pic->id }}">{{ $tugas->pic->name_pic }}</option>
                                            @foreach ($pics as $pic)
                                                <option value="{{ $pic->id }}">{{ $pic->name_pic }}</option>
                                            @endforeach
                                        </select>
                                        @error('pic_id')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                {{-- <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <input type="text" class="form-control @error('status') is-invalid @enderror"
                                        id="status" name="status" value="{{ old('status') }}">
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div> --}}
                            </div>
                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi"
                                    value="{{ old('deskripsi') }}" rows="3">{{ $tugas->deskripsi }}</textarea>
                                @error('deskripsi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <button class="btn btn-warning">Edit</button>
                        </form>
                        {{-- end form validate  --}}
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{-- End Modal Edit Tugas --}}
</x-layouts>
