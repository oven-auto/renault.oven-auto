@isset($devices)
	@foreach($devices as $groupDevices)
		<div class="row pt-3">
			@foreach($groupDevices->chunk(ceil($groupDevices->count()/3)) as $itemChunk)
				
				@if($loop->first)
					<div class="col-12 h5">
						{{$itemChunk[0]->type->name}} 
					</div>
				@endif

				<div class="col-4">
				@foreach($itemChunk as $itemDevice)
					@php($status = ( isset($collect) && $collect->contains('id', $itemDevice->id)))
					<div class="border-bottom item-checkbox {{$status ? 'bg-dark text-light' : '' }}" style="overflow: hidden;width: 100;"> 
						<label class="checkbox" title="{{$itemDevice->name}}">
							<input
								class="device-checkbox-toggle"
								type="checkbox" 
								name="device_id[]" 
								value="{{$itemDevice->id}}" 
								{{ $status ? 'checked' : '' }}
							>
							<div class="checkbox__text" style="overflow: hidden;width: 100%;white-space: nowrap;">
								{{$itemDevice->name}}
							</div>
						</label>	
											
					</div>
				
				@endforeach
				</div>
			@endforeach
		</div>
	@endforeach
@endisset