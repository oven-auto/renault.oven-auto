@extends('layouts.admin')

@section('content')

<div class="row">
	<div class="col">
		<a href="{{route('properties.create')}}" class="btn btn-success">Добавить характеристику</a>
	</div>
</div>

<div class="row mt-4">
	<div class="col"> 
	@if(isset($properties) && $properties->count())
		<table class="table">
		@foreach($properties as $itemProperty)
			<tr>
				<td style="width: 110px;">
					<a href="{{route('properties.edit',$itemProperty)}}" class="btn btn-primary fa fa-pencil-square-o"></a>
					<button type="button" class="btn btn-danger fa fa-close"></button>
				</td>
				<td>
					{{$itemProperty->name}}
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