<div class="row">
@foreach($colors as $itemColor)
	<div class="col-2 text-center mb-2 color-choice" data-color-id="{{$itemColor->id}}">
		<div class="color-wraper py-2 ">
			<div class="h5 p-0 m-0"><b>{{$itemColor->code}}</b></div>
			<div class=""> {{$itemColor->brand->name}} </div>
			<div class="color-icon mb-2" style="background: {{$itemColor->getGradient()}}"></div> 
			<div class=" p-0 m-0"> {{$itemColor->name}} </div>
		</div>
	</div>
@endforeach
</div>