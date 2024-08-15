<x-layouts>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="container mt-3">
        <form action="/updateprogres/update/{{ $tugas->id }}" method="POST" enctype="multipart/form-data">
            @csrf
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
                        aria-label="Disabled input example" value="{{ $tugas->bulan->nama_bulan }}" disabled>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6">
                    <label for="category" class="form-label">Category</label>
                    <input class="form-control" type="text" placeholder="Disabled input"
                        aria-label="Disabled input example" value="{{ $tugas->category->category_name }}" disabled>
                </div>
                <div class="col-md-6">
                    <label for="pic" class="form-label">PIC</label>
                    <input class="form-control" type="text" placeholder="Disabled input"
                        aria-label="Disabled input example" value="{{ $tugas->pic->name_pic }}" disabled>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6">
                    <label for="document" class="form-label">Upload Document</label>
                    <input type="file" class="form-control" name="pdf_file" accept="application/pdf">
                </div>
                <div class="col-md-6">
                    <label for="status" class="form-label">Status</label>
                    <input class="form-control" type="text" aria-label="input example" name="status"
                        value="{{ $tugas->status }}" disabled>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-md-6">
                    <label for="deskripsi" class="form-label">Deskripsi</label>
                    <textarea class="form-control" name="deskripsi" rows="4">{{ $tugas->deskripsi }}</textarea>
                </div>
                <div class="col-md-6">
                    <input class="form-control" type="hidden" aria-label="input example" name="user_id"
                        value="{{ auth()->user()->id }}">
                </div>
            </div>
            <div class="text-end">
                <button type="submit" class="btn btn-warning">Update</button>
            </div>
        </form>
    </div>
</x-layouts>
