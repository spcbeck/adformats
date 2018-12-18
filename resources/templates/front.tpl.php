<?php get_header(); ?>


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

<section id="hero" class="hero <?php if(has_post_thumbnail()): ?>jarallax<?php endif; ?>">
    <div class="container" style="background-image: url('https://adformats.pixability.com/wp-content/uploads/2018/12/dot-bg-grey-1024x312.png');">
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
    <img class="jarallax-img" src="<?php the_post_thumbnail_url( 'large' ); ?>"/>
</section>

<section class="section">
    <div class="container">
        <div class="row clearfix">
            <h2>Facebook</h2>
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
                                            <div class="categoryparents">
                                                <?php
                                                $args = array(
                                                  'orderby' => 'name',
                                                  'order' => 'ASC',
                                                  'parent' => 0
                                                );
                                                $categoriesparents = get_categories($args);
                                                foreach ( $categoriesparents as $categoryparent ): ?>
                                                    <h4><?php echo $categoryparent->name ?></h4>
                                                    <?php

                                                        $categories = get_the_category();
                                                        foreach($categories as $category) {
                                                            if($category->parent == $categoryparent->term_id ) {
                                                         ?>
                                                            <span class="badge badge-secondary"><?php echo $category->name ?></span>

                                                        <?php 
                                                        }
                                                    } ?>
                                                
                                                <?php
                                                    endforeach;
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_query(); ?>
        </div>
        <div class="row clearfix">
            <h2>YouTube</h2>
            <?php
                $args = array(
                  'post_type' => 'adformat',
                  'category_name' => 'youtube'
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
                                            <div class="categoryparents">
                                                <?php
                                                $args = array(
                                                  'orderby' => 'name',
                                                  'order' => 'ASC',
                                                  'parent' => 0
                                                );
                                                $categoriesparents = get_categories($args);
                                                foreach ( $categoriesparents as $categoryparent ): ?>
                                                    <h4><?php echo $categoryparent->name ?></h4>
                                                    <?php

                                                        $categories = get_the_category();
                                                        foreach($categories as $category) {
                                                            if($category->parent == $categoryparent->term_id ) {
                                                         ?>
                                                            <span class="badge badge-secondary"><?php echo $category->name ?></span>

                                                        <?php 
                                                        }
                                                    } ?>
                                                
                                                <?php
                                                    endforeach;
                                                ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_query(); ?>
        </div>
        <div class="row clearfix">
            <h2>Hulu</h2>
            <?php
                $args = array(
                  'post_type' => 'adformat',
                  'category_name' => 'hulu'
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
                                            <div class="categoryparents">
                                                <?php
                                                $args = array(
                                                  'orderby' => 'name',
                                                  'order' => 'ASC',
                                                  'parent' => 0
                                                );
                                                $categoriesparents = get_categories($args);
                                                foreach ( $categoriesparents as $categoryparent ): ?>
                                                    <h4><?php echo $categoryparent->name ?></h4>
                                                    <?php

                                                        $categories = get_the_category();
                                                        foreach($categories as $category) {
                                                            if($category->parent == $categoryparent->term_id ) {
                                                         ?>
                                                            <span class="badge badge-secondary"><?php echo $category->name ?></span>

                                                        <?php 
                                                        }
                                                    } ?>
                                                
                                                <?php
                                                    endforeach;
                                                ?>
                                            </div>
                                           
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
            <h2>Instagram</h2>
            <?php
                $args = array(
                  'post_type' => 'adformat',
                  'category_name' => 'instagram'
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
                                            <div class="categoryparents">
                                                <?php
                                                $args = array(
                                                  'orderby' => 'name',
                                                  'order' => 'ASC',
                                                  'parent' => 0
                                                );
                                                $categoriesparents = get_categories($args);
                                                foreach ( $categoriesparents as $categoryparent ): ?>
                                                    <h4><?php echo $categoryparent->name ?></h4>
                                                    <?php

                                                        $categories = get_the_category();
                                                        foreach($categories as $category) {
                                                            if($category->parent == $categoryparent->term_id ) {
                                                         ?>
                                                            <span class="badge badge-secondary"><?php echo $category->name ?></span>

                                                        <?php 
                                                        }
                                                    } ?>
                                                
                                                <?php
                                                    endforeach;
                                                ?>
                                            </div>
                                           
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
            <h2>Amazon</h2>
            <?php
                $args = array(
                  'post_type' => 'adformat',
                  'category_name' => 'amazon'
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
                                            <div class="categoryparents">
                                                <?php
                                                $args = array(
                                                  'orderby' => 'name',
                                                  'order' => 'ASC',
                                                  'parent' => 0
                                                );
                                                $categoriesparents = get_categories($args);
                                                foreach ( $categoriesparents as $categoryparent ): ?>
                                                    <h4><?php echo $categoryparent->name ?></h4>
                                                    <?php

                                                        $categories = get_the_category();
                                                        foreach($categories as $category) {
                                                            if($category->parent == $categoryparent->term_id ) {
                                                         ?>
                                                            <span class="badge badge-secondary"><?php echo $category->name ?></span>

                                                        <?php 
                                                        }
                                                    } ?>
                                                
                                                <?php
                                                    endforeach;
                                                ?>
                                            </div>
                                           
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
            <h2>Roku</h2>
            <?php
                $args = array(
                  'post_type' => 'adformat',
                  'category_name' => 'roku'
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
                                            <div class="categoryparents">
                                                <?php
                                                $args = array(
                                                  'orderby' => 'name',
                                                  'order' => 'ASC',
                                                  'parent' => 0
                                                );
                                                $categoriesparents = get_categories($args);
                                                foreach ( $categoriesparents as $categoryparent ): ?>
                                                    <h4><?php echo $categoryparent->name ?></h4>
                                                    <?php

                                                        $categories = get_the_category();
                                                        foreach($categories as $category) {
                                                            if($category->parent == $categoryparent->term_id ) {
                                                         ?>
                                                            <span class="badge badge-secondary"><?php echo $category->name ?></span>

                                                        <?php 
                                                        }
                                                    } ?>
                                                
                                                <?php
                                                    endforeach;
                                                ?>
                                            </div>
                                           
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
            <h2>Snapchat</h2>
            <?php
                $args = array(
                  'post_type' => 'adformat',
                  'category_name' => 'snapchat'
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
                                            <div class="categoryparents">
                                                <?php
                                                $args = array(
                                                  'orderby' => 'name',
                                                  'order' => 'ASC',
                                                  'parent' => 0
                                                );
                                                $categoriesparents = get_categories($args);
                                                foreach ( $categoriesparents as $categoryparent ): ?>
                                                    <h4><?php echo $categoryparent->name ?></h4>
                                                    <?php

                                                        $categories = get_the_category();
                                                        foreach($categories as $category) {
                                                            if($category->parent == $categoryparent->term_id ) {
                                                         ?>
                                                            <span class="badge badge-secondary"><?php echo $category->name ?></span>

                                                        <?php 
                                                        }
                                                    } ?>
                                                
                                                <?php
                                                    endforeach;
                                                ?>
                                            </div>
                                           
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
            <h2>SpotX</h2>
            <?php
                $args = array(
                  'post_type' => 'adformat',
                  'category_name' => 'spotx'
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
                                            <div class="categoryparents">
                                                <?php
                                                $args = array(
                                                  'orderby' => 'name',
                                                  'order' => 'ASC',
                                                  'parent' => 0
                                                );
                                                $categoriesparents = get_categories($args);
                                                foreach ( $categoriesparents as $categoryparent ): ?>
                                                    <h4><?php echo $categoryparent->name ?></h4>
                                                    <?php

                                                        $categories = get_the_category();
                                                        foreach($categories as $category) {
                                                            if($category->parent == $categoryparent->term_id ) {
                                                         ?>
                                                            <span class="badge badge-secondary"><?php echo $category->name ?></span>

                                                        <?php 
                                                        }
                                                    } ?>
                                                
                                                <?php
                                                    endforeach;
                                                ?>
                                            </div>
                                           
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
