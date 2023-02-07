<?php

namespace App\Domain\Catalog\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Musician extends Model
{
    protected $table = 'musicians';
    protected $fillable = ['name', 'main_instrument', 'created_at'];
    public $timestamps = false;
    use HasFactory;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Band()
    {
        return $this->belongsToMany(Band::class);
    } 
}
