<!DOCTYPE html>
<html lang="en">
<head><meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Your description">
    <meta name="keywords" content="Your keywords">
    <meta name="author" content="Your name">
    <title><?php bloginfo('name'); ?></title>

    <?php wp_head(); ?>
</head>


<body class="front superslides-version" <?php body_class(); ?> >

<div id="main">

    <!--<div class="top1_wrapper">-->
    <!--    <div class="container">-->
    <!--        <div class="top1 clearfix">-->
    <!--            <div class="email1"><a href="#">support@travelagency.com</a></div>-->
    <!--            <div class="phone1">+917 3386831</div>-->
    <!--            <div class="social_wrapper">-->
    <!--                <ul class="social clearfix">-->
    <!--                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>-->
    <!--                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>-->
    <!--                    <li><a href="#"><i class="fa fa-google-plus"></i></a></li>-->
    <!--                    <li><a href="#"><i class="fa fa-instagram"></i></a></li>-->
    <!--                    <li><a href="#"><i class="fa fa-vimeo-square"></i></a></li>-->
    <!--                </ul>-->
    <!--            </div>-->
    <!--            <div class="lang1">-->
    <!--                <div class="dropdown">-->
    <!--                    <button class="btn btn-default dropdown-toggle" type="button" id="dropdownMenu1"-->
    <!--                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">English<span-->
    <!--                            class="caret"></span>-->
    <!--                    </button>-->
    <!--                    <ul class="dropdown-menu" aria-labelledby="dropdownMenu1">-->
    <!--                        <li><a class="ge" href="#">German</a></li>-->
    <!--                        <li><a class="ru" href="#">Russian</a></li>-->
    <!--                    </ul>-->
    <!--                </div>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--</div>-->

    <div class="top2_wrapper">
        <div class="container">
            <div class="top2 clearfix">
                <header>
                    <div class="logo_wrapper">
                        <a href="index.html" class="logo">
                            <img src="<?php bloginfo('template_url'); ?>/images/log.jpg" alt="" class="img-responsive" style="width: 70px;">
                        </a>
                    </div>
                </header>
                <div class="navbar navbar_ navbar-default">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target=".navbar-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <div class="navbar-collapse navbar-collapse_ collapse">

                        <?php
                            if (has_nav_menu('header')) {
                                wp_nav_menu( array(
                                    'theme_location' => 'header',
                                    'menu_class' => 'nav navbar-nav sf-menu clearfix',
                                    'container' => false
                                ) );
                            }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
