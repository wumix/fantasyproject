<?php
return array(
/** set your paypal credential **/
'client_id' =>'Adv3TyenJdmbh7bX6d5kRxmupGw0L_hbIu-YqD7x7v4sXoZeiDOTrKFgNvxVSC1S_0AircPimWS673Nu',
'secret' => 'EPDJAcyBJyznHdqe9FpsO4VPiw1G5yJDEEfwmYsaOGWNDxabf4zKXVrVDo_TYP8jeTbCMoIGGopFjHn7',
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