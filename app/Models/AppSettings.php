<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AppSettings extends Model
{
    use HasFactory;

    protected $fillable = [
        'app_name',
        'app_logo',
        'app_url',
        'contact_number',
        'contact_email',
        'location',
        // 'mail_host',
        // 'mail_port',
        // 'mail_username',
        // 'mail_password',
        // 'mail_encryption',
        // 'mail_from_address',
    ];
}
