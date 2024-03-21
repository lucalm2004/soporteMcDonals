<div class="container">
@section('content')

    <h1>Mis incidencias</h1>
    <div class="row">
        @foreach($incidencias as $incidencia)
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">{{ $incidencia->ID_subcategoria }}</h5>
                    <p class="card-text">{{ $incidencia->Comentario_Cliente }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>

@endsection
</div>
