@extends('layouts.admin')

@section('content')
	
	{{ Form::open([
		'files'=>true,
		'method'=>isset($option)?'PUT':'POST',
		'url'=>isset($option)?route('options.update',$option):route('options.store'),
	]) }}

		<div class="row">
			<div class="h4 col-12">
				@if(isset($option))
					Редактирование опции
				@else
					Новая опция
				@endif
			</div>
		</div>

		<div class="row option-edit">
			<div class="col-12">
				<div class="row">
					<div class="col"> 
						{{Form::label('name', 'Название')}}
						{{Form::text('name', isset($option) ? $option->name : '' , ['class' => 'form-control'])}}
					</div>

					<div class="col"> 
						{{Form::label('code', 'Код')}}
						{{Form::text('code', isset($option) ? $option->code : '', ['class' => 'form-control'])}}
					</div>

					<div class="col">
						{{Form::label('price', 'Цена')}}
						{{Form::text('price', isset($option) ? $option->price : '', ['class' => 'form-control'])}}
					</div>

					<div class="col">
						{{Form::label('brand_id', 'Бренд')}}
						{{Form::select(
							'brand_id', 
							$brands, 
							isset($option) ? $option->brand_id : '', 
							[
								'class' => 'form-control', 
								'placeholder' => 'Укажите бренд',
								'data-url' => route('ajax.devices.list'),
								
							])
						}}
					</div>
				</div>

				<div class="row">
					<div class="col"> 
						{{Form::label('colored', 'Опция цвета')}}
						{{Form::checkbox('colored', 1, isset($option) ? $option->colored : '', ['class' => 'form-control'])}}
					</div>
				</div>



				<div class="row pt-4">
					<div class="col-12 h4">
						Оборудование опции
					</div>

					<div class="col-12 devices-block">
						@if(isset($devices))
							@include('admin.device.modal.list', [ 'collect' => $option->devices] )
						@else
							Вы не добовляли оборудование в эту опцию
						@endif
					</div>
				</div>


				<div class="row pt-4">
					<div class="col-12 h4">
						Модели 
						<button type="button" data-url="{{route('ajax.marks.list')}}" id="mark-modal-toggle">
							Добавить/удалить модели
						</button>
					</div>

					<div class="col-12 ">
						<div class="row marks-block">
							@if(isset($option) && $option->marks)
								@include('admin.mark.modal.list', ['marks'=>$option->marks])
							@endif
						</div>
					</div>
				</div>

			</div>
		</div>

		@include('admin.buttons.formcontrol')

	{{ Form::close() }}

@endsection