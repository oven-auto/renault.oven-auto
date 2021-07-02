@extends('layouts.admin')

@section('content')

<div class="row">
	<div class="col-6">
		<a href="{{route('brands.create')}}" class="btn btn-success">
			Добавить бренд
		</a>
	</div>
</div>

<div class="row mt-4 ">
	<div class="col-12">
		@if(isset($brands) && $brands->count())
		<table class="table index-table">
			<tr>
				<th>
					
				</th>
				<th>Название</th>
			</tr>
			@foreach($brands as $itemBrand)
				<tr >
					<td style="width: 110px;">
						<a href="{{route('brands.edit',$itemBrand->id)}}" class="btn btn-primary fa fa-pencil-square-o"></a>
						<button type="button" class="btn btn-danger fa fa-close"></button>
					</td>
					<td>
						<a href="{{route('brands.show',$itemBrand)}}">{{$itemBrand->name}}</a></td>
				</tr>
			@endforeach
		</table>
		@else
			<h4>Не нашлось ни одного бренда</h4>
		@endif
	</div>
</div>

@endsection