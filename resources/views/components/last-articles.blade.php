<h2 class="display-4 text-center my-5 text-uppercase text-dark fw-bold border-bottom pb-3">Ultime Ricette Pubblicate</h2>
<div class="row g-4">
    @foreach ($articles as $article)
    <div class="col-lg-4 col-md-6">
        <div class="card h-100 shadow-sm border-0">
            <!-- Immagine -->
            <div class="position-relative">
                <img src="{{ asset('storage/' . $article->image) }}" class="card-img-top" alt="{{ $article->title }}" style="height: 250px; object-fit: cover;">
                <span class="badge bg-success position-absolute top-0 start-0 m-2 px-3 py-2 text-uppercase">Nuovo</span>
            </div>

            <!-- Corpo della card -->
            <div class="container mt-5">
                <div class="row g-4">
                    <h1 class="card-title text-dark fw-bold mb-3">{{ $article->title }}</h1>
                    <!-- <h5 class="card-title text-dark fw-bold">{{ $article->title }}</h5> -->
                    <p class="card-text text-muted small mb-2">
                        <strong>Autore:</strong> {{ $article->user->name }}
                    </p>
                    <p class="card-text">{{ Str::limit($article->description, 100, '...') }}</p>
                </div>
                <div>
                    <p class="card-subtitle mb-3 text-muted small">
                        <i class="bi bi-clock"></i> Tempo di lettura: {{ $article->readDuration() }} minuti
                    </p>
                    <a href="{{ route('articles.show', $article->slug) }}" class="btn btn-success w-100">
                        Scopri la Ricetta
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endforeach
</div>