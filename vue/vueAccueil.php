<!DOCTYPE HTML5>

<html lang="fr">
    <head>
        <link rel="stylesheet" href="../css/accueil.css"/>
        <meta charset="utf-8"/>
        <title>Accueil</title>
    </head>
    <body>
        <section class='MainContent'>
            <div class='container'> 
                <section class="catalogueDirector"> 
                    <p class="title">Partez dans des destinations à couper le souffle dans tout l'univers</p>
                    <div class="row">
                        <?php $counter = 0;
                        foreach (array_map(null, $catalogueDirectorName, $catalogueDirectorFileNames) as [$name, $image]) { ?>
                            <div class='column'>      
                                <img src="<?= htmlspecialchars($image['fileNameImages'])?>" alt=<?= htmlspecialchars($name['name']) ?> class='pays'>   
                                <p><?= htmlspecialchars($name['name']) ?></p>
                            </div>
                        <?php $counter++;
                        if ($counter >= 7) { ?>
                    </div>
                    <div class='row'>
                        <?php
                        $counter = 0;
                        }
                        } ?>    
                    </div>  
                </section> 
      
                <section class="catalogue">
                    </br>
                    <?php foreach ($catalogueParPays as $pays => $voyages) { ?>
                        <div class=<?= $pays ?>> 
                            <h1 style='text-align: center;'><?= $pays ?></h1>
                            <?php foreach ($voyages as $voyage) { ?>
                                <div class='rubrique'>
                                    <div class=<?= htmlspecialchars($voyage['ville']) ?>>
                                        <p class='titreRubrique'><?= htmlspecialchars($voyage['ville'])  ?> - <?= htmlspecialchars($voyage['accroche'])  ?></p>
                                        <div class="gallery">
                                            <img src="<?= htmlspecialchars($voyage['racineImg1']) ?>" alt="<?= htmlspecialchars($voyage['ville']) ?> de jour"/>
                                            <img src="<?= htmlspecialchars($voyage['racineImg2']) ?>" alt="<?= htmlspecialchars($voyage['ville']) ?> de nuit"/>
                                        </div>
                                        <p class='text_ville_1'><?= htmlspecialchars($voyage['textVille1']) ?></p>
                                        <p class='text_ville_2'><?= htmlspecialchars($voyage['textVille2']) ?></p>
                                        <p class='text_ville_3'><?= htmlspecialchars($voyage['textVille3']) ?></p>
                                        <button class="reserverVol" data-destination=<?= htmlspecialchars($voyage['pays']) ?> data-ville="<?= htmlspecialchars($voyage['ville']) ?>" data-prix=<?= htmlspecialchars($voyage['prix']) ?> data-username=<?= htmlspecialchars($_SESSION['username']) ?>>Réserver un vol</button>
                                        <img id="loadingGif" src="images/Internal/check.gif" alt="Chargement..." style="display: none; width: 100px;">
                                    </div>
                                </div>
                                </br>
                            <?php } ?>
                        </div>
                        <?php } ?>
                </section>
            </div>
        </section>    
        <script src="../js/accueil.js"></script>
    </body>
</html>
