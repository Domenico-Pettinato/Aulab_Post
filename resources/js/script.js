document.addEventListener('DOMContentLoaded', () => {
    console.log('Hello World! Primo script');

    const button = document.querySelector('#publish-button'); // Aggiusta l'ID al tuo pulsante
    if (button) {
        button.addEventListener('mouseenter', () => {
            button.style.transform = 'scale(1.2)';
            button.style.transition = 'transform 0.3s';
        });
        button.addEventListener('mouseleave', () => {
            button.style.transform = 'scale(1)';
        });
    } else {
        console.error("Elemento con ID 'publish-button' non trovato!");
    }

    window.addEventListener('load', () => {
        console.log('Esecuzione animazioni al caricamento');

        const elements = document.querySelectorAll('.fade-in');
        if (elements.length === 0) {
            console.warn('Nessun elemento con classe .fade-in trovato!');
            return;
        }

        elements.forEach((el, index) => {
            setTimeout(() => {
                el.style.opacity = '1';
                el.style.transform = 'translateY(0)';
                el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
            }, index * 200);
        });
    });
    
    // Mostra l'overlay e lo spinner
    console.log('overlay e spinner');
    document.getElementById('overlay-form').addEventListener('submit', function (e) {
        document.getElementById('loading-overlay').classList.remove('d-none');
    });
});


