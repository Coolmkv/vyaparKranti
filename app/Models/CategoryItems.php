<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryItems extends Model
{
    use HasFactory;

    protected $table="category_items";

    const ID = "id";
    const ITEM_TITLE = "item_title";
    const ITEM_IMAGE = "item_image";
    const ITEM_DETAILS = "item_details";
    const LIBRARY_CATEGORY_ID = "library_category_id";
    const STATUS = "status";
    const CREATED_BY = "created_by";
    const UPDATED_BY = "updated_by";
    const CREATED_AT = "created_at";
    const UPDATED_AT = "updated_at";

    const TABLE_NAME = "category_items";

    
    /**
     * libraryCategory
     *
     * @return void
     */
    public function libraryCategory(){
        return $this->hasOne(LibraryCategories::class,LibraryCategories::ID,self::LIBRARY_CATEGORY_ID)
        ->where(LibraryCategories::STATUS,1);
    }
}
