<?php get_template_part('templates/header'); ?>

<!-- Hero Section with Brand Colors -->
<section class="relative overflow-hidden text-white bg-black h-96 md:min-h-screen">
    <!-- Animated Background Pattern -->
    <div class="absolute inset-0 opacity-10">
        <div
            class="absolute w-48 h-48 rounded-none top-20 left-20 md:w-72 md:h-72 bg-lbyellow mix-blend-multiply filter blur-xl animate-pulse">
        </div>
        <div
            class="absolute w-48 h-48 rounded-none top-40 right-20 md:w-72 md:h-72 bg-lbyellow/80 mix-blend-multiply filter blur-xl animate-pulse animation-delay-2000">
        </div>
        <div
            class="absolute w-48 h-48 rounded-none -bottom-8 left-20 md:w-72 md:h-72 bg-lbyellow/60 mix-blend-multiply filter blur-xl animate-pulse animation-delay-4000">
        </div>
    </div>

    <!-- Main Background Image with Overlay -->
    <div class="absolute inset-0 bg-black opacity-60"></div>
    <div class="absolute inset-0 bg-fixed bg-center bg-cover object-cover"
        style="background-image: url('<?php echo has_post_thumbnail() ? get_the_post_thumbnail_url(get_the_ID(), 'full') : home_url() . '/wp-content/uploads/2025/08/Premium-Medical-Coordination-by-bali-medical-concierge.webp'; ?>'); opacity: 0.3;">
    </div>

    <!-- Content -->
    <div class="relative flex items-center justify-center h-96 md:min-h-screen">
        <div class="px-4 py-4 mx-auto max-w-7xl sm:px-6 md:py-24 ">
            <div class="space-y-6 text-center md:space-y-8">
                <!-- Animated Title -->
                <div class="space-y-4 animate-fade-in-up">
                    <div class="flex items-center justify-center mt-6 space-x-2 md:space-x-4 md:mt-8">
                        <div class="w-16 h-px bg-gradient-to-r from-transparent via-lbyellow to-transparent md:w-24">
                        </div>
                        <h1 class="text-3xl font-light tracking-wide text-white md:text-6xl">
                            <?php
                            $details_title = get_post_meta(get_the_ID(), '_details_title', true);
                            echo !empty($details_title) ? esc_html($details_title) : 'Services';
                            ?>
                        </h1>
                        <div class="w-16 h-px bg-gradient-to-r from-transparent via-lbyellow to-transparent md:w-24">
                        </div>
                    </div>
                </div>

                <div class="absolute transform -translate-x-1/2 bottom-4 md:bottom-8 left-1/2 right-1/2 animate-bounce">
                    <div class="flex flex-col items-center space-y-2">
                        <span class="text-xs tracking-widest text-white uppercase md:text-sm whitespace-nowrap">Scroll
                            to explore</span>
                        <svg class="w-5 h-5 md:w-6 md:h-6 text-lbyellow" fill="none" stroke="currentColor"
                            viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Introduction Section -->
<section class="relative py-4 bg-black md:py-20">
    <!-- Background with subtle pattern -->
    <div class="absolute inset-0 opacity-5">
        <div class="absolute top-0 left-0 w-full h-full"
            style="background-image: radial-gradient(circle at 25% 25%, rgb(255, 203, 48) 0%, transparent 50%), radial-gradient(circle at 75% 75%, rgb(255, 203, 48) 0%, transparent 50%);">
        </div>
    </div>

    <div class="relative px-4 mx-auto max-w-7xl sm:px-6 ">
        <!-- Section Header -->
        <div class="space-y-4 text-center md:space-y-6">
            <div
                class="max-w-full pt-4 prose prose-lg text-white prose-a:text-white prose-figcaption:text-white prose-strong:text-white hover:prose-a:text-white hover:prose-a:underline prose-zinc prose-headings:text-white prose-headings:font-medium prose-strong:font-normal md:prose-headings:text-5xl">
                <?php the_content(); ?>
            </div>
        </div>
    </div>
</section>

<!-- Enhanced Services Overview -->
<section class="relative py-4 overflow-hidden bg-black md:py-20">
    <!-- Animated background -->
    <div
        class="absolute top-0 right-0 w-64 h-64 transform translate-x-1/2 -translate-y-1/2 rounded-none md:w-96 md:h-96 bg-lbyellow/10 opacity-30">
    </div>
    <div
        class="absolute bottom-0 left-0 w-64 h-64 transform -translate-x-1/2 translate-y-1/2 rounded-none md:w-96 md:h-96 bg-lbyellow/10 opacity-30">
    </div>

    <div class="container relative px-4 mx-auto sm:px-6 ">
        <!-- Section Header -->
        <div class="mb-10 space-y-4 text-center md:space-y-6">
            <h2 class="text-3xl font-bold leading-tight text-white font-playfair sm:text-4xl md:text-5xl">
                <?php
                $medical_title_section = get_post_meta(get_the_ID(), '_medical_title_section', true);
                if (!empty($medical_title_section)) {
                    echo esc_html($medical_title_section);
                } else {
                    echo 'Our <span class="block text-lbyellow md:inline">Healthcare Service</span>';
                }
                ?>
            </h2>
            <?php
            $medical_description_section = get_post_meta(get_the_ID(), '_medical_description_section', true);
            if (!empty($medical_description_section)) :
            ?>
            <div class="max-w-4xl mx-auto space-y-4 text-base leading-relaxed text-gray-300 md:text-lg">
                <?php echo wp_kses_post($medical_description_section); ?>
            </div>
            <?php endif; ?>
        </div>


        <!-- Swiper Services Slider -->
        <div class="swiper serviceSwiper">
            <div class="swiper-wrapper">

                <?php
                // Get medical services data
                $medical_services = get_post_meta(get_the_ID(), '_medical_our_service', true);

                if (!empty($medical_services) && is_array($medical_services)) :
                    foreach ($medical_services as $service) :
                ?>
                <!-- Service Item -->
                <div class="swiper-slide">
                    <div class="relative h-full group">
                        <div
                            class="relative flex flex-col h-full overflow-hidden transition-all duration-700 transform bg-gray-900 border shadow-2xl border-lbyellow/30 hover:-translate-y-3 hover:border-lbyellow hover:shadow-lbyellow/20">
                            <!-- Enhanced Header -->
                            <?php if (!empty($service['image'])) : ?>
                            <div class="relative overflow-hidden h-52 md:h-64">
                                <?php echo wp_get_attachment_image($service['image'], 'large', false, array(
                                                'class' => 'absolute inset-0 object-cover w-full h-full transition-transform duration-700 group-hover:scale-110',
                                                'alt' => esc_attr($service['title'])
                                            )); ?>
                                <div
                                    class="absolute inset-0 bg-gradient-to-t from-black/60 via-black/30 to-transparent">
                                </div>
                            </div>
                            <?php endif; ?>

                            <div class="flex flex-col flex-1 p-6 space-y-6 md:p-8">
                                <!-- Title with enhanced styling -->
                                <?php if (!empty($service['title'])) : ?>
                                <div class="space-y-2">
                                    <h3
                                        class="text-2xl font-bold text-white transition-all duration-500 font-playfair sm:text-3xl md:text-4xl group-hover:text-lbyellow group-hover:tracking-wide">
                                        <?php echo esc_html($service['title']); ?>
                                    </h3>
                                    <div
                                        class="w-16 h-1 transition-all duration-500 bg-gradient-to-r from-lbyellow to-lbyellow/50 group-hover:w-24">
                                    </div>
                                </div>
                                <?php endif; ?>

                                <!-- Enhanced description -->
                                <?php if (!empty($service['description'])) : ?>
                                <div class="space-y-4">
                                    <div
                                        class="text-base leading-relaxed text-white transition-colors duration-300 md:text-lg group-hover:text-white">
                                        <?php echo wp_kses_post($service['description']); ?>
                                    </div>
                                </div>
                                <?php endif; ?>

                                <!-- Description List -->
                                <?php if (!empty($service['description_list'])) : ?>
                                <div class="space-y-3">
                                    <div
                                        class="text-sm leading-relaxed text-white transition-colors duration-300 md:text-base group-hover:text-white">
                                        <?php
                                                    $description_list = wp_kses_post($service['description_list']);

                                                    // Convert ul li to styled divs
                                                    $description_list = preg_replace(
                                                        '/<ul[^>]*>/i',
                                                        '<div class="space-y-2">',
                                                        $description_list
                                                    );
                                                    $description_list = preg_replace(
                                                        '/<\/ul>/i',
                                                        '</div>',
                                                        $description_list
                                                    );
                                                    $description_list = preg_replace(
                                                        '/<li[^>]*>(.*?)<\/li>/is',
                                                        '<div class="flex items-start space-x-3"><div class="flex items-center justify-center flex-shrink-0 w-5 h-5 mt-0.5 bg-lbyellow/20 rounded-full"><i class="text-xs text-lbyellow ti ti-check"></i></div><span class="text-white group-hover:text-white">$1</span></div>',
                                                        $description_list
                                                    );

                                                    echo $description_list;
                                                    ?>
                                    </div>
                                </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                    endforeach;
                else :
                    ?>
                <!-- Fallback content if no services data -->
                <div class="swiper-slide">
                    <div class="relative h-full group">
                        <div
                            class="relative flex flex-col h-full overflow-hidden transition-all duration-700 transform bg-gray-900 border shadow-2xl border-lbyellow/30 hover:-translate-y-3 hover:border-lbyellow hover:shadow-lbyellow/20">
                            <div class="flex flex-col flex-1 p-6 space-y-6 md:p-8">
                                <div class="space-y-2">
                                    <h3
                                        class="text-2xl font-bold text-white transition-all duration-500 font-playfair sm:text-3xl md:text-4xl group-hover:text-lbyellow group-hover:tracking-wide">
                                        Our Services
                                    </h3>
                                    <div
                                        class="w-16 h-1 transition-all duration-500 bg-gradient-to-r from-lbyellow to-lbyellow/50 group-hover:w-24">
                                    </div>
                                </div>
                                <div class="space-y-4">
                                    <p
                                        class="text-base leading-relaxed text-white transition-colors duration-300 md:text-lg group-hover:text-white">
                                        Please add services from the admin panel to display them here.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>

            </div>

            <!-- Swiper Navigation -->
            <div class="swiper-button-next !text-lbyellow after:!text-base md:after:!text-xl"></div>
            <div class="swiper-button-prev !text-lbyellow after:!text-base md:after:!text-xl"></div>
        </div>
    </div>
</section>

<section id="why-choose" class="py-4 bg-black md:py-8">
    <div class="container px-4 mx-auto md:px-8">
        <div class="mb-12 text-center md:mb-16">
            <h2 class="mb-6 text-3xl font-bold leading-tight text-white font-playfair sm:text-4xl md:text-5xl text-lbyellow">
                <?php
                $why_chose_title_section = get_post_meta(get_the_ID(), '_why_chose_title_section', true);
                echo !empty($why_chose_title_section) ? esc_html($why_chose_title_section) : 'Why Trust Your Health with Us';
                ?>
            </h2>
        </div>
        <div class="grid grid-cols-2 gap-4 md:gap-6 md:grid-cols-3">
            <?php
            // Get why chose data
            $why_chose_data = get_post_meta(get_the_ID(), '_why_chose', true);

            if (!empty($why_chose_data) && is_array($why_chose_data)) :
                foreach ($why_chose_data as $item) :
            ?>
            <div
                class="p-4 transition-all duration-300 bg-gray-900 border rounded-none shadow-lg md:p-6 lg:p-8 border-lbyellow/20 group hover:shadow-xl hover:-translate-y-2">
                <?php if (!empty($item['icon'])) : ?>
                <div class="mb-6 text-4xl transition-transform duration-300 group-hover:scale-110">
                    <i
                        class="flex items-center justify-center w-12 h-12 rounded-none text-lbyellow bg-lbyellow/20 <?php echo esc_attr($item['icon']); ?>"></i>
                </div>
                <?php endif; ?>

                <?php if (!empty($item['title'])) : ?>
                <h3 class="mb-4 text-lg font-bold text-white lg:text-xl"><?php echo esc_html($item['title']); ?></h3>
                <?php endif; ?>

                <?php if (!empty($item['description'])) : ?>
                <p class="text-sm leading-relaxed text-white lg:text-base">
                    <?php echo esc_html($item['description']); ?>
                </p>
                <?php endif; ?>
            </div>
            <?php
                endforeach;
            else :
                ?>
            <!-- Fallback content if no why chose data -->
            <div
                class="p-4 transition-all duration-300 bg-gray-900 border rounded-none shadow-lg md:p-6 lg:p-8 border-lbyellow/20 group hover:shadow-xl hover:-translate-y-2">
                <div class="mb-6 text-4xl transition-transform duration-300 group-hover:scale-110"><i
                        class="flex items-center justify-center w-12 h-12 rounded-none text-lbyellow bg-lbyellow/20 ti ti-user-heart"></i>
                </div>
                <h3 class="mb-4 text-lg font-bold text-white lg:text-xl">Personalized Medical Care</h3>
                <p class="text-sm leading-relaxed text-white lg:text-base">
                    Every client receives a dedicated medical concierge who understands your health history,
                    preferences, and coordinates all aspects of your care.
                </p>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<?php
// Get cta-book-new data
$cta_book_image = get_post_meta(get_the_ID(), '_cta_book_new_image', true);
$cta_book_title = get_post_meta(get_the_ID(), '_cta_book_new_title', true);
$cta_book_description = get_post_meta(get_the_ID(), '_cta_book_new_description', true);
$cta_book_whatsapp_link = get_post_meta(get_the_ID(), '_cta_book_new_whatsapp_link', true);

// Get background image URL
$background_image_url = '';
if (!empty($cta_book_image)) {
    $background_image_url = wp_get_attachment_image_url($cta_book_image, 'full');
}

// Fallback values if no data
$title = !empty($cta_book_title) ? $cta_book_title : 'Experience Premium Healthcare Today';
$description = !empty($cta_book_description) ? $cta_book_description : "Don't let the complexity of international healthcare delay your wellbeing. Our stress-free medical concierge guarantee ensures your healthcare experience exceeds every expectation. Consult now!";
$whatsapp_link = !empty($cta_book_whatsapp_link) ? $cta_book_whatsapp_link : 'https://wa.me/6281139414563?text=Hello%20Bali%20Medical%20Concierge%2C%20I%27m%20interested%20in%20your%20medical%20concierge%20services.%20Could%20you%20please%20provide%20more%20information%3F';

// Use metabox image if available, otherwise use fallback
if (empty($background_image_url)) {
    $background_image_url = home_url() . '/wp-content/uploads/2025/08/Wellness-Recovery-Package-by-bali-medical-concierge.webp';
}
?>

<section id="contact" class="relative py-24 bg-center bg-no-repeat bg-cover md:py-32"
    style="background-image: url('<?php echo esc_url($background_image_url); ?>');">
    <div class="absolute inset-0 bg-black/50"></div>

    <div class="container relative z-10 px-4 mx-auto text-center md:px-8">
        <div class="max-w-4xl mx-auto">
            <h2 class="mb-6 text-3xl font-bold leading-tight text-white md:text-4xl">
                <?php echo esc_html($title); ?>
            </h2>

            <p class="mb-8 text-base leading-relaxed text-white md:text-lg">
                <?php echo esc_html($description); ?>
            </p>

            <a href="<?php echo esc_url($whatsapp_link); ?>" target="_blank"
                class="inline-block px-8 py-4 text-lg font-semibold text-black transition-all duration-300 transform shadow-2xl bg-lbyellow hover:bg-yellow-500 md:px-10 md:py-5 hover:scale-105">
                Book Your Medical Concierge
            </a>
        </div>
    </div>
</section>

<style>
/* Custom animation delays */
.animation-delay-200 {
    animation-delay: 200ms;
}

.animation-delay-400 {
    animation-delay: 400ms;
}

.animation-delay-1000 {
    animation-delay: 1000ms;
}

.animation-delay-2000 {
    animation-delay: 2000ms;
}

.animation-delay-4000 {
    animation-delay: 4000ms;
}

/* Enhanced shadow */
.shadow-3xl {
    box-shadow: 0 35px 60px -12px rgba(0, 0, 0, 0.25);
}

/* Fade in up animation */
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
    animation: fadeInUp 1s ease-out;
}

/* Smooth scrolling */
html {
    scroll-behavior: smooth;
}

/* Responsive text scaling */
@media (max-width: 640px) {
    .font-playfair {
        line-height: 1.2;
    }
}

/* Swiper Customization */
.serviceSwiper {
    width: 100%;
    padding: 20px 0 60px 0;
}

.serviceSwiper .swiper-slide {
    height: auto;
}

.serviceSwiper .swiper-button-next,
.serviceSwiper .swiper-button-prev {
    color: rgb(255, 203, 48);
    margin-top: -22px;
}

.serviceSwiper .swiper-button-next:after,
.serviceSwiper .swiper-button-prev:after {
    font-size: 20px;
    font-weight: 600;
}

.serviceSwiper .swiper-pagination-bullet {
    background: rgba(255, 203, 48, 0.3);
    opacity: 1;
}

.serviceSwiper .swiper-pagination-bullet-active {
    background: rgb(255, 203, 48);
}

/* Enhanced mobile interactions */
@media (hover: none) {
    .group:hover .group-hover\:scale-110 {
        transform: scale(1);
    }

    .hover\:scale-105:hover {
        transform: scale(1);
    }
}

/* Better mobile spacing */
@media (max-width: 768px) {
    .space-y-6> :not([hidden])~ :not([hidden]) {
        margin-top: 1rem;
    }

    .space-y-8> :not([hidden])~ :not([hidden]) {
        margin-top: 1.5rem;
    }

    .serviceSwiper .swiper-button-next,
    .serviceSwiper .swiper-button-prev {
        display: none;
    }
}
</style>

<?php get_template_part('templates/footer'); ?>