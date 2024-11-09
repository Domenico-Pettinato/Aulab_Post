<table class="table table-striped">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">Nome</th>
        <th scope="col">Email</th>
        <th scope="col">Azioni</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($roleRequests as $request)
      <tr>
        <th scope="row">{{ $request->id }}</th>
        <td>{{ $request->name }}</td>
        <td>{{ $request->email }}</td>
        <td>
          @switch($role)
          @case('redattore')
          <form action="{{ route('admin.acceptWriter', $request) }}" method="POST">
            @csrf
            @method ('PATCH')
            <button type="submit" class="btn btn-primary">Accetta {{$role}}</button>
          </form>
          @break
          @case('revisore')
          <form action="{{ route('admin.acceptRevisor', $request) }}" method="POST">
            @csrf
            @method ('PATCH')
            <button type="submit" class="btn btn-primary">Accetta {{$role}}</button>
          </form>
          @break
          @case('amministratore')
          <form action="{{ route('admin.acceptAdmin', $request) }}" method="POST">
            @csrf
            @method ('PATCH')
            <button type="submit" class="btn btn-primary">Accetta {{$role}}</button>
          </form>
          @break
          @endswitch
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>
</table>