<?php

return [
    'webhook_url' => env('SLACK_WEBHOOK_URL', ''),

    // You can specify the inputs from the user that should not be sent to Slack
    'ignore_request_fields' => ['password', 'confirm_password']
];
