<?php

namespace App\Enums;

use Kongulov\Traits\InteractWithEnum;
enum StatusEnum: string {

    use InteractWithEnum;

    case Accepted = 'accepted';
    case Refused = 'refused';
    case Pending = 'pending';
}
