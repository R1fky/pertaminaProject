<x-layouts>
    <x-slot:title>{{ $title }}</x-slot:title>
    @if (session('success'))
        <div class="alert alert-success">
            {{ $session('success') }}
        </div>
    @endif
    <div class="container mt-5">
        <h1 class="mt-5 mb-4">Daftar Tugas Kerja {{ $category->category_name }}</h1>
        <table class="table table-stripedmt mt-5">
            <thead>
                <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col">Nama Tugas</th>
                    <th scope="col">Frekuensi</th>
                    <th scope="col">Bulan</th>
                    <th scope="col">Document</th>
                    <th scope="col">PIC</th>
                    <th scope="col">Status</th>
                    <th scope="col" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($tugas as $no => $tgs)
                    <tr>
                        <td class="text-center">{{ $no + 1 }}</td>
                        <td>{{ $tgs->nama_tugas }}</td>
                        <td>{{ $tgs->frekuensi }}</td>
                        <td>{{ $tgs->bulan->nama_bulan }}</td>
                        <td>
                            @if ($tgs->document)
                                <a href="{{ asset('storage/document/' . $tgs->document) }}"
                                    target="_blank">{{ $tgs->document }}</a>
                            @else
                                <span style="color: #FF0000; font-weight: bold">belum ada document</span>
                            @endif
                        </td>
                        <td>{{ $tgs->pic->name_pic }}</td>
                        <td>{{ $tgs->status }}</td>
                        <td class="text-center">
                            <div class="btn-group" role="group">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-info btn-sm me-2" data-bs-toggle="modal"
                                    data-bs-target="#infoTugas{{ $tgs->id }}">
                                    <i class="bi bi-info-lg"></i>
                                </button>
                                <button type="button" class="btn btn-warning btn-sm me-2" data-bs-toggle="modal"
                                    data-bs-target="#editTugas{{ $tgs->id }}">
                                    <i class="bi bi-pen"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>


        {{-- modal Info --}}
        @foreach ($tugas as $tgs)
            <div class="modal fade" id="infoTugas{{ $tgs->id }}" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Info Tugas
                                {{ $category->category_name }}
                            </h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <label for="nama_tugas" class="form-label">Nama Tugas</label>
                            <textarea class="form-control" rows="2" disabled>{{ $tgs->nama_tugas }}</textarea>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label for="frekuensi" class="form-label">Frekuensi</label>
                                    <input class="form-control" type="text" placeholder="Disabled input"
                                        aria-label="Disabled input example" value="{{ $tgs->frekuensi }}" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label for="bulan" class="form-label">Bulan</label>
                                    <input class="form-control" type="text" placeholder="Disabled input"
                                        aria-label="Disabled input example" value="{{ $tgs->bulan->nama_bulan }}"
                                        disabled>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label for="category" class="form-label">Category</label>
                                    <input class="form-control" type="text" placeholder="Disabled input"
                                        aria-label="Disabled input example" value="{{ $tgs->category->category_name }}"
                                        disabled>
                                </div>
                                <div class="col-md-6">
                                    <label for="pic" class="form-label">PIC</label>
                                    <input class="form-control" type="text" placeholder="Disabled input"
                                        aria-label="Disabled input example" value="{{ $tgs->pic->name_pic }}" disabled>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-6">
                                    <label for="status" class="form-label">Status</label>
                                    <input class="form-control" type="text" placeholder="Disabled input"
                                        aria-label="Disabled input example" value="{{ $tgs->status }}" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label for="deskripsi" class="form-label">Deskripsi</label>
                                    <textarea class="form-control" rows="2" disabled>{{ $tgs->deskripsi }}</textarea>
                                </div>
                            </div>
                            <div class="col">
                                <label for="deskripsi" class="form-label">Document</label>
                                <input class="form-control" type="text" readonly value="{{ $tgs->document }}"
                                    disabled />
                                @if ($tgs->document)
                                    <a href="{{ asset('storage/document/' . $tgs->document) }}" target="_blank">View
                                        Document</a>
                                @else
                                    <span style="color: #FF0000; font-weight: bold">belum ada document</span>
                                @endif
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    @foreach ($users as $user)
                                        @if ($tgs->user_id == $user->id)
                                            <p class="card-text">Upload By : <span
                                                    style="color: #373A40; font-weight: bold">{{ $user->name }}</span>
                                        @endif
                                    @endforeach

                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <form action="/update/progressStatus/{{ $tgs->id }}" method="POST">
                                @csrf
                                @if (auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
                                    @if ($tgs->status === 'Approve')
                                        @if (auth()->user()->role_id == 1)
                                            <!-- hanya manager yang dapat mengakses tombol Complite -->
                                            <button type="submit" name="action" value="complite"
                                                class="btn btn-success"
                                                {{ $tgs->status === 'Complite' ? 'disabled' : '' }}>Complite</button>
                                        @endif
                                    @elseif ($tgs->status === 'Complite')
                                        <button type="submit" name="action" value="complite"
                                            class="btn btn-success" disabled>Complite</button>
                                    @else
                                        <button type="submit" name="action" value="terima"
                                            class="btn btn-success">Terima</button>
                                    @endif
                                @else
                                @endif
                            </form>
                            {{-- @if (auth()->user()->role_id == 1 || auth()->user()->role_id == 2)
                                    @if ($tgs->status === 'Approve')
                                        <button type="submit" class="btn btn-success disabled">Terima</button>
                                    @else
                                        <button type="submit" class="btn btn-success">Terima</button>
                                    @endif
                                @endif --}}
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        {{-- end modal --}}


        {{-- Modal edit Tugas --}}
        @foreach ($tugas as $tgs)
            <div class="modal fade" id="editTugas{{ $tgs->id }}" tabindex="-1"
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
                            <span style="color: #021526; font-weight: bold">{{ $tgs->nama_tugas }}</span>

                            <div class="modal-footer mt-3">
                                <a href="/updatetugas/{{ $tgs->id }}" class="btn btn-warning">Iya</a>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    {{-- End Modal Edit Tugas --}}
    </div>
</x-layouts>
