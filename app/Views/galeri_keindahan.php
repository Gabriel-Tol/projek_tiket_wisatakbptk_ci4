<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Galeri Keindahan Kalimantan Barat - Jelajahi keindahan alam dan budaya KalBar">
    <title>Galeri Keindahan KalBar - Wisata KalBar</title>
    
    <link rel="shortcut icon" href="<?= base_url('favicon.ico') ?>" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url('Assets/css/landing.css') ?>">
    
    <style>
        .gallery-3d-wrapper {
            width: 100%;
            height: 500vh;
            background: linear-gradient(135deg, #0a1628 0%, #1a2a4a 50%, #0d1f3c 100%);
            position: relative;
        }
        .gallery-3d-sticky {
            position: sticky;
            top: 0;
            width: 100%;
            height: 100vh;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            perspective: 2000px;
        }
        .gallery-3d-header {
            text-align: center;
            margin-bottom: 2rem;
            z-index: 10;
            position: absolute;
            top: 80px;
        }
        .gallery-3d-header h1 {
            font-size: 2.5rem;
            font-weight: 800;
            color: #fff;
            text-shadow: 0 2px 20px rgba(0,0,0,0.5);
            letter-spacing: 1px;
        }
        .gallery-3d-header p {
            color: rgba(255,255,255,0.7);
            font-size: 1.1rem;
            margin-top: 0.5rem;
        }
        .gallery-3d-container {
            width: 100%;
            height: 100%;
            position: relative;
            transform-style: preserve-3d;
            transition: transform 0.05s linear;
        }
        .gallery-3d-item {
            position: absolute;
            width: 280px;
            height: 380px;
            left: 50%;
            top: 50%;
            margin-left: -140px;
            margin-top: -190px;
            backface-visibility: hidden;
            transition: opacity 0.3s linear;
        }
        .gallery-3d-card {
            width: 100%;
            height: 100%;
            border-radius: 16px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0,0,0,0.4);
            position: relative;
            background: rgba(255,255,255,0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.1);
        }
        .gallery-3d-card img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            transition: transform 0.5s ease;
        }
        .gallery-3d-card:hover img {
            transform: scale(1.1);
        }
        .gallery-3d-overlay {
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            padding: 20px;
            background: linear-gradient(to top, rgba(0,0,0,0.85) 0%, transparent 100%);
            color: #fff;
        }
        .gallery-3d-overlay h3 {
            font-size: 1.1rem;
            font-weight: 700;
            margin-bottom: 4px;
        }
        .gallery-3d-overlay .location {
            font-size: 0.8rem;
            color: rgba(255,255,255,0.7);
            display: flex;
            align-items: center;
            gap: 4px;
        }
        .gallery-3d-overlay .credit {
            font-size: 0.7rem;
            color: rgba(255,255,255,0.5);
            margin-top: 6px;
        }
        .gallery-3d-nav {
            position: absolute;
            bottom: 40px;
            display: flex;
            gap: 8px;
            z-index: 10;
        }
        .gallery-3d-dot {
            width: 10px;
            height: 10px;
            border-radius: 50%;
            background: rgba(255,255,255,0.3);
            cursor: pointer;
            transition: all 0.3s;
        }
        .gallery-3d-dot.active {
            background: #0d6efd;
            transform: scale(1.3);
        }
        .gallery-3d-scroll-hint {
            position: absolute;
            bottom: 80px;
            color: rgba(255,255,255,0.5);
            font-size: 0.85rem;
            animation: bounce 2s infinite;
            z-index: 10;
        }
        @keyframes bounce {
            0%, 20%, 50%, 80%, 100% { transform: translateY(0); }
            40% { transform: translateY(-10px); }
            60% { transform: translateY(-5px); }
        }
        .gallery-nav-back {
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 100;
            color: #fff;
            text-decoration: none;
            font-size: 1rem;
            display: flex;
            align-items: center;
            gap: 6px;
            padding: 8px 16px;
            border-radius: 30px;
            background: rgba(255,255,255,0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255,255,255,0.2);
            transition: all 0.3s;
        }
        .gallery-nav-back:hover {
            background: rgba(255,255,255,0.2);
            color: #fff;
        }
        @media (max-width: 768px) {
            .gallery-3d-item {
                width: 220px;
                height: 300px;
                margin-left: -110px;
                margin-top: -150px;
            }
            .gallery-3d-header h1 {
                font-size: 1.6rem;
            }
        }
    </style>
</head>
<body>
    <a href="<?= base_url('/') ?>" class="gallery-nav-back">
        <i class="bi bi-arrow-left"></i> Kembali
    </a>

    <div class="gallery-3d-wrapper">
        <div class="gallery-3d-sticky">
            <div class="gallery-3d-header">
                <h1>Galeri Keindahan KalBar</h1>
                <p>Scroll untuk menjelajahi keindahan Kalimantan Barat</p>
            </div>
            <div class="gallery-3d-container" id="gallery3d">
                <?php
                $galleryItems = [
                    [
                        'name' => 'Pantai Pasir Panjang',
                        'location' => 'Singkawang, Kalbar',
                        'photo' => 'Assets/Pasir_Panjang_Beach,_Singkawang_City.jpg',
                        'credit' => 'Wisata KalBar',
                        'pos' => 'center'
                    ],
                    [
                        'name' => 'Danau Sentarum',
                        'location' => 'Kapuas Hulu, Kalbar',
                        'photo' => 'Assets/danau sentarum.jpg',
                        'credit' => 'Wisata KalBar',
                        'pos' => 'center'
                    ],
                    [
                        'name' => 'Bukit Kelam',
                        'location' => 'Sintang, Kalbar',
                        'photo' => 'Assets/bukit kelam.jpg',
                        'credit' => 'Wisata KalBar',
                        'pos' => 'center'
                    ],
                    [
                        'name' => 'Keraton Kadariah',
                        'location' => 'Pontianak, Kalbar',
                        'photo' => 'Assets/Keraton Kadariah.jpg',
                        'credit' => 'Wisata KalBar',
                        'pos' => 'center'
                    ],
                    [
                        'name' => 'Tugu Khatulistiwa',
                        'location' => 'Pontianak, Kalbar',
                        'photo' => 'Assets/tugu katulistiwa.jpg',
                        'credit' => 'Wisata KalBar',
                        'pos' => 'center'
                    ],
                    [
                        'name' => 'Pulau Lemukutan',
                        'location' => 'Singkawang, Kalbar',
                        'photo' => 'Assets/pulau lemukutan.png',
                        'credit' => 'Wisata KalBar',
                        'pos' => 'center'
                    ],
                    [
                        'name' => 'Alun-Alun Kapuas',
                        'location' => 'Pontianak, Kalbar',
                        'photo' => 'Assets/fajruddin-mudzakkir-TG50QzQzZm0-unsplash.jpg',
                        'credit' => 'Fajruddin Mudzakkir',
                        'pos' => 'center'
                    ],
                ];
                ?>
            </div>
            <div class="gallery-3d-nav" id="galleryNav"></div>
            <div class="gallery-3d-scroll-hint">
                <i class="bi bi-mouse"></i> Scroll untuk memutar
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
    (function() {
        const items = <?= json_encode($galleryItems) ?>;
        const container = document.getElementById('gallery3d');
        const navContainer = document.getElementById('galleryNav');
        let rotation = 0;
        let isScrolling = false;
        let scrollTimeout = null;
        let animationFrame = null;
        const autoRotateSpeed = 0.03;
        const anglePerItem = 360 / items.length;
        const radius = window.innerWidth <= 768 ? 320 : 500;

        items.forEach((item, i) => {
            const div = document.createElement('div');
            div.className = 'gallery-3d-item';
            div.setAttribute('role', 'group');
            div.setAttribute('aria-label', item.name);
            div.innerHTML = `
                <div class="gallery-3d-card">
                    <img src="<?= base_url('') ?>${item.photo}" alt="${item.name}" style="object-position: ${item.pos}">
                    <div class="gallery-3d-overlay">
                        <h3>${item.name}</h3>
                        <div class="location"><i class="bi bi-geo-alt"></i> ${item.location}</div>
                        <div class="credit">Photo by: ${item.credit}</div>
                    </div>
                </div>
            `;
            div.dataset.angle = i * anglePerItem;
            container.appendChild(div);

            const dot = document.createElement('div');
            dot.className = 'gallery-3d-dot';
            dot.dataset.index = i;
            navContainer.appendChild(dot);
        });

        const domItems = container.querySelectorAll('.gallery-3d-item');
        const dots = navContainer.querySelectorAll('.gallery-3d-dot');

        function updateGallery() {
            const totalRotation = rotation % 360;
            container.style.transform = `rotateY(${rotation}deg)`;
            
            let closestIndex = 0;
            let closestAngle = Infinity;

            domItems.forEach((el, i) => {
                const itemAngle = i * anglePerItem;
                const relativeAngle = (itemAngle + totalRotation + 360) % 360;
                const normalizedAngle = Math.abs(relativeAngle > 180 ? 360 - relativeAngle : relativeAngle);
                const opacity = Math.max(0.3, 1 - (normalizedAngle / 180));
                el.style.opacity = opacity;
                el.style.transform = `rotateY(${itemAngle}deg) translateZ(${radius}px)`;

                if (normalizedAngle < closestAngle) {
                    closestAngle = normalizedAngle;
                    closestIndex = i;
                }
            });

            dots.forEach((d, i) => {
                d.classList.toggle('active', i === closestIndex);
            });
        }

        function handleScroll() {
            isScrolling = true;
            if (scrollTimeout) clearTimeout(scrollTimeout);

            const scrollableHeight = document.documentElement.scrollHeight - window.innerHeight;
            const scrollProgress = scrollableHeight > 0 ? window.scrollY / scrollableHeight : 0;
            rotation = scrollProgress * 360;
            updateGallery();

            scrollTimeout = setTimeout(() => {
                isScrolling = false;
            }, 150);
        }

        function autoRotate() {
            if (!isScrolling) {
                rotation += autoRotateSpeed;
                updateGallery();
            }
            animationFrame = requestAnimationFrame(autoRotate);
        }

        window.addEventListener('scroll', handleScroll, { passive: true });
        animationFrame = requestAnimationFrame(autoRotate);

        dots.forEach(dot => {
            dot.addEventListener('click', () => {
                const idx = parseInt(dot.dataset.index);
                rotation = -(idx * anglePerItem);
                while (rotation > 0) rotation -= 360;
                updateGallery();
            });
        });

        updateGallery();
    })();
    </script>
</body>
</html>