<h1>Update Movie</h1>


<form action="{{route('movies.update',$data->id)}}" method="POST" enctype="multipart/form-data">

    @method('PUT')

    @csrf

    <input type="text" name="movie_name" value="{{$data->movie_name}}"><br><br>
    <textarea name="movie_description" id="" cols="15" rows="5" value="{{$data->movie_description}}"></textarea><br><br>
    <input type="text" name="movie_genre" value="{{$data->movie_genre}}"><br><br>
    <input id="movie_image" type="file" name="movie_image" placeholder="Enter movie genre" value="{{ old('movie_image')}}" class="@error('movie_image') is-invalid @enderror"><br><br>

    {{-- @error('movie_image')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror --}}
    <button type="submit">save</button>


</form>
