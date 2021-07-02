<div class="row">
	<div class="col-12 py-3">
		<button class="btn btn-primary motor-control" data-url="{{route('countryproductions.create')}}">
			Добавить новую страну производителя
		</button>
	</div>
</div>

@if(isset($countryproductions) && $countryproductions->count())

<table class="table">
	<thead class="thead-dark">
		<tr>
			<th></th>
			<th>Страна</th>
			<th>Город</th>
		</tr>
	</thead>
	@foreach($countryproductions as $itemCountryProduction)
	<tr>
		<td style="width: 110px;">
			
			<button 
				data-url="{{route('countryproductions.edit',$itemCountryProduction)}}" 
				class="btn btn-primary fa fa-pencil-square-o motor-control">
			</button>

			<button type="button" class="btn btn-danger fa fa-close"></button>
		</td>
		<td>{{$itemCountryProduction->country}}</td>
		<td>{{$itemCountryProduction->city}}</td>
	</tr>
	@endforeach

</table>
@endif