<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    //Postに対するリレーション
    //「1対多」の関係なので'posts'と複数形に
    public function posts(){
        return $this->hasMany(Post::class);
    }

    //Categoryモデルにカテゴリーごとに属する投稿を取得する処理を追加する。
    public function getByCategory(int $limit_count = 5){
        return $this->posts()->with('category')->orderBy('updated_at', 'DESC')->paginate($limit_count);
    }
    //$thisにはCategoryのインスタンスが入っており、そのカテゴリーが持つ投稿を呼び出す
    //今回は各投稿データからカテゴリー名を取得するので、with()をつなげている.


}
