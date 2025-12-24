<?php
/**
 * Template Name: Blog Page
 * Template Post Type: page
 *
 * Template for displaying blog posts listing
 *
 * @package Bali_Luxury_Transport
 */

get_template_part('templates/header');
?>

<!-- Blog Archive Section -->
<section class="relative overflow-hidden bg-slate-50 py-12 md:py-20">
    <div class="absolute inset-0">
        <div class="absolute -top-24 right-0 h-64 w-64 rounded-full bg-blue-200/40 blur-3xl"></div>
        <div class="absolute bottom-0 left-0 h-72 w-72 rounded-full bg-yellow-200/40 blur-3xl"></div>
    </div>
    <div class="container relative z-10 mx-auto px-4 md:px-8">
        <div class="mb-12 text-center md:mb-16">
            <span class="inline-flex items-center gap-2 rounded-full border border-blue-100 bg-white px-4 py-2 text-xs font-semibold uppercase tracking-[0.2em] text-blue-700 shadow-sm">
                Blog
            </span>
            <h1 class="mt-4 text-3xl font-bold text-slate-900 md:text-5xl">
                Cerita & Kabar SMK Bali Dewata
            </h1>
            <p class="mx-auto mt-4 max-w-3xl text-base leading-relaxed text-slate-600 md:text-lg">
                Artikel, kegiatan, dan informasi terbaru seputar pembelajaran, prestasi, dan kehidupan sekolah.
            </p>
        </div>

        <?php
        // Query for blog posts
        $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
        $blog_query = new WP_Query(array(
            'post_type' => 'post',
            'posts_per_page' => 9,
            'paged' => $paged
        ));

        if ($blog_query->have_posts()) :
        ?>
            <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
                <?php
                while ($blog_query->have_posts()) :
                    $blog_query->the_post();
                ?>
                    <article class="group overflow-hidden rounded-2xl border border-slate-200 bg-white transition-all duration-300 hover:-translate-y-2 hover:border-blue-200 hover:shadow-lg">
                        <?php if (has_post_thumbnail()) : ?>
                            <div class="relative h-48 overflow-hidden">
                                <a href="<?php the_permalink(); ?>">
                                    <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium_large'); ?>"
                                        alt="<?php echo esc_attr(get_the_title()); ?>"
                                        title="<?php echo esc_attr(get_the_title()); ?>"
                                        class="object-cover w-full h-full transition-transform duration-500 group-hover:scale-110">
                                </a>
                                <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 via-transparent to-transparent"></div>

                                <?php
                                $categories = get_the_category();
                                if ($categories) :
                                ?>
                                    <div class="absolute top-3 left-3">
                                        <span class="rounded-full bg-blue-600 px-3 py-1 text-xs font-semibold text-white">
                                            <?php echo esc_html($categories[0]->name); ?>
                                        </span>
                                    </div>
                                <?php endif; ?>
                            </div>
                        <?php endif; ?>

                        <div class="p-6">
                            <div class="mb-3 flex items-center text-xs text-slate-500">
                                <span class="mr-4 flex items-center">
                                    <i class="mr-1 ti ti-calendar"></i>
                                    <?php echo get_the_date('M j, Y'); ?>
                                </span>
                                <span class="flex items-center">
                                    <i class="mr-1 ti ti-user"></i>
                                    <?php echo get_the_author(); ?>
                                </span>
                            </div>

                            <h3 class="mb-3 text-lg font-bold text-slate-900 transition-colors duration-300 group-hover:text-blue-700 line-clamp-2">
                                <a href="<?php the_permalink(); ?>" class="text-slate-900 hover:text-blue-700">
                                    <?php the_title(); ?>
                                </a>
                            </h3>

                            <p class="mb-4 text-sm leading-relaxed text-slate-600 line-clamp-3">
                                <?php echo wp_trim_words(get_the_excerpt(), 20, '...'); ?>
                            </p>

                            <a href="<?php the_permalink(); ?>"
                                class="inline-flex items-center text-sm font-semibold text-blue-600 transition-colors duration-300 hover:text-blue-700">
                                Baca Selengkapnya <i class="ml-2 ti ti-arrow-right"></i>
                            </a>
                        </div>
                    </article>
                <?php
                endwhile;
                ?>
            </div>

            <!-- Pagination -->
            <div class="flex justify-center mt-12">
                <nav class="flex items-center space-x-2">
                    <?php
                    $pagination = paginate_links(array(
                        'total' => $blog_query->max_num_pages,
                        'current' => $paged,
                        'type' => 'array',
                        'prev_text' => 'Prev',
                        'next_text' => 'Next',
                    ));

                    if ($pagination) :
                        foreach ($pagination as $page) :
                            $page = str_replace(
                                'page-numbers',
                                'page-numbers px-4 py-2 text-sm font-medium transition-all duration-300 rounded-lg border border-slate-200 bg-white text-slate-600 hover:border-blue-200 hover:text-blue-700',
                                $page
                            );
                            $page = str_replace(
                                'current',
                                'current !bg-blue-600 !text-white !border-blue-600 hover:bg-blue-600 hover:text-white',
                                $page
                            );
                            echo $page;
                        endforeach;
                    endif;

                    wp_reset_postdata();
                    ?>
                </nav>
            </div>

        <?php else : ?>
            <div class="rounded-2xl border border-slate-200 bg-white p-12 text-center shadow-sm">
                <i class="mb-4 text-6xl ti ti-article-off text-slate-400"></i>
                <h2 class="mb-2 text-2xl font-bold text-slate-900">Belum Ada Artikel</h2>
                <p class="text-slate-600">Konten akan diperbarui secara berkala. Silakan kembali lagi.</p>
            </div>
        <?php endif; ?>
    </div>
</section>

<!-- CTA Section -->
<section class="relative overflow-hidden bg-white py-16 md:py-24">
    <?php
    $cta_bg_img = get_theme_mod('cta_background_image');
    if (empty($cta_bg_img)) {
        $cta_bg_img = home_url() . '/wp-content/uploads/2025/08/padar-sunset.webp';
    }
    ?>
    <div class="absolute inset-0 opacity-15">
        <img src="<?php echo esc_url($cta_bg_img); ?>"
            alt="SMK Bali Dewata"
            title="SMK Bali Dewata"
            class="object-cover w-full h-full">
    </div>
    <div class="absolute inset-0 bg-gradient-to-r from-white/90 via-white/70 to-white/90"></div>

    <div class="container relative z-10 px-4 mx-auto text-center">
        <h2 class="mb-6 text-3xl font-bold text-slate-900 md:text-5xl">
            Siap Bergabung dengan
            <span class="block text-blue-700">SMK Bali Dewata</span>
        </h2>
        <p class="mx-auto mb-8 max-w-2xl text-base leading-relaxed text-slate-600 md:text-lg">
            Dapatkan informasi pendaftaran, jadwal kegiatan, dan program unggulan yang membentuk generasi disiplin dan berprestasi.
        </p>
        <a href="#contact"
            class="inline-flex items-center justify-center rounded-full bg-blue-600 px-8 py-4 text-base font-semibold text-white transition-all duration-300 hover:-translate-y-0.5 hover:bg-blue-700">
            Hubungi Kami <i class="ml-2 ti ti-arrow-right"></i>
        </a>
    </div>
</section>

<?php get_template_part('templates/footer'); ?>
