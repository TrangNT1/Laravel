<form action="{{route('user.save')}}" method="post">
    @csrf
    <div>
        <input type="hidden" value="{{$users->id}}" name="id">
    </div>
    <div>
        <label for="name">Name:</label>
        <input type="text"  id="name" value="{{$users->name}}" name="name">
    </div>
    <div>
        <label for="name">Chuc Nang:</label>
        <select name="chucnangid">
            @foreach($chucnangs as $key=>$item)
            <option value="{{$key}}" {{($key == $users->chucnangid) ? "selected" : ""}}>{{$item}}</option>
            @endforeach
        </select>
    </div>
    <div>
        <label for="name">Phong Ban:</label>
        <select name="phongbanid">
            @foreach($phongbans as $key=>$item)
            <option value="{{$key}}" {{($key == $users->phongbanid) ? "selected" : ""}}>{{$item}}</option>
            @endforeach
        </select>
    </div>
    <button type="submit">EDIT</button>
</form>