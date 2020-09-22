@extends('admin.layouts.master')
@section('title','Create')
@section('header','Create')
@section('link')
<li><a href="#">Dashboard</a></li>
<li><a href="#">create</a></li>
<li class="active">add</li>
@endsection
@section('content')
<div class="content mt-3">
    <form action="{{route('QuanTriAdmin.chucvu.chucvu.add')}}" method="POST">
        <input type=hidden value="{{csrf_token()}}" name="_token">
        <div class="card-body card-blo:ck">
            <div class="has-success form-group">
                <table style="text-align: center">
                    <tr>
                        <th>Name</th>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" class="is-valid form-control-success form-control" value="" name=name>
                        </td>
                    </tr>
                </table>
            </div>
            <div class="card-body">
                <button type="submit" class="btn btn-success btn-lg btn-block">
                    Save
                </button>
            </div>
        </div>
        <link rel="stylesheet" type="text/css" href="/js/datetimepiker/jquery.datetimepicker.css">
        <script src="/js/datetimepiker/jquery.js"></script>
        <script src="/js/datetimepiker/jquery.datetimepicker.full.js"></script>
    </form>
</div>

@endsection