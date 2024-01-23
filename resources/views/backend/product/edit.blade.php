@extends('backend.layouts.master', ['title' => 'Edit'])
@section('content')
    <section class="product-list">
        <div class="container">
            <h4>Edit Product</h4>
            <hr>
            <div class="row justify-content-center">
                <div class="col-lg-5 mb-2">
                    <div class="card">
                        <div class="card-body">
                            <img class="card-img img-fluid" src="{{asset('data/product/'.$data->image)}}" alt="" srcset="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 mb-2">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ Route('product.update',$data->id) }}" method="post" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="form-group mb-3">
                                    <label class="fw-bold">Nama Product</label>
                                    <input type="text" value="{{$data->name}}" name="name" placeholder="Nama Product" class="form-control">
                                </div>
                                <div class="form-group mb-3">
                                    <label class="fw-bold">Kategori Produk</label>
                                    <select name="category_id" id="category_id" class="form-control">
                                        <option value="">Pilih Kategori</option>
                                        @foreach ($kategori as $kt)
                                            <option value="{{ $kt->id }}" {{ $kt->id == $data->category_id ? 'selected' : ''}}>{{ $kt->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="row">
                                    <div class="form-group mb-3 col-lg-6">
                                        <label class="fw-bold">Price Product</label>
                                        <input type="text" value="{{$data->price}}" name="price" placeholder="Price Product" class="form-control">
                                    </div>
                                    <div class="form-group mb-3 col-lg-6">
                                        <label class="fw-bold">Diskon</label>
                                        <input type="text" value="{{$data->diskon}}" name="diskon" placeholder="Diskon" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <label class="fw-bold">Deskripsi</label>
                                    <textarea name="description" id="description" cols="30" rows="10" class="form-control"
                                        placeholder="Deskripsi Produk">{{$data->description}}</textarea>
                                </div>
                                {{-- <div class="form-group mb-3">
                                    <label class="fw-bold">Telephone</label>
                                    <input type="text" placeholder="Telephone" value="{{$data->phone}}" name="phone" class="form-control">
                                </div> --}}

                                <div class="row">
                                    <div class="form-group mb-3 col-lg-6">
                                        <label class="fw-bold">Status Produk</label>
                                        <select name="status" id="status" class="form-control">
                                            <option value="">Pilih Status</option>
                                            <option value="ready" {{ $data->status == 'ready' ? 'selected' : ''}}>Ada</option>
                                            <option value="not_ready" {{ $data->status == 'not_ready' ? 'selected' : ''}}>Tidak Ada</option>
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
