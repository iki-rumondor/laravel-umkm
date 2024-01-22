@extends('backend.layouts.master', ['title' => 'Kategori'])
@section('content')
    <section class="product-list">
        <div class="container">
            <h4>Daftar Kategori</h4>
            <hr>
            <div class="row justify-content-center">
                <div class="card">
                    <div class="card-body">
                        <button type="button" class="btn btn-dark fw-bold mb-4" data-bs-toggle="modal"
                            data-bs-target="#exampleModal">
                            Tambah Kategori
                        </button>
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Kategori</th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $x)
                                        <tr>
                                            <th scope="row">{{$loop->index+=1}}</th>
                                            <td>{{$x->name}}</td>
                                            <td><img src="{{asset('data/category/'.$x->image)}}" width="90"></td>
                                            <td>
                                                <form action="{{Route('category.destroy', $x->id)}}" method="post">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{Route('category.edit', $x->uuid)}}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                                    <button class="btn btn-danger"><i class="fa fa-trash" onclick="return confirm('apakah akan mengahpus kategori ini?')"></i></button>
                                                </form>
                                                
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Tambah Kategori</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ Route('category.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            <div class="form-group mb-3">
                                <label class="fw-bold">Nama Kategori</label>
                                <input type="text" name="name" placeholder="Nama Kategori" class="form-control">
                            </div>
                            <div class="form-group mb-3">
                                <label class="fw-bold">Gambar</label>
                                <input type="file" name="image" class="form-control-file" id="image">
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
                selector: "#deskripsi",
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
