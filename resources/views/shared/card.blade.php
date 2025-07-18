<a id="lien" href="{{ route('property.show', $bien) }}" class="card-link text-decoration-none">
    <div class="card" style="height: 400px; display: flex; flex-direction: column;">
        @php
            // Vérifier si l'attribut 'images' est un tableau JSON valide
            $images = is_string($bien->images) ? json_decode($bien->images, true) : [];

            // Vérifier si des images existent
            if (is_array($images) && count($images) > 0) {
                $firstImage = asset('storage/' . $images[0]); // Première image
            } else {
                $firstImage = $bien->imageUrl(); // Image unique
            }
        @endphp

        <!-- Partie image : 50% hauteur -->
        <div style="flex: 1 1 50%; overflow: hidden;">
            <img id="imgBien" src="{{ $firstImage }}" alt="Image du bien"
                 style="width: 100%; height: 100%; object-fit: cover;">
        </div>

        <!-- Partie infos : 50% hauteur -->
        <div class="card-body" style="flex: 1 1 50%; overflow-y: auto;">
            <h5 class="card-title mt-0">{{ $bien->title }}</h5>
            <p class="card-text my-0">{{ $bien->type_bien->name }} : {{ ($bien->type_vente_id == 1) ? 'À louer' : 'À vendre' }}</p>
            <p class="card-text my-0">{{ $bien->quartier->name }} - {{ $bien->Surface }} m²</p>
            <div class="text-primary fw-bold">
                {{ number_format($bien->price, thousands_separator: ' ') }} Ar
            </div>
            <p>Disponibilité : {{ ($bien->Sold == 1) ? 'Non' : 'Oui' }}</p>
        </div>
    </div>
</a>
