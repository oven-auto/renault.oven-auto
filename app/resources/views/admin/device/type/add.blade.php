<div class="row mt-3">

	<div class="col-6">
		{{Form::label('name', 'Название')}}
		{{Form::text('name', isset($typedevice) ? $typedevice->name : '', ['class' => 'form-control' ])}}
	</div>

</div>

<div class="row mt-3">
	<div class="col-12">
		<button 
			class="btn btn-success motor-control" 
			data-url="{{isset($typedevice) ? route('typedevices.update', $typedevice) : route('typedevices.store')}}" 
			data-method="{{isset($typedevice) ? 'patch' : 'post' }}">
				Сохранить
		</button>
		<button class="btn btn-danger motor-control" data-url="{{route('typedevices.index')}}">Назад</button>
	</div>
</div>

