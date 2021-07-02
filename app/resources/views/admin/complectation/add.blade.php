@extends('layouts.admin')

@section('content')

	{{ Form::open([
		'files'=>true,
		'method'=>isset($complectation)?'PUT':'POST',
		'url'=>isset($complectation)?route('complectations.update',$complectation):route('complectations.store'),
	]) }}
	<div class="complect-edit">
		<div class="row">
			<div class="h4 col-12">
				@if(isset($complectation))
					Редактирование комплектации
				@else
					Новая комплектация
				@endif
			</div>
		</div>

		<div class="row">
			<div class="col-4">
				{{Form::label('name', 'Название')}}
				{{Form::text('name', isset($complectation) ? $complectation->name : '' , ['class' => 'form-control'] )}}
			</div>

			<div class="col-4">
				{{Form::label('code', 'Код')}}
				{{Form::text('code', isset($complectation) ? $complectation->code : '', ['class' => 'form-control'] )}}
			</div>

			<div class="col-4">
				{{Form::label('price', 'Цена')}}
				{{Form::text('price', isset($complectation) ? $complectation->price : '', ['class' => 'form-control'] )}}
			</div>
		</div>

		<div class="row pt-4">
			<div class="col">

                <div class="checked-brand">
                    <div class="brand-name">{{ isset($complectation) ? $complectation->brand->name : 'Бренд не выбран' }}</div>
                    <input type="hidden" name="brand_id" value="{{ isset($complectation) ? $complectation->brand_id : '' }}">
                </div>

                <button type="button" class="btn btn-dark btn-block modal-brand-toggle" data-url="{{route('ajax.brands.list')}} ">
					Выбрать {{ isset($complectation) ? 'другой' : '' }} бренд
				</button>

			</div>

			<div class="col">
                <div class="checked-motor">
                    <div class="motor-name">{{ isset($complectation) ? $complectation->motor->fullName : 'Мотор не выбран' }}</div>
                    <input type="hidden" name="motor_id" value="{{ isset($complectation) ? $complectation->motor_id : '' }}">
                </div>

				<button type="button" class="btn btn-dark btn-block modal-motor-togle" data-url="{{route('ajax.motors.list')}} ">
					Выбрать мотор
				</button>
			</div>

			<div class="col">
				<div class="checked-mark">
                    <div class="mark-name">{{ isset($complectation) ? $complectation->motor->fullName : 'Модель не выбрана' }}</div>
                    <input type="hidden" name="mark_id" value="{{ isset($complectation) ? $complectation->mark_id : '' }}">
                </div>
				<button type="button" class="btn btn-dark btn-block" id="mark-modal-toggle" data-url="{{route('ajax.marks.list')}} ">
					Выбрать модель
				</button>
			</div>
		</div>

        <div class="row pt-4">
            <div class="col-12 h4">
                Оборудование комплектации
            </div>

            <div class="col-12 devices-block">
                @if(isset($devices))
                    @include('admin.device.modal.list', [ 'collect' => $option->devices] )
                @else
                    Вы не добовляли оборудование в эту комплектацию
                @endif
            </div>
        </div>

        <div class="row pt-4">
            <div class="col-12 h4">
                Опции комплектации
            </div>

            <div class="col-12 option-block">
                @if(isset($options))
                    @include('admin.option.modal.list' )
                @else
                    Вы не добовляли опции в эту комплектацию
                @endif
            </div>
        </div>

        <div class="row pt-4">
            <div class="col-12 h4">
                Палитра комплектации
            </div>

            <div class="col-12 color-block">
                @if(isset($options))
                    @include('admin.color.modal.list' )
                @else
                    Вы не добовляли цвета в эту комплектацию
                @endif
            </div>
        </div>

	</div>

		@include('admin.buttons.formcontrol')

	{{ Form::close() }}

@endsection
