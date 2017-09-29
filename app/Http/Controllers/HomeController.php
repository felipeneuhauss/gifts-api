<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

use GuzzleHttp\Psr7;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['welcome']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
//        $client = new Client();
//        $res = $client->request('GET', 'http://quotes.rest/qod.json');
//        $content = Psr7\stream_for($res->getBody());
//        dd(json_decode($content->getContents()));
        return view('welcome');
    }
}
