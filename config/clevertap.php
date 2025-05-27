<?php

return [
    /*
    |--------------------------------------------------------------------------
    | CleverTap API Settings
    |--------------------------------------------------------------------------
    |
    | This file contains the necessary settings for CleverTap API integration.
    | You can configure your account information and other options here.
    |
    */

    // CleverTap account credentials
    'account_id' => env('CLEVERTAP_ACCOUNT_ID', ''),
    'passcode' => env('CLEVERTAP_PASSCODE', ''),
];