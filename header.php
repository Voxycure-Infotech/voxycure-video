<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<?php
$site_url = get_site_url();
$search_val = isset($_GET['s']) ? esc_html($_GET['s']) : '';

$custom_logo_id = get_theme_mod('custom_logo');
$logo_url = wp_get_attachment_image_src($custom_logo_id, 'full');
$logo_url = $logo_url[0] ?? '';

$font_color       = get_theme_mod('font_color', '#FFFFFF');
$background_color = get_theme_mod('theme_bg_color', '#121212');
$card_bg_color    = get_theme_mod('card_bg_color', '#1d1d1d');
$border_color     = get_theme_mod('border_color', '#2f2f2f');
$button_color     = get_theme_mod('button_color', '#03a4e9');
?>

<head>
    <meta charset="<?php bloginfo('charset'); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php wp_title(); ?></title>
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
    <?php if (is_singular() && get_option('thread_comments')) wp_enqueue_script('comment-reply'); ?>
    <?php wp_head(); ?>
    <style>
        :root {
            --font-color: <?php echo esc_attr($font_color) ?>;
            --theme-color: <?php echo esc_attr($background_color) ?>;
            --card-color: <?php echo esc_attr($card_bg_color) ?>;
            --border-color: <?php echo esc_attr($border_color) ?>;
            --theme-hover: <?php echo esc_attr($button_color) ?>;
            --plyr-color-main: <?php echo esc_attr($button_color) ?>;
        }
    </style>
</head>


<body>
    <div id="header">
        <nav>
            <div class="container">
                <div class="menu-icon">
                    <span class="bi bi-list"></span>
                </div>
                <div class="logo">
                    <a href="<?php echo esc_url($site_url); ?>">
                        <?php if (!empty($logo_url)) : ?>
                            <img src="<?php echo $logo_url; ?>" />
                        <?php else : ?>
                            <?php echo esc_html(get_bloginfo('name')); ?>
                        <?php endif; ?>
                    </a>
                </div>
                <div class="nav-items">
                    <?php echo wp_nav_menu(array('theme_location' => 'primary-menu')); ?>
                </div>
                <div class="search-icon">
                    <span class="bi bi-search"></span>
                </div>
                <div class="cancel-icon">
                    <span class="bi bi-x-lg"></span>
                </div>
                <form action="<?php echo esc_url($site_url); ?>" method="GET">
                    <input type="search" class="search-data" placeholder="Search" name="s" value="<?php echo $search_val; ?>" required>
                    <button type="submit" class="bi bi-search"></button>
                </form>
            </div>
        </nav>
    </div>