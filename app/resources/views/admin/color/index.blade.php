@extends('layouts.admin')

@section('content')

<div class="row">
	<div class="col">
		<a href="{{route('colors.create')}}" class="btn btn-success">Добавить цвет</a>
	</div>
</div>

<div class="row mt-4 d-flex">
	
	@if(isset($colors) && $colors->count())
		@foreach($colors as $itemColor)
			<div class="col-2 text-center mb-2">
				<div class="color-wraper py-2">
					<a href="{{route('colors.edit',$itemColor)}}">
						<div class="h5 p-0 m-0"><b>{{$itemColor->code}}</b></div>
						<div class=""> {{$itemColor->brand->name}} </div>
						<div class="color-icon mb-2" style="background: {{$itemColor->getGradient()}}"></div> 
						<div class="h5 p-0 m-0"> {{$itemColor->name}} </div>
					</a>
				</div>
			</div>
		@endforeach
	@else
		<div class="col">
			<h4>Не нашлось ни одного цвета</h4>
		</div>
	@endif
	</div>
</div>


@endsection