<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebSitElements extends Model
{
    use HasFactory;

    protected $table = "web_site_elements";

    const TABLE_NAME = "web_site_elements";

    const ID = "id";
    const LOGO = "logo";
    const WEB_SITE_TITLE_TEXT = "web_site_title_text";
    const STATUS = "status";
    const CREATED_AT = "created_at";
    const UPDATED_AT = "updated_at";
    const CREATED_BY = "created_by";
    const UPDATED_BY = "updated_by";
}
