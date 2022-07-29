
<?php




try {

echo 'server';

    // $request = @file_get_contents("http://185.176.32.61:8080/webradar.aspx?from=THR&to=SYZ&adult=1&child=0&infant=0&date=1398-11-30&t=y.json");
    // $request = @file_get_contents("http://94.183.35.138:8030/api/v1/token?username=09153450308&password=123456");
    // $json = json_decode($request, true);
    // // var_dump($json);

    // //write to json file
    // $fp = fopen('news.json', 'w');
    // fwrite($fp, json_encode($request, JSON_UNESCAPED_UNICODE));
    // fclose($fp);




    /*************
        LOGIN GET
     **************/
    $curl = curl_init();
    curl_setopt_array($curl, [
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'http://94.183.35.138:8030/api/v1/token?username=09153450308&password=123456',
    ]);
    $resp = curl_exec($curl);
    curl_close($curl);
    $resp_decode = json_decode($resp);
    // echo $resp_decode->token;




    if (isset($_POST['insert'])) {

        $json = $_POST['passengers'];
        // echo $json;
        /*****************
                RESERVE POST
         ******************/
        $curl2 = curl_init();
        // Sample
        // $params_array = $json;
        $FlightNo = $_POST['flight_number'];
        $source = $_POST['source'];
        $destination = $_POST['destination'];
        $AirlineCode = $_POST['airline'];
        $CabinType = $_POST['classs'];
        $FlightType = $_POST['type'];
        $PersianDepartureDate = $_POST['departure_date_fa'];
        $DepartureDate = $_POST['departure_date_en'];
        $DepartureTime = $_POST['departure_time_en'];
        $FinalPrice = $_POST['price'];

        $params_array = array(
            'api_token' => $resp_decode->token,
            'flight' => array(
                'avid_ref_code' => 'safarbooking_12598745',
                'flight_number' => $FlightNo,
                'source' => $source,
                'destination' => $destination,
                'airline' => $AirlineCode,
                'class' => $CabinType,
                'type' => $FlightType,
                'arrival_date_fa' => '1398-02-10',
                'arrival_time_fa' => '16:30',
                'arrival_date_en' => '2020-01-25',
                'arrival_time_en' => '16:30',
                'departure_date_fa' => $PersianDepartureDate,
                'departure_time_fa' => '17:30',
                'departure_date_en' => $DepartureDate,
                'departure_time_en' => $DepartureTime
            ),
            'payment' => array(
                'price' => $FinalPrice,
                'status' => 'success',
                'dargah' => 'melli',
                'bank_token' => '124sjfplsjkofklshjf'
            ),
            'passengers' => $json
        );

        $params = http_build_query($params_array);
        // $params = $params_array;
        curl_setopt_array($curl2, [
            CURLOPT_RETURNTRANSFER => 1,
            CURLOPT_URL => 'http://94.183.35.138:8030/api/v1/flight/reserve',
            CURLOPT_POST => 1,
            CURLOPT_POSTFIELDS => $params
        ]);
        $resp2 = curl_exec($curl2);
        curl_close($curl2);
        // json_encode($resp2, JSON_UNESCAPED_UNICODE);
        echo $resp2;
        $resp2_decode = json_decode($resp2);
        // echo $resp2_decode->data->api_token;
        // echo $resp2_decode->data->passengers;
        // echo $resp2_decode;
        // echo $resp2_decode->data->flight->source;
        // echo 'success';
    }
} catch (Exception $e) {
    echo "ERROR : Error!";
    print_r($e);
}

?> 
