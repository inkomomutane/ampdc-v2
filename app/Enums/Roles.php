<?php

namespace App\Enums;

enum Roles : string
{
    case SUPER_ADMIN = 'Super admin';
    case ADMIN = 'Admin';
    case NORMAL = 'Normal';
    case FOCAL_POINT = 'Ponto-focal';
    case WRITER = 'Criador de posts';
}
