<h2 class="display-4 text-center my-5 text-uppercase text-dark fw-bold border-bottom pb-3">Articoli in Evidenza</h2>
<div id="carouselFeatured" class="carousel slide shadow-lg rounded overflow-hidden" data-bs-ride="carousel">
    <!-- Indicators -->
    <div class="carousel-indicators">
        @foreach ($articles as $index => $article)
        <button type="button" data-bs-target="#carouselFeatured" data-bs-slide-to="{{ $index }}" class="@if($index === 0) active @endif" aria-current="@if($index === 0) true @endif" aria-label="Slide {{ $index + 1 }}"></button>
        @endforeach
    </div>

    <!-- Carousel Items -->
    <div class="carousel-inner">
        @foreach ($articles as $index => $article)
        <div class="carousel-item @if($index === 0) active @endif">
            <div class="card border-0">
                <img src="{{ asset('storage/' . $article->image) }}" class="img-fluid rounded card-img-top" alt="{{ $article->title }}" style="height: 400px; object-fit: cover;">

                <div class="card-body  p-4 text-center">
                    <h5 class="card-title fw-bold text-dark">{{ $article->title }}</h5>
                    <p class="text-muted small">{{ \Illuminate\Support\Str::limit($article->description, 100, '...') }}</p>
                    <a href="{{ route('articles.show', $article->slug) }}" class="btn btn-success px-4 py-2 mt-2">Leggi di più</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <!-- Controls -->
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselFeatured" data-bs-slide="prev">
        <span class="carousel-control-prev-icon bg-dark rounded-circle p-2" aria-hidden="true"></span>
        <span class="visually-hidden">Precedente</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselFeatured" data-bs-slide="next">
        <span class="carousel-control-next-icon bg-dark rounded-circle p-2" aria-hidden="true"></span>
        <span class="visually-hidden">Successivo</span>
    </button>
</div>
