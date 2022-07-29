  <?php /* Template Name: search-bus-info */ ?>

  <?php get_header(); ?>

  <?php

    // $TerminalBusID = $_POST['TerminalBusID'];
    // $BusCode = $_POST['BusCode'];
    // $Class = $_POST['Class'];
    // $Type = $_POST['Type'];
    // $BusName = $_POST['BusName'];
    // $BusTerminalName = $_POST['BusTerminalName'];
    // $NumberSeats = $_POST['NumberSeats'];
    // $Capacity = $_POST['Capacity'];
    // $Price = $_POST['Price'];
    // $Source = $_POST['Source'];
    // $SourceEn = $_POST['SourceEn'];
    // $Destination = $_POST['Destination'];
    // $DestinationEn = $_POST['DestinationEn'];
    // $SourceCity = $_POST['SourceCity'];
    // $SourceCityEn = $_POST['SourceCityEn'];
    // $DestinationCity = $_POST['DestinationCity'];
    // $DestinationCityEn = $_POST['DestinationCityEn'];
    // $URL = $_POST['URL'];
    // $DepartureTerminalCode = $_POST['DepartureTerminalCode'];
    // $DepartureDate = $_POST['DepartureDate'];
    // $DepartureTime = $_POST['DepartureTime'];
    // $DepartureDateTimeFa = $_POST['DepartureDateTimeFa'];
    // $ArrivalTerminalCode = $_POST['ArrivalTerminalCode'];
    // $ArrivalDate = $_POST['ArrivalDate'];
    // $ArrivalTime = $_POST['ArrivalTime'];
    // $ArrivalDateTimeFa = $_POST['ArrivalDateTimeFa'];



    $_SESSION['TerminalBusID'] = $_POST['TerminalBusID'];
    $_SESSION['BusCode'] = $_POST['BusCode'];
    $_SESSION['Class'] = $_POST['Class'];
    $_SESSION['Type'] = $_POST['Type'];
    $_SESSION['BusName'] = $_POST['BusName'];
    $_SESSION['BusTerminalName'] = $_POST['BusTerminalName'];
    $_SESSION['NumberSeats'] = $_POST['NumberSeats'];
    $_SESSION['Capacity'] = $_POST['Capacity'];
    $_SESSION['Price'] = $_POST['Price'];
    $_SESSION['Source'] = $_POST['Source'];
    $_SESSION['SourceEn'] = $_POST['SourceEn'];
    $_SESSION['Destination'] = $_POST['Destination'];
    $_SESSION['DestinationEn'] = $_POST['DestinationEn'];
    $_SESSION['SourceCity'] = $_POST['SourceCity'];
    $_SESSION['SourceCityEn'] = $_POST['SourceCityEn'];
    $_SESSION['DestinationCity'] = $_POST['DestinationCity'];
    $_SESSION['DestinationCityEn'] = $_POST['DestinationCityEn'];
    $_SESSION['URL'] = $_POST['URL'];
    $_SESSION['DepartureTerminalCode'] = $_POST['DepartureTerminalCode'];
    $_SESSION['DepartureDate'] = $_POST['DepartureDate'];
    $_SESSION['DepartureTime'] = $_POST['DepartureTime'];
    $_SESSION['DepartureDateTimeFa'] = $_POST['DepartureDateTimeFa'];
    $_SESSION['ArrivalTerminalCode'] = $_POST['ArrivalTerminalCode'];
    $_SESSION['ArrivalDate'] = $_POST['ArrivalDate'];
    $_SESSION['ArrivalTime'] = $_POST['ArrivalTime'];
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
                  <div class="col-12 card4 p-3 mt-2">
                      <div class="row">
                          <div class="col-sm-12 col-md-12 col-lg-2 col-xl-2 text-center">
                              <img class="rounded-circle" src="<?php echo $_SESSION['URL']; ?>">
                              <p><?php echo $_SESSION['BusTerminalName']; ?></p>
                          </div>

                          <div class="col-sm-12 col-md-12 col-lg-10 col-xl-8">
                              <div class="row">
                                  <div class="destination-aircraft col-md-5 col-sm-6 text-right">
                                      <span><?php echo $_SESSION['NumberSeats']; ?> نفره</span>
                                      <br />
                                      <span>باقیمانده: <?php echo $_SESSION['Capacity']; ?></span>
                                  </div>
                              </div>

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
                                      <i class="icon fas fa-bus"></i>
                                  </div>

                                  <div class="destination-map__to pull-left col-3 col-sm-2 col-md-2 col-lg-2 col-xl-4">
                                      <strong class="to"><?php echo $_SESSION['DestinationCity']; ?></strong>
                                      <strong class="time"><?php echo $_SESSION['ArrivalTime']; ?></strong>
                                  </div>
                              </div>


                          </div>

                          <div class="col-sm-12 col-md-12 col-lg-12 col-xl-2 line">
                              <p class="text-center mt-5 price-card price" id="Price" data-price="5516000"><?php echo $_SESSION['Price']; ?> ریال</p>
                              <p class="text-center mt-2 price-card price2" id="price2" style="display: none;"><?php echo $_SESSION['Price']; ?></p>
                              </span>
                              <!-- <button class="btn btn-primary btn-block pull-left available-btn-action my-2">
                                    <span>انتخاب بلیط</span>
                                </button> -->
                          </div>
                      </div>
                  </div>

                  <div class="col-12 card4 mt-4 text-center">
                      <p> سرویسی که انتخاب کرده اید بین راهی بوده بنابراین مقصد نهایی اتوبوس کلاچاي می باشد، پس دقت کنید مسئولیت مطلع کردن راننده برای پیاده شدن بر عهده خود شماست.</p>
                  </div>

                  <div id="box" class="numDiv">

                      <div class="col-12 card4 p-3 my-4">

                          <div class="title_bus_blit">
                              <h5> صندلی و مشخصات مسافران را انتخاب و وارد کنید </h5>
                              <span style="margin-right:15px; color:#b01717; font-size: 16px;">باقیمانده: <?php echo $_SESSION['Capacity']; ?></span>
                          </div>

                          <div class="row bus-box">

                              <div class="col-12 col-md-5 col-lg-4">
                                  <div class="rules-bus">
                                      <p>جایی که دوست دارید بنشینید را در تصویر مشخص کنید.</p>
                                      <p>اگر بیش از یک نفر هستید، کافی است بر روی تعداد بیشتری از صندلی‌ها کلیک کنید.</p>
                                      <p>کلیک دوباره روی هر کدام از صندلی‌ها، آن‌ها را از وضعیت انتخاب‌شده خارج می‌کند.</p>
                                      <p>به دلایل قانونی امکان رزرو ردیف اول توسط بانوان میسر نیست!</p>
                                      <p>برای پیشگیری از مشکلات بعدی، لطفا به جنسیت مسافر صندلی مجاور توجه فرمایید.</p>
                                  </div>
                              </div>


                              <div class="col-12 col-md-7 col-lg-8">
                                  <div class="row p-5 body-bus">
                                      <!-- <div class=""> -->
                                      <div class="col-1 p-0">
                                          <!-- <div class="back-bus"></div> -->
                                          <img class="back-bus" src="<?php bloginfo('template_url'); ?>/images/back.png" alt="back">
                                      </div>

                                      <?php
                                        $seats = $_SESSION['NumberSeats'];
                                        ?>

                                      <div class="col-10 p-4">

                                          <?php
                                            $seats_divide = $seats / 3;
                                            $count = 0;
                                            $row = 0;
                                            $column = 0;
                                            $w = 1;

                                            while ($w <= 3) {
                                                $row++;
                                                if ($w == 3) {
                                                    $top = 'mt-5';
                                                } else {
                                                    $top = 'mt-3';
                                                }
                                            ?>
                                              <div class="row <?php echo $top; ?>">

                                                  <?php
                                                    for ($i = 1; $i <= $seats_divide; $i++) {
                                                        $count++;
                                                        $column++;
                                                        if ($i == 3 and $w < 3) {
                                                    ?>
                                                          <div class="space"></div>
                                                      <?php
                                                        }
                                                        ?>
                                                      <div class="bus-seats" id="r<?php echo $row ?>c<?php echo $column ?>">
                                                          <img src="<?php bloginfo('template_url'); ?>/images/chair/Blue.png" class="img-responsive" />
                                                          <p><?php echo $count; ?></p>
                                                      </div>
                                                  <?php
                                                    }
                                                    ?>
                                              </div>
                                          <?php
                                                $w++;
                                            }
                                            ?>
                                      </div>


                                      <div class="col-1 p-0">
                                          <!-- <!-- <div class="front-bus"></div> -->
                                          <img class="front-bus" src="<?php bloginfo('template_url'); ?>/images/front.png" alt="front">
                                      </div>
                                      <!-- </div> -->
                                  </div>
                              </div>

                          </div>
                      </div>

                  </div>


                  <div class="title_blit" data-name="Adlt">
                      <h5>سرپرست مسافران</h5>
                  </div>

                  <form method="POST" action="<?php bloginfo('template_url'); ?>/pay2/payment.php">
                      <div class="row text-right select_item_border personDet" data-typeName="master" personid="1">

                          <div id="info_'$count_passenger'">
                              <div class="row">
                                  <div class="col-sm-12 col-md-2 mt-3">
                                      <label for="name_farsi">نام</label>
                                      <input type="text" class="form-control" id="name_farsi" name="name_farsi" placeholder="نام" required />
                                  </div>
                                  <div class="col-sm-12 col-md-3 mt-3">
                                      <label for="surename_farsi">نام خانوادگی</label>
                                      <input type="text" class="form-control" id="surename_farsi" name="surename_farsi" placeholder="نام خانوادگی" required />
                                  </div>
                                  <div class="col-sm-12 col-md-2 mt-3">
                                      <label for="gender">جنسیت</label>
                                      <select class="form-control" id="gender" name="gender" required>
                                          <option value="Male">مرد</option>
                                          <option value="Female">زن</option>
                                      </select>
                                  </div>
                                  <div class="col-sm-12 col-md-2 mt-3">
                                      <label for="code_meli">کد ملی</label>
                                      <input type="text" class="form-control" id="code_meli" name="code_meli" placeholder="کد ملی" min="100000000" max="9999999999" maxlength="10" required />
                                  </div>
                                  <div class="col-sm-12 col-md-3 mt-3">
                                      <label for="mobile_num">شماره موبایل</label>
                                      <input type="text" class="form-control" id="mobile_num" name="mobile_num" placeholder="شماره موبایل" min="0000000000" max="0999999999" maxlength="11" required />
                                  </div>
                              </div>
                          </div>
                      </div>

                      <div class="col-12 card4 my-4 p-3 text-center">
                          <!--<div class="col-12 col-md-8 text-center">-->
                          <!--    <div class="row">-->
                          <!--<div class="form-inline">-->
                          <!--    <input type="checkbox" class="form-control" style="margin-left:10px" required />-->
                          <!--    <span>قوانین سایت و قوانین اتوبوس را مطالعه کردم و آن را تایید می کنم.</span>-->
                          <!--</div>-->
                          <!--    </div>-->
                          <!--</div>-->
                          <div class="row text-center">
                              <div class="col-12 col-md-8">
                                  <div class="price-bus">
                                      <input type="text" class="" id="sum_all" name="sum_all" value="" readonly />
                                      <p id="number"></p>
                                  </div>
                              </div>

                              <input type="hidden" name="TerminalBusID" id="TerminalBusID" value="" />
                              <input type="hidden" name="BusCode" id="BusCode" value="" />
                              <input type="hidden" name="Class" id="Class" value="" />
                              <input type="hidden" name="Type" id="Type" value="" />
                              <input type="hidden" name="BusName" id="BusName" value="" />
                              <input type="hidden" name="BusTerminalName" id="BusTerminalName" value="" />
                              <input type="hidden" name="NumberSeats" id="NumberSeats" value="" />
                              <input type="hidden" name="Capacity" id="Capacity" value="" />
                              <input type="hidden" name="Pricef" id="Pricef" value="" />
                              <input type="hidden" name="Source" id="Source" value="" />
                              <input type="hidden" name="SourceEn" id="SourceEn" value="" />
                              <input type="hidden" name="Destination" id="Destination" value="" />
                              <input type="hidden" name="DestinationEn" id="DestinationEn" value="" />
                              <input type="hidden" name="SourceCity" id="SourceCity" value="" />
                              <input type="hidden" name="SourceCityEn" id="SourceCityEn" value="" />
                              <input type="hidden" name="DestinationCity" id="DestinationCity" value="" />
                              <input type="hidden" name="DestinationCityEn" id="DestinationCityEn" value="" />
                              <input type="hidden" name="URL" id="URL" value="" />
                              <input type="hidden" name="DepartureTerminalCode" id="DepartureTerminalCode" value="" />
                              <input type="hidden" name="DepartureDate" id="DepartureDate" value="" />
                              <input type="hidden" name="DepartureTime" id="DepartureTime" value="" />
                              <input type="hidden" name="DepartureDateTimeFa" id="DepartureDateTimeFa" value="" />
                              <input type="hidden" name="ArrivalTerminalCode" id="ArrivalTerminalCode" value="" />
                              <input type="hidden" name="ArrivalDate" id="ArrivalDate" value="" />
                              <input type="hidden" name="ArrivalTime" id="ArrivalTime" value="" />
                              <input type="hidden" name="ArrivalDateTimeFa" id="ArrivalDateTimeFa" value="" />

                              <input type="hidden" name="NumberPeople" id="NumberPeople" value="" />
                              <input type="hidden" name="Chairs" id="Chairs" value="" />
                              <input type="hidden" name="Json" id="Json" value="" />

                              <div class="col-12 col-md-4">
                                  <input type="submit" class="btn btn-primary" id="final_blit_bus" name="final_blit_bus" value="رزور و خرید" />
                              </div>
                          </div>
                      </div>

                  </form>
              </div>
          </div>
      </div>


  </div>
  </div>



  <?php get_footer(); ?>

  <script>
      var capacity = <?php echo $_SESSION['Capacity']; ?>;
      var price = <?php echo $_SESSION['Price'] ?>;
      sessionStorage.periceSession = price;

      $('#Price').text(addComma(price + '0'));
      $('#number').text('تعداد: 0');

      // $("#sum_all").val(addComma(price+'0'));
      function addComma(str) {
          var objRegex = new RegExp('(-?[0-9]+)([0-9]{3})');
          while (objRegex.test(str)) {
              str = str.replace(objRegex, '$1,$2');
          }
          return str;
      }

      var number = 0;
      var chairs = [];

      $(document).ready(function() {


          $('.bus-seats').click(function() {
              // $(this).css("background-color","#12f4f4");
              // var color = $(this).next().attr("src");

              chairs.push($(this).prop('id'));
              var str = $(this).prop('id');

              var color = $(this).children('img').attr("src");
              if (color == '<?php bloginfo('template_url'); ?>/images/chair/Blue.png') {
                  $(this).children('img').attr("src", "<?php bloginfo('template_url'); ?>/images/chair/Yellow.png");
                  number++;
                  price = parseFloat(sessionStorage.periceSession) * number;
              } else if (color == '<?php bloginfo('template_url'); ?>/images/chair/Yellow.png') {
                  $(this).children('img').attr("src", "<?php bloginfo('template_url'); ?>/images/chair/Blue.png");
                  number--;
                  price = parseFloat(sessionStorage.periceSession) * number;

                  for (var i = 0; i < chairs.length; i++) {
                      if (chairs[i] === str) {
                          chairs.splice(i, 1);
                          i--;
                      }
                  }
              }

              if (capacity < number) {
                  // alert('بیشتر از این مجاز نیست، به باقی مانده ظرفیت توجه کنید.');
                  $.fancybox.open('<div class="message"><h4>بیشتر از این مجاز نیست، به باقی مانده ظرفیت توجه کنید.</h4></div>');
                  $(this).children('img').attr("src", "<?php bloginfo('template_url'); ?>/images/chair/Blue.png");
                  number--;
                  price = parseFloat(sessionStorage.periceSession) * number;

                  for (var i = 0; i < chairs.length; i++) {
                      if (chairs[i] === str) {
                          chairs.splice(i, 1);
                          i--;
                      }
                  }
              }

              if (number == 0) {
                  $("#sum_all").val('0 ریال');
                  $('#number').text('تعداد: ' + number);
              } else {
                  $("#sum_all").val(addComma(price + '0') + 'ریال');
                  $('#number').text('تعداد: ' + number);
              }


              // alert(chairs); 
              // $('#row' + seatRow + 'seat' + seatNo + ' img').attr("src", "images/chair/Red.png");
              // $('#row' + seatRow + 'seat' + seatNo).addClass('chairBuy').removeClass('chairActive');
          });


          var TerminalBusID = "<?php echo $_SESSION['TerminalBusID'] ?>";
          var BusCode = "<?php echo $_SESSION['BusCode'] ?>";
          var Class = "<?php echo $_SESSION['Class'] ?>";
          var Type = "<?php echo $_SESSION['Type'] ?>";
          var BusName = "<?php echo $_SESSION['BusName'] ?>";
          var BusTerminalName = "<?php echo $_SESSION['BusTerminalName'] ?>";
          var NumberSeats = "<?php echo $_SESSION['NumberSeats'] ?>";
          var Capacity = "<?php echo $_SESSION['Capacity'] ?>";
          var Source = "<?php echo $_SESSION['Source'] ?>";
          var SourceEn = "<?php echo $_SESSION['SourceEn'] ?>";
          var Destination = "<?php echo $_SESSION['Destination'] ?>";
          var DestinationEn = "<?php echo $_SESSION['DestinationEn'] ?>";
          var SourceCity = "<?php echo $_SESSION['SourceCity'] ?>";
          var SourceCityEn = "<?php echo $_SESSION['SourceCityEn'] ?>";
          var DestinationCity = "<?php echo $_SESSION['DestinationCity'] ?>";
          var DestinationCityEn = "<?php echo $_SESSION['DestinationCityEn'] ?>";
          var URL = "<?php echo $_SESSION['URL'] ?>";
          var DepartureTerminalCode = "<?php echo $_SESSION['DepartureTerminalCode'] ?>";
          var DepartureDate = "<?php echo $_SESSION['DepartureDate'] ?>";
          var DepartureTime = "<?php echo $_SESSION['DepartureTime'] ?>";
          var DepartureDateTimeFa = "<?php echo $_SESSION['DepartureDateTimeFa'] ?>";
          var ArrivalTerminalCode = "<?php echo $_SESSION['ArrivalTerminalCode'] ?>";
          var ArrivalDate = "<?php echo $_SESSION['ArrivalDate'] ?>";
          var ArrivalTime = "<?php echo $_SESSION['ArrivalTime'] ?>";
          var ArrivalDateTimeFa = "<?php echo $_SESSION['ArrivalDateTimeFa'] ?>";



          $("#final_blit_bus").click(function() {
              //  if(number != 0){
              // var z = '[';
              $('.personDet').each(function(i, obj) {
                  var myIndex = $(this).attr('personid');
                  nameType = $(this).attr('data-typeName');

                  // {"api_token": "123456789987654321","bus":[{ "avid_ref_code":"safarbooking_12598745","bus_number":"205623","source":"RAS","destination":"THR","bus_code":"3205","departure_date_fa":1398-05-15"}],
                  z = '[{"type":"' + nameType + '","fname_fa":"' + $('#name_farsi').val() + '","lname_fa":"' + $('#surename_farsi').val() + '","sex":"' + $('#gender').val() + '","code_melli":"' + $('#code_meli').val() + '","mobile": "' + $('#mobile_num').val() + '","number_of_people": "' + number + '", "chairs":"' + chairs + '"}]';
              });
              // z = z.slice(0, -1);
              // z = z + ']';
              var json = z.replace(/undefined/gi, "NULL");
              json = json.replace(/--/g, "NULL");
              // alert(json);
              // }else{
              //     $.fancybox.open('<div class="message"><h4>شما جای صندلی را مشخص ننمودید.</h4></div>');
              // }

              $("#TerminalBusID").val(TerminalBusID);
              $("#BusCode").val(BusCode);
              $("#Class").val(Class);
              $("#Type").val(Type);
              $("#BusName").val(BusName);
              $("#BusTerminalName").val(BusTerminalName);
              $("#NumberSeats").val(NumberSeats);
              $("#Capacity").val(Capacity);
              $("#Source").val(Source);
              $("#SourceEn").val(SourceEn);
              $("#Destination").val(Destination);
              $("#DestinationEn").val(DestinationEn);
              $("#SourceCity").val(SourceCity);
              $("#SourceCityEn").val(SourceCityEn);
              $("#DestinationCity").val(DestinationCity);
              $("#DestinationCityEn").val(DestinationCityEn);
              $("#URL").val(URL);
              $("#DepartureTerminalCode").val(DepartureTerminalCode);
              $("#DepartureDate").val(DepartureDate);
              $("#DepartureTime").val(DepartureTime);
              $("#DepartureDateTimeFa").val(DepartureDateTimeFa);
              $("#ArrivalTerminalCode").val(ArrivalTerminalCode);
              $("#ArrivalDate").val(ArrivalDate);
              $("#ArrivalTime").val(ArrivalTime);
              $("#ArrivalDateTimeFa").val(ArrivalDateTimeFa);

              $("#Pricef").val(price);
              $("#NumberPeople").val(number);
              $("#Chairs").val(chairs);
              $("#Json").val(json);
          });

          // $('#final_blit_bus').click(function() {

          // });



      });
  </script>