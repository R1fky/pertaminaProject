<x-layouts>
    <div class="container">
        <h1 class="mt-5 mb-4">Daftar Tugas Kerja HSSE</h1>
        @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif

        <!-- Button trigger modal -->
        <div class="d-flex align-items-center mb-4">
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
                    <th scope="col">Deskripsi</th>
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
                        <td>{{ $tugas->deskripsi }}</td>
                        <td class="text-center">
                            <div class="btn-group" role="group">
                                <a href="" class="btn btn-info btn-sm me-2"><i class="bi bi-info-lg"></i></a>
                                <a href="" class="btn btn-warning btn-sm"><i class="bi bi-pencil-square"></i></a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-layouts>
