<x-layouts>
    <x-slot:title>{{ $title }}</x-slot:title>
    @if (session('success'))
        <div class="alert alert-success">
            {{ $session('success') }}
        </div>
    @endif
    <div class="container mt-5">
        <h1 class="mt-5 mb-4">Daftar Tugas Kerja </h1>
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
                @foreach (auth()->user()->tugas->where('status', 'Approve') as $no => $tugas)
                    <tr>
                        <td class="text-center">{{ $no }}</td>
                        <td>{{ $tugas->nama_tugas }}</td>
                        <td>{{ $tugas->frekuensi }}</td>
                        <td>{{ $tugas->bulan->nama_bulan }}</td>
                        <td>{{ $tugas->category->category_name }}</td>
                        <td>{{ $tugas->pic->name_pic }}</td>
                        <td>{{ $tugas->status }}</td>
                        <td class="text-center">
                            <div class="btn-group" role="group">
                                <button type="button" class="btn btn-info btn-sm me-2" data-bs-toggle="modal"
                                    data-bs-target="#infoTugas{{ $tugas->id }}"><i class="bi bi-info-lg"></i>
                                    </i>
                                </button>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        {{-- modal info  --}}
        @foreach ($tugass as $tugas)
            <div class="modal fade" id="infoTugas{{ $tugas->id }}" tabindex="-1"
                aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Info Tugas
                                {{ $tugas->nama_tugas }}
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
                                        aria-label="Disabled input example"
                                        value="{{ $tugas->category->category_name }}" disabled>
                                </div>
                                <div class="col-md-6">
                                    <label for="pic" class="form-label">PIC</label>
                                    <input class="form-control" type="text" placeholder="Disabled input"
                                        aria-label="Disabled input example" value="{{ $tugas->pic->name_pic }}"
                                        disabled>
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
                                    <a href="{{ asset('storage/document/' . $tugas->document) }}"
                                        target="_blank">View
                                        Document</a>
                                @else
                                    <span style="color: #FF0000; font-weight: bold">belum ada document</span>
                                @endif
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
        {{-- end modal --}}
    </div>
</x-layouts>
