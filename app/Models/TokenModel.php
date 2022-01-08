<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TokenModel extends Model
{
    protected $table="access_token";
    protected $primaryKey="id";
    public $incrementing=true;
    protected $keyType="int";
    public $timestamps=false;
}
