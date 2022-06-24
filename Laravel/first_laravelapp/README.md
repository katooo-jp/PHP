## Laravel Study


### ーーーーーー　laravelコマンド関係　ーーーーーー
+ laravelアプリの立ち上げ
> `composer create-project "laravel/laravel=6.*" アプリ名`

+ コントローラー作成
> `php artisan make:controller コントローラー名`

+ プロバイダ作成
> `php artisan make:provider プロバイダ名`

+ ミドルウェア作成
> `php artisan make:middleware ミドルウェア名`

+ フォームリクエスト作成
> `php artisan make:request フォームリクエスト名`

+ モデルの作成
> `php artisan make:model モデル名`
### ーーーーーーーーーーーーーーーーーーーーーーーー



### ーーーーーー　check point　ーーーーーー
+ コントローラーについて
> app/Http/Controllers/HelloController.php

+ ルーティングについて
> routes/web.php

+ テンプレート関連
> resources/views/base.blade.php

+ プロバイダについて
> app/Providers/HelloServiceProvider.php

+ コンポーザについて
> app/Http/Composers/HelloComposer.php

+ フォームレクエストについて
> app/Http/Requests/HelloRequest.php

+ DBについて
> 設定はapp/config/database.phpへ記述
> DBクラスでの利用について
> app/Http/Controllers/HelloController.php
> Eloquent(ORM)について
> app/Person.php

### ーーーーーーーーーーーーーーーーーーーーー
