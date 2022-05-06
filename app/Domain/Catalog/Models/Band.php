<?php

namespace App\Domain\Catalog\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Band extends Model
{
    protected $table = 'bands';
    protected $fillable = ['name', 'genre', 'created_at', 'breakdown_at'];
    public $timestamps = false;
    use HasFactory;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function Musician()
    {
        return $this->belongsToMany(Musician::class);
    } 
}
