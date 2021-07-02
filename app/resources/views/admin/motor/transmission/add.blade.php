<div class="row mt-3">

	<div class="col-6">
		{{Form::label('full_name', 'Полное название')}}
		{{Form::text('full_name', isset($motortransmission) ? $motortransmission->full_name : '', ['class' => 'form-control' ])}}
	</div>

	<div class="col-6">
		{{Form::label('small_name', 'Абривиатура')}}
		{{Form::text('small_name', isset($motortransmission) ? $motortransmission->small_name : '', ['class' => 'form-control' ])}}
	</div>

</div>

<div class="row mt-3">
	<div class="col-12">
		<button 
			class="btn btn-success motor-control" 
			data-url="{{isset($motortransmission) ? route('motortransmissions.update', $motortransmission) : route('motortransmissions.store')}}" 
			data-method="{{isset($motortransmission) ? 'patch' : 'post' }}">
				Сохранить
		</button>
		<button class="btn btn-danger motor-control" data-url="{{route('motortransmissions.index')}}">Назад</button>
	</div>
</div>

