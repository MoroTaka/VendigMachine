<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\Sale;

class Product extends Model
{
    use HasFactory;

   protected $fillable = [
    'id',
    'company_id',
    'product_name',
    'price',
    'stock',
    'comment',
    'img_path',
   ];

   //データ取得
   public function getProDate() {

     $items = $this->with('Company')->Paginate(6);
     return $items;
     
   }

   //データ取得（companies)
   public function getComDate() {

     $category = Company::all();
     return $category;

   }
   
   //検索結果取得
   public function getSarDate($Key,$Cat) {

    $category = $this->KeyWord($Key)->Category($Cat)->Paginate(6);
    return $category;

  }

   //一致ID取得
   public function getFinDate($id) {

    $items = $this->find($id);
    return $items;

  }



    
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
