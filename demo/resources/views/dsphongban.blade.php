<form action="method=get" action="<?=route("submitdenday")?>">
    <table>
        <tr>
            <td>id</td>
            <td>name</td>
        </tr>
        @php
        $i=1
        @endphp
        @foreach($phongban as $m)
        <tr>
            <td>{{$i++}}</td>
            <td>{{$m->name}}</td>
        </tr>
        @endforeach
    </table>
</form>