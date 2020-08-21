<?php


namespace App\Services\User;

use App\Traits\ChangeGeneralStatusTrait;

class UserChangeStatusService extends UserService
{
    use ChangeGeneralStatusTrait;
}
