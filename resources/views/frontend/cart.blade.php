<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CART</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Carter+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('front/styles.css') }}">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
</head>

<body>
    <!-- Navbar -->

    <nav class="navbar navbar-expand-lg fixed-top navbar-light">
        <div class="container d-flex align-items-center">
            <a class="navbar-brand fw-bold d-flex align-items-center" href="#">
                <i class="fa-solid fa-paw" style="color: #FFD43B;"></i>
                <span class="ms-2">Kitten</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="/#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="/#collections">Collections</a></li>
                    <li class="nav-item"><a class="nav-link" href="/#shop">Shop</a></li>
                    <li class="nav-item"><a class="nav-link" href="/#blogs">Blogs</a></li>
                    <li class="nav-item"><a class="nav-link" href="/#contact-us">Contact</a></li>
                    <!-- Ikon Sign In -->
                    <li class="nav-item">
                        <a class="nav-link"  style="cursor: pointer;">
                            <i class="fas fa-user"></i>
                            @auth
                            {{ Auth::user()->name }}
                            @else
                            Login
                            @endauth
                        </a>
                    </li>
                    <!-- Ikon Tas Belanja -->
                    <li class="nav-item">
                        <a class="nav-link" href="/cart">
                            <i class="fas fa-shopping-cart"></i> Cart
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;margin-top:20px">
        <div class="text-center">
            <h3>CART</h3>
            <!-- Tambahkan div ini untuk memusatkan konten -->
            <hr>
            @foreach ($data as $item)

            <div class="row">
                <div class="col-3">
                    <img src="{{ asset(Storage::url($item->produk->image)) }}" class="img-fluid" alt="">
                </div>
                <div class="col-7 text-start">
                    <h3>{{ $item->produk->produk }}</h3>
                    <p>Rp. {{ $item->produk->harga }}</p>
                </div>
                <div class="col-2 text-start">
                    <form action="/cart/{{ $item->id }}" method="POST">
                    @csrf
                    @method('post')
                        <button class=" btn btn-danger"> Hapus </button>

                    </form>
                </div>
            </div>
            <hr>
            @endforeach

            <div class="">
                <div class="d-flex justify-content-between">
                    <h2>Total Hagra</h2>
                    <h2>Rp. {{ $total }}</h2>
                </div>
                <form action="/dashboard/transaksi" method="post" >
                    @method('post')
                    @csrf
                    <input type="hidden" name="total" value="{{ $total }}" id="">
                    <button class="btn btn-primary text-center fw-bold col-12">Bayar</button>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('sweetalert/sweetalert2.all.min.js') }}"></script>
    <!-- sweetalert End -->
    <!-- konfirmasi success-->
    @if (session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: "{{ session('success') }}"
        });

    </script>
    @endif
</body>

</html>
