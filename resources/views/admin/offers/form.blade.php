@php
    $editing = isset($offer);
    $customer = $customer ?? null;
@endphp

<div class="row">
    {{-- Customer Select --}}
    <div class="col-md-5">
        <div class="form-group">
            <label><strong>{{ __('offers.customer_id') }}</strong></label>
            <select name="customer_id" class="form-control">
                <option value="">{{ __('system.select') }}</option>
                @foreach($customers as $id => $customer)
                    <option value="{{ $id }}"
                        {{ old('customer_id', $offer->customer_id ?? '') == $id ? 'selected' : '' }}>
                        {{ $customer }}
                    </option>
                @endforeach
            </select>
            <x-input-error field="customer_id" />
        </div>
    </div>

    {{-- Optional contact fields --}}
    <div class="col-md-5">
        <div class="form-group">
            <label><strong>{{ __('offers.customer_name') }}</strong></label>
            <input type="text" name="customer_name" class="form-control"
                   value="{{ old('customer_name', $offer->customer_name ?? '') }}">
            <x-input-error field="customer_name" />
        </div>
    </div>

    <div class="col-md-5">
        <div class="form-group">
            <label><strong>{{ __('offers.customer_email') }}</strong></label>
            <input type="email" name="customer_email" class="form-control"
                   value="{{ old('customer_email', $offer->customer_email ?? '') }}">
            <x-input-error field="customer_email" />
        </div>
    </div>

    <div class="col-md-5">
        <div class="form-group">
            <label><strong>{{ __('offers.customer_phone') }}</strong></label>
            <input type="text" name="customer_phone" class="form-control"
                   value="{{ old('customer_phone', $offer->customer_phone ?? '') }}">
            <x-input-error field="customer_phone" />
        </div>
    </div>

    {{-- Title --}}
    <div class="col-md-5">
        <div class="form-group">
            <label><strong>{{ __('offers.title') }}</strong></label>
            <input type="text" name="title" class="form-control"
                   value="{{ old('title', $offer->title ?? '') }}">
            <x-input-error field="title" />
        </div>
    </div>

    {{-- Description --}}
    <div class="col-md-10">
        <div class="form-group">
            <label><strong>{{ __('offers.description') }}</strong></label>
            <textarea name="description" class="form-control"
                      rows="3">{{ old('description', $offer->description ?? '') }}</textarea>
            <x-input-error field="description" />
        </div>
    </div>

    {{-- Notes --}}
    <div class="col-md-10">
        <div class="form-group">
            <label><strong>{{ __('offers.notes') }}</strong></label>
            <textarea name="notes" class="form-control"
                      rows="3">{{ old('notes', $offer->notes ?? '') }}</textarea>
            <x-input-error field="notes" />
        </div>
    </div>

    {{-- Pricing --}}
    <div class="col-md-5">
        <div class="form-group">
            <label><strong>{{ __('offers.total_amount') }}</strong></label>
            <input type="number" step="0.01" name="total_amount" class="form-control"
                   value="{{ old('total_amount', $offer->total_amount ?? '') }}">
            <x-input-error field="total_amount" />
        </div>
    </div>

    <div class="col-md-2">
        <div class="form-group">
            <label><strong>{{ __('offers.discount') }}</strong></label>
            <input type="number" step="1" name="discount" class="form-control"
                   value="{{ old('discount', $offer->discount ?? '0') }}">
            <x-input-error field="discount" />
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <label><strong>{{ __('offers.currency') }}</strong></label>
            <input type="text" name="currency" maxlength="3" class="form-control"
                   value="{{ old('currency', $offer->currency ?? 'PLN') }}">
            <x-input-error field="currency" />
        </div>
    </div>

    {{-- Valid Until --}}
    <div class="col-md-5">
        <div class="form-group">
            <label><strong>{{ __('offers.valid_until') }}</strong></label>
            <input type="date" name="valid_until" class="form-control"
                   value="{{ old('valid_until', $offer->valid_until ?? '') }}">
            <x-input-error field="valid_until" />
        </div>
    </div>

    {{-- Status --}}
    <div class="col-md-5">
        <div class="form-group">
            <label><strong>{{ __('offers.status') }}</strong></label>
            <select name="status" class="form-control">
                @foreach(\App\Enums\OfferStatusEnum::getList() as $value => $label)
                    <option value="{{ $value }}"
                        {{ old('status', $offer->status ?? '') == $value ? 'selected' : '' }}>
                        {{ $label }}
                    </option>
                @endforeach
            </select>
            <x-input-error field="status" />
        </div>
    </div>
</div>
