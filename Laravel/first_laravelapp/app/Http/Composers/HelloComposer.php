<?php

namespace App\Http\Composers;

use Illuminate\View\View;

class HelloComposer {
    public function compose(View $view) {
        $view->with('view_message', 'this view is "'. $view->getName(). '"!!');
    }
}

// ビューコンポーザのクラスの置き場所は決められていないが、アプリで利用できるスクリプトはHttpディレクトリ内であればどこでも良い
// 役割を明確にするため独立したクラスとしてビューコンポーザをHttp直下にComposersディレクトリを作成して管理
