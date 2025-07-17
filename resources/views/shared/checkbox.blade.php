@php
    $class ??= null;
    $isChecked = old($name, isset($bien) ? $bien->sold : false); // Récupérer la valeur actuelle
@endphp

<div @class(["form-check form-switch", $class])>
    <!-- Input caché pour gérer le cas où le checkbox est décoché -->
    <input type="hidden" value="0" name="{{ $name }}"> 
    
    <!-- Checkbox dynamique -->
    <input 
        type="checkbox" 
        value="1" 
        name="{{ $name }}" 
        id="switch-{{ $bien->id }}" 
        class="form-check-input @error($name) is-invalid @enderror toggle-switch" 
        role="switch"
        data-id="{{ $bien->id }}" 
        @if($isChecked) checked @endif>
    
    <label class="form-check-label" for="switch-{{ $bien->id }}"> {{ $label }} :</label>
    
    @error($name)
        <div class="invalid-feedback">
            {{ $message }}
        </div>
    @enderror
</div>

<!-- jQuery et AJAX -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $(".toggle-switch").on("change", function () {
            let bienId = $(this).data("id");
            let soldValue = $(this).is(":checked") ? 1 : 0; // Vérifie si le switch est activé
            
            $.ajax({
                url: "{{ route('updateSoldStatus') }}", // Route vers la mise à jour
                type: "POST",
                data: {
                    _token: "{{ csrf_token() }}",
                    id: bienId,
                    sold: soldValue
                },
                success: function (response) {
                    console.log(response.message); // Afficher la réponse dans la console
                },
                error: function () {
                    alert("Erreur lors de la mise à jour");
                }
            });
        });
    });
</script>
