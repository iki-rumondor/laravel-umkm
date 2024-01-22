@extends('backend.layouts.master', ['title' => 'Setting Website'])
@section('content')
    <section class="product-list mb-4">
        <div class="container">
            <h4>Setting Website</h4>
            <hr>
            <div class="row justify-content-start">
                <div class="col-lg-8">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ Route('setting.update', $data->id) }}" method="post"
                                >
                                @csrf
                                @method("PUT")
                                <div class="form-group mb-3">
                                    <label class="mb-2"><strong>Nama Aplikasi</strong></label>
                                    <input type="text" value="{{$data->title}}" placeholder="Nama Aplikasi" name="title" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="mb-2"><strong>Deskripsi</strong></label>
                                    <textarea name="deskripsi" placeholder="Deskripsi Aplikasi"  class="form-control">{{$data->deskripsi}}</textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="mb-2"><strong>Tentang</strong></label>
                                    <textarea name="tentang" id="tentang" cols="30" rows="10" class="form-control">{{$data->tentang}}</textarea>
                                </div>
                                <button class="btn btn-dark">update</button>
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
                selector: "#tentang",
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
