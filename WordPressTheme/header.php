<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="format-detection" content="telephone=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- ogp -->
  <meta property="og:type" content="website" />
  <meta property="og:title" content="沖縄のホームページ制作 | つむぎCODE" />
  <meta property="og:url" content="https://www.template.gomasio-test.top/" />
  <meta property="og:image" content="<?php echo esc_url(get_theme_file_uri('./assets/images/common/WP_OGP.jpg')); ?>" />
  <meta property="og:site_name" content="沖縄のホームページ制作 | つむぎCODE" />
  <meta property="og:description" content="沖縄のホームページ制作、デザインからコーディングまで一括して対応いたします" />
  <!-- favicon -->
  <link rel="shortcut icon" href="<?php echo esc_url(get_theme_file_uri('./assets/images/common/favicon.ico')); ?>" />
  <link rel="apple-touch-icon"
    href="<?php echo esc_url(get_theme_file_uri('./assets/images/common/apple-touch-icon-152x152.png')); ?>" />
  <link rel="icon" type="image/png"
    href="<?php echo esc_url(get_theme_file_uri('./assets/images/common/android-chrome-192x192.png')); ?>" />
  <!-- Webフォント -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preload" href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;700&display=swap"
    as="style">
  <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
  <?php wp_body_open(); ?>
  <header class="l-header">
    <?php get_template_part('includes/global-navi') ?>
  </header>

  <?php get_template_part('includes/breadcrumbs') ?>