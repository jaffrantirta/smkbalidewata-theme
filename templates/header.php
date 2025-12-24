<!DOCTYPE html>
<html lang="en" class="scroll-smooth overscroll-none">

<head>
  
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php wp_head(); ?>
</head>

<body <?php body_class('bg-black'); ?>>
<?php
// Get hero background image from Customizer
$logo = get_theme_mod('logo_image');

?>
    <header class="sticky header-transparent border-b border-white/10 bg-black/40 text-white backdrop-blur-xl shadow-[0_8px_32px_0_rgba(0,0,0,0.15)]">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between py-2">
                <div class="flex items-center gap-3">
                    <?php if (!empty($logo)) : ?>
                        <a href="<?php echo home_url(); ?>" class="logo inline-flex items-center">
                            <img src="<?php echo esc_url($logo); ?>"
                                alt="SMK Bali Dewata Logo"
                                class="h-9 w-auto">
                        </a>
                    <?php endif; ?>
                    <div class="leading-tight">
                        <span class="block text-sm font-semibold md:text-base">SMK Bali Dewata</span>
                        <span class="block text-[10px] text-white/70 md:text-xs">Disiplin adalah Sukses</span>
                    </div>
                </div>
                <button class="hamburger-menu" aria-label="Menu">
                    <i class="ti ti-menu-deep"></i>
                </button>
                <nav class="main-nav nav-transparent nav-no-bg">
                    <?php custom_nav_menu(); ?>
                </nav>
            </div>
        </div>
    </header>
