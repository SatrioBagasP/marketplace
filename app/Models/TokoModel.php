<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TokoModel extends Model
{
    use HasFactory;
    protected $table = 'toko';
    protected $fillable = [
        'image',
        'users_id',
        'desc',
        'nama'
    ];

    public function product()
    {
        return $this->hasMany(ProductModel::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
