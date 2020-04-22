<?php

return [
    /*
     * The Api Key of your Serpstack account.
     */
    'api_key' => env('SERPSTACK_API_KEY'),

    /*
     * Should the connection run over HTTPS
     */
    'secure'=> env('SERPSTACK_SECRUE', true),
];
