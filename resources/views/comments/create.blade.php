<h1>create comment</h1>

<form action="{{route('comments.store')}}" method="post">
@csrf
    <input type="text" name="name" placeholder="Enter name"><br><br>
    <textarea name="comment" id="" cols="30" rows="10" placeholder="Enter comment"></textarea><br><br>
    <button type="submit">save</button>
</form>
