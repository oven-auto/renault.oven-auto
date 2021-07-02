<div class="row">
	@if(isset($marks) && $marks->count())
		@foreach($marks as $itemMark)

			<div 
				class="col-3 item-mark" 
				data-id="{{$itemMark->id}}" 
				data-url-color="{{ route('ajax.colors.list') }}"
            	data-url-option="{{ route('ajax.options.list') }}"
            >
				<div>
					<img src="{{asset('storage/mark/images/'.$itemMark->slug.'/'.$itemMark->presentation->icon)}}" 
						style="width: 100%;">
				</div>
				<div class="text-center h4"> {{$itemMark->name}} </div>
				<input type="hidden" name="mark_id[]" value="{{$itemMark->id}}">
			</div>

		@endforeach
	@endif
</div>