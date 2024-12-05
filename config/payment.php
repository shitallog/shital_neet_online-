<?php

return [
    // PhonePe API configuration
    'phonepe' => [
        'merchant_id' => env('PHONEPE_MERCHANT_ID', 'your-merchant-id'),
        'api_key' => env('PHONEPE_API_KEY', 'your-api-key'),
        'callback_url' => env('PHONEPE_CALLBACK_URL', 'frontend.payment_success'),
        'redirect_url' => env('PHONEPE_REDIRECT_URL', 'frontend.payment_success'),

        'production_url' => 'https://api.phonepe.com/apis/hermes/pg/v1/pay',  // Production URL
        
        // Optional configuration for hashing and security
        'salt_index' => 1,  // Index used for salt computation
        'verify_hash' => true,  // Whether to verify the payment hash
    ],
];
