@php
    $editing = isset($offerTemplate);
    $offerTemplate = $offerTemplate ?? null;
@endphp

<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label><strong>{{ __('offers_templates.name') }}</strong></label>
            <input type="text" name="name" class="form-control"
                   value="{{ old('name', $offerTemplate->name ?? '') }}">
            <x-input-error field="name"/>
        </div>
    </div>

    <div class="col-md-10 mt-3">
        <div class="form-group">
            <label><strong>{{ __('offers_templates.description') }}</strong></label>
            <textarea name="description" class="form-control" rows="4">
                {{ old('description', $offerTemplate->description ?? '') }}
            </textarea>
            <x-input-error field="description"/>
        </div>
    </div>

    <div class="col-md-10 mt-3">
        <div class="form-group">
            <label><strong>{{ __('offers_templates.content') }}</strong></label>
            <textarea name="content" class="form-control editor_tinyMce" rows="10">
                {{ old('content', $offerTemplate->content ?? '') }}
            </textarea>
            <x-input-error field="content"/>
        </div>
    </div>

    <div class="col-md-4 mt-3">
        <div class="form-group">
            <label><strong>{{ __('offers_templates.status') }}</strong></label>
            <select name="status" class="form-control">
                <option value="">{{ __('system.select') }}</option>
                @foreach(\App\Enums\ActiveStatusEnum::getList() as $value => $label)
                    <option value="{{$value}}" {{ old('status', $offerTemplate?->status) == $value ? 'selected' : '' }}>{{$label}}</option>
                @endforeach
            </select>
            <x-input-error field="status"/>
        </div>
    </div>
</div>
