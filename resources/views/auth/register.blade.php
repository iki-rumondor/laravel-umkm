@extends('frontend.layouts.master', ['title' => 'Login'])
@section('content')
    <section class="product container" style="margin-bottom:70px;margin-top:160px;">
        <div class="row justify-content-center mb-4">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ Route('register.store') }}" method="post">
                            <h5 class="fw-bold mb-4">Data User</h5>
                            @csrf
                            @method('POST')
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-user"></i></span>
                                <div class="form-floating">
                                    <input name="name" type="text" class="form-control" id="floatingInputGroup1"
                                        placeholder="Nama Lengkap">
                                    <label for="floatingInputGroup1">name</label>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-envelope"></i></span>
                                <div class="form-floating">
                                    <input name="email" type="text" class="form-control" id="floatingInputGroup1"
                                        placeholder="Username">
                                    <label for="floatingInputGroup1">Email</label>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-phone"></i></span>
                                <div class="form-floating">
                                    <input name="phone" type="text" class="form-control" id="floatingInputGroup1"
                                        placeholder="Phone">
                                    <label for="floatingInputGroup1">Telephone</label>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                <div class="form-floating">
                                    <input name="password" type="password" class="form-control" id="floatingInputGroup1"
                                        placeholder="Username">
                                    <label for="floatingInputGroup1">Password</label>
                                </div>
                            </div>
                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-lock"></i></span>
                                <div class="form-floating">
                                    <input name="confirm" type="password" class="form-control" id="floatingInputGroup1"
                                        placeholder="Username">
                                    <label for="floatingInputGroup1">Konfirmasi Password</label>
                                </div>
                            </div>
                            <hr>
                            <h5 class="fw-bold mb-4">Data UMKM</h5>

                            <div class="form-floating mb-3">
                                <select name="jenis" required class="form-select" id="jenis">
                                    @foreach ($tipe as $t)
                                        <option value="{{ $t->id }}">{{ $t->name }}</option>
                                    @endforeach
                                </select>
                                <label for="jenis">Pilih Jenis UMKM</label>
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-home"></i></span>
                                <div class="form-floating">
                                    <input required name="nama_toko" type="text" class="form-control" id="nama_toko"
                                        placeholder="Nama Lengkap">
                                    <label for="nama_toko">Nama Toko</label>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-location"></i></span>
                                <div class="form-floating">
                                    <input required name="alamat" type="text" class="form-control" id="alamat"
                                        placeholder="Nama Lengkap">
                                    <label for="alamat">Alamat</label>
                                </div>
                            </div>

                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="fa fa-list"></i></span>
                                <div class="form-floating">
                                    <input required name="tahun_berdiri" type="number" min="1900" max="2100" class="form-control" id="tahun_berdiri"
                                        placeholder="Nama Lengkap">
                                    <label for="tahun_berdiri">Tahun Berdiri</label>
                                </div>
                            </div>

                            <button class="btn bg-primary mt-1 text-light fw-bold w-100">Registrasi</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="{{ asset('theme/vendor/toastify/src/toastify.js') }}"></script>
    @if (count($errors) > 0)
        <script>
            var errors = @json($errors->all());
            Toastify({
                text: errors,
                duration: 3000,
                close: true,
                backgroundColor: "#D61355",
            }).showToast();
        </script>
    @enderror
    @if (session()->has('error'))
        <script>
            Toastify({
                text: "{{ session('error') }}",
                duration: 3000,
                close: true,
                backgroundColor: "#D61355",
            }).showToast();
        </script>
    @endif
    @if (session()->has('success'))
        <script>
            Toastify({
                text: "{{ session('success') }}",
                duration: 3000,
                close: true,
                backgroundColor: "#19C37D",
            }).showToast();
        </script>
    @endif
@endsection
