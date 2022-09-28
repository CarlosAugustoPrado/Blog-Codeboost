<?php get_header(); ?>

<section class="s-artigos">
  <div class="container">
    <div class="top">
      <h2>Resultado da pesquisa</h2> 
      <p>Palavra pesquisada: <strong><?php echo get_query_var('s') ?></strong></p>
    </div>      
    <?php
      global $query_string;
      $query_args = explode("&", $query_string);
      $search_query = array();

      foreach($query_args as $key => $string) {
        $query_split = explode("=", $string);
        $search_query[$query_split[0]] = urldecode($query_split[1]);
      }
      $the_query = new WP_Query($search_query);
      if ( $the_query->have_posts() ) : 
    ?>
    <div class="alm-listing">  
      <?php while ($the_query -> have_posts()) : $the_query -> the_post(); ?>    
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
      <?php endwhile; ?>      
    </div>

    <?php wp_reset_postdata() ?>
    <?php else:  ?>
      <div class="empty-search">
        <h3>Nenhum resultado encontrado</h3>
        <p>Não foi encontrado nenhum resultado com a palavra buscada.</p>
      </div>
    <?php endif; ?>            

  </div>
</section>

<?php get_footer(); ?> 