

<div class="row">
	<div class="col-12 py-3">
		<button class="btn btn-primary motor-control" data-url="{{route('motortypes.create')}}">
			Добавить новый тип мотора
		</button>
	</div>
</div>
@if(isset($types) && $types->count())
<table class="table">
	<thead class="thead-dark">
		<tr>
			<th></th>
			<th>Название</th>
			<th>Абривиатура</th>
		</tr>
	</thead>
	@foreach($types as $itemType)
	<tr>
		<td style="width: 110px;">

			<button
				data-url="{{route('motortypes.edit',$itemType)}}"
				class="btn btn-primary fa fa-pencil-square-o motor-control">
			</button>

			<button type="button" class="btn btn-danger fa fa-close"></button>
		</td>
		<td>{{$itemType->full_name}}</td>
		<td>{{$itemType->small_name}}</td>
	</tr>
	@endforeach

</table>
@endif
