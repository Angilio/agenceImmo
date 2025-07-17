@php
    $class ??= null;
    $name ??= '';
    $value ??= '';
    $placeholder ??= ucfirst($name);
@endphp
<div @class(["form-group", $class])>
    <select name="type_vente_id" id="select">
        <option value="" disabled selected>Selectionnez un type de publication</option>
        @foreach ($type_vente as $typ => $vente)
            <option {{ $bien->exists && $bien->type_vente_id == $typ ? 'selected' : '' }} value="{{ $typ }}">{{ $vente }}</option>
        @endforeach
    </select>
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror    
</div>