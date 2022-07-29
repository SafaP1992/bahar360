
<?php get_header(); ?>
      <div class="container">
          <div class="row">              
              <div class="container-content">
                <div class="row">
                  <div class="col-xs-12 col-lg-12">                   
                          <div class="row">
                              <div class="col-xs-12">
                                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                                  <div class="row">
                                    <div class="paragraph"><?php the_content(__('')); ?></div>
                                  </div>
                                  </div>
                                  <?php endwhile; else: ?><?php endif; ?>
                            </div>
                      </div>
                  </div>
                </div>
            </div>
          </div>

    <?php get_footer(); ?>
