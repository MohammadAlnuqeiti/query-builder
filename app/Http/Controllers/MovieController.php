<?php

namespace App\Http\Controllers;

use App\Http\Requests\movieRequest;
use App\Models\Movie;
use App\Models\ImageMovie;
use Illuminate\Http\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $movies = Movie::join('image_movies', 'movies.id', '=', 'image_movies.movie_id')
        //        ->get(['movies.*', 'image_movies.movie_image']);
     
        $movies = Movie::orderBy('id', 'desc')->get();
        // $movies = Movie::with('image')->get();
        // $movies = Movie::paginate(2);
        // $movies=Movie::find(5)->image;
        // dd($movies);
        $data = [];
        foreach ($movies as $movie) {
            $data[] = [
                'id' => $movie->id,
                'movie_name' => $movie->movie_name,
                'movie_description' => $movie->movie_description,
                'movie_genre' => $movie->movie_genre,
                'image' => isset($movie->image) ? $movie->image->movie_image : "",


            ];
        }

        // return $data;
        return view('movies.index', ['movies' => $data]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('movies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(movieRequest $request)
    {
        $data = Movie::create([

            'movie_name' => $request->movie_name,
            'movie_description' => $request->movie_description,
            'movie_genre' => $request->movie_genre

        ]);

        $photoName = $request->file('movie_image')->getClientOriginalName();
        $request->file('movie_image')->storeAs('public/image', $photoName);
        ImageMovie::create([
            'movie_id' => $data->id,
            'movie_image' => $photoName
        ]);
        return redirect()->route('movies.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Movie::findOrfail($id);
        return view('movies.update', ['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $data=Movie::where('id', $id)
        //     ->update([
        //         'movie_name' => $request->movie_name,
        //         'movie_description' => $request->movie_description,
        //         'movie_genre' => $request->movie_genre

        //     ]);
        //-------------------------------
        $data = Movie::findOrfail($id);
        $data->movie_name = $request->movie_name;  //id لانه هون انا موجودة عندي البيانات من خلال ال  new model ما عملت هون
        $data->movie_description = $request->movie_description;
        $data->movie_genre = $request->movie_genre;
        $data->save();
        //-------------------------------
        $photoName = $request->file('movie_image')->getClientOriginalName();
        $request->file('movie_image')->storeAs('public/image', $photoName);
        ImageMovie::create([
            'movie_id' => $data->id,
            'movie_image' => $photoName
        ]);
        return redirect()->route('movies.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Movie  $movie
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Movie::findOrfail($id)->delete();
        return redirect()->route('movies.index');
        // return $id;
    }
}
