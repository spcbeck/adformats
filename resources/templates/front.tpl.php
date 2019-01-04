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

<section class="filters">
    <div class="container">
        <div class="row filters-inner">
                <?php
                $args = array(
                  'child_of' => 2,
                  'hide_empty' => 0
                );
                $categories = get_categories($args);
                foreach ( $categories as $platform ): ?>
                    <div class="col">
                    <?php echo '<a class="btn bg-' . $platform->slug . '" href="#' . $platform->slug . '">' . $platform->name . '</a>' ?>
                    </div>
                <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="section" id="facebook">
    <div class="container">
            <?php
                $args = array(
                  'post_type' => 'adformat',
                  'category_name' => 'facebook'
                );
                $loop = new WP_Query( $args );

                $count = 0;

                while ( $loop->have_posts() ) : $loop->the_post();?>
                    <?php if($count == 0): ?>
                        <div class="row">
                            <div class="col">
                                <h2><img src="https://adformats.pixability.com/wp-content/uploads/2018/12/facebook-logo.png" alt="Facebook"> | Ad Formats</h2>
                            </div>
                        </div>
                        <div class="row clearfix">
                    <?php endif; ?>
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
                    <?php $count++; ?>
                <?php endwhile; ?>
                <?php if($loop->have_posts()): ?>
                   </div>
                <?php endif; ?>
                <?php wp_reset_query(); ?>
            <?php
                $args = array(
                  'post_type' => 'adformat',
                  'category_name' => 'youtube'
                );
                $loop = new WP_Query( $args );

                $count = 0;

                while ( $loop->have_posts() ) : $loop->the_post();?>
                    <?php if($count == 0): ?>
                        <div class="row" id="youtube">
                            <div class="col">
                                <h2><img src="https://adformats.pixability.com/wp-content/uploads/2018/12/youtube-logo.png" alt=""> | Ad Formats</h2>
                            </div>
                        </div>
                         <div class="row clearfix">
                    <?php endif; ?>
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
                    <?php $count++; ?>
                <?php endwhile; ?>
                <?php if($loop->have_posts()): ?>
                   </div>
                <?php endif; ?>
                <?php wp_reset_query(); ?>
            <?php
                $args = array(
                  'post_type' => 'adformat',
                  'category_name' => 'hulu'
                );
                $loop = new WP_Query( $args );

                $count = 0;

                while ( $loop->have_posts() ) : $loop->the_post();?>
                    <?php if($count == 0): ?>
                        <div class="row" id="hulu">
                            <div class="col">
                                <h2><img src="https://adformats.pixability.com/wp-content/uploads/2018/12/hulu-logo.png" alt="Hulu"> | Ad Formats</h2>
                            </div>
                        </div>
                        <div class="row clearfix">
                    <?php endif; ?>
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
                    <?php $count++; ?>
                <?php endwhile; ?>
                <?php if($loop->have_posts()): ?>
                   </div>
                <?php endif; ?>
                <?php wp_reset_query(); ?>
            <?php
                $args = array(
                  'post_type' => 'adformat',
                  'category_name' => 'instagram'
                );
                $loop = new WP_Query( $args );

                $count = 0;

                while ( $loop->have_posts() ) : $loop->the_post();?>
                    <?php if($count == 0): ?>
                    <div class="row" id="instagram">
                        <div class="col">
                            <h2><img src="https://adformats.pixability.com/wp-content/uploads/2018/12/instagram-logo.png" alt="Instagram"> | Ad Formats</h2>
                        </div>
                    </div>
                    <div class="row">
                    <?php endif; ?>
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
                    <?php $count++; ?>
                <?php endwhile; ?>
                <?php wp_reset_query(); ?>
                <?php if($loop->have_posts()): ?>
                   </div>
                <?php endif; ?>
            <?php
                $args = array(
                  'post_type' => 'adformat',
                  'category_name' => 'amazon'
                );
                $loop = new WP_Query( $args );

                $count = 0;

                while ( $loop->have_posts() ) : $loop->the_post();?>
                     <?php if($count == 0): ?>
                        <div class="row" id="amazon">
                            <div class="col">
                                <img src="" alt=""> <h2>Amazon</h2>
                            </div>
                        </div>
                        <div class="row">
                    <?php endif; ?>
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
                    <?php $count++; ?>
                <?php endwhile; ?>
                <?php if($loop->have_posts()): ?>
                   </div>
                <?php endif; ?>
                <?php wp_reset_query();
                $args = array(
                  'post_type' => 'adformat',
                  'category_name' => 'roku'
                );
                $loop = new WP_Query( $args );

                $count = 0;

                while ( $loop->have_posts() ) : $loop->the_post();?>
                    <?php if($count == 0): ?>
                        <div class="row" id="amazon">
                            <div class="col">
                                <img src="" alt="Roku"> <h2>Ad Formats</h2>
                            </div>
                        </div>
                        <div class="row">
                    <?php endif; ?>
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
                    <?php $count ++; ?>
                <?php endwhile; ?>
                <?php if($loop->have_posts()): ?>
                   </div>
                <?php endif; ?>
                <?php wp_reset_query(); ?>
            <?php
                $args = array(
                  'post_type' => 'adformat',
                  'category_name' => 'snapchat'
                );

                $count = 0;

                $loop = new WP_Query( $args );

                while ( $loop->have_posts() ) : $loop->the_post();?>
                    <?php if($count == 0): ?>
                    <div class="row" id="snapchat">
                        <div class="col">
                            <img src="" alt=""> <h2>Snapchat</h2>
                        </div>
                    </div>
                    <div class="row">
                    <?php endif ?>
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
                    <?php $count++; ?>
                <?php endwhile; ?>
                <?php if($loop->have_posts()): ?>
                   </div>
                <?php endif; ?>
                <?php wp_reset_query(); ?>
            <?php
                $args = array(
                  'post_type' => 'adformat',
                  'category_name' => 'spotx'
                );
                $loop = new WP_Query( $args );

                while ( $loop->have_posts() ) : $loop->the_post();?>
                    <?php if($count == 0): ?>
                    <div class="row" id="spotx">
                        <div class="col">
                            <img src="" alt=""> <h2>SpotX</h2>
                        </div>
                    </div>
                    <div class="row">
                    <?php endif; ?>
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
                    <?php $count++; ?>
                <?php endwhile; ?>
                <?php if($loop->have_posts()): ?>
                   </div>
                <?php endif; ?>
                <?php wp_reset_query(); ?>
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

<?php get_footer(); ?>
