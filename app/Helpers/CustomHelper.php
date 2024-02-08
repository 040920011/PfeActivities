<?php

use App\Models\Admin;
use App\Models\Client;
use App\Models\Organizer;
use App\Models\User;

    if (!function_exists('userRole')) {
        function userRole(?User $user = null) {
            if ($user === null ) {
                $user = auth()->user();
            }
            if ($user->userable_type === Admin::class) {
                return 'admin';
            } elseif ($user->userable_type === Organizer::class) {
                return 'organizer';
            } else {
                return 'client';
            }
        }
    }
