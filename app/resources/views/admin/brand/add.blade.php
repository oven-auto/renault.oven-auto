@extends('layouts.admin')

@section('content')

	{{ Form::open([
		'files'=>true,
		'method'=>isset($brand)?'PUT':'POST',
		'url'=>isset($brand)?route('brands.update',$brand):route('brands.store'),
	]) }}

		<div class="row">
			<div class="h4 col-12">
				@if(isset($brand))
					Редактирование бренда: {{$brand->name}}
				@else
					Новый бренд
				@endif
			</div>
		</div>

		<div class="row">
			<div class="col-6">
				{{Form::label('name','Название')}}
				{{Form::text('name', isset($brand) ? $brand->name : '', ['class'=>'form-control', 'required'=>'required'])}}
			</div>
		</div>

		@include('admin.buttons.formcontrol')

	{{ Form::close() }}

@endsection


