<h1>Create new post</h1>


<form action="{{Route('insert')}}" method="post">
    @csrf
    <input type="text" name="name" placeholder="Enter name"><br><br>
    <input type="text" name="post" placeholder="Enter post"><br><br>
    {{-- <input type="hidden" name="_token" value="{{csrf_token()}}"/> --}}
    <button type="submit" name="submit">save</button>
</form>
