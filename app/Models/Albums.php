<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Albums extends Model
{
    public $timestamps = false;
    public const FIELD_ID = "id";
    public const FIELD_NAME = "name";
    public const FIELD_CATEGORY = "category";
    public const FIELD_COVER_IMAGE = "coverimage";
    public const FIELD_PUBLISHING_YEAR = "publishingyear";

    protected $table = "albums";

    protected $primaryKey = self::FIELD_ID;

    // use HasFactory;
}
