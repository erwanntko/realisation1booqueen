// Envoie une requête POST au contrôleur avec le nom d'utilisateur
document.getElementById('purchase-cart').addEventListener('click', function() {
    const username = document.getElementById('purchase-cart').dataset.username;

    fetch('/controleur/panier.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ username: username })
    })
    location.reload();
});