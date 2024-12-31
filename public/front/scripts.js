// script.js
window.addEventListener('scroll', function() {
    const navbar = document.querySelector('.navbar');
    if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
});

// Existing scroll event listener
window.addEventListener('scroll', function() {
    const navbarLinks = document.querySelectorAll('.navbar-light .nav-link');
    const sections = document.querySelectorAll('section');
    let current = '';

    sections.forEach(section => {
        const sectionTop = section.offsetTop;
        const sectionHeight = section.offsetHeight;
        if (window.scrollY >= (sectionTop - sectionHeight / 3)) {
            current = section.getAttribute('id');
        }
    });

    navbarLinks.forEach(link => {
        link.classList.remove('active');
        if (link.getAttribute('href').includes(current)) {
            link.classList.add('active');
        }
    });

    const navbar = document.querySelector('.navbar');
    if (window.scrollY > 50) {
        navbar.classList.add('scrolled');
    } else {
        navbar.classList.remove('scrolled');
    }
});

// New code to handle modal content




document.addEventListener('DOMContentLoaded', function() {
    var blogCards = document.querySelectorAll('.blog-card');
    blogCards.forEach(function(card) {
        card.addEventListener('click', function() {
            var modal = document.getElementById('blogModal');
            var modalTitle = modal.querySelector('.blog-modal-title');
            var modalImage = modal.querySelector('.blog-modal-image');
            var modalBody = modal.querySelector('.blog-modal-body p');

            modalTitle.textContent = card.getAttribute('data-title');
            modalImage.src = card.getAttribute('data-image');
            modalBody.textContent = card.getAttribute('data-text');
        });
    });
});

document.addEventListener('DOMContentLoaded', function() {
    var map = L.map('map').setView([-6.3705, 106.8286], 13); // Koordinat Universitas Indonesia

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    }).addTo(map);

    L.marker([-6.3705, 106.8286]).addTo(map)
        .bindPopup('Universitas Indonesia, Depok')
        .openPopup();
});

document.addEventListener('DOMContentLoaded', () => {
    const counters = document.querySelectorAll('.counter');
    const speed = 200; // Kecepatan animasi (ms)

    counters.forEach(counter => {
        const updateCount = () => {
            const target = +counter.getAttribute('data-target');
            const count = +counter.innerText;
            const inc = target / speed;

            if (count < target) {
                counter.innerText = Math.ceil(count + inc);
                setTimeout(updateCount, 1);
            } else {
                counter.innerText = target;
            }
        };

        updateCount();
    });
});
