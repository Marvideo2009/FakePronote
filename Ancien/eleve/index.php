<?php
require("header.php")
?>
                <div id="id_6" class="objetBandeauEntete_thirdmenu wai_hidden" style="" role="navigation">
                    <h1 id="breadcrumbBandeau" class="titre-onglet" tabindex="0" aria-label="Page d'accueil">Page d'accueil</h1>
                </div>
                <div role="main" id="GInterface.Instances[2]" class="interface_affV_client no-tactile">
                    <div tabindex="-1" id="GInterface.Instances[2]_defaut_" class="AffichagePageAccueil dotty eleve">
                        <div class="widgets-global-container">
                            <div data-name="cols-widgets-conteneur" id="GInterface.Instances[2]_colonne_3"
                                class="emploidutemps wrapper-cols ">
                                <article role="region" tabindex="-1" aria-describedby="id_64_TitreText" id="id_64id_29"
                                    class="widget ThemeCat-edt edt" style="height:100%;">
                                    <header title="Emploi du temps">
                                        <h3 tabindex="0" class="wai_hidden" id="id_64_TitreText">Emploi du temps</h3>
                                        <div class="cta-conteneur"><i id="id_64id_32" role="button" title="Tout voir"
                                                class="as-button bt-widget icon icon_affichage_widget"
                                                onclick="GInterface.Instances[2]._surToutVoir(12)" tabindex="0"
                                                aria-label="Tout voir"></i></div>
                                    </header>
                                    <div class="filtre-conteneur">
                                        <div id="IE.Identite.collection.g7">
                                            <div class="ObjetCelluleDate input-wrapper">
                                                <i role="button" tabindex="0" title="Précédent"
                                                    aria-label="Précédent"
                                                    class="icon_angle_left fix-bloc icon btnImageIcon btnImage" onclick="edtprev()"></i>
                                                <div id="IE.Identite.collection.g7.cellule" class="fluid-bloc">
                                                    <!--ie-if-->
                                                    <div class="input-wrapper">
                                                        <div class="ocb_cont as-input as-date-picker ie-ripple">
                                                            <div class="ocb-libelle ie-ellipsis" tabindex="0"
                                                                id="IE.Identite.collection.g7.cellule_Edit" role="button"
                                                                aria-haspopup="dialog" style="width: 100px;"><input type="date" id="date" value="<?= date('Y-m-d') ?>">
                                                            </div>
                                                            <!--<div class="ocb_bouton"></div>-->
                                                        </div>
                                                    </div>
                                                </div><i role="button" tabindex="0" title="Suivant" aria-label="Suivant"
                                                    class="icon_angle_right fix-bloc icon btnImageIcon btnImage" style="flex: none;"
                                                    onclick="edtnext()"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content-container overflow-auto" id="id_64id_30" role="presentation" tabindex="0">
                                        <div id="id_64">
                                            <h3 class="text-center ie-titre-couleur-lowercase m-top m-bottom" tabindex="0">Semaine SA
                                            </h3>
                                            <?php
                                                $claass = str_split($class);
                                                for($t = 0; $t < 5; ++$t) {
                                                    $day = $edt->{'day'}->{$t};
                                                    $date = date('d');
                                                    if(strpos($date, "0") !== false) {
                                                        $date = str_split($date);
                                                        $date = $date[1];
                                                    }
                                                    ?>
                                                    <ul class="liste-cours m-top-l <?php if($t != "0") { ?>displaynone<?php } ?>" role="list" id="<?php if($t != "0") { ?><?= $date+$t ?><?php } else { ?><?= $date ?><?php } ?>">
                                                        <?php
                                                                    $i2 = 112;
                                                                    for($i = 1; $i < $edt->{'nbboucle'}->{$day}; ++$i) {
                                                                        $M1 = $edt->{$claass[0]}->{$claass[1]}->{$day}->{$i};
                                                                        $heure = $edt->{'horaire'}->{$i};
                                                                        $heure = explode("/", $heure);
                                                                        $ert = $bdd->query("SELECT * FROM subjects WHERE title='$M1'");
                                                                        $ert = $ert->fetch();
                                                                        if($heure[0] == "12h05" && $heure[1] == "13h35") { ?>
                                                                            <span id="id_116" class="wai_hidden" tab-index="0">de <?= $heure[0] ?> à
                                                                                <?= $heure[1] ?> Pas de cours</span>
                                                                            <li class="flex-contain Gris" tabindex="0" aria-describedby="id_116">
                                                                                <div class="container-heures" aria-hidden="true">
                                                                                    <div><?= $heure[0] ?></div>
                                                                                </div>
                                                                                <div class="trait-matiere"></div>
                                                                                <ul class="container-cours pas-de-cours demi-pension">
                                                                                    <li class="libelle-cours flex-contain" aria-hidden="true"></li>
                                                                                </ul>
                                                                            </li>
                                                                            <?php
                                                                        } elseif($M1 = $edt->{$claass[0]}->{$claass[1]}->{$day}->{$i} == "") { ?>
                                                                            <li class="flex-contain Gris" tabindex="0" aria-describedby="id_139">
                                                                                <div class="container-heures" aria-hidden="true">
                                                                                    <div><?= $heure[0] ?></div>
                                                                                    <?php if($heure[1] != "12h05" and $heure[1] != "14h33") { ?>
                                                                                    <div><?= $heure[1] ?></div>
                                                                                    <?php
                                                                                        }
                                                                                    ?>
                                                                                </div>
                                                                                <div class="trait-matiere"></div>
                                                                                <ul class="container-cours pas-de-cours">
                                                                                    <li class="libelle-cours flex-contain" aria-hidden="true">Pas de cours</li>
                                                                                </ul>
                                                                            </li>
                                                                        <?php
                                                                        } else {
                                                                        ?>
                                                                            <span id="id_<?= $i2 ?>" class="wai_hidden" tab-index="0">de <?= $heure[0] ?> à
                                                                                <?= $heure[1] ?> <?= $ert["title"] ?></span>
                                                                            <li class="flex-contain " tabindex="0" aria-describedby="id_<?= $i2 ?>">
                                                                                <div class="container-heures" aria-hidden="true">
                                                                                    <div><?= $heure[0] ?></div>
                                                                                    <?php
                                                                                        if($heure[1] != "12h05" and $heure[1] != "14h33") { ?>
                                                                                    <div><?= $heure[1] ?></div>
                                                                                        <?php
                                                                                        }
                                                                                        ?>
                                                                </div>
                                                                <div class="trait-matiere" style="background-color :<?= $ert["color"] ?>;"></div>
                                                                <ul class="container-cours ">
                                                                    <li class="libelle-cours flex-contain" aria-hidden="true"><?= $ert["title"] ?>
                                                                    </li>
                                                                    <li><?= $ert["teacher"] ?></li>
                                                                    <?php
                                                                        if($ert["title"] == "ESPAGNOL LV2") {
                                                                            $sub = explode(" ", $ert["title"]);
                                                                    ?>
                                                                    <li>[<?= $sub["0"] ?> <?= $class ?>]</li>
                                                                    <?php
                                                                                        }
                                                                                        ?>
                                                                    <li><?= $ert["salle"] ?></li>
                                                                </ul>
                                                            </li>
                                                            <?php
                                                                            }
                                                                            $i2++;
                                                                        }
                                                                    ?>
                                                    </ul>
                                                    <?php } ?>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div data-name="cols-widgets-conteneur" id="GInterface.Instances[2]_colonne_2" class="cdt wrapper-cols ">
                                <article role="region" tabindex="-1" aria-describedby="id_81_TitreText" id="id_81id_29"
                                    class="widget ThemeCat-pedagogie qcm" style="height:auto;">
                                    <header title="Les iDevoirs des 15 prochains jours">
                                        <h3 tabindex="0" id="id_81_TitreText"><span>Prochains iDevoirs</span></h3>
                                        <div class="cta-conteneur"></div>
                                    </header>
                                    <div class="content-container overflow-auto" id="id_81id_30" role="presentation" tabindex="0">
                                        <div id="id_81">
                                            <ul class="sub-liste" role="list">
                                                <li>
                                                    <div class="wrap">
                                                        <div class="bloc-date-conteneur">
                                                            <div>29</div>
                                                            <div>janv.</div>
                                                        </div>
                                                        <div class="infos-ds-conteneur">
                                                            <h4>PHYSIQUE-CHIMIE</h4>
                                                            <div class="date">Du 29 janvier à 08h00 au 12 février à 18h00</div>
                                                            <div><i class="icon_qcm ThemeCat-pedagogie"></i>2024 Intensité et tension :
                                                                les lois - Révisions niveau 4ème 1 (10 questions - durée 15 min) </div>
                                                            <div class="flex-contain btn-qcm"><button
                                                                    onclick="IE.Identite.collection.g11.surExecutionQCM('57#YWY640jrBUNSZu2CIK98GmqGFrHe1FhaCP3VP42WXbg')"
                                                                    class="themeBoutonSecondaire ieBouton ie-ripple NoWrap ieBoutonDefautSansImage">Exécuter
                                                                    le QCM</button></div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </article>
                                <article role="region" tabindex="-1" aria-describedby="id_86_TitreText" id="id_86id_29"
                                    class="widget ThemeCat-pedagogie travailafaire" style="height:auto;">
                                    <header title="Travaux à faire des 7 prochains jours">
                                        <h3 tabindex="0" onclick="GInterface.Instances[2]._surToutVoir(7)" class="clickable"
                                            id="id_86_TitreText"><span>Travail à faire pour les prochains jours</span></h3>
                                        <div class="cta-conteneur"><i id="id_86id_32" role="button" title="Tout voir"
                                                class="as-button bt-widget icon icon_affichage_widget"
                                                onclick="GInterface.Instances[2]._surToutVoir(7)" tabindex="0"
                                                aria-label="Tout voir"></i></div>
                                    </header>
                                    <div class="content-container overflow-auto" id="id_86id_30" role="presentation" tabindex="0">
                                        <div id="id_86">
                                            <div class="conteneur-liste-CDT">
                                                <ul class="liste-imbriquee">
                                                    <li role="listitem" aria-labelledby="id_86_date_2024_1_5" tabindex="0">
                                                        <h4 id="id_86_date_2024_1_5"><span>Pour</span> lundi 5 févr.</h4>
                                                        <ul class="sub-liste cols" role="list">
                                                            <?php
                                                            while ($donnees = $homeworks->fetch()) {
                                                                $id = $donnees['id'];
                                                                $subject = $donnees['subjects'];
                                                                $content = $donnees['content'];
                                                                $subjects = $bdd->query("SELECT * FROM subjects WHERE title='$subject'");
                                                                $subjects = $subjects->fetch();
                                                                $color = $subjects['color'];
                                                            ?>
                                                            <li role="listitem" aria-labelledby="id_86_date_2024_1_5">
                                                                <div class="wrap conteneur-item">
                                                                    <div tabindex="0" role="link"
                                                                        onclick="IE.Identite.collection.g13._surTAF('157#5tvC3xUaVdZ0LR1PuFkkbeLMTSg0nj6UCBpJCvezRgs')"
                                                                        onkeyup="if(GNavigateur.isToucheSelection())IE.Identite.collection.g13._surTAF('157#5tvC3xUaVdZ0LR1PuFkkbeLMTSg0nj6UCBpJCvezRgs')"
                                                                        class="as-header">
                                                                        <div aria-label="<?= $subject ?>" class="with-color"
                                                                            style="--couleur-matiere:<?= $color ?>;margin-left:.8rem;">
                                                                            <span class="titre-matiere "><?= $subject ?></span>
                                                                        </div>
                                                                        <div tabindex="0" class="tag-style ie-chips">
                                                                            <div class="text ie-ellipsis">Non Fait</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="m-left">
                                                                        <div tabindex="0" class="as-content  avecAction"
                                                                            aria-labelledby="IE.Identite.collection.g13_1">
                                                                            <div class="description widgetTAF init-html "
                                                                                id="IE.Identite.collection.g13_1">
                                                                                <div><?= $content ?></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="flex-contain conteneur-cb"><label
                                                                            class="iecb iecbrbdroite cb-termine colored-label"><input
                                                                                type="checkbox" id="todo<?= $id ?>"><span
                                                                                aria-hidden="true"></span><span>J'ai
                                                                                terminé</span></label></div>
                                                                    <script type="text/javascript">
                                                                    window.onload = function() {
                                                                        document.querySelector('#todo<?= $id ?>').onclick =
                                                                            function(e) {
                                                                                if (e.target.checked) {
                                                                                    document.location.replace(
                                                                                        '/pronote/eleve/?do=<?= $id ?>');
                                                                                } else {
                                                                                    document.location.replace(
                                                                                        '/pronote/eleve/?do=<?= $id ?>');
                                                                                }
                                                                            }
                                                                    }
                                                                    </script>
                                                                </div>
                                                            </li>
                                                            <?php
                                                            }
                                                            ?>
                                                        </ul>
                                                    </li>
                                                    <li role="listitem" aria-labelledby="id_86_date_2024_1_8" tabindex="0">
                                                        <h4 id="id_86_date_2024_1_8"><span>Pour</span> jeudi 8 févr.</h4>
                                                        <ul class="sub-liste cols" role="list">
                                                            <li role="listitem" aria-labelledby="id_86_date_2024_1_8">
                                                                <div class="wrap conteneur-item">
                                                                    <div tabindex="0" role="link"
                                                                        onclick="IE.Identite.collection.g13._surTAF('157#2Y8Xb7zdTxiTRaOlYmJvYov1Gu9bOU-l8fcRpP0HoKU')"
                                                                        onkeyup="if(GNavigateur.isToucheSelection())IE.Identite.collection.g13._surTAF('157#2Y8Xb7zdTxiTRaOlYmJvYov1Gu9bOU-l8fcRpP0HoKU')"
                                                                        class="as-header">
                                                                        <div aria-label="PHYSIQUE-CHIMIE" class="with-color"
                                                                            style="--couleur-matiere:#D4534C;margin-left:.8rem;"><span
                                                                                class="titre-matiere ">PHYSIQUE-CHIMIE</span></div>
                                                                        <div tabindex="0" class="tag-style ie-chips">
                                                                            <div class="text ie-ellipsis">Non Fait</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="m-left">
                                                                        <div tabindex="0" class="as-content  avecAction"
                                                                            aria-labelledby="IE.Identite.collection.g13_6">
                                                                            <div class="description widgetTAF init-html "
                                                                                id="IE.Identite.collection.g13_6">
                                                                                <div>Faire les QCM après avoir revu les chapitres de
                                                                                    4ème sur les lois de l'électricité (voir fichiers
                                                                                    joints)</div>
                                                                            </div>
                                                                            <div class="piece-jointe">
                                                                                <div class="chips-pj">
                                                                                    <a href="https://0490022h.index-education.net/pronote/FichiersExternes/12f5c54c87e22ac12601423e42ac5ec6ca64794a456bc5738e4ea34c169a16078e2919da795d2cacc7576590fd834df2716321163cd7029291537b1b659b2cfd67b8792a205b0a5c02adfed846b48326/Bordas%20chap%2021fr.pdf?Session=6377859"
                                                                                        target="_blank" id="id_129"
                                                                                        style="max-width:300px;"
                                                                                        class="iconic icon_uniF1C1 ie-chips AvecMenuContextuel avec-event ie-ripple ie-ripple-claire">
                                                                                        <div class="text ie-ellipsis">Bordas chap
                                                                                            21fr.pdf</div>
                                                                                    </a>
                                                                                </div>
                                                                                <div class="chips-pj">
                                                                                    <a href="https://0490022h.index-education.net/pronote/FichiersExternes/239bbd9ca108b2d1b110306b30b7d8003e3f51c1e7076c9d7c05df3a6ff0001ff7eee079dda6581590f99998d969ecb98070e63be96620a67186f55c5bbef0737812aae82aaaeddcc7f2a0d1f125dd34/Bordas%20chap%2022fr.pdf?Session=6377859"
                                                                                        target="_blank" id="id_130"
                                                                                        style="max-width:300px;"
                                                                                        class="iconic icon_uniF1C1 ie-chips AvecMenuContextuel avec-event ie-ripple ie-ripple-claire">
                                                                                        <div class="text ie-ellipsis">Bordas chap
                                                                                            22fr.pdf</div>
                                                                                    </a>
                                                                                </div>
                                                                                <div class="chips-pj">
                                                                                    <a href="https://0490022h.index-education.net/pronote/FichiersExternes/8b41c804ed8c32761ed2cca4168bf2a5b146d7dc107ed8a5a7fbe88668055dd578bd73dde2a0d7ea6137e62f80b60234084f11fc375b791003b3024005f657e0aad829e27cfa26d5770da55fc3fe2a98/Bordas%20chap%2023fr.pdf?Session=6377859"
                                                                                        target="_blank" id="id_131"
                                                                                        style="max-width:300px;"
                                                                                        class="iconic icon_uniF1C1 ie-chips AvecMenuContextuel avec-event ie-ripple ie-ripple-claire">
                                                                                        <div class="text ie-ellipsis">Bordas chap
                                                                                            23fr.pdf</div>
                                                                                    </a>
                                                                                </div>
                                                                                <div class="chips-pj">
                                                                                    <a href="https://0490022h.index-education.net/pronote/FichiersExternes/b1538ce0991f1fbc06a1c7b6e7cfdfad01cff2d0581508c02bd4b8840dc1c9913d39478d7483878d3f1f2a70171369f29497487d983f04ce92eab6227227979c9e869677c06ffa80d21bd3f550846f96/Bordas%20chap%2024fr.pdf?Session=6377859"
                                                                                        target="_blank" id="id_132"
                                                                                        style="max-width:300px;"
                                                                                        class="iconic icon_uniF1C1 ie-chips AvecMenuContextuel avec-event ie-ripple ie-ripple-claire">
                                                                                        <div class="text ie-ellipsis">Bordas chap
                                                                                            24fr.pdf</div>
                                                                                    </a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="flex-contain conteneur-cb"><label
                                                                            class="iecb iecbrbdroite cb-termine colored-label"><input
                                                                                type="checkbox"><span
                                                                                aria-hidden="true"></span><span>J'ai
                                                                                terminé</span></label></div>
                                                                </div>
                                                            </li>
                                                            <li role="listitem" aria-labelledby="id_86_date_2024_1_8">
                                                                <div class="wrap conteneur-item">
                                                                    <div tabindex="0" role="link"
                                                                        onclick="IE.Identite.collection.g13._surTAF('157#aWsSHizYGoHcR9cOFJmezD62JGAA5k9lSDPN3n8eDgs')"
                                                                        onkeyup="if(GNavigateur.isToucheSelection())IE.Identite.collection.g13._surTAF('157#aWsSHizYGoHcR9cOFJmezD62JGAA5k9lSDPN3n8eDgs')"
                                                                        class="as-header">
                                                                        <div aria-label="ESPAGNOL LV2" class="with-color"
                                                                            style="--couleur-matiere:#A02E65;margin-left:.8rem;"><span
                                                                                class="titre-matiere ">ESPAGNOL LV2</span></div>
                                                                        <div tabindex="0" class="tag-style ie-chips">
                                                                            <div class="text ie-ellipsis">Non Fait</div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="m-left">
                                                                        <div tabindex="0" class="as-content  avecAction"
                                                                            aria-labelledby="IE.Identite.collection.g13_0">
                                                                            <div class="description widgetTAF init-html "
                                                                                id="IE.Identite.collection.g13_0">
                                                                                <div>Rendre le travail sur la fiche métier</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="taf-a-rendre">
                                                                        <div class="taf-btn-conteneur"><a role="button" tabindex="0"
                                                                                id="id_128_157#aWsSHizYGoHcR9cOFJmezD62JGAA5k9lSDPN3n8eDgs"
                                                                                class="as-cta rendu-pn">Déposer ma copie</a></div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <article role="region" tabindex="-1" aria-describedby="id_83_TitreText" id="id_83id_29"
                                    class="widget ThemeCat-pedagogie ressourcepedagogique" style="height:auto;">
                                    <header title="Les 5 dernières ressources pédagogiques">
                                        <h3 tabindex="0" onclick="GInterface.Instances[2]._surToutVoir(15)" class="clickable"
                                            id="id_83_TitreText"><span>Dernières ressources pédagogiques</span></h3>
                                        <div class="cta-conteneur"><i id="id_83id_32" role="button" title="Tout voir"
                                                class="as-button bt-widget icon icon_affichage_widget"
                                                onclick="GInterface.Instances[2]._surToutVoir(15)" tabindex="0"
                                                aria-label="Tout voir"></i></div>
                                    </header>
                                    <div class="content-container overflow-auto" id="id_83id_30" role="presentation" tabindex="0">
                                        <div id="id_83">
                                            <ul class="one-line">
                                                <li tabindex="0" role="listitem" aria-label="HISTOIRE-GEOGRAPHIE déposé le 2 février ">
                                                    <div class="wrap">
                                                        <h4 class="ie-line-color static left" style="--color-line: #7CB927;">
                                                            HISTOIRE-GEOGRAPHIE</h4>
                                                        <div class="pj-date-contain">
                                                            <a href="https://0490022h.index-education.net/pronote/FichiersExternes/99707acbc5c63cda591cf6cc7801bc66ecb679bd1490266a3370cf32dedad59b7d4ae412ac971e8bb07a85a377fdb13673bc6b3d67911496b71e9a344d89b5bcaf403d603dd64d44b0a8de2eed9db65c/S%C3%A9ance%203%20la%20R%C3%A9sistance%20(fiche%20le%C3%A7on).pdf?Session=6377859"
                                                                target="_blank" style="max-width:35rem;"
                                                                class="iconic avec-event icon_uniF1C1 ie-chips AvecMenuContextuel ie-ripple ie-ripple-claire">
                                                                <div class="text ie-ellipsis">Séance 3 la Résistance (fiche leçon).pdf
                                                                </div>
                                                            </a>
                                                        </div>
                                                        <div class="date m-left-l m-top p-left">déposé le 2 février</div>
                                                    </div>
                                                </li>
                                                <li tabindex="0" role="listitem" aria-label="HISTOIRE-GEOGRAPHIE déposé le 2 février ">
                                                    <div class="wrap">
                                                        <h4 class="ie-line-color static left" style="--color-line: #7CB927;">
                                                            HISTOIRE-GEOGRAPHIE</h4>
                                                        <div class="pj-date-contain">
                                                            <a href="https://0490022h.index-education.net/pronote/FichiersExternes/2878888463ea0b746eeecf6e0f212196cfe8cb6dd75569ec21893c9a3c7ffb85bed84345f91bef4e9b34c3c40b0844f263f1581f881e19a2cd8ff5a45da1b1059db6ff6ec16f812b6a0f794e326897ac/S%C3%A9ance%202%20Vichy%20(fiche%20le%C3%A7on).pdf?Session=6377859"
                                                                target="_blank" style="max-width:35rem;"
                                                                class="iconic avec-event icon_uniF1C1 ie-chips AvecMenuContextuel ie-ripple ie-ripple-claire">
                                                                <div class="text ie-ellipsis">Séance 2 Vichy (fiche leçon).pdf</div>
                                                            </a>
                                                        </div>
                                                        <div class="date m-left-l m-top p-left">déposé le 2 février</div>
                                                    </div>
                                                </li>
                                                <li tabindex="0" role="listitem" aria-label="PHYSIQUE-CHIMIE déposé le 29 janvier ">
                                                    <div class="wrap">
                                                        <h4 class="ie-line-color static left" style="--color-line: #D4534C;">
                                                            PHYSIQUE-CHIMIE</h4>
                                                        <div class="pj-date-contain">
                                                            <a href="https://0490022h.index-education.net/pronote/FichiersExternes/239bbd9ca108b2d1b110306b30b7d8003e3f51c1e7076c9d7c05df3a6ff0001ff7eee079dda6581590f99998d969ecb9aff18b3b98a4ca93d00fe542c7a8892a73703ece65c3fa083e26c775002f99ed/Bordas%20chap%2022fr.pdf?Session=6377859"
                                                                target="_blank" style="max-width:35rem;"
                                                                class="iconic avec-event icon_uniF1C1 ie-chips AvecMenuContextuel ie-ripple ie-ripple-claire">
                                                                <div class="text ie-ellipsis">Bordas chap 22fr.pdf</div>
                                                            </a>
                                                        </div>
                                                        <div class="date m-left-l m-top p-left">déposé le 29 janvier</div>
                                                    </div>
                                                </li>
                                                <li tabindex="0" role="listitem" aria-label="PHYSIQUE-CHIMIE déposé le 29 janvier ">
                                                    <div class="wrap">
                                                        <h4 class="ie-line-color static left" style="--color-line: #D4534C;">
                                                            PHYSIQUE-CHIMIE</h4>
                                                        <div class="pj-date-contain">
                                                            <a href="https://0490022h.index-education.net/pronote/FichiersExternes/12f5c54c87e22ac12601423e42ac5ec6ca64794a456bc5738e4ea34c169a16078e2919da795d2cacc7576590fd834df29a553b1ba8fbded6c6a6f6e0166b0ab280461abe4f07ffd1647cd88a9156205e/Bordas%20chap%2021fr.pdf?Session=6377859"
                                                                target="_blank" style="max-width:35rem;"
                                                                class="iconic avec-event icon_uniF1C1 ie-chips AvecMenuContextuel ie-ripple ie-ripple-claire">
                                                                <div class="text ie-ellipsis">Bordas chap 21fr.pdf</div>
                                                            </a>
                                                        </div>
                                                        <div class="date m-left-l m-top p-left">déposé le 29 janvier</div>
                                                    </div>
                                                </li>
                                                <li tabindex="0" role="listitem" aria-label="PHYSIQUE-CHIMIE déposé le 29 janvier ">
                                                    <div class="wrap">
                                                        <h4 class="ie-line-color static left" style="--color-line: #D4534C;">
                                                            PHYSIQUE-CHIMIE</h4>
                                                        <div class="pj-date-contain">
                                                            <a href="https://0490022h.index-education.net/pronote/FichiersExternes/b1538ce0991f1fbc06a1c7b6e7cfdfad01cff2d0581508c02bd4b8840dc1c9913d39478d7483878d3f1f2a70171369f2dd7f030257b984a92182f7840e9fed07b84b2b0a6018ae9fbabd58443b0fdceb/Bordas%20chap%2024fr.pdf?Session=6377859"
                                                                target="_blank" style="max-width:35rem;"
                                                                class="iconic avec-event icon_uniF1C1 ie-chips AvecMenuContextuel ie-ripple ie-ripple-claire">
                                                                <div class="text ie-ellipsis">Bordas chap 24fr.pdf</div>
                                                            </a>
                                                        </div>
                                                        <div class="date m-left-l m-top p-left">déposé le 29 janvier</div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div data-name="cols-widgets-conteneur" id="GInterface.Instances[2]_colonne_1" class="notes wrapper-cols ">
                                <article role="region" tabindex="-1" aria-describedby="id_88_TitreText" id="id_88id_29"
                                    class="widget ThemeCat-viescolaire viescolaire" style="height:auto;">
                                    <header title="Les évènements des 15 derniers jours">
                                        <h3 tabindex="0" onclick="GInterface.Instances[2]._surToutVoir(6)" class="clickable"
                                            id="id_88_TitreText"><span>Vie scolaire</span></h3>
                                        <div class="cta-conteneur"><i id="id_88id_32" role="button" title="Tout voir"
                                                class="as-button bt-widget icon icon_affichage_widget"
                                                onclick="GInterface.Instances[2]._surToutVoir(6)" tabindex="0"
                                                aria-label="Tout voir"></i></div>
                                    </header>
                                    <div class="content-container overflow-auto" id="id_88id_30" role="presentation" tabindex="0">
                                        <div id="id_88">
                                            <ul role="list" class="liste-clickable">
                                                <li tabindex="0" class="icon Color_RecapVS_Lue icon_retard" role="link"
                                                    aria-label="Retard justifié le 25 janv. à 15h45"
                                                    onclick="IE.Identite.collection.g14._surAbsence (0)"
                                                    onkeyup="if(GNavigateur.isToucheSelection())IE.Identite.collection.g14._surAbsence (0)">
                                                    <div class="wrap">
                                                        <h4>Retard justifié</h4><span class="date">le 25 janv. à 15h45</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </article>
                                <article role="region" tabindex="-1" aria-describedby="id_73_TitreText" id="id_73id_29"
                                    class="widget ThemeCat-resultat notes" style="height:auto;">
                                    <header title="Notes des 14 derniers jours">
                                        <h3 tabindex="0" onclick="GInterface.Instances[2]._surToutVoir(10)" class="clickable"
                                            id="id_73_TitreText"><span>Dernières notes</span></h3>
                                        <div class="cta-conteneur"><i id="id_73id_32" role="button" title="Tout voir"
                                                class="as-button bt-widget icon icon_affichage_widget"
                                                onclick="GInterface.Instances[2]._surToutVoir(10)" tabindex="0"
                                                aria-label="Tout voir"></i></div>
                                    </header>
                                    <div class="content-container overflow-auto" id="id_73id_30" role="presentation" tabindex="0">
                                        <div id="id_73">
                                            <div class="no-events" tabindex="0" aria-label="Aucune nouvelle note">
                                                <p>Aucune nouvelle note</p>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <article role="region" tabindex="-1" aria-describedby="id_56_TitreText" id="id_56id_29"
                                    class="widget ThemeCat-resultat competences" style="height:auto;">
                                    <header title="Evaluations des 14 derniers jours">
                                        <h3 tabindex="0" onclick="GInterface.Instances[2]._surToutVoir(18)" class="clickable"
                                            id="id_56_TitreText"><span>Dernières évaluations</span></h3>
                                        <div class="cta-conteneur"><i id="id_56id_32" role="button" title="Tout voir"
                                                class="as-button bt-widget icon icon_affichage_widget"
                                                onclick="GInterface.Instances[2]._surToutVoir(18)" tabindex="0"
                                                aria-label="Tout voir"></i></div>
                                    </header>
                                    <div class="content-container overflow-auto" id="id_56id_30" role="presentation" tabindex="0">
                                        <div id="id_56">
                                            <ul role="listitem" class="liste-clickable">
                                                <li role="link" tabindex="0"
                                                    onclick="IE.Identite.collection.g4._surDernieresEvaluationClick(event, 0)"
                                                    onkeyup="if(GNavigateur.isToucheSelection())IE.Identite.collection.g4._surDernieresEvaluationClick (event, 0)">
                                                    <div class="wrap">
                                                        <h4><span>EURO ANGLAIS</span></h4>
                                                        <div class="infos-conteneur"><span class="date">le 31 janv.</span></div>
                                                    </div>
                                                    <div class="evaluations-conteneur"><span title="S'investir"><span
                                                                class="NiveauAcquisition NiveauAcquisition_Pastille"
                                                                style="background-color:#45B851;"
                                                                aria-label="Maîtrise satisfaisante">&nbsp;</span></span><span
                                                            title="Percevoir les spécificités culturelles des pays et des régions de la langue étudiée en dépassant la vision figée et schématique des stéréotypes et des clichés."><span
                                                                class="NiveauAcquisition NiveauAcquisition_Pastille"
                                                                style="background-color:#008000;color: #FFFFFF;"
                                                                aria-label="Très bonne maîtrise">+</span></span>
                                                    </div>
                                                </li>
                                                <li role="link" tabindex="0"
                                                    onclick="IE.Identite.collection.g4._surDernieresEvaluationClick(event, 1)"
                                                    onkeyup="if(GNavigateur.isToucheSelection())IE.Identite.collection.g4._surDernieresEvaluationClick (event, 1)">
                                                    <div class="wrap">
                                                        <h4><span>ESPAGNOL LV2</span></h4>
                                                        <div class="infos-conteneur"><span class="date">le 29 janv.</span></div>
                                                    </div>
                                                    <div class="evaluations-conteneur"><span
                                                            title="Peut interagir brièvement dans des situations déjà connues en utilisant des mots et expressions simples et avec un débit lent."><span
                                                                class="NiveauAcquisition NiveauAcquisition_Pastille"
                                                                style="background-color:#45B851;"
                                                                aria-label="Maîtrise satisfaisante">&nbsp;</span></span>
                                                        <span title="Travailler en équipe"><span
                                                                class="NiveauAcquisition NiveauAcquisition_Pastille"
                                                                style="background-color:#45B851;"
                                                                aria-label="Maîtrise satisfaisante">&nbsp;</span></span>
                                                    </div>
                                                </li>
                                                <li role="link" tabindex="0"
                                                    onclick="IE.Identite.collection.g4._surDernieresEvaluationClick(event, 2)"
                                                    onkeyup="if(GNavigateur.isToucheSelection())IE.Identite.collection.g4._surDernieresEvaluationClick (event, 2)">
                                                    <div class="wrap">
                                                        <h4><span>ED.PHYSIQUE &amp; SPORT.</span></h4>
                                                        <div class="infos-conteneur"><span class="date">le 24 janv.</span></div>
                                                    </div>
                                                    <div class="evaluations-conteneur"><span
                                                            title="Basket-ball: agir efficacement en attaque et en défense pour gagner le match"><span
                                                                class="NiveauAcquisition NiveauAcquisition_Pastille"
                                                                style="background-color:#45B851;"
                                                                aria-label="Maîtrise satisfaisante">&nbsp;</span></span>
                                                        <span
                                                            title="Comprendre, respecter et faire respecter règles et règlements."><span
                                                                class="NiveauAcquisition NiveauAcquisition_Pastille"
                                                                style="background-color:#45B851;"
                                                                aria-label="Maîtrise satisfaisante">&nbsp;</span></span>
                                                        <span title="Savoir s'échauffer"><span
                                                                class="NiveauAcquisition NiveauAcquisition_Pastille"
                                                                style="background-color:#008000;color: #FFFFFF;"
                                                                aria-label="Très bonne maîtrise">+</span></span>
                                                    </div>
                                                </li>
                                                <li role="link" tabindex="0"
                                                    onclick="IE.Identite.collection.g4._surDernieresEvaluationClick(event, 3)"
                                                    onkeyup="if(GNavigateur.isToucheSelection())IE.Identite.collection.g4._surDernieresEvaluationClick (event, 3)">
                                                    <div class="wrap">
                                                        <h4><span>ANGLAIS LV1</span></h4>
                                                        <div class="infos-conteneur"><span class="date">le 21 déc.</span></div>
                                                    </div>
                                                    <div class="evaluations-conteneur"><span title="Item 2"><span
                                                                class="NiveauAcquisition NiveauAcquisition_Pastille"
                                                                style="background-color:#FFDA01;"
                                                                aria-label="Maîtrise fragile">&nbsp;</span></span><span
                                                            title="Mobiliser à bon escient ses connaissances lexicales, culturelles, grammaticales pour produire un texte oral sur des sujets variés."><span
                                                                class="NiveauAcquisition NiveauAcquisition_Pastille"
                                                                style="background-color:#FFDA01;"
                                                                aria-label="Maîtrise fragile">&nbsp;</span></span>
                                                        <span
                                                            title="Développer des stratégies pour surmonter un manque lexical lors d’une prise de parole, s’autocorriger et reformuler pour se faire comprendre."><span
                                                                class="NiveauAcquisition NiveauAcquisition_Pastille"
                                                                style="background-color:#FFDA01;"
                                                                aria-label="Maîtrise fragile">&nbsp;</span></span>
                                                        <span title="Respecter un registre et un niveau de langue."><span
                                                                class="NiveauAcquisition NiveauAcquisition_Pastille"
                                                                style="background-color:#45B851;"
                                                                aria-label="Maîtrise satisfaisante">&nbsp;</span></span>
                                                        <span
                                                            title="Mettre en voix son discours par la prononciation, l’intonation et la gestuelle adéquates."><span
                                                                class="NiveauAcquisition NiveauAcquisition_Pastille"
                                                                style="background-color:#45B851;"
                                                                aria-label="Maîtrise satisfaisante">&nbsp;</span></span>
                                                    </div>
                                                </li>
                                                <li role="link" tabindex="0"
                                                    onclick="IE.Identite.collection.g4._surDernieresEvaluationClick(event, 4)"
                                                    onkeyup="if(GNavigateur.isToucheSelection())IE.Identite.collection.g4._surDernieresEvaluationClick (event, 4)">
                                                    <div class="wrap">
                                                        <h4><span>MATHEMATIQUES</span></h4>
                                                        <div class="infos-conteneur"><span class="date">le 7 déc.</span></div>
                                                    </div>
                                                    <div class="evaluations-conteneur"><span title="Chercher"><span
                                                                class="NiveauAcquisition NiveauAcquisition_Pastille"
                                                                style="background-color:#45B851;"
                                                                aria-label="Maîtrise satisfaisante">&nbsp;</span></span><span
                                                            title="Modéliser"><span class="NiveauAcquisition NiveauAcquisition_Pastille"
                                                                style="background-color:#45B851;"
                                                                aria-label="Maîtrise satisfaisante">&nbsp;</span></span>
                                                        <span title="Représenter"><span
                                                                class="NiveauAcquisition NiveauAcquisition_Pastille"
                                                                style="background-color:#45B851;"
                                                                aria-label="Maîtrise satisfaisante">&nbsp;</span></span><span
                                                            title="Raisonner"><span class="NiveauAcquisition NiveauAcquisition_Pastille"
                                                                style="background-color:#45B851;"
                                                                aria-label="Maîtrise satisfaisante">&nbsp;</span></span>
                                                        <span title="Calculer"><span
                                                                class="NiveauAcquisition NiveauAcquisition_Pastille"
                                                                style="background-color:#45B851;"
                                                                aria-label="Maîtrise satisfaisante">&nbsp;</span></span><span
                                                            title="Communiquer"><span
                                                                class="NiveauAcquisition NiveauAcquisition_Pastille"
                                                                style="background-color:#45B851;"
                                                                aria-label="Maîtrise satisfaisante">&nbsp;</span></span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </article>
                            </div>
                            <div data-name="cols-widgets-conteneur" id="GInterface.Instances[2]_colonne_0"
                                class="agendaetinformations wrapper-cols ">
                                <article role="region" tabindex="-1" aria-describedby="id_49_TitreText" id="id_49id_29"
                                    class="widget ThemeCat-communication agenda collapsible" style="height:auto;">
                                    <header title="L'agenda des 10 prochains évènements">
                                        <h3 tabindex="0" onclick="GInterface.Instances[2]._surToutVoir(8)" class="clickable"
                                            id="id_49_TitreText"><span>Agenda</span></h3>
                                        <div class="cta-conteneur"><i id="id_49id_32" role="button" title="Tout voir"
                                                class="as-button bt-widget icon icon_affichage_widget"
                                                onclick="GInterface.Instances[2]._surToutVoir(8)" tabindex="0"
                                                aria-label="Tout voir"></i></div>
                                    </header>
                                    <div class="content-container overflow-auto" id="id_49id_30" role="presentation" tabindex="0">
                                        <div id="id_49">
                                            <div class="no-events" tabindex="0" aria-label="Aucun évènement à venir">
                                                <p>Aucun évènement à venir</p>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <article role="region" tabindex="-1" aria-describedby="id_48_TitreText" id="id_48id_29"
                                    class="widget ThemeCat-communication actualites collapsible" style="height:auto;">
                                    <header title="Les informations et sondages non lus">
                                        <h3 tabindex="0" onclick="GInterface.Instances[2]._surToutVoir(9)" class="clickable"
                                            id="id_48_TitreText"><span>Informations &amp; Sondages</span></h3>
                                        <div class="cta-conteneur"><i id="id_48id_32" role="button" title="Tout voir"
                                                class="as-button bt-widget icon icon_affichage_widget"
                                                onclick="GInterface.Instances[2]._surToutVoir(9)" tabindex="0"
                                                aria-label="Tout voir"></i></div>
                                    </header>
                                    <div class="content-container overflow-auto" id="id_48id_30" role="presentation" tabindex="0">
                                        <div id="id_48">
                                            <div class="no-events" tabindex="0" aria-label="Aucune nouvelle information">
                                                <p>Aucune nouvelle information</p>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <article role="region" tabindex="-1" aria-describedby="id_61_TitreText" id="id_61id_29"
                                    class="widget ThemeCat-communication discussions collapsible" style="height:auto;">
                                    <header title="Les discussions non lues">
                                        <h3 tabindex="0" onclick="GInterface.Instances[2]._surToutVoir(0)" class="clickable"
                                            id="id_61_TitreText"><span>Discussions</span></h3>
                                        <div class="cta-conteneur"><i id="id_61id_32" role="button" title="Tout voir"
                                                class="as-button bt-widget icon icon_affichage_widget"
                                                onclick="GInterface.Instances[2]._surToutVoir(0)" tabindex="0"
                                                aria-label="Tout voir"></i></div>
                                    </header>
                                    <div class="content-container overflow-auto" id="id_61id_30" role="presentation" tabindex="0">
                                        <div id="id_61">
                                            <div class="no-events" tabindex="0" aria-label="Aucun nouveau message">
                                                <p>Aucun nouveau message</p>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                                <article role="region" tabindex="-1" aria-describedby="id_72_TitreText" id="id_72id_29"
                                    class="widget ThemeCat-communication menudelacantine" style="height:auto;">
                                    <header title="Le menu du jour">
                                        <h3 tabindex="0" onclick="GInterface.Instances[2]._surToutVoir(5)" class="clickable"
                                            id="id_72_TitreText"><span>Menu de la cantine</span></h3>
                                        <div class="cta-conteneur"><i id="id_72id_32" role="button" title="Tout voir"
                                                class="as-button bt-widget icon icon_affichage_widget"
                                                onclick="GInterface.Instances[2]._surToutVoir(5)" tabindex="0"
                                                aria-label="Tout voir"></i></div>
                                    </header>
                                    <div class="filtre-conteneur">
                                        <div id="IE.Identite.collection.g9">
                                            <div class="ObjetCelluleDate input-wrapper "><i role="button" tabindex="0" title="Précédent"
                                                    aria-label="Précédent"
                                                    class="icon_angle_left fix-bloc icon btnImageIcon btnImage"></i>
                                                <div id="IE.Identite.collection.g9.cellule" class="fluid-bloc">
                                                    <!--ie-if-->
                                                    <div class="input-wrapper">
                                                        <div class="ocb_cont as-input as-date-picker ie-ripple">
                                                            <div class="ocb-libelle ie-ellipsis" tabindex="0"
                                                                id="IE.Identite.collection.g9.cellule_Edit" role="button"
                                                                aria-haspopup="dialog" style="width: 100px;">lun.&nbsp;05&nbsp;févr.
                                                            </div>
                                                            <div class="ocb_bouton"></div>
                                                        </div>
                                                    </div>
                                                </div><i role="button" tabindex="0" title="Suivant" aria-label="Suivant"
                                                    class="icon_angle_right fix-bloc icon btnImageIcon btnImage"
                                                    style="flex: none;"></i>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="content-container overflow-auto" id="id_72id_30" role="presentation" tabindex="0">
                                        <div id="id_72">
                                            <ul role="list" class="one-line">
                                                <li tabindex="0">
                                                    <div class="conteneur-aliments">
                                                        <div class="aliment m-y-s">
                                                            <div>Salade de pommes de terre au maquereau</div>
                                                            <div><i role="img" aria-label="Issu de l'Agriculture Biologique"
                                                                    class="label-alimentaire icon icon_cantine_bio"
                                                                    style="color:#169A3B" title="Issu de l'Agriculture Biologique"></i>
                                                            </div>
                                                        </div>
                                                        <div class="aliment m-y-s">
                                                            <div>Salade de riz au jambon</div>
                                                        </div>
                                                        <div class="aliment m-y-s">
                                                            <div>Scones au gruyère</div>
                                                        </div>
                                                        <div class="aliment m-y-s">
                                                            <div>Velouté de butternuts</div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li tabindex="0">
                                                    <div class="conteneur-aliments">
                                                        <div class="aliment m-y-s">
                                                            <div>Escalope de volaille à l'indienne</div>
                                                        </div>
                                                        <div class="aliment m-y-s">
                                                            <div>Filet de poisson sauce au cumin</div>
                                                        </div>
                                                        <div class="aliment m-y-s">
                                                            <div>Paupiette de dinde</div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li tabindex="0">
                                                    <div class="conteneur-aliments">
                                                        <div class="aliment m-y-s">
                                                            <div>Flan de légumes bio</div>
                                                            <div><i role="img" aria-label="Issu de l'Agriculture Biologique"
                                                                    class="label-alimentaire icon icon_cantine_bio"
                                                                    style="color:#169A3B" title="Issu de l'Agriculture Biologique"></i>
                                                            </div>
                                                        </div>
                                                        <div class="aliment m-y-s">
                                                            <div>Lentilles vertes</div>
                                                            <div><i role="img" aria-label="Issu de l'Agriculture Biologique"
                                                                    class="label-alimentaire icon icon_cantine_bio"
                                                                    style="color:#169A3B" title="Issu de l'Agriculture Biologique"></i>
                                                            </div>
                                                        </div>
                                                        <div class="aliment m-y-s">
                                                            <div>Salade verte</div>
                                                            <div><i role="img" aria-label="Produits locaux"
                                                                    class="label-alimentaire icon icon_map_marker" style="color:#179BC1"
                                                                    title="Produits locaux"></i></div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li tabindex="0">
                                                    <div class="conteneur-aliments">
                                                        <div class="aliment m-y-s">
                                                            <div>Assortiment de yaourts bio</div>
                                                            <div><i role="img" aria-label="Issu de l'Agriculture Biologique"
                                                                    class="label-alimentaire icon icon_cantine_bio"
                                                                    style="color:#169A3B" title="Issu de l'Agriculture Biologique"></i>
                                                            </div>
                                                        </div>
                                                        <div class="aliment m-y-s">
                                                            <div>Riz au lait</div>
                                                        </div>
                                                    </div>
                                                </li>
                                                <li tabindex="0">
                                                    <div class="conteneur-aliments">
                                                        <div class="aliment m-y-s">
                                                            <div>Banane sauce au chocolat</div>
                                                        </div>
                                                        <div class="aliment m-y-s">
                                                            <div>Fruits de saison</div>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="legende" aria-hidden="true">
                                                <span class="menu">
                                                    <i role="img" aria-label="Issu de l'Agriculture Biologique" class="label-alimentaire icon icon_cantine_bio" style="color:#169A3B" title="Issu de l'Agriculture Biologique"></i>
                                                    Issu de l'Agriculture Biologique
                                                </span>
                                                <span class="menu">
                                                    <i role="img" aria-label="Produits locaux" class="label-alimentaire icon icon_map_marker" style="color:#179BC1" title="Produits locaux"></i>
                                                    Produits locaux
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-wrapper closed" id="GInterface.Instances[1]">
                    <footer id="GInterface.Instances[1]_footer" class="ObjetBandeauPied ">
                        <div class="footer-toggler icon_angle_down"></div>
                        <div class="ibp-bloc-left">
                            <div role="button" tabindex="0" class="ibp-command legal-notice">Mentions légales</div>
                            <hr><a class="accessibilite" href="accessibilite.html?espace=3">Déclaration d'accessibilité</a>
                            <hr>
                            <div role="button" tabindex="0" class="ibp-command site-map">Plan du site</div>
                            <hr>
                        </div>
                        <div role="button" tabindex="0" class="host-france-container ibp-command"
                            onclick="window.open ('https://www.index-education.com/redirect.php?produit=pn&amp;page=InfosHeb&amp;version=2023.0.2.7&amp;distrib=FR&amp;lg=fr&amp;flag=Espace_Eleve');"
                            onkeyup="if(GNavigateur.isToucheSelection())window.open ('https://www.index-education.com/redirect.php?produit=pn&amp;page=InfosHeb&amp;version=2023.0.2.7&amp;distrib=FR&amp;lg=fr&amp;flag=Espace_Eleve');">
                            <span class="host-text">Toutes vos données sont hébergées en France</span><span
                                class="certif-27001">Certifié ISO 27001</span>
                            <hr><span class="logo-index-inverse" aria-hidden="true"></span>
                            <div class="flex-contain cols text-start"><span>INDEX ÉDUCATION</span><span>Une marque DOCAPOSTE</span>
                            </div>
                        </div>
                        <div class="knowledge-container">
                            <div role="button" tabindex="0" class="ibp-pill icon_light_bulb" data-avec-ie-hint="true">
                                <div class="kb-conteneur">
                                    <p class="as-title">Tout savoir sur PRONOTE</p>
                                    <p>Tutos vidéo</p>
                                </div>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
        </div>
        <a href="https://www.index-education.com/redirect.php?distrib=FR" target="_blank" style="display:none">PRONOTE 2023.0.2.7 gestion de vie scolaire, notes, compétences, absences/retards/dispenses, incidents/punitions/sanctions,stages... INDEX ÉDUCATION</a>
    </body>
</html>