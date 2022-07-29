
<div id="home" class="">
        <div id="slides_wrapper" class="">
            <div id="slides">
                <ul class="slides-container">
                    <?php
                        $args = array(
                            'post_type'         => 'slider',
                            'posts_per_page' => -1,
                        );
                        $my_query = new WP_Query($args);
                        while ($my_query->have_posts()):
                        $my_query->the_post();
                        $do_not_duplicate = $post->ID;
                    ?>

                    <li class="nav1">
                        <?php
                            the_post_thumbnail( 'slider' );
                        ?>
                        <!-- <img src="http://via.placeholder.com/2114x890" alt="" class="img"> -->
                        <div class="caption">
                            <div class="container">
                                <div class="txt1"><span><?php the_title(); ?></span></div>
                                <!-- <div class="txt2"><span>TRAVEL AGENCY</span></div>
                                <div class="txt3"><span>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod.</span></div> -->
                            </div>
                        </div>
                    </li>
                    <?php
                        endwhile; wp_reset_postdata(); 
                    ?>
                </ul>
            </div>
        </div>
    </div>
