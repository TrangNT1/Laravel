@extends('admin.layouts.master')
@section('title','Quản Lý Chức Vụ')
@section('header','Danh Sách CHức Vụ')
@section('link')
<li><a href="#">Dashboard</a></li>
<li><a href="#">Table</a></li>
<li class="active">Data-tables</li>
@endsection
@section('content')
<div class="content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table style="border-radius: 5px 5px 0px 0px; width: 100%;" id="bootstrap-data-table-export" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th style="color: #fff;background-color: #6dbdf0;border-radius: 5px 5px 0px 0px;height: 50px;" colspan="2">
                                        Phòng Ban
                                    </th>
                                    <th style="border: none;">
                                        <a class="btn btn-success" style="width: 100%;color: #fff;font-size: 15px;" href="create">THÊM MỚI</a>
                                    </th>
                                </tr>
                                <tr>
                                    <th>STT</th>
                                    <th>Name</th>
                                    <th>Hành Động</th>
                                </tr>
                            </thead>
                            <tbody>
                            @php
                                $i=1
                                @endphp
                                @foreach($phongban as $m)
                                <tr>
                                    <td>{{$i++}}</td>
                                    <td>{{$m->name}}</td>
                                    <td>
                                        <div class="btn-group">
                                            <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Hành
                                                động </button>
                                            <div class="dropdown-menu" x-placement="bottom-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(0px, 33px, 0px);">
                                                <a class="dropdown-item" href="del/{{$m->id}}" Style="color: red"><i class="fa fa-times"></i>Delete</a>
                                                <a class="dropdown-item" href="edit/{{$m->id}}" Style="color: green"><i class="fa fa-edit"></i>Update</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- .animated -->
</div>
@endsection