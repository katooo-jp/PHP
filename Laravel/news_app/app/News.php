<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class News extends Model {
    // リレーション
    public function user() {
        return $this->belongsTo('App\User');
    }

    protected $guarded = ['id', 'created_at', 'updated_at'];
}
