<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use RalphJSmit\Laravel\SEO\Models\SEO;
use RalphJSmit\Laravel\SEO\Support\HasSEO;

class WebSitePagesModel extends Model
{
    use HasFactory;

    use HasSEO;
    protected $table = "websitePages";
    const ID = "id";
    const ROUTE_NAME = "route_name";
    const STATUS = "status";
    const CREATED_AT = "created_at";
    const UPDATED_AT = "updated_at";
    const CREATED_BY = "created_by";
    const UPDATED_BY = "updated_by";
    
    public function seoData()
    {
        return $this->hasOne(SEO::class, 'model_id', 'id');
    }
}
