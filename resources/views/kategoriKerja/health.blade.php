<x-layouts>
    <div class="container">
        <h1 class="mt-5 mb-4">Daftar Kerja Kategory</h1>
        <table class="table table-responsive">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Jenis Kegiatan</th>
                    <th scope="col">Deskripsi</th>
                    <th scope="col">Frekuensi</th>
                    <th scope="col">Document</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">status</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach ($tugass as $tugas)
                        
                    @endforeach
                    <th scope="row">1</th>
                    <td>{{ $tugas->nama_tugas }}</td>
                    <td>{{ $tugas->deskripsi }}</td>
                    <td>{{ $tugas->frekuensi }}</td>
                    <td>{{ $tugas->document }}</td>
                    <td>{{ $tugas->category->category_name }}</td>
                    <td>{{ $tugas->status }}</td>
                    <td>
                        <a href="#" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                        <a href="#" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>

    <style>
        /* Make table responsive */
        .table-responsive {
            overflow-x: auto;
        }

        /* Adjust table layout for small screens */
        @media only screen and (max-width: 768px) {
            .table {
                font-size: 0.8em;
            }

            .table th,
            .table td {
                padding: 5px;
            }
        }

        /* Adjust table layout for extra small screens */
        @media only screen and (max-width: 480px) {
            .table {
                font-size: 0.6em;
            }

            .table th,
            .table td {
                padding: 2px;
            }
        }
    </style>

</x-layouts>
