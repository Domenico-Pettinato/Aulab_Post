<x-layout>

    <!-- Messaggio di errore -->
    @if (session('alert'))
    <div class="alert alert-danger text-center w-auto mx-auto my-3" style="max-width: 500px;">
        {{ session('alert') }}
    </div>
    @endif

    <!-- Messaggio di conferma -->
    @if (session('message'))
    <div class="d-flex justify-content-center mt-3">
        <div class="alert alert-success alert-dismissible fade show w-auto text-center" style="max-width: 500px;" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    @endif

    <main class="container py-5">
        <div class="row  justify-content-center">
            <div class="col-md-12">
                <h1 class="display-4 text-center">Benvenuti su Impastando.it</h1>
                <p class="lead text-center">Scopri l'arte della panificazione artigianale: ricette, tecniche, storie di appassionati e molto altro.</p>
                <img src="/storage/articles_images/sfondo.jpg" alt="Logo" class="sfondo w-100">
            </div>

        </div>

        <!-- carosello delle ricette -->

        <section id="featured" class="mt-5">
            <h2 class="h1 mb-4 text-center">Articoli in Evidenza</h2>
            <div id="carouselFeatured" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach($articles as $index => $article)
                    <div class="carousel-item @if($index === 0) active @endif">
                        <div class="card">
                        
                        <img src="{{ asset('storage/' . $article->image) }}" class="img-fluid rounded-start card-img-top" alt="{{ $article->title }}">
                       
                            <div class="card-body mt-3">
                                <h5 class="card-title text-center">{{ $article->title }}</h5>
                                <a href="{{ route('articles.show', $article->slug) }}" class="btn btn-dark  ">Leggi di più</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselFeatured" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselFeatured" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>

        <section class="mt-5">
            <h2 class="h1 text-center mb-4">Ultime Ricette Pubblicate</h2>
            <div class="row">
                @foreach($articles as $article)
                <div class="col-md-6 mb-4">
                    <div class="card flex-row">
                        <img src="{{ asset('storage/' . $article->image) }}" class="img-fluid rounded-start card-img-top" alt="{{ $article->title }}">
                        <div class="card-body">
                            <h5 class="card-title p-2 ">{{ $article->title }}</h5>
                            <p class="card-text p-2"><strong>Autore:</strong> {{ $article->user->name }}</p>
                            <p class="card-text p-2">{{ Str::limit($article->description, 100) }}</p>
                            <p class="card-subtitle mb-2 text-muted small p-2">Tempo di lettura: {{ $article->readDuration() }} minuti</p>
                            <a href="{{ route('articles.show', $article->slug) }}" class="btn btn-dark">Scopri la Ricetta</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </section>
    </main>

</x-layout>