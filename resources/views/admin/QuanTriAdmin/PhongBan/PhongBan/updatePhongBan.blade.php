@extends('admin.layouts.master')
@section('title','basicForm')
@section('header','Basic-Forms')
@section('link')
<li><a href="#">Dashboard</a></li>
<li><a href="#">Update</a></li>
<li class="active">Update</li>
@endsection
@section('content')
<div class="content mt-3">
	<form action="/phongban/update/{{$phongban->id}}" method="POST">
		<input type=hidden value="{{csrf_token()}}" name="_token">
		<div class="has-success form-group">

			<div class="has-success form-group">
				<table style="text-align: center">
					<tr>
						<th>Name</th>
					</tr>
					<tr>
						<td>
							<input type="text" class="is-valid form-control-success form-control" value="{{$phongban->name}}" name="name">
						</td>
					</tr>
				</table>
			</div>
		</div>
		<div class="card-body">
			<button type="submit" class="btn btn-success btn-lg btn-block">
				Save
			</button>
		</div>
	</form>
</div>
@endsection