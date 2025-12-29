<?php
get_header();
?>

<main>
    <?php
    $hero_defaults = [
        [
            'image' => 'https://images.unsplash.com/photo-1503676260728-1c00da094a0b?auto=format&fit=crop&w=1600&q=80',
            'kicker' => 'SMK Kesehatan Bali Dewata',
            'title' => 'Mencetak Tenaga Kesehatan Profesional',
            'text' => 'Kurikulum berbasis industri, guru berpengalaman, dan fasilitas praktik modern.',
        ],
        [
            'image' => 'https://images.unsplash.com/photo-1526256262350-7da7584cf5eb?auto=format&fit=crop&w=1600&q=80',
            'kicker' => 'Fasilitas Lengkap',
            'title' => 'Laboratorium Farmasi & Keperawatan',
            'text' => 'Simulasi klinis dan peralatan terbaru untuk pengalaman belajar nyata.',
        ],
        [
            'image' => 'https://images.unsplash.com/photo-1504439468489-c8920d796a29?auto=format&fit=crop&w=1600&q=80',
            'kicker' => 'Berbasis Karier',
            'title' => 'Siap Kerja, Siap Kuliah',
            'text' => 'Kemitraan dengan fasilitas kesehatan dan alumni yang sukses di berbagai institusi.',
        ],
    ];

    $hero_slides = [];
    for ($i = 1; $i <= 3; $i++) {
        $hero_slides[] = [
            'image' => get_theme_mod("smk_hero_image_{$i}", $hero_defaults[$i - 1]['image']),
            'kicker' => get_theme_mod("smk_hero_kicker_{$i}", $hero_defaults[$i - 1]['kicker']),
            'title' => get_theme_mod("smk_hero_title_{$i}", $hero_defaults[$i - 1]['title']),
            'text' => get_theme_mod("smk_hero_text_{$i}", $hero_defaults[$i - 1]['text']),
        ];
    }
    ?>

    <section id="hero" class="hero-section">
        <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel" data-bs-interval="6500">
            <div class="carousel-indicators">
                <?php foreach ($hero_slides as $index => $slide): ?>
                    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="<?php echo esc_attr($index); ?>" class="<?php echo $index === 0 ? 'active' : ''; ?>" aria-current="<?php echo $index === 0 ? 'true' : 'false'; ?>" aria-label="<?php echo esc_attr(sprintf(__('Slide %d', 'smkkesehatan'), $index + 1)); ?>"></button>
                <?php endforeach; ?>
            </div>
            <div class="carousel-inner">
                <?php foreach ($hero_slides as $index => $slide): ?>
                    <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                        <img src="<?php echo esc_url($slide['image']); ?>" class="d-block w-100 hero-image" alt="<?php echo esc_attr($slide['title']); ?>">
                        <div class="carousel-caption">
                            <div class="hero-card">
                                <?php if (!empty($slide['kicker'])): ?>
                                    <p class="hero-kicker"><?php echo esc_html($slide['kicker']); ?></p>
                                <?php endif; ?>
                                <?php if (!empty($slide['title'])): ?>
                                    <?php if ($index === 0): ?>
                                        <h1 class="hero-title"><?php echo esc_html($slide['title']); ?></h1>
                                    <?php else: ?>
                                        <h2 class="hero-title"><?php echo esc_html($slide['title']); ?></h2>
                                    <?php endif; ?>
                                <?php endif; ?>
                                <?php if (!empty($slide['text'])): ?>
                                    <p class="hero-text"><?php echo esc_html($slide['text']); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden"><?php esc_html_e('Previous', 'smkkesehatan'); ?></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden"><?php esc_html_e('Next', 'smkkesehatan'); ?></span>
            </button>
        </div>
    </section>

    <section id="kompetensi" class="section-pad">
        <div class="container">
            <div class="section-header">
                <p class="section-kicker">Program Unggulan</p>
                <h2>Kompetensi Keahlian</h2>
                <p><?php echo esc_html(get_theme_mod('smk_kompetensi_intro', 'Jalur pembelajaran spesifik dengan sertifikasi dan praktik industri untuk karier masa depan.')); ?></p>
            </div>
            <?php
            $default_kickers = [
                1 => 'Farmasi',
                2 => 'Perawat',
                3 => 'Farmasi Klinis',
                4 => 'Keperawatan',
                5 => 'Laboratorium',
                6 => 'Rekam Medis',
                7 => 'Gizi',
            ];
            $default_titles = [
                1 => 'Asisten Tenaga Kefarmasian',
                2 => 'Asisten Keperawatan',
                3 => 'Teknisi Farmasi Klinis',
                4 => 'Keperawatan Komunitas',
                5 => 'Analis Laboratorium',
                6 => 'Manajemen Rekam Medis',
                7 => 'Nutrisi & Dietetik',
            ];
            $default_texts = [
                1 => 'Fokus pada peracikan obat, pelayanan farmasi, dan manajemen logistik obat.',
                2 => 'Pembelajaran keterampilan klinis dasar, komunikasi pasien, dan etika profesi.',
                3 => 'Pendalaman farmasi klinis, dispensing, dan edukasi obat.',
                4 => 'Penerapan keperawatan komunitas dengan pendekatan preventif.',
                5 => 'Praktik analisa sampel klinis dan prosedur laboratorium modern.',
                6 => 'Pengelolaan data pasien dan administrasi rekam medis.',
                7 => 'Ilmu gizi seimbang dan praktik dietetik untuk layanan kesehatan.',
            ];
            $default_lists = [
                1 => "Praktik laboratorium formulasi obat.\nSimulasi layanan apotek modern.\nMagang di klinik dan rumah sakit.",
                2 => "Simulasi tindakan keperawatan harian.\nPendampingan guru klinis berpengalaman.\nKegiatan praktik di fasilitas kesehatan.",
                3 => "Analisis resep dan interaksi obat.\nSimulasi layanan farmasi klinis.\nPendampingan preseptor industri.",
                4 => "Pembelajaran berbasis kasus komunitas.\nPraktik edukasi kesehatan.\nKegiatan bakti sosial.",
                5 => "Uji hematologi dan kimia klinik.\nKultur dan identifikasi mikroba.\nPenggunaan alat laboratorium digital.",
                6 => "Pengarsipan rekam medis digital.\nStandar privasi dan keamanan data.\nSimulasi administrasi layanan.",
                7 => "Perencanaan menu sehat.\nAnalisis kebutuhan gizi.\nPraktik konseling diet.",
            ];
            $kompetensi_items = [];
            for ($i = 1; $i <= 7; $i++) {
                $list_items = preg_split('/\r\n|\r|\n/', (string) get_theme_mod("smk_kompetensi_list_{$i}", $default_lists[$i]));
                $kompetensi_items[] = [
                    'kicker' => get_theme_mod("smk_kompetensi_kicker_{$i}", $default_kickers[$i]),
                    'title' => get_theme_mod("smk_kompetensi_title_{$i}", $default_titles[$i]),
                    'text' => get_theme_mod("smk_kompetensi_text_{$i}", $default_texts[$i]),
                    'bullets' => array_filter(array_map('trim', $list_items)),
                ];
            }
            ?>
            <div class="kompetensi-list-stack">
                <?php foreach ($kompetensi_items as $index => $item): ?>
                    <div class="stack-item">
                        <div class="stack-number"><?php echo esc_html($index + 1); ?></div>
                        <div class="stack-content">
                            <?php if (!empty($item['kicker'])): ?>
                                <p class="card-kicker"><?php echo esc_html($item['kicker']); ?></p>
                            <?php endif; ?>
                            <?php if (!empty($item['title'])): ?>
                                <h3 class="card-title"><?php echo esc_html($item['title']); ?></h3>
                            <?php endif; ?>
                            <?php if (!empty($item['text'])): ?>
                                <p class="card-text"><?php echo esc_html($item['text']); ?></p>
                            <?php endif; ?>
                            <?php if (!empty($item['bullets'])): ?>
                                <ul class="kompetensi-list">
                                    <?php foreach ($item['bullets'] as $bullet): ?>
                                        <li><?php echo esc_html($bullet); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>

    <?php
    $keunggulan_bg = get_theme_mod('smk_keunggulan_bg_image', '');
    $keunggulan_style = $keunggulan_bg ? "style=\"--section-bg-image: url('" . esc_url($keunggulan_bg) . "');\"" : '';
    ?>
    <section id="keunggulan" class="section-pad section-accent" <?php echo $keunggulan_style; ?>>
        <div class="container">
            <div class="section-header">
                <p class="section-kicker">Mengapa Kami</p>
                <h2>Keunggulan SMK Kesehatan Bali Dewata</h2>
                <p><?php echo esc_html(get_theme_mod('smk_keunggulan_intro', 'Lingkungan belajar yang formal, profesional, dan adaptif dengan kebutuhan dunia kesehatan.')); ?></p>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="feature-card h-100">
                        <span class="feature-number">01</span>
                        <h3><?php echo esc_html(get_theme_mod('smk_keunggulan_title_1', 'Kurikulum Industri')); ?></h3>
                        <p><?php echo esc_html(get_theme_mod('smk_keunggulan_text_1', 'Materi dirancang bersama mitra kesehatan untuk membekali kompetensi nyata.')); ?></p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="feature-card h-100">
                        <span class="feature-number">02</span>
                        <h3><?php echo esc_html(get_theme_mod('smk_keunggulan_title_2', 'Fasilitas Modern')); ?></h3>
                        <p><?php echo esc_html(get_theme_mod('smk_keunggulan_text_2', 'Laboratorium praktik dan ruang simulasi yang mendukung pembelajaran aktif.')); ?></p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="feature-card h-100">
                        <span class="feature-number">03</span>
                        <h3><?php echo esc_html(get_theme_mod('smk_keunggulan_title_3', 'Pengajar Profesional')); ?></h3>
                        <p><?php echo esc_html(get_theme_mod('smk_keunggulan_text_3', 'Tenaga pendidik berpengalaman di bidang kesehatan dan pendidikan vokasi.')); ?></p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="feature-card h-100">
                        <span class="feature-number">04</span>
                        <h3><?php echo esc_html(get_theme_mod('smk_keunggulan_title_4', 'Jalur Karier')); ?></h3>
                        <p><?php echo esc_html(get_theme_mod('smk_keunggulan_text_4', 'Program pendampingan alumni dan kerja sama industri untuk penempatan kerja.')); ?></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="blog" class="section-pad">
        <div class="container">
            <div class="section-header">
                <p class="section-kicker">Informasi Sekolah</p>
                <h2>Info Terbaru</h2>
                <p>Ikuti berita, kegiatan, dan prestasi terbaru dari SMK Kesehatan Bali Dewata.</p>
            </div>
            <?php
            $latest_posts = new WP_Query([
                'posts_per_page' => 6,
                'post_status' => 'publish',
                'category_name' => 'berita',
            ]);
            $post_ids = [];
            if ($latest_posts->have_posts()) {
                while ($latest_posts->have_posts()) {
                    $latest_posts->the_post();
                    $post_ids[] = get_the_ID();
                }
                wp_reset_postdata();
            }
            ?>
            <?php if (!empty($post_ids)): ?>
                <?php $post_chunks = array_chunk($post_ids, 3); ?>
                <div id="infoCarousel" class="carousel slide info-carousel" data-bs-ride="carousel">
                    <div class="carousel-indicators">
                        <?php foreach ($post_chunks as $index => $chunk): ?>
                            <button type="button" data-bs-target="#infoCarousel" data-bs-slide-to="<?php echo esc_attr($index); ?>" class="<?php echo $index === 0 ? 'active' : ''; ?>" aria-current="<?php echo $index === 0 ? 'true' : 'false'; ?>" aria-label="<?php echo esc_attr(sprintf(__('Slide %d', 'smkkesehatan'), $index + 1)); ?>"></button>
                        <?php endforeach; ?>
                    </div>
                    <div class="carousel-inner">
                        <?php foreach ($post_chunks as $index => $chunk): ?>
                            <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                                <div class="row g-4">
                                    <?php foreach ($chunk as $post_id): ?>
                                        <div class="col-md-4">
                                            <article class="card blog-card h-100">
                                                <div class="card-body">
                                                    <p class="card-kicker"><?php echo esc_html(get_the_date('', $post_id)); ?></p>
                                                    <h3 class="card-title">
                                                        <a href="<?php echo esc_url(get_permalink($post_id)); ?>"><?php echo esc_html(get_the_title($post_id)); ?></a>
                                                    </h3>
                                                    <p class="card-text"><?php echo esc_html(wp_trim_words(get_the_excerpt($post_id), 18)); ?></p>
                                                </div>
                                                <div class="card-footer">
                                                    <a class="btn btn-link" href="<?php echo esc_url(get_permalink($post_id)); ?>">Baca selengkapnya</a>
                                                </div>
                                            </article>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#infoCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden"><?php esc_html_e('Previous', 'smkkesehatan'); ?></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#infoCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden"><?php esc_html_e('Next', 'smkkesehatan'); ?></span>
                    </button>
                </div>
            <?php else: ?>
                <div class="empty-state">
                    <h3>Belum ada artikel</h3>
                    <p>Berita sekolah akan segera diperbarui.</p>
                </div>
            <?php endif; ?>
        </div>
    </section>

</main>

<?php
get_footer();
