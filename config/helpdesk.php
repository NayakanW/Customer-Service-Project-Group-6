<?php

return [
    'leads'           => env('HELPDESK_LEADS_ENABLED', true),
    'roadmap'         => env('HELPDESK_ROADMAP_ENABLED', true),
    'sendRatingEmail' => env('HELPDESK_RATING_EMAIL_ENABLED', true),
    'api_token'       => env('API_TOKEN', 'the-api-token'),
];
