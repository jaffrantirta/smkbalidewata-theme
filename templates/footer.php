 <?php
    // Get hero background image from Customizer
    $logo = get_theme_mod('logo_image');

    ?>
<footer class="border-t border-gray-200 bg-white">
    <div class="container mx-auto px-4 py-10 md:py-12">
        <div class="flex flex-col items-center gap-4 text-center">
            <?php if (!empty($logo)) : ?>
                <a href="<?php echo home_url(); ?>" class="inline-flex items-center justify-center">
                    <img src="<?php echo esc_url($logo); ?>"
                        alt="Bali Luxury Transport Logo"
                        class="h-12 w-auto">
                </a>
            <?php endif; ?>
            <p class="max-w-xl text-sm leading-relaxed text-gray-600 md:text-base">
                SMK Bali Dewata - Disiplin adalah Sukses
            </p>
        </div>
        <div class="mt-8 border-t border-gray-200 pt-6">
            <p class="text-center text-xs text-gray-400 md:text-sm">Copyright © <?php echo date('Y'); ?> Bali Luxury Transport. All Rights Reserved</p>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>
</body>

</html>
