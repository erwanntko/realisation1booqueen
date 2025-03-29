// Transfert des données du boutton vers le controleur
document.querySelectorAll('.reserverVol').forEach(button => {
    button.addEventListener('click', () => {

        // Récupère les données du bouton
        const destination = button.dataset.destination;
        const ville = button.dataset.ville;
        const prix = button.dataset.prix;
        const username = button.dataset.username;

        // Crée un objet FormData pour envoyer les données
        const formData = new FormData();
        formData.append('destination', destination);
        formData.append('ville', ville);
        formData.append('prix', prix);
        formData.append('username', username);

        // Envoie la requête POST via Fetch API
        fetch('controleur/accueil.php', {
            method: 'POST',
            body: formData
        })
    });
});

// Slider
document.querySelectorAll('.pays').forEach(image => {
image.addEventListener('click', () => {
    const targetClass = image.alt;
    const targetElement = document.querySelector('.' + targetClass);
    if (targetElement) {
        targetElement.scrollIntoView({
            behavior: 'smooth'
        });
    }
});
});

// Vérification connexion + check notification
document.querySelectorAll('.reserverVol').forEach(button => {
    button.addEventListener('click', function() {
        if (button.getAttribute('data-username') === '') {
            window.location.href = '/controleur/monCompte.php';
        } else {
            this.innerHTML = "<span class='textAnim'>Réservé</span><span class='checkAnim'>✔</span>";
        }
    });
});
