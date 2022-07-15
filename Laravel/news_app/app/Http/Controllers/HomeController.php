<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\Psr7;

class HomeController extends Controller {
    public function __construct() {
        $this->middleware('auth');
    }

    public function index() {
        $colors = ['#ff4c4c','#ffa54c','#FAD100'];
        try {
            $url = config('newsapi.news_api_url') . "top-headlines?country=jp&page
            int
            =3&apiKey=" . config('newsapi.news_api_key');
            $method = "GET";
            $count = 3;

            $client = new Client();
            $response = $client->request($method, $url);

            $results = $response->getBody();
            $articles = json_decode($results, true);

            $news = [];

            for ($id = 0; $id < $count; $id++) {
                array_push($news, [
                    'author' => $articles['articles'][$id]['author'],
                    'title' => $articles['articles'][$id]['title'],
                    'url' => $articles['articles'][$id]['url'],
                    'image' => $articles['articles'][$id]['urlToImage'] === null ? 'https://seaside-creations.co.jp/wp/wp-content/uploads/2016/11/noimage.gif':$articles['articles'][$id]['urlToImage'],
                    'create_at' => date('Y年m月d日 H時i分s秒', strtotime($articles['articles'][$id]['publishedAt'])),
                ]);
            }
        } catch (RequestException $e) {
            echo Psr7\Message::toString($e->getRequest());
            if ($e->hasResponse()) {
                echo Psr7\Message::toString($e->getResponse());
            }
        }
        return view('home', compact('news','colors'));
    }
}
