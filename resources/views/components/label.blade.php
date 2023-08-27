@props(['value'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700']) }}>
    {{ $value ?? $slot }} @if(isset($attributes["required"]))<span class="required">*</span>@endif
</label>
