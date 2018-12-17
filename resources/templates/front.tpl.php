<?php get_header(); ?>
<?php 
    if(the_field('text_color')){
        $textColor = get_field('text_color');
        $hrColor = get_field('text_color');
    } else {
        $textColor = '#fff';
        $hrColor = '#1a9ba5';
    }
?>

<style>
    .hr-color rect {
        fill: <?php echo $hrColor ?>;
    }
</style>

<section id="hero" class="hero <?php if(has_post_thumbnail()): ?>jarallax<?php endif; ?>" <?php if(has_post_thumbnail()): ?> style="background-image: url('<?php the_post_thumbnail_url( 'large' ); ?>');" <?php endif; ?>>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-5 text-white">
                <h1 style="color: <?php echo $textColor; ?>"><?php the_field('title'); ?></h1>
                <h2><?php the_field('subtitle'); ?></h2>
                <svg class="svg hr hr-color" id="Layer_1" data-name="Layer 1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 67.68 10.41"><defs><style>.cls-1{fill:$hrColor;}</style></defs><title>hero-hr</title><rect class="cls-1" width="2.97" height="2.97"/><rect class="cls-1" x="8.09" width="2.97" height="2.97"/><rect class="cls-1" x="16.18" width="2.97" height="2.97"/><rect class="cls-1" x="24.26" width="2.97" height="2.97"/><rect class="cls-1" x="32.35" width="2.97" height="2.97"/><rect class="cls-1" x="40.44" width="2.97" height="2.97"/><rect class="cls-1" x="48.53" width="2.97" height="2.97"/><rect class="cls-1" x="56.62" width="2.97" height="2.97"/><rect class="cls-1" x="64.7" width="2.97" height="2.97"/><rect class="cls-1" y="7.44" width="2.97" height="2.97"/><rect class="cls-1" x="8.09" y="7.44" width="2.97" height="2.97"/><rect class="cls-1" x="16.18" y="7.44" width="2.97" height="2.97"/><rect class="cls-1" x="24.26" y="7.44" width="2.97" height="2.97"/><rect class="cls-1" x="32.35" y="7.44" width="2.97" height="2.97"/><rect class="cls-1" x="40.44" y="7.44" width="2.97" height="2.97"/><rect class="cls-1" x="48.53" y="7.44" width="2.97" height="2.97"/><rect class="cls-1" x="56.62" y="7.44" width="2.97" height="2.97"/><rect class="cls-1" x="64.7" y="7.44" width="2.97" height="2.97"/></svg>
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
</section>

<section class="section">
    <div class="wrapper">
        <div class="content">
            <?php if (have_posts()) : ?>
                <?php while (have_posts()) : the_post() ?>
                    <?php
                        /**
                         * Functions hooked into `theme/single/content` action.
                         *
                         * @hooked Pixability\Theme\App\Structure\render_post_content - 10
                         */
                        do_action('theme/single/content');
                    ?>
                <?php endwhile; ?>
            <?php endif; ?>


        </div>
    </div>
</section>

<?php get_footer(); ?>
