
    <table>
        <tr>
            <td>id</td>
            <td>name</td>
            <td>chucnang</td>
            <td>phongban</td>
            <td>Action</td>
        </tr>
        @php
        $i=1
        @endphp
        @foreach($users as $item)
        <tr>
            <td>{{$i++}}</td>
            <td>{{$item->name}}</td>
            <td>{{$chucnangs[$item->chucnangid]??""}}</td>
            <td>{{$phongbans[$item->phongbanid]??""}}</td>
            <td><a href="{{route('user.update',$item->id)}}" >EDIT</a></td>
        </tr>
        @endforeach
    </table>