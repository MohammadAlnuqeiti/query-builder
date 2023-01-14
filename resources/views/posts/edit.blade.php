<h1>Update new post</h1>


<form action="{{Route('edit.data',$data->id)}}" method="post">
    @csrf
    <input type="text" name="name"  value="{{$data->name}}"><br><br>
    <input type="text" name="post"  value="{{$data->post}}"><br><br>
     {{-- <input type="hidden" name="_token" value="{{csrf_token()}}"/> --}}
    <button type="submit" name="submit">save</button>
</form>
