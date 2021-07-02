@extends('layouts.admin')

@section('content')
	
<div class="row">
	<div class="col-6">
		<a href="{{route('options.create')}}" class="btn btn-success">
			Добавить опцию
		</a>
	</div>

	<div class="col-6 text-right">

	</div>	
</div>

<div class="row mt-4 ">
	<div class="col-12">
		@if(isset($options) && $options->count())
		<table class="table">
			<tr>
				<th></th>
				<th>Название</th>
				<th>Код</th>
				<th>Цена</th>
			</tr>
			@foreach($options as $itemOption)
			<tr>
				<td style="width: 110px;">
					<a href="{{route('options.edit',$itemOption)}}" class="btn btn-primary fa fa-pencil-square-o"></a>
					<button type="button" class="btn btn-danger fa fa-close"></button>
				</td>
				<td>{{$itemOption->name}}</td>
				<td>{{$itemOption->code}}</td>
				<td>{{$itemOption->price}}</td>
			</tr>
			@endforeach
		@else
			<h4>Не нашлось ни одной опции</h4>
		@endif
	</div>
</div>

@endsection