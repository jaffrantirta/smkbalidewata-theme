<?php get_template_part('templates/header'); ?>

<!-- Page Hero -->
<section class="relative overflow-hidden bg-slate-50 py-12 md:py-20">
    <div class="absolute inset-0">
        <div class="absolute -top-24 right-0 h-64 w-64 rounded-full bg-blue-200/40 blur-3xl"></div>
        <div class="absolute bottom-0 left-0 h-72 w-72 rounded-full bg-yellow-200/40 blur-3xl"></div>
    </div>
    <div class="container relative z-10 mx-auto px-4 md:px-8">
        <div class="mx-auto max-w-4xl">
            <nav class="mb-6 flex flex-wrap items-center text-sm text-slate-500">
                <a href="<?php echo esc_url(home_url()); ?>" class="transition-colors duration-300 hover:text-blue-700">Beranda</a>
                <span class="mx-2 text-slate-300">/</span>
                <span class="font-semibold text-blue-700"><?php the_title(); ?></span>
            </nav>
            <h1 class="text-3xl font-bold leading-tight text-slate-900 md:text-5xl">
                <?php the_title(); ?>
            </h1>
        </div>
    </div>
</section>

<!-- Page Content -->
<section class="bg-white py-8 md:py-12">
    <div class="container mx-auto px-4 md:px-8">
        <div class="mx-auto max-w-4xl">
            <article class="rounded-2xl border border-slate-200 bg-white p-6 text-slate-700 shadow-sm md:p-10">
                <div class="prose prose-lg max-w-none text-slate-700 prose-headings:text-slate-900 prose-headings:font-bold
                    prose-h2:text-2xl prose-h2:md:text-3xl prose-h2:mt-8 prose-h2:mb-4
                    prose-h3:text-xl prose-h3:md:text-2xl prose-h3:mt-6 prose-h3:mb-3
                    prose-p:leading-relaxed prose-p:mb-4 prose-p:!text-slate-700
                    prose-a:!text-blue-600 prose-a:no-underline hover:prose-a:underline
                    prose-strong:!text-slate-900
                    prose-ul:!text-slate-700 prose-ol:!text-slate-700 prose-ol:prose-li:marker:!text-slate-500
                    prose-li:mb-2
                    prose-blockquote:border-l-blue-600 prose-blockquote:!text-slate-600 prose-blockquote:italic
                    prose-img:rounded-xl
                    prose-figcaption:!text-slate-500 prose-figcaption:text-center">
                    <?php
                    while (have_posts()) :
                        the_post();
                        the_content();
                    endwhile;
                    ?>
                </div>
            </article>
        </div>
    </div>
</section>

<?php get_template_part('templates/footer'); ?>
