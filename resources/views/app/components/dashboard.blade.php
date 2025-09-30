<div class="row pt-4 mt-5">
    <div class="col-12 col-md-12 col-lg-12">
        <h1 class="mb-4">Dashboard</h1>
        <form action="{{ route('dashboard') }}" method="GET" class="mb-4">
            <div class="input-group">
                <input type="datetime-local" name="search_date" class="form-control" value="#">
                <button type="submit" class="btn btn-outline-primary"><i class="fa-solid fa-magnifying-glass"></i> Filtrar</button>
            </div>
        </form>
        <div class="row">
            @forelse($reminders as $reminder)
                <div class="col-4 col-md-4 col-lg-4 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ route('reminders.show', $reminder->id) }}">
                                    {{ $reminder->title }}
                                </a>
                            </h5>
                            <p class="card-text">{{ $reminder->description }}</p>
                            <p class="card-text">
                                <small class="text-muted">
                                    {{ $reminder->remind_at->format('d/m/Y H:i') }}
                                </small>
                            </p>
                            <p>
                                @if ($reminder->done)
                                    <span class="badge bg-success">Concluído</span>
                                @else
                                    <span class="badge bg-warning">Pendente</span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 col-md-12 col-lg-12">
                    <div class="alert alert-info">
                        Nenhum lembrete encontrado para a data selecionada.
                    </div>
                </div>
           @endforelse
        </div>
    </div>
</div>
