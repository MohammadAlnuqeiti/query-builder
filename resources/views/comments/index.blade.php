<h1>index page</h1>
<a href="{{route('comments.create')}}">create comment</a><br><br>

<table border="1">
    <tr>
        <th>#</th>
        <th>name</th>
        <th>comment</th>
        <th>edit</th>
        <th>soft delete</th>
        <th>Delete</th>

    </tr>

    @foreach ($comment as $value)

    <tr>
        <td>{{$value->id}}</td>
        <td>{{$value->name}}</td>
        <td>{{$value->comment}}</td>
        <td><a href="{{Route('comments.edit',$value->id)}}">Edit</a></td>
        {{-- <td><a href="{{Route('comments.destroy',$value->id)}}">Delete</a></td> --}}
        <td>
            <form action="{{Route('comments.destroy',$value->id)}}" method="post">
                @method('delete')
                @csrf
                <button type="submit">Delete</button>
            </form>
        </td>
        <td>
            <form action="{{Route('comments.delete',$value->id)}}" method="post">
                @method('HEAD')
                {{--post وليس  get تدعم ال  force deleteال  --}}
                {{--get لانه اكثر امانا من  head  واستخدمت ال  over ride هون عملت  --}}
                @csrf

                <button type="submit">Force Delete</button>

            </form>
        </td>
    </tr>

    @endforeach
</table>
