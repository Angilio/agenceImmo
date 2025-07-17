@extends('admin.base')

@section('title', 'Les biens sur une carte')

@section('content')
    <div id="map" style="height: 100vh;"></div>

    <!-- POPUP CARD -->
    <div id="popupCard"
         class="card shadow position-fixed"
         style="top:12%; left: 2%; width:30%; display:none; z-index:1050;">
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
        </div>
    </div>

    <style>
        .custom-fa-icon {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        /* Permet de garder le popup par dessus tout */
        #popupCard {
            background: white;
            border: 1px solid #ccc;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        /* Empêche le clic dans la carte de propager le clic "extérieur" */
        #popupCard * {
            pointer-events: auto;
        }
    </style>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const map = L.map('map').setView([-12.276, 49.291], 14); // Diego

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
                            }
                            else if (bien.type_bien_id == 3) iconClass = 'fa-solid fa-circle';

                            const color = bien.type_vente_id == 2 ? 'blue' : 'gold';

                            const icon = L.divIcon({
                                className: 'custom-fa-icon',
                                html: `<div style="color:${color}; font-size:24px; transform: rotate(${rotation});">
                                            <i class="${iconClass}"></i>
                                       </div>`,
                                iconSize: [30, 30],
                                iconAnchor: [15, 15],
                            });

                            const marker = L.marker([bien.latitude, bien.longitude], { icon }).addTo(map);

                            marker.on('click', (e) => {
                                showPopup(bien);
                                e.originalEvent.stopPropagation(); // 🔒 Pour éviter de déclencher la fermeture
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

            // Fermer le popup si on clique à l'extérieur
            document.addEventListener('click', function (e) {
                const popup = document.getElementById('popupCard');
                if (!popup.contains(e.target)) {
                    popup.style.display = 'none';
                }
            });
        });
    </script>
@endsection
