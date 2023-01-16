<h1>Update Movie</h1>


<form action="{{route('movies.update',$data->id)}}" method="POST">

    @method('PUT')

    @csrf

    <input type="text" name="movie_name" value="{{$data->movie_name}}"><br><br>
    <textarea name="movie_description" id="" cols="15" rows="5" value="{{$data->movie_description}}"></textarea><br><br>
    <input type="text" name="movie_genre" value="{{$data->movie_genre}}"><br><br>

    <button type="submit">save</button>


</form>
