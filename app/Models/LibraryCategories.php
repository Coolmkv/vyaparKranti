<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LibraryCategories extends Model
{
    use HasFactory;

    protected $table="library_categories";

    const TABLE_NAME = "library_categories";
    const ID = "id";
    const CATEGORY_NAME = "category_name";
    const CATEGORY_ICON = "category_icon";
    const CATEGORY_DETAILS = "category_details";
    const STATUS = "status";
    const CREATED_BY = "created_by";
    const UPDATED_BY = "updated_by";
    const CREATED_AT = "created_at";
    const UPDATED_AT = "updated_at";

    public function categoryItem(){
        return $this->hasMany(CategoryItems::class,CategoryItems::LIBRARY_CATEGORY_ID,self::ID)
        ->where(CategoryItems::STATUS,1);
    }

}
