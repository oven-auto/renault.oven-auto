<div class="row mt-3">

	<div class="col-6">
		{{Form::label('full_name', 'Полное название')}}
		{{Form::text('full_name', isset($motordriver) ? $motordriver->full_name : '', ['class' => 'form-control' ])}}
	</div>

	<div class="col-6">
		{{Form::label('small_name', 'Абривиатура')}}
		{{Form::text('small_name', isset($motordriver) ? $motordriver->small_name : '', ['class' => 'form-control' ])}}
	</div>

</div>

<div class="row mt-3">
	<div class="col-12">
		<button 
			class="btn btn-success motor-control" 
			data-url="{{isset($motordriver) ? route('motordrivers.update', $motordriver) : route('motordrivers.store')}}" 
			data-method="{{isset($motordriver) ? 'patch' : 'post' }}">
				Сохранить
		</button>
		<button class="btn btn-danger motor-control" data-url="{{route('motordrivers.index')}}">Назад</button>
	</div>
</div>

