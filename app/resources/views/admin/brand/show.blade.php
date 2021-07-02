@extends('layouts.admin')

@section('content')

		<div class="row">
			<div class="h4 col-12">
				Бренд: {{$brand->name}}
			</div>
		</div>

		<div class="row">
			<div class="col-6">
				<div>
					Название: {{$brand->name}}
				</div>
			</div>
		</div>

		@include('admin.buttons.showcontrol',['editroute'=>route('brands.edit',$brand)])


@endsection
