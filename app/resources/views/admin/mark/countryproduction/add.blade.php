<div class="row mt-3">

	<div class="col-6">
		{{Form::label('country', 'Название')}}
		{{Form::text('country', isset($countryproduction) ? $countryproduction->country : '', ['class' => 'form-control' ])}}

		{{Form::label('city', 'Город')}}
		{{Form::text('city', isset($countryproduction) ? $countryproduction->city : '', ['class' => 'form-control' ])}}
	</div>

</div>

<div class="row mt-3">
	<div class="col-12">
		<button 
			class="btn btn-success motor-control" 
			data-url="{{isset($countryproduction) ? route('countryproductions.update', $countryproduction) : route('countryproductions.store')}}" 
			data-method="{{isset($countryproduction) ? 'patch' : 'post' }}">
				Сохранить
		</button>
		<button class="btn btn-danger motor-control" data-url="{{route('countryproductions.index')}}">Назад</button>
	</div>
</div>

