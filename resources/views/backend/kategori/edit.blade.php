@extends('backend.layouts.master', ['title' => 'Edit'])
@section('content')
    <section class="product-list">
        <div class="container">
            <h4>Edit Kategori</h4>
            <hr>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <img class="card-img img-fluid" src="{{asset('data/category/'.$data->image)}}" alt="" srcset="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ Route('category.update',$data->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group mb-3">
                                    <label class="fw-bold">Nama Kategori</label>
                                    <input type="text" value="{{$data->name}}" name="name" placeholder="Nama Kategori" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="fw-bold">Gambar</label>
                                    <input type="file" name="image" class="form-control-file" id="image">
                                    <p><small class="text-info">* Kosongkan Jika Tidak Ingin Di Update </small></p>
                                </div>
                                <a href="{{Route('category.index')}}" class="btn btn-outline-dark"><i class="fa fa-arrow-left"></i> kembali</a>
                                <button class="btn btn-dark"> simpan</button>
                            </form>
                        </div>
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
