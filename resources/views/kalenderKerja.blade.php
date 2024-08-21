<x-layouts>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="container">
        <h1 class="mt-5 mb-4">Daftar Tugas Kerja HSSE</h1>
        @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif

        <!-- Button trigger modal -->

        <table class="table table-striped ">
            <thead>
                <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col">Nama Tugas</th>
                    <th scope="col">Frekuensi</th>
                    <th scope="col">Bulan</th>
                    <th scope="col">Document</th>
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
                        <td>
                            @if ($tugas->document)
                                <a href="{{ asset('storage/document/' . $tugas->document) }}"
                                    target="_blank">{{ $tugas->document }}</a>
                            @else
                                <span style="color: #FF0000; font-weight: bold">belum ada document</span>
                            @endif
                        </td>
                        <td>{{ $tugas->category->category_name }}</td>
                        <td>{{ $tugas->pic->name_pic }}</td>
                        <td>{{ $tugas->status }}</td>
                        <td class="text-center">
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-info btn-sm me-2" data-bs-toggle="modal"
                                    data-bs-target="#infoTugas{{ $tugas->id }}">
                                    <i class="bi bi-info-lg"></i>
                                </button>
                                <button type="button" class="btn btn-warning btn-sm me-2" data-bs-toggle="modal"
                                    data-bs-target="#editTugas{{ $tugas->id }}">
                                    <i class="bi bi-pen"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- modal info tugas --}}
    @foreach ($tugass as $tugas)
        <div class="modal fade" id="infoTugas{{ $tugas->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Info Tugas
                            {{ $tugas->category->category_name }}
                        </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
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
                        <div class="col">
                            <label for="deskripsi" class="form-label">Document</label>
                            <input class="form-control" type="text" readonly value="{{ $tugas->document }}"
                                disabled />
                            @if ($tugas->document)
                                <a href="{{ asset('storage/document/' . $tugas->document) }}" target="_blank">View
                                    Document</a>
                            @else
                                <span style="color: #FF0000; font-weight: bold">belum ada document</span>
                            @endif
                        </div>
                        <div class="row mt-3">
                            <div class="col">
                                @foreach ($users as $user)
                                    @if ($tugas->user_id == $user->id)
                                        <p class="card-text">Upload By : <span
                                                style="color: #373A40; font-weight: bold">{{ $user->name }}</span>
                                    @endif
                                @endforeach

                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <form action="/update/progressStatus/{{ $tugas->id }}" method="POST">
                            @csrf
                            @if (auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
                                @if ($tugas->status === 'Approve')
                                    @if (auth()->user()->role_id == 1)
                                        <!-- hanya manager yang dapat mengakses tombol Complite -->
                                        <button type="submit" name="action" value="complite"
                                            class="btn btn-success"
                                            {{ $tugas->status === 'Complite' ? 'disabled' : '' }}>Complite</button>
                                    @endif
                                @elseif ($tugas->status === 'Complite')
                                    <button type="submit" name="action" value="complite" class="btn btn-success"
                                        disabled>Complite</button>
                                @else
                                    <button type="submit" name="action" value="terima"
                                        class="btn btn-success">Terima</button>
                                @endif
                            @else
                            @endif
                        </form>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    {{-- end modal --}}

    {{-- Modal edit Tugas --}}
    @foreach ($tugass as $tugas)
        <div class="modal fade" id="editTugas{{ $tugas->id }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Tugas </h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah Anda ingin Update Progress
                        <span style="color: #021526; font-weight: bold">{{ $tugas->nama_tugas }}</span>

                        <div class="modal-footer mt-3">
                            <a href="/updatetugas/{{ $tugas->id }}" class="btn btn-warning">Iya</a>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
    </div>
    {{-- End Modal Edit Tugas --}}
</x-layouts>
