<?php
return array(
/** set your paypal credential **/
'client_id' =>'AUU7Bt9BQMoiOpONRV4GtRTdwsOwImDeM6YyT1iMoFXDiMEEFhjSrME3KL1dWIpZNyae9IuFMM4N6B9u',
'secret' => 'EGNgAiCuCjuxRkQ_a6w2yCklFpJNosz5kR-xy9JW10mRm86NlAkGPnzBklXBowhc0J-F966USylsGtyg',
/**
* SDK configuration
*/
'settings' => array(
/**
* Available option 'sandbox' or 'live'
*/
'mode' => 'sandbox',
/**
* Specify the max request time in seconds
*/
'http.ConnectionTimeOut' => 1000,
/**
* Whether want to log to a file
*/
'log.LogEnabled' => true,
/**
* Specify the file that want to write on
*/
'log.FileName' => storage_path() . '/logs/paypal.log',
/**
* Available option 'FINE', 'INFO', 'WARN' or 'ERROR'
*
* Logging is most verbose in the 'FINE' level and decreases as you
* proceed towards ERROR
*/
'log.LogLevel' => 'FINE'
),
);