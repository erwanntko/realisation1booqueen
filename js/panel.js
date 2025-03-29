// Affichage de la modal
$(document).ready(function() {
    function loadContent(url, divId) {
        $(divId).load(url, function(response, status, xhr) {
            if (status == "error") {
                $(divId).html("<p>Le contenu n'a pas pu être chargé.</p>").show();
            } else {
                // Ajouter dynamiquement le bouton de fermeture après avoir chargé le contenu
                $(divId).prepend('<button class="closeButton">X</button>');
                $(divId).show();
                // Ajouter la classe pour flouter l'arrière-plan
                $('.Main_Panel').addClass('blur-background');

                // Exécuter les scripts inclus dans le contenu chargé
                $(divId).find('script').each(function() {
                    eval($(this).text());
                });
            }
        });
    }

    // Gérer le clic sur le bouton d'ajout d'utilisateur
    $('#buttonAjouterUtilisateur').on('click', function() {
        var newUrl = 'ajouterUtilisateur.php';
        loadContent(newUrl, '#divAjouterUtilisateur');
        history.replaceState(null, '', 'panel.php?ajouterUtilisateur');
    });

    // Gérer le clic sur le bouton de modification d'utilisateur
    $('.buttonModifierUtilisateur').on('click', function() {
        var userId = $(this).data('userid');
        var newUrl = 'modifierUtilisateur.php?id=' + userId;
        loadContent(newUrl, '#divModifierUtilisateur');
        history.replaceState(null, '', 'panel.php?modifierUtilisateur');
    });

    // Gérer le clic sur le bouton de fermeture de la modal
    $('body').on('click', '.closeButton', function() {
        $('#divAjouterUtilisateur, #divModifierUtilisateur').hide();
        $('.Main_Panel').removeClass('blur-background');
        history.replaceState(null, '', 'panel.php');
    });
});