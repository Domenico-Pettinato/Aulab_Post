<x-layout>
<!-- validazione della registrazione -->
<div class="col-12 mt-5 d-flex justify-content-center ">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{route('register')}}" method="POST" class="form">
            @csrf
            <div class="container">
                <h1 class="h3 mb-3 fw-normal text-black"></h1>
                <p class="mt-2 mb-4 text-black"></p>

                <div class="form-floating mb-3 ">
                    <input type="text" name="name" class="form-control" id="Name" placeholder="Enter Full Name" required>
                    <label for="Name">Full Name</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="text" placeholder="Enter Email" name="email" class="form-control" id="email" required>
                   <label for="email">Email</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="password" placeholder="Enter Password" name="password" class="form-control" id="password" required>
                    <label for="password">Password</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="password" placeholder="Repeat Password" name="password_confirmation" class="form-control" id="password_confirmation" required>
                    <label for="password_confirmation">Repeat Password</label>
                </div>

                <div class="form-floating mb-3">
                    <p class="mt-3 mb-3 text-white">By creating an account you agree to our <a href="#" class="text-white">Terms & Privacy</a></p>
                    <button type="submit" class="btn btn-primary w-100 py-2">Register</button>
                    <p class="mt-3 mb-3 text-black"></p>
                </div>
            </div>
        </form>
    </div>
</x-layout>

