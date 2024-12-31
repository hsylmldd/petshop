<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kitten - Pet Food</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Carter+One&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Nunito+Sans:wght@400;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('front/styles.css')}}">
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top navbar-light">
        <div class="container">
            <a class="navbar-brand fw-bold d-flex align-items-center" href="#">
                <i class="fa-solid fa-paw" style="color: #FFD43B;"></i>
                <span class="ms-2">Kitten</span>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <!-- ... existing code ... -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link active" href="#home">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="#collections">Collections</a></li>
                    <li class="nav-item"><a class="nav-link" href="#shop">Shop</a></li>
                    <li class="nav-item"><a class="nav-link" href="#blogs">Blogs</a></li>
                    <li class="nav-item"><a class="nav-link" href="#contact-us">Contact</a></li>
                    <!-- Ikon Sign In -->
                    <li class="nav-item">
                        <a class="nav-link" href="/login" style="cursor: pointer;">
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
            <!-- ... existing code ... -->
    </nav>


    <!-- Hero Section -->
    <section id="home" class="hero-section text-white">
        <div class="container d-flex align-items-center">
            <div class="hero-content w-50">
                <h1>HIGH QUALITY <br>PET SHOP</h1>
                <p class="lead">Sale up to 40% off today</p>
                <a href="#shop" class="btn btn-dark btn-lg">Shop Now</a>
            </div>
            <!-- <div class="hero-image w-50">
                <img src="assets/cat.png" alt="Dog Image" class="img-fluid">
            </div> -->
        </div>
    </section>

    <!-- Pet Info Section -->
    <section id="collections" class="pet-info-section py-5">
        <div class="container text-center">
            <h2 class="mb-4">Adopt a Pet</h2>
            <p class="mb-4">Find a new furry Friend</p>
            <p class="mb-4">Every cat has a unique story to tell, and we’re here to help you write the next chapter
                together. Visit us today to explore our wonderful selection of lovable cats, and let’s create a bond
                that will last a lifetime!</p>
            <div id="petCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="row">
                            <!-- Pet 1 -->
                            @foreach ($colecction->take(4) as $item )

                            <div class="col-lg-3 mb-4">
                                <div class="card text-center">
                                    <div class="card-img-top">
                                        <img src="{{ Storage::url($item->image) }}" alt="Fluffy" class="img-fluid">
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $item->name }}</h5>
                                        <p><strong>Gender:</strong> {{ $item->gender }}</p>
                                        <p><strong>Neutered:</strong> {{ $item->neutered }}</p>
                                        <p><strong>Age:</strong> {{ $item->age }} years</p>
                                        <a href="#" class="btn btn-more-info" data-bs-toggle="modal"
                                            data-bs-target="#moreInfoModal" data-pet-id="{{ $item->name }}">MORE INFO</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    <div class="carousel-item ">
                        <div class="row">
                            <!-- Pet 1 -->
                            @foreach ($colecction->skip(4)->take(4) as $item )

                            <div class="col-lg-3 mb-4">
                                <div class="card text-center">
                                    <div class="card-img-top">
                                        <img src="{{ Storage::url($item->image) }}" alt="Fluffy" class="img-fluid">
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $item->name }}</h5>
                                        <p><strong>Gender:</strong> {{ $item->gender }}</p>
                                        <p><strong>Neutered:</strong> {{ $item->neutered }}</p>
                                        <p><strong>Age:</strong> {{ $item->age }} years</p>
                                        <a href="#" class="btn btn-more-info" data-bs-toggle="modal"
                                            data-bs-target="#moreInfoModal" data-pet-id="{{ $item->name }}">MORE INFO</a>
                                    </div>
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#petCarousel" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#petCarousel" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </section>



    <!-- Product Display Section (Updated) -->
    <section id="shop" class="product-selections py-5">
        <div class="container">
            <h2 class="text-center mb-4">Shop Our Products</h2>
            <div class="row">
                <!-- Produk 1 -->
                @forelse ( $produk as $item)
                <div class="col-md-4 mb-4">
                    <div class="product-card">
                        <div class="product-image">
                            <img src="{{ Storage::url($item->image) }}" alt="Royal Canin" class="img-fluid">
                            <div class="product-overlay">
                                <img src="{{ Storage::url($item->image2) }}" alt="Product 1 Alternate"
                                    class="img-fluid">
                            </div>
                        </div>
                        <div class="product-info text-center">
                            <h4>{{ $item->produk }}</h4>
                            <p class="price">Rp {{ number_format($item->harga,0,'.') }}</p>
                            <!-- Cart Icon -->
                            <form action="/cart/{{ $item->id }}" method="POST">
                                @csrf
                                @method('put')
                                <button class="btn btn-primary add-to-cart">
                                    <i class="fas fa-shopping-cart"></i> Add to Cart
                                </button>
                            </form>
                        </div>
                    </div>
                </div>

                @empty
                <h3>TIDAK ADA DATA</h3>
                @endforelse

            </div>
        </div>
    </section>


    <!-- Modal -->
    <div class="modal fade" id="moreInfoModal" tabindex="-1" aria-labelledby="moreInfoModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="moreInfoModalLabel">Pet Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body" id="petMoreInfoText">
                    <!-- Content will be injected here by JavaScript -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Blog Section -->
    <section id="blogs" class="latest-blogs py-5">
        <div class="container">
            <h2 class="text-center mb-4">Latest Blog Posts</h2>
            <div id="blogCarousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <!-- First Slide -->
                    <div class="carousel-item active">
                        <div class="row">
                            @foreach ($blog->take(3) as $item)
                            <div class="col-md-4 mb-4">
                                <div class="blog-card" data-bs-toggle="modal" data-bs-target="#blogModal"
                                    data-title="{{ $item->judul }}" data-image="{{ Storage::url($item->image) }}"
                                    data-text="{{ $item->description }}">
                                    <img src="{{ Storage::url($item->image) }}"
                                        alt="{{ $item->judul }}" class="img-fluid">
                                    <div class="blog-info">
                                        <h4>{{ $item->judul }}</h4>
                                        {!! $item->description !!}
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Modal -->
    <div class="modal fade" id="blogModal" tabindex="-1" role="dialog" aria-labelledby="blogModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered blog-modal-dialog-centered" role="document">
            <div class="modal-content blog-modal-content">
                <div class="modal-header blog-modal-header">
                    <h5 class="modal-title blog-modal-title" id="blogModalLabel">Blog Title</h5>
                    <button type="button" class="btn-close blog-btn-close" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body blog-modal-body">
                    <img src="" alt="Blog Image" class="img-fluid blog-modal-image">
                    <p>Blog content goes here...</p>
                </div>
                <div class="modal-footer blog-modal-footer">
                    <button type="button" class="btn btn-secondary blog-btn-close"
                        data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal HTML -->
    <div class="modal fade" id="blogModal" tabindex="-1" aria-labelledby="blogModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="blogModalLabel">Blog Post Title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <img src="" alt="Blog Post Image" class="img-fluid modal-image">
                    <p class="modal-text">Detailed content of the blog post...</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>




    <section id="contact-us">
        <div class="contact-us">
            <div class="contact-form">
                <h2>Contact Us</h2>
                <div class="form-group-row">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" class="form-control" placeholder="Your Name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" class="form-control" placeholder="Your Email">
                    </div>
                </div>
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" id="subject" class="form-control" placeholder="Subject">
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" class="form-control" placeholder="Your Message"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <div class="contact-map">
                <div id="map"></div>
            </div>
        </div>

        <div class="counter-section">
            <div class="counter-item">
                <i class="fas fa-users"></i>
                <h3><span class="counter" data-target="1500">0</span></h3>
                <p>HAPPY CLIENTS</p>
            </div>
            <div class="counter-item">
                <i class="fas fa-user-tie"></i>
                <h3><span class="counter" data-target="14">0</span></h3>
                <p>PROFESSIONALS</p>
            </div>
            <div class="counter-item">
                <i class="fas fa-home"></i>
                <h3><span class="counter" data-target="900">0</span></h3>
                <p>ADOPTED PETS</p>
            </div>
            <div class="counter-item">
                <i class="fas fa-award"></i>
                <h3><span class="counter" data-target="12">0</span></h3>
                <p>PRIZES</p>
            </div>
        </div>

        <div class="contact-info-grid">
            <div class="contact-info-item">
                <i class="fas fa-envelope"></i>
                <h3>Send us a Message</h3>
                <p>email@yoursite.com</p>
            </div>
            <div class="contact-info-item">
                <i class="fas fa-map-marker-alt"></i>
                <h3>Visit our Location</h3>
                <p>Pet Street 123 - New York</p>
            </div>
            <div class="contact-info-item">
                <i class="fas fa-phone"></i>
                <h3>Call us today</h3>
                <p>(123) 456-789</p>
            </div>
            <div class="contact-info-item">
                <i class="fas fa-heart"></i>
                <h3>Follow us on Social Media</h3>
                <div class="social-icons">
                    <a href="#"><i class="fab fa-facebook-f"></i></a>
                    <a href="#"><i class="fab fa-twitter"></i></a>
                    <a href="#"><i class="fab fa-instagram"></i></a>
                </div>
            </div>
        </div>
    </section>


    <footer class="footer">
        <div class="footer-content">
            <div class="footer-logo">
                <i class="fas fa-paw"></i> KITTEN!
                <p>Cras enim wisi elit aenean, amet eros curabitur. Wisi ad eget ipsum metus sociis Cras enim wisi elit
                    aenean.</p>
            </div>
            <div class="footer-contact">
                <h3><i class="fas fa-phone"></i> Contact Us</h3>
                <p>(123) 456-789</p>
                <p>email@yoursite.com</p>
                <p>Pet Street 123 - New York</p>
            </div>
            <div class="footer-hours">
                <h3><i class="far fa-clock"></i> Working Hours</h3>
                <p>Open 9am - 10pm</p>
                <p>Holidays - Closed</p>
                <p>Weekends - Closed</p>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Kitten! Developed by webRedox | All rights reserved.</p>
        </div>
    </footer>


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

    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="{{ asset('front/scripts.js') }}"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const moreInfoButtons = document.querySelectorAll('.btn-more-info');

            moreInfoButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const petId = this.getAttribute('data-pet-id');
                    let petDetails = '';

                    switch (petId) {
                        @foreach ($colecction as $item )
                        case '{{ $item->name }}':
                            petDetails = `
                        <p><strong>Name : </strong> {{ $item->name }}</p>
                        <p><strong>Description: </strong>{!! $item->description !!}</p>
                    `;
                            break;
                        @endforeach
                        default:
                            petDetails = '<p>No details available.</p>';
                    }

                    document.getElementById('petMoreInfoText').innerHTML = petDetails;
                });
            });

            // New code to handle product image switching
            window.showProductImage = function (productId) {
                const productCards = document.querySelectorAll('.product-card');

                productCards.forEach(card => {
                    const overlay = card.querySelector('.product-overlay');
                    const img = card.querySelector('img');

                    if (card.getAttribute('onclick') === `showProductImage('${productId}')`) {
                        // Show the overlay image and hide the main image
                        overlay.style.display = 'flex';
                        img.style.display = 'none';
                    } else {
                        // Hide the overlay image and show the main image
                        overlay.style.display = 'none';
                        img.style.display = 'block';
                    }
                });
            };
        });

    </script>

</body>

</html>
