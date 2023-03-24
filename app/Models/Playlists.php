<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Playlists extends Model
{
    public $timestamps = false;
    public const FIELD_ID = "id";
    public const FIELD_NAME = "name";
    public const FIELD_SIZE = "size";
    public const FIELD_OWNERID = "ownerid";

    protected $table = "playlists";

    protected $primaryKey = self::FIELD_ID;


    // use HasFactory;
}
