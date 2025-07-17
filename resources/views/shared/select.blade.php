@php
    $class ??= null;
    $name ??= '';
    $value ??= '';
    $placeholder ??= ucfirst($name);
@endphp
<div @class(["form-group", $class])>
    <select name="quartier_id" id="select">
        <option value="" disabled selected>Selectionnez un quartier</option>
        @foreach ($quartiers as $k => $v)
            <option {{ $bien->exists && $bien->quartier_id == $k ? 'selected' : '' }} value="{{ $k }}">{{ $v }}</option>
        @endforeach
    </select>
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror    
</div>

