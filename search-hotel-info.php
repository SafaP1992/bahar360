  
<?php /* Template Name: search-hotel-info */ ?>

<?php get_header(); ?>

<?php

$vadult = 1;
$vchild = 0;
$vinfant = 0;

$_SESSION['TerminalTrainID'] = $_POST['TerminalTrainID'];
$_SESSION['TrainCode'] = $_POST['TrainCode'];
$_SESSION['CabinType'] = $_POST['CabinType'];
$_SESSION['AdtPrice'] = $_POST['AdtPrice'];
$_SESSION['ChdPrice'] = $_POST['ChdPrice'];
$_SESSION['InfPrice'] = $_POST['InfPrice'];
$_SESSION['Capacity'] = $_POST['Capacity'];
$_SESSION['SourceCity'] = $_POST['SourceCity'];
$_SESSION['SourceCityEn'] = $_POST['SourceCityEn'];
$_SESSION['DestinationCity'] = $_POST['DestinationCity'];
$_SESSION['DestinationCityEn'] = $_POST['DestinationCityEn'];
$_SESSION['TrainName'] = $_POST['TrainName'];
$_SESSION['ImageURL'] = $_POST['ImageURL'];
$_SESSION['DepartureDate'] = $_POST['DepartureDate'];
$_SESSION['DepartureDatePersian'] = $_POST['DepartureDatePersian'];
$_SESSION['DepartureDateTimeFa'] = $_POST['DepartureDateTimeFa'];
$_SESSION['ArrivalDatePersian'] = $_POST['ArrivalDatePersian'];
$_SESSION['ArrivalDateTimeFa'] = $_POST['ArrivalDateTimeFa'];


// if(empty($TerminalBusID)){
//     // header( "Location: http://bahar360.ir/search-bus/" );
//     // wp_redirect( 'http://bahar360.ir/search-bus/' );
//     // exit ;
// }
?>


    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/fontawesome-all.css" />
    <link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/css/style1.css" />
        
        
    <div class="container mt-5">
        <div class="row">

            <!-- Main Page-->
            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">

                <div class="" id="result">
                    
                    <!-- Details -->
                    <div class="col-12 card4 p-3 mt-2">
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2 text-center">
                                <img class="rounded-circle" src="<?php echo $_SESSION['ImageURL']; ?>">
                                <p><?php echo $_SESSION['TrainName']; ?></p>
                            </div>

                            <div class="col-sm-12 col-md-12 col-lg-10 col-xl-8">

                                <div class="destination-map row">
                                    <div class="destination-map__from pull-left col-3 col-sm-2 col-md-2 col-lg-2 col-xl-4">
                                        <div class="form-inline text-center">
                                            <strong class="from"><?php echo $_SESSION['SourceCity']; ?></strong>
                                            <strong class="time"><?php echo $_SESSION['DepartureTime']; ?></strong>
                                            <!--<strong class="sortclock" style="display: none">0500</strong>-->
                                        </div>
                                    </div>

                                    <div class="destination-map__airicon col-6 col-sm-8 col-md-8 col-lg-8 col-xl-4">
                                        <span class="airline-time d-block"><?php echo $_SESSION['DepartureDateTimeFa']; ?></span>
                                        <i class="icon fa fa-train"></i>
                                    </div>

                                    <div class="destination-map__to pull-left col-3 col-sm-2 col-md-2 col-lg-2 col-xl-4">
                                        <strong class="to"><?php echo $_SESSION['DestinationCity']; ?></strong>
                                        <strong class="time"><?php echo $_SESSION['ArrivalDateTimeFa']; ?></strong>
                                    </div>
                                </div>

                                
                            </div>

                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-2 line">
                                <p class="text-center mt-5 price-card price" id="Price" data-price="5516000"><?php
                                    $number = $_SESSION['AdtPrice'].'0';  //1234.56;
                                    echo number_format($number). ' ریال';
                                ?> </p>
                                <p class="text-center mt-2 price-card price2" id="price2" style="display: none;"><?php echo $_SESSION['AdtPrice']; ?></p>
                                
                                <p class="text-center mt-2"><?php echo $_SESSION['Capacity']; ?> ظرفیت</p>
                            </div>
                        </div>
                    </div>
                    
                    
                    
                    <div id="select_item">
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
                    </div>

                        <form action="<?php bloginfo('template_url'); ?>/pay3/payment.php" method="post" class="form-block" id="SalePaymentRequest">
                            <div id="box" class="numDiv">
                                <div class="row">
                                    <div id="info_airplane"></div>
                                    <div class="col-12">
                                        <div class="title_select r">
                                            <h4>جهت دریافت اطلاعات شماره تماس و ایمیل معرفی کنید</h4>
                                            <div class="row">
                                                <div class="col-sm-6">
                                                    <h5>شماره تماس</h5>
                                                    <input type="text" class="form-control" id="contact_number" name="contact_number" placeholder="شماره تماس" required/>
                                                </div>
                                                <div class="col-sm-6">
                                                    <h5>آدرس پست الکترونیک</h5>
                                                    <input type="text" class="form-control" id="email_user" name="email_user" placeholder="آدرس پست الکترونیک" required/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr />
                                    
        
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
                                                            <input type="text" class="" id="sum_all" name="sum_all" value="" readonly/> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
        
                                </div>
                            </div>
                        
                            
                            <div class="col-12 card4 my-4 p-3 text-center">
                                <div class="row">
                                    <div class="col-12 col-md-8">
                                        <div class="form-inline">
                                            <input type="checkbox" class="form-control" style="margin-left:10px" required />
                                            <span>قوانین سایت و قوانین اتوبوس را مطالعه کردم و آن را تایید می کنم.</span>
                                        </div>
                                    </div>
                                    <div class="col-12 col-md-4">
                                        <input type="hidden" name="TerminalTrainID" id="TerminalTrainID" value="" readonly/>
                                        <input type="hidden" name="TrainCode" id="TrainCode" value="" readonly/>
                                        <input type="hidden" name="CabinType" id="CabinType" value="" readonly/>
                                        <input type="hidden" name="Capacity" id="Capacity" value="" readonly/>
                                        <input type="hidden" name="SourceCity" id="SourceCity" value="" readonly/>
                                        <input type="hidden" name="SourceCityEn" id="SourceCityEn" value="" readonly/>
                                        <input type="hidden" name="DestinationCity" id="DestinationCity" value="" readonly/>
                                        <input type="hidden" name="DestinationCityEn" id="DestinationCityEn" value="" readonly/>
                                        <input type="hidden" name="TrainName" id="TrainName" value="" readonly/>
                                        <input type="hidden" name="DepartureDate" id="DepartureDate" value="" readonly/>
                                        <input type="hidden" name="DepartureDatePersian" id="DepartureDatePersian" value="" readonly/>
                                        <input type="hidden" name="DepartureDateTimeFa" id="DepartureDateTimeFa" value="" readonly/>
                                        <input type="hidden" name="ArrivalDatePersian" id="ArrivalDatePersian" value="" readonly/>
                                        <input type="hidden" name="ArrivalDateTimeFa" id="ArrivalDateTimeFa" value="" readonly/>
                                        
                                        <input type="hidden" class="" id="sum_price" name="sum_price" value="" readonly/> 
                                        <input type="hidden" name="Json" id="Json" value="" readonly/>
                                        
                                        <input type="submit" class="btn btn-primary" id="final_blit_train" name="final_blit_train" value="رزور و خرید" />
                                    </div>
                                </div>
                            </div>
                        
                        </form>
                    </div>
                </div>
            </div>
            
        </div>
    </div>



<?php

    



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

<script>

    function addComma( str ) {
    	var objRegex = new RegExp( '(-?[0-9]+)([0-9]{3})' );
     
    	while( objRegex.test( str ) ) {
    		str = str.replace( objRegex, '$1,$2' );
    	}
     
    	return str;
    }



    var realpri = $(this).attr("data-adult");
    
    var Capacity = <?php echo $_SESSION['Capacity']; ?>;
    var adultpri = <?php echo $_SESSION['AdtPrice']; ?>;
    var childpri = 0;
    var infantpri = 0;
    
    var num_adult = <?php echo $vadult ?>;
    var num_child = <?php echo $vchild ?>;
    var num_infant = <?php echo $vinfant ?>;
    var num_all = <?php echo $vadult ?> + <?php echo $vchild ?> + <?php echo $vinfant ?>;


    // S E S I O N S
    sessionStorage.adultpri = adultpri;
    sessionStorage.childpri = childpri;
    sessionStorage.infantpri = infantpri;

    sessionStorage.num_adult = num_adult;
    sessionStorage.num_child = num_child;
    sessionStorage.num_infant = num_infant;
    sessionStorage.num_all = num_all;

    sessionStorage.adultSession = <?php echo $_SESSION['AdtPrice']; ?>;
    sessionStorage.childpriSession = <?php echo $_SESSION['ChdPrice']; ?>;
    sessionStorage.infantpriSession = <?php echo $_SESSION['InfPrice'] ?>;
    sessionStorage.FinalPrice = 0;


    $("#sum_adult").html('<?php echo $vadult ?> بزرگسال:  ' + addComma(adultpri+'0') + '  ریال');
    $("#sum_child").html('<?php echo $vchild ?> کودک: ' + addComma(childpri) + '  ریال');
    $("#sum_infant").html('<?php echo $vinfant ?> نوزاد:  ' + addComma(infantpri) + '  ریال');
    var sumall = parseFloat(adultpri) + parseFloat(childpri) + parseFloat(infantpri);
    $("#sum_all").val(addComma(sumall+'0')+' ریال');
    $("#sum_price").val(sumall+'0');
    sessionStorage.FinalPrice = sumall;


    sessionStorage.count1 = 0;
    sessionStorage.count2 = 0;
    sessionStorage.count3 = 0;
    sessionStorage.countAdd1 = 0;
    sessionStorage.countAdd2 = 0;
    sessionStorage.countAdd3 = 0;


    function closeBOX(x, model) {
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
            $("#sum_adult").html((sessionStorage.num_adult) + ' بزرگسال:  ' + addComma(adultpri_remove+'0') + '  ریال');
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
            $("#sum_child").html((sessionStorage.num_child) + ' کودک:  ' + addComma(child_remove+'0') + '  ریال');
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
            $("#sum_infant").html((sessionStorage.num_infant) + ' نوزاد:  ' + addComma(infant_remove+'0') + '  ریال');
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
        $("#sum_all").val(addComma(sum_all+'0')+' ریال');
        $("#sum_price").val(sum_all+'0');

    }


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
        str2 += '<label for="passport_num_id' + w1 + '">شماره پاسپورت</label>';
        str2 += '<input type="text" class="form-control" id="passport_num_id' + w1 + '" name="passport_num_id' + w1 + '" placeholder="Passport Number" required/>';
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
            $("#sum_adult").html((parseFloat(sessionStorage.num_adult)) + ' بزرگسال:  ' + addComma(adultpri_add+'0') + '  ریال');

            new_id += sessionStorage.countAdd1;

            $("#testID").append(outputrecord(new_id, 'بزرگسال', 'null', 'Adlt', 1000));

            var a = sessionStorage.adultpri;
            var b = sessionStorage.childpri;
            var c = sessionStorage.infantpri;
            sum_add_all = parseFloat(a) + parseFloat(b) + parseFloat(c);
            // alert(sum_add_all);
            // $("#sum_all").html('کل مبلغ: ' + sum_add_all);
            $("#sum_all").val(addComma(sum_add_all+'0')+' ریال');
            $("#sum_price").val(sum_add_all+'0');
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
            $("#sum_child").html((parseFloat(sessionStorage.num_child)) + ' کودک:  ' + addComma(childpri_add+'0')  + '  ریال');

            new_id += sessionStorage.countAdd2;

            $("#testID").append(outputrecord(new_id, 'کودک', 'null', 'Chd', 1000));

            var a = sessionStorage.adultpri;
            var b = sessionStorage.childpri;
            var c = sessionStorage.infantpri;
            sum_add_all = parseFloat(a) + parseFloat(b) + parseFloat(c);
            // alert(sum_add_all);
            // $("#sum_all").html('کل مبلغ: ' + sum_add_all);
            $("#sum_all").val(addComma(sum_add_all+'0')+' ریال');
            $("#sum_price").val(sum_add_all+'0');
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
                $("#sum_infant").html((parseFloat(sessionStorage.num_infant)) + ' نوزاد:  ' + addComma(infantpri_add+'0') + '  ریال');

                new_id += sessionStorage.countAdd3;

                $("#testID").append(outputrecord(new_id, 'نوزاد', 'null', 'Infa', 1000));

                var a = sessionStorage.adultpri;
                var b = sessionStorage.childpri;
                var c = sessionStorage.infantpri;
                sum_add_all = parseFloat(a) + parseFloat(b) + parseFloat(c);
                // $("#sum_all").html('کل مبلغ: ' + sum_add_all);
                $("#sum_all").val(addComma(sum_add_all+'0')+ ' ریال');
                $("#sum_price").val(sum_add_all+'0');
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


    var TerminalTrainID;
    var TrainCode;
    var CabinType;
    var Capacity;
    var SourceCity;
    var SourceCityEn;
    var DestinationCity;
    var DestinationCityEn;
    var TrainName;
    var DepartureDate;
    var DepartureDatePersian;
    var DepartureDateTimeFa;
    var ArrivalDatePersian;
    var ArrivalDateTimeFa;
    
    var pricef;
    var mobile;
    var email;
    var json;

    var i = 0;
    // خرید بلیط
    $('#final_blit_train').click(function() {

        TerminalTrainID = "<?php $_SESSION['SourceCity']; ?>";
        TrainCode = "<?php $_SESSION['SourceCity']; ?>";
        CabinType = "<?php $_SESSION['SourceCity']; ?>";
        Capacity = "<?php $_SESSION['SourceCity']; ?>";
        SourceCity = "<?php $_SESSION['SourceCity']; ?>";
        SourceCityEn = "<?php $_SESSION['SourceCity']; ?>";
        DestinationCity = "<?php $_SESSION['SourceCity']; ?>";
        DestinationCityEn = "<?php $_SESSION['SourceCity']; ?>";
        TrainName = "<?php $_SESSION['SourceCity']; ?>";
        DepartureDate = "<?php $_SESSION['SourceCity']; ?>";
        DepartureDatePersian = "<?php $_SESSION['SourceCity']; ?>";
        DepartureDateTimeFa = "<?php $_SESSION['SourceCity']; ?>";
        ArrivalDatePersian = "<?php $_SESSION['SourceCity']; ?>";
        ArrivalDateTimeFa = "<?php $_SESSION['SourceCity']; ?>";
                                    
        mobile = $('#contact_number').val();
        email = $('#email_user').val();
        
        

        // // var z = '"api_token": "","flight":[{ "avid_ref_code":"safarbooking_12598745","flight_number":"' + FlightNo + '","source":"' + source + '","destination":"' + destination + '","airline":"' + AirlineCode + '","class": "' + CabinType + '","type":"' + FlightType + '","arrival_date_fa":"1398-02-10","arrival_time_fa": "16:30","arrival_date_en": "2020-01-25","arrival_time_en": "16:30", "departure_date_fa": "' + PersianDepartureDate + '","departure_time_fa": "17:30","departure_date_en": "' + DepartureDate + '","departure_time_en": "' + DepartureTime + '"}],"payment": [{ "price": "' + FinalPrice + '","status": "success","dargah": "melli","bank_token": "124sjfplsjkofklshjf"}],"passengers": [ ';
        // // api_token=79xGpvxW8Eb27fuyHdj9S9O2hgnrzwevAASF5Fgntic5GRMBxKtJBorTQceq
        // // "api_token": "MhReUYGiGXZz2UAIAZXSMdAoVBIcGUrUlSAtPAR42RYGQ4eLOl3nnmOvXDmr"

        var z = '[';
        $('.personDet').each(function(i, obj) {
            var myIndex = $(this).attr('personid');

            nameType = $(this).attr('data-typeName');
            if (i == 0) {
                z = z + '{"type":"' + nameType + '","fname_fa":"' + $('#name_farsi' + myIndex).val() + '","lname_fa":"' + $('#surename_farsi' + myIndex).val() + '","fname_en":"' + $('#name_latin' + myIndex).val() + '", "lname_en":"' + $('#surename_latin' + myIndex).val() + '","sex":"' + $('#gender' + myIndex).val() + '","code_melli":"' + $('#code_meli' + myIndex).val() + '","birthday_fa": "' + $('#birth_day_shamsi_y' + myIndex).val() + '-' + $('#birth_day_shamsi_m' + myIndex).val() + '-' + $('#birth_day_shamsi_d' + myIndex).val() + '","birthday_en": "' + $('#birth_day_miladi_y' + myIndex).val() + '-' + $('#birth_day_miladi_m' + myIndex).val() + '-' + $('#birth_day_miladi_d' + myIndex).val() + '", "passport_number":"' + $('#passport_num_id' + myIndex).val() + '","mobile": "' + mobile + '","email": "' + email + '"},';
            } else if (i > 0) {
                z = z + '{"type":"' + nameType + '","fname_fa":"' + $('#name_farsi' + myIndex).val() + '","lname_fa":"' + $('#surename_farsi' + myIndex).val() + '","fname_en":"' + $('#name_latin' + myIndex).val() + '", "lname_en":"' + $('#surename_latin' + myIndex).val() + '","sex":"' + $('#gender' + myIndex).val() + '","code_melli":"' + $('#code_meli' + myIndex).val() + '","birthday_fa": "' + $('#birth_day_shamsi_y' + myIndex).val() + '-' + $('#birth_day_shamsi_m' + myIndex).val() + '-' + $('#birth_day_shamsi_d' + myIndex).val() + '","birthday_en": "' + $('#birth_day_miladi_y' + myIndex).val() + '-' + $('#birth_day_miladi_m' + myIndex).val() + '-' + $('#birth_day_miladi_d' + myIndex).val() + '", "passport_number":"' + $('#passport_num_id' + myIndex).val() + '","mobile": "null","email": "null"},';
            }
        });
        
        z = z.slice(0,-1);
        z = z + ']';
        var json = z.replace(/undefined/gi, "null");
        json = json.replace(/--/g, "null");
        
        // alert(json);
        
        $("#TerminalTrainID").val(TerminalTrainID);
        $("#TrainCode").val(TrainCode);
        $("#CabinType").val(CabinType);
        $("#Capacity").val(Capacity);
        $("#SourceCity").val(SourceCity);
        $("#SourceCityEn").val(SourceCityEn);
        $("#DestinationCity").val(DestinationCity);
        $("#DestinationCityEn").val(DestinationCityEn);
        $("#TrainName").val(TrainName);
        $("#DepartureDate").val(DepartureDate);
        $("#DepartureDatePersian").val(DepartureDatePersian);
        $("#DepartureDateTimeFa").val(DepartureDateTimeFa);
        $("#ArrivalDatePersian").val(ArrivalDatePersian);
        $("#ArrivalDateTimeFa").val(ArrivalDateTimeFa);
        $("#Json").val(json);
        
        
    });

</script>