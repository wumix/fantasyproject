<?php

/**
 * Created by IntelliJ IDEA.
 * User: zulfiqar
 * Date: 3/17/2017
 * Time: 7:43 PM
 */
return [
    'sitewise_date_format' => 'M jS, Y',
    'sitewise_time_format' => 'H:i:s',
    'email_from' => 'info@gamithonfantasy.com',
    ///////
    //'facebook_redirect' => env('APP_ENV') == 'local' ? 'http://development.gamithonfantasy.com/login/facebook/callback' : 'http://gamithonfantasy.com/login/facebook/callback',
    'facebook_redirect' => env('APP_ENV') == 'local' ? 'http://gamithonfantasy.com/login/facebook/callback' : 'http://gamithonfantasy.com/login/facebook/callback'
];
