<x-layout>
    <div class="container mt-5 d-flex justify-content-center">
        <div class="col-12 col-md-8 col-lg-6">
            <h2 class="display-4 text-center mb-4">Modifica Articolo</h2>

            @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('articles.update', $article)}}" method="POST" class="card p-4 shadow" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="title" class="form-label">Titolo</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ $article->title }}" required>
                    @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="category" class="form-label">Categoria</label>
                    <select name="category" id="category" class="form-select @error('category') is-invalid @enderror" required>
                        <option selected disabled>Seleziona una categoria</option>
                        @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if($article->category_id == $category->id) selected @endif>{{ $category->name }}</option>
                        @endforeach
                    </select>
                    @error('category')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="body" class="form-label">Corpo del Testo</label>
                    <textarea class="form-control @error('body') is-invalid @enderror" id="body" name="body" rows="4">{{ $article->body }} required </textarea>
                    @error('body')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="tags" class="form-label">Tags</label>
                    <input type="text" class="form-control @error('tags') is-invalid @enderror" id="tags" name="tags" value="{{ $article->tags->implode('name', ', ') }}" required>
                    <span class="form-text">Dividi ogni tag con una virgola</span>
                    @error('tags')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label>Immagine Attuale</label>
                    <img src="{{Storage::url($article->image)}}" class="card-img-top" alt="{{ $article->title }}" style="height: 250px; object-fit: cover;">
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Nuova Immagine</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                    @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-grid">
                    <button type="submit" class="btn btn-outline-secondary btn-sm">Modifica Articolo</button>
                    <a href="{{ route('articles.index') }}" class="btn btn-outline-primary btn-sm">Torna alla lista degli articoli</a>
                </div>

            </form>
        </div>
    </div>
</x-layout>