<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PLElements extends Model
{
    public $timestamps = false;
    public const FIELD_ID = "id";
    public const FIELD_PLAYLISTID = "playlistid";
    public const FIELD_SONGID = "songid";

    protected $table = "plelements";

    protected $primaryKey = self::FIELD_ID;
    // use HasFactory;
}
