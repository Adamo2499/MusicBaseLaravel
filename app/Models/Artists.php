<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artists extends Model
{
    public $timestamps = false;
    public const FIELD_ID = "id";
    public const FIELD_NAME = "name";
    public const FIELD_DESCRIPTION = "description";
    public const FIELD_TYPE = "type";

    protected $table = "artists";

    protected $primaryKey = self::FIELD_ID;

    // use HasFactory;
}
