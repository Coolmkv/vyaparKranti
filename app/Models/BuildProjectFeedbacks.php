<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuildProjectFeedbacks extends Model
{
    use HasFactory;

    protected $table = "build_project_feedbacks";

    const ID = "id";
    const NAME = "name";
    const COMPANY = "company";
    const EMAIL = "email";
    const PHONE_NUMBER = "phone_number";
    const DESCRIPTION = "description";
    const SELECTED_OPTIONS = "selected_options";
    const STATUS = "status";
    const IP = "ip";
    const USER_AGENT = "user_agent";
    const CREATED_BY = "created_by";
    const UPDATED_BY = "updated_by";
    const CREATED_AT = "created_at";
    const UPDATED_AT = "updated_at";
}
