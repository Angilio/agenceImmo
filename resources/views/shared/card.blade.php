
<a id="lien" href="{{ route('property.show', $bien) }}" class="card-link">
    <div class="card">
        <div class="card-body">
            @php
                // Vérifier si l'attribut 'images' est un tableau JSON valide
                $images = is_string($bien->images) ? json_decode($bien->images, true) : [];

                // Vérifier si des images existent
                if (is_array($images) && count($images) > 0) {
                    $firstImage = asset('storage/' . $images[0]); // Afficher la première image du tableau
                } else {
                    $firstImage = $bien->imageUrl(); // Afficher l’image unique enregistrée
                }
            @endphp
            <div id="bien">
                <img id="imgBien" src="{{ $firstImage }}" alt="Image du bien">
            </div>
            <div>
                <h5 class="card-title mt-3">{{ $bien->title }}</h5>
                <p class="card-text my-0">{{ $bien->type_bien->name }} : {{ ($bien->type_vente_id == 1) ? 'À louer' : 'À vendre'}}</p>
                <p class="card-text my-0">{{ $bien->quartier->name }} - {{ $bien->Surface }} m2 </p>
                <div class="text-primary fw-bold">
                    {{ number_format($bien->price, thousands_separator: ' ')}} Ar
                </div>
                <p>Disponibilité: {{ ($bien->Sold == 1) ? 'Non' : 'Oui'}} </p>
            </div>
        </div>
    </div>
</a>