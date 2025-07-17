@extends('admin.admin')
@section('title', 'Les biens')
@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    <div class="d-flex justify-content-between align-items-center">
        <h1 class="h2">Les biens</h1>
        <a href="{{ route('admin.bien.create') }}" class="btn btn-primary">Ajouter un bien</a>
    </div>
   <div class="table-responsive">
        <table class="table table-bordered mt-3">
            <thead>
                <th>Titre</th>
                <th>Surface</th>
                <th>Prix</th>
                <th>Quartier</th>
                <th>Type</th>
                <th>V ou L</th>
                <th class="text-end">Actions</th>
            </thead>
            <tbody>
                @foreach($biens as $bien)
                    <tr>
                        <td>{{ $bien->title }}</td>
                        <td>{{ $bien->Surface }} m2</td>
                        <td>{{ number_format($bien->price, thousands_separator: ' ') }} Ar</td>
                        <td> {{ $bien->quartier?->name }} </td>
                        <td> {{ $bien->type_bien?->name }} </td>
                        <td> {{ $bien->type_vente?->name }} </td>
                        <td>
                            <div class="d-flex gap-2 justify-content-end">
                                <a href="{{ route('admin.bien.edit', $bien) }}" class="btn btn-primary"><i class="fa-regular fa-pen-to-square"></i></a>
                                <form action="{{ route('admin.bien.destroy', $bien) }}" method="post" class="delete-form" data-title="{{ $bien->title }}">
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="btn btn-danger btn-delete">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                            </div>
                             
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
   </div>
    {{ $biens->links() }}   

    <!-- Modal de confirmation -->
<div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteConfirmModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title" id="deleteConfirmModalLabel">Confirmation de suppression</h5>
          <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Fermer"></button>
        </div>
        <div class="modal-body">
          <p>Êtes-vous sûr de vouloir supprimer le bien <strong id="bienTitle"></strong> ?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
          <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Supprimer</button>
        </div>
      </div>
    </div>
  </div>

  <script>
    let formToSubmit;

    document.querySelectorAll('.btn-delete').forEach(button => {
        button.addEventListener('click', function () {
            const form = this.closest('.delete-form');
            const title = form.getAttribute('data-title');

            document.getElementById('bienTitle').textContent = title;
            formToSubmit = form;
            const modal = new bootstrap.Modal(document.getElementById('deleteConfirmModal'));
            modal.show();
        });
    });

    document.getElementById('confirmDeleteBtn').addEventListener('click', function () {
        if (formToSubmit) {
            formToSubmit.submit();
        }
    });
</script>
  
@endsection