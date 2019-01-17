<?php global $post;
get_header(); ?>


<?php
    /**
     * Functions hooked into `theme/index/header` action.
     *
     * @hooked Pixability\Theme\Index\render_header - 10
     */
    do_action('theme/index/header');
?>

<?php
    $textColor = '#000';
    $hrColor = '#1a9ba5';

?>

<section id="hero" style="background-image: url('https://adformats.pixability.com/wp-content/uploads/2018/12/dot-bg-grey-1024x312.png');">
    <div class="hero <?php if(has_post_thumbnail()): ?>jarallax<?php endif; ?>">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-7 text-white">
                    <h1 style="color: <?php echo $textColor; ?>"><?php the_field('title'); ?></h1>
                    <h2 style="color: <?php echo $textColor; ?>"><?php the_field('subtitle'); ?></h2>
                    <p><?php the_field('paragraph_text'); ?></p>
                    <div class="d-flex hero-buttons">
                        <?php if( have_rows('hero_buttons') ): ?>
                            <?php while( have_rows('hero_buttons') ): the_row();

                                // vars
                                $url = get_sub_field('hero_button');
                                $button = get_sub_field('hero_button_text');

                                ?>
                                <a class="btn btn-outline-light" href="<?php echo $url ?>"><?php echo $button ?></a>
                            <?php endwhile; ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <img class="jarallax-img" src="<?php the_post_thumbnail_url( 'large' ); ?>"/>
    </div>
</section>
<?php if ( !post_password_required( $post )) { ?>
<section class="filters">
    <div class="container">
        <form id="filter" action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" class="row filters-inner">
          <div class="col">
            <h3>Platform</h3>
            <?php
              $args = array(
                'child_of' => 2,
                'hide_empty' => 0
              );
              $categories = get_categories($args);
              foreach ( $categories as $platform ): ?>
                    <?php echo '<label class="form-check"><input type="checkbox" name="platforms[]" value="' . $platform->term_id . '" />' . $platform->name . '</label>' ?>
              <?php endforeach; ?>
            </div>
            <div class="col">
              <h3>Ad Length</h3>
              <?php
              $args = array(
                'child_of' => 12,
                'hide_empty' => 0
              );
              $categories = get_categories($args);
              foreach ( $categories as $length ): ?>
                    <?php echo '<label class="form-check"><input type="checkbox" name="length[]" value="' . $length->term_id . '" />' . $length->name . '</label>' ?>
              <?php endforeach; ?>
            </div>
            <div class="col">
              <h3>KPI/Objectives</h3>
              <?php
              $args = array(
                'child_of' => 18,
                'hide_empty' => 0
              );
              $categories = get_categories($args);
              foreach ( $categories as $kpi ): ?>
                    <?php echo '<label class="form-check"><input type="checkbox" name="kpi[]" value="' . $kpi->term_id . '" />' . $kpi->name . '</label>' ?>
              <?php endforeach; ?>
            </div>
            <div class="col">
              <h3>Priced As</h3>
              <?php
              $args = array(
                'child_of' => 27,
                'hide_empty' => 0
              );
              $categories = get_categories($args);
              foreach ( $categories as $pricedas): ?>
                    <?php echo '<label class="form-check"><input type="checkbox" name="pricedas[]" value="' . $pricedas->term_id . '" />' . $pricedas->name . '</label>' ?>
              <?php endforeach; ?>
            </div>
            <div class="col">
              <h3>Skippable</h3>
              <?php
              $args = array(
                'child_of' => 32,
                'hide_empty' => 0
              );
              $categories = get_categories($args);
              foreach ( $categories as $skippable ): ?>
                    <?php echo '<label class="form-check"><input type="checkbox" name="skippable[]" value="' . $skippable->term_id . '" />' . $skippable->name . '</label>' ?>
              <?php endforeach; ?>
            </div>
            <div class="col">
              <h3>Targeting Available</h3>
              <?php
              $args = array(
                'child_of' => 35,
                'hide_empty' => 0
              );
              $categories = get_categories($args);
              foreach ( $categories as $targeting ): ?>
                    <?php echo '<label class="form-check"><input type="checkbox" name="targeting[]" value="' . $targeting->term_id . '" />' . $targeting->name . '</label>' ?>
              <?php endforeach; ?>
            </div>
	          <input type="hidden" name="action" value="myfilter">
        </form>
    </div>
</section>

<section class="section">
    <div class="container">
      <div id="response"></div>

        <div class="row">
            <div class="col">
                <?php if (have_posts()) : ?>
                    <?php while (have_posts()) : the_post() ?>

                    <?php endwhile; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<a class="back-to-top" href="#hero">Back to top</a>

<?php } else {
    // we will show password form here
    echo '<section>';
    echo '<div class="container">';
    echo get_the_password_form();
    echo '</div></section>';

} ?>


<?php get_footer(); ?>
