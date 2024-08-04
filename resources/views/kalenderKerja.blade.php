<x-layouts>
    <div class="container">
        <h1 class="mt-5 mb-4">Daftar Tugas Kerja HSSE</h1>
        @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif

        <!-- Button trigger modal -->
        <div class="d-flex align-items-center">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahTugas">
                <i class="bi bi-plus">Tambah tugas</i>
            </button>
            <select class="form-select form-select-sm ms-2" style="width: 110px;" aria-label="Default select example">
                <option selected>Category</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
                <option value="3">Four</option>
            </select>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Tugas</th>
                    <th scope="col">Frekuensi</th>
                    <th scope="col">Document</th>
                    <th scope="col">Category</th>
                    <th scope="col">PIC</th>
                    <th scope="col">Status</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tugass as $no => $tugas)
                    <tr>
                        <th scope="row">{{ $no + 1 }}</th>
                        <td>{{ $tugas->nama_tugas }}</td>
                        <td>{{ $tugas->frekuensi }}</td>
                        <td>{{ $tugas->document }}</td>
                        <td>{{ $tugas->category->category_name }}</td>
                        <td>{{ $tugas->pic->name_pic }}</td>
                        <td>{{ $tugas->status }}</td>
                        <td>{{ $tugas->deskripsi }}</td>
                        <td>
                            <a href="" class="btn btn-info"><i class="bi bi-info-lg"></i></i></a>
                            <a href="" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal -->
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
                                    <input type="frekuensi"
                                        class="form-control @error('frekuensi') is-invalid @enderror" id="frekuensi"
                                        name="frekuensi" value="{{ old('frekuensi') }}">
                                    @error('frekuensi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-3">
                                    <label for="document" class="form-label">Upload Document</label>
                                    <input type="file" class="form-control @error('document') is-invalid @enderror"
                                        id="document" name="document" value="{{ old('document') }}">
                                    @error('document')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="category_id" class="form-label">Category</label>
                                    <select class="form-select @error('category_id') is-invalid @enderror"
                                        aria-label="Default select example" name="category_id">
                                        <option selected>Pilih Category</option>
                                        @foreach ($categorys as $category)
                                            <option value="{{ $category->id }}">{{ $category->category_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('category_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
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

                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="status" class="form-label">Status</label>
                                    <input type="text" class="form-control @error('status') is-invalid @enderror"
                                        id="status" name="status" value="{{ old('status') }}">
                                    @error('status')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="mb-3">
                                    <label for="deskripsi" class="form-label">deskripsi</label>
                                    <input type="text"
                                        class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi"
                                        name="deskripsi" value="{{ old('deskripsi') }}">
                                    @error('deskripsi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-primary">Save changes</button>
                    </form>
                    {{-- end form validate  --}}
                </div>
            </div>
        </div>
    </div>
</x-layouts>
