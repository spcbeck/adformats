<?php get_header(); ?>
<?php 
    $textColor = '#000';
    $hrColor = '#1a9ba5';

?>

<section id="hero" class="hero <?php if(has_post_thumbnail()): ?>jarallax<?php endif; ?>" <?php if(has_post_thumbnail()): ?> style="background-image: url('<?php the_post_thumbnail_url( 'large' ); ?>');" <?php endif; ?>>
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-5 text-white">
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
</section>

<section class="section">
    <div class="container">
        <div class="row">
            <?php
                $args = array(
                  'post_type' => 'adformat',
                  'category_name' => 'facebook'
                );
                $loop = new WP_Query( $args );

                while ( $loop->have_posts() ) : $loop->the_post();?>
                    <div class="col-md-4">
                        <div class="card-flip">
                            <div class="flip">
                                <div class="front">
                                    <div class="card adformat">
                                        <div class="card-body text-center">
                                            <h3><?php the_title(); ?></h3>
                                            <hr>
                                            <p>
                                                <?php the_excerpt() ?>
                                            </p>
                                        </div>
                                        <?php
                                            if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                                                the_post_thumbnail( 'full', array( 'class'  => 'card-img-bottom' ) ); // show featured image
                                            } 
                                        ?>
                                    </div>
                                </div>
                                <div class="back">
                                    <div class="card">
                                        <div class="card-body">
                                            <h3><?php the_title(); ?></h3>
                                            <hr>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_query(); ?>
        </div>
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

<?php get_footer(); ?>
