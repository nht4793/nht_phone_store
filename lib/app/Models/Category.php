<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Category extends Model
{
    use HasFactory;

    protected $table = 'vp_categories';
    protected $primaryKey = 'cate_id';
    protected $guarded = [];
}