@extends('backend.layouts.master', ['title' => 'Edit'])
@section('content')
    <section class="product-list">
        <div class="container">
            <h4>Edit Slider</h4>
            <hr>
            <div class="row justify-content-center">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <img class="card-img img-fluid" src="{{asset('data/slider/'.$data->image)}}" alt="" srcset="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ Route('slider.update',$data->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                    <div class="form-group mb-3">
                                        <label class="fw-bold">Nama Slider</label>
                                        <input type="text" name="judul" value="{{$data->judul}}" placeholder="Slider" class="form-control">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="fw-bold">Link</label>
                                        <input type="text" value="{{$data->link}}" name="link" placeholder="Link" class="form-control">
                                    </div>
                                    <div class="form-group mb-3">
                                        <label class="fw-bold">Gambar</label>
                                        <input type="file" name="image" class="form-control-file" id="image">
                                    </div>
                                    <button class="btn btn-dark">simpan</button>
            
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
