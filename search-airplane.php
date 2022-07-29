<?php
/* Template Name: search-airplane */
?>

<?php get_header(); ?>

<?php
try {
    // echo random_bytes(16);
    // echo '<br/>';
    // echo bin2hex(random_bytes(16));
    // echo '<br/>';
    // echo hash('sha256','hello');
    // echo '<br/>';
    // echo hash_hmac('sha256','hello','secret');
?>

    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/fontawesome-all.css" />
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/style1.css" />

    <div class="container px-0 mb-3">
        <div class="row">

            <?php
            /*************
                   LOGIN GET
             **************/
            // $curl = curl_init();
            // curl_setopt_array($curl, [
            //   CURLOPT_RETURNTRANSFER => 1,
            //   CURLOPT_URL => 'http://94.183.35.138:8030/api/v1/token?username=09153450308&password=123456',
            // ]);
            // $resp = curl_exec($curl);
            // curl_close($curl);
            // $resp_decode = json_decode($resp);
            // echo $resp_decode->token;

            // if (!curl_exec($curl)) {
            //     echo 'سرور مشکل دارد';
            //     die('Error: "' . curl_error($curl) . '" - Code: ' . curl_errno($curl));
            // }

            // curl_close($curl);
            // $resp_decode = json_decode($resp);
            // echo '<input type="text" name="inputtoken" value="'.$resp_decode->token.'" />';


            // $auth = file_get_contents("http://94.183.35.138:8030/api/v1/token?username=09153450308&password=123456");
            // $jsonAuth = json_decode($auth);
            // var_dump($jsonAuth);
            // if(!$auth) {
            //     echo '<div class="text-center"><h1 class="text-center" style="margin:15px; padding:25px; color:#ccc; text-align:center; font-size:50px; border:none">خطای سرور 1</h1></div>';                                       
            //     echo '<a href="/"><button class="btn btn-default">برگشت</button></a>';
            //     return;
            // }
            // elseif(empty($jsonAuth) || empty($jsonAuth['token'])){
            //     echo '<div class="col-12 text-center"><h1 class="text-center" style="margin:15px; padding:25px; color:#ccc; text-align:center; font-size:50px; border:none">خطای مجوز</h1></div>';
            //     echo '<br /><a href="http://bahar360.ir"><button class="btn btn-default">برگشت</button></a>';
            //     return;
            // }


            $vfrom = $_GET["from"];
            $vto = $_GET["to"];
            $vdate = $_GET["date"];
            $vadult = $_GET["adult"];
            $vchild = $_GET["child"];
            $vinfant = $_GET["infant"];

            // $request = @file_get_contents("http://185.176.32.61:8080/webradar.aspx?from=$vfrom&to=$vto&adult=$vadult&child=$vchild&infant=$vinfant&date=$vdate&t=y.json");
            // $request = @file_get_contents('http://bahar360.ir/wp-content/themes/Travelagency/ajax/airplane_sample_json.json');
            $request = @file_get_contents('http://localhost:8080/wordpress-travels/wp-content/themes/Travelagency/ajax/airplane_sample_json.json');

            $json = json_decode($request, true);

            if (!$request) {
                echo '<div class="text-center"><h1 class="text-center" style="margin:15px; padding:25px; color:#ccc; text-align:center; font-size:50px; border:none">خطای سرور</h1></div>';
                echo '<a href="/"><button class="btn btn-default">برگشت</button></a>';
            } elseif (empty($json) || empty($json['Flights'])) {
                echo '<div class="col-12 text-center"><h1 class="text-center" style="margin:15px; padding:25px; color:#ccc; text-align:center; font-size:50px; border:none">پروازی وجود ندارد</h1></div>';
                echo '<br /><a href="/"><button class="btn btn-default">برگشت</button></a>';
            } else {


                //The URL of the file that you want to download.
                // $url = 'https://www.google.com/images/branding/googlelogo/1x/googlelogo_color_272x92dp.png';

                //Download the file using file_get_contents.
                // $downloadedFileContents = @file_get_contents($request);

                // //Check to see if file_get_contents failed.
                // if ($downloadedFileContents === false) {
                //     throw new Exception('Failed to download file at: ' . $request);
                // }

                // //The path and filename that you want to save the file to.
                // $fileName = 'http://localhost:8080/wordpress-travels/wp-content/themes/Travelagency/myfile.json';

                // //Save the data using file_put_contents.
                // $save = @file_put_contents($fileName, $downloadedFileContents);

                // //Check to see if it failed to save or not.
                // if ($save === false) {
                //     throw new Exception('Failed to save file to: ', $fileName);
                // }

                // if($request != '') {
                // var_dump($json);




                /////------------------------------------------------------------------------------------------/////
                // $c = curl_init('http://stackoverflow.com/questions/ask');
                // $c = curl_init('https://travel.vafancy.com/wp-content/themes/Travelagency/ajax/webradar.aspx.json');
                // $c = curl_init("$request");
                // curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
                // //curl_setopt(... other options you want...)

                // $html = curl_exec($c);

                // if (curl_error($c)){
                //     echo 'سرور مشکل دارد';
                //     die(curl_error($c));
                // }

                // // Get the status code
                // $status = curl_getinfo($c, CURLINFO_HTTP_CODE);
                // echo $html;

                // curl_close($c);
                /////------------------------------------------------------------------------------------------/////
            ?>



                <div class="col-12">
                    <div class="row">
                        <div id="details" style="width: 100%;">

                        </div>
                    </div>
                </div>




                <div id="select_item" style="display: none">
                    <div class="col-12">
                        <div class="row">
                            <div class="col-sm-6">
                                <h4 class="title_select">مشخصات مسافران را وارد کنید </h4>
                            </div>
                            <div class="col-sm-2">
                                <h4 class="title_select" id="titleAdlt"><?php echo $vadult ?> بزرگسال</h4>
                                <div class="AddStyle"><button id="addAdult" class="btn btn-primary">+</button></div>
                            </div>
                            <div class="col-sm-2">
                                <h4 class="title_select" id="titleChd"><?php echo $vchild ?> کودک</h4>
                                <div class="AddStyle"><button id="addClild" class="btn btn-primary">+</button></div>
                            </div>
                            <div class="col-sm-2">
                                <h4 class="title_select" id="titleInfa"><?php echo $vinfant ?> نوزاد </h4>
                                <div class="AddStyle"><button id="addInfant" class="btn btn-primary">+</button></div>
                            </div>
                        </div>
                    </div>

                    <!--<form action="http://bahar360.ir/wp-content/themes/Travelagency/pay/payment.php" method="post" class="form-inline" id="SalePaymentRequest">-->
                    <form action="<?php bloginfo('template_url'); ?>/pay/payment.php" method="post" class="form-block" id="SalePaymentRequest">
                        <!--<form action="" method="post" class="form-block" id="SalePaymentRequest">-->
                        <div class="row">
                            <div id="info_airplane"></div>
                            <div class="col-12">
                                <div class="title_select r">
                                    <h4>جهت دریافت اطلاعات شماره تماس و ایمیل معرفی کنید</h4>
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <h5>شماره تماس</h5>
                                            <input type="text" class="form-control" id="contact_number" name="contact_number" placeholder="شماره تماس" required />
                                        </div>
                                        <div class="col-sm-6">
                                            <h5>آدرس پست الکترونیک</h5>
                                            <input type="text" class="form-control" id="email_user" name="email_user" placeholder="آدرس پست الکترونیک" required />
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr />

                        <!--<input type="text" id="inputtoken" name="inputtoken" value="<?php //echo $resp_decode->token 
                                                                                        ?>" />';-->
                        <input type="hidden" id="FlightID" name="FlightID" readonly />
                        <input type="hidden" id="FlightType" name="FlightType" readonly />
                        <input type="hidden" id="AirlineName" name="AirlineName" readonly />
                        <input type="hidden" id="AirlineCode" name="AirlineCode" readonly />
                        <input type="hidden" id="AirlineLogo" name="AirlineLogo" readonly />
                        <input type="hidden" id="DepartureParentRegionName" name="DepartureParentRegionName" readonly />
                        <input type="hidden" id="DepartureDate" name="DepartureDate" readonly />
                        <input type="hidden" id="DepartureTime" name="DepartureTime" readonly />
                        <input type="hidden" id="PersianDepartureDate" name="PersianDepartureDate" />
                        <input type="hidden" id="ArrivalParentRegionName" name="ArrivalParentRegionName" readonly />
                        <input type="hidden" id="ArrivalTime" name="ArrivalTime" readonly />
                        <input type="hidden" id="FlightNo" name="FlightNo" readonly />
                        <input type="hidden" id="Capacity" name="Capacity" readonly />
                        <input type="hidden" id="CabinType" name="CabinType" readonly />
                        <input type="hidden" id="FinalPrice" name="FinalPrice" readonly />
                        <input type="hidden" id="Source" name="Source" readonly />
                        <input type="hidden" id="Destination" name="Destination" readonly />
                        <input type="hidden" id="json" name="json" readonly />


                        <div id="testID">

                            <?php

                            echo $json['Flights']['Airline']['Name'];

                            $sum = $vadult + $vchild + $vinfant;
                            $countID = 0;

                            for ($i = 0; $i < $vadult; $i++) {
                                $count_passenger = 'passenger-' . $countID++;
                                $string_title = '';
                                $string_title = "بزرگسال";
                                $class = "Adlt";
                                echo outputrecord($string_title, $count_passenger, $vadult, $class, $i);
                            }

                            for ($i = 0; $i < $vchild; $i++) {
                                $count_passenger = 'passenger-' . $countID++;
                                $string_title = '';
                                $string_title = "کودک";
                                $class = "Chd";
                                echo outputrecord($string_title, $count_passenger, $vchild, $class, 1);
                            }


                            for ($i = 0; $i < $vinfant; $i++) {
                                $count_passenger = 'passenger-' . $countID++;
                                $string_title = '';
                                $string_title = "نوزاد";
                                $class = "Infa";
                                echo outputrecord($string_title, $count_passenger, $vinfant, $class, 1);
                            }

                            // echo $countID;
                            ?>
                        </div>


                        <div class="row">

                            <div class="col-sm-12">
                                <div class="price_sum_border text-right">
                                    <h6>مجموع:</h6>
                                    <div class="sum">
                                        <!--<div id="sum_real"> </div>-->
                                        <div class="row">
                                            <div class="col-sm-3 ">
                                                <div class="box_price" data-box="adt">
                                                    <div id="sum_adult" name="sum_adult"> </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 ">
                                                <div class="box_price" data-box="chd">
                                                    <div id="sum_child" name="sum_child"> </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 ">
                                                <div class="box_price" data-box="inf">
                                                    <div id="sum_infant" name="sum_infant"> </div>
                                                </div>
                                            </div>
                                            <div class="col-sm-3 ">
                                                <div class="box_price">
                                                    <!-- <div id="sum_all" name="sum_all"> </div> -->
                                                    <input type="text" class="" id="sum_all" name="sum_all" value="" readonly /> ریال

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!--$('.entekhab_va_kharid').prop('id')-->

                            <?php

                            echo $json['Flights']['Airline']['Name'];
                            // foreach($json['Flights'] as $flight){

                            //      $index = -1;
                            //      $val = "120784716"
                            //       if($item.name === $val){
                            //         $index = $i;
                            //         return $i;
                            //       }
                            //     });
                            ?>
                            <?php
                            // }
                            ?>

                            <div class="col-sm-12 text-center">
                                <!-- <button class="btn btn-primary" id="final_blit"> خرید </button> -->
                                <input type="submit" class="btn btn-primary" id="final_blit" name="final_blit" value="رزور و خرید">
                                <?php //include('errors.php'); 
                                ?>

                            </div>
                        </div>
                    </form>
                </div>








































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

                        $AirlineName = array();
                        $AirlineORG = array();
                        $AirlineCode = array();
                        $AirlineLogo = array();
                        $ticketCost = array();
                        $ticketModel = array();

                        $count = 0;
                        $output = '';

                        foreach ($json['Flights'] as $flight) {
                            $count++;

                            array_push($ticketCost, (int) $flight['AdtPrice']);

                            if (in_array($flight['Airline']['Name'] . '+' . $flight['Airline']['Code'] . '+' . $flight['Airline']['Logo'] . '+' . $flight['FlightType'], $AirlineName) == true) {
                            } else {
                                // echo "1";
                                array_push($AirlineName, $flight['Airline']['Name'] . '+' . $flight['Airline']['Code'] . '+' . $flight['Airline']['Logo'] . '+' . $flight['FlightType']);
                                // array_push($AirlineLogo, $flight['Airline']['Logo']);
                                // array_push($AirlineCode, $flight['Airline']['Code']);

                            }


                            if (in_array($flight['FlightType'], $ticketModel) == true) {
                            } else {
                                // echo "1";
                                array_push($ticketModel, $flight['FlightType']);
                            }
                        ?>

                            <div class="col-12 card4 p-3 mt-2 resultblock MD_<?php echo $flight['FlightType'] ?> AL_<?php echo $flight['Airline']['Code'] ?>" data-tag="<?php echo $flight['Airline']['Code'] ?>" data-ticket="<?php echo $flight['FlightType'] ?>" data-price="300">
                                <div class="row">
                                    <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2 text-center">
                                        <img class="rounded-circle" src="<?php echo $flight['Airline']['Logo'] ?>">
                                        <p id="<?php echo $flight['Airline']['Name'] ?>" class="airlineName"><?php echo $flight['Airline']['Name'] ?></p>
                                    </div>

                                    <div class="col-sm-12 col-md-12 col-lg-10 col-xl-8">
                                        <div class="row">
                                            <div class="destination-aircraft col-md-5 col-sm-6 text-right">
                                                <span><?php $flightType = $flight['FlightType'];
                                                        if ($flightType == "System") {
                                                            echo "سیستمی";
                                                        } else {
                                                            echo "چارتری";
                                                        } ?></span>
                                            </div>
                                        </div>

                                        <div class="destination-map row">
                                            <div class="destination-map__from pull-left col-3 col-sm-2 col-md-2 col-lg-2 col-xl-4">
                                                <div class="form-inline text-center">
                                                    <strong class="from"><?php echo $flight['Departure']['ParentRegionName'] ?></strong>
                                                    <strong class="time"><?php echo $flight['DepartureTime'] ?></strong>
                                                    <strong class="sortclock" style="display: none">0500</strong>
                                                </div>
                                            </div>

                                            <div class="destination-map__airicon col-6 col-sm-8 col-md-8 col-lg-8 col-xl-4">
                                                <span class="airline-time d-block"><?php echo $flight['PersianDepartureDate'] ?></span>
                                                <i class="icon fas fa-plane fa-flip-horizontal fa-flip-vertical"></i>
                                            </div>

                                            <div class="destination-map__to pull-left col-3 col-sm-2 col-md-2 col-lg-2 col-xl-4">
                                                <strong class="to"><?php echo $flight['Arrival']['ParentRegionName'] ?></strong>
                                                <strong class="time"><?php echo $flight['ArrivalTime'] ?></strong>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-2">

                                                <button id="flip" onclick="showFCN('panel<?php echo $count ?>');return false;">اطلاعات بیشتر</button>
                                                <div id="panel" class="panel panel<?php echo $count ?>">
                                                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                                                        <li class="nav-item">
                                                            <a class="nav-link active" id="rules-tab" data-toggle="tab" href="#rules" role="tab" aria-controls="rules" aria-selected="true">اطلاعات پرواز</a>
                                                        </li>
                                                        <li class="nav-item">
                                                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">قوانین جریمه استرداد</a>
                                                        </li>
                                                    </ul>
                                                    <div class="tab-content col-sm-12 col-md-12 col-lg-12 col-xl-12" id="myTabContent">
                                                        <div class="tab-pane fade show active" id="rules" role="tabpanel" aria-labelledby="rules-tab">
                                                            <div class="text-right p-2 tab-information">
                                                                <p id="<?php echo $flight['FlightNo'] ?>" class="airlineNumber">شماره پرواز: <?php echo $flight['FlightNo'] ?></p>
                                                                <p id="<?php echo $flight['CabinType'] ?>" class="airlinCabinType">کلاس نرخی: <?php echo $flight['CabinType'] ?></p>
                                                                <!--<p>مقدار بار مجاز : 20 کیلوگر</p>-->
                                                            </div>
                                                        </div>
                                                        <div class="tab-pane fade " id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                                            <table class="table table-light tab-information">
                                                                <thead>
                                                                    <tr>
                                                                        <th scope="col"><?php echo $flight['FlightNo'] ?></th>
                                                                        <!--<th scope="col">از 1 روز قبل از پرواز به بعد</th>-->
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td scope="row">20%</td>
                                                                        <!--<th scope="row">40%</th>-->
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="col-sm-12 col-md-12 col-lg-12 col-xl-2 line">
                                        <p class="text-center mt-2 price-card price" id="Price" data-price="<?php echo $flight['AdtPrice'] ?>"><?php
                                                                                                                                                $number = $flight['AdtPrice'] . '0';  //1234.56;
                                                                                                                                                echo number_format($number) . ' ریال';
                                                                                                                                                // 'fa_IR' => 'Persian (Iran)',
                                                                                                                                                // setlocale(LC_MONETARY,"fa_IR");
                                                                                                                                                // echo ($number);
                                                                                                                                                // echo money_format("%=!",$number); 
                                                                                                                                                ?></p>
                                        <?php
                                        ?>

                                        <p class="text-center mt-2 price-card price2" id="price2" style="display: none;"><?php echo $flight['AdtPrice']; ?></p>

                                        <button id="<?php echo $flight['FlightID']; ?>" data-adult="<?php echo $flight['AdtPrice']; ?>" data-child="<?php echo $flight['ChdPrice']; ?>" data-infant="<?php echo $flight['InfPrice'] ?>" data-FlightType="<?php echo $flight['FlightType'] ?>" data-AirlineName="<?php echo $flight['Airline']['Name'] ?>" data-AirlineCode="<?php echo $flight['Airline']['Code'] ?>" data-AirlineLogo="<?php echo $flight['Airline']['Logo'] ?>" data-DepartureParentRegionName="<?php echo $flight['Departure']['ParentRegionName'] ?>" data-DepartureDate="<?php echo $flight['DepartureDate'] ?>" data-DepartureTime="<?php echo $flight['DepartureTime'] ?>" data-PersianDepartureDate="<?php echo $flight['PersianDepartureDate'] ?>" data-ArrivalParentRegionName="<?php echo $flight['Arrival']['ParentRegionName'] ?>" data-ArrivalTime="<?php echo $flight['ArrivalTime'] ?>" data-FlightNo="<?php echo $flight['FlightNo'] ?>" data-Capacity="<?php echo $flight['Capacity'] ?>" $flight['FlightType']; data-CabinType="<?php echo $flight['CabinType'] ?>" class="btn btn-primary btn-block pull-left available-btn-action my-2 entekhab_va_kharid">
                                            <span>انتخاب بلیط</span>
                                        </button>
                                        <p class="text-center mt-2"><?php echo $flight['Capacity'] ?> صندلی باقی مانده </p>
                                    </div>
                                </div>
                            </div>





                        <?php

                        }

                        // print_r($AirlineName);
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
                            <input type="range" min="0" max="<?php echo max($ticketCost) ?>" value="<?php
                                                                                                    $cur = max($ticketCost);
                                                                                                    echo $cur . '0';
                                                                                                    // echo number_format($max);
                                                                                                    ?>" class="price-range CategoryPlane1" id="price-range">

                            <div class="row">
                                <div class="col-sm-4 col-md-4 col-lg-4 col-xl-4 price-card first-price">
                                    <span>0</span>
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
                                <p>نوع بلیط</p>
                            </div>


                            <?php
                            foreach ($ticketModel as $model) {
                            ?>
                                <div class="form-check text-right">
                                    <form>
                                        <input type="checkbox" class="form-check-input CategoryPlane2" id="KindTicketCheck1" name="check" value="<?php echo $model ?>" onClick="toggle('<?php echo $model ?>')">
                                        <label class="form-check-label mr-4" for="KindTicketCheck1"><?php if ($model == "System") {
                                                                                                        echo "سیستمی";
                                                                                                    } else {
                                                                                                        echo "چارتری";
                                                                                                    }  ?></label>
                                    </form>
                                </div>

                            <?php
                            }
                            ?>
                            <!--<div class="form-check text-right">-->
                            <!--    <form>-->
                            <!--    <input type="checkbox" class="form-check-input CategoryPlane2" id="KindTicketCheck2" name="check" value="Charter" onClick="toggle('Charter')">-->
                            <!--    <label class="form-check-label mr-3" for="KindTicketCheck2">چارتر</label>-->
                            <!--    </form>-->
                            <!--</div>-->
                        </div>

                        <hr>

                        <div id="filter3">
                            <div class="text-right">
                                <p>شرکت های هواپیمایی</p>
                            </div>

                            <?php

                            foreach ($AirlineName as $name) {

                                // print_r($name);

                                $array = explode('+', $name);
                                // print_r($array[0]);
                                // print_r($array[1]);
                                // print_r($array[2]);

                            ?>



                                <div class="form-check text-right filterblock">
                                    <input type="checkbox" class="form-check-input mt-3 CategoryPlane3" id="exampleCheck1" onClick="toggle('')" name="check" value="<?php echo  $array[1] ?>">
                                    <img src="<?php echo $array[2] ?>" alt="..." class="rounded-circle p-2 mr-3">
                                    <label class="form-check-label plane-name-check" for="exampleCheck1"><?php echo $array[0] ?></label>
                                    <!--<label class="text-left plane-price-check ">از 3,260,000 ریال </label>-->
                                </div>

                            <?php
                            }
                            ?>


                            <!--<div class="form-check text-right filterblock">-->
                            <!--    <input type="checkbox" class="form-check-input mt-3 CategoryPlane3" id="exampleCheck2" onClick="toggle('IR')" name="check" value="IR">-->
                            <!--    <img src="https://storage.hiholiday.ir/File/AirlineLogo/IranAir.png" alt="..." class="rounded-circle p-2 mr-3">-->
                            <!--    <label class="form-check-label plane-name-check" for="exampleCheck2">ایران ایر</label>-->
                            <!--    <label class="text-left plane-price-check ">از 3,260,000 ریال </label>-->
                            <!--</div>-->
                            <!--<div class="form-check text-right filterblock">-->
                            <!--    <input type="checkbox" class="form-check-input mt-3 CategoryPlane3" id="exampleCheck3" onClick="toggle('')" name="check" value="irantour">-->
                            <!--    <img src="https://storage.hiholiday.ir/File/AirlineLogo/IranAir.png" alt="..." class="rounded-circle p-2 mr-3">-->
                            <!--    <label class="form-check-label plane-name-check" for="exampleCheck3">ایران تور</label>-->
                            <!--    <label class="text-left plane-price-check ">از 3,260,000 ریال </label>-->
                            <!--</div>-->
                            <!--<div class="form-check text-right filterblock">-->
                            <!--    <input type="checkbox" class="form-check-input mt-3 CategoryPlane3" id="exampleCheck4" onClick="toggle('EP')" name="check" value="EP">-->
                            <!--    <img src="https://storage.hiholiday.ir/File/AirlineLogo/EP.png" alt="..." class="rounded-circle p-2 mr-3">-->
                            <!--    <label class="form-check-label plane-name-check" for="exampleCheck4">ایران آسمان</label>-->
                            <!--    <label class="text-left plane-price-check ">از 3,260,000 ریال </label>-->
                            <!--</div>-->
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




































function outputrecord($string_title, $count_passenger, $money, $class, $index)
{

    $output = '';
    $output .= '<div id="' . $count_passenger . '" class="numDiv">';
    if ($index > 0) {
        $output .= '<button onclick="closeBOX(\'' . $count_passenger . '\',\'' . $class . '\');return false;" class="put-left close_style" id="' . $count_passenger . '_close">X</button>';
        // $output .= '<div class="put-left close_style" id="5252" data-money="" >X</div>';
    }
    $output .= '<div class="title_blit" data-name="' . $class . '"><h5 >' . $string_title . '</h5></div>
                    <div class="row text-right select_item_border personDet" data-typeName="' . $class . '" personid="' . $count_passenger . '">
                        <div class="col-sm-12">
                            <button class="btn btn-default btnCustom btn-primary" id="ra1' . $count_passenger . '" onclick="radioBtn1(\'' . $count_passenger . '\',\'' . $class . '\');return false;">خرید با کد ملی</button>
                            <button class="btn btn-default btnCustom" id="ra2' . $count_passenger . '" onclick="radioBtn2(\'' . $count_passenger . '\',\'' . $class . '\');return false;">خرید با پاسپورت</button>
                        </div>
                        
                        <div id="info_' . $count_passenger . '">
                            <div class="col-sm-12 col-md-3">
                                <label for="name_latin">نام لاتین</label>
                                <input type="text" class="form-control" id="name_latin' . $count_passenger . '" name="name_latin' . $count_passenger . '" placeholder="Latin Name" required/>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <label for="surename_latin">نام خانوادگی لاتین</label>
                                <input type="text" class="form-control" id="surename_latin' . $count_passenger . '" name="surename_latin' . $count_passenger . '" placeholder="Latin Surname" required/>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <label for="name_farsi">نام</label>
                                <input type="text" class="form-control" id="name_farsi' . $count_passenger . '" name="name_farsi' . $count_passenger . '" placeholder="نام" required/>
                            </div>
                            <div class="col-sm-12 col-md-3">
                                <label for="surename_farsi">نام خانوادگی</label>
                                <input type="text" class="form-control" id="surename_farsi' . $count_passenger . '" name="surename_farsi' . $count_passenger . '" placeholder="نام خانوادگی" required/>
                            </div>
                            <div class="col-sm-12 col-md-2">
                                <label for="gender">جنسیت</label>
                                <select class="form-control" id="gender' . $count_passenger . '" name="gender' . $count_passenger . '" required>
                                    <option value="Male">مرد</option>
                                    <option value="Female">زن</option>
                                </select>
                            </div>
                            <div class="col-sm-12 col-md-2">
                                <label for="code_meli">کد ملی</label>
                                <input type="text" class="form-control" id="code_meli' . $count_passenger . '" name="code_meli' . $count_passenger . '" placeholder="کد ملی" min="100000000" max="9999999999" maxlength="10" required/>
                            </div>
                            <div class="col-sm-12 col-md-2">
                                <label for="meliat">ملیت</label>
                                <select class="form-control" id="meliat' . $count_passenger . '" name="meliat' . $count_passenger . '" required>
                                    <option value="iran">ایرانی</option>
                                    <option value="non-iran">غیر ایرانی</option>
                                </select>
                            </div>
                            <div class="col-sm-12 col-md-2">
                                <label for="birth_day">تاریخ تولد (روز)</label>
                                <!-- <input type="text" class="form-control" id="birth_day____________" min="1300" max="1450" placeholder="تاریخ تولد"/> -->
                                <select class="form-control" id="birth_day_shamsi_d' . $count_passenger . '" name="birth_day_shamsi_d' . $count_passenger . '" required>
                                    <option value="01">1</option>
                                    <option value="02">2</option>
                                    <option value="03">3</option>
                                    <option value="04">4</option>
                                    <option value="05">5</option>
                                    <option value="06">6</option>
                                    <option value="07">7</option>
                                    <option value="08">8</option>
                                    <option value="09">9</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                    <option value="13">13</option>
                                    <option value="14">14</option>
                                    <option value="15">15</option>
                                    <option value="16">16</option>
                                    <option value="17">17</option>
                                    <option value="18">18</option>
                                    <option value="19">19</option>
                                    <option value="20">20</option>
                                    <option value="21">21</option>
                                    <option value="22">22</option>
                                    <option value="23">23</option>
                                    <option value="24">24</option>
                                    <option value="25">25</option>
                                    <option value="26">26</option>
                                    <option value="27">27</option>
                                    <option value="28">28</option>
                                    <option value="29">29</option>
                                    <option value="30">30</option>
                                    <option value="31">31</option>
                                </select>
                            </div>
                            
                            <div class="col-sm-12 col-md-2">
                                <label for="birth_day_m">(ماه)</label>
                                <select class="form-control" id="birth_day_shamsi_m' . $count_passenger . '" name="birth_day_shamsi_m' . $count_passenger . '" required>
                                    <option value="01">فروردین</option>
                                    <option value="02">اردیبهشت</option>
                                    <option value="03">خرداد</option>
                                    <option value="04">تیر</option>
                                    <option value="05">مرداد</option>
                                    <option value="06">شهریور</option>
                                    <option value="07">مهر</option>
                                    <option value="08">آبان</option>
                                    <option value="09">آذر</option>
                                    <option value="10">دی</option>
                                    <option value="11">بهمن</option>
                                    <option value="12">اسفند</option>
                                </select>
                                
                            </div>
                            
                            <div class="col-sm-12 col-md-2">
                                <label for="birth_day_y">(سال)</label>
                                <input type="text" class="form-control" id="birth_day_shamsi_y' . $count_passenger . '" name="birth_day_shamsi_y' . $count_passenger . '" placeholder="سال" min="1300" max="1450" maxlength="4" required/>
                            </div>
                            
                        </div>
                    </div>
                </div>';

    echo $output;
}


?>


<?php get_footer(); ?>



<script language="javascript">
    // var x = [[1,1,501600],[0,2,1000],[1,1,30000],[1,3,50000]];

    $('#select_item').hide('fast');


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

        // $(".flip").click(function(){
        //     //$(this).attr("data-id")
        //     // alert('jjj');
        //     $("#panel").slideToggle("slow");
        // });

        // $(.flip).on('click', function(){
        //     var arr = $(this).attr("id");
        //     alert(arr);
        //     //var arr = [];
        //     //var num = <?php echo $count ?>;
        //     //for(i=1; i<=num;i++){
        //       //  arr.push(i);
        //      //   alert(arr);
        //     //}
        //     // category_list2.push(categoryplane);
        // });


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


    //////////////////////////////////////////////////////////////////////////////////////////////////




    var realpri;
    var adultpri;
    var childpri;
    var infantpri;
    var FlightID;
    var FlightType;
    var AirlineName;
    var AirlineCode;
    var AirlineLogo;
    var DepartureParentRegionName;
    var DepartureTime;
    var PersianDepartureDate;
    var ArrivalParentRegionName;
    var ArrivalTime;
    var FlightNo;
    var Capacity;
    var CabinType;

    var source = "<?php echo $_GET["from"]; ?>";
    var destination = "<?php echo $_GET["to"]; ?>";




    $('.entekhab_va_kharid').click(function() {

        // $.fancybox.open('<div class="message"><h4>منتظر بمانید</h4></div>');
        // setTimeout(function() { alert( "منتظر بمانید" ); }, 10000);

        // alert($(this).prop("id"));
        realpri = $(this).attr("data-adult");
        adultpri = $(this).attr("data-adult") * <?php echo $vadult ?>;
        childpri = $(this).attr("data-child") * <?php echo $vchild ?>;
        infantpri = $(this).attr("data-infant") * <?php echo $vinfant ?>;

        num_adult = <?php echo $vadult ?>;
        num_child = <?php echo $vchild ?>;
        num_infant = <?php echo $vinfant ?>;
        num_all = <?php echo $vadult ?> + <?php echo $vchild ?> + <?php echo $vinfant ?>;


        FlightID = $(this).prop("id");
        FlightType = $(this).attr("data-FlightType");
        AirlineName = $(this).attr("data-AirlineName");
        AirlineCode = $(this).attr("data-AirlineCode");
        AirlineLogo = $(this).attr("data-AirlineLogo");
        DepartureParentRegionName = $(this).attr("data-DepartureParentRegionName");
        DepartureTime = $(this).attr("data-DepartureTime");
        PersianDepartureDate = $(this).attr("data-PersianDepartureDate");
        ArrivalParentRegionName = $(this).attr("data-ArrivalParentRegionName");
        ArrivalTime = $(this).attr("data-ArrivalTime");
        FlightNo = $(this).attr("data-FlightNo");
        Capacity = $(this).attr("data-Capacity");
        CabinType = $(this).attr("data-CabinType");

        if (Capacity < num_all) {
            alert('این بلیط برای انتخاب شما مناسب نیست، به باقی مانده ظرفیت توجه کنید.');
            return;
        }


        // S E S I O N S
        sessionStorage.adultpri = adultpri;
        sessionStorage.childpri = childpri;
        sessionStorage.infantpri = infantpri;

        sessionStorage.num_adult = num_adult;
        sessionStorage.num_child = num_child;
        sessionStorage.num_infant = num_infant;
        sessionStorage.num_all = num_all;

        sessionStorage.adultSession = $(this).attr("data-adult");
        sessionStorage.childpriSession = $(this).attr("data-child");
        sessionStorage.infantpriSession = $(this).attr("data-infant");
        // alert(sessionStorage.adultSession);

        sessionStorage.FinalPrice = 0;


        $('#result').hide('fast');
        $('#filters').hide('fast');
        $('.sort').hide('fast');

        $("#select_item").css("display", "block");
        // $("#info").css("display","block");

        // $("#sum_real").html(realpri + '  ریال');
        // var addComma_adult = addComma(adultpri);
        // alert(addComma_adult);
        // var addComma_childpri = addComma(childpri);
        // var addComma_infantpri = addComma(infantpri);

        $("#sum_adult").html('<?php echo $vadult ?> بزرگسال:  ' + addComma(adultpri + '0') + '  ریال');
        $("#sum_child").html('<?php echo $vchild ?> کودک: ' + addComma(childpri + '0') + '  ریال');
        $("#sum_infant").html('<?php echo $vinfant ?> نوزاد:  ' + addComma(infantpri + '0') + '  ریال');

        var sumall = parseFloat(adultpri) + parseFloat(childpri) + parseFloat(infantpri);
        // $("#sum_all").html('کل مبلغ: ' + sumall);

        // var addComma_infantpri = addComma(sumall);
        $("#sum_all").val(addComma(sumall + '0'));

        sessionStorage.FinalPrice = sumall;

        $('#select_item').slideDown('fast');


        // infoEntekhabBOX(FlightID,FlightType,AirlineName,AirlineCode,AirlineLogo,DepartureParentRegionName,DepartureTime,PersianDepartureDate,ArrivalParentRegionName,ArrivalTime,FlightNo,Capacity,CabinType,realpri);
        $("#details").append(infoEntekhabBOX(FlightID, FlightType, AirlineName, AirlineCode, AirlineLogo, DepartureParentRegionName, DepartureTime, PersianDepartureDate, ArrivalParentRegionName, ArrivalTime, FlightNo, Capacity, CabinType, addComma(realpri + '0')));

        // alert(addComma(adultpri+'0'));
        $('html, body').animate({
            scrollTop: $('#details').offset().top - 20 //#DIV_ID is an example. Use the id of your destination on the page
        }, 'slow');
    });


    function addComma(str) {
        var objRegex = new RegExp('(-?[0-9]+)([0-9]{3})');

        while (objRegex.test(str)) {
            str = str.replace(objRegex, '$1,$2');
        }

        return str;
    }



    function infoEntekhabBOX(FlightID, FlightType, AirlineName, AirlineCode, AirlineLogo, DepartureParentRegionName, DepartureTime, PersianDepartureDate, ArrivalParentRegionName, ArrivalTime, FlightNo, Capacity, CabinType, realpri) {
        str_info = '';
        str_info += '<div class="col-12 card4 p-3 mt-2 data-price="300">';
        str_info += '<div class="row">';
        str_info += '<div class="col-sm-12 col-md-12 col-lg-2 col-xl-2 text-center">';
        str_info += '<img class="rounded-circle" src="' + AirlineLogo + '" style="height: 100px;">';
        str_info += '<p class="airlineName">' + AirlineName + '</p>';
        str_info += '</div>';
        str_info += '<div class="col-sm-12 col-md-12 col-lg-10 col-xl-8">';
        str_info += '<div class="row">';
        str_info += '<div class="destination-aircraft col-md-5 col-sm-6 text-right">';
        str_info += '<span>' + FlightType + '</span>';
        str_info += '</div>';
        str_info += '</div>';
        str_info += '<div class="destination-map row">';
        str_info += '<div class="destination-map__from pull-left col-3 col-sm-2 col-md-2 col-lg-2 col-xl-4">';
        str_info += '<div class="form-inline text-center">';
        str_info += '<strong class="from">' + DepartureParentRegionName + '</strong>';
        str_info += '<strong class="time">' + DepartureTime + '</strong>';
        str_info += '<strong class="sortclock" style="display: none">0500</strong>';
        str_info += '</div>';
        str_info += '</div>';
        str_info += '<div class="destination-map__airicon col-6 col-sm-8 col-md-8 col-lg-8 col-xl-4">';
        str_info += '<span class="airline-time d-block">' + PersianDepartureDate + '</span>';
        str_info += '<i class="icon fas fa-plane fa-flip-horizontal fa-flip-vertical"></i>';
        str_info += '</div>';
        str_info += '<div class="destination-map__to pull-left col-3 col-sm-2 col-md-2 col-lg-2 col-xl-4">';
        str_info += '<strong class="to">' + ArrivalParentRegionName + '</strong>';
        str_info += '<strong class="time">' + ArrivalTime + '</strong>';
        str_info += '</div>';
        str_info += '</div>';
        str_info += '<div class="row">';
        str_info += '<div class="col-sm-12 col-md-12 col-lg-12 col-xl-12 mt-2" style="text-align: center !important;vertical-align: baseline;margin: auto;font-size: 15px;">';
        // str_info += '<div id="sflip">اطلاعات بیشتر</div>';
        str_info += '<div id="spanel" class="spanel">';
        str_info += '<ul class="nav nav-tabs" id="myTab" role="tablist">';
        str_info += '<li class="nav-item">';
        str_info += '<a class="nav-link active" id="rules-tab" data-toggle="tab" href="#rules" role="tab" aria-controls="rules" aria-selected="true">اطلاعات پرواز</a>';
        str_info += '</li>';
        str_info += '<li class="nav-item">';
        str_info += '<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">قوانین جریمه استرداد</a>';
        str_info += '</li>';
        str_info += '</ul>';
        str_info += '<div class="tab-content col-sm-12 col-md-12 col-lg-12 col-xl-12" id="myTabContent" style="text-align: center !important;vertical-align: baseline;margin: auto;font-size: 15px;">';
        str_info += '<div class="tab-pane fade show active" id="rules" role="tabpanel" aria-labelledby="rules-tab">';
        str_info += '<div class="text-right p-2 tab-information">';
        str_info += '<p class="airlineNumber">شماره پرواز: ' + FlightNo + '</p>';
        str_info += '<p class="airlinCabinType">کلاس نرخی: ' + CabinType + '</p>';
        str_info += '<!--<p>مقدار بار مجاز : 20 کیلوگر</p>-->';
        str_info += '</div>';
        str_info += '</div>';
        str_info += '<div class="tab-pane fade " id="profile" role="tabpanel" aria-labelledby="profile-tab">';
        str_info += '<table class="table table-light tab-information">';
        str_info += '<thead>';
        str_info += '<tr>';
        str_info += '<th scope="col">' + FlightNo + '</th>';
        str_info += '<!--<th scope="col">از 1 روز قبل از پرواز به بعد</th>-->';
        str_info += '</tr>';
        str_info += '</thead>';
        str_info += '<tbody>';
        str_info += '<tr>';
        str_info += '<td scope="row">20%</td>';
        str_info += '<!--<th scope="row">40%</th>-->';
        str_info += '</tr>';
        str_info += '</tbody>';
        str_info += '</table>';
        str_info += '</div>';
        str_info += '</div>';
        str_info += '</div>';
        str_info += '</div>';
        str_info += '</div>';
        str_info += '</div>';
        str_info += '<div class="col-sm-12 col-md-12 col-lg-2 col-xl-2 text-center" style="text-align: center !important;vertical-align: baseline;margin: auto;font-size: 15px;">';
        str_info += '<p class="text-center mt-2 price-card price" id="Price">' + realpri + ' ریال</p>';
        str_info += '<p class="text-center mt-2">' + Capacity + ' صندلی باقی مانده </p>';
        str_info += '</div>';
        str_info += '</div>';
        str_info += '</div>';

        return str_info;
    }























    sessionStorage.count1 = 0;
    sessionStorage.count2 = 0;
    sessionStorage.count3 = 0;

    sessionStorage.countAdd1 = 0;
    sessionStorage.countAdd2 = 0;
    sessionStorage.countAdd3 = 0;

    // sessionStorage.test1 = 0;


    function closeBOX(x, model) {

        // sessionStorage.num_adult = num_adult;
        // sessionStorage.num_child = num_child;
        // sessionStorage.num_infant = num_infant;
        // sessionStorage.num_all = num_all;


        var adultpri_remove;
        var child_remove;
        var infant_remove;
        var sum_all = 0;

        if (model == "Adlt") {
            adultpri_remove = sessionStorage.adultpri - sessionStorage.adultSession;
            sum_all = sum_all + adultpri_remove;
            sessionStorage.adultpri = adultpri_remove;
            sessionStorage.count1++;
            sessionStorage.num_adult--;
            sessionStorage.num_all--;
            $("#titleAdlt").text((sessionStorage.num_adult) + ' بزرگسال');
            $("#sum_adult").html((sessionStorage.num_adult) + ' بزرگسال:  ' + addComma(adultpri_remove + '0') + '  ریال');
            // $("#" + x).html('');
            $("#" + x).remove();
        }

        if (model == "Chd") {
            child_remove = sessionStorage.childpri - sessionStorage.childpriSession;
            // sum_all = sum_all + child_remove;
            sessionStorage.childpri = child_remove;
            sessionStorage.count2++;
            sessionStorage.num_child--;
            sessionStorage.num_all--;
            $("#titleChd").text((sessionStorage.num_child) + ' کودک');
            $("#sum_child").html((sessionStorage.num_child) + ' کودک:  ' + addComma(child_remove + '0') + '  ریال');
            // $("#" + x).html('');
            $("#" + x).remove();
        }

        if (model == "Infa") {
            infant_remove = sessionStorage.infantpri - sessionStorage.infantpriSession;
            // sum_all = sum_all + infant_remove;
            sessionStorage.infantpri = infant_remove;
            sessionStorage.count3++;
            sessionStorage.num_infant--;
            sessionStorage.num_all--;
            $("#titleInfa").text((sessionStorage.num_infant) + ' نوزاد');
            $("#sum_infant").html((sessionStorage.num_infant) + ' نوزاد:  ' + addComma(infant_remove + '0') + '  ریال');
            // $("#" + x).html('');
            $("#" + x).remove();
        }

        var a = parseFloat(sessionStorage.adultpri);
        var b = parseFloat(sessionStorage.childpri);
        var c = parseFloat(sessionStorage.infantpri);
        sum_all = a + b + c;
        sessionStorage.FinalPrice = sum_all;
        // alert(sum_all);
        // $("#sum_all").html('کل مبلغ: ' + sum_all);
        $("#sum_all").val(addComma(sum_all + '0'));

    }

    // $('.close_style').click(function(){
    //     // $(this).prop('id', sessionStorage.adultSession);
    //     // prev('li').prop('id', 'newId');
    //     // $(this).next().data("name")
    //     // alert($(this).next().data("name"));
    //     alert($(this).prop('id'));
    //     var adultpri_remove;
    //     var child_remove;
    //     var infant_remove;
    //     var sum_all = 0;

    //     if($(this).next().data("name") == "Adlt"){
    //         $(this).parent().remove();   
    //     }

    //     if($(this).next().data("name") == "Chd"){
    //         $(this).parent().remove();
    //     }

    //     if($(this).next().data("name") == "Infa"){
    //         $(this).parent().remove();
    //     }

    //     var a = parseFloat(sessionStorage.adultpri);
    //     var b = parseFloat(sessionStorage.childpri);
    //     var c = parseFloat(sessionStorage.infantpri);
    //     sum_all = a + b + c;
    //     // alert(sum_all);
    //     $("#sum_all").html('کل مبلغ: ' + sum_all);
    // });





    function radioBtn1(x, information) {
        $("#ra1" + x).addClass('btn-primary');
        $("#ra2" + x).removeClass('btn-primary');
        $("#info_" + x).html('');
        $("#info_" + x).html(rd1(x));
        // $("#ra1"+x).attr("checked","checked");
        // $("#ra2"+x).prop("checked",false);
        // $("#ra1"+x).prop("checked",true);
    }

    function radioBtn2(x, information) {
        $("#ra2" + x).addClass('btn-primary');
        $("#ra1" + x).removeClass('btn-primary');
        $("#info_" + x).html('');
        $("#info_" + x).html(rd2(x));
        // $("#ra1"+x).prop("checked",false);
        // $("#ra2"+x).prop("checked",true);
        // $("#ra2"+x).attr("checked","checked");
    }



    function rd1(w1) {
        var option2 = 0;
        var str_id = 'passenger-';

        str1 = '';
        str1 += '<div class="col-sm-12 col-md-3">';
        str1 += '<label for="name_latin' + w1 + '">نام لاتین</label>';
        str1 += '<input type="text" class="form-control" id="name_latin' + w1 + '" name="name_latin' + w1 + '" placeholder="Latin Name" required/>';
        str1 += '</div>';
        str1 += '<div class="col-sm-12 col-md-3">';
        str1 += '<label for="surename_latin' + w1 + '">نام خانوادگی لاتین</label>';
        str1 += '<input type="text" class="form-control" id="surename_latin' + w1 + '" name="surename_latin' + w1 + '" placeholder="Latin Surname" required/>';
        str1 += '</div>';
        str1 += '<div class="col-sm-12 col-md-3">';
        str1 += '<label for="name_farsi' + w1 + '">نام</label>';
        str1 += '<input type="text" class="form-control" id="name_farsi' + w1 + '" name="name_farsi' + w1 + '" placeholder="نام" required/>';
        str1 += '</div>';
        str1 += '<div class="col-sm-12 col-md-3">';
        str1 += '<label for="surename_farsi' + w1 + '">نام خانوادگی</label>';
        str1 += '<input type="text" class="form-control" id="surename_farsi' + w1 + '" name="surename_farsi' + w1 + '" placeholder="نام خانوادگی" required/>';
        str1 += '</div>';
        str1 += '<div class="col-sm-12 col-md-2">';
        str1 += '<label for="gender' + w1 + '">جنسیت</label>';
        str1 += '<select class="form-control" id="gender' + w1 + '" name="gender' + w1 + '" required>';
        str1 += '<option value="Male">مرد</option>';
        str1 += '<option value="Female">زن</option>';
        str1 += '</select>';
        str1 += '</div>';
        str1 += '<div class="col-sm-12 col-md-2">';
        str1 += '<label for="code_meli' + w1 + '">کد ملی</label>';
        str1 += '<input type="text" class="form-control" id="code_meli' + w1 + '" name="code_meli' + w1 + '" placeholder="کد ملی" min="100000000" max="9999999999" maxlength="10" required/>';
        str1 += '</div>';
        str1 += '<div class="col-sm-12 col-md-2">';
        str1 += '<label for="meliat' + w1 + '">ملیت</label>';
        str1 += '<select class="form-control" id="meliat' + w1 + '" name="meliat' + w1 + '" required>';
        str1 += '<option value="iran">ایرانی</option>';
        str1 += '<option value="non-iran">غیر ایرانی</option>';
        str1 += '</select>';
        str1 += '</div>';
        // str1 +='<div class="col-sm-12 col-md-3">';
        // str1 +=   '<label for="birth_day'+w1+'">تاریخ تولد</label>';
        // str1 +=   '<input type="text" class="form-control" id="birth_day'+w1+'" placeholder="تاریخ تولد"/>';
        // str1 +='</div>';
        str1 += '<div class="col-sm-12 col-md-2">';
        str1 += '<label for="birth_day_shamsi_d' + w1 + '">تاریخ تولد (شمسی)</label>';
        str1 += '<select class="form-control" id="birth_day_shamsi_d' + w1 + '" name="birth_day_shamsi_d' + w1 + '" required>';
        str1 += '<option value="01">1</option>';
        str1 += '<option value="02">2</option>';
        str1 += '<option value="03">3</option>';
        str1 += '<option value="04">4</option>';
        str1 += '<option value="05">5</option>';
        str1 += '<option value="06">6</option>';
        str1 += '<option value="07">7</option>';
        str1 += '<option value="08">8</option>';
        str1 += '<option value="09">9</option>';
        str1 += '<option value="10">10</option>';
        str1 += '<option value="11">11</option>';
        str1 += '<option value="12">12</option>';
        str1 += '<option value="13">13</option>';
        str1 += '<option value="14">14</option>';
        str1 += '<option value="15">15</option>';
        str1 += '<option value="16">16</option>';
        str1 += '<option value="17">17</option>';
        str1 += '<option value="18">18</option>';
        str1 += '<option value="19">19</option>';
        str1 += '<option value="20">20</option>';
        str1 += '<option value="21">21</option>';
        str1 += '<option value="22">22</option>';
        str1 += '<option value="23">23</option>';
        str1 += '<option value="24">24</option>';
        str1 += '<option value="25">25</option>';
        str1 += '<option value="26">26</option>';
        str1 += '<option value="27">27</option>';
        str1 += '<option value="28">28</option>';
        str1 += '<option value="29">29</option>';
        str1 += '<option value="30">30</option>';
        str1 += '<option value="31">31</option>';
        str1 += '</select>';
        str1 += '</div>';
        str1 += '<div class="col-sm-12 col-md-2">';
        str1 += '<label for="birth_day_shamsi_m' + w1 + '">(ماه)</label>';
        str1 += '<select class="form-control" id="birth_day_shamsi_m' + w1 + '" name="birth_day_shamsi_m' + w1 + '" required>';
        str1 += '<option value="01">فروردین</option>';
        str1 += '<option value="02">اردیبهشت</option>';
        str1 += '<option value="03">خرداد</option>';
        str1 += '<option value="04">تیر</option>';
        str1 += '<option value="05">مرداد</option>';
        str1 += '<option value="06">شهریور</option>';
        str1 += '<option value="07">مهر</option>';
        str1 += '<option value="08">آبان</option>';
        str1 += '<option value="09">آذر</option>';
        str1 += '<option value="10">دی</option>';
        str1 += '<option value="11">بهمن</option>';
        str1 += '<option value="12">اسفند</option>';
        str1 += '</select>';
        str1 += '</div>';
        str1 += '<div class="col-sm-12 col-md-2">';
        str1 += '<label for="birth_day_shamsi_y' + w1 + '">سال</label>';
        str1 += '<input type="text" class="form-control" id="birth_day_shamsi_y' + w1 + '" name="birth_day_shamsi_y' + w1 + '" placeholder="سال" min="1300" max="1450" maxlength="4" required/>';
        str1 += '</div>';

        return str1;
    }

    function rd2(w1) {
        var option2 = 0;
        var str_id = 'passenger-';

        str2 = '';
        str2 += '<div class="col-sm-12 col-md-2">';
        str2 += '<label for="name_latin' + w1 + '">نام لاتین</label>';
        str2 += '<input type="text" class="form-control" id="name_latin' + w1 + '" name="name_latin' + w1 + '" placeholder="Latin Name" required/>';
        str2 += '</div>';
        str2 += '<div class="col-sm-12 col-md-2">';
        str2 += '<label for="surename_latin' + w1 + '">نام خانوادگی لاتین</label>';
        str2 += '<input type="text" class="form-control" id="surename_latin' + w1 + '" name="surename_latin' + w1 + '" placeholder="Latin Surname" required/>';
        str2 += '</div>';
        str2 += '<div class="col-sm-12 col-md-2">';
        str2 += '<label for="gender' + w1 + '">جنسیت (Gender)</label>';
        str2 += '<select class="form-control" id="gender' + w1 + '" name="gender' + w1 + '" required>';
        str2 += '<option value="Male">Male</option>';
        str2 += '<option value="Female">Female</option>';
        str2 += '</select>';
        str2 += '</div>';
        str2 += '<div class="col-sm-12 col-md-2">';
        str2 += '<label for="birth_day_miladi_d' + w1 + '">تاریخ تولد (میلادی)</label>';
        str2 += '<select class="form-control" id="birth_day_miladi_d' + w1 + '" name="birth_day_miladi_d' + w1 + '" required>';
        str2 += '<option value="01">1</option>';
        str2 += '<option value="02">2</option>';
        str2 += '<option value="03">3</option>';
        str2 += '<option value="04">4</option>';
        str2 += '<option value="05">5</option>';
        str2 += '<option value="06">6</option>';
        str2 += '<option value="07">7</option>';
        str2 += '<option value="08">8</option>';
        str2 += '<option value="09">9</option>';
        str2 += '<option value="10">10</option>';
        str2 += '<option value="11">11</option>';
        str2 += '<option value="12">12</option>';
        str2 += '<option value="13">13</option>';
        str2 += '<option value="14">14</option>';
        str2 += '<option value="15">15</option>';
        str2 += '<option value="16">16</option>';
        str2 += '<option value="17">17</option>';
        str2 += '<option value="18">18</option>';
        str2 += '<option value="19">19</option>';
        str2 += '<option value="20">20</option>';
        str2 += '<option value="21">21</option>';
        str2 += '<option value="22">22</option>';
        str2 += '<option value="23">23</option>';
        str2 += '<option value="24">24</option>';
        str2 += '<option value="25">25</option>';
        str2 += '<option value="26">26</option>';
        str2 += '<option value="27">27</option>';
        str2 += '<option value="28">28</option>';
        str2 += '<option value="29">29</option>';
        str2 += '<option value="30">30</option>';
        str2 += '<option value="31">31</option>';
        str2 += '</select>';
        str2 += '</div>';
        str2 += '<div class="col-sm-12 col-md-2">';
        str2 += '<label for="birth_day_miladi_m' + w1 + '">(ماه)</label>';
        str2 += '<select class="form-control" id="birth_day_miladi_m' + w1 + '" name="birth_day_miladi_m' + w1 + '" required>';
        str2 += '<option value="01">Jan</option>';
        str2 += '<option value="02">Feb</option>';
        str2 += '<option value="03">Mar</option>';
        str2 += '<option value="04">Apr</option>';
        str2 += '<option value="05">May</option>';
        str2 += '<option value="06">Jun</option>';
        str2 += '<option value="07">Jul</option>';
        str2 += '<option value="08">Aug</option>';
        str2 += '<option value="09">Sep</option>';
        str2 += '<option value="10">Oct</option>';
        str2 += '<option value="11">Nov</option>';
        str2 += '<option value="12">Dec</option>';
        str2 += '</select>';
        str2 += '</div>';
        str2 += '<div class="col-sm-12 col-md-2">';
        str2 += '<label for="birth_day_miladi_y' + w1 + '">سال</label>';
        str2 += '<input type="text" class="form-control" id="birth_day_miladi_y' + w1 + '" name="birth_day_miladi_y' + w1 + '" placeholder="Year" min="1900" max="2450" maxlength="4" required/>';
        str2 += '</div>';

        str2 += '<div class="col-sm-12 col-md-2">';
        str2 += '<label for="birth_day_country' + w1 + '">کشور محل تولد (Birthday Place)</label>';
        str2 += '<select class="form-control" id="birth_day_country' + w1 + '" name="birth_day_country' + w1 + '" required>';
        str2 += '           <option value="IRN">ایران</option>';
        str2 += '           <option value="AZE">آذربایجان</option>';
        str2 += '            <option value="ARG">آرژانتین</option>';
        str2 += '            <option value="ABW">آروبا</option>';
        str2 += '            <option value="ZAF">آفریقا جنوبی</option>';
        str2 += '            <option value="CAF">آفریقای مرکزی</option>';
        str2 += '            <option value="ALB">لبانی</option>';
        str2 += '            <option value="DEU">آلمان</option>';
        str2 += '            <option value="ATG">آنتیگوا و باربودا</option>';
        str2 += '           <option value="BES">آنتیل هلند</option>';
        str2 += '            <option value="AND">آندورا</option>';
        str2 += '            <option value="AGO">آنگولا</option>';
        str2 += '            <option value="AIA">نگویلا</option>';
        str2 += '            <option value="AUT">اتریش</option>';
        str2 += '            <option value="ETH">اتیوپی</option>';
        str2 += '            <option value="JOR">اردن</option>';
        str2 += '            <option value="ARM">ارمنستان</option>';
        str2 += '            <option value="URY">اروگوئه</option>';
        str2 += '            <option value="ERI">اریتره</option>';
        str2 += '            <option value="UZB">ازبکستان</option>';
        str2 += '            <option value="ESP">اسپانیا</option>';
        str2 += '            <option value="AUS">استرالیا</option>';
        str2 += '            <option value="EST">استونی</option>';
        str2 += '            <option value="SVK">اسلواکی</option>';
        str2 += '            <option value="SVN">سلوونی</option>';
        str2 += '            <option value="AFG">افغانستان</option>';
        str2 += '            <option value="ECU">اکوادور</option>';
        str2 += '            <option value="DZA">الجزایر</option>';
        str2 += '            <option value="SLV">السالوادور</option>';
        str2 += '            <option value="ARE">امارات متحده عربی</option>';
        str2 += '            <option value="IDN">اندونزی</option>';
        str2 += '            <option value="GBR">انگلستان</option>';
        str2 += '            <option value="UKR">اوکراین</option>';
        str2 += '            <option value="UGA">اوگاندا</option>';
        str2 += '            <option value="FSM">ایالات فدرال میکرونزی</option>';
        str2 += '            <option value="USA">ایالات متحده</option>';
        str2 += '            <option value="UMI">ایالات متحده جزایر کوچک حاشیهای</option>';
        str2 += '            <option value="ITA">ایتالیا</option>';
        str2 += '            <option value="ISL">ایسلند</option>';
        str2 += '            <option value="BRB">باربادوس</option>';
        str2 += '            <option value="BHS">باهاما</option>';
        str2 += '            <option value="BHR">بحرین</option>';
        str2 += '            <option value="BRA">برزیل</option>';
        str2 += '            <option value="BMU">برمودا</option>';
        str2 += '            <option value="BRN">برونئی</option>';
        str2 += '            <option value="BLR">بلاروس</option>';
        str2 += '            <option value="BEL">بلژیک</option>';
        str2 += '            <option value="BGR">بلغارستان</option>';
        str2 += '            <option value="BLZ">بلیز</option>';
        str2 += '            <option value="BGD">بنگلادش</option>';
        str2 += '            <option value="BEN">بنین</option>';
        str2 += '            <option value="BWA">بوتسوانا</option>';
        str2 += '            <option value="BFA">بورکینافاسو</option>';
        str2 += '            <option value="BDI">بوروندی</option>';
        str2 += '            <option value="BIH">بوسنی و هرزگوین</option>';
        str2 += '            <option value="BOL">بولیوی</option>';
        str2 += '            <option value="BTN">پادشاهی بوتان</option>';
        str2 += '            <option value="PRY">پاراگوئه</option>';
        str2 += '            <option value="PAK">پاکستان</option>';
        str2 += '            <option value="PLW">پالائو</option>';
        str2 += '            <option value="PAN">پاناما</option>';
        str2 += '            <option value="PRT">پرتغال</option>';
        str2 += '            <option value="PER">پرو</option>';
        str2 += '            <option value="PYF">پلینزی فرانسه</option>';
        str2 += '            <option value="PRI">پورتوریکو</option>';
        str2 += '            <option value="TJK">تاجیکستان</option>';
        str2 += '            <option value="TZA">تانزانیا</option>';
        str2 += '            <option value="THA">تایلند</option>';
        str2 += '            <option value="TWN">تایوان</option>';
        str2 += '            <option value="TKM">ترکمنستان</option>';
        str2 += '            <option value="TUR">ترکیه</option>';
        str2 += '            <option value="CCK">ترینیداد و توباگو</option>';
        str2 += '            <option value="TTO">ترینیداد و توباگو</option>';
        str2 += '            <option value="TGO">توگو</option>';
        str2 += '            <option value="TUN">تونس</option>';
        str2 += '            <option value="TON">تونگا</option>';
        str2 += '            <option value="TUV">تووالو</option>';
        str2 += '            <option value="TLS">تیمور شرقی</option>';
        str2 += '            <option value="JAM">جامائیکا</option>';
        str2 += '            <option value="GIB">جبل الطارق</option>';
        str2 += '            <option value="TCA">جزایر ترک و کایکوس</option>';
        str2 += '            <option value="SLB">جزایر سلیمان</option>';
        str2 += '            <option value="FLK">جزایر فالکلند (مالویناس)</option>';
        str2 += '            <option value="FJI">جزایر فیجی</option>';
        str2 += '            <option value="COK">جزایر کوک</option>';
        str2 += '            <option value="CYM">جزایر کیمن</option>';
        str2 += '            <option value="MHL">جزایر مارشال</option>';
        str2 += '            <option value="MNP">جزایر ماریانای شمالی</option>';
        str2 += '            <option value="WLF">جزایر والیس و فوتونا</option>';
        str2 += '            <option value="VIR">جزایر ویرجین (آمریکا)</option>';
        str2 += '            <option value="VGB">جزایر ویرجین (بریتانیا)</option>';
        str2 += '            <option value="GLP">جزیره گوادلوپ</option>';
        str2 += '            <option value="IRL">جمهوری ایرلند</option>';
        str2 += '            <option value="CZE">جمهوری چک</option>';
        str2 += '            <option value="DOM">جمهوری دومینیکن</option>';
        str2 += '            <option value="DJI">جیبوتی</option>';
        str2 += '            <option value="TCD">چاد</option>';
        str2 += '            <option value="CHN">چین</option>';
        str2 += '            <option value="DNK">دانمارک</option>';
        str2 += '            <option value="DMA">دومینیکا</option>';
        str2 += '            <option value="RWA">رواندا</option>';
        str2 += '            <option value="RUS">روسیه</option>';
        str2 += '            <option value="ROU">رومانی</option>';
        str2 += '            <option value="REU">ریونیون</option>';
        str2 += '            <option value="ZMB">زامبیا</option>';
        str2 += '            <option value="ZWE">زیمباوه</option>';
        str2 += '            <option value="JPN">ژاپن</option>';
        str2 += '            <option value="STP">سائوتومه و پرینسیپ</option>';
        str2 += '            <option value="CIV">ساحل عاج</option>';
        str2 += '            <option value="WSM">ساموآ</option>';
        str2 += '            <option value="ASM">ساموآ آمریکا</option>';
        str2 += '            <option value="LKA">سریلانکا</option>';
        str2 += '            <option value="SPM">سنت پیر و میکلون</option>';
        str2 += '            <option value="KNA">سنت کیتس و نویس</option>';
        str2 += '            <option value="LCA">سنت لوسیا</option>';
        str2 += '            <option value="SHN">سنت هلن</option>';
        str2 += '            <option value="VCT">سنت وینسنت و گرنادین</option>';
        str2 += '            <option value="SGP">سنگاپور</option>';
        str2 += '            <option value="SEN">سنگال</option>';
        str2 += '            <option value="SWE">سوئد</option>';
        str2 += '            <option value="CHE">سوئیس</option>';
        str2 += '            <option value="SWZ">سوازیلند</option>';
        str2 += '            <option value="SDN">سودان</option>';
        str2 += '            <option value="SUR">سورینام</option>';
        str2 += '            <option value="SYR">سوریه</option>';
        str2 += '            <option value="SOM">سومالی</option>';
        str2 += '            <option value="SLE">سیرالئون</option>';
        str2 += '            <option value="SYC">سیشل</option>';
        str2 += '            <option value="CHL">شیلی</option>';
        str2 += '            <option value="SRB">صربستان</option>';
        str2 += '            <option value="IRQ">عراق</option>';
        str2 += '            <option value="SAU">عربستان سعودی</option>';
        str2 += '            <option value="OMN">عمان</option>';
        str2 += '            <option value="GHA">غنا</option>';
        str2 += '            <option value="FRA">فرانسه</option>';
        str2 += '            <option value="FIN">فنلاند</option>';
        str2 += '            <option value="PHL">فیلیپین</option>';
        str2 += '            <option value="CYP">قبرس</option>';
        str2 += '            <option value="KGZ">قرقیزستان</option>';
        str2 += '            <option value="KAZ">قزاقستان</option>';
        str2 += '            <option value="ATA">قطب جنوب</option>';
        str2 += '            <option value="QAT">قطر</option>';
        str2 += '            <option value="CRI">کاستاریکا</option>';
        str2 += '            <option value="NCL">کالدونیای جدید</option>';
        str2 += '            <option value="KHM">کامبوج</option>';
        str2 += '            <option value="CMR">کامرون</option>';
        str2 += '            <option value="CAN">کانادا</option>';
        str2 += '            <option value="KOR">کره جنوبی</option>';
        str2 += '            <option value="HRV">کرواسی</option>';
        str2 += '            <option value="COL">کلمبیا</option>';
        str2 += '            <option value="COG">کنگو</option>';
        str2 += '            <option value="COD">کنگو، جمهوری دمکراتیک</option>';
        str2 += '            <option value="KEN">نیا</option>';
        str2 += '            <option value="CUB">کوبا</option>';
        str2 += '            <option value="COM">کومور</option>';
        str2 += '            <option value="KWT">کویت</option>';
        str2 += '            <option value="CPV">کیپ ورد</option>';
        str2 += '            <option value="KIR">کیریباتی</option>';
        str2 += '            <option value="GAB">گابون</option>';
        str2 += '            <option value="GMB">گامبیا</option>';
        str2 += '            <option value="GEO">گرجستان</option>';
        str2 += '            <option value="GRD">گرنادا</option>';
        str2 += '            <option value="GRL">گرینلند</option>';
        str2 += '            <option value="GTM">واتمالا</option>';
        str2 += '            <option value="GUY">گویان</option>';
        str2 += '            <option value="GUF">گویان فرانسه</option>';
        str2 += '            <option value="GIN">گینه</option>';
        str2 += '            <option value="GNQ">گینه استوایی</option>';
        str2 += '            <option value="GNB">گینه بیسائو</option>';
        str2 += '            <option value="PNG">گینه جدید</option>';
        str2 += '            <option value="LAO">لائوس</option>';
        str2 += '            <option value="LBN">لبنان</option>';
        str2 += '            <option value="LVA">لتونی</option>';
        str2 += '            <option value="LSO">لسوتو</option>';
        str2 += '            <option value="POL">لهستان</option>';
        str2 += '            <option value="LUX">لوکزامبورگ</option>';
        str2 += '            <option value="LBR">لیبریا</option>';
        str2 += '            <option value="LBY">لیبی</option>';
        str2 += '            <option value="LTU">لیتوانی</option>';
        str2 += '            <option value="MDG">ماداگاسکار</option>';
        str2 += '            <option value="MTQ">مارتینیک</option>';
        str2 += '            <option value="MAC">ماکائو</option>';
        str2 += '            <option value="MWI">مالاوی</option>';
        str2 += '            <option value="MLT">مالت</option>';
        str2 += '            <option value="MDV">مالـــدیـــو</option>';
        str2 += '            <option value="MYS">مالزی</option>';
        str2 += '            <option value="MLI">مالی</option>';
        str2 += '            <option value="HUN">مجارستان</option>';
        str2 += '            <option value="MAR">مراکش</option>';
        str2 += '            <option value="EGY">مصر</option>';
        str2 += '            <option value="MNG">مغولستان</option>';
        str2 += '            <option value="MKD">مقدونیه</option>';
        str2 += '            <option value="MEX">مکزیک</option>';
        str2 += '            <option value="MRT">موریتانی</option>';
        str2 += '            <option value="MUS">موریس</option>';
        str2 += '            <option value="MOZ">موزامبیک</option>';
        str2 += '            <option value="MDA">مولداوی</option>';
        str2 += '            <option value="MSR">مونتسرات</option>';
        str2 += '            <option value="MNE">مونته نگرو</option>';
        str2 += '            <option value="MMR">میانمار</option>';
        str2 += '            <option value="NRU">نائورو</option>';
        str2 += '            <option value="NAM">نامیبیا</option>';
        str2 += '            <option value="NPL">نپال</option>';
        str2 += '            <option value="NOR">نروژ</option>';
        str2 += '            <option value="NER">نیجر</option>';
        str2 += '            <option value="NGA">نیجریه</option>';
        str2 += '            <option value="NIC">نیکاراگوئه</option>';
        str2 += '            <option value="NZL">نیوزیلند</option>';
        str2 += '            <option value="NIU">نیووی</option>';
        str2 += '            <option value="HTI">هائیتی</option>';
        str2 += '            <option value="NLD">هلند</option>';
        str2 += '            <option value="IND">هند</option>';
        str2 += '            <option value="HND">هندوراس</option>';
        str2 += '            <option value="HKG">هنگ کنگ</option>';
        str2 += '            <option value="VUT">وانواتو</option>';
        str2 += '            <option value="VEN">ونزوئلا</option>';
        str2 += '            <option value="VNM">ویتنام</option>';
        str2 += '            <option value="YEM">یمن</option>';
        str2 += '            <option value="GRC">یونان</option>';
        str2 += '</select>';
        str2 += '</div>';
        str2 += '<div class="col-sm-12 col-md-2">';
        str2 += '<label for="issue_country' + w1 + '">کشور صادر کننده پاسپورت (Issuing Passport)</label>';
        str2 += '<select class="form-control" id="issue_country' + w1 + '" name="issue_country' + w1 + '" required>';
        str2 += '           <option value="IRN">ایران</option>';
        str2 += '           <option value="AZE">آذربایجان</option>';
        str2 += '            <option value="ARG">آرژانتین</option>';
        str2 += '            <option value="ABW">آروبا</option>';
        str2 += '            <option value="ZAF">آفریقا جنوبی</option>';
        str2 += '            <option value="CAF">آفریقای مرکزی</option>';
        str2 += '            <option value="ALB">لبانی</option>';
        str2 += '            <option value="DEU">آلمان</option>';
        str2 += '            <option value="ATG">آنتیگوا و باربودا</option>';
        str2 += '           <option value="BES">آنتیل هلند</option>';
        str2 += '            <option value="AND">آندورا</option>';
        str2 += '            <option value="AGO">آنگولا</option>';
        str2 += '            <option value="AIA">نگویلا</option>';
        str2 += '            <option value="AUT">اتریش</option>';
        str2 += '            <option value="ETH">اتیوپی</option>';
        str2 += '            <option value="JOR">اردن</option>';
        str2 += '            <option value="ARM">ارمنستان</option>';
        str2 += '            <option value="URY">اروگوئه</option>';
        str2 += '            <option value="ERI">اریتره</option>';
        str2 += '            <option value="UZB">ازبکستان</option>';
        str2 += '            <option value="ESP">اسپانیا</option>';
        str2 += '            <option value="AUS">استرالیا</option>';
        str2 += '            <option value="EST">استونی</option>';
        str2 += '            <option value="SVK">اسلواکی</option>';
        str2 += '            <option value="SVN">سلوونی</option>';
        str2 += '            <option value="AFG">افغانستان</option>';
        str2 += '            <option value="ECU">اکوادور</option>';
        str2 += '            <option value="DZA">الجزایر</option>';
        str2 += '            <option value="SLV">السالوادور</option>';
        str2 += '            <option value="ARE">امارات متحده عربی</option>';
        str2 += '            <option value="IDN">اندونزی</option>';
        str2 += '            <option value="GBR">انگلستان</option>';
        str2 += '            <option value="UKR">اوکراین</option>';
        str2 += '            <option value="UGA">اوگاندا</option>';
        str2 += '            <option value="FSM">ایالات فدرال میکرونزی</option>';
        str2 += '            <option value="USA">ایالات متحده</option>';
        str2 += '            <option value="UMI">ایالات متحده جزایر کوچک حاشیهای</option>';
        str2 += '            <option value="ITA">ایتالیا</option>';
        str2 += '            <option value="ISL">ایسلند</option>';
        str2 += '            <option value="BRB">باربادوس</option>';
        str2 += '            <option value="BHS">باهاما</option>';
        str2 += '            <option value="BHR">بحرین</option>';
        str2 += '            <option value="BRA">برزیل</option>';
        str2 += '            <option value="BMU">برمودا</option>';
        str2 += '            <option value="BRN">برونئی</option>';
        str2 += '            <option value="BLR">بلاروس</option>';
        str2 += '            <option value="BEL">بلژیک</option>';
        str2 += '            <option value="BGR">بلغارستان</option>';
        str2 += '            <option value="BLZ">بلیز</option>';
        str2 += '            <option value="BGD">بنگلادش</option>';
        str2 += '            <option value="BEN">بنین</option>';
        str2 += '            <option value="BWA">بوتسوانا</option>';
        str2 += '            <option value="BFA">بورکینافاسو</option>';
        str2 += '            <option value="BDI">بوروندی</option>';
        str2 += '            <option value="BIH">بوسنی و هرزگوین</option>';
        str2 += '            <option value="BOL">بولیوی</option>';
        str2 += '            <option value="BTN">پادشاهی بوتان</option>';
        str2 += '            <option value="PRY">پاراگوئه</option>';
        str2 += '            <option value="PAK">پاکستان</option>';
        str2 += '            <option value="PLW">پالائو</option>';
        str2 += '            <option value="PAN">پاناما</option>';
        str2 += '            <option value="PRT">پرتغال</option>';
        str2 += '            <option value="PER">پرو</option>';
        str2 += '            <option value="PYF">پلینزی فرانسه</option>';
        str2 += '            <option value="PRI">پورتوریکو</option>';
        str2 += '            <option value="TJK">تاجیکستان</option>';
        str2 += '            <option value="TZA">تانزانیا</option>';
        str2 += '            <option value="THA">تایلند</option>';
        str2 += '            <option value="TWN">تایوان</option>';
        str2 += '            <option value="TKM">ترکمنستان</option>';
        str2 += '            <option value="TUR">ترکیه</option>';
        str2 += '            <option value="CCK">ترینیداد و توباگو</option>';
        str2 += '            <option value="TTO">ترینیداد و توباگو</option>';
        str2 += '            <option value="TGO">توگو</option>';
        str2 += '            <option value="TUN">تونس</option>';
        str2 += '            <option value="TON">تونگا</option>';
        str2 += '            <option value="TUV">تووالو</option>';
        str2 += '            <option value="TLS">تیمور شرقی</option>';
        str2 += '            <option value="JAM">جامائیکا</option>';
        str2 += '            <option value="GIB">جبل الطارق</option>';
        str2 += '            <option value="TCA">جزایر ترک و کایکوس</option>';
        str2 += '            <option value="SLB">جزایر سلیمان</option>';
        str2 += '            <option value="FLK">جزایر فالکلند (مالویناس)</option>';
        str2 += '            <option value="FJI">جزایر فیجی</option>';
        str2 += '            <option value="COK">جزایر کوک</option>';
        str2 += '            <option value="CYM">جزایر کیمن</option>';
        str2 += '            <option value="MHL">جزایر مارشال</option>';
        str2 += '            <option value="MNP">جزایر ماریانای شمالی</option>';
        str2 += '            <option value="WLF">جزایر والیس و فوتونا</option>';
        str2 += '            <option value="VIR">جزایر ویرجین (آمریکا)</option>';
        str2 += '            <option value="VGB">جزایر ویرجین (بریتانیا)</option>';
        str2 += '            <option value="GLP">جزیره گوادلوپ</option>';
        str2 += '            <option value="IRL">جمهوری ایرلند</option>';
        str2 += '            <option value="CZE">جمهوری چک</option>';
        str2 += '            <option value="DOM">جمهوری دومینیکن</option>';
        str2 += '            <option value="DJI">جیبوتی</option>';
        str2 += '            <option value="TCD">چاد</option>';
        str2 += '            <option value="CHN">چین</option>';
        str2 += '            <option value="DNK">دانمارک</option>';
        str2 += '            <option value="DMA">دومینیکا</option>';
        str2 += '            <option value="RWA">رواندا</option>';
        str2 += '            <option value="RUS">روسیه</option>';
        str2 += '            <option value="ROU">رومانی</option>';
        str2 += '            <option value="REU">ریونیون</option>';
        str2 += '            <option value="ZMB">زامبیا</option>';
        str2 += '            <option value="ZWE">زیمباوه</option>';
        str2 += '            <option value="JPN">ژاپن</option>';
        str2 += '            <option value="STP">سائوتومه و پرینسیپ</option>';
        str2 += '            <option value="CIV">ساحل عاج</option>';
        str2 += '            <option value="WSM">ساموآ</option>';
        str2 += '            <option value="ASM">ساموآ آمریکا</option>';
        str2 += '            <option value="LKA">سریلانکا</option>';
        str2 += '            <option value="SPM">سنت پیر و میکلون</option>';
        str2 += '            <option value="KNA">سنت کیتس و نویس</option>';
        str2 += '            <option value="LCA">سنت لوسیا</option>';
        str2 += '            <option value="SHN">سنت هلن</option>';
        str2 += '            <option value="VCT">سنت وینسنت و گرنادین</option>';
        str2 += '            <option value="SGP">سنگاپور</option>';
        str2 += '            <option value="SEN">سنگال</option>';
        str2 += '            <option value="SWE">سوئد</option>';
        str2 += '            <option value="CHE">سوئیس</option>';
        str2 += '            <option value="SWZ">سوازیلند</option>';
        str2 += '            <option value="SDN">سودان</option>';
        str2 += '            <option value="SUR">سورینام</option>';
        str2 += '            <option value="SYR">سوریه</option>';
        str2 += '            <option value="SOM">سومالی</option>';
        str2 += '            <option value="SLE">سیرالئون</option>';
        str2 += '            <option value="SYC">سیشل</option>';
        str2 += '            <option value="CHL">شیلی</option>';
        str2 += '            <option value="SRB">صربستان</option>';
        str2 += '            <option value="IRQ">عراق</option>';
        str2 += '            <option value="SAU">عربستان سعودی</option>';
        str2 += '            <option value="OMN">عمان</option>';
        str2 += '            <option value="GHA">غنا</option>';
        str2 += '            <option value="FRA">فرانسه</option>';
        str2 += '            <option value="FIN">فنلاند</option>';
        str2 += '            <option value="PHL">فیلیپین</option>';
        str2 += '            <option value="CYP">قبرس</option>';
        str2 += '            <option value="KGZ">قرقیزستان</option>';
        str2 += '            <option value="KAZ">قزاقستان</option>';
        str2 += '            <option value="ATA">قطب جنوب</option>';
        str2 += '            <option value="QAT">قطر</option>';
        str2 += '            <option value="CRI">کاستاریکا</option>';
        str2 += '            <option value="NCL">کالدونیای جدید</option>';
        str2 += '            <option value="KHM">کامبوج</option>';
        str2 += '            <option value="CMR">کامرون</option>';
        str2 += '            <option value="CAN">کانادا</option>';
        str2 += '            <option value="KOR">کره جنوبی</option>';
        str2 += '            <option value="HRV">کرواسی</option>';
        str2 += '            <option value="COL">کلمبیا</option>';
        str2 += '            <option value="COG">کنگو</option>';
        str2 += '            <option value="COD">کنگو، جمهوری دمکراتیک</option>';
        str2 += '            <option value="KEN">نیا</option>';
        str2 += '            <option value="CUB">کوبا</option>';
        str2 += '            <option value="COM">کومور</option>';
        str2 += '            <option value="KWT">کویت</option>';
        str2 += '            <option value="CPV">کیپ ورد</option>';
        str2 += '            <option value="KIR">کیریباتی</option>';
        str2 += '            <option value="GAB">گابون</option>';
        str2 += '            <option value="GMB">گامبیا</option>';
        str2 += '            <option value="GEO">گرجستان</option>';
        str2 += '            <option value="GRD">گرنادا</option>';
        str2 += '            <option value="GRL">گرینلند</option>';
        str2 += '            <option value="GTM">واتمالا</option>';
        str2 += '            <option value="GUY">گویان</option>';
        str2 += '            <option value="GUF">گویان فرانسه</option>';
        str2 += '            <option value="GIN">گینه</option>';
        str2 += '            <option value="GNQ">گینه استوایی</option>';
        str2 += '            <option value="GNB">گینه بیسائو</option>';
        str2 += '            <option value="PNG">گینه جدید</option>';
        str2 += '            <option value="LAO">لائوس</option>';
        str2 += '            <option value="LBN">لبنان</option>';
        str2 += '            <option value="LVA">لتونی</option>';
        str2 += '            <option value="LSO">لسوتو</option>';
        str2 += '            <option value="POL">لهستان</option>';
        str2 += '            <option value="LUX">لوکزامبورگ</option>';
        str2 += '            <option value="LBR">لیبریا</option>';
        str2 += '            <option value="LBY">لیبی</option>';
        str2 += '            <option value="LTU">لیتوانی</option>';
        str2 += '            <option value="MDG">ماداگاسکار</option>';
        str2 += '            <option value="MTQ">مارتینیک</option>';
        str2 += '            <option value="MAC">ماکائو</option>';
        str2 += '            <option value="MWI">مالاوی</option>';
        str2 += '            <option value="MLT">مالت</option>';
        str2 += '            <option value="MDV">مالـــدیـــو</option>';
        str2 += '            <option value="MYS">مالزی</option>';
        str2 += '            <option value="MLI">مالی</option>';
        str2 += '            <option value="HUN">مجارستان</option>';
        str2 += '            <option value="MAR">مراکش</option>';
        str2 += '            <option value="EGY">مصر</option>';
        str2 += '            <option value="MNG">مغولستان</option>';
        str2 += '            <option value="MKD">مقدونیه</option>';
        str2 += '            <option value="MEX">مکزیک</option>';
        str2 += '            <option value="MRT">موریتانی</option>';
        str2 += '            <option value="MUS">موریس</option>';
        str2 += '            <option value="MOZ">موزامبیک</option>';
        str2 += '            <option value="MDA">مولداوی</option>';
        str2 += '            <option value="MSR">مونتسرات</option>';
        str2 += '            <option value="MNE">مونته نگرو</option>';
        str2 += '            <option value="MMR">میانمار</option>';
        str2 += '            <option value="NRU">نائورو</option>';
        str2 += '            <option value="NAM">نامیبیا</option>';
        str2 += '            <option value="NPL">نپال</option>';
        str2 += '            <option value="NOR">نروژ</option>';
        str2 += '            <option value="NER">نیجر</option>';
        str2 += '            <option value="NGA">نیجریه</option>';
        str2 += '            <option value="NIC">نیکاراگوئه</option>';
        str2 += '            <option value="NZL">نیوزیلند</option>';
        str2 += '            <option value="NIU">نیووی</option>';
        str2 += '            <option value="HTI">هائیتی</option>';
        str2 += '            <option value="NLD">هلند</option>';
        str2 += '            <option value="IND">هند</option>';
        str2 += '            <option value="HND">هندوراس</option>';
        str2 += '            <option value="HKG">هنگ کنگ</option>';
        str2 += '            <option value="VUT">وانواتو</option>';
        str2 += '            <option value="VEN">ونزوئلا</option>';
        str2 += '            <option value="VNM">ویتنام</option>';
        str2 += '            <option value="YEM">یمن</option>';
        str2 += '            <option value="GRC">یونان</option>';
        str2 += '</select>';
        str2 += '</div>';

        str2 += '<div class="col-sm-12 col-md-2">';
        str2 += '<label for="passport_num_id' + w1 + '">شماره پاسپورت</label>';
        str2 += '<input type="text" class="form-control" id="passport_num_id' + w1 + '" name="passport_num_id' + w1 + '" placeholder="Passport Number" required/>';
        str2 += '</div>';

        str2 += '<div class="col-sm-12 col-md-2">';
        str2 += '<label for="passport_num_expire_d' + w1 + '">تاریخ انقضا پاسپورت</label>';
        str2 += '<select class="form-control" id="passport_num_expire_d' + w1 + '" name="passport_num_expire_d' + w1 + '" required>';
        str2 += '<option value="01">1</option>';
        str2 += '<option value="02">2</option>';
        str2 += '<option value="03">3</option>';
        str2 += '<option value="04">4</option>';
        str2 += '<option value="05">5</option>';
        str2 += '<option value="06">6</option>';
        str2 += '<option value="07">7</option>';
        str2 += '<option value="08">8</option>';
        str2 += '<option value="09">9</option>';
        str2 += '<option value="10">10</option>';
        str2 += '<option value="11">11</option>';
        str2 += '<option value="12">12</option>';
        str2 += '<option value="13">13</option>';
        str2 += '<option value="14">14</option>';
        str2 += '<option value="15">15</option>';
        str2 += '<option value="16">16</option>';
        str2 += '<option value="17">17</option>';
        str2 += '<option value="18">18</option>';
        str2 += '<option value="19">19</option>';
        str2 += '<option value="20">20</option>';
        str2 += '<option value="21">21</option>';
        str2 += '<option value="22">22</option>';
        str2 += '<option value="23">23</option>';
        str2 += '<option value="24">24</option>';
        str2 += '<option value="25">25</option>';
        str2 += '<option value="26">26</option>';
        str2 += '<option value="27">27</option>';
        str2 += '<option value="28">28</option>';
        str2 += '<option value="29">29</option>';
        str2 += '<option value="30">30</option>';
        str2 += '<option value="31">31</option>';
        str2 += '</select>';
        str2 += '</div>';
        str2 += '<div class="col-sm-12 col-md-2">';
        str2 += '<label for="passport_num_expire_m' + w1 + '">(ماه)</label>';
        str2 += '<select class="form-control" id="passport_num_expire_m' + w1 + '" name="passport_num_expire_m' + w1 + '" required>';
        str2 += '<option value="01">Jan</option>';
        str2 += '<option value="02">Feb</option>';
        str2 += '<option value="03">Mar</option>';
        str2 += '<option value="04">Apr</option>';
        str2 += '<option value="05">May</option>';
        str2 += '<option value="06">Jun</option>';
        str2 += '<option value="07">Jul</option>';
        str2 += '<option value="08">Aug</option>';
        str2 += '<option value="09">Sep</option>';
        str2 += '<option value="10">Oct</option>';
        str2 += '<option value="11">Nov</option>';
        str2 += '<option value="12">Dec</option>';
        str2 += '</select>';
        str2 += '</div>';
        str2 += '<div class="col-sm-12 col-md-2">';
        str2 += '<label for="passport_num_expire_y' + w1 + '">سال</label>';
        str2 += '<input type="text" class="form-control" id="passport_num_expire_y' + w1 + '" name="passport_num_expire_y' + w1 + '" placeholder="Year" min="1900" max="2450" maxlength="4" required/>';
        // str2 +='<input type="text" class="form-control" id="passport_num_expire'+w1+'" placeholder="Passport Expire" required/>';
        str2 += '</div>';


        return str2;
    }
















    // A D D    C U S T O M E R

    $("#addAdult").click(function() {
        sessionStorage.num_all++;
        if (Capacity < sessionStorage.num_all) {
            // alert('بیشتر از این مجاز نیست، به باقی مانده ظرفیت توجه کنید.');
            $.fancybox.open('<div class="message"><h4>بیشتر از این مجاز نیست، به باقی مانده ظرفیت توجه کنید.</h4></div>');
            sessionStorage.num_all--;
            return;
        }
        sessionStorage.num_adult++;
        if (sessionStorage.num_all <= 9) {
            var adultpri_add = 0;
            var sum_add_all = 0;
            var new_id = 'passenger-js-a';

            // $("#info").append(str);
            // var c = $('.close_style').prop('id');

            adultpri_add = parseFloat(sessionStorage.adultpri) + parseFloat(sessionStorage.adultSession);
            sum_add_all = sum_add_all + adultpri_add;
            sessionStorage.adultpri = adultpri_add;
            sessionStorage.countAdd1++;
            $("#titleAdlt").text((parseFloat(sessionStorage.num_adult)) + ' بزرگسال');
            $("#sum_adult").html((parseFloat(sessionStorage.num_adult)) + ' بزرگسال:  ' + addComma(adultpri_add + '0') + '  ریال');

            new_id += sessionStorage.countAdd1;

            $("#testID").append(outputrecord(new_id, 'بزرگسال', 'null', 'Adlt', 1000));

            var a = sessionStorage.adultpri;
            var b = sessionStorage.childpri;
            var c = sessionStorage.infantpri;
            sum_add_all = parseFloat(a) + parseFloat(b) + parseFloat(c);
            // alert(sum_add_all);
            // $("#sum_all").html('کل مبلغ: ' + sum_add_all);
            $("#sum_all").val(addComma(sum_add_all + '0'));

            sessionStorage.FinalPrice = sum_add_all;
        } else {
            sessionStorage.num_all--;
            sessionStorage.num_adult--;
            // alert('بیشتر از 9 نفر مجاز نیست.');
            $.fancybox.open('<div class="message"><h4>بیشتر از 9 نفر مجاز نیست.</h4></div>');
        }
    });



    $("#addClild").click(function() {
        sessionStorage.num_all++;
        if (Capacity < sessionStorage.num_all) {
            // alert('بیشتر از این مجاز نیست، به باقی مانده ظرفیت توجه کنید.');
            $.fancybox.open('<div class="message"><h4>بیشتر از این مجاز نیست، به باقی مانده ظرفیت توجه کنید.</h4></div>');
            sessionStorage.num_all--;
            return;
        }
        sessionStorage.num_child++;
        if (sessionStorage.num_all <= 9) {
            var childpri_add = 0;
            var sum_add_all = 0;
            var new_id = 'passenger-js-c';

            // $("#info").append(str);
            // var c = $('.close_style').prop('id');

            childpri_add = parseFloat(sessionStorage.childpri) + parseFloat(sessionStorage.childpriSession);
            sum_add_all = sum_add_all + childpri_add;
            sessionStorage.childpri = childpri_add;
            sessionStorage.countAdd2++;
            $("#titleChd").text((parseFloat(sessionStorage.num_child)) + ' کودک');
            $("#sum_child").html((parseFloat(sessionStorage.num_child)) + ' کودک:  ' + addComma(childpri_add + '0') + '  ریال');

            new_id += sessionStorage.countAdd2;

            $("#testID").append(outputrecord(new_id, 'کودک', 'null', 'Chd', 1000));

            var a = sessionStorage.adultpri;
            var b = sessionStorage.childpri;
            var c = sessionStorage.infantpri;
            sum_add_all = parseFloat(a) + parseFloat(b) + parseFloat(c);
            // alert(sum_add_all);
            // $("#sum_all").html('کل مبلغ: ' + sum_add_all);
            $("#sum_all").val(addComma(sum_add_all + '0'));

            sessionStorage.FinalPrice = sum_add_all;
        } else {
            sessionStorage.num_all--;
            sessionStorage.num_child--;
            // alert('بیشتر از 9 نفر مجاز نیست.');
            $.fancybox.open('<div class="message"><h4>بیشتر از 9 نفر مجاز نیست.</h4></div>');
        }
    });



    $("#addInfant").click(function() {
        sessionStorage.num_all++;
        if (Capacity < sessionStorage.num_all) {
            // alert('بیشتر از این مجاز نیست، به باقی مانده ظرفیت توجه کنید.');
            $.fancybox.open('<div class="message"><h4>بیشتر از این مجاز نیست، به باقی مانده ظرفیت توجه کنید.</h4></div>');
            sessionStorage.num_all--;
            return;
        }
        sessionStorage.num_infant++;
        if (sessionStorage.num_all <= 9) {
            if (sessionStorage.num_infant <= 2) {

                var infantpri_add = 0;
                var sum_add_all = 0;
                var new_id = 'passenger-js-i';

                // $("#info").append(str);
                // var c = $('.close_style').prop('id');

                infantpri_add = parseFloat(sessionStorage.infantpri) + parseFloat(sessionStorage.infantpriSession);
                sum_add_all = sum_add_all + infantpri_add;
                sessionStorage.infantpri = infantpri_add;
                sessionStorage.countAdd3++;
                $("#titleInfa").text((parseFloat(sessionStorage.num_infant)) + ' نوزاد');
                $("#sum_infant").html((parseFloat(sessionStorage.num_infant)) + ' نوزاد:  ' + addComma(infantpri_add + '0') + '  ریال');

                new_id += sessionStorage.countAdd3;

                $("#testID").append(outputrecord(new_id, 'نوزاد', 'null', 'Infa', 1000));

                var a = sessionStorage.adultpri;
                var b = sessionStorage.childpri;
                var c = sessionStorage.infantpri;
                sum_add_all = parseFloat(a) + parseFloat(b) + parseFloat(c);
                // $("#sum_all").html('کل مبلغ: ' + sum_add_all);
                $("#sum_all").val(addComma(sum_add_all + '0'));

                sessionStorage.FinalPrice = sum_add_all;
            } else {
                sessionStorage.num_all--;
                sessionStorage.num_infant--;
                // alert('تعداد نوزاد باید حداقل 2 نفر باشد.');
                $.fancybox.open('<div class="message"><h4>تعداد نوزاد باید حداقل 2 نفر باشد.</h4></div>');
            }
        } else {
            sessionStorage.num_all--;
            sessionStorage.num_infant--;
            // alert('بیشتر از 9 نفر مجاز نیست.');
            $.fancybox.open('<div class="message"><h4>بیشتر از 9 نفر مجاز نیست.</h4></div>');
        }
    });



    function outputrecord(q1, q2, q3, q4, q5) {

        //str += '<div class="put-left close_style" id="'+q1+'_close" data-money="" >X</div>';

        var str = '';
        str += '<div id="' + q1 + '" class="numDiv">';
        str += '<button onclick="closeBOX(\'' + q1 + '\',\'' + q4 + '\');return false;" class="put-left close_style" id="' + q1 + '_close" data-money="">X</button>';
        str += '<div class=" title_blit" data-name="' + q4 + '"><h5 >' + q2 + '</h5></div>';
        str += '<div class="row text-right select_item_border personDet" data-typeName="' + q4 + '" personid="' + q1 + '">';
        str += '<div class="col-sm-12">';
        str += '<button class="btn btn-default btnCustom btn-primary" id="ra1' + q1 + '" onclick="radioBtn1(\'' + q1 + '\',\'' + q4 + '\');return false;" style="margin-left: 5px;">خرید با کد ملی</button>';
        str += '<button class="btn btn-default btnCustom" id="ra2' + q1 + '" onclick="radioBtn2(\'' + q1 + '\',\'' + q4 + '\');return false;">خرید با پاسپورت</button>';
        str += '</div>';
        str += '<div id="info_' + q1 + '">';
        str += '<div class="col-sm-12 col-md-3">';
        str += '<label for="name_latin">نام لاتین</label>';
        str += '<input type="text" class="form-control" id="name_latin' + q1 + '" name="name_latin' + q1 + '" placeholder="Latin Name" required/>';
        str += '</div>';
        str += '<div class="col-sm-12 col-md-3">';
        str += '<label for="surename_latin">نام خانوادگی لاتین</label>';
        str += '<input type="text" class="form-control" id="surename_latin' + q1 + '" name="surename_latin' + q1 + '" placeholder="Latin Surname" required/>';
        str += '</div>';
        str += '<div class="col-sm-12 col-md-3">';
        str += '<label for="name_farsi">نام</label>';
        str += '<input type="text" class="form-control" id="name_farsi' + q1 + '" name="name_farsi' + q1 + '" placeholder="نام" required/>';
        str += '</div>';
        str += '<div class="col-sm-12 col-md-3">';
        str += '<label for="surename_farsi">نام خانوادگی</label>';
        str += '<input type="text" class="form-control" id="surename_farsi' + q1 + '" name="surename_farsi' + q1 + '" placeholder="نام خانوادگی" required/>';
        str += '</div>';
        str += '<div class="col-sm-12 col-md-2">';
        str += '<label for="gender">جنسیت</label>';
        str += '<select class="form-control" id="gender' + q1 + '" name="gender' + q1 + '" required>';
        str += '<option value="Male">مرد</option>';
        str += '<option value="Female">زن</option>';
        str += '</select>';
        str += '</div>';
        str += '<div class="col-sm-12 col-md-2">';
        str += '<label for="code_meli">کد ملی</label>';
        str += '<input type="text" class="form-control" id="code_meli' + q1 + '" name="code_meli' + q1 + '" placeholder="کد ملی"  min="100000000" max="9999999999" maxlength="10" required/>';
        str += '</div>';
        str += '<div class="col-sm-12 col-md-2">';
        str += '<label for="meliat' + q1 + '">ملیت</label>';
        str += '<select class="form-control" id="meliat' + q1 + '" name="meliat' + q1 + '" required>';
        str += '<option value="iran">ایرانی</option>';
        str += '<option value="non-iran">غیر ایرانی</option>';
        str += '</select>';
        str += '</div>';
        // str += '<div class="col-sm-12 col-md-3">';
        // str += '<label for="birth_day">تاریخ تولد</label>';
        // str += '<input type="text" class="form-control" id="birth_day'+q1+'" placeholder="تاریخ تولد" required/>';
        // str += '</div>';
        str += '<div class="col-sm-12 col-md-2">';
        str += '<label for="birth_day_shamsi_d' + q1 + '">تاریخ تولد (شمسی)</label>';
        str += '<select class="form-control" id="birth_day_shamsi_d' + q1 + '" name="birth_day_shamsi_d' + q1 + '" required>';
        str += '<option value="01">1</option>';
        str += '<option value="02">2</option>';
        str += '<option value="03">3</option>';
        str += '<option value="04">4</option>';
        str += '<option value="05">5</option>';
        str += '<option value="06">6</option>';
        str += '<option value="07">7</option>';
        str += '<option value="08">8</option>';
        str += '<option value="09">9</option>';
        str += '<option value="10">10</option>';
        str += '<option value="11">11</option>';
        str += '<option value="12">12</option>';
        str += '<option value="13">13</option>';
        str += '<option value="14">14</option>';
        str += '<option value="15">15</option>';
        str += '<option value="16">16</option>';
        str += '<option value="17">17</option>';
        str += '<option value="18">18</option>';
        str += '<option value="19">19</option>';
        str += '<option value="20">20</option>';
        str += '<option value="21">21</option>';
        str += '<option value="22">22</option>';
        str += '<option value="23">23</option>';
        str += '<option value="24">24</option>';
        str += '<option value="25">25</option>';
        str += '<option value="26">26</option>';
        str += '<option value="27">27</option>';
        str += '<option value="28">28</option>';
        str += '<option value="29">29</option>';
        str += '<option value="30">30</option>';
        str += '<option value="31">31</option>';
        str += '</select>';
        str += '</div>';
        str += '<div class="col-sm-12 col-md-2">';
        str += '<label for="birth_day_shamsi_m' + q1 + '">(ماه)</label>';
        str += '<select class="form-control" id="birth_day_shamsi_m' + q1 + '" name="birth_day_shamsi_m' + q1 + '" required>';
        str += '<option value="01">فروردین</option>';
        str += '<option value="02">اردیبهشت</option>';
        str += '<option value="03">خرداد</option>';
        str += '<option value="04">تیر</option>';
        str += '<option value="05">مرداد</option>';
        str += '<option value="06">شهریور</option>';
        str += '<option value="0">مهر</option>';
        str += '<option value="08">آبان</option>';
        str += '<option value="09">آذر</option>';
        str += '<option value="10">دی</option>';
        str += '<option value="11">بهمن</option>';
        str += '<option value="12">اسفند</option>';
        str += '</select>';
        str += '</div>';
        str += '<div class="col-sm-12 col-md-2">';
        str += '<label for="birth_day_shamsi_y' + q1 + '">سال</label>';
        str += '<input type="text" class="form-control" id="birth_day_shamsi_y' + q1 + '" name="birth_day_shamsi_y' + q1 + '" placeholder="سال" min="1300" max="1450" maxlength="4" required/>';
        str += '</div>';

        str += '</div>';
        str += '</div>';
        str += '</div>';


        return str;
    }




    // document.getElementById('contact_number').setCustomValidity('شماره تماس را وارد نمائید');
    // //   var inpObj = document.getElementById("contact_number");
    // //   if (!inpObj.checkValidity()) {
    // //     document.getElementById("demo").innerHTML = inpObj.validationMessage;
    // //   } else {
    // //     document.getElementById("demo").innerHTML = "Input OK";
    // //   } 
    // document.getElementById('email_user').setCustomValidity('پست الکترونیک را وارد نمائید');
    // document.getElementsByTagName("input").setCustomValidity('کل مشخصات را وارد نمائید');



    var i = 0;
    // خرید بلیط
    $('#final_blit').click(function() {

        var c = 0;
        FlightID = $('.entekhab_va_kharid').prop("id");
        FlightType = $('.entekhab_va_kharid').attr("data-FlightType");
        AirlineName = $('.entekhab_va_kharid').attr("data-AirlineName");
        AirlineCode = $('.entekhab_va_kharid').attr("data-AirlineCode");
        AirlineLogo = $('.entekhab_va_kharid').attr("data-AirlineLogo");
        DepartureParentRegionName = $('.entekhab_va_kharid').attr("data-DepartureParentRegionName");
        DepartureDate = $('.entekhab_va_kharid').attr("data-DepartureDate");
        DepartureTime = $('.entekhab_va_kharid').attr("data-DepartureTime");
        PersianDepartureDate = $('.entekhab_va_kharid').attr("data-PersianDepartureDate");
        ArrivalParentRegionName = $('.entekhab_va_kharid').attr("data-ArrivalParentRegionName");
        ArrivalTime = $('.entekhab_va_kharid').attr("data-ArrivalTime");
        FlightNo = $('.entekhab_va_kharid').attr("data-FlightNo");
        Capacity = $('.entekhab_va_kharid').attr("data-Capacity");
        CabinType = $('.entekhab_va_kharid').attr("data-CabinType");
        FinalPrice = sessionStorage.FinalPrice;

        var mobile = $('#contact_number').val();
        var email = $('#email_user').val();



        // var z = '"api_token": "","flight":[{ "avid_ref_code":"safarbooking_12598745","flight_number":"' + FlightNo + '","source":"' + source + '","destination":"' + destination + '","airline":"' + AirlineCode + '","class": "' + CabinType + '","type":"' + FlightType + '","arrival_date_fa":"1398-02-10","arrival_time_fa": "16:30","arrival_date_en": "2020-01-25","arrival_time_en": "16:30", "departure_date_fa": "' + PersianDepartureDate + '","departure_time_fa": "17:30","departure_date_en": "' + DepartureDate + '","departure_time_en": "' + DepartureTime + '"}],"payment": [{ "price": "' + FinalPrice + '","status": "success","dargah": "melli","bank_token": "124sjfplsjkofklshjf"}],"passengers": [ ';
        // api_token=79xGpvxW8Eb27fuyHdj9S9O2hgnrzwevAASF5Fgntic5GRMBxKtJBorTQceq
        // "api_token": "MhReUYGiGXZz2UAIAZXSMdAoVBIcGUrUlSAtPAR42RYGQ4eLOl3nnmOvXDmr"

        var z = '[';
        $('.personDet').each(function(i, obj) {
            var myIndex = $(this).attr('personid');
            // $('#select_item :input').attr('disabled','disabled');
            if ($('#testID :input[type=text]').val() == "") {
                c = 1;
            } else {
                // alert($('.select_item').find(':input'));
                // if()

                nameType = $(this).attr('data-typeName');

                // alert(i);
                // z += $('#name_latin'+myIndex).val();
                // z += $('#surename_latin'+myIndex).val();
                // z += $('#gender'+myIndex+' option:selected').text();
                // z += $('#code_meli'+myIndex).val();
                // z += $('#name_farsi'+myIndex).val();
                // z += $('#surename_farsi'+myIndex).val();
                // z += $('#birth_day'+myIndex).val();

                // if($('#code_meli'+myIndex).val() == "undefined"){
                //     $('#code_meli'+myIndex).val("2");
                // }

                // alert(sum_add_all);

                // z = z + '{fNameLatin:"'+$('#name_latin'+myIndex).val()+
                //         '",lNameLatin:"'+$('#surename_latin'+myIndex).val()+
                //         '",age:"'+$('#gender'+myIndex+' option:selected').text()+
                //         '",CodeMeli:"'+$('#code_meli'+myIndex).val()+
                //         '",fNameFarsi:"'+$('#name_farsi'+myIndex).val()+
                //         '",lNameFarsi:"'+$('#surename_farsi'+myIndex).val()+
                //         '",BirthDateShamsiD:"'+$('#birth_day_shamsi_d'+myIndex+' option:selected').text()+
                //         '",BirthDateShamsiM:"'+$('#birth_day_shamsi_m'+myIndex+' option:selected').text()+
                //         '", BirthDateShamsiY:"'+$('#birth_day_shamsi_y'+myIndex).val()+
                //         '",BirthDateMiladiD:"'+$('#birth_day_miladi_d'+myIndex+' option:selected').text()+
                //         '",BirthDateMiladiM:"'+$('#birth_day_miladi_m'+myIndex+' option:selected').text()+
                //         '",BirthDateMiladiY:"'+$('#birth_day_miladi_y'+myIndex).val()+
                //         '",BirthDateCountry:"'+$('#birth_day_country'+myIndex+' option:selected').text()+
                //         '",IssueCountry:"'+$('#issue_country'+myIndex+' option:selected').text()+
                //         '",PassportNoID:"'+$('#passport_num_id'+myIndex).val()+
                //         '",PassportNoExpireD:"'+$('#passport_num_expire_d'+myIndex+' option:selected').text()+
                //         '",PassportNoExpireM:"'+$('#passport_num_expire_m'+myIndex+' option:selected').text()+
                //         '",PassportNoExpireY:"'+$('#passport_num_expire_y'+myIndex).val()+'",}';

                if (i == 0) {
                    z = z + '{"type":"' + nameType + '","fname_en":"' + $('#name_latin' + myIndex).val() + '", "lname_en":"' + $('#surename_latin' + myIndex).val() + '","fname_fa":"' + $('#name_farsi' + myIndex).val() + '","lname_fa":"' + $('#surename_farsi' + myIndex).val() + '","sex":"' + $('#gender' + myIndex).val() + '","birthday_fa": "' + $('#birth_day_shamsi_y' + myIndex).val() + '-' + $('#birth_day_shamsi_m' + myIndex).val() + '-' + $('#birth_day_shamsi_d' + myIndex).val() + '","birthday_en": "' + $('#birth_day_miladi_y' + myIndex).val() + '-' + $('#birth_day_miladi_m' + myIndex).val() + '-' + $('#birth_day_miladi_d' + myIndex).val() + '","nationality": "' + $('#meliat' + myIndex).val() + '","code_melli":"' + $('#code_meli' + myIndex).val() + '", "passport_number":"' + $('#passport_num_id' + myIndex).val() + '","passport_deadline": "' + $('#passport_num_expire_y' + myIndex).val() + '-' + $('#passport_num_expire_m' + myIndex).val() + '-' + $('#passport_num_expire_d' + myIndex).val() + '","passport_country": "' + $('#issue_country' + myIndex).val() + '","country_birth": "' + $('#birth_day_country' + myIndex).val() + '","mobile": "' + mobile + '","email": "' + email + '"},';
                } else if (i > 0) {
                    z = z + '{"type":"' + nameType + '","fname_en":"' + $('#name_latin' + myIndex).val() + '", "lname_en":"' + $('#surename_latin' + myIndex).val() + '","fname_fa":"' + $('#name_farsi' + myIndex).val() + '","lname_fa":"' + $('#surename_farsi' + myIndex).val() + '","sex":"' + $('#gender' + myIndex).val() + '","birthday_fa": "' + $('#birth_day_shamsi_y' + myIndex).val() + '-' + $('#birth_day_shamsi_m' + myIndex).val() + '-' + $('#birth_day_shamsi_d' + myIndex).val() + '","birthday_en": "' + $('#birth_day_miladi_y' + myIndex).val() + '-' + $('#birth_day_miladi_m' + myIndex).val() + '-' + $('#birth_day_miladi_d' + myIndex).val() + '","nationality": "' + $('#meliat' + myIndex).val() + '","code_melli":"' + $('#code_meli' + myIndex).val() + '", "passport_number":"' + $('#passport_num_id' + myIndex).val() + '","passport_deadline": "' + $('#passport_num_expire_y' + myIndex).val() + '-' + $('#passport_num_expire_m' + myIndex).val() + '-' + $('#passport_num_expire_d' + myIndex).val() + '","passport_country": "' + $('#issue_country' + myIndex).val() + '","country_birth": "' + $('#birth_day_country' + myIndex).val() + '","mobile": "","email": ""},';
                }
            }


        });
        z = z.slice(0, -1);
        z = z + ']';
        var json = z.replace(/undefined/gi, "NULL");
        json = json.replace(/--/g, "NULL");
        // json = json.slice(0,-1);


        $("#FlightID").val(FlightID);
        $("#FlightType").val(FlightType);
        $("#AirlineName").val(AirlineName);
        $("#AirlineCode").val(AirlineCode);
        $("#AirlineLogo").val(AirlineLogo);
        $("#DepartureParentRegionName").val(DepartureParentRegionName);
        $("#DepartureDate").val(DepartureDate);
        $("#DepartureTime").val(DepartureTime);
        $("#PersianDepartureDate").val(PersianDepartureDate);
        $("#ArrivalParentRegionName").val(ArrivalParentRegionName);
        $("#ArrivalTime").val(ArrivalTime);
        $("#FlightNo").val(FlightNo);
        $("#Capacity").val(Capacity);
        $("#CabinType").val(CabinType);
        $("#FinalPrice").val(FinalPrice);
        $("#Source").val(source);
        $("#Destination").val(destination);
        $("#json").val(json);

        // if (c == 1) {
        //     $.fancybox.open('<div class="message"><h4>لطفا تمام مشخصات را پر کنید</h4></div>');
        //     return;
        // } else if (mobile == "" || email == "") {
        //     $.fancybox.open('<div class="message"><h4>لطفا شماره تماس و ایمیل را وارد نمائید</h4></div>');
        //     return;
        // } else {


        // alert(json);

        // if (i >= 0) {
        //     $.ajax({
        //         // dataType: "json",
        //         method: "POST",
        //         data: {
        //             insert: -1,
        //             flight: 'safarbooking_12598745',
        //             flight_number: FlightNo,
        //             source: source,
        //             destination: destination,
        //             airline: AirlineCode,
        //             classs: CabinType,
        //             type: FlightType,
        //             arrival_date_fa: '1398-02-10',
        //             arrival_time_fa: '16:30',
        //             arrival_date_en: '2020-01-25',
        //             arrival_time_en: '16:30',
        //             departure_date_fa: PersianDepartureDate,
        //             departure_time_fa: '17:30',
        //             departure_date_en: DepartureDate,
        //             departure_time_en: DepartureTime,
        //             price: FinalPrice,
        //             status: 'success',
        //             dargah: 'parsian',
        //             bank_token: '124sjfplsjkofklshjf',
        //             passengers: json
        //         },
        //         // url: "http://bahar360.ir/payment/",
        //         // url: "http://localhost:8080/wordpress-travels/wp-content/themes/Travelagency/pay/payment.php",
        //           url: "http://bahar360.ir/wp-content/themes/Travelagency/InfoSessionBlit.php",
        //         //  url: "../admin-ajax.php",
        //         // beforeSend:function(){
        //         //     $.fancybox.open('<div class="message"><h4>در حال متصل به بانک ...</h4></div>');
        //         // },
        //         success: function(data) {
        //             // alert('ارسال شد');
        //             alert(data);
        //             //  window.location.href = "http://bahar360.ir/payment/";
        //         },
        //         error: function(jqXHR, textStatus, errorThrown) {
        //             alert(data);
        //         }
        //     });
        // }

        //   var numDiv = $('.personDet').length;
        //   for (i = 1; i <= numDiv; i++) {
        //       // alert(numDiv);
        //       //personid
        //       $('div.numDiv').index();
        //   }
        // }
    });
</script>