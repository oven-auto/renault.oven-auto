@extends('layouts.admin')

@section('content')

	{{ Form::open([
		'files'=>true,
		'method'=>isset($mark)?'PUT':'POST',
		'url'=>isset($mark)?route('marks.update',$mark):route('marks.store'),
	]) }}

		<div class="row">
			<div class="h4 col-12">
				@if(isset($mark))
					Редактирование модели: {{$mark->name}}
				@else
					Новая модель
				@endif
			</div>
		</div>

		<div class="row">
			<div class="col-12 pt-3">
				<h4>Базовые свойства модели</h4>
			</div> 

			<div class="col-12">
				<div class="row">
					<div class="col"> 
						{{Form::label('name','Название')}}
						{{Form::text('name', isset($mark) ? $mark->name : '', ['class'=>'form-control', 'requiredd'=>'requiredd', 'placeholder'=>'Название модели'])}}
					</div>

					<div class="col"> 
						{{Form::label('prefix','Префикс')}}
						{{Form::text('prefix', isset($mark) ? $mark->prefix : '', ['class'=>'form-control', 'requiredd'=>'requiredd', 'placeholder'=>'Например: New'])}}
					</div>

					<div class="col"> 
						{{Form::label('status','Статус')}}
						{{Form::select('status', [0=>'Не активна', 1=>'Активна'],isset($mark) ? $mark->status : '', ['class'=>'form-control', 'requiredd'=>'requiredd', 'placeholder'=>'Укажите статус'])}}
					</div>
				</div>
			</div>
						
			
			<div class="col-12">
				<div class="row">
					<div class="col"> 
						{{Form::label('brand_id', 'Бренд')}}
						{{Form::select('brand_id', $brands, isset($mark) ? $mark->brand_id : '', ['class'=>'form-control', 'requiredd'=>'requiredd', 'placeholder'=>'Укажите бренд'])}}
					</div>
					<div class="col"> 
						{{Form::label('body_work_id', 'Тип кузова')}}
						{{Form::select('body_work_id', $bodyworks, isset($mark) ? $mark->body_work_id : '', ['class'=>'form-control', 'requiredd'=>'requiredd', 'placeholder'=>'Укажите тип кузова'])}}
					</div>
					<div class="col"> 
						{{Form::label('country_production_id', 'Страна производства')}}
						{{Form::select('country_production_id', $countries, isset($mark) ? $mark->country_production_id : '', ['class'=>'form-control', 'requiredd'=>'requiredd', 'placeholder'=>'Укажите страну производства'])}}
					</div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-12 pt-3">
				<h4>Описание модели</h4>
			</div> 
			<div class="col">
				{{Form::label('slogan','Слоган')}}
				{{Form::text('slogan', isset($mark) ? $mark->presentation->slogan : '', ['class'=>'form-control', 'requiredd'=>'requiredd'])}}

				{{Form::label('text','Описание')}}
				{{Form::textarea('text', isset($mark) ? $mark->presentation->text : '', ['class'=>'form-control', 'requiredd'=>'requiredd'])}}
			</div>
		</div>

		<div class="row pt-3">
			<div class="col">
				{{Form::label('icon','Иконка', ['style'=>'display: block;'])}}
				@isset($mark->presentation->icon)
				<div class="">
					<img src="{{asset('storage/mark/images/'.$mark->slug.'/'.$mark->presentation->icon)}}" 
						style="height: 150px;">
				</div>
				@endif
				<div class="custom-file">
				    <input type="file" class="custom-file-input" name="icon">
				    <label class="custom-file-label" for="validatedCustomFile">Выбор фаила...</label>
				    <div class="invalid-feedback"></div>
				</div>
			</div>

			<div class="col">
				{{Form::label('banner','Банер', ['style'=>'display: block;'])}}
				@isset($mark->presentation->banner)
				<div class="">
					<img src="{{asset('storage/mark/images/'.$mark->slug.'/'.$mark->presentation->banner)}}" 
						style="height: 150px;">
				</div>
				@endif
				<div class="custom-file">
				    <input type="file" class="custom-file-input" name="banner">
				    <label class="custom-file-label" for="validatedCustomFile">Выбор фаила...</label>
				    <div class="invalid-feedback"></div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-12 pt-3">
				<h4>Характеристики модели</h4>
			</div> 
			@foreach($properties as $id => $name)			
				<div class="col-3">
					@php( $status = (isset($mark) && $mark->properties->contains('property_id', $id)) )
					{{Form::label('',$name)}}
					{{Form::text(
						'properties['.$id.']',
						($status) ? $mark->properties->firstWhere('property_id', $id)->value : '', 
						['class'=>'form-control', 'requiredd'=>'requiredd'
					])}}
				</div>
			@endforeach
		</div>

		<div class="row">
			<div class="col-12 pt-3">
				<h4>Документация</h4>
			</div>

			<div class="col-3">
				@isset($mark->document->brochure)
					<a href="{{asset('storage/mark/documents/'.$mark->slug.'/'.$mark->document->brochure)}}">
						Брошюра
					</a>
				@endif
				<div class="custom-file">
				    <input type="file" class="custom-file-input" name="documents[brochure]">
				    <label class="custom-file-label" for="validatedCustomFile">Выбор фаила...</label>
				    <div class="invalid-feedback"></div>
				</div>
			</div>

			<div class="col-3">
				@isset($mark->document->price)
					<a href="{{asset('storage/mark/documents/'.$mark->slug.'/'.$mark->document->price)}}">
						Прайс
					</a>
				@endif
				<div class="custom-file">
				    <input type="file" class="custom-file-input" name="documents[price]">
				    <label class="custom-file-label" for="validatedCustomFile">Выбор фаила...</label>
				    <div class="invalid-feedback"></div>
				</div>
			</div>

			<div class="col-3">
				@isset($mark->document->manual)
					<a href="{{asset('storage/mark/documents/'.$mark->slug.'/'.$mark->document->manual)}}">
						Инструкция
					</a>
				@endif
				<div class="custom-file">
				    <input type="file" class="custom-file-input" name="documents[manual]">
				    <label class="custom-file-label" for="validatedCustomFile">Выбор фаила...</label>
				    <div class="invalid-feedback"></div>
				</div>
			</div>

			<div class="col-3">
				@isset($mark->document->accessory)
					<a href="{{asset('storage/mark/documents/'.$mark->slug.'/'.$mark->document->accessory)}}">
						Аксессуары
					</a>
				@endif
				<div class="custom-file">
				    <input type="file" class="custom-file-input" name="documents[accessory]">
				    <label class="custom-file-label" for="validatedCustomFile">Выбор фаила...</label>
				    <div class="invalid-feedback"></div>
				</div>
			</div>
		</div>

		<div class="row">
			<div class="col-12 pt-3">
				<h4>Используемые цвета</h4>
			</div>
			<div class="col-12">
				<button class="btn btn-dark" id="color-palette" data-url="{{route('colors.palette')}}" type="button">
					Палитра цветов
				</button>
			</div>

			<div class="col-12 pt-3">
				<div class="row color-area">
					@if(isset($mark->colors) && $mark->colors->count())
						@foreach($mark->colors as $itemColor)
							<div class="col-2 text-center mb-2 color-choice" data-color-id="{{$itemColor->color_id}}">
								<div class="color-wraper py-2 ">
									<div class="h5 p-0 m-0"><b>{{$itemColor->color->code}}</b></div>
									<div class=""> {{$itemColor->color->brand->name}} </div>
									<div class="mb-2">
										<img src="{{asset('storage/mark/colors/'.$mark->slug.'/'.$itemColor->img)}}" 
											style="width: 100%;">
									</div> 
									<div class=" p-0 m-0"> {{$itemColor->color->name}} </div>

									<div class="custom-file">
								    	<input type="file" class="custom-file-input color-file" name="colors[{{$itemColor->color_id}}][img]">
								    	<input type="hidden" name="colors[{{$itemColor->color_id}}][id]" class="color-hidden">
								    	<label class="custom-file-label" for="validatedCustomFile"></label>
								    	<div class="invalid-feedback"></div>
									</div>
								</div>
							</div>
						@endforeach
					@endif
				</div>
			</div>
		</div>

		@include('admin.buttons.formcontrol')

	{{ Form::close() }}

@endsection


