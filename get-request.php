<?php

/*
    NOTE: 
    Please visit our OnnoRokom SMS User Panel
    Check Developer API Documentation Page 16-17 
    for Rest API Example. Below given GET and POST example.    
*/


//GET METHOD (USERNAME and PASSWORD)
/*
    OneToOne - Single Sms Send Method
    OneToMany - Bulk Sms Method (Comma sepreated value)
    DeliveryStatus - Return Delivery Status
    GetBalance - Balance Check
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
//POST REQUEST

$post_url = 'https://api2.onnorokomsms.com/HttpSendSms.ashx?';

//Options parameters
$post_values = array(
    'op'            => 'NumberSms', // Request Method (As per your requirement)
    'apiKey'        => '', //API KEY (Our User Panel)
    'type'          => 'TEXT',   
    'mobile'        => '', // Single, Mutiple number (comma separated mobile number)
    'smsText'       => urlencode('Hello world'), //Message 
    'maskName'      => '',
    'campaignName'  => ''
);

$post_string = "";
foreach ($post_values as $key => $value) {
    $post_string .= "$key=" . $value . "&";
}
$post_string = rtrim($post_string, "& ");
//curl init
$request = curl_init($post_url);
curl_setopt($request, CURLOPT_HEADER, 0);
curl_setopt($request, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($request, CURLOPT_POSTFIELDS, $post_string);
curl_setopt($request, CURLOPT_SSL_VERIFYPEER, FALSE);
//execute curl
$post_response = curl_exec($request);
//curl close
curl_close($request);
//print response value
print_r($post_response);

?>
