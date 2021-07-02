<div class="row">
@if(isset($motors) && $motors->count())
    @foreach ($motors as $itemMotor)
        <div class="col-4 text-center item-motor">
            <div class="brand-name"> {{ $itemMotor->full_name }} </div>
            <input 
            	type="hidden" 
            	value="{{ $itemMotor->id }}" 
            	name="motor_id" 
            >
        </div>
    @endforeach
@endif
</div>
