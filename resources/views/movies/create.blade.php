<h1>Create Movie</h1>


<form action="{{route('movies.store')}}" method="POST" enctype="multipart/form-data">

    @csrf
    <input id="movie_name" type="text" name="movie_name" placeholder="Enter movie name" value="{{ old('movie_name')}}" class="@error('movie_name') is-invalid @enderror" ><br><br>

    @error('movie_name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <textarea id="movie_description" type="text" name="movie_description" placeholder="Enter movie description" value="{{ old('movie_description')}}" class="@error('movie_description') is-invalid @enderror"></textarea><br><br>

    @error('movie_description')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <input id="movie_genre" type="text" name="movie_genre" placeholder="Enter movie genre" value="{{ old('movie_genre')}}" class="@error('movie_genre') is-invalid @enderror"><br><br>

    @error('movie_genre')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    <input id="movie_image" type="file" name="movie_image" placeholder="Upload Image" value="{{ old('movie_image')}}" class="@error('movie_image') is-invalid @enderror"><br><br>

    @error('movie_image')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
    {{-- <input type="text" name="movie_name" placeholder="Enter movie name"><br><br> --}}
    {{-- <textarea name="movie_description" id="" cols="15" rows="5" placeholder="Enter movie description"></textarea><br><br> --}}
    {{-- <input type="text" name="movie_genre" placeholder="Enter movie genre"><br><br> --}}

    <button type="submit">save</button>


</form>
