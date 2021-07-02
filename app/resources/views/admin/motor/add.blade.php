@extends('layouts.admin')

@section('content')
	
	{{ Form::open([
		'files'=>true,
		'method'=>isset($motor)?'PUT':'POST',
		'url'=>isset($motor)?route('motors.update',$motor):route('motors.store'),
	]) }}

		<div class="row">
			<div class="h4 col-12">
				@if(isset($motor))
					Редактирование мотора
				@else
					Новый мотор
				@endif
			</div>
		</div>

		<div class="row">
			<div class="col-6">
				<div class="mb-3"> 
					{{Form::label('name','Название*')}}
					{{Form::text(
						'name', 
						isset($motor) ? $motor->name : '', 
						['class' => 'form-control', 'required' => 'required', 'placeholder' => 'Например: H4M']
					)}}
				</div>

				<div class="mb-3"> 
					{{Form::label('power','Мощность*')}}
					{{Form::text(
						'power', isset($motor) ? $motor->power : '', ['class'=>'form-control', 'required'=>'required']
					)}}
				</div>

				<div class="mb-3"> 
					{{Form::label('size','Объем*')}}
					{{Form::text(
						'size', isset($motor) ? $motor->size : '', ['class'=>'form-control', 'required'=>'required']
					)}}
				</div>

				<div class="mb-3"> 
					{{Form::label('valve','Кол-во клапанов*')}}
					{{Form::text(
						'valve', isset($motor) ? $motor->valve : '', ['class'=>'form-control', 'required'=>'required']
					)}}
				</div>
			</div>

			<div class="col-6">

				<div class="mb-3">
					{{Form::label('brand_id','Бренд мотора*')}}
					{{Form::select(
						'brand_id',
						$brands,
						isset($motor) ? $motor->brand_id : '',
						['class'=>'form-control', 'required'=>'required', 'placeholder'=>'Выберите из списка']
					)}}
				</div>

				<div class="mb-3">
					{{Form::label('motor_type_id','Тип мотора*')}}
					{{Form::select(
						'motor_type_id',
						$types,
						isset($motor) ? $motor->motor_type_id : '',
						['class'=>'form-control', 'required'=>'required', 'placeholder'=>'Выберите из списка']
					)}}
				</div>

				<div class="mb-3">
					{{Form::label('motor_transmission_id','Трансмиссия мотора*')}}
					{{Form::select(
						'motor_transmission_id',
						$transmissions,
						isset($motor) ? $motor->motor_transmission_id : '',
						['class'=>'form-control', 'required'=>'required', 'placeholder'=>'Выберите из списка']
					)}}
				</div>

				<div class="mb-3">
					{{Form::label('motor_driver_id','Тип привода мотора*')}}
					{{Form::select(
						'motor_driver_id',
						$drivers,
						isset($motor) ? $motor->motor_driver_id : '',
						['class'=>'form-control', 'required'=>'required', 'placeholder'=>'Выберите из списка']
					)}}
				</div>

			</div>
		</div>

		@include('admin.buttons.formcontrol')

	{{ Form::close() }}

@endsection