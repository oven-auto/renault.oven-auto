<div class="row">
	@if(isset($options) && $options->count())
		@foreach($options as $itemOption)
			@php($status = 0)
			<div class="col-12 item-option" >
				<label class="checkbox d-flex align-items-center" title="{{$itemOption->name}}">
					<input
						class="device-checkbox-toggle"
						type="checkbox" 
						name="device_id[]" 
						value="{{$itemOption->id}}" 
						{{ $status ? 'checked' : '' }}
					>
					<div class="checkbox__text" style="">
						<b> 
							{{ ($itemOption->name) ? $itemOption->name.' |' : '' }} 
							{{ $itemOption->code}} 
						</b>
						<br>

						{{ implode(" *** ", $itemOption->devices->pluck('name')->toArray()) }}

					</div>
				</label>
			</div>

		@endforeach
	@endif
</div>