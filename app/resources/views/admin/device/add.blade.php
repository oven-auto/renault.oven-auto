@extends('layouts.admin')

@section('content')
	
{{ Form::open([
	'files'=>true,
	'method'=>isset($device)?'PUT':'POST',
	'url'=>isset($device)?route('devices.update',$device):route('devices.store'),
]) }}

	<div class="row">
		<div class="h4 col-12">
			@if(isset($device))
				Редактирование оборудования
			@else
				Новое оборудование
			@endif
		</div>
	</div>

	<div class="row">
		<div class="col-6">
			{{Form::label('name', 'Название')}}
			{{Form::text('name', isset($device) ? $device->name : '', ['class' => 'form-control' ])}}

			{{Form::label('device_type_id', 'Тип оборудования')}}
			{{Form::select('device_type_id', $types, isset($device) ? $device->device_type_id : '', ['class' => 'form-control', 'placeholder' => 'Укажите тип оборудования', 'required' => 'required'])}}

			{{Form::label('device_filter_id', 'Фильтр оборудования')}}
			{{Form::select('device_filter_id', $filters, isset($device) ? $device->device_filter_id : '', ['class' => 'form-control', 'placeholder' => 'Укажите фильтр оборудования' ])}}
		</div>

		<div class="col-6">
			{{Form::label('name', 'Бренд')}}

			@foreach($brands as $brand_id => $brand_name)
				{{$brand_name}}
				{{Form::checkbox(
					'brand_ids[]', 
					$brand_id, 
					(isset($device) && $device->brands->contains('id',$brand_id)) ? 1 : ''
				)}}		
			@endforeach
		</div>
	</div>
	
	@include('admin.buttons.formcontrol')

{{Form::close()}}

@endsection