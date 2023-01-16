<h1>soft delete page</h1>


<table border="1">
    <tr>
        <th>#</th>
        <th>name</th>
        <th>comment</th>
        <th>Retore</th>
        <th>Force Delete</th>
    </tr>

    @foreach ($commentsDeleted as $value)

    <tr>
        <td>{{$value->id}}</td>
        <td>{{$value->name}}</td>
        <td>{{$value->comment}}</td>
        <td><a href="{{Route('comments.restore',$value->id)}}">Restore</a></td>
        <td>
            <form action="{{Route('comments.delete',$value->id)}}" method="GET">
                @csrf

                <button type="submit">Force Delete</button>

            </form>
        </td>


    </tr>

    @endforeach
</table>
