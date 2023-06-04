<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewLetter extends Model
{
    use HasFactory;

    protected $table = 'news_letter_emails';

    const TABLE_NAME = 'news_letter_emails';

    const ID = "id";
    const EMAIL_ID = "email_id";
    const SUBSCRIPTION_STATUS = "subscription_status";
    const VERIFICATION_STATUS = "verification_status";
    const CREATED_AT = "created_at";
    const UPDATE_AT = "update_at";
    const STATUS = "status";

    const VERIFICATION_DONE = 1;
    const VERIFICATION_NOT_DONE = 0;
    const SUBSCRIPTION_SUBSCRIBED = 'subscribed';
    const SUBSCRIPTION_UNSUBSCRIBED = 'unsubscribed';
}
