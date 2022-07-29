<?php get_header(); ?>

<?php 

?>



<div class="container mt-5">
        <div class="row">
            <div class="col-sm-12 col-md-6 col-lg-12 col-xl-12">
                        <?php //if (have_posts()) : while (have_posts()) : the_post(); 
                        
                        
                    
                        $str=$_GET['s'];
                        // $str2=$_GET['flying2'];
                $arr_content = $seconddb->get_results("SELECT * FROM hotel_test where hotel_name like '%$str%' ");
                        
                foreach ($arr_content as $results) {
    
     
  ?> 
  
  
  
                <div class="card4 mb-3">
                    <div class="row no-gutters">
                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                          <?php //the_post_thumbnail('archive'); ?>
                        </div>
                        <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
                            <div class="row p-3">
                                <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 text-right">
                                    <span class="hotel-title"><?php echo $results->hotel_name; // the_title(); ?></span>
                                    <i class="fas fa-star star-rating"></i>
                                    <i class="fas fa-star star-rating"></i>
                                    <i class="fas fa-star star-rating"></i>
                                    <i class="fas fa-star star-rating"></i>
                                    <i class="fas fa-star star-rating"></i>

                                    <div class="">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <span><?php echo $results->star; //the_excerpt(); ?> ستاره</span>
                                    </div>

                                    <div class="">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <span><?php echo $results->address; //the_excerpt(); ?></span>
                                    </div>

                                    <div class="text-right pt-3">
                                        <div class="d-inline p-2 bg-light text-secondary"><?php echo $results->point; ?></div>
                                        <div class="d-inline p-2 bg-light text-secondary">صندوق امانات</div>
                                        <div class="d-inline p-2 bg-light text-secondary">سالن بدن سازی</div>
                                    </div>
                                </div>

                                <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 text-center">
                                    <div class="price mt-3">
                                        <h1 class="ml-2">قیمت: </h1>
                                        <h2 class="text-primary"><?php echo $results->price; ?> ریال</h2>
                                    </div>
                                </div>

                            </div>
        
                            <hr class="m-0">
        
                            <div class="row m-2">
                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                    <button type="button" class="btn btn-primary"><a href="<?php //the_permalink(); ?>">مشاهده اتاق های موجود</a></button>
                                </div>
                            </div>
                            

                        </div>
                        </div>
                    </div>
                            <?php } //endwhile; else: ?><?php //endif; ?>
                </div>  
            </div>

           
    </div>



    <?php get_footer(); ?>
