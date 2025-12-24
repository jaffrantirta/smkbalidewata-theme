<?php get_template_part('templates/header'); ?>

<?php
$post_id = get_the_ID();
$reading_time = function_exists('calculate_reading_time') ? calculate_reading_time($post_id) : 5;
?>

<!-- Single Post Hero -->
<section class="relative overflow-hidden bg-slate-50 py-12 md:py-20">
    <div class="absolute inset-0">
        <div class="absolute -top-24 right-0 h-64 w-64 rounded-full bg-blue-200/40 blur-3xl"></div>
        <div class="absolute bottom-0 left-0 h-72 w-72 rounded-full bg-yellow-200/40 blur-3xl"></div>
    </div>
    <div class="container relative z-10 mx-auto px-4 md:px-8">
        <div class="mx-auto max-w-4xl">
            <!-- Breadcrumb -->
            <nav class="mb-6 flex flex-wrap items-center text-sm text-slate-500">
                <a href="<?php echo esc_url(home_url()); ?>" class="transition-colors duration-300 hover:text-blue-700">Beranda</a>
                <span class="mx-2 text-slate-300">/</span>
                <a href="<?php echo esc_url(home_url('/blog')); ?>" class="transition-colors duration-300 hover:text-blue-700">Berita</a>
                <?php
                $categories = get_the_category();
                if ($categories) :
                ?>
                    <span class="mx-2 text-slate-300">/</span>
                    <a href="<?php echo esc_url(get_category_link($categories[0]->term_id)); ?>" class="font-semibold text-blue-700 hover:text-blue-800">
                        <?php echo esc_html($categories[0]->name); ?>
                    </a>
                <?php endif; ?>
            </nav>

            <!-- Title -->
            <h1 class="mb-6 text-3xl font-bold leading-tight text-slate-900 md:text-5xl">
                <?php the_title(); ?>
            </h1>

            <!-- Meta Info -->
            <div class="mb-8 flex flex-wrap items-center gap-4 text-sm text-slate-500">
                <div class="flex items-center">
                    <img class="mr-2 h-8 w-8 rounded-full border border-slate-200"
                        src="<?php echo esc_url(get_avatar_url(get_the_author_meta('ID'))); ?>"
                        alt="<?php echo esc_attr(get_the_author_meta('display_name')); ?>">
                    <span class="text-slate-700"><?php echo esc_html(get_the_author_meta('display_name')); ?></span>
                </div>
                <div class="flex items-center">
                    <i class="mr-2 ti ti-calendar text-blue-600"></i>
                    <span><?php echo get_the_date('F j, Y'); ?></span>
                </div>
                <div class="flex items-center">
                    <i class="mr-2 ti ti-clock text-blue-600"></i>
                    <span><?php echo $reading_time; ?> menit membaca</span>
                </div>
            </div>

            <!-- Featured Image -->
            <?php if (has_post_thumbnail()) : ?>
                <div class="mb-8 overflow-hidden rounded-2xl border border-slate-200 bg-white shadow-sm">
                    <img class="h-auto w-full object-cover"
                        src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>"
                        alt="<?php echo esc_attr(get_the_title()); ?>"
                        title="<?php echo esc_attr(get_the_title()); ?>">
                </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- Post Content -->
<section class="bg-white py-8 md:py-12">
    <div class="container mx-auto px-4 md:px-8">
        <div class="mx-auto max-w-4xl">
            <article class="rounded-2xl border border-slate-200 bg-white p-6 shadow-sm md:p-10">
                <div class="prose prose-lg max-w-none text-slate-700 prose-headings:text-slate-900 prose-headings:font-bold
                    prose-h2:text-2xl prose-h2:md:text-3xl prose-h2:mt-8 prose-h2:mb-4
                    prose-h3:text-xl prose-h3:md:text-2xl prose-h3:mt-6 prose-h3:mb-3
                    prose-p:leading-relaxed prose-p:mb-4
                    prose-a:text-blue-600 prose-a:no-underline hover:prose-a:underline
                    prose-strong:text-slate-900
                    prose-ul:text-slate-700 prose-ol:text-slate-700
                    prose-li:mb-2
                    prose-blockquote:border-l-blue-600 prose-blockquote:text-slate-600 prose-blockquote:italic
                    prose-img:rounded-xl
                    prose-figcaption:text-slate-500 prose-figcaption:text-center">
                    <?php the_content(); ?>
                </div>

                <!-- Tags -->
                <?php
                $tags = get_the_tags();
                if ($tags) :
                ?>
                    <div class="mt-8 flex flex-wrap items-center gap-2 border-t border-slate-200 pt-6">
                        <span class="mr-2 text-sm font-semibold text-slate-700">Tags:</span>
                        <?php foreach ($tags as $tag) : ?>
                            <a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>"
                                class="rounded-full border border-slate-200 px-3 py-1 text-xs font-medium text-slate-600 transition-all duration-300 hover:border-blue-200 hover:text-blue-700">
                                <?php echo esc_html($tag->name); ?>
                            </a>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>

                <!-- Share Buttons -->
                <div class="mt-6 flex flex-wrap items-center gap-4 border-t border-slate-200 pt-6">
                    <span class="text-sm font-semibold text-slate-700">Bagikan:</span>
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo urlencode(get_permalink()); ?>"
                        target="_blank" rel="noopener noreferrer"
                        class="flex h-10 w-10 items-center justify-center rounded-full border border-slate-200 text-slate-500 transition-all duration-300 hover:border-blue-200 hover:text-blue-700">
                        <i class="ti ti-brand-facebook"></i>
                    </a>
                    <a href="https://twitter.com/intent/tweet?url=<?php echo urlencode(get_permalink()); ?>&text=<?php echo urlencode(get_the_title()); ?>"
                        target="_blank" rel="noopener noreferrer"
                        class="flex h-10 w-10 items-center justify-center rounded-full border border-slate-200 text-slate-500 transition-all duration-300 hover:border-blue-200 hover:text-blue-700">
                        <i class="ti ti-brand-x"></i>
                    </a>
                    <a href="https://wa.me/?text=<?php echo urlencode(get_the_title() . ' - ' . get_permalink()); ?>"
                        target="_blank" rel="noopener noreferrer"
                        class="flex h-10 w-10 items-center justify-center rounded-full border border-slate-200 text-slate-500 transition-all duration-300 hover:border-blue-200 hover:text-blue-700">
                        <i class="ti ti-brand-whatsapp"></i>
                    </a>
                </div>
            </article>
        </div>
    </div>
</section>

<!-- Related Posts -->
<section class="bg-slate-50 py-12 md:py-20">
    <div class="container mx-auto px-4 md:px-8">
        <div class="mb-12 text-center">
            <h2 class="mb-4 text-2xl font-bold text-slate-900 md:text-4xl">
                Artikel Terkait
            </h2>
            <p class="mx-auto max-w-2xl text-base text-slate-600 md:text-lg">
                Rekomendasi bacaan lain seputar kegiatan dan informasi SMK Bali Dewata.
            </p>
        </div>

        <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-3">
            <?php
            $categories = get_the_category();
            if ($categories) {
                $category_ids = array();
                foreach ($categories as $category) {
                    $category_ids[] = $category->term_id;
                }

                $related_query = new WP_Query(array(
                    'category__in' => $category_ids,
                    'post__not_in' => array(get_the_ID()),
                    'posts_per_page' => 3,
                    'ignore_sticky_posts' => 1
                ));

                if ($related_query->have_posts()) {
                    while ($related_query->have_posts()) {
                        $related_query->the_post();
                        ?>
                        <article class="group overflow-hidden rounded-2xl border border-slate-200 bg-white transition-all duration-300 hover:-translate-y-2 hover:border-blue-200 hover:shadow-lg">
                            <?php if (has_post_thumbnail()) : ?>
                                <div class="relative h-48 overflow-hidden">
                                    <a href="<?php the_permalink(); ?>">
                                        <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium_large'); ?>"
                                            alt="<?php echo esc_attr(get_the_title()); ?>"
                                            title="<?php echo esc_attr(get_the_title()); ?>"
                                            class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110">
                                    </a>
                                    <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 via-transparent to-transparent"></div>

                                    <?php
                                    $card_categories = get_the_category();
                                    if ($card_categories) :
                                    ?>
                                        <div class="absolute top-3 left-3">
                                            <span class="rounded-full bg-blue-600 px-3 py-1 text-xs font-semibold text-white">
                                                <?php echo esc_html($card_categories[0]->name); ?>
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
                    }
                    wp_reset_postdata();
                } else {
                    $latest_query = new WP_Query(array(
                        'post__not_in' => array(get_the_ID()),
                        'posts_per_page' => 3,
                        'ignore_sticky_posts' => 1
                    ));

                    if ($latest_query->have_posts()) {
                        while ($latest_query->have_posts()) {
                            $latest_query->the_post();
                            ?>
                            <article class="group overflow-hidden rounded-2xl border border-slate-200 bg-white transition-all duration-300 hover:-translate-y-2 hover:border-blue-200 hover:shadow-lg">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="relative h-48 overflow-hidden">
                                        <a href="<?php the_permalink(); ?>">
                                            <img src="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium_large'); ?>"
                                                alt="<?php echo esc_attr(get_the_title()); ?>"
                                                title="<?php echo esc_attr(get_the_title()); ?>"
                                                class="h-full w-full object-cover transition-transform duration-500 group-hover:scale-110">
                                        </a>
                                        <div class="absolute inset-0 bg-gradient-to-t from-slate-900/60 via-transparent to-transparent"></div>

                                        <?php
                                        $card_categories = get_the_category();
                                        if ($card_categories) :
                                        ?>
                                            <div class="absolute top-3 left-3">
                                                <span class="rounded-full bg-blue-600 px-3 py-1 text-xs font-semibold text-white">
                                                    <?php echo esc_html($card_categories[0]->name); ?>
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
                        }
                        wp_reset_postdata();
                    } else {
                        echo '<div class="col-span-3 rounded-2xl border border-slate-200 bg-white p-8 text-center shadow-sm">';
                        echo '<p class="text-slate-600">Belum ada artikel terkait.</p>';
                        echo '</div>';
                    }
                }
            }
            ?>
        </div>
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
