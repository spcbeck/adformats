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
                            <h4>Other</h4>
                            <p><?php the_field('other'); ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
