<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Feature Flags
    |--------------------------------------------------------------------------
    | Central place to toggle experimental / incremental rollout features.
    | Use env vars so production can override without code deploy.
    */

    'gpt5_mini_for_all_clients' => env('FEATURE_GPT5_MINI_ENABLED', true),
];
