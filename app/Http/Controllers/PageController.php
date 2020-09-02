<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
class PageController extends Controller
{
    private $url = "dealense.test";
    public function index(){
        //Get all data
        $response = Http::get($this->url.'/api/files');
        $posts;
        if($response->ok()){
            $posts = $response->json();
        }
        $url = $this->url;
        return view('welcome', compact('posts', 'url'));
    }
    public function upload(Request $request){
        
        $this->validate($request, [
            'title' => 'required',
            'file' => 'required',
        ]);
        // Send Store Request with attachment
        $file = fopen($request->file('file'), 'r');
        
        $response = Http::withHeaders([
            'enctype' => 'multipart/form-data',
            'Accept' => 'application/json'])->
            attach('file', $file, $request->file('file')->getClientOriginalName())->
            post($this->url.'/api/files', [
                'title' => $request->input('title'),
                'body' => $request->input('body'),
            ]);
        //Chech Response
        if($response->json()['msg'] == "success"){
            return redirect('/')->with('success', 'წარმატებით აიტვირთა.');
        }
        return $response->body();
    }
}
