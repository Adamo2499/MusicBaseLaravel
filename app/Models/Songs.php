<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Songs extends Model
{
    public $timestamps = false;
    public const FIELD_ID = "id";
    public const FIELD_TITLE = "title";
    public const FIELD_PERFORMER = "performer";
    public const FIELD_DURATION = "duration";

    protected $table = "songs";

    protected $primaryKey = self::FIELD_ID;

    // use HasFactory;
}
