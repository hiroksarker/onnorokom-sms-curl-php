<?php

/*
    NOTE: 
    Please visit our OnnoRokom SMS User Panel
    Check Developer API Documentation Page 16-17 
    for Rest API Example. Below given GET and POST example.    
*/

//POST METHOD (Only API KEY)
/*
    NumberSms - Single and Mutiple Number(Comma sepreated value) Sms Send Method
    ListSms - Each and every number contains individual message (json format)
    SMSDeliveryStatus - SMS status check
*/


//Parameter
/*
    GetCurrentBalance Balance Check
    username - User name which is used for login
    password - Password
    smsText - Text or UCS
    mobile - Valid recipient number or list of number
    type - Sms Type See Below
    maskName - Mask Name which is allowed to your client panel
    campaignName - Campaign Name
*/

//Curl Example
//GET REQUEST

$get_url = 'https://api2.onnorokomsms.com/HttpSendSms.ashx?op=OneToMany';

//Options parameters
$get_values = array(
    'username'      => '', //USERNAME
    'password'      => '', //PASSWORD
    'type'          => 'TEXT',   
    'mobile'        => '', // Single, Mutiple number (comma separated mobile number)
    'smsText'       => 'Hello world', //Message 
    'maskName'      => '',
    'campaignName'  => ''
);

$get_string = "";
foreach ($get_values as $key => $value) {
    $get_string .= "$key=" . urlencode($value) . "&";
}
$get_string = rtrim($get_string, "& ");

//url join with options paramerts
$request_url = $get_url . "&" . $get_string;

//curl init
$request = curl_init($request_url);
curl_setopt($request, CURLOPT_HEADER, 0);
curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($request, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($request, CURLOPT_SSL_VERIFYPEER, FALSE);
//execute curl
$get_response = curl_exec($request);
//curl close
curl_close($request);
//print response value
print_r($get_response);

?>