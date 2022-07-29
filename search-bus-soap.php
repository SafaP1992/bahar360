  
<?php /* Template Name: search-buses */ ?>

<?php //get_header(); ?>


<?php
try{
    // $vfrom_bus = $_POST["from_bus"];
    // $vdest_bus = $_POST["dest_bus"];
    // $vdatepicker_raft_bus = $_POST["datepicker_raft_bus"];
    // echo $vfrom_bus;
    // echo "safa";
    
    // $soapclient = new SoapClient("http://wbs.sepand4.ir/site-v4/server.php?wsdl");
    // $response = $soapclient-> srvReq();
    // var_dump($response);
    
    
    // $SoapClient = new SoapClient("http://wbs.sepand4.ir/site-v4/server.php?wsdl");
    // $soapParameters = array('wbsId' => '701827', 'user' => 'hamidabyat@gmail.com', 'pass' => 'hAmid@123','sCityCode' => 11321006, 'dCityCode' => 31310000,'reqDate' => 13981030, 'reqTime' => 1, 'passCount' => 1);
    
    
    // $SoapClient = new SoapClient("http://wbs.sepand4.ir/site-v4/server.php?wsdl");
    
    // print_r($SoapClient->__getFunctions());
    // $SoapClient->__call('wbsLogin', array('wbsId'=> '701827', 'user' => 'hamidabyat@gmail.com', 'pass' => 'hAmid@123'));
    
    // var_dump($SoapClient);
    
    
    $client = new SoapClient("http://wbs.sepand4.ir/site-v4/server.php?wsdl",array('wbsId'=> '701827', 'user' => 'hamidabyat@gmail.com', 'pass' => 'hAmid@123'));
    $allFunctions = $client->__getFunctions();

var_dump($allFunctions);
    var_dump($client->wbsLogin('701827','pscresume@gmail.com','hAmid@123'));
    // $header = new SoapHeader('http://wbs.sepand4.ir/site-v4/server.php?wsdl/', 
    //                     'wbsLogin',
    //                     '701827', 'hamidabyat@gmail.com', 'hAmid@123');
    //      var_dump($header);
    
    
    
        //$SoapClient->__call('srvReq', array('701827', 'hamidabyat@gmail.com', 'hAmid@123',11321006,31310000,13981030,1,1));
        //var_dump($SoapClient);
//     $soapParameters = array('wbsId' => '701827', 'user' => 'hamidabyat@gmail.com', 'pass' => 'hAmid@123');
    
        
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
        
        // $soapClient = new SoapClient("http://wbs.sepand4.ir/site-v4/server.php?wsdl");
        
        
        // $SoapClient = new SoapClient("http://wbs.sepand4.ir/site-v4/server.php?wsdl");
        
        // print_r($SoapClient->__getFunctions());
        // $SoapClient->__call('wbsLogin', array('701827', 'hamidabyat@gmail.com', 'hAmid@123'));
        // var_dump($SoapClient);
        
        // $header = new SoapHeader('http://wbs.sepand4.ir/site-v4/server.php?wsdl/', 
        //                     'wbsLogin',
        //                     '701827', 'hamidabyat@gmail.com', 'hAmid@123');
        //      var_dump($header);             
             
        //      echo '<br />';
        //      echo '<br />';
        //      echo '<br />';
        
        // $SoapClient->__setSoapHeaders($header);
    
        // $SoapClient->__call('srvReq', array('701827', 'hamidabyat@gmail.com', 'hAmid@123',11321006,31310000,13981030,1,1));
        // var_dump($SoapClient);
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
        
    
//     $client = new SoapClient('http://wbs.sepand4.ir/site-v4/server.php?wsdl');
//   $res    = $client->ItemQuery('wbsLogin');
//   $count  = $res->count;
//   $size   = $res->size;
//   print "count=$count, size=$size\n";
   
    
//     $response = $SoapClient->__call ( 'wbsLogin' , $soapParameters );
//     var_dump($response);
    
    
    
    //     $SoapClient = new SoapClient("http://www.holidaywebservice.com/HolidayService_v2/HolidayService2.asmx?wsdl");
    // $soapParameters = array('countryCode' => "Scotland", 'year' => "2018");
    // $response = $SoapClient-> GetHolidaysForYear($soapParameters);
    // var_dump($response);
    
    
    
    
    
    
    
    
    
    // $soapResult = $SoapClient->__soapCall($soapFunction, $soapFunctionParameters) ;
    // if(is_array($soapResult) && isset($soapResult['someFunctionResult'])) {
    //     // Process result.
    // } else {
    //     // Unexpected result
    //     if(function_exists("debug_message")) {
    //         debug_message("Unexpected soapResult for {$soapFunction}: ".print_r($soapResult, TRUE)) ;
    //     }
    // }
    
    
    
    
    
    
    

// return;
//     $params = array(
//       "id" => 100,
//       "name" => "John",
//       "description" => "Barrel of Oil",
//       "amount" => 500,
//     );
//     $response = $client->__soapCall("Function1", array($params));
    
    
    
}catch(Exeption $e){
    echo $e->getMessage();
}
    
    
?>



<?php //get_footer(); ?>