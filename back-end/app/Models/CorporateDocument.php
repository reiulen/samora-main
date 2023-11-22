<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CorporateDocument extends Model
{
    use HasFactory;
    protected $table = 'corporate_document';
    protected $guarded = [];
}
