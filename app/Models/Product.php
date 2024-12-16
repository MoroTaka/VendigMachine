<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use App\Models\Company;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Sale;

class Product extends Model
{
    use HasFactory;
    
    //リレーション
    public function Company():BelongsTo {
        return $this->belongsTo(Company::class);
    }

    public function Sale():HasMany {
        return $this->hasMany(Sale::class );
    }

    //スコープ
    public function scopeKeyWord($query, $keyword) {
        return $query->where('product_name', 'LIKE', "%{$keyword}%");
    }

    public function scopeCategory($query ,$category) {
  
         return $query->select('products.*')
                      ->join ('companies','products.company_id', '=', 'companies.id')
                      ->where('company_id', 'LIKE', $category);
    }

}
