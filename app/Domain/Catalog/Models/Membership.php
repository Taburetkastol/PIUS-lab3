<?php

namespace App\Domain\Catalog\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    protected $table = 'membership';
    protected $fillable = ['musician_id', 'band_id'];   
    public $timestamps = false;
    use HasFactory;
}
