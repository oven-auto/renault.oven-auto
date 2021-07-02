<div class="row">
	<div class="col-12 py-3">
		<button class="btn btn-primary motor-control" data-url="{{route('filterdevices.create')}}">
			Добавить новый фильтр оборудования
		</button>
	</div>
</div>

@if(isset($filters) && $filters->count())

<table class="table">
	<thead class="thead-dark">
		<tr>
			<th></th>
			<th>Название</th>
		</tr>
	</thead>
	@foreach($filters as $itemFilter)
	<tr>
		<td style="width: 110px;">
			
			<button 
				data-url="{{route('filterdevices.edit',$itemFilter)}}" 
				class="btn btn-primary fa fa-pencil-square-o motor-control">
			</button>

			<button type="button" class="btn btn-danger fa fa-close"></button>
		</td>
		<td>{{$itemFilter->name}}</td>
	</tr>
	@endforeach

</table>
@endif
