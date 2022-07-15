<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model {
    // リレーション
    public function get_user() {
        return $this->belongsTo('App\User');
    }


}
