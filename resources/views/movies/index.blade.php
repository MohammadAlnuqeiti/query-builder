<h1>index page</h1>

<img src="{{asset('image/unnamed.png') }}" height="50px" width="50px">
<a href="{{route('movies.create')}}">create movie</a><br><br>

<table border="2">
    <tr>
        <th>#</th>
        <th>movie name</th>
        <th>movie dexcription</th>
        <th>movie genre</th>
        <th>movie image</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>


    @foreach ($movies as $value)
    <tr>

    <td>{{$value['id']}}</td>
    <td>{{$value['movie_name']}}</td>
    <td>{{$value['movie_description']}}</td>
    <td>{{$value['movie_genre']}}</td>
    <td><img src="{{URL::asset("storage/image/".$value['image'])}}" alt="" style="width: 75px"></td>
    {{-- <td>{{$value['image']}}</td> --}}
    <td><a href="{{route('movies.edit',$value['id'])}}">Edit</a></td>
<td>
      <form action="{{route('movies.destroy',$value['id'])}}" method="post">
        @method('DELETE')
        @csrf
        <button type="submit">Delete</button>
    </form>

</td>

</tr>
    @endforeach
</table>
{{-- {{ $users->links() }} --}}

