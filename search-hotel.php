<?php
/* Template Name: search-hotel */
?>

<?php get_header(); ?>

<?php
try {
?>

    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/fontawesome-all.css" />
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/style1.css" />
    <?php
    $request = @file_get_contents('http://localhost:8080/wordpress-travels/wp-content/themes/Travelagency/ajax/hotel_sample_json.json');
    $json = json_decode($request, true);

    if (!$request) {
        echo '<div class="text-center"><h1 class="text-center" style="margin:15px; padding:25px; color:#ccc; text-align:center; font-size:50px; border:none">خطای سرور</h1></div>';
        echo '<a href="/"><button class="btn btn-default">برگشت</button></a>';
        // } elseif (empty($json) || empty($json['Flights'])) {
        //     echo '<div class="col-12 text-center"><h1 class="text-center" style="margin:15px; padding:25px; color:#ccc; text-align:center; font-size:50px; border:none">پروازی وجود ندارد</h1></div>';
        //     echo '<br /><a href="/"><button class="btn btn-default">برگشت</button></a>';
    } else {


    ?>
        <div class="container mt-5">
            <div class="row">


                <!-- Main Page -->
                <div class="col-sm-12 col-md-12 col-lg-8 col-xl-9">

                    <div class="sort">

                        <ul class="nav nav-pills mb-3 card4">
                            <li class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 text-center">
                                <a class="nav-link active sortfilter" onclick="DefaultBack()" data-toggle="pill" role="tab" aria-selected="true">پیش فرض</a>
                            </li>
                            <li class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 text-center">
                                <a class="nav-link sortfilter" id="bySortRatingStar" onclick="sort(this.id)" data-toggle="pill" role="tab" aria-selected="false">
                                    <i class="fas fa-star"></i>
                                    <span>درجه هتل</span>
                                </a>
                            </li>
                            <li class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 text-center">
                                <a class="nav-link sortfilter" id="byPrice" onclick="sort(this.id)" data-toggle="pill" role="tab" aria-selected="false">
                                    <i class="fas fa-filter"></i>
                                    <span>قیمت</span>
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="" id="result">

                        <?php
                        $count = 0;
                        foreach ($json as $hotel) {
                            $star_for_filter = $hotel['StarCode'];

                            switch ($star_for_filter) {
                                case "1":
                                    $ratting_star = 'Rating_onestar';
                                    break;
                                case "2":
                                    $ratting_star = 'Rating_twostar';
                                    break;
                                case "3":
                                    $ratting_star = 'Rating_threestar';
                                    break;
                                case "4":
                                    $ratting_star = 'Rating_fourstar';
                                    break;
                                case "5":
                                    $ratting_star = 'Rating_fivestar';
                                    break;
                                default:
                                    $ratting_star = 'No Rating';
                            }
                        ?>
                            <div class="col-sm-12 col-md-6 col-lg-12 col-xl-12 resultblock <?php echo $ratting_star; ?>">
                                <div class="card4 mb-3">
                                    <div class="row no-gutters">
                                        <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4">
                                            <img src="<?php echo $hotel['HotelPictures'][$count]['Url']; ?>" class="card-img" alt="...">
                                        </div>
                                        <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8">
                                            <div class="row p-3">
                                                <div class="col-sm-12 col-md-12 col-lg-8 col-xl-8 text-right">
                                                    <span class="hotel-title"><?php echo $hotel['Name']; ?></span>
                                                    <div class="d-block">
                                                        <?php
                                                        $star = $hotel['StarCode'];
                                                        for ($i = 0; $i < $star; $i++) {
                                                        ?>
                                                            <i class="fas fa-star star-rating"></i>
                                                        <?php
                                                        }
                                                        ?>
                                                        <p class="SortStarRating" style="display: none"><?php echo $star; ?></p>
                                                    </div>
                                                    <div class="d-block">
                                                        <i class="fas fa-map-marker-alt"></i>
                                                        <span><?php echo $hotel['AddressInfo']['Address']; ?></span>
                                                        <!-- <span>کیش، خیابان امام رضا، امام رضا 20</span> -->
                                                    </div>

                                                    <div class="text-right pt-3">
                                                        <?php
                                                        // foreach ($hotel['HotelFacilityList'] as $hotelFacility) {
                                                        for ($i = 0; $i < 3; $i++) {
                                                        ?>
                                                            <div class="d-inline p-2 bg-light text-secondary"><?php echo $hotel['HotelFacilityList'][$i]; ?></div>
                                                        <?php
                                                        }
                                                        ?>
                                                        <button class="btn bg-light">...</button>
                                                        <!-- <div class="d-inline p-2 bg-light text-secondary">صندوق امانات</div>
                                                        <div class="d-inline p-2 bg-light text-secondary">سالن بدن سازی</div> -->
                                                    </div>
                                                </div>

                                                <div class="col-sm-12 col-md-12 col-lg-4 col-xl-4 text-center">
                                                    <div class="price mt-3">
                                                        <h1 class="ml-2">قیمت: </h1>
                                                        <h2 class="text-primary"><?php echo $hotel['ExtraServicesDescription']; ?></h2>
                                                        <p class="hotelprice" id="hotelprice" style="display: none">5098000</p>
                                                    </div>
                                                </div>

                                            </div>

                                            <hr class="m-0">

                                            <div class="row m-2">
                                                <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 text-center">
                                                    <button type="button" class="btn btn-primary">مشاهده اتاق های موجود</button>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        <?php
                            $count++;
                        }
                        ?>


                    </div>
                </div>


                <!-- Sidebar -->
                <div class="col-sm-12 col-md-12 col-lg-4 col-xl-3 mb-3">
                    <div class="card4 p-3">
                        <div class="text-right">
                            <p>قیمت</p>
                        </div>

                        <div id="filter1" class="container-fuild">
                            <input type="range" min="0" max="50000000" value="50000000" class="price-range" id="price-range">

                            <div class="row">
                                <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 price-card first-price">
                                    <span>صفر</span>
                                    <span>ریال</span>
                                </div>

                                <div class="col-sm-8 col-md-8 col-lg-8 col-xl-8 price-card last-price">
                                    <span class="" id="perice-range-value"></span>
                                    <span class="">ریال</span>
                                </div>
                            </div>
                        </div>

                        <hr>

                        <div id="filter2">
                            <div class="text-right">
                                <p>درجه هتل</p>
                            </div>
                            <div class="form-check text-right">
                                <form>
                                    <input type="checkbox" class="form-check-input CategoryRating" id="StarCheck1" name="check" value="fivestar" onClick="toggle('fivestar')">
                                    <label class="mr-3" for="StarCheck1">
                                        <i class="fas fa-star star-rating"></i>
                                        <i class="fas fa-star star-rating"></i>
                                        <i class="fas fa-star star-rating"></i>
                                        <i class="fas fa-star star-rating"></i>
                                        <i class="fas fa-star star-rating"></i>
                                    </label>
                                </form>
                            </div>
                            <div class="form-check text-right">
                                <form>
                                    <input type="checkbox" class="form-check-input CategoryRating" id="StarCheck2" name="check" value="fourstar" onClick="toggle('fourstar')">
                                    <label class="mr-3" for="StarCheck2">
                                        <i class="fas fa-star star-rating"></i>
                                        <i class="fas fa-star star-rating"></i>
                                        <i class="fas fa-star star-rating"></i>
                                        <i class="fas fa-star star-rating"></i>
                                        <i class="fas fa-star star-non-rating"></i>
                                    </label>
                                </form>
                            </div>
                            <div class="form-check text-right">
                                <form>
                                    <input type="checkbox" class="form-check-input CategoryRating" id="StarCheck3" name="check" value="threestar" onClick="toggle('threestar')">
                                    <label class="mr-3" for="StarCheck3">
                                        <i class="fas fa-star star-rating"></i>
                                        <i class="fas fa-star star-rating"></i>
                                        <i class="fas fa-star star-rating"></i>
                                        <i class="fas fa-star star-non-rating"></i>
                                        <i class="fas fa-star star-non-rating"></i>
                                    </label>
                                </form>
                            </div>
                            <div class="form-check text-right">
                                <form>
                                    <input type="checkbox" class="form-check-input CategoryRating" id="StarCheck4" name="check" value="twostar" onClick="toggle('twostar')">
                                    <label class="mr-3" for="StarCheck4">
                                        <i class="fas fa-star star-rating"></i>
                                        <i class="fas fa-star star-rating"></i>
                                        <i class="fas fa-star star-non-rating"></i>
                                        <i class="fas fa-star star-non-rating"></i>
                                        <i class="fas fa-star star-non-rating"></i>
                                    </label>
                                </form>
                            </div>
                            <div class="form-check text-right">
                                <form>
                                    <input type="checkbox" class="form-check-input CategoryRating" id="StarCheck5" name="check" value="onestar" onClick="toggle('onestar')">
                                    <label class="mr-3" for="StarCheck5">
                                        <i class="fas fa-star star-rating"></i>
                                        <i class="fas fa-star star-non-rating"></i>
                                        <i class="fas fa-star star-non-rating"></i>
                                        <i class="fas fa-star star-non-rating"></i>
                                        <i class="fas fa-star star-non-rating"></i>
                                    </label>
                                </form>
                            </div>

                        </div>

                    </div>
                </div>


            </div>
        </div>

<?php
    }
} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}
?>

<?php get_footer(); ?>

<script>
    var priceChecked = 1;

    $(document).ready(function() {
        var PriceRange = document.getElementById("price-range");
        var PriceRangeValue = document.getElementById("perice-range-value");
        PriceRangeValue.innerHTML = PriceRange.value;
        PriceRange.oninput = function() {
            PriceRangeValue.innerHTML = this.value;
            PriceRangeSlider(this.value);
        }

        var category_rating = [];

        $('.CategoryRating').on('change', function() {

            AllBack();

            if ($(this).prop("checked") == true) {
                var categoryrating = $(this).val();
                category_rating.push(categoryrating);
            } else if ($(this).prop("checked") == false) {
                var categoryrating = $(this).val();
                var index = category_rating.indexOf(categoryrating);
                if (index > -1) {
                    category_rating.splice(index, 1);
                }
                AllBack();
            }

            if (category_rating.length > 0) {
                $("#result").children().each(function() {
                    var r = 0;
                    for (var x = 0; x < category_rating.length; x++) {
                        if ($(this).hasClass("Rating_" + category_rating[x])) {
                            r = 1;
                        };
                    }
                    if (r == 0) {
                        $(this).hide();
                    }
                });
            }
        });

    });


    function PriceRangeSlider(value) {
        $('.hotelprice').each(function() {
            if (parseInt(value) < parseInt(this.innerHTML)) {
                $(this).parent().parent().parent().parent().parent().parent().hide();
            } else {
                $(this).parent().parent().parent().parent().parent().parent().show();
            }
        });
    }

    function DefaultBack() {
        AllBack();
    }

    function sort(id) {
        var desc;
        var content = document.querySelector('#result');
        var els = Array.prototype.slice.call(document.querySelectorAll('#result > div'));
        if (priceChecked == 0) {
            desc = true;
            priceChecked = 1;
        } else {
            desc = false;
            priceChecked = 0;
        }
        var cls;

        if (id === 'byPrice') {
            cls = 'hotelprice';
        } else if (id === 'bySortRatingStar') {
            cls = 'SortStarRating';
        }

        els.sort(function(a, b) {
            na = parseInt(a.querySelector('.' + cls).innerHTML);
            nb = parseInt(b.querySelector('.' + cls).innerHTML);
            return desc ? (nb - na) : (na - nb);
        });

        els.forEach(function(el) {
            content.appendChild(el);
        });
    }

    function AllBack() {
        $("#result").children().css({
            "display": "block"
        });
    }
</script>