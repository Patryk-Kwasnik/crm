@php
    $editing = isset($customer);
    $customer = $customer ?? null;
@endphp

<div class="row">

    <div class="col-xs-12 col-sm-12 col-md-5">
        <div class="form-group">
            <label><strong>{{ __('customers.company_name') }}</strong></label>
            <input type="text" name="company_name" class="form-control"
                   value="{{ old('company_name', $customer->company_name ?? '') }}">
            <x-input-error field="company_name" />
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-5">
        <div class="form-group">
            <label><strong>{{ __('customers.tax_number') }}</strong></label>
            <input type="text" name="tax_number" class="form-control"
                   value="{{ old('tax_number', $customer->tax_number ?? '') }}">
            <x-input-error field="tax_number" />
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-5">
        <div class="form-group">
            <label><strong>{{ __('customers.first_name') }}</strong></label>
            <input type="text" name="first_name" class="form-control"
                   value="{{ old('first_name', $customer->first_name ?? '') }}">
            <x-input-error field="first_name" />
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-5">
        <div class="form-group">
            <label><strong>{{ __('customers.last_name') }}</strong></label>
            <input type="text" name="last_name" class="form-control"
                   value="{{ old('last_name', $customer->last_name ?? '') }}">
            <x-input-error field="last_name" />
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-5">
        <div class="form-group">
            <label><strong>{{ __('customers.email') }}</strong></label>
            <input type="email" name="email" class="form-control"
                   value="{{ old('email', $customer->email ?? '') }}">
            <x-input-error field="email" />
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-5">
        <div class="form-group">
            <label><strong>{{ __('customers.phone') }}</strong></label>
            <input type="text" name="phone" class="form-control"
                   value="{{ old('phone', $customer->phone ?? '') }}">
            <x-input-error field="phone" />
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-5">
        <div class="form-group">
            <label><strong>{{ __('customers.country') }}</strong></label>
            <select name="country" class="form-control">
                <option value="">{{ __('system.select') }}</option>
                @foreach(\App\Helpers\CountryHelper::all() as $value => $label)
                    <option value="{{$value}}" {{ old('country', $customer?->country) == $value ? 'selected' : '' }}>{{$label}}</option>
                @endforeach
            </select>
            <x-input-error field="country" />
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-5">
        <div class="form-group">
            <label><strong>{{ __('customers.address') }}</strong></label>
            <input type="text" name="address" class="form-control"
                   value="{{ old('address', $customer->address ?? '') }}">
            <x-input-error field="address" />
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-5">
        <div class="form-group">
            <label><strong>{{ __('customers.postal_code') }}</strong></label>
            <input type="text" name="postal_code" class="form-control"
                   value="{{ old('postal_code', $customer->postal_code ?? '') }}">
            <x-input-error field="postal_code" />
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-5">
        <div class="form-group">
            <label><strong>{{ __('customers.city') }}</strong></label>
            <input type="text" name="city" class="form-control"
                   value="{{ old('city', $customer->city ?? '') }}">
            <x-input-error field="city" />
        </div>
    </div>

    <div class="col-xs-12 col-sm-12 col-md-5">
        <div class="form-group">
            <label><strong>{{ __('customers.status') }}</strong></label>
            <select name="status" class="form-control">
                <option value="">{{ __('system.select') }}</option>
                @foreach(\App\Enums\ActiveStatusEnum::getList() as $value => $label)
                    <option value="{{$value}}" {{ old('status', $customer?->status) == $value ? 'selected' : '' }}>{{$label}}</option>
                @endforeach
            </select>
            <x-input-error field="status" />
        </div>
    </div>
</div>
