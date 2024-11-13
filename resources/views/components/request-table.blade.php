<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Nome</th>
      <th scope="col">Email</th>
      <th scope="col">Azioni</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($roleRequests as $user)
    <tr>
      <th scope="row">{{ $user->id }}</th>
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
      <td>
        @switch($role)
          @case('redattore')
          <form action="{{ route('admin.setWriter', $user) }}" method="POST">
            @csrf
            @method('PATCH')
            <button type="submit" class="btn btn-primary">Accetta {{$role}}</button>
            <button type="submit" class="btn btn-primary">Rifiuta {{$role}}</button>
          </form>
          @break
          
          @case('revisore')
          <form action="{{ route('admin.setRevisor', $user) }}" method="POST">
            @csrf
            @method('PATCH')
            <button type="submit" class="btn btn-primary">Accetta {{$role}}</button>
            <button type="submit" class="btn btn-primary">Rifiuta {{$role}}</button>
          </form>
          @break
          
          @case('amministratore')
          <form action="{{ route('admin.setAdmin', $user) }}" method="POST">
            @csrf
            @method('PATCH')
            <button type="submit" class="btn btn-primary">Accetta {{$role}}</button>
            <button type="submit" class="btn btn-primary">Rifiuta {{$role}}</button>
          </form>
          @break
        @endswitch
      </td>
    </tr>
    @endforeach
  </tbody>
</table>
