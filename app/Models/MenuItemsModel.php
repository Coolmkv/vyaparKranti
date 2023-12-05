<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuItemsModel extends Model
{
    use HasFactory;

    protected $table = "menu_items";

    const ID = "id";
    const ITEM_NAME = "item_name";
    const ITEM_IMAGE = "item_image";
    const ITEM_DETAILS = "item_details";
    const ITEM_PRIORITY = "item_priority";
    const PRICE = "price";
    const CURRENCY = "currency";
    const STATUS = "status";
    const CREATED_BY = "created_by";
    const UPDATED_BY = "updated_by";
    const CREATED_AT = "created_at";
    const UPDATED_AT = "updated_at";
}

