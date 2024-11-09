 <x-layout>
     <!-- validazione del login -->
     @if ($errors->any())
     <div class=" alert alert-danger">
         @foreach ($errors->all() as $error)
         {{ $error }}
         @endforeach
     </div>
     @endif
     <h1>Pagina candidature</h1>
     <div class="container mt-5">
         <div class="row">
             <div class="col-md-6 col-12 mb-4 d-flex justify-content-center">
                 <div class="card" style="width: 18rem; border: 1px solid #ccc">
                     <form method="POST" action="">
                         @csrf
                         <input class="form-control" type="text" placeholder="scegli il ruolo" old()>
                         <input class="form-control" type="text" placeholder="inserisce la tua mail" old()>
                         <input class="form-control" type="text" placeholder="inserisci un messaggio di presentazione" old()>
                         <button class="btn btn-primary" type="submit">Invia</button>
                     </form>
                     <div class="card-footer text-center">
                         <a href="{{route('homepage')}}" class="btn btn-primary">Indietro</a>
                     </div>
                 </div>
             </div>
         </div>
     </div>
 </x-layout>