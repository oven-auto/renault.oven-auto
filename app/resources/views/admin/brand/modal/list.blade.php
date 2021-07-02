<div class="row">
@if(isset($brands) && $brands->count())
    @foreach ($brands as $itemBrand)
        <div class="col-4 text-center item-brand">
            <div class="brand-name"> {{ $itemBrand->name }} </div>
            <input type="hidden" value="{{ $itemBrand->id }}" data-url="{{ route('ajax.devices.list') }}" name="brand_id">
        </div>
    @endforeach
@endif
</div>
