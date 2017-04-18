<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function formatDate($date) {
    return date(config('const.sitewise_date_format'), strtotime($date));
}
function getGmtTime(){
$serverTime = config('app.timezone');
$timeZoneDiff = config('app.timezone_difference');
$dtz = new \DateTimeZone($serverTime);
$time_in_server = new \DateTime('now', $dtz);
$time_in_server = $time_in_server->add(date_interval_create_from_date_string($timeZoneDiff));
$gmtDifference = $time_in_server->format('Y-m-d H:i:s');
return $gmtDifference;

}

