<div class="container">
    <h1 class="mt-5 mb-4">Daftar Kerja Kategori {{ $slot }}</h1>
    <table class="table table-responsive">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">Jenis Kegiatan</th>
                <th scope="col">PIC</th>
                <th scope="col">Kategori</th>
                <th scope="col">Frekuensi</th>
                <th scope="col">Aksi</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>Tidak ada</td>
                <td>Aksi</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>Tidak ada</td>
                <td>Aksi</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Mark</td>
                <td>Otto</td>
                <td>@mdo</td>
                <td>Tidak ada</td>
                <td>Aksi</td>
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
