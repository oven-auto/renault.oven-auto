@extends('layouts.admin')

@section('content')
	
{{ Form::open([
	'files'=>true,
	'method'=>isset($property)?'PUT':'POST',
	'url'=>isset($property)?route('properties.update',$property):route('properties.store'),
]) }}

	<div class="row">
		<div class="h4 col-12">
			@if(isset($property))
				Редактирование характеристики
			@else
				Новая характеристика
			@endif
		</div>
	</div>

	<div class="row">
		<div class="col-6">
			{{Form::label('name', 'Название')}}
			{{Form::text('name', isset($property) ? $property->name : '', ['class' => 'form-control' ])}}
		</div>
	</div>
	
	@include('admin.buttons.formcontrol')

{{Form::close()}}

@endsection