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
                @foreach (auth()->user()->tugas->where('status', 'completed') as $no => $tugas)
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
</x-layouts>
