@extends('backend.layouts.master', ['title' => 'Product'])
@section('content')
    <section class="product-list">
        <div class="container">
            <h4>Daftar Product UMKM</h4>
            <hr>
            <div class="row justify-content-center">
                <div class="card">
                    <div class="card-body">
                        @if (Auth::user()->role != 'admin')
                            <button type="button" class="btn btn-dark fw-bold mb-4" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">
                                Tambah Product
                            </button>
                        @endif
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama Product</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Diskon</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($product as $pr)
                                        <tr>
                                            <th scope="row">{{ $loop->index += 1 }}</th>
                                            <td>{{ $pr->name }}</td>
                                            <td>Rp {{ number_format($pr->price, 0, ',', '.') }}</td>
                                            <td>{{ $pr->diskon }}%</td>
                                            <td>
                                                <form action="{{ Route('product.destroy', $pr->id) }}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ Route('product.edit', $pr->uuid) }}"
                                                        class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                                    <button
                                                        onclick="return confirm('apakah anda yakin ingin mengahpus product ini?')"
                                                        class="btn btn-danger"><i class="fa fa-trash"
                                                            onclick="return confirm('apakah akan mengahpus produk ini?')"></i></button>
                                                </form>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal modal-lg fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Product</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ Route('product.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="form-group mb-3">
                                <label class="fw-bold">Nama Product</label>
                                <input type="text" name="name" placeholder="Nama Product" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label class="fw-bold">Kategori Produk</label>
                                <select name="category_id" id="category_id" class="form-control">
                                    <option value="">Pilih Kategori</option>
                                    @foreach ($kategori as $kt)
                                        <option value="{{ $kt->id }}">{{ $kt->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="row">
                                <div class="form-group mb-3 col-lg-6">
                                    <label class="fw-bold">Price Product</label>
                                    <input type="text" name="price" placeholder="Price Product" class="form-control">
                                </div>
                                <div class="form-group mb-3 col-lg-6">
                                    <label class="fw-bold">Diskon</label>
                                    <input type="text" name="diskon" placeholder="Diskon" class="form-control">
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label class="fw-bold">Deskripsi</label>
                                <textarea name="description" id="description" cols="30" rows="10" class="form-control"
                                    placeholder="Deskripsi Produk"></textarea>
                            </div>

                            <div class="row">
                                <div class="form-group mb-3 col-lg-6">
                                    <label class="fw-bold">Status Produk</label>
                                    <select name="status" id="status" class="form-control">
                                        <option value="">Pilih Status</option>
                                        <option value="ready">Ada</option>
                                        <option value="not_ready">Tidak Ada</option>
                                    </select>
                                </div>
                                <div class="form-group mb-3 col-lg-6">
                                    <label class="fw-bold">Gambar Produk</label>
                                    <input type="file" name="image" id="image" class="form-control-file">
                                </div>
                            </div>
                            <button class="btn btn-dark">simpan</button>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="{{ asset('theme/vendor/toastify/src/toastify.js') }}"></script>
    <script>
        document.addEventListener("DOMContentLoaded", () => {
            const themeOptions = document.body.classList.contains("theme-dark") ? {
                skin: "oxide-dark",
                content_css: "dark",
            } : {
                skin: "oxide",
                content_css: "default",
            }

            tinymce.init({
                selector: "#description",
                ...themeOptions
            })
            tinymce.init({
                selector: "#dark",
                toolbar: "undo redo styleselect bold italic alignleft aligncenter alignright bullist numlist outdent indent code",
                plugins: "code",
                ...themeOptions,
            })
        })
    </script>
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
@endsection
