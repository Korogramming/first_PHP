<?php

/*オフジェクト指向について
クラス：設計図
インスタンス：実際に作ったもの(クラスをもとにして作ったものみたいな)
オブジェクト：モノ（クラスとかインスタンスとかをふんわり表現したもの）
*/

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'title',
        'body',
        //category_idを追加ー＞selectフォームのvalueから$category->idを保存
        'category_id'
    ];

    public function getByLimit(int $limit_count = 3){
        //updated_atで降順に並べた後、limitで件数制限をかける
        return $this->orderBy('updated_at', 'DESC')->limit($limit_count)->get();
    }

    //Paginationはページごと分けられるみたい
    public function getPaginateByLimit(int $limit_count = 5){
        //今までのCollectionインスタンスではなくPaginationインスタンスが返却される
        //・行うこと↓
        //->ControllerクラスのModel呼び出し関数をgetByLimit()からgetPaginateByLimit()に変更
        //->Viewにページネーション表示用HTMLの追加
        //return $this->orderBy('updated_at', 'DESC')->paginate($limit_count);
        
        //カテゴリー名の表示　↓のはEagerローディング
        return $this::with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
        //リレーションによって増えてしまうデータベースアクセスの回数を減らす
    }

    

    //08-2Categoryに対するリレーション
    //「１対多」の関係なので単数系に
    public function Category(){
        return $this->belongsTo(Category::class);
    }
}
