<?php
/* Template Name: search-bus */
?>

<?php get_header(); ?>

<?php
try {
?>

    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/fontawesome-all.css" />
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/style1.css" />

    <div class="container px-0 mb-3">
        <div class="row">

            <?php

            $request = @file_get_contents('http://localhost:8080/wordpress-travels/wp-content/themes/Travelagency/ajax/bus_sample_json.json');
            $json = json_decode($request, true);

            if (!$request) {
                echo '<div class="text-center"><h1 class="text-center" style="margin:15px; padding:25px; color:#ccc; text-align:center; font-size:50px; border:none">خطای سرور</h1></div>';
                echo '<a href="/"><button class="btn btn-default">برگشت</button></a>';
            } else {

            ?>

                <!-- Main Page-->
                <div class="col-sm-12 col-md-12 col-lg-8 col-xl-9">

                    <div class="sort">

                        <ul class="nav nav-pills mb-3 card4 mt-2">
                            <li class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 text-center">
                                <a class="nav-link active sortfilter" onclick="DefaultBack()" data-toggle="pill" role="tab" aria-selected="true">پیش فرض</a>
                            </li>
                            <li class="col-4 col-sm-4 col-md-4 col-lg-4 col-xl-4 text-center">
                                <a class="nav-link sortfilter" id="bySortClock" onclick="sort(this.id)" data-toggle="pill" role="tab" aria-selected="false">
                                    <i class="fas fa-chart-line"></i>
                                    <span>ساعت حرکت</span>
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
                        $BusName = array();
                        $ticketCost = array();
                        $ticketModel = array();

                        $count = 0;
                        $output = '';

                        foreach ($json['Bus'] as $BusInfo) {
                            $count++;

                            array_push($ticketCost, (int) $BusInfo['Info']['Price']);

                            if (in_array($BusInfo['Info']['BusTerminalName'] . '+' . $BusInfo['Logo']['URL'] . '+' . $BusInfo['Info']['Type'], $BusName) == true) {
                            } else {
                                array_push($BusName, $BusInfo['Info']['BusTerminalName'] . '+' . $BusInfo['Logo']['URL'] . '+' . $BusInfo['Info']['Type']);
                            }
                        ?>

                            <div class="col-12 card4 p-3 mt-2 resultblock MD_<?php echo $BusInfo['Info']['Type']; ?> AL_<?php echo $BusInfo['Info']['Type']; ?>" data-tag="<?php echo $BusInfo['Info']['Type']; ?>" data-ticket="<?php echo $BusInfo['Info']['Type']; ?>" data-price="300">
                                <form method="POST" action="http://localhost:8080/wordpress-travels/search-bus/bus-info/">
                                    <div class="row">
                                        <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2 text-center">
                                            <img class="rounded-circle" src="<?php echo $BusInfo['Logo']['URL']; ?>">
                                            <p id="<?php echo $BusInfo['Info']['BusCode']; ?>" class="airlineName"><?php echo $BusInfo['Info']['BusTerminalName']; ?></p>
                                        </div>

                                        <div class="col-sm-12 col-md-12 col-lg-10 col-xl-8">

                                            <div class="row">
                                                <div class="destination-aircraft col-md-5 col-sm-6 text-right">
                                                    <span><?php echo $BusInfo['Info']['NumberSeats']; ?> نفره</span>
                                                    <span>باقیمانده: <?php echo $BusInfo['Info']['Capacity']; ?></span>
                                                </div>
                                            </div>
                                            <div class="destination-map row">
                                                <div class="destination-map__from pull-left col-3 col-sm-2 col-md-2 col-lg-2 col-xl-4">
                                                    <div class="form-inline text-center">
                                                        <strong class="from"><?php echo $BusInfo['Address']['Source']; ?></strong>
                                                        <strong class="sortclock" style="display: none">0500</strong>
                                                    </div>
                                                </div>

                                                <div class="destination-map__airicon col-6 col-sm-8 col-md-8 col-lg-8 col-xl-4">
                                                    <span class="airline-time d-block"><?php echo $BusInfo['Departure']['DepartureDateTimeFa']; ?></span>
                                                    <i class="icon fas fa-bus"></i>
                                                </div>

                                                <div class="destination-map__to pull-left col-3 col-sm-2 col-md-2 col-lg-2 col-xl-4">
                                                    <strong class="to"><?php echo $BusInfo['Address']['Destination']; ?></strong>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-sm-12 col-md-12 col-lg-12 col-xl-2 line">
                                            <p class="text-center mt-2 price-card price" id="Price" data-price="<?php echo $BusInfo['Info']['Price']; ?>">

                                                <?php

                                                $number = $BusInfo['Info']['Price'];  //1234.56;
                                                echo number_format($number) . ' ریال';
                                                ?> </p>
                                            <p class="text-center mt-2 price-card price2" id="price2" style="display: none;"><?php echo $BusInfo['Info']['Price']; ?></p>

                                            <button id="<?php echo $BusInfo['Info']['BusCode']; ?>" class="btn btn-primary btn-block pull-left available-btn-action my-2 entekhab_va_kharid">
                                                <span>انتخاب بلیط</span>
                                            </button>

                                            <input type="hidden" name="TerminalBusID" id="TerminalBusID" value="<?php echo $BusInfo['TerminalBusID']; ?>" />
                                            <input type="hidden" name="BusCode" id="BusCode" value="<?php echo $BusInfo['Info']['BusCode']; ?>" />
                                            <input type="hidden" name="Class" id="Class" value="<?php echo $BusInfo['Info']['Class']; ?>" />
                                            <input type="hidden" name="Type" id="Type" value="<?php echo $BusInfo['Info']['Type']; ?>" />
                                            <input type="hidden" name="BusName" id="BusName" value="<?php echo $BusInfo['Info']['BusName']; ?>" />
                                            <input type="hidden" name="BusTerminalName" id="BusTerminalName" value="<?php echo $BusInfo['Info']['BusTerminalName']; ?>" />
                                            <input type="hidden" name="NumberSeats" id="NumberSeats" value="<?php echo $BusInfo['Info']['NumberSeats']; ?>" />
                                            <input type="hidden" name="Capacity" id="Capacity" value="<?php echo $BusInfo['Info']['Capacity']; ?>" />
                                            <input type="hidden" name="Price" id="Price" value="<?php echo $BusInfo['Info']['Price']; ?>" />
                                            <input type="hidden" name="Source" id="Source" value="<?php echo $BusInfo['Address']['Source']; ?>" />
                                            <input type="hidden" name="SourceEn" id="SourceEn" value="<?php echo $BusInfo['Address']['SourceEn']; ?>" />
                                            <input type="hidden" name="Destination" id="Destination" value="<?php echo $BusInfo['Address']['Destination']; ?>" />
                                            <input type="hidden" name="DestinationEn" id="DestinationEn" value="<?php echo $BusInfo['Address']['DestinationEn']; ?>" />
                                            <input type="hidden" name="SourceCity" id="SourceCity" value="<?php echo $BusInfo['Address']['SourceCity']; ?>" />
                                            <input type="hidden" name="SourceCityEn" id="SourceCityEn" value="<?php echo $BusInfo['Address']['SourceCityEn']; ?>" />
                                            <input type="hidden" name="DestinationCity" id="DestinationCity" value="<?php echo $BusInfo['Address']['DestinationCity']; ?>" />
                                            <input type="hidden" name="DestinationCityEn" id="DestinationCityEn" value="<?php echo $BusInfo['Address']['DestinationCityEn']; ?>" />
                                            <input type="hidden" name="URL" id="URL" value="<?php echo $BusInfo['Logo']['URL']; ?>" />
                                            <input type="hidden" name="DepartureTerminalCode" id="DepartureTerminalCode" value="<?php echo $BusInfo['Departure']['DepartureTerminalCode']; ?>" />
                                            <input type="hidden" name="DepartureDate" id="DepartureDate" value="<?php echo $BusInfo['Departure']['DepartureDate']; ?>" />
                                            <input type="hidden" name="DepartureTime" id="DepartureTime" value="<?php echo $BusInfo['Departure']['DepartureTime']; ?>" />
                                            <input type="hidden" name="DepartureDateTimeFa" id="DepartureDateTimeFa" value="<?php echo $BusInfo['Departure']['DepartureDateTimeFa']; ?>" />
                                            <input type="hidden" name="ArrivalTerminalCode" id="ArrivalTerminalCode" value="<?php echo $BusInfo['Arrival']['ArrivalTerminalCode']; ?>" />
                                            <input type="hidden" name="ArrivalDate" id="ArrivalDate" value="<?php echo $BusInfo['Arrival']['ArrivalDate']; ?>" />
                                            <input type="hidden" name="ArrivalTime" id="ArrivalTime" value="<?php echo $BusInfo['Arrival']['ArrivalTime']; ?>" />
                                            <input type="hidden" name="ArrivalDateTimeFa" id="ArrivalDateTimeFa" value="<?php echo $BusInfo['Arrival']['ArrivalDateTimeFa']; ?>" />

                                            <p class="text-center mt-2"><?php echo $BusInfo['Info']['Capacity']; ?> صندلی باقی مانده </p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>








                <!-- S I D B A R -->
                <div id="filters" class="col-sm-12 col-md-12 col-lg-4 col-xl-3 mt-2">
                    <div class="card4 p-3">
                        <div class="text-right">
                            <p>قیمت</p>
                        </div>

                        <div id="filter1" class="container-fuild">
                            <input type="range" min="0" max="<?php echo max($ticketCost); ?>" value="<?php echo max($ticketCost); ?>" class="price-range CategoryPlane1" id="price-range">

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

                        <div id="filter3">
                            <div class="text-right">
                                <p>اتوبوس</p>
                            </div>

                            <?php

                            foreach ($BusName as $name) {
                                $array = explode('+', $name);
                                // print_r($name);
                                // print_r($array[0]);
                            ?>
                                <div class="form-check text-right filterblock">
                                    <input type="checkbox" class="form-check-input mt-3 CategoryPlane3" id="exampleCheck1" onClick="" name="check" value="<?php echo  $array[2]; ?>">
                                    <img src="<?php echo $array[1]; ?>" alt="تصویر" class="rounded-circle p-2 mr-3">
                                    <label class="form-check-label plane-name-check" for="exampleCheck1"><?php echo $array[0]; ?></label>
                                </div>
                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>



            <?php
            }
            ?>



        </div>
    </div>


<?php

} catch (Exception $e) {
    echo 'Caught exception: ',  $e->getMessage(), "\n";
}


?>


<?php get_footer(); ?>



<script>
    // function addComma( str ) {
    // 	var objRegex = new RegExp( '(-?[0-9]+)([0-9]{3})' );

    // 	while( objRegex.test( str ) ) {
    // 		str = str.replace( objRegex, '$1,$2' );
    // 	}

    // 	return str;
    // }



    var priceChecked = 1;

    function showFCN(x) {
        if ($("." + x).css("display") == "block") {
            $("." + x).hide("fast");
        } else {
            $("." + x).show("fast");
        }
    }


    $(document).ready(function() {

        var PriceRange = document.getElementById("price-range");
        var PriceRangeValue = document.getElementById("perice-range-value");
        PriceRangeValue.innerHTML = PriceRange.value;
        PriceRange.oninput = function() {
            PriceRangeValue.innerHTML = this.value;
            PriceRangeSlider(this.value);
        }

        var category_list1 = [];
        var category_list2 = [];
        var category_list3 = [];

        $('.CategoryPlane2').on('change', function() {

            AllBack();

            if ($(this).prop("checked") == true) {
                var categoryplane = $(this).val();
                category_list2.push(categoryplane);
            } else if ($(this).prop("checked") == false) {
                var categoryplane = $(this).val();
                // category_list2.remove(categoryplane);
                // category_list2.splice(index,1);
                var index = category_list2.indexOf(categoryplane);
                if (index > -1) {
                    category_list2.splice(index, 1);
                }
                AllBack();
            }

            if (category_list2.length > 0) {
                $("#result").children().each(function() {
                    var r = 0;
                    for (var x = 0; x < category_list2.length; x++) {
                        if ($(this).hasClass("MD_" + category_list2[x])) {
                            r = 1;
                        };
                    }
                    if (r == 0) {
                        $(this).hide();
                    }
                });
            }

            if (category_list3.length > 0) {
                $("#result").children().each(function() {
                    var r = 0;
                    for (var x = 0; x < category_list3.length; x++) {
                        if ($(this).hasClass("AL_" + category_list3[x])) {
                            r = 1;
                        };
                    }
                    if (r == 0) {
                        $(this).hide();
                    }
                });
            }
        });

        $('.CategoryPlane3').on('change', function() {

            AllBack();

            if ($(this).prop("checked") == true) {
                var categoryplane = $(this).val();
                category_list3.push(categoryplane);
            } else if ($(this).prop("checked") == false) {
                var categoryplane = $(this).val();
                // category_list2.remove(categoryplane);
                // category_list2.splice(index,1);
                var index = category_list3.indexOf(categoryplane);
                if (index > -1) {
                    category_list3.splice(index, 1);
                }
                AllBack();
            }

            if (category_list2.length > 0) {
                $("#result").children().each(function() {
                    var r = 0;
                    for (var x = 0; x < category_list2.length; x++) {
                        if ($(this).hasClass("MD_" + category_list2[x])) {
                            r = 1;
                        };
                    }
                    if (r == 0) {
                        $(this).hide();
                    }
                });
            }

            if (category_list3.length > 0) {
                $("#result").children().each(function() {
                    var r = 0;
                    for (var x = 0; x < category_list3.length; x++) {
                        // alert(category_list3[x]);
                        if ($(this).hasClass("AL_" + category_list3[x])) {
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
        $('.price2').each(function() {
            if (parseInt(value) < parseInt(this.innerHTML)) {
                $(this).parent().parent().parent().hide();
            } else {
                $(this).parent().parent().parent().show();
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
        //var desc = document.querySelector('input').checked;
        var cls;

        if (id === 'byPrice') {
            cls = 'price2';
        } else if (id === 'bySortClock') {
            cls = 'sortclock';
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