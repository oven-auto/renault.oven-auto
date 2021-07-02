@extends('layouts.admin')

@section('content')
	
{{ Form::open([
	'files'=>true,
	'method'=>isset($color)?'PUT':'POST',
	'url'=>isset($color)?route('colors.update',$color):route('colors.store'),
]) }}

	<div class="row">
		<div class="h4 col-12">
			@if(isset($color))
				Редактирование цвета
			@else
				Новый цвет
			@endif
		</div>
	</div>

	<div class="row">
		<div class="col-6">
			{{Form::label('name', 'Название')}}
			{{Form::text('name', isset($color) ? $color->name : '', ['class' => 'form-control' ])}}

			{{Form::label('brand_id', 'Бренд')}}
			{{Form::select('brand_id', $brands, isset($color) ? $color->brand_id : '', ['class'=>'form-control', 'placeholder'=>'Укажите бренд'])}}

			{{Form::label('code', 'Код цвета')}}
			{{Form::text('code', isset($color) ? $color->code : '', ['class' => 'form-control' ])}}
		</div>

		<div class="col-6">
			<div class="">
				{{Form::label('web[1]', 'Цвет')}}
				<button type="button" class="btn btn-block btn-success" id="add-color-field">
					Добавить поле цвета
				</button>
			</div>

			<div class="color-block"> 
			@if(isset($color) && $color->getWebCode())
				@foreach($color->getWebCode() as $itemColor)
					@if($loop->first)
						<div class="main-color"> 
							{{Form::label('web[]', 'Основной цвет')}}
							{{Form::color('web[]', $itemColor, ['class' => 'form-control' ])}}
						</div>
					@else
						<div class="sub-color"> 
							<label>
								Дополнительный цвет <button class="del-color">Удалить</button>
							</label>
							{{Form::color('web[]', $itemColor, ['class' => 'form-control' ])}}
						</div>
					@endif
				@endforeach
			@else
				<div class="main-color"> 
					{{Form::label('web[]', 'Основной цвет')}}
					{{Form::color('web[]', '', ['class' => 'form-control' ])}}
				</div>
			@endif
			</div>

		</div>
	</div>
	
	@include('admin.buttons.formcontrol')

{{Form::close()}}

@endsection