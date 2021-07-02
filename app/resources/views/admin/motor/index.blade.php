@extends('layouts.admin')

@section('content')
	
<div class="row">
	<div class="col-6">
		<a href="{{route('motors.create')}}" class="btn btn-success">
			Добавить мотор
		</a>
	</div>

	<div class="col-6 text-right">
		<button class="btn btn-dark motor-control" data-url="{{route('motortypes.index')}}">Список типов моторов</button>
		<button class="btn btn-dark motor-control" data-url="{{route('motortransmissions.index')}}">Список трансмиссий</button>
		<button class="btn btn-dark motor-control" data-url="{{route('motordrivers.index')}}">Список типов привода</button>
	</div>	
</div>

<div class="row mt-4 ">
	<div class="col-12">
		@if(isset($motors) && $motors->count())
		<table class="table">
			<tr>
				<th></th>	
				<th>Бренд</th>
				<th>Название</th>
				<th>Объем</th>
				<th>Мощность</th>
				<th>К-во клапанов</th>
				<th>Тип</th>
				<th>КПП</th>
				<th>Привод</th>
			</tr>
			@foreach($motors as $itemMotor)
			<tr>
				<td style="width: 110px;">
					<a href="{{route('motors.edit',$itemMotor)}}" class="btn btn-primary fa fa-pencil-square-o"></a>
					<button type="button" class="btn btn-danger fa fa-close"></button>
				</td>
				<td>{{$itemMotor->brand->name}}</td>
				<td>{{$itemMotor->name}}</td>
				<td>{{$itemMotor->size}}</td>
				<td>{{$itemMotor->power}}</td>
				<td>{{$itemMotor->valve}}</td>
				<td>{{$itemMotor->type->full_name}}</td>
				<td>{{$itemMotor->transmission->small_name}}</td>
				<td>{{$itemMotor->driver->small_name}}</td>

			</tr>
			@endforeach
		</table>
		@else
			<h4>Не нашлось ни одного мотора</h4>
		@endif
	</div>
</div>

@endsection