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

// Animation clique chek
document.addEventListener("DOMContentLoaded", function () {
    const boutons = document.querySelectorAll(".reserverVol");

    boutons.forEach(bouton => {
        bouton.addEventListener("click", function () {
            // Vérifier si le bouton a déjà été cliqué
            if (this.dataset.clicked) return;

            this.dataset.clicked = "true"; // Marquer comme cliqué

            const destination = this.dataset.destination;
            const ville = this.dataset.ville;
            const prix = this.dataset.prix;
            const username = this.dataset.username;

            console.log(`Réservation pour ${username} : ${ville}, ${destination} à ${prix}€`);

            // Sauvegarder le texte original au cas où
            this.dataset.originalText = this.innerHTML;

            // Afficher l'animation du texte "Réservé"
            this.innerHTML = "<span class='textAnim'>Réservé</span><span class='checkAnim'>✔</span>";
        });
    });
});


