<x-layout>
    <div class="container mt-5 d-flex justify-content-center">
        <div class="col-6">
            <h2 class="display-1 text-center">Crea Articolo</h2>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('articles.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}">
                </div>

                <div class="mb-3">
                    <label for="category" class="form-label">Category</label>
                    <select name="category" id="category" class="form-select">
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" 
                                    {{ old('category') == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="body" class="form-label">Body</label>
                    <input type="text" class="form-control" id="body" name="body" value="{{ old('body') }}">
                </div>

                <div class="mb-3">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" class="form-control" id="image" name="image">
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
</x-layout>
