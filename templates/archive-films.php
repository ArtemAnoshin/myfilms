<?php get_header(); ?>

<section id="primary" class="content-area col-sm-12 col-md-8">
  <main id="main" class="site-main" role="main">

  <?php if ( have_posts() ) : ?>

    <header class="page-header">
      <?php
        the_archive_title( '<h1 class="page-title">', '</h1>' );
        the_archive_description( '<div class="taxonomy-description">', '</div>' );
      ?>
    </header><!-- .page-header -->

    <?php do_action('myfilms_banner_top'); ?>

    <?php /* Start the Loop */ ?>
    <?php while ( have_posts() ) : the_post(); ?>

      <div class="myfilms-post">
        <h3 class="myfilms-post__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

        <?php
          $content = mb_substr(get_the_content(), 0, 200);

          if($content) : ?>

          <p class="myfilms-post__content">
            <?php echo $content . '...'; ?>
          </p>

        <?php endif; ?>


      </div>

    <?php endwhile; ?>

    <?php the_posts_pagination(); ?>

  <?php else : ?>

    <h2>Вы не добавили ни одного фильма.</h2>

  <?php endif; ?>

  <?php do_action('myfilms_banner_bottom'); ?>

  </main><!-- #main -->
</section><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer();
