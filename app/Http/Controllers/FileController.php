<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\File;
class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return File::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'file' => 'required'
        ]);
        if($request->hasFile('file')){
            $file = $request->file('file');
            $filename = date("his").$file->getClientOriginalName();
            $destinationPath = public_path('/images');
            $file->move($destinationPath, $filename);
        }
        $post = new File;
        $post->title = $request['title'];
        $post->body = $request['body'];
        $post->file = $filename;
        $post->save();
        return ['msg' => 'success'];
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return File::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = File::find($id);
        $post->title = $request['title'];
        $post->body = $request['body'];
        if($request->hasFile('file')){
            $file = $request->file('file');
            $filename = date("his").$file->getClientOriginalName();
            $destinationPath = public_path('/images');
            $file->move($destinationPath, $filename);
            $post->file = $filename;
        }
        $post->save();
        return ['msg' => 'success'];
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = File::find($id);
        $post->delete();
        return response()->json(['msg' => 'success']);
    }
}
