<!DOCTYPE html>
<html lang="pt-br">

<head>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/plugins.css">
  <link rel="stylesheet" href="<?php echo get_template_directory_uri() ?>/css/main.css">
  
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">


  <title><?php bloginfo('name') ?> <?php wp_title('|'); ?></title>
  <meta name="title" content="<?php bloginfo('name') ?> <?php wp_title('|'); ?>">
  <meta name="description" content="<?php the_field('description') ?>">

  
  <meta property="og:type" content="website">
  <meta property="og:url" content="<?php get_home_url(); ?>">
  <meta property="og:title" content="<?php bloginfo('name') ?> <?php wp_title('|'); ?>">
  <meta property="og:description" content="<?php the_field('description') ?>">
  <meta property="og:image" content="<?php echo get_the_post_thumbnail_url() ?>">

  
  <meta property="twitter:card" content="summary_large_image">
  <meta property="twitter:url" content="<?php get_home_url(); ?>">
  <meta property="twitter:title" content="<?php bloginfo('name') ?> <?php wp_title('|'); ?>">
  <meta property="twitter:description" content="<?php the_field('description') ?>">
  <meta property="twitter:image" content="<?php echo get_the_post_thumbnail_url() ?>">
  <?php wp_head() ?>
</head>

<body>

  <header>
    <div class="container">
      <a href="<?php echo get_home_url() ?>" class="logo">
        <img src="<?php echo get_template_directory_uri() ?>/img/logo.svg" alt="">
      </a>
      
      <nav>
        <ul>
          <li>
            <a href="<?php echo get_category_link('3') ?>" class="item-category">
              <img src="<?php echo get_template_directory_uri() ?>/img/icon-tecnologia.svg" alt="">
              <span><?php echo get_cat_name('3') ?></span>
            </a>
          </li>
          <li>
            <a href="<?php echo get_category_link('4') ?>" class="item-category">
              <img src="<?php echo get_template_directory_uri() ?>/img/icon-react.svg" alt="">
              <span><?php echo get_cat_name('4') ?></span>
            </a>
          </li>
          <li>
            <a href="<?php echo get_category_link('5') ?>" class="item-category">
              <img src="<?php echo get_template_directory_uri() ?>/img/icon-html.svg" alt="">
              <span><?php echo get_cat_name('5') ?></span>
            </a>
          </li>
        </ul>
        <form action="<?php echo home_url() ?>" class="search">
          <input type="text" placeholder="Pesquise por artigo ou tema" name='s'>
          <button type="submit">
            <img src="<?php echo get_template_directory_uri() ?>/img/icon-lupa.svg" alt="Ícone de lupa">
          </button>
        </form>
        <button class="hamburger hamburger--collapse" id="js-btn-mobile" type="button">
          <span class="hamburger-box">
            <span class="hamburger-inner"></span>
          </span>
        </button>
      </nav>
    </div>
    <div class="menu-mobile">
      <ul>
        <li>
          <a href="" class="item-category">
            <img src="<?php echo get_template_directory_uri() ?>/img/icon-tecnologia.svg" alt="">
            <span>Tecnologia</span>
          </a>
        </li>
        <li>
          <a href="" class="item-category">
            <img src="<?php echo get_template_directory_uri() ?>/img/icon-react.svg" alt="">
            <span>React JS</span>
          </a>
        </li>
        <li>
          <a href="" class="item-category">
            <img src="<?php echo get_template_directory_uri() ?>/img/icon-html.svg" alt="">
            <span>HTML & CSS</span>
          </a>
        </li>
      </ul>
      <form action="" class="search">
        <input type="text" placeholder="Pesquise por artigo ou tema">
        <button type="submit">
          <img src="<?php echo get_template_directory_uri() ?>/img/icon-lupa.svg" alt="Ícone de lupa">
        </button>
      </form>
    </div>
  </header>