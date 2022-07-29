<?php get_header(); ?>

<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/DateP/js-persian-cal.css" />
<script src="<?php bloginfo('template_url'); ?>/DateP/js-persian-cal.min.js"></script>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/fontawesome-all.css" />


<?php
get_template_part('slider');
// the_content( );
?>


<!-- tabs -->
<div id="front_tabs">
    <div class="container">
        <div class="tabs_wrapper tabs1_wrapper">
            <div class="tabs tabs1">
                <div class="tabs_tabs tabs1_tabs">

                    <ul>
                        <li class="hotels"><a href="#tabs-4"><i class="fas fa-hotel"></i> هتل</a></li>
                        <li class="train"><a href="#tabs-3"><i class="fas fa-subway"></i> قطار</a></li>
                        <li class="bus"><a href="#tabs-2"><i class="fas fa-bus-alt"></i> اتوبوس</a></li>
                        <li class="active flights"><a href="#tabs-1"><i class="fas fa-plane"></i> پرواز داخلی</a></li>
                    </ul>

                </div>
                <div class="tabs_content tabs1_content">

                    <div id="tabs-1">
                        <!--<form method="get" action="<?php //echo esc_url( home_url( '/' ) ); 
                                                        ?>" class="form1">-->
                        <!--<form method="post" id="" class="form1">-->
                        <!--<input type="text" name="s" value="" placeholder="">-->
                        <div class="form1">
                            <div class="row">
                                <div class="col-sm-4 col-md-2">
                                    <div class="select1_wrapper">
                                        <label>مبدا:</label>
                                        <div class="select1_inner">

                                            <input id="fromInput" list="from" name="select_flight" value="" class="select_e" style="width: 100%">
                                            <datalist id="from" name="select_flight" value="" class="select_e" style="width: 100%">
                                                <?php
                                                $arr_content = $seconddb->get_results("SELECT * FROM tbCityAirports");
                                                foreach ($arr_content as $results) {
                                                ?>
                                                    <option data-code="<?php echo $results->vcr_code; ?>"><?php echo $results->vcr_name_fa; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </datalist>
                                            <input type="hidden" name="answer" id="fromInput-hidden">


                                            <!--<select name="select_flight" id="from" value="" class="select_e" style="width: 100%">-->
                                            <!--    <option value="" disabled>مبدا</option>-->
                                            <?php
                                            //$arr_content = $seconddb->get_results("SELECT * FROM tbCityAirports");
                                            //foreach ($arr_content as $results) {
                                            ?>
                                            <!--<option value=""></option>-->
                                            <?php
                                            //}
                                            ?>
                                            <!--</select>-->

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-2">
                                    <div class="select1_wrapper">
                                        <label>مقصد:</label>
                                        <div class="select1_inner">

                                            <input id="destInput" list="dest" name="select_flight" value="" class="select_e" style="width: 100%">
                                            <datalist id="dest" name="select_flight" value="" class="select_e" style="width: 100%">
                                                <?php
                                                $arr_content = $seconddb->get_results("SELECT * FROM tbCityAirports");
                                                foreach ($arr_content as $results) {
                                                ?>
                                                    <option data-code="<?php echo $results->vcr_code; ?>"><?php echo $results->vcr_name_fa; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </datalist>
                                            <input type="hidden" name="answer" id="destInput-hidden">

                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-2">
                                    <div class="input1_wrapper">
                                        <label>تاریخ رفت:</label>
                                        <div class="input1_inner">
                                            <input type="text" class="input" id="datepicker_raft">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-1">
                                    <div class="select1_wrapper">
                                        <label>بزرگسالان:</label>
                                        <div class="select1_inner">
                                            <select class="select2 select select3" id="adult" style="width: 100%">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-1">
                                    <div class="select1_wrapper">
                                        <label>کودک:</label>
                                        <div class="select1_inner">
                                            <select class="select2 select select3" id="child" style="width: 100%">
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-1">
                                    <div class="select1_wrapper">
                                        <label>نوزاد:</label>
                                        <div class="select1_inner">
                                            <select class="select2 select select3" id="infant" style="width: 100%">
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <!--onclick="airplane(); return false;" -->
                                <div class="col-sm-4 col-md-2">
                                    <div class="button1_wrapper">
                                        <button type="submit" class="btn-default btn-form1-submit" id="airplane_s" onclick="airplane(); return false;">جستجو</button>
                                    </div>
                                </div>
                            </div>
                            <!--</form>-->
                        </div>
                    </div>

                    <div id="tabs-2">
                        <!--<form method="get" action="<?php //echo esc_url( home_url( '/' ) ); 
                                                        ?>" class="form1">-->
                        <!--<form method="post" id="" class="form1">-->
                        <!--<input type="text" name="s" value="" placeholder="">-->
                        <div class="form1">
                            <div class="row">
                                <div class="col-sm-4 col-md-2">
                                    <div class="select1_wrapper">
                                        <label>مبدا:</label>
                                        <div class="select1_inner">
                                            <select name="select_bus" id="from_bus" value="" class="select_e" style="width: 100%">
                                                <option value="1" disabledd>مبدا</option>
                                                <?php
                                                $arr_content = $seconddb->get_results("SELECT * FROM tbCityAirports");
                                                foreach ($arr_content as $results) {
                                                ?>
                                                    <option value="<?php echo $results->vcr_code; ?>"><?php echo $results->vcr_name_fa; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-2">
                                    <div class="select1_wrapper">
                                        <label>مقصد:</label>
                                        <div class="select1_inner">
                                            <select class="select_e" id="dest_bus" style="width: 100%">
                                                <option value="1" disabledd>مقصد</option>
                                                <?php
                                                $arr_content = $seconddb->get_results("SELECT * FROM tbCityAirports");
                                                foreach ($arr_content as $results) {
                                                ?>
                                                    <option value="<?php echo $results->vcr_code; ?>"><?php echo $results->vcr_name_fa; ?></option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-2">
                                    <div class="input1_wrapper">
                                        <label>تاریخ رفت:</label>
                                        <div class="input1_inner">
                                            <input type="text" class="input" id="datepicker_raft_bus">
                                        </div>
                                    </div>
                                </div>
                                <!--onclick="airplane(); return false;" -->
                                <div class="col-sm-4 col-md-2">
                                    <div class="button1_wrapper">
                                        <button type="submit" class="btn-default btn-form1-submit" id="bus_s" onclick="bus(); return false;">جستجو</button>
                                    </div>
                                </div>
                            </div>
                            <!--</form>-->
                        </div>
                    </div>




                    <div id="tabs-3">
                        <form method="POST" action="http://localhost:8080/wordpress-travels/search-train/">
                            <!--<form method="post" id="" class="form1">-->
                            <!--<input type="text" name="s" value="" placeholder="">-->
                            <div class="form1">
                                <div class="row">
                                    <div class="col-sm-4 col-md-2">
                                        <div class="select1_wrapper">
                                            <label>مبدا:</label>
                                            <div class="select1_inner">
                                                <select name="select_train" id="from_train" value="" class="select_e" style="width: 100%" required>
                                                    <option value="1" disabledd>مبدا</option>
                                                    <?php
                                                    $arr_content = $seconddb->get_results("SELECT * FROM tbCityAirports");
                                                    foreach ($arr_content as $results) {
                                                    ?>
                                                        <option value="<?php echo $results->vcr_code; ?>"><?php echo $results->vcr_name_fa; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-md-2">
                                        <div class="select1_wrapper">
                                            <label>مقصد:</label>
                                            <div class="select1_inner">
                                                <select class="select_e" id="dest_train" style="width: 100%" required>
                                                    <option value="1" disabledd>مقصد</option>
                                                    <?php
                                                    $arr_content = $seconddb->get_results("SELECT * FROM tbCityAirports");
                                                    foreach ($arr_content as $results) {
                                                    ?>
                                                        <option value="<?php echo $results->vcr_code; ?>"><?php echo $results->vcr_name_fa; ?></option>
                                                    <?php
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-4 col-md-2">
                                        <div class="input1_wrapper">
                                            <label>تاریخ رزرو:</label>
                                            <div class="input1_inner">
                                                <input type="text" class="input" id="datepicker_raft_train" required>
                                            </div>
                                        </div>
                                    </div>
                                    <!--onclick="airplane(); return false;" -->
                                    <div class="col-sm-4 col-md-2">
                                        <div class="button1_wrapper">
                                            <button type="submit" class="btn-default btn-form1-submit" id="train_s" onclick="train(); return false;">جستجو</button>
                                        </div>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>







                <div id="tabs-4">
                    <form method="POST" action="http://localhost:8080/wordpress-travels/search-hotel/">
                        <div class="form1">
                            <div class="row">
                                <div class="col-sm-4 col-md-2">
                                    <div class="select1_wrapper">
                                        <label>محل هتل:</label>
                                        <div class="select1_inner">
                                            <select class="select_e" id="dest_h" style="width: 100%">
                                                <option value="1" disabledd>مقصد</option>

                                                <?php

                                                $arr_content = $seconddb->get_results("SELECT * FROM tbCityAirports");

                                                foreach ($arr_content as $results) {

                                                ?>

                                                    <option value="<?php echo $results->vcr_code; ?>"><?php echo $results->vcr_name_fa; ?></option>

                                                <?php

                                                }

                                                ?>

                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-2">
                                    <div class="input1_wrapper">
                                        <label>تاریخ رزرو هتل:</label>
                                        <div class="input1_inner">
                                            <input type="text" class="input" id="datepicker_raft_hotel">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-1">
                                    <div class="select1_wrapper">
                                        <label>تعداد بزرگسال:</label>
                                        <div class="select1_inner">
                                            <select class="select2 select select3" id="adult_h" style="width: 100%">
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                                <option value="6">6</option>
                                                <option value="7">7</option>
                                                <option value="8">8</option>
                                                <option value="9">9</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-4 col-md-1">
                                    <div class="select1_wrapper">
                                        <label>تعداد کودک و نوزاد:</label>
                                        <div class="select1_inner">
                                            <select class="select2 select select3" id="child_h" style="width: 100%">
                                                <option value="0">0</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="5">5</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4 col-md-2">
                                    <div class="button1_wrapper">
                                        <button type="submit" class="btn-default btn-form1-submit" id="hotel_s" onclick="hotel(); return false;" style="color:#ccc">جستجو</button>
                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
</div>
</div>

<span id="fill_data"></span>




<!-- T O U R S -->

<div id="tours">
    <div class="container">
        <div class="row" style="padding:5px; margin:15px;">
            <h4 class="text-right" style="margin-bottom:30px;">تورها</h4>

            <?php
            $args = array(
                'post_type'         => 'tours',
                'posts_per_page' => 6,
            );
            $my_query = new WP_Query($args);
            while ($my_query->have_posts()) :
                $my_query->the_post();
                $do_not_duplicate = $post->ID;
            ?>



                <div class="col-sm-4">
                    <div class="box">
                        <div class="imgBox">
                            <?php
                            the_post_thumbnail('tours');
                            ?>
                            <!--<img src="image/image1.jpg" -->
                        </div>
                        <div class="content">
                            <h3><?php the_title(); ?></h3>
                            <p><?php the_excerpt(); ?></p>
                            <a href="<?php the_permalink() ?>" class="btn btn-default btnD">مشاهده</a>
                        </div>
                    </div>
                </div>


            <?php
            endwhile;
            wp_reset_postdata();
            ?>

        </div>
    </div>
</div>








<!-- N E W S -->

<div id="news">
    <div class="container">
        <div class="row" style="padding:5px; margin:15px;">
            <h4 class="text-right" style="margin-bottom:30px;">اخبار</h4>

            <?php
            $args = array(
                'post_type'         => 'news',
                'posts_per_page' => 4,
            );
            $my_query = new WP_Query($args);
            while ($my_query->have_posts()) :
                $my_query->the_post();
                $do_not_duplicate = $post->ID;
            ?>

                <div class="col-xs-12 col-sm-6 col-md-3">
                    <div class="thumbnail" style="box-shadow:5px 10px 15px #ccc">
                        <!--<img src="..." alt="...">-->
                        <?php
                        the_post_thumbnail('news');
                        ?>
                        <div class="caption">
                            <h5><?php the_title(); ?></h5>
                            <p><?php the_excerpt(); ?></p>
                            <p><a href="<?php the_permalink() ?>" class="btn btn-default" role="button">ادامه مطلب</a></p>
                        </div>
                    </div>
                </div>

            <?php
            endwhile;
            wp_reset_postdata();
            ?>

        </div>
    </div>
</div>
























<?php get_footer(); ?>



<script>
    var objCal1 = new AMIB.persianCalendar('datepicker_raft', {
        extraInputID: 'datepicker_raft',
        extraInputFormat: 'yyyy-mm-dd'
    });
    var objCal2 = new AMIB.persianCalendar('datepicker_raft_bus', {
        extraInputID: 'datepicker_raft_bus',
        extraInputFormat: 'yyyy-mm-dd'
    });
    var objCal3 = new AMIB.persianCalendar('datepicker_raft_hotel', {
        extraInputID: 'datepicker_raft_hotel',
        extraInputFormat: 'yyyy-mm-dd'
    });
    var objCal4 = new AMIB.persianCalendar('datepicker_raft_train', {
        extraInputID: 'datepicker_raft_train',
        extraInputFormat: 'yyyy-mm-dd'
    });






    //  F O R   F R O M
    document.querySelector('#fromInput[list]').addEventListener('input', function(e) {
        var input = e.target,
            list = input.getAttribute('list'),
            options = document.querySelectorAll('#' + list + ' option'),
            hiddenInput = document.getElementById(input.getAttribute('id') + '-hidden'),
            inputValue = input.value;

        hiddenInput.value = inputValue;

        for (var i = 0; i < options.length; i++) {
            var option = options[i];

            if (option.innerText === inputValue) {
                hiddenInput.value = option.getAttribute('data-code');
                break;
            }
        }
    });


    //  F O R   D E S T I N A T I O N
    document.querySelector('#destInput[list]').addEventListener('input', function(e) {
        var input = e.target,
            list = input.getAttribute('list'),
            options = document.querySelectorAll('#' + list + ' option'),
            hiddenInput = document.getElementById(input.getAttribute('id') + '-hidden'),
            inputValue = input.value;

        hiddenInput.value = inputValue;

        for (var i = 0; i < options.length; i++) {
            var option = options[i];

            if (option.innerText === inputValue) {
                hiddenInput.value = option.getAttribute('data-code');
                break;
            }
        }
    });


    function airplane() {
        jQuery(function($) {
            var from = $('#fromInput-hidden').val();
            var to = $('#destInput-hidden').val();
            var datepicker_raft = $('#datepicker_raft').val();
            var adult = $('#adult option:selected').val();
            var child = $('#child option:selected').val();
            var infant = $('#infant option:selected').val();

            if (from == '') {
                // alert('لطفا مبدا را مشخص نمائید.');
                $('#from').focus();
                $.fancybox.open('<div class="message"><h4>لطفا مبدا را مشخص نمائید.</h4></div>');
                return;
            }

            if (to == '') {
                // alert('لطفا مقصد را مشخص نمائید.');
                $('#dest').focus();
                $.fancybox.open('<div class="message"><h4>لطفا مقصد را مشخص نمائید.</h4></div>');
                return;
            }

            if (datepicker_raft == '') {
                // alert('تاریخ رفت را مشخص کنید.');
                $('#datepicker_raft').focus();
                $.fancybox.open('<div class="message"><h4>تاریخ رفت را مشخص کنید.</h4></div>');
                return;
            }


            // alert(from);
            $.ajax({
                // url: "https://travel.vafancy.com/wp-content/themes/Travelagency/ajax/flightSearch.php",
                url: "http://localhost:8080/wordpress-travels/wp-content/themes/Travelagency/search-airplane.php",
                method: "POST",
                //dataType: "json",
                data: {
                    from: from,
                    to: to,
                    date: datepicker_raft,
                    adult: adult,
                    child: child,
                    infant: infant
                },
                beforeSend: function() {
                    $.fancybox.open('<div class="message"><h4>در حال جستجو پروازها ...</h4></div>');
                },
                success: function(data) {
                    window.location.href = "http://localhost:8080/wordpress-travels/search-airplane?from=" + from + "&to=" + to + "&adult=" + adult + "&child=" + child + "&infant=" + infant + "&date=" + datepicker_raft;

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert(data);
                    alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');
                    $('#result').html('<p>status code: ' + jqXHR.status + '</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>' + jqXHR.responseText + '</div>');
                    console.log('jqXHR:');
                    console.log(jqXHR);
                    console.log('textStatus:');
                    console.log(textStatus);
                    console.log('errorThrown:');
                    console.log(errorThrown);
                }
            });
        });

    };


    function bus() {
        jQuery(function($) {
            var from_bus = $('#from_bus option:selected').val();
            var dest_bus = $('#dest_bus option:selected').val();
            var datepicker_raft_bus = $('#datepicker_raft_bus').val();

            if (from_bus == '') {
                // alert('لطفا مبدا را مشخص نمائید.');
                $('#from_bus').focus();
                $.fancybox.open('<div class="message"><h4>لطفا مبدا را مشخص نمائید.</h4></div>');
                return;
            }

            if (dest_bus == '') {
                // alert('لطفا مقصد را مشخص نمائید.');
                $('#dest_bus').focus();
                $.fancybox.open('<div class="message"><h4>لطفا مقصد را مشخص نمائید.</h4></div>');
                return;
            }

            if (datepicker_raft_bus == '') {
                // alert('تاریخ رفتن را مشخص کنید.');
                $('#datepicker_raft_bus').focus();
                $.fancybox.open('<div class="message"><h4>تاریخ رفتن را مشخص کنید.</h4></div>');
                return;
            }

            $.ajax({
                url: "http://localhost:8080/wordpress-travels/wp-content/themes/Travelagency/search-bus.php",
                method: "POST",
                data: {
                    from_bus: from_bus,
                    dest_bus: dest_bus,
                    datepicker_raft_bus: datepicker_raft_bus
                },
                beforeSend: function() {
                    $.fancybox.open('<div class="message"><h4>در حال جستجو اتوبوس ها ...</h4></div>');
                },
                success: function(data) {
                    // window.location.href = "http://bahar360.ir/wp-content/themes/Travelagency/search-bus.php";
                    window.location.href = "http://localhost:8080/wordpress-travels/search-bus/";

                },
                error: function(jqXHR, textStatus, errorThrown) {
                    alert(data);
                    alert('An error occurred... Look at the console (F12 or Ctrl+Shift+I, Console tab) for more information!');
                    $('#result').html('<p>status code: ' + jqXHR.status + '</p><p>errorThrown: ' + errorThrown + '</p><p>jqXHR.responseText:</p><div>' + jqXHR.responseText + '</div>');
                    console.log('jqXHR:');
                    console.log(jqXHR);
                    console.log('textStatus:');
                    console.log(textStatus);
                    console.log('errorThrown:');
                    console.log(errorThrown);
                }
            });
        });

    };
</script>