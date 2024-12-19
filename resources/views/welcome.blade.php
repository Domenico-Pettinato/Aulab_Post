<x-layout>

    <!-- Messaggio di errore -->
    @if (session('alert'))
    <div class="alert alert-danger text-center mx-auto my-3" style="max-width: 500px;">
        {{ session('alert') }}
    </div>
    @endif

    <!-- Messaggio di conferma -->
    @if (session('message'))
    <div class="d-flex justify-content-center mt-3">
        <div class="alert alert-success alert-dismissible fade show text-center mx-auto" style="max-width: 500px;" role="alert">
            {{ session('message') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    @endif

    <main class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10 col-md-12">
                <!-- Titolo -->
                <h1 class="display-4 text-center text-success fw-bold mb-4">Benvenuti su Impastando.it</h1>

                <!-- Testo di benvenuto -->
                <p class="lead text-center text-muted">
                    ✨ **Benvenuti nel cuore della panificazione!** ✨ <br>
                    Cari appassionati di lievito, farine e creatività culinaria, sono entusiasta di darvi il benvenuto in questo spazio unico: **il blog che nasce dalla passione di tutti voi!** ❤️
                </p>

                <p class="text-center">
                    <em>
                        Immaginate un luogo dove ogni ricetta racconta una storia, dove ogni impasto è una piccola magia condivisa da chi, come voi, ama il profumo del pane appena sfornato. 
                        Questo blog non è solo una raccolta di ricette: è una **comunità di panificatori**, un punto di incontro per chi vive la panificazione come una forma d’arte e una gioia da condividere.
                    </em>
                </p>

                <!-- Immagine decorativa -->
                <div class="text-center my-4">
                    <img src="/storage/articles_images/sfondo.jpg" alt="Panificazione" class="img-fluid rounded shadow-lg">
                </div>
            </div>
        </div>

        <!-- Carosello delle ricette -->
        <section class="mt-5">
            <x-carousel :articles="$articles" />
        </section>

        <!-- Ultimi articoli caricati -->
        <section class="mt-5">
            <x-last-articles :articles="$articles" />
        </section>

    </main>

</x-layout>
