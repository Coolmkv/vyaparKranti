<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebSiteElements extends Model
{
    use HasFactory;

    protected $table = "website_elements";

    const ID = "id";
    const ELEMENT = "element";
    const ELEMENT_TYPE ="element_type";
    const ELEMENT_DETAILS = "element_details";
    const STATUS = "status";
    const CREATED_BY = "created_by";
    const UPDATED_BY = "updated_by";
    const CREATED_AT = "created_at";
    const UPDATED_AT = "updated_at";
}
