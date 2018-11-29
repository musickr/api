<?php
/**
 * Created by PhpStorm.
 * User: 13458
 * Date: 2018/11/30
 * Time: 0:08
 */
return [
    'proxy' => [
        'grant_type'    => env('OAUTH_GRANT_TYPE'),
        'client_id'     => env('OAUTH_CLIENT_ID'),
        'client_secret' => env('OAUTH_CLIENT_SECRET'),
        'scope'         => env('OAUTH_SCOPE', '*'),
    ],
];
