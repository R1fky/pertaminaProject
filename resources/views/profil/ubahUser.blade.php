<x-boot>
    <x-slot:title>{{ $title }}</x-slot:title>
    <div class="container d-flex justify-content-center">
        <div class="card" style="width: 18rem; box-shadow: 0 0 10px rgba(0,0,0,0.2);">
            <div class="card-body">
                <h5 class="card-title">Privacy</h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">Update Email dan Passowrd</h6>
                <form action="/updateEmail/{{ $user->email }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email address</label>
                        <input type="email" class="form-control mb-3 @error('email') is-invalid @enderror"
                            id="email" name="email" value="{{ $user->email }}">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <button type="submit" class="btn btn-outline-dark w-100">Ganti Email</button>
                    </div>
                </form>
                <form action="/updatePassword/{{ $user->email }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control mb-3 @error('password') is-invalid @enderror"
                            id="password" name="password" value="{{ $user->password }}">
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <button type="submit" class="btn btn-outline-dark w-100">Ganti Password</button>
                    </div>
                </form>
                <button type="button" class="btn btn-outline-dark w-100" data-bs-toggle="modal"
                    data-bs-target="#deleteAccount{{ $user->id }}">
                    Delet Account
                </button>

                <!-- Modal Delete Account -->
                <div class="modal fade" id="deleteAccount{{ $user->id }}" tabindex="-1"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Account {{ $user->email }}
                                </h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p class="card-text">Apakah Anda Yakin Ingin Hapus Akun Anda Sendiri?<span
                                        style="color: #FF0000; font-weight: bold">{{ $user->email }}</span>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <form action="/deleteAccount/{{ $user->id }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- End Modal Delete Accout   --}}
            </div>
        </div>
    </div>
</x-boot>
