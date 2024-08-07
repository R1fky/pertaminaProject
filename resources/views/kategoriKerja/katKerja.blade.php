<x-layouts>
    <div class="container mt-5">
        <table class="table table-stripedmt mt-5">
            <thead>
                <tr>
                    <th scope="col" class="text-center">No</th>
                    <th scope="col">Nama Tugas</th>
                    <th scope="col">Frekuensi</th>
                    <th scope="col">Bulan</th>
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
                        <td>{{ $tgs->bulan }}</td>
                        <td>{{ $tgs->pic->name_pic }}</td>
                        <td>{{ $tgs->status }}</td>
                        <td class="text-center">
                            <div class="btn-group" role="group">
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-info btn-sm me-2" data-bs-toggle="modal"
                                    data-bs-target="#infoTugas{{ $tgs->id }}">
                                    <i class="bi bi-info-lg"></i>
                                </button>
                                <a href="" class="btn btn-warning btn-sm me-2"><i
                                        class="bi bi-pencil-square"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>


        {{-- modal --}}
        @foreach ($tugas as $tgs)
            <div class="modal fade" id="infoTugas{{ $tgs->id }}" tabindex="-1" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
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
                                        aria-label="Disabled input example" value="{{ $tgs->bulan }}" disabled>
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
