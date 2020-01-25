<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use mobacode\Roles\Traits\HasRoleAndPermission;

class User extends Model
{
    use HasRoleAndPermission;
}