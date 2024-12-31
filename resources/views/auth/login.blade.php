<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
                    <li class="nav-item"><a class="nav-link active" href="index.html#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.html#collections">Collections</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.html#shop">Shop</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.html#blogs">Blogs</a></li>
                    <li class="nav-item"><a class="nav-link" href="index.html#contact-us">Contact</a></li>
                    <!-- Ikon Sign In -->
                    <li class="nav-item">
                        <a class="nav-link" onclick="window.location.href='signin.html'" style="cursor: pointer;">
                            <i class="fas fa-user"></i> Sign In
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

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="text-center">
            <!-- Tambahkan div ini untuk memusatkan konten -->
            <form id="loginForm" action="/login" method="post"  class="contact-form" style="width: 400px;">
                @csrf
                <div class="mb-3">
                    <label for="loginIdentifier" class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" id="loginIdentifier" required>
                </div>
                <div class="mb-3">
                    <label for="loginPassword" class="form-label">Password</label>
                    <input type="password" name="password" class="form-control" id="loginPassword" required>
                </div>
                <button type="submit" class="btn btn-primary">Login</button>
            </form>
            <p class="mt-3">Belum punya akun? <a href="/register">register</a></p> <!-- Pastikan ini di bawah form -->
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
