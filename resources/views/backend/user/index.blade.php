@extends('backend.layouts.master', ['title' => 'Product'])
@section('content')
    <section class="product-list">
        <div class="container">
            <h4>Daftar Pengguna</h4>
            <hr>
            <div class="row justify-content-center">
                <div class="card">
                    <div class="card-body">

                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $pr)
                                        <tr>
                                            <th scope="row">{{ $loop->index += 1 }}</th>
                                            <td>{{ $pr->name }}</td>
                                            <td>{{ $pr->email }}</td>
                                            <td>{{ $pr->phone }}</td>
                                            <td>
                                                @if ($pr->status == 'active')
                                                    <span class="badge text-bg-success">{{ $pr->status }}</span>
                                                @else
                                                    <span class="badge text-bg-danger">{{ $pr->status }}</span>
                                                @endif
                                                {{-- <form method="GET">
                                                    @if ($pr->status == 'active')
                                                        <button class="btn btn-success" name="status" value="{{$pr->id}}">Aktif</button>

                                                    @else
                                                        <button class="btn btn-danger" name="status" value="{{$pr->id}}">Nonaktif</button>
                                                    @endif

                                                </form> --}}
                                            </td>
                                            <td class="d-flex ">
                                                @if ($pr->status == 'active')
                                                    <button data-id="{{ $pr->id }}" data-bs-toggle="modal"
                                                        data-bs-target="#inActivate-modal"
                                                        class="btn-inactivate btn btn-danger me-2"><i
                                                            class="fa fa-x"></i></button>
                                                    {{-- <a href="{{ Route('user.edit', $pr->id) }}"
                                                        class="btn btn-warning me-2"><i class="fa fa-edit"></i></a> --}}
                                                @else
                                                    <button data-id="{{ $pr->id }}" data-bs-toggle="modal"
                                                        data-bs-target="#activate-modal"
                                                        class="btn-activate btn btn-success me-2"><i
                                                            class="fa fa-check"></i></button>
                                                    <form action="{{ Route('user.destroy', $pr->id) }}" method="post">
                                                        @csrf
                                                        @method('DELETE')

                                                        <button
                                                            onclick="return confirm('apakah anda yakin ingin mengahpus user ini?')"
                                                            class="btn btn-danger"><i class="fa fa-trash"
                                                                onclick="return confirm('apakah akan mengahpus produk ini?')"></i></button>
                                                    </form>
                                                @endif
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
    </section>
    <div class="modal fade" id="activate-modal" tabindex="-1" aria-labelledby="activate-modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="activate-modalLabel">Aktivasi UMKM</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="/users/status/update">
                    @csrf
                    <input type="hidden" name="id" class="user-id">
                    <input type="hidden" name="status" value="active">
                    <div class="modal-body">
                        <p>Berikut adalah data UMKM yang mendaftar</p>
                        <hr>
                        <div class="my-2">
                            <h6>Nama Owner: </h6>
                            <p id="nama"></p>
                        </div>
                        <div class="my-2">
                            <h6>Nama Toko: </h6>
                            <p id="toko"></p>
                        </div>
                        <div class="my-2">
                            <h6>Jenis UMKM: </h6>
                            <p id="jenis"></p>
                        </div>
                        <div class="my-2">
                            <h6>Alamat: </h6>
                            <p id="alamat"></p>
                        </div>
                        <div class="my-2">
                            <h6>Tahun Berdiri: </h6>
                            <p id="tahun"></p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Aktivasi</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="modal fade" id="inActivate-modal" tabindex="-1" aria-labelledby="inActivate-modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="inActivate-modalLabel">Non Aktifkan UMKM</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="POST" action="/users/status/update">
                    @csrf
                    <input type="hidden" name="id" class="user-id">
                    <input type="hidden" name="status" value="inactive">
                    <div class="modal-body">
                        <p>Apakah Anda ingin menonaktifkan umkm ini?</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Setuju</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{ asset('theme/vendor/toastify/src/toastify.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
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

            $(".btn-inactivate").click(function() {
                const userID = $(this).data("id")
                $(".user-id").val(userID)
            })
            $(".btn-activate").click(function() {
                const userID = $(this).data("id")
                $(".user-id").val(userID)

                fetch('/fetch/shops/' + userID)
                    .then(response => response.json())
                    .then(data => {
                        $("#nama").html(data.user.name)
                        $("#toko").html(data.nama_toko)
                        $("#jenis").html(data.jenis.name)
                        $("#alamat").html(data.alamat)
                        $("#tahun").html(data.tahun_berdiri)
                    })
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
