<?php

namespace App\Enums;

enum TableStatusEnum:string
{
    case Pending = 'pending';
    case Avalaiable = 'avaliable';
    case Unavaliable = 'unavaliable';
}
