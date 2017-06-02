<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function formatDate($date) {
    return date(config('const.sitewise_date_format'), strtotime($date));
}
function formatTime($date) {
    return date(config('const.sitewise_time_format'), strtotime($date));
}
function formatDay($date) {
    return date(config('dd'), strtotime($date));
}
function formatMonth($date) {
    return date(config('m'), strtotime($date));
}


function getServerTimeAsGMT()
{
    $timestamp = localtime();
    $timestamp[5] += 1900;
    $timestamp[4]++;
    for ($i = 0; $i <= 9; $i++) {
        if ($timestamp[0] == $i) {
            $newValue = "0" . $i;
            $timestamp[0] = $newValue;
        }
    }
    for ($i = 0; $i <= 9; $i++) {
        if ($timestamp[1] == $i) {
            $newValue = "0" . $i;
            $timestamp[1] = $newValue;
        }
    }

    $this->timestamp = $timestamp[5] . "-" . $timestamp[4] . "-" . $timestamp[3] . " " . $timestamp[2] . ":" . $timestamp[1] . ":" . $timestamp[0];
    $this->timestamp = strtotime($this->timestamp);
    return $this->timestamp;
}
function getGmtTime() {
    $serverTime = config('app.timezone');
    $timeZoneDiff = config('app.timezone_difference');
    $dtz = new \DateTimeZone($serverTime);
    $time_in_server = new \DateTime('now', $dtz);
    $time_in_server = $time_in_server->add(date_interval_create_from_date_string($timeZoneDiff));
    $gmtDifference = $time_in_server->format('Y-m-d H:i:s');
    return $gmtDifference;
}
