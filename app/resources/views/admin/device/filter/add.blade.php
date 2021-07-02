<div class="row mt-3">

	<div class="col-6">
		{{Form::label('name', 'Название')}}
		{{Form::text('name', isset($filterdevice) ? $filterdevice->name : '', ['class' => 'form-control' ])}}
	</div>

</div>

<div class="row mt-3">
	<div class="col-12">
		<button 
			class="btn btn-success motor-control" 
			data-url="{{isset($filterdevice) ? route('filterdevices.update', $filterdevice) : route('filterdevices.store')}}" 
			data-method="{{isset($filterdevice) ? 'patch' : 'post' }}">
				Сохранить
		</button>
		<button class="btn btn-danger motor-control" data-url="{{route('filterdevices.index')}}">Назад</button>
	</div>
</div>

