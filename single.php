<?php get_header(); ?>

<?php setPostViews(get_the_ID()) ?>

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
        <?php 
          $category = get_the_category( $post -> ID);

          if(!empty($category)) {
            foreach($category as $nameCategory) {
              echo '<a href="'.get_category_link($category[0]) .'">'.$nameCategory -> name.'</a>';
            }
          }
        ?>       
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
        <img src="<?php the_field('imagem_destaque_do_post') ?>" alt="">
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
            <span><?php echo do_shortcode('[rt_reading_time postfix="min" postfix_singular="min"]') ?> de leitura</span>
          </li>
        </ul>
      </div>
      <div class="info-post-geral">
        <div class="left-content">
          <h6>Navegue por tópicos</h6>
          <ul class="topics js-topics">                       
          </ul>
          <h5>
            <img src="<?php echo get_template_directory_uri() ?>/img/icon-share.svg" alt="">
            <span>Compartilhar</span>
          </h5>
          <ul class="share">
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

<?php
  $categories = get_the_category();

  $args = array (
    'post_type' => 'post',
    'order' => 'DESC',
    'posts_per_page' => 3,
    'cat' => $categories[0] -> cat_ID,
    'post__not_in' => array(get_the_ID( )) 
  );
  $the_query = new WP_Query($args); 
?>

<?php if($the_query -> have_posts()) :  ?>
  <section class="s-posts-semelhantes">
    <div class="container">
      <div class="top">
        <h2>Artigos semelhantes </h2>
        <p>Lorem ipsum dolor sit amet <img src="<?php echo get_template_directory_uri() ?>/img/icon-rocket.png" alt=""></p>
      </div>
      <div class="all">
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
                  <span>12min de leitura</span>
                </li>
              </ul>
            </div>
          </a>
        <?php endwhile; else: endif; ?>      
      </div>
    </div>
  </section>
<?php endif; ?>

<?php get_footer(); ?>  