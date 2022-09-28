<?php get_header(); ?>



<?php if(have_posts()) : while(have_posts()) : the_post() ?>

<section class="s-detalhes-post">
  <div class="container">
    <div class="top-details">
      <ul class="breadcrumbs">
        <li>
          <a href="<?php echo get_home_url() ?>">
            <img src="<?php echo get_template_directory_uri() ?>/img/icon-home.svg" alt="">
          </a>
        </li>        
        <li>
          <?php the_title() ?></span>
        </li>
      </ul>
      <a href="<?php echo get_home_url() ?>" class="btn">
        <img src="<?php echo get_template_directory_uri() ?>/img/arrow-back.svg" alt="">
        Voltar para o ínicio
      </a>
    </div>
    <div class="featured-info-post">
      <div class="image">
        <img src="<?php the_field('thumbnail_do_podcast') ?>" alt="">
      </div>
      <div class="box-info-post">
        <?php 
            $category = get_the_category( $post -> ID);

            if(!empty($category)) {
              foreach($category as $nameCategory) {
                echo '<span class="category">'.$nameCategory -> name.'</span>';
              }
            }
        ?>          
        <h1><?php the_title() ?></h1>
        <ul>
          <li>
            <img src="<?php echo get_template_directory_uri() ?>/img/icon-user.svg" alt="">
            <span><?php echo get_the_author_meta('display_name')?></span>
          </li>
          <li>
            <img src="<?php echo get_template_directory_uri() ?>/img/icon-time-purple.svg" alt="">
            <span><?php echo get_the_date('j, F, Y'); ?></span>
          </li>
          <li>
            <img src="<?php echo get_template_directory_uri() ?>/img/icon-reading.svg" alt="">
            <span><?php the_field('tempo_do_podcast') ?></span>
          </li>
        </ul>
      </div>
      <div class="info-post-geral">
        
        <div class="right-content">
          <div class="content-post">
          <?php the_content() ?>             
          </div>
          <div class="share">
            <strong>Compartilhe esse conteúdo</strong>
            <ul>
              <li>
                <a href="https://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>" target='_blank'>
                  <img src="<?php echo get_template_directory_uri() ?>/img/icon-facebook.svg" alt="">
                </a>
              </li>
              <li>
                <a href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>" target='_blank'>
                  <img src="<?php echo get_template_directory_uri() ?>/img/icon-twitter.svg" alt="">
                </a>
              </li>
              <li>
                <a href="https://www.linkedin.com/sharing/share-offsite/?url=<?php the_permalink(); ?>"target='_blank'>
                  <img src="<?php echo get_template_directory_uri() ?>/img/icon-linkedin.svg" alt="">
                </a>
              </li>                
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<?php endwhile; endif; wp_reset_query() ?>  

<?php get_footer(); ?>  