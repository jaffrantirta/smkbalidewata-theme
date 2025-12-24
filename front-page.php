<?php get_template_part('templates/header'); ?>

<!-- Hero Section with Carousel -->
<section class="relative h-screen overflow-hidden">
    <?php
    $hero_slides = [
        [
            'image' => get_theme_mod('hero_slide_1') ?: home_url() . '/wp-content/uploads/2025/08/students-happy.webp',
            'title' => 'Membentuk Generasi Unggul',
            'subtitle' => 'Pendidikan Berkualitas untuk Masa Depan Cerah',
            'cta_text' => 'Daftar Sekarang',
            'cta_link' => '#ppdb'
        ],
        [
            'image' => get_theme_mod('hero_slide_2') ?: home_url() . '/wp-content/uploads/2025/08/school-building.webp',
            'title' => 'Fasilitas Modern & Lengkap',
            'subtitle' => 'Lingkungan Belajar yang Nyaman dan Kondusif',
            'cta_text' => 'Lihat Profil Sekolah',
            'cta_link' => '#about'
        ],
        [
            'image' => get_theme_mod('hero_slide_3') ?: home_url() . '/wp-content/uploads/2025/08/students-learning.webp',
            'title' => 'Prestasi Gemilang',
            'subtitle' => 'Raih Mimpimu Bersama Kami',
            'cta_text' => 'Hubungi Kami',
            'cta_link' => '#contact'
        ],
    ];
    ?>

    <div id="heroCarousel" class="relative w-full h-full">
        <?php foreach ($hero_slides as $index => $slide): ?>
            <div class="hero-slide absolute inset-0 transition-opacity duration-1000 <?= $index === 0 ? 'opacity-100 z-10' : 'opacity-0 z-0' ?>" data-slide="<?= $index ?>">
                <img src="<?= esc_url($slide['image']); ?>" 
                     alt="<?= esc_attr($slide['title']); ?>"
                     class="absolute inset-0 w-full h-full object-cover">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-900/80 via-blue-900/60 to-transparent"></div>
                
                <div class="relative z-10 flex items-center h-full">
                    <div class="container mx-auto px-4 md:px-8">
                        <div class="max-w-2xl text-white space-y-6">
                            <h1 class="text-4xl md:text-6xl lg:text-7xl font-bold leading-tight animate-fade-in-up">
                                <?= esc_html($slide['title']); ?>
                            </h1>
                            <p class="text-xl md:text-2xl font-light animate-fade-in-up animation-delay-200">
                                <?= esc_html($slide['subtitle']); ?>
                            </p>
                            <a href="<?= esc_url($slide['cta_link']); ?>" 
                               class="inline-block px-8 py-4 bg-yellow-500 hover:bg-yellow-600 text-white font-semibold rounded-lg shadow-lg transform hover:scale-105 transition-all duration-300 animate-fade-in-up animation-delay-400">
                                <?= esc_html($slide['cta_text']); ?>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>

        <!-- Navigation Arrows -->
        <button id="heroPrev" class="absolute left-4 top-1/2 -translate-y-1/2 z-20 w-12 h-12 bg-white/20 hover:bg-white/40 backdrop-blur-sm rounded-full flex items-center justify-center text-white text-2xl transition-all">
            ‹
        </button>
        <button id="heroNext" class="absolute right-4 top-1/2 -translate-y-1/2 z-20 w-12 h-12 bg-white/20 hover:bg-white/40 backdrop-blur-sm rounded-full flex items-center justify-center text-white text-2xl transition-all">
            ›
        </button>

        <!-- Dots Indicator -->
        <div class="absolute bottom-8 left-1/2 -translate-x-1/2 z-20 flex gap-3">
            <?php foreach ($hero_slides as $index => $_): ?>
                <button class="hero-dot w-3 h-3 rounded-full bg-white/40 hover:bg-white transition-all" data-dot="<?= $index ?>"></button>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Welcome from Principal Section -->
<section id="about" class="py-16 md:py-24 bg-gray-50">
    <div class="container mx-auto px-4 md:px-8">
        <div class="grid md:grid-cols-2 gap-12 items-center">
            <div class="relative">
                <img src="<?= get_theme_mod('principal_image') ?: home_url() . '/wp-content/uploads/2025/08/principal.webp'; ?>" 
                     alt="Kepala Sekolah" 
                     class="rounded-2xl shadow-2xl w-full">
                <div class="absolute -bottom-6 -right-6 bg-blue-600 text-white p-6 rounded-xl shadow-xl">
                    <p class="text-4xl font-bold">25+</p>
                    <p class="text-sm">Tahun Pengalaman</p>
                </div>
            </div>
            
            <div class="space-y-6">
                <div>
                    <span class="text-yellow-500 font-semibold text-sm uppercase tracking-wider">Sambutan</span>
                    <h2 class="text-3xl md:text-5xl font-bold text-gray-900 mt-2">
                        Kepala Sekolah
                    </h2>
                </div>
                
                <p class="text-gray-600 text-lg leading-relaxed">
                    "Selamat datang di website sekolah kami. Kami berkomitmen untuk memberikan pendidikan berkualitas yang tidak hanya fokus pada prestasi akademik, tetapi juga pengembangan karakter dan keterampilan abad 21."
                </p>
                
                <p class="text-gray-600 leading-relaxed">
                    "Dengan dukungan tenaga pendidik profesional dan fasilitas modern, kami yakin dapat membimbing putra-putri Anda meraih masa depan gemilang."
                </p>
                
                <div class="flex items-center gap-4">
                    <div>
                        <p class="font-bold text-gray-900 text-lg">Dr. Ahmad Sudrajat, M.Pd</p>
                        <p class="text-gray-500">Kepala Sekolah</p>
                    </div>
                </div>
                
                <a href="#" class="inline-flex items-center gap-2 text-blue-600 hover:text-blue-700 font-semibold">
                    Baca Selengkapnya 
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                    </svg>
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Keunggulan Section -->
<section id="keunggulan" class="relative overflow-hidden bg-slate-50 py-16 md:py-24">
    <div class="absolute inset-0">
        <div class="absolute -top-24 right-0 h-64 w-64 rounded-full bg-blue-200/40 blur-3xl"></div>
        <div class="absolute bottom-0 left-0 h-72 w-72 rounded-full bg-yellow-200/40 blur-3xl"></div>
    </div>

    <div class="container relative z-10 mx-auto px-4 md:px-8">
        <div class="grid gap-10 lg:grid-cols-[1.1fr_1.9fr] lg:items-center">
            <div class="space-y-5">
                <span class="inline-flex items-center gap-2 rounded-full border border-blue-100 bg-white px-4 py-2 text-xs font-semibold uppercase tracking-[0.2em] text-blue-700 shadow-sm">
                    Keunggulan
                </span>
                <h2 class="text-3xl font-bold leading-tight text-slate-900 md:text-5xl">
                    Lingkungan belajar modern, disiplin, dan berorientasi masa depan
                </h2>
                <p class="text-base leading-relaxed text-slate-600 md:text-lg">
                    SMK Bali Dewata menghadirkan kombinasi kurikulum berbasis industri, karakter disiplin, dan fasilitas yang mendukung pengembangan keterampilan abad 21.
                </p>
                <div class="flex flex-wrap gap-3">
                    <span class="rounded-full bg-white px-4 py-2 text-xs font-semibold text-slate-600 shadow-sm">Industri Partners</span>
                    <span class="rounded-full bg-white px-4 py-2 text-xs font-semibold text-slate-600 shadow-sm">Guru Profesional</span>
                    <span class="rounded-full bg-white px-4 py-2 text-xs font-semibold text-slate-600 shadow-sm">Fasilitas Modern</span>
                </div>
            </div>

            <div class="grid gap-6 md:grid-cols-2">
                <div class="group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition-all hover:-translate-y-1 hover:shadow-lg">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-blue-600 text-white">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v12m6-6H6"/>
                        </svg>
                    </div>
                    <h3 class="mt-4 text-lg font-semibold text-slate-900">Program Keahlian Unggulan</h3>
                    <p class="mt-2 text-sm leading-relaxed text-slate-600">Kurikulum selaras kebutuhan industri dengan pembelajaran berbasis proyek.</p>
                </div>

                <div class="group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition-all hover:-translate-y-1 hover:shadow-lg">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-yellow-500 text-white">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2v1h6v-1c0-1.105-1.343-2-3-2zm0 0V6m0 10v2m-5-6H6m12 0h-1"/>
                        </svg>
                    </div>
                    <h3 class="mt-4 text-lg font-semibold text-slate-900">Karakter & Disiplin</h3>
                    <p class="mt-2 text-sm leading-relaxed text-slate-600">Budaya sekolah yang membentuk karakter kuat, tepat waktu, dan bertanggung jawab.</p>
                </div>

                <div class="group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition-all hover:-translate-y-1 hover:shadow-lg">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-emerald-500 text-white">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7h18M3 12h18M3 17h18"/>
                        </svg>
                    </div>
                    <h3 class="mt-4 text-lg font-semibold text-slate-900">Fasilitas Praktik</h3>
                    <p class="mt-2 text-sm leading-relaxed text-slate-600">Laboratorium dan studio modern untuk memaksimalkan pembelajaran praktik.</p>
                </div>

                <div class="group rounded-2xl border border-slate-200 bg-white p-6 shadow-sm transition-all hover:-translate-y-1 hover:shadow-lg">
                    <div class="flex h-12 w-12 items-center justify-center rounded-xl bg-slate-900 text-white">
                        <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                    <h3 class="mt-4 text-lg font-semibold text-slate-900">Siap Kerja & Kuliah</h3>
                    <p class="mt-2 text-sm leading-relaxed text-slate-600">Pendampingan karier, magang, dan bimbingan melanjutkan studi.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- latest news -->
<section class="py-16 md:py-24 bg-gray-50">
    <div class="container mx-auto px-4 md:px-8">

        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-10">
            <div>
                <span class="text-blue-600 font-semibold text-sm uppercase tracking-wider">
                    Update
                </span>
                <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mt-1">
                    Berita Terbaru
                </h2>
            </div>

            <a href="<?= esc_url(get_permalink(get_option('page_for_posts'))); ?>"
               class="text-blue-600 hover:text-blue-700 font-semibold flex items-center gap-2">
                Lihat Semua
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 5l7 7-7 7"/>
                </svg>
            </a>
        </div>

        <div class="space-y-8">

            <!-- ================= FEATURED LATEST POST ================= -->
            <?php
            $latest = new WP_Query([
                'post_type' => 'post',
                'posts_per_page' => 1,
                'orderby' => 'date',
                'order' => 'DESC',
            ]);
            ?>

            <?php if ($latest->have_posts()):
                while ($latest->have_posts()):
                    $latest->the_post(); ?>
                <article class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-2xl transition-all group">
                    <div class="grid grid-cols-1 md:grid-cols-3">

                        <div class="relative aspect-[4/3] md:aspect-auto overflow-hidden">
                            <?php if (has_post_thumbnail()): ?>
                                <img src="<?php the_post_thumbnail_url('large'); ?>"
                                     alt="<?php the_title_attribute(); ?>"
                                     class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-300">
                            <?php endif; ?>

                            <?php $cat = get_the_category();
                            if (!empty($cat)): ?>
                                <span class="absolute top-4 left-4 bg-blue-600 text-white px-3 py-1 rounded-full text-xs font-semibold">
                                    <?= esc_html($cat[0]->name); ?>
                                </span>
                            <?php endif; ?>
                        </div>

                        <div class="md:col-span-2 p-6">
                            <div class="flex flex-wrap items-center gap-3 text-sm text-gray-500 mb-3">
                                <span><?= get_the_date('d M Y'); ?></span>
                                <span>•</span>
                                <span><?= esc_html(get_the_author()); ?></span>
                            </div>

                            <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-blue-600 transition-colors">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_title(); ?>
                                </a>
                            </h3>

                            <p class="text-gray-600 mb-4">
                                <?= wp_trim_words(get_the_excerpt(), 30); ?>
                            </p>

                            <a href="<?php the_permalink(); ?>"
                               class="text-blue-600 hover:text-blue-700 font-semibold inline-flex items-center gap-2">
                                Baca Selengkapnya
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                          d="M9 5l7 7-7 7"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                </article>
            <?php endwhile;
                wp_reset_postdata();
            endif; ?>

            <!-- ================= OTHER LATEST POSTS ================= -->
            <?php
            $latest_more = new WP_Query([
                'post_type' => 'post',
                'posts_per_page' => 4,
                'offset' => 1,
                'orderby' => 'date',
                'order' => 'DESC',
            ]);
            ?>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <?php if ($latest_more->have_posts()):
                    while ($latest_more->have_posts()):
                        $latest_more->the_post(); ?>
                    <article class="bg-white rounded-xl p-6 shadow-md hover:shadow-lg transition-all">
                        <div class="flex flex-wrap items-center gap-3 text-sm text-gray-500 mb-2">
                            <span><?= get_the_date('d M Y'); ?></span>
                            <?php $cat = get_the_category();
                            if (!empty($cat)): ?>
                                <span class="bg-gray-100 text-gray-800 px-2 py-1 rounded text-xs font-semibold">
                                    <?= esc_html($cat[0]->name); ?>
                                </span>
                            <?php endif; ?>
                        </div>

                        <h3 class="text-lg font-bold text-gray-900 mb-2 hover:text-blue-600 transition-colors">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h3>

                        <p class="text-gray-600 text-sm">
                            <?= wp_trim_words(get_the_excerpt(), 18); ?>
                        </p>
                    </article>
                <?php endwhile;
                    wp_reset_postdata();
                endif; ?>
            </div>

        </div>
    </div>
</section>



<!-- CTA Section
<section id="contact" class="relative py-20 bg-gradient-to-br from-blue-600 to-blue-800 text-white overflow-hidden">
    <div class="absolute inset-0 opacity-10">
        <div class="absolute top-1/4 left-1/4 w-96 h-96 bg-yellow-400 rounded-full blur-3xl animate-pulse"></div>
        <div class="absolute bottom-1/4 right-1/4 w-96 h-96 bg-blue-400 rounded-full blur-3xl animate-pulse animation-delay-1000"></div>
    </div>
    
    <div class="container mx-auto px-4 md:px-8 relative z-10">
        <div class="max-w-4xl mx-auto text-center">
            <h2 class="text-4xl md:text-5xl font-bold mb-6">
                Siap Bergabung Bersama Kami?
            </h2>
            <p class="text-xl text-blue-100 mb-8">
                Wujudkan masa depan cerah putra-putri Anda. Daftar sekarang dan dapatkan informasi lengkap tentang program kami.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="#ppdb" class="inline-block px-8 py-4 bg-yellow-500 hover:bg-yellow-600 text-blue-900 font-bold rounded-lg shadow-lg transform hover:scale-105 transition-all">
                    Daftar Sekarang
                </a>
                <a href="https://wa.me/628123456789" target="_blank" class="inline-block px-8 py-4 bg-white/10 hover:bg-white/20 backdrop-blur-sm text-white font-bold rounded-lg border-2 border-white/30 transform hover:scale-105 transition-all">
                    Hubungi Kami
                </a>
            </div>
            
            <div class="grid md:grid-cols-3 gap-8 mt-16">
                <div class="text-center">
                    <div class="text-4xl font-bold text-yellow-400 mb-2">500+</div>
                    <p class="text-blue-100">Siswa Aktif</p>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-yellow-400 mb-2">50+</div>
                    <p class="text-blue-100">Tenaga Pengajar</p>
                </div>
                <div class="text-center">
                    <div class="text-4xl font-bold text-yellow-400 mb-2">98%</div>
                    <p class="text-blue-100">Tingkat Kelulusan</p>
                </div>
            </div>
        </div>
    </div>
</section> -->

<!-- Custom CSS for Animations -->
<style>
@keyframes fadeInUp {
    from {
        opacity: 0;
        transform: translateY(30px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.animate-fade-in-up {
    animation: fadeInUp 0.8s ease-out forwards;
}

.animation-delay-200 {
    animation-delay: 0.2s;
    opacity: 0;
}

.animation-delay-400 {
    animation-delay: 0.4s;
    opacity: 0;
}

.animation-delay-1000 {
    animation-delay: 1s;
}
</style>

<!-- JavaScript for Hero Carousel -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const slides = document.querySelectorAll('.hero-slide');
    const dots = document.querySelectorAll('.hero-dot');
    const prevBtn = document.getElementById('heroPrev');
    const nextBtn = document.getElementById('heroNext');
    
    let current = 0;
    const total = slides.length;
    const intervalTime = 5000;
    let autoplay;

    function showSlide(index) {
        slides.forEach((slide, i) => {
            if (i === index) {
                slide.classList.remove('opacity-0', 'z-0');
                slide.classList.add('opacity-100', 'z-10');
            } else {
                slide.classList.remove('opacity-100', 'z-10');
                slide.classList.add('opacity-0', 'z-0');
            }
        });

        dots.forEach((dot, i) => {
            if (i === index) {
                dot.classList.remove('bg-white/40');
                dot.classList.add('bg-white', 'scale-125');
            } else {
                dot.classList.remove('bg-white', 'scale-125');
                dot.classList.add('bg-white/40');
            }
        });

        current = index;
    }

    function nextSlide() {
        showSlide((current + 1) % total);
    }

    function prevSlide() {
        showSlide((current - 1 + total) % total);
    }

    function startAutoplay() {
        autoplay = setInterval(nextSlide, intervalTime);
    }

    function resetAutoplay() {
        clearInterval(autoplay);
        startAutoplay();
    }

    // Event listeners
    dots.forEach((dot, index) => {
        dot.addEventListener('click', () => {
            showSlide(index);
            resetAutoplay();
        });
    });

    if (prevBtn && nextBtn) {
        prevBtn.addEventListener('click', () => {
            prevSlide();
            resetAutoplay();
        });

        nextBtn.addEventListener('click', () => {
            nextSlide();
            resetAutoplay();
        });
    }

    // Initialize
    showSlide(0);
    startAutoplay();

    // Countdown Timer
    function updateCountdown() {
        const targetDate = new Date('2026-02-01T00:00:00').getTime();
        const now = new Date().getTime();
        const distance = targetDate - now;

        const days = Math.floor(distance / (1000 * 60 * 60 * 24));
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);

        document.getElementById('days').textContent = days;
        document.getElementById('hours').textContent = hours;
        document.getElementById('minutes').textContent = minutes;
        document.getElementById('seconds').textContent = seconds;

        if (distance < 0) {
            clearInterval(countdownInterval);
            document.getElementById('days').textContent = '0';
            document.getElementById('hours').textContent = '0';
            document.getElementById('minutes').textContent = '0';
            document.getElementById('seconds').textContent = '0';
        }
    }

    const countdownInterval = setInterval(updateCountdown, 1000);
    updateCountdown();
});
</script>

<?php get_template_part('templates/footer'); ?>
