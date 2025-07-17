@php
    $class ??= null;
    $name ??= '';
    $value ??= '';
    $placeholder ??= ucfirst($name);
@endphp
<div @class(["form-group", $class])>
    <select name="type_bien_id" id="select">
        <option value="" disabled selected>Selectionnez le type du bien</option>
        @foreach ($type_bien as $r => $nam)
            <option {{ $bien->exists && $bien->type_bien_id== $r ? 'selected' : '' }} value="{{ $r }}">{{ $nam }}</option>
        @endforeach
    </select>
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror    
</div>

