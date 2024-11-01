<x-layout>
    <div class="container mt-5 d-flex justify-content-center">
        <h1>Crea Articolo</h1>
        <form method="POST" action="{{route('articles.store')}}" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control" id="title" name="title">
                @error ('title')
                <spam class="text-danger">{{$message}}</spam>">
                @enderror
            </div>

            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select name="category" id="category" class="form-select">
                    @foreach ($categories as $category)
                    <option value="{{$category->id}}">{{$category->name}}</option>
                    @endforeach
                </select>
                @error ('slug')
                <spam class="text-danger">{{$message}}</spam>">
                @enderror
            </div>

            <!-- <div class="mb-3">  
            <label for="subtitle" class="form-label">Subtitle</label>
            <input type="text" class="form-control" id="subtitle" name="subtitle">
        @error ('subtitle')
        <spam class="text-danger">{{$message}}</spam>">
        @enderror
        </div> -->

            <div class="mb-3">
                <label for="body" class="form-label">Body</label>
                <input type="text" class="form-control" id="body" name="body">
                @error ('body')
                <spam class="text-danger">{{$message}}</spam>">
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" id="image" name="image">
                @error ('image')
                <spam class="text-danger">{{$message}}</spam>">
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</x-layout>