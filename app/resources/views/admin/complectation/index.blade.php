@extends('layouts.admin')

@section('content')

<div class="row">
	<div class="col">
		<a href="{{route('complectations.create')}}" class="btn btn-success">Добавить комплектацию</a>
	</div>

	<div class="col">
		
	</div>
</div>

<div class="row mt-4">
	<div class="col"> 
	@if(isset($complectations) && $complectations->count())
		<table class="table">
		@foreach($complectations as $itemComplectation)
			<tr>
				<td style="width: 110px;">
					<a href="{{route('complectations.edit',$itemComplectation)}}" class="btn btn-primary fa fa-pencil-square-o"></a>
					<button type="button" class="btn btn-danger fa fa-close"></button>
				</td>
				<td>
					{{$itemComplectation->name}}
				</td>
			</tr>
		@endforeach
		</table>
	@else
		<h4>Не нашлось ни одной комплектации</h4>
	@endif
	</div>
</div>


@endsection