<h1>create comment</h1>
{{-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif --}}
<form action="{{route('comments.store')}}" method="post">
@csrf
<input id="name" type="text" name="name" placeholder="Enter name" class="@error('name') is-invalid @enderror"><br><br>

@error('name')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
<textarea id="comment" type="text" name="comment" placeholder="Enter name" class="@error('comment') is-invalid @enderror"></textarea><br><br>

@error('comment')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    {{-- <input type="text" name="name" placeholder="Enter name"><br><br> --}}
    {{-- <textarea name="comment" id="" cols="30" rows="10" placeholder="Enter comment"></textarea><br><br> --}}
    <button type="submit">save</button>
</form>
