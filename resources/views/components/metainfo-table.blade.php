<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nome tag</th>
            <th scope="col">Numero di articoli collegati</th>
            <th scope="col">Aggiorna</th>
            <th scope="col">Cancella</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($metaInfos as $metaInfo)
        <tr>
            <th scope="row">{{ $metaInfo->id }}</th>
            <td>{{ $metaInfo->name }}</td>
            <td>{{ count($metaInfo->articles) }}</td>
            @if ($metaType == 'tags')
            <td>
                <form action="{{ route('admin.editTag', ['tag' => $metaInfo->id]) }}" method="POST">
                    @csrf
                    @method('put')
                    <input type="text" value="{{ $metaInfo->name }}" name="name" placeholder="Nuovo nome tag" class="form-control w-50 d-inline">
                    <button type="submit" class="btn btn-secondary bi bi-arrow-clockwise"></button>
                </form>
            </td>
            <td>
                <form action="{{ route('admin.deleteTag', ['tag' => $metaInfo->id]) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger bi bi-trash3 "></button>
                </form>
            </td>
            @else            
            <td>
                <form action="{{ route('admin.editCategory', ['category' => $metaInfo->id]) }}" method="POST">
                    @csrf
                    @method('put')
                    <input type="text" value="{{ $metaInfo->name }}" name="name" placeholder="Nuovo nome categoria" class="form-control w-50 d-inline">
                    <button type="submit" class="btn btn-secondary bi bi-arrow-clockwise"></button>
                </form>
            </td>
            <td>
                <form action="{{ route('admin.deleteCategory', ['category' => $metaInfo->id]) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger bi bi-trash3"></button>
                </form>
            </td>
            @endif
        </tr>
        @endforeach
    </tbody>
</table>
