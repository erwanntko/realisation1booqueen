<!DOCTYPE HTML5>
<html lang="fr">
    <head>
        <link rel="stylesheet" href="../css/panier.css"/>
        <meta charset="UTF-8"/>
        <title>Panier</title>
    </head>
    <body>
        <h1 class="panier">Récapitulatif de votre panier</h1>
        <section class="resume"><button id="purchase-cart" data-username="<?= htmlspecialchars($_SESSION['username']) ?>">Valider le panier</button></section>
        <div class="reservationDetails" id="reservationDetails">
            <p id="destinationElement" class="destination"></p>

            <?php
            $total = 0;
            if (!empty($panier)) {
                foreach ($panier as $item):
                    $total += $item['prix']; ?>

                    <p><?= htmlspecialchars($item['pays']) ?> - <?= htmlspecialchars($item['ville']) ?> <?= number_format($item['prix'], 0) ?>€</p>
                    
                <?php endforeach; ?>
            <?php } else { ?>
                <p>Votre panier est vide.</p>
            <?php } ?>

            <p id="totalPrice"><strong>Total : <?= number_format($total, 2, ',', ' ') ?> €</strong></p>

        </div>
        <script src="../js/panier.js"></script>
    </body>
</html>
