<div class="row">
	@if(isset($colors) && $colors->count())
		@foreach($colors as $itemColor)

			<div class="col-3 item-option text-center" >
				
				<div class="rounded bg-light-grey p-2">
					<label class="checkbox d-flex align-items-center" title="{{$itemColor->name}}">
						<input
							class="device-checkbox-toggle"
							type="checkbox" 
							name="color[ {{ $itemColor->id }} ][color_id]" 
							value="{{$itemColor->id}}" 
							
						>
						<div class="checkbox__text" style="display: block;padding:0px;width: 100%;">
							
							<div class="color-icon mb-2 mt-4" style="background: {{$itemColor->getGradient()}}"></div> 
							<div class=" h4"> {{$itemColor->name}} </div>

						</div>
					</label>

					{{Form::select(
						'color['.$itemColor->id.'][option_id]', 
						$options, 
						'', 
						[
							'class' => 'form-control', 
							'multiple', 
							'style' => 'background: transparent;border: 1px solid #bbb; box-shadow: 0 0 5px #999 inset;'
						]
					)}}

				</div>
			</div>

		@endforeach
	@endif
</div>