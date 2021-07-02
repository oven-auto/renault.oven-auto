<div class="row">
	<div class="col-12 py-3">
		<button class="btn btn-primary motor-control" data-url="{{route('typedevices.create')}}">
			Добавить новый тип оборудования
		</button>
	</div>
</div>

@if(isset($types) && $types->count())

<table class="table">
	<thead class="thead-dark">
		<tr>
			<th></th>
			<th>Название</th>
		</tr>
	</thead>
	@foreach($types as $itemType)
	<tr>
		<td style="width: 110px;">
			
			<button 
				data-url="{{route('typedevices.edit',$itemType)}}" 
				class="btn btn-primary fa fa-pencil-square-o motor-control">
			</button>

			<button type="button" class="btn btn-danger fa fa-close"></button>
		</td>
		<td>{{$itemType->name}}</td>
		

	</tr>
	@endforeach

</table>
@endif
