<?php get_header(); ?>

<div id="primary" class="content-area col-sm-12 col-md-8">
  <main id="main" class="site-main" role="main">

  <?php while ( have_posts() ) : the_post(); ?>

    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    	<header class="entry-header page-header">

    		<h1 class="entry-title "><?php the_title(); ?></h1>

    	</header><!-- .entry-header -->

      <?php
        if(get_the_post_thumbnail()) :
          the_post_thumbnail('large', array('class'=>'img-responsive'));
        endif;
      ?>

    	<div class="entry-content myfilms__content">
    		<?php the_content(); ?>
      </div>


    	<footer class="entry-meta">

        <?php

          $terms_countries = wp_get_post_terms( $post->ID, 'countries', array() );
          $terms_genres = wp_get_post_terms( $post->ID, 'genres', array() );

          $meta_cost = get_post_meta( $post->ID, 'cost', true );
          $meta_release_date = get_post_meta( $post->ID, 'release_date', true );

        ?>

        <?php if($terms_countries) : ?>
          <p class="meta__data">
            Страна: <?php foreach ($terms_countries as $country) { ?>
                          <a href="<?php echo get_term_link($country->term_id); ?>"><?php echo $country->name; ?></a>
                    <?php } ?>
          </p>
        <?php endif; ?>

        <?php if($terms_genres) : ?>
          <p class="meta__data">
            Жанр: <?php foreach ($terms_genres as $genre) { ?>
                          <a href="<?php echo get_term_link($genre->term_id); ?>"><?php echo $genre->name; ?></a>
                  <?php } ?>
          </p>
        <?php endif; ?>

        <?php if($meta_cost) : ?>
          <p class="meta__data">
            Стоимость: <?php echo $meta_cost; ?>
          </p>
        <?php endif; ?>

        <?php if($meta_release_date) : ?>
          <p class="meta__data">
            Дата выхода: <?php echo $meta_release_date; ?>
          </p>
        <?php endif; ?>


        <hr class="section-divider">
    	</footer><!-- .entry-meta -->
    </article><!-- #post-## -->

  <?php endwhile; // end of the loop. ?>

  </main><!-- #main -->
</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer();
