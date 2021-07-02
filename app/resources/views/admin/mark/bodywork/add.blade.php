<div class="row mt-3">

	<div class="col-6">
		{{Form::label('name', 'Название')}}
		{{Form::text('name', isset($bodywork) ? $bodywork->name : '', ['class' => 'form-control' ])}}
	</div>

</div>

<div class="row mt-3">
	<div class="col-12">
		<button 
			class="btn btn-success motor-control" 
			data-url="{{isset($bodywork) ? route('bodyworks.update', $bodywork) : route('bodyworks.store')}}" 
			data-method="{{isset($bodywork) ? 'patch' : 'post' }}">
				Сохранить
		</button>
		<button class="btn btn-danger motor-control" data-url="{{route('bodyworks.index')}}">Назад</button>
	</div>
</div>

