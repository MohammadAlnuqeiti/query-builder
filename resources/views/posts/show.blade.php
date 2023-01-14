<h1>read data</h1>
<table border="2">
    <tr>
        <th>id</th>
        <th>name</th>
        <th>post</th>
        <th>edit</th>
        <th>delete</th>
    </tr>
@foreach ($users as $value)
<tr>
    <td>{{$value->id}}</td>
    <td>{{$value->name}}</td>
    <td>{{$value->post}}</td>
    <td><a class="btn btn-primary" href="{{Route('edit',$value->id)}}" role="button">Edit</a></td>
    <td><a class="btn btn-primary" href="{{Route('post.delete',$value->id)}}" role="button">Delete</a></td>
</tr>


@endforeach
<tr>
    <td colspan="5" style="text-align: center"><a class="btn btn-primary" href="{{Route('posts.deleteAll')}}" role="button">Delete All Data</a></td>

</tr>
<tr>
    <td colspan="5" style="text-align: center"><a class="btn btn-primary" href="{{Route('posts.truncate')}}" role="button">Truncate</a></td>

</tr>
</table>
