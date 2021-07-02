@extends('layouts.admin')

@section('content')

<div class="row">
	<div class="col">
		<a href="{{route('devices.create')}}" class="btn btn-success">Добавить оборудование</a>
	</div>

	<div class="col">
		<button class="btn btn-dark motor-control" data-url="{{route('typedevices.index')}}">
			Список типов оборудования
		</button>
		<button class="btn btn-dark motor-control" data-url="{{route('filterdevices.index')}}">
			Список фильтров оборудования
		</button>
	</div>
</div>

<div class="row mt-4">
	<div class="col"> 
	@if(isset($devices) && $devices->count())
		<table class="table">
		@foreach($devices as $itemDevice)
			<tr>
				<td style="width: 110px;">
					<a href="{{route('devices.edit',$itemDevice)}}" class="btn btn-primary fa fa-pencil-square-o"></a>
					<button type="button" class="btn btn-danger fa fa-close"></button>
				</td>
				<td>
					{{$itemDevice->name}}
				</td>

				<td>{{$itemDevice->type->name}}</td>
				<td>{{$itemDevice->filter->name}}</td>

				<td>
					@isset($itemDevice->brands)
						@foreach($itemDevice->brands as $itemBrand)
							{{$itemBrand->name}}
						@endforeach
					@endisset
				</td>

			</tr>
		@endforeach
		</table>
	@else
		<h4>Не нашлось ни одной характеристики</h4>
	@endif
	</div>
</div>


@endsection