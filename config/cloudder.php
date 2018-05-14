<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Cloudinary API configuration
    |--------------------------------------------------------------------------
    |
    | Before using Cloudinary you need to register and get some detail
    | to fill in below, please visit cloudinary.com.
    |
    */

    'cloudName'  => 'posystemcloud',
    'baseUrl'    => 'CLOUDINARY_BASE_URL', 'http://res.cloudinary.com/posystemcloud',
    'secureUrl'  => 'CLOUDINARY_SECURE_URL', 'https://res.cloudinary.com/posystemcloud',
    'apiBaseUrl' => 'https://api.cloudinary.com/v1_1/posystemcloud',
    'apiKey'     => '682355912675965',
    'apiSecret'  => 'KfAXEik_TBf98b2mRt18TtZFMpk',

    'scaling'    => [
        'format' => 'png',
        'width'  => 150,
        'height' => 150,
        'crop'   => 'fit',
        'effect' => null
    ],

];


/**
CLOUDINARY_API_KEY = 682355912675965
CLOUDINARY_API_SECRET = KfAXEik_TBf98b2mRt18TtZFMpk
CLOUDINARY_CLOUD_NAME = posystemcloud

 */