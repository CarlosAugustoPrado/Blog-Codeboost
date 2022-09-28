<?php get_header(); ?>

<section class="s-artigos">
  <div class="container">
    <div class="top">
      <h2>Artigos sobre <?php echo single_cat_title(); ?></h2> 
      <p>Lorem ipsum dolor sit amet <img src="<?php echo get_template_directory_uri() ?>/img/icon-rocket.png" alt=""></p>
    </div>      
    <div class="alm-listing">
      <?php
        $category = get_queried_object();
        $args = array (
          'post_type' => 'post',
          'order' => 'DESC',
          'cat' => $category -> term_id
        );
        $the_query = new WP_Query ($args);
      ?>
      <?php if(have_posts()) : while ($the_query -> have_posts()) : $the_query -> the_post(); ?>
      <a href="<?php the_permalink(); ?>" class="card-post-default">
          <div class="image">
            <?php the_post_thumbnail(); ?>
          </div>
          <div class="info">
            <?php 
                $category = get_the_category( $post -> ID);

                if(!empty($category)) {
                  foreach($category as $nameCategory) {
                    echo '<span class="category">'.$nameCategory -> name.'</span>';
                  }
                }
            ?>
            <h6 class="txt-white"><?php the_title() ?></h6>
            <ul>
              <li>
                <img src="<?php echo get_template_directory_uri() ?>/img/icon-calendar.svg" alt="Icone de calendario">
                <span><?php echo get_the_date('j, F'); ?></span>
              </li>
              <li>
                <img src="<?php echo get_template_directory_uri() ?>/img/icon-clock.svg" alt="Icone de relogio">
                <span><?php echo do_shortcode('[rt_reading_time postfix="min" postfix_singular="min"]') ?> de leitura</span>
              </li>
            </ul>
          </div>
      </a>
      <?php endwhile; else: endif; ?>
    </div>
  </div>
</section>

<?php get_footer(); ?> 