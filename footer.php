


    <!-- footer -->
    <div class="bot1_wrapper">
        <div class="container">
            <div class="row">
                
                <div class="col-sm-3">
                <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('footercolumn1') ) : else : ?><?php endif; ?>
                </div>
                <div class="col-sm-3">
                <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('footercolumn2') ) : else : ?><?php endif; ?>
                </div>
                <div class="col-sm-3">
                <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('footercolumn3') ) : else : ?><?php endif; ?>
                </div>
                <div class="col-sm-3">
                <?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('footercolumn4') ) : else : ?><?php endif; ?>
                </div>
                
            </div>
        </div>
    </div>

    <div class="bot2_wrapper">
        <div class="container">
            <div class="right_side"><?php if (function_exists('dynamic_sidebar') && dynamic_sidebar('footercopyright') ) : else : ?><?php endif; ?></div>
        </div>
    </div>

</div>


<?php wp_footer(); ?>
</body>
</html>

