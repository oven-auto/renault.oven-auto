<div class="row">
	<div class="col-12 py-3">
		<button class="btn btn-primary motor-control" data-url="{{route('motortransmissions.create')}}">
			Добавить новую трансмиссию
		</button>
	</div>
</div>

@if(isset($transmissions) && $transmissions->count())

<table class="table">
	<thead class="thead-dark">
		<tr>
			<th></th>
			<th>Название</th>
			<th>Абривиатура</th>
		</tr>
	</thead>
	@foreach($transmissions as $itemTransmission)
	<tr>
		<td style="width: 110px;">
			
			<button 
				data-url="{{route('motortransmissions.edit',$itemTransmission)}}" 
				class="btn btn-primary fa fa-pencil-square-o motor-control">
			</button>

			<button type="button" class="btn btn-danger fa fa-close"></button>
		</td>
		<td>{{$itemTransmission->full_name}}</td>
		<td>{{$itemTransmission->small_name}}</td>
	</tr>
	@endforeach

</table>
@endif