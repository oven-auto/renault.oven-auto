<div class="row">
	<div class="col-12 py-3">
		<button class="btn btn-primary motor-control" data-url="{{route('bodyworks.create')}}">
			Добавить новый тип кузова
		</button>
	</div>
</div>

@if(isset($bodyworks) && $bodyworks->count())

<table class="table">
	<thead class="thead-dark">
		<tr>
			<th></th>
			<th>Название</th>
		</tr>
	</thead>
	@foreach($bodyworks as $itemBodyWork)
	<tr>
		<td style="width: 110px;">
			
			<button 
				data-url="{{route('bodyworks.edit',$itemBodyWork)}}" 
				class="btn btn-primary fa fa-pencil-square-o motor-control">
			</button>

			<button type="button" class="btn btn-danger fa fa-close"></button>
		</td>
		<td>{{$itemBodyWork->name}}</td>
	</tr>
	@endforeach

</table>
@endif