<h2>Nouvelle demande d'information sur le bien : {{ $property->title }}</h2>

<p><strong>Un(e) :</strong> {{ $property->type_bien->name }} ({{ $property->type_vente_id == 1 ? 'À louer' : 'À vendre' }})</p>
<p><strong>Prix :</strong> {{ number_format($property->price, 0, ',', ' ') }} Ar</p>
<p><strong>Quartier :</strong> {{ $property->quartier->name }}</p>
<p><strong>Surface :</strong> {{ $property->Surface }} m²</p>

<hr>

<h3>Informations de l'utilisateur :</h3>
<p><strong>Nom :</strong> {{ $name }} {{ $firstName }}</p>
<p><strong>Contact :</strong> {{ $contact ?? 'Non fourni' }}</p>
<p><strong>Email :</strong> {{ $email }}</p>

<h4>Message :</h4>
<p>{!! nl2br(e($bodyMessage)) !!}</p>
