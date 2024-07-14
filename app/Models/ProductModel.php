<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $fillable = [
        'nama_product',
        'harga',
        'desc',
        'image',
        'category_id',
        'toko_id',
    ];
    public function scopeSearch($query, array $filters)
    {
        $query->when($filters['search'] ?? false, function ($query, $search) {
            return $query->where('nama_product', 'like', '%' . $search . '%');
        })->orderBy('created_at', 'desc');;

        $query->when($filters['category'] ?? false, function ($query, $category) {
            return $query->whereHas('category', function ($query) use ($category) {
                $query->where('nama', $category);
            });
        });

        $query->when($filters['toko'] ?? false, function ($query, $toko) {
            return $query->whereHas('toko', function ($query) use ($toko) {
                $query->where('id', $toko);
            });
        });
    }
    public function category()
    {
        return $this->belongsTo(CategoryModel::class);
    }
    public function toko()
    {
        return $this->belongsTo(TokoModel::class);
    }
    public function keranjang()
    {
        return $this->hasMany(KeranjangModel::class);
    }
}
