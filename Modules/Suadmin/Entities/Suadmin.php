<?php

namespace Modules\Suadmin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class suadmin extends Model
{
    use HasFactory;

    protected $fillable = ['su_id', 'su_name', 'su_email', 'su_mobile', 'su_pwd', 'su_status', 'su_otp_status'];

    protected static function newFactory()
    {
        return \Modules\Suadmin\Database\factories\SuadminFactory::new();
    }
}
