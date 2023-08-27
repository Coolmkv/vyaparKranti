<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactUsModel extends Model
{
    use HasFactory;

    protected $table = "contact_us";

    const ID = "id";
    const NAME = "name";
    const EMAIL_ID = "email_id";
    const CONTACT_NUMBER = "contact_number";
    const MESSAGE = "message";
    const IP = "ip";
    const CREATED_AT = "created_at";
    const UPDATE_AT = "update_at";
    const STATUS = "status";
}
