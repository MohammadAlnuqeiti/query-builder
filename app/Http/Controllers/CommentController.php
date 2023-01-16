<?php

namespace App\Http\Controllers;

use App\comment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comment=comment::all();

        // or

        // $comment=comment::get();

        // return $comment;
        return view('comments.index',['comment'=>$comment]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('comments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $request->validate([
            'name' => 'required',
            'comment' => 'required',
        ]);
        //method 1 to insert database use save()

        // $data = new comment();
        // $data->name=$request->name;
        // $data->comment=$request->comment;
        // $data->save();
        // return redirect()->route('comments.index');

        //method 2 to insert database use create()

        Comment::create([
            'name'=>$request->name,
            'comment'=>$request->comment

        ]);
        return redirect()->route('comments.index');//بعمل ريدايركت على اسم الراوت اللي بعطيه اياه


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show() // not found في حال حطيت هون باراميتر فما راح يشتغل الكود را يعطيك
    {
        $commentsDeleted=comment::onlyTrashed()->get();
        return view('comments.softDelete', compact('commentsDeleted'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //id احضار البيانات المتعلقة بال

        $data=comment::where('id',$id)->first();

        //or

        // $data=comment::findOrfail($id);
        return view('comments.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // 1

        // comment::where('id',$id)
        // ->update([
        //     'name'=>$request->name,
        //     'comment'=>$request->comment
        // ]);
        // return redirect()->route('comments.index');

        // or

        // 2

        $data=comment::findOrfail($id);
        $data->name=$request->name;  //id لانه هون انا موجودة عندي البيانات من خلال ال  new model ما عملت هون
        $data->comment=$request->comment;
        $data->save();
        return redirect()->route('comments.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        comment::findorfail($id)->delete();
        // comment::destroy($id);
        return redirect()->route('comments.index');
        // return $id;
    }

    public function restore($id){
        comment::withTrashed()->where('id','=',$id)->restore();
        return redirect()->back();
    }
    public function forcedelete($id){
        comment::withTrashed()->where('id',$id)->forceDelete();
        return redirect()->back();


    }
    public function trushed($id){
        comment::findorfail($id)->forcedelete();
        return redirect()->route('comments.index');


    }
}
