@php
    $class ??= null;
    $type ??= 'text';
    $name ??= '';
    $value ??= '';
    $label ??= ucfirst($name);
@endphp
<div @class(["form-group", $class]) id="input">
    <label for="{{ $name }}"> {{ $label }} :</label><br>
    @if ($type == 'textarea')
        <textarea type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" class="form-control @error($name) is-invalid @enderror" value="">{{ old($name, $bien->Description ?? '') }}</textarea>
    @else
        <input type="{{ $type }}" id="{{ $name }}" name="{{ $name }}" class="form-control @error($name) is-invalid @enderror" value="{{ old($name,$value) }}">
    @endif
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>