<?php
/**
 * Customizer Settings & Controls
 *
 * Registers all customizer sections, settings, and controls
 * for front page customization
 *
 * @package Bali_Luxury_Transport
 * @since 1.0.0
 */

// Exit if accessed directly
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Register Customizer Settings
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object
 */
function bali_luxury_transport_customize_register($wp_customize) {

    // ===== FRONT PAGE PANEL (Parent Container) =====
    $wp_customize->add_panel('frontpage_panel', array(
        'title'       => __('Front Page', 'bali-luxury-transport'),
        'description' => __('Customize all front page sections', 'bali-luxury-transport'),
        'priority'    => 30,
    ));

    // ===== GENERAL SETTINGS SECTION =====
    $wp_customize->add_section('frontpage_settings', array(
        'title'       => __('General Settings', 'bali-luxury-transport'),
        'description' => __('Logo and basic settings', 'bali-luxury-transport'),
        'panel'       => 'frontpage_panel',
        'priority'    => 10,
    ));

    // ===== LOGO IMAGE =====
    $wp_customize->add_setting('logo_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'logo_image_control', array(
        'label'       => __('Logo Image', 'bali-luxury-transport'),
        'description' => __('Upload your site logo (recommended: 256x256px)', 'bali-luxury-transport'),
        'section'     => 'frontpage_settings',
        'settings'    => 'logo_image',
        'priority'    => 5,
    )));

    // ===== HERO SECTION =====
    $wp_customize->add_setting('hero_background_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'hero_background_image_control', array(
        'label'       => __('Hero Background Image', 'bali-luxury-transport'),
        'description' => __('Upload hero background image (recommended: 1920x1080px)', 'bali-luxury-transport'),
        'section'     => 'frontpage_settings',
        'settings'    => 'hero_background_image',
        'priority'    => 10,
    )));

    // ===== HERO CONTENT SECTION =====
    $wp_customize->add_section('hero_content_settings', array(
        'title'       => __('Hero Content', 'bali-luxury-transport'),
        'description' => __('Customize hero section text content', 'bali-luxury-transport'),
        'panel'       => 'frontpage_panel',
        'priority'    => 20,
    ));

    // Hero Title
    $wp_customize->add_setting('hero_title', array(
        'default'           => 'Bali Luxury Transport',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('hero_title_control', array(
        'label'       => __('Hero Title', 'bali-luxury-transport'),
        'section'     => 'hero_content_settings',
        'settings'    => 'hero_title',
        'type'        => 'text',
        'priority'    => 10,
    ));

    // Hero Subtitle
    $wp_customize->add_setting('hero_subtitle', array(
        'default'           => 'Your Premium Travel Experience in Bali',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('hero_subtitle_control', array(
        'label'       => __('Hero Subtitle', 'bali-luxury-transport'),
        'section'     => 'hero_content_settings',
        'settings'    => 'hero_subtitle',
        'type'        => 'text',
        'priority'    => 20,
    ));

    // Hero Tagline
    $wp_customize->add_setting('hero_tagline', array(
        'default'           => 'Exclusive, Comfortable, and Safe Transportation',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('hero_tagline_control', array(
        'label'       => __('Hero Tagline', 'bali-luxury-transport'),
        'section'     => 'hero_content_settings',
        'settings'    => 'hero_tagline',
        'type'        => 'text',
        'priority'    => 30,
    ));

    // Hero Description
    $wp_customize->add_setting('hero_description', array(
        'default'           => 'Discover the best of Bali with Bali Luxury Transport, offering premium, personalized transport services including private chauffeur, luxury car rental, and VIP airport transfers.',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('hero_description_control', array(
        'label'       => __('Hero Description', 'bali-luxury-transport'),
        'section'     => 'hero_content_settings',
        'settings'    => 'hero_description',
        'type'        => 'textarea',
        'priority'    => 40,
    ));

    // ===== WHY CHOOSE US SECTION =====
    $wp_customize->add_section('why_choose_settings', array(
        'title'       => __('Why Choose Us Content', 'bali-luxury-transport'),
        'description' => __('Customize Why Choose Us section', 'bali-luxury-transport'),
        'panel'       => 'frontpage_panel',
        'priority'    => 30,
    ));

    // Why Choose Us Description
    $wp_customize->add_setting('why_choose_description', array(
        'default'           => 'At Bali Luxury Transport, we specialize in providing exceptional transportation for discerning travelers. With over 10 years of experience in luxury travel, our team ensures a smooth, comfortable, and stylish journey across Bali. From private tours to airport transfers, we cater to your every need with professionalism and attention to detail. We are proud to have earned the trust of high-net-worth individuals, corporate executives, honeymooners, and VIP guests from around the world.',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('why_choose_description_control', array(
        'label'       => __('Why Choose Us Description', 'bali-luxury-transport'),
        'section'     => 'why_choose_settings',
        'settings'    => 'why_choose_description',
        'type'        => 'textarea',
        'priority'    => 10,
    ));

    // ===== LUXURY TRANSPORT SERVICES SECTION (6 Images) =====
    $wp_customize->add_section('services_settings', array(
        'title'       => __('Transport Services Images', 'bali-luxury-transport'),
        'description' => __('Upload images for transport services', 'bali-luxury-transport'),
        'panel'       => 'frontpage_panel',
        'priority'    => 40,
    ));

    $services = array(
        'day_trip' => 'Luxury Car Rental Bali',
        'liveaboard' => 'Private Chauffeur Service',
        'honeymoon' => 'VIP Airport Transfers',
        'private_charter' => 'Luxury Limousine Hire',
        'family_tour' => 'Event Transport Solutions',
        'photography_tour' => 'Full Day Tours'
    );

    $priority = 10;
    foreach ($services as $key => $label) {
        $wp_customize->add_setting("tour_{$key}_image", array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
            'transport'         => 'refresh',
        ));

        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "tour_{$key}_image_control", array(
            'label'       => sprintf(__('%s Image', 'bali-luxury-transport'), $label),
            'description' => sprintf(__('Upload image for %s (recommended: 800x600px)', 'bali-luxury-transport'), $label),
            'section'     => 'services_settings',
            'settings'    => "tour_{$key}_image",
            'priority'    => $priority,
        )));

        $priority += 5;
    }

    // ===== DESTINATIONS GALLERY SECTION =====
    $wp_customize->add_section('gallery_settings', array(
        'title'       => __('Destinations Gallery', 'bali-luxury-transport'),
        'description' => __('Manage gallery images for Beautiful Bali section', 'bali-luxury-transport'),
        'panel'       => 'frontpage_panel',
        'priority'    => 50,
    ));

    $wp_customize->add_setting('gallery_images', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Multiple_Images_Control($wp_customize, 'gallery_images_control', array(
        'label'       => __('Destinations Gallery Images', 'bali-luxury-transport'),
        'description' => __('Upload multiple images for destinations gallery (recommended: 1200x800px each)', 'bali-luxury-transport'),
        'section'     => 'gallery_settings',
        'settings'    => 'gallery_images',
        'priority'    => 10,
    )));

    // ===== TESTIMONIALS SECTION =====
    $wp_customize->add_section('testimonials_settings', array(
        'title'       => __('Testimonials', 'bali-luxury-transport'),
        'description' => __('Manage customer testimonials', 'bali-luxury-transport'),
        'panel'       => 'frontpage_panel',
        'priority'    => 60,
    ));

    // Testimonial 1
    $wp_customize->add_setting('testimonial_1_text', array(
        'default'           => 'A flawless experience! The private chauffeur was friendly, professional, and made our trip unforgettable. Highly recommend Bali Luxury Transport!',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('testimonial_1_text_control', array(
        'label'       => __('Testimonial 1 Text', 'bali-luxury-transport'),
        'section'     => 'testimonials_settings',
        'settings'    => 'testimonial_1_text',
        'type'        => 'textarea',
        'priority'    => 10,
    ));

    $wp_customize->add_setting('testimonial_1_author', array(
        'default'           => 'Elena D., Australia',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('testimonial_1_author_control', array(
        'label'       => __('Testimonial 1 Author', 'bali-luxury-transport'),
        'section'     => 'testimonials_settings',
        'settings'    => 'testimonial_1_author',
        'type'        => 'text',
        'priority'    => 15,
    ));

    // Testimonial 2
    $wp_customize->add_setting('testimonial_2_text', array(
        'default'           => 'Bali Luxury Transport made our honeymoon extra special. The car was stunning, and the driver was fantastic. Couldn\'t have asked for a better experience!',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('testimonial_2_text_control', array(
        'label'       => __('Testimonial 2 Text', 'bali-luxury-transport'),
        'section'     => 'testimonials_settings',
        'settings'    => 'testimonial_2_text',
        'type'        => 'textarea',
        'priority'    => 20,
    ));

    $wp_customize->add_setting('testimonial_2_author', array(
        'default'           => 'John and Maria T., USA',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('testimonial_2_author_control', array(
        'label'       => __('Testimonial 2 Author', 'bali-luxury-transport'),
        'section'     => 'testimonials_settings',
        'settings'    => 'testimonial_2_author',
        'type'        => 'text',
        'priority'    => 25,
    ));

    // Testimonial 3
    $wp_customize->add_setting('testimonial_3_text', array(
        'default'           => 'Expert drivers and luxury vehicles made our corporate event transport seamless. Reliable, on-time, and professional service throughout. Will definitely use again!',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('testimonial_3_text_control', array(
        'label'       => __('Testimonial 3 Text', 'bali-luxury-transport'),
        'section'     => 'testimonials_settings',
        'settings'    => 'testimonial_3_text',
        'type'        => 'textarea',
        'priority'    => 30,
    ));

    $wp_customize->add_setting('testimonial_3_author', array(
        'default'           => 'Michael S., Singapore',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('testimonial_3_author_control', array(
        'label'       => __('Testimonial 3 Author', 'bali-luxury-transport'),
        'section'     => 'testimonials_settings',
        'settings'    => 'testimonial_3_author',
        'type'        => 'text',
        'priority'    => 35,
    ));

    // Testimonial 4
    $wp_customize->add_setting('testimonial_4_text', array(
        'default'           => 'The VIP airport transfer was perfect! Driver was waiting with a sign, helped with luggage, and the car was immaculate. Best way to start our Bali vacation!',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('testimonial_4_text_control', array(
        'label'       => __('Testimonial 4 Text', 'bali-luxury-transport'),
        'section'     => 'testimonials_settings',
        'settings'    => 'testimonial_4_text',
        'type'        => 'textarea',
        'priority'    => 40,
    ));

    $wp_customize->add_setting('testimonial_4_author', array(
        'default'           => 'Sarah K., United Kingdom',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('testimonial_4_author_control', array(
        'label'       => __('Testimonial 4 Author', 'bali-luxury-transport'),
        'section'     => 'testimonials_settings',
        'settings'    => 'testimonial_4_author',
        'type'        => 'text',
        'priority'    => 45,
    ));

    // ===== CONTACT SETTINGS SECTION =====
    $wp_customize->add_section('contact_settings', array(
        'title'       => __('Contact Information', 'bali-luxury-transport'),
        'description' => __('Manage contact details', 'bali-luxury-transport'),
        'panel'       => 'frontpage_panel',
        'priority'    => 70,
    ));

    // WhatsApp Number
    $wp_customize->add_setting('whatsapp_number', array(
        'default'           => '13433085309',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('whatsapp_number_control', array(
        'label'       => __('WhatsApp Number', 'bali-luxury-transport'),
        'description' => __('Enter WhatsApp number without + sign (e.g., 6281234567890)', 'bali-luxury-transport'),
        'section'     => 'contact_settings',
        'settings'    => 'whatsapp_number',
        'type'        => 'text',
        'priority'    => 10,
    ));

    // ===== FINAL CTA SECTION =====
    $wp_customize->add_section('cta_settings', array(
        'title'       => __('Final CTA Section', 'bali-luxury-transport'),
        'description' => __('Customize Call to Action section', 'bali-luxury-transport'),
        'panel'       => 'frontpage_panel',
        'priority'    => 80,
    ));

    $wp_customize->add_setting('cta_background_image', array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'cta_background_image_control', array(
        'label'       => __('CTA Background Image', 'bali-luxury-transport'),
        'description' => __('Upload background image for final CTA section (recommended: 1920x1080px)', 'bali-luxury-transport'),
        'section'     => 'cta_settings',
        'settings'    => 'cta_background_image',
        'priority'    => 10,
    )));

    // CTA Title
    $wp_customize->add_setting('cta_title', array(
        'default'           => 'Book Your Luxury Transport Today',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('cta_title_control', array(
        'label'       => __('CTA Title', 'bali-luxury-transport'),
        'section'     => 'cta_settings',
        'settings'    => 'cta_title',
        'type'        => 'text',
        'priority'    => 20,
    ));

    // CTA Description
    $wp_customize->add_setting('cta_description', array(
        'default'           => 'Ready to experience Bali like never before? Book your luxury transport with Bali Luxury Transport and indulge in a seamless, VIP experience.',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('cta_description_control', array(
        'label'       => __('CTA Description', 'bali-luxury-transport'),
        'section'     => 'cta_settings',
        'settings'    => 'cta_description',
        'type'        => 'textarea',
        'priority'    => 30,
    ));

    // ===== FOOTER PARTNERS SECTION =====
    $wp_customize->add_section('footer_settings', array(
        'title'       => __('Footer Settings', 'bali-luxury-transport'),
        'description' => __('Manage footer content and partners', 'bali-luxury-transport'),
        'panel'       => 'frontpage_panel',
        'priority'    => 90,
    ));

    // Footer Tagline
    $wp_customize->add_setting('footer_tagline', array(
        'default'           => 'Your Trusted Bali Luxury Transport Experts',
        'sanitize_callback' => 'sanitize_text_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control('footer_tagline_control', array(
        'label'       => __('Footer Tagline', 'bali-luxury-transport'),
        'section'     => 'footer_settings',
        'settings'    => 'footer_tagline',
        'type'        => 'text',
        'priority'    => 10,
    ));

    $wp_customize->add_setting('footer_partners', array(
        'default'           => '',
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport'         => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Footer_Partners_Control($wp_customize, 'footer_partners_control', array(
        'label'       => __('Footer Partner Logos', 'bali-luxury-transport'),
        'description' => __('Add partner logos with URLs (recommended: 256x256px each)', 'bali-luxury-transport'),
        'section'     => 'footer_settings',
        'settings'    => 'footer_partners',
        'priority'    => 20,
    )));
}
add_action('customize_register', 'bali_luxury_transport_customize_register');
