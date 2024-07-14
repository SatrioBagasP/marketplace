<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KeranjangModel extends Model
{
    use HasFactory;
    protected $table = 'keranjang';
    protected $fillable = [
        'users_id',
        'product_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function product()
    {
        return $this->belongsTo(ProductModel::class);
    }
}
