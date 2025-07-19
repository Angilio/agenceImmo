@extends('admin.base')

@section('title', 'Les biens sur une carte')

@section('content')
    <div class="container-fuid">
        <h1 class="">Vue des biens sur la carte de Diego</h1>

        <div class="p-3 mb-4 border rounded bg-light">
            <h5>Code de représentation des biens :</h5>
            <div id="colorCode" class="p-3 pt-0 py-0">
                <p><i class="fa-solid fa-square" style="color: black;"></i> Terrain (carré)</p>
                <p><i class="fa-solid fa-play" style="transform: rotate(-90deg); color: black;"></i> Maison (triangle)</p>
                <p><i class="fa-solid fa-circle" style="color: black;"></i> Chambre (cercle)</p>
            </div>
            <h5>Code couleur :</h5>
            <div id="colorCode" class="p-3 pt-0 py-0">
                <p><span style="color: blue; font-weight: bold;">●</span> Vente</p>
                <p><span style="color: gold; font-weight: bold;">●</span> Location</p>
            </div>
            <p><small>Cliquer sur une icône pour afficher les détails du bien. L’icône sélectionnée devient rouge.</small></p>
        </div>
    </div>

    <div id="map" style="height: 80vh; z-index: 9999;"></div>

    <!-- POPUP CARD -->
    <div id="popupCard"
         class="card shadow position-fixed"
         style="top:12%; left: 2%; width:30%; display:none; z-index:10500;">
        <div id="carouselImages" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner" id="carousel-inner">
                <!-- Images dynamiques -->
            </div>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-between align-items-center">
                <h5 id="popupTitle" class="mb-0"></h5>
                <a id="popupLink" href="#" class="btn btn-sm btn-primary">Voir</a>
            </div>
            <p id="popupDescription" class="mt-2"></p>
            <p id="popupInfos"></p>
            <button class="btn-close position-absolute top-0 end-0 m-2" id="closePopup" aria-label="Fermer"></button>
        </div>
    </div>

    <style>
        .custom-fa-icon {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        #popupCard {
            background: white;
            border: 1px solid #ccc;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        #popupCard * {
            pointer-events: auto;
        }
    </style>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const map = L.map('map').setView([-12.276, 49.291], 14); // Diego
            let selectedMarker = null;

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; OpenStreetMap contributors'
            }).addTo(map);

            fetch("{{ route('biens.api') }}")
                .then(response => {
                    if (!response.ok) throw new Error("Erreur réseau: " + response.status);
                    return response.json();
                })
                .then(data => {
                    console.log("📦 Données fetchées :", data);

                    data.forEach(bien => {
                        if (bien.latitude && bien.longitude) {
                            let iconClass = '';
                            let rotation = '0deg';

                            if (bien.type_bien_id == 1) iconClass = 'fa-solid fa-square';
                            else if (bien.type_bien_id == 2) {
                                iconClass = 'fa-solid fa-play';
                                rotation = '-90deg';
                            } else if (bien.type_bien_id == 3) iconClass = 'fa-solid fa-circle';

                            const color = bien.type_vente_id == 2 ? 'blue' : 'gold';

                            const makeIcon = (color, iconClass, rotation) => L.divIcon({
                                className: 'custom-fa-icon',
                                html: `<div style="color:${color}; font-size:24px; transform: rotate(${rotation});">
                                            <i class="${iconClass}"></i>
                                       </div>`,
                                iconSize: [30, 30],
                                iconAnchor: [15, 15],
                            });

                            const marker = L.marker([bien.latitude, bien.longitude], {
                                icon: makeIcon(color, iconClass, rotation)
                            }).addTo(map);

                            marker.originalColor = color;
                            marker.originalIconClass = iconClass;
                            marker.originalRotation = rotation;

                            marker.on('click', (e) => {
                                showPopup(bien);
                                e.originalEvent.stopPropagation();

                                if (selectedMarker && selectedMarker.setIcon) {
                                    selectedMarker.setIcon(makeIcon(
                                        selectedMarker.originalColor,
                                        selectedMarker.originalIconClass,
                                        selectedMarker.originalRotation
                                    ));
                                }

                                marker.setIcon(makeIcon('red', iconClass, rotation));
                                selectedMarker = marker;
                            });
                        }
                    });
                })
                .catch(error => console.error("🚨 Erreur lors du fetch :", error));

            function showPopup(bien) {
                const popup = document.getElementById('popupCard');
                const carousel = document.getElementById('carousel-inner');
                carousel.innerHTML = '';

                if (Array.isArray(bien.images) && bien.images.length > 0) {
                    bien.images.forEach((img, index) => {
                        carousel.innerHTML += `
                            <div class="carousel-item ${index === 0 ? 'active' : ''}">
                                <img src="/storage/${img.path}" class="d-block w-100" style="height:250px; object-fit:cover;">
                            </div>`;
                    });
                } else {
                    carousel.innerHTML = `
                        <div class="carousel-item active">
                            <div class="d-flex justify-content-center align-items-center" style="height:250px;">
                                <span class="text-muted">Aucune image disponible</span>
                            </div>
                        </div>`;
                }

                document.getElementById('popupTitle').textContent = bien.title || 'Sans titre';
                document.getElementById('popupDescription').textContent = bien.description || '';
                document.getElementById('popupInfos').innerHTML = `Surface: ${bien.surface ?? 'N/A'} m²<br>Prix: ${bien.price ?? 'N/A'} Ar`;
                document.getElementById('popupLink').href = bien.url;

                popup.style.display = 'block';
            }

            function resetSelectedMarker() {
                if (selectedMarker && selectedMarker.setIcon) {
                    selectedMarker.setIcon(L.divIcon({
                        className: 'custom-fa-icon',
                        html: `<div style="color:${selectedMarker.originalColor}; font-size:24px; transform: rotate(${selectedMarker.originalRotation});">
                                    <i class="${selectedMarker.originalIconClass}"></i>
                               </div>`,
                        iconSize: [30, 30],
                        iconAnchor: [15, 15],
                    }));
                    selectedMarker = null;
                }
            }

            // Fermer le popup si on clique à l’extérieur
            document.addEventListener('click', function (e) {
                const popup = document.getElementById('popupCard');
                if (!popup.contains(e.target)) {
                    popup.style.display = 'none';
                    resetSelectedMarker();
                }
            });

            // Bouton "X"
            document.getElementById('closePopup').addEventListener('click', function () {
                document.getElementById('popupCard').style.display = 'none';
                resetSelectedMarker();
            });
        });
    </script>
@endsection
