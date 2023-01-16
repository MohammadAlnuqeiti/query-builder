<h1>update comment</h1>

<form action="{{route('comments.update',$data->id)}}" method="post">
    
@method('PUT')

@csrf
    <input type="text" name="name" value="{{$data->name}}"><br><br>
    <textarea name="comment" id="" cols="30" rows="10" value="{{$data->comment}}"></textarea><br><br>
    <button type="submit">save</button>
</form>
