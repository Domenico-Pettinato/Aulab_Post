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
    

    console.log('Hello World! Terzo script');

    window.addEventListener('scroll', function() {
        console.log ('Scrolled attivato', window.scrollY);
        if (window.scrollY > 50) {
            const message = document.createElement('div');
            message.textContent = 'Hai una ricetta speciale? Condividila con la nostra community!';
            message.style.position = 'fixed';
            message.style.bottom = '20px';
            message.style.right = '20px';
            message.style.padding = '10px 20px';
            message.style.backgroundColor = '#4285f4';
            message.style.color = '#fff';
            message.style.borderRadius = '10px';
            message.style.boxShadow = '0 4px 6px rgba(0, 0, 0, 0.1)';
            message.style.zIndex = '1000';
            message.style.cursor = 'pointer';
            message.addEventListener('click', () => {
                window.location.href = '/articles/create';
            });
            document.body.appendChild(message);

            // Rimuovi il messaggio dopo 10 secondi
            setTimeout(() => {
                message.remove();
            }, 10000);
        }
    }, { once: true });
});


