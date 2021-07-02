@extends('layouts.admin')

@section('content')

<div class="row">
	<div class="col-6">
		<a href="{{route('marks.create')}}" class="btn btn-success">
			Добавить модель
		</a>
	</div>

	<div class="col-6 text-right">
		<button class="btn btn-dark motor-control" data-url="{{route('bodyworks.index')}}">Список типов кузовов</button>
		<button class="btn btn-dark motor-control" data-url="{{route('countryproductions.index')}}">
			Список стран производителей
		</button>
	</div>
</div>

<div class="row mt-4 ">
	<div class="col-12">
		@if(isset($marks) && $marks->count())
		<table class="table index-table">
			<tr>
				<th>
					
				</th>
				<th>Название</th>
			</tr>
			@foreach($marks as $itemMark)
				<tr >
					<td style="width: 110px;">
						<a href="{{route('marks.edit',$itemMark->id)}}" class="btn btn-primary fa fa-pencil-square-o"></a>
						<button type="button" class="btn btn-danger fa fa-close"></button>
					</td>
					<td>
						{{$itemMark->name}}
					</td>
				</tr>
			@endforeach
		</table>
		@else
			<h4>Не нашлось ни одной модели</h4>
		@endif
	</div>
</div>

@endsection