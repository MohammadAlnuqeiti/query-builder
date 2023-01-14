<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class PostController extends Controller
{
    public function create(){
        return view('posts.create');
    }
    public function insert(Request $request){
// return $request;
        DB::table('posts')->insert([
            'name' => $request->name,
            'post' =>  $request->post
        ]);
        // return response('ok');
        return view('posts.create');

    }
    public function read(){
        $users = DB::table('posts')->get();

        return view('posts.show', ['users' => $users]);
    }
    public function edit($id){
$data=DB::table('posts')->where('id',$id)->first();

        return view('posts.edit',['data'=>$data]);
    }
    public function update_data(Request $request){
                DB::table('posts')->where('id',$request->id)->update([
                    'name' => $request->name,
                    'post' =>  $request->post
                ]);
                return redirect()->route('read');
            }
    public function delete($id){
        DB::table('posts')->where('id','=',$id)->delete();
        return redirect()->route('read');


    }
    public function deleteAll(){
        DB::table('posts')->delete();
        return redirect()->route('read');


    }
    public function deleteTruncate(){
        DB::table('posts')->truncate(); //بعد الحذف يبدأ الترقيم من الصفر
        return redirect()->route('read');


    }
}
