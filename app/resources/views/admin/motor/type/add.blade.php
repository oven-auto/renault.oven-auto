<div class="row mt-3">

	<div class="col-6">
		{{Form::label('full_name', 'Полное название')}}
		{{Form::text('full_name', isset($motortype) ? $motortype->full_name : '', ['class' => 'form-control' ])}}
	</div>

	<div class="col-6">
		{{Form::label('small_name', 'Абривиатура')}}
		{{Form::text('small_name', isset($motortype) ? $motortype->small_name : '', ['class' => 'form-control' ])}}
	</div>

</div>

<div class="row mt-3">
	<div class="col-12">
		<button 
			class="btn btn-success motor-control" 
			data-url="{{isset($motortype) ? route('motortypes.update',$motortype) : route('motortypes.store')}}" 
			data-method="{{isset($motortype) ? 'patch' : 'post' }}">
				Сохранить
		</button>
		<button class="btn btn-danger motor-control" data-url="{{route('motortypes.index')}}">Назад</button>
	</div>
</div>

