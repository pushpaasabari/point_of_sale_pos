<?php

namespace Modules\Suadmin\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_sno',
        'user_type',
        'user_name',
        'user_id',
        'user_pwd',
        'user_mobile',
        'user_email',
        'user_address',
        'user_id_proof',
        'user_id_proof_image',
        'user_created_on',
        'user_updated_on',
        'user_otp_status',
        'user_status'
    ];

    protected static function newFactory()
    {
        return \Modules\Suadmin\Database\factories\UserFactory::new();
    }
}
