<?php
session_start();
if(!isset($_SESSION['id'])){
    $location = str_replace("/pronote/", "", $_SERVER['SCRIPT_NAME']);
    $link = "/pronote/connexion?redirect=" . $location;
    header("Location: " . $link);
    exit();
}
$bdd = new PDO(
	'mysql:host=566pq.myd.infomaniak.com;dbname=566pq_famille;charset=utf8',
	'566pq_Marvideo',
	'Framboise1'
);

$id = $_SESSION['id'];
$eleve = $bdd->query("SELECT * FROM eleve WHERE id='$id'");
$eleve = $eleve->fetch();
$nom = $eleve['nom'];
$prenom = $eleve['prenom'];
$class = $eleve['classe'];
$img = $eleve['photo'];

$homeworks = $bdd->query("SELECT * FROM homeworks WHERE class='$class'");

$edt = file_get_contents("edt.json");
$edt = json_decode($edt); 

?>
<html>
    <head>
        <base target="_blank">
        <link rel="schema.DC" href="http://purl.org/dc/elements/1.1/">
        <title>Page d'accueil - Espace Élèves - PRONOTE 2023.0.2.7 - COLLEGE CLEMENCEAU</title>
        <meta name="DC.title" content="PRONOTE - MarvideoCOLLEGE">
        <meta name="description" content="PRONOTE Espace Élèves - MarvideoCOLLEGE - DISCORD (69) - gestion des notes, absences, punitions, cahier de textes pour les établissements scolaires.">
        <meta name="DC.description" content="PRONOTE Espace Élèves - MarvideoCOLLEGE - DISCORD (69) - gestion des notes, absences, punitions, cahier de textes pour les établissements scolaires.">
        <meta name="DC.creator" content="MarvideoCOLLEGE">
        <meta name="DC.publisher" content="PRONOTE">
        <meta name="DC.coverage" content="CHOLET (049)">
        <meta name="geo.placename" content="CHOLET (049)">
        <meta name="robots" content="index">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
        <link rel="icon" type="image/png" href="img/favicon-16x16.png" sizes="32x32">
        <link rel="icon" type="image/png" href="img/favicon-16x16.png" sizes="16x16">
        <link rel="manifest" href="img/manifest.json">
        <link rel="mask-icon" sizes="any" href="img/favicon.svg" color="#22874b">
        <meta name="apple-mobile-web-app-title" content="PRONOTE">
        <meta name="application-name" content="PRONOTE">
        <meta name="theme-color" content="#22874b">
        <script src="js/hover.js"></script>
        <script src="js/edt.js"></script>
        <link rel="stylesheet" href="css/test.css">
    </head>
    <body id="id_body" class="EspaceIndex">
        <div id="id_28_zoneImpression" class="Masquer_Screen FondBlanc full-width">L'impression n'est pas possible ici mais vous pouvez utiliser le bouton PDF depuis votre Espace s'il est disponible pour l'affichage souhaité.</div>
        <div id="id_1_bloquer" class="BloquerInterface NePasImprimer SansSelectionTexte blocage-patience" style="display: none;"></div>
        <noscript style="position: absolute; top: 100px" class="Texte12 Gras Espace">Javascript non activé. Veuillez le réactiver.</noscript>
        <div id="zone_fenetre" class="NePasImprimer ThemePronote">
            <div class="zone-fenetre" id="id_8" style="display:none;z-index:2000"></div>
            <div class="zone-fenetre" id="GInterface.Instances[2].Instances[0].Instances[0]" style="display:none;z-index:1100">
                <div id="GInterface.Instances[2].Instances[0].Instances[0]_Contenu"></div>
            </div>
            <div class="zone-fenetre" id="IE.Identite.collection.g3" style="display:none;z-index:1100">
                <span class="wai_hidden" tabindex="0" onfocus="IE.Identite.collection.g3.focusSurPremierElement();"></span>
                <div id="IE.Identite.collection.g3_Fenetre" aria-labelledby="IE.Identite.collection.g3_Titre" class="ObjetFenetre_Espace ObjetFenetre_DetailAgenda_racine" tabindex="-1" role="dialog">
                    <div id="IE.Identite.collection.g3_FenetreContenu" class="Fenetre_Cadre" style="box-sizing:border-box; width: 100px;min-height: 100px;box-shadow: 0px 9px 18px 0px rgba(50, 50, 50, 0.35); background-color:white;">
                        <div class="Fenetre_Titre NePasImprimer">
                            <h3 id="IE.Identite.collection.g3_Titre" class="ZoneDeplacementFenetre ie-draggable-handle" tabindex="0"></h3>
                            <div class="cta-conteneur">
                                <i role="button" tabindex="0" class="btnImageIcon as-button icon_fermeture_widget btnImage" aria-label="Fermer" title="Fermer"></i>
                            </div>
                        </div>
                        <div id="IE.Identite.collection.g3_Res" class="Fenetre_Espace">
                            <div id="IE.Identite.collection.g3_Contenu" class="Fenetre_Contenu">
                                <section class="FenetreDetailAgenda">
                                    <main>
                                        <section>
                                            <div class="capitalize ie-sous-titre"></div>
                                        </section>
                                    </main>
                                </section>
                            </div>
                        </div>
                        <div class="NePasImprimer">
                            <div class="zone-bas">
                                <div class="zone-bas-gauche Fenetre_Bas">
                                    <section class="compose-bas"></section>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <span class="wai_hidden" tabindex="0" onfocus="IE.Identite.collection.g3.focusSurPremierElement();"></span>
            </div>
        </div>
        <div id="div" data-role="page" class="NePasImprimer ThemePronote">
            <div id="GInterface_T" style="position:relative; background-color:#ffffff;" class="interface_affV no-footer">
                <div class="AvecMenuContextuel main-header" id="GInterface.Instances[0]">
                    <div class="objetbandeauentete_global">
                        <div id="GInterface.Instances[0].Instances[0]">
                            <div class="ObjetBandeauEspace" role="banner" aria-label="Espace Élèves - <?= $nom ?> <?= $prenom ?> (<?= $class ?>) Pour utiliser les raccourcis clavier, appuyez simultanément sur les touches Alt + Maj + un des chiffres de la partie supérieure du clavier (pas le pavé numérique). Menu: Alt + Maj + 0, Contenu: Alt + Maj + 1, Déconnexion: Alt + Maj + 9" tabindex="-1" style="justify-content: center;">
                                <a class="evitement" tabindex="0">Accéder au menu</a><a class="evitement" tabindex="0">Accéder au contenu</a>
                                <a class="evitement" tabindex="0" href="accessibilite.html?espace=3">Déclaration d'accessibilité</a>
                                <a class="evitement" tabindex="0">Plan du site</a>
                                <div class="ibe_gauche"></div>
                                <div class="ibe_centre" style="overflow: hidden; max-width: 1749px;">
                                    <?php
                                        if($img == "none"){
                                            $style = "";
                                            $style2 = "display:none";
                                        } else {
                                            $style = "display:none";
                                            $style2 = "";
                                        }
                                    ?>
                                    <div class="ibe_util_photo ibe_actif" role="button" aria-haspopup="true" aria-label="Les informations liées à mon compte" aria-hidden="true">
                                        <img src="img/eleve/<?= $img ?>" style="width:100%; <?= $style2 ?>" alt="Photo de Espace Élèves - <?= $nom ?> <?= $prenom ?> (<?= $class ?>)">
                                        <div class="ibe_util_photo_i" style="<?= $style ?>">
                                            <i class="icon_utilisateur"></i>
                                        </div>
                                    </div>
                                    <div class="ibe_etab_util">
                                        <div class="AvecMain ibe_etab_cont">
                                            <div class="ibe_etab">
                                                <i role="button" tabindex="0" class="icon_uniF2C3 btnImageIcon InlineBlock EspaceDroit AvecMain btnImage" aria-label="Contacter l'établissement" title="Contacter l'établissement"></i>COLLEGE CLEMENCEAU
                                            </div>
                                        </div>
                                        <!--ie-if-->
                                        <div class="ibe_util">
                                            <div class="ibe_util_texte ibe_actif" tabindex="0" role="button" aria-haspopup="true" aria-label="Les informations liées à mon compte">Espace Élèves - <?= $nom ?> <?= $prenom ?> (<?= $class ?>)</div>
                                            <div class="ibe_iconebtn ibe_actif" tabindex="0" role="button" aria-label="QR code de l'application">
                                                <i class="icon_qr_code colorFoncee" title="QR code de l'application" aria-label="QR code de l'application"></i>
                                            </div>
                                            <div class="ibe_iconebtn ibe_actif" tabindex="0" role="button" aria-label="Se déconnecter">
                                                <i class="" title="Se déconnecter" aria-label="Se déconnecter">
                                                    <a href="https://marvideo.fr/pronote/deconnexion.php" target="_self" style="text-decoration:none;" class="icon_off colorFoncee"></a>
                                                </i>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="ibe_droite">
                                    <div class="ibe_logo">
                                        <a href="https://www.index-education.com/redirect.php?produit=pn&amp;page=LogoPronote&amp;version=2023.0.2.7&amp;distrib=FR&amp;lg=fr&amp;flag=Espace_Eleve" target="_blank" aria-label="Aller sur le site de Pronote" title="Aller sur le site de Pronote">
                                            <span class="ibe_logo_image Image_Logo_PronoteBarreHaut"></span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="GInterface.Instances[0]_WrapperSecondMenu" style="display:none;"></div>
                        <div class="objetBandeauEntete_menu" role="navigation">
                            <i class="icon_reorder navbar-toggler"></i>
                            <h2 class="fil-ariane"></h2>
                            <div class="menu-container eleve" role="menubar" aria-hidden="false">
                                <div id="GInterface.Instances[0].Instances[2]" class="objetBandeauEntete_membres">
                                    <ul id="GInterface.Instances[0].Instances[2]_Wrapper" class="menu-principal_niveau0" role="group"></ul>
                                </div>
                                <div class="home" id="GInterface.Instances[0].Instances[3]">
                                    <ul id="GInterface.Instances[0].Instances[3]_Wrapper" class="menu-principal_niveau0" role="group">
                                        <li class="item-menu_niveau0 item-selected" tabindex="0" role="button">
                                            <div id="GInterface.Instances[0].Instances[3]_Combo0" aria-atomic="true"  class="label-menu_niveau0">
                                                <i title="Accueil" aria-label="Accueil" class="bt-home icon_home"></i>
                                                <span class="label-home">Accueil</span>
                                            </div>
                                            <div id="GInterface.Instances[0].Instances[3]_Liste_niveau0" class="submenu-wrapper" style="display:none;">
                                                <ul role="menu" class="menu-principal_niveau1">
                                                    <li role="menuitem" aria-label="Page d'accueil" tabindex="-1" data-genre="7" class="item-menu_niveau1 menuitem-niveau has-submenu is-member-accueil">
                                                        <div class="label-menu-container">
                                                            <div role="presentation" class="label-submenu"> Page d'accueil</div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="onglets-wrapper" id="GInterface.Instances[0].Instances[1]">
                                    <ul id="GInterface.Instances[0].Instances[1]_Wrapper" class="menu-principal_niveau0" role="group">
                                        <li class="item-menu_niveau0 is-collapse" id="donnees" tabindex="0" role="menuitem" aria-haspopup="true">
                                            <div id="GInterface.Instances[0].Instances[1]_Combo0" aria-atomic="true"  class="label-menu_niveau0" onmouseover="hover(this)" onmouseleave="hover(this)">Mes données</div>
                                            <div id="GInterface.Instances[0].Instances[1]_Liste_niveau0" class="submenu-wrapper" style="height: 5.3rem;">
                                                <ul role="menu" class="menu-principal_niveau1">
                                                    <li role="menuitem" aria-label="Les informations liées à mon compte" tabindex="0" data-genre="49" class="item-menu_niveau1 menuitem-niveau" onmouseover="hoverchildon('donnees', this)" onmouseout="hoverchildoff('donnees', this)">
                                                        <div class="label-menu-container">
                                                            <div class="label-submenu"> Compte</div>
                                                        </div>
                                                    </li>
                                                    <li role="menuitem" aria-label="Échanges de documents avec l'établissement" tabindex="0" data-genre="148" class="item-menu_niveau1 menuitem-niveau" onmouseover="hoverchildon('donnees', this)" onmouseout="hoverchildoff('donnees', this)">
                                                        <div class="label-menu-container">
                                                            <div class="label-submenu"> Documents</div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="item-menu_niveau0 is-collapse" id="cdt" tabindex="0" role="menuitem" aria-haspopup="true">
                                            <div id="GInterface.Instances[0].Instances[1]_Combo1" aria-atomic="true"  class="label-menu_niveau0" onmouseover="hover(this)" onmouseleave="hover(this)">Cahier<br>de textes</div>
                                            <div id="GInterface.Instances[0].Instances[1]_Liste_niveau1" class="submenu-wrapper" style="height: 8rem;">
                                                <ul role="menu" class="menu-principal_niveau1">
                                                    <li role="menuitem" aria-label="Contenu et ressources pédagogiques" tabindex="-1" data-genre="89" class="item-menu_niveau1 menuitem-niveau" onmouseover="hoverchildon('cdt', this)" onmouseout="hoverchildoff('cdt', this)">
                                                        <div class="label-menu-container">
                                                            <div class="label-submenu"> Contenu et ressources</div>
                                                        </div>
                                                    </li>
                                                    <li role="menuitem" aria-label="Travail à faire à la maison" tabindex="-1" data-genre="88" class="item-menu_niveau1 menuitem-niveau" onmouseover="hoverchildon('cdt', this)" onmouseout="hoverchildoff('cdt', this)">
                                                        <div class="label-menu-container">
                                                            <div class="label-submenu"> Travail à faire</div>
                                                        </div>
                                                    </li>
                                                    <li role="menuitem" aria-label="Forums pédagogiques" tabindex="-1" data-genre="275" class="item-menu_niveau1 menuitem-niveau" onmouseover="hoverchildon('cdt', this)" onmouseout="hoverchildoff('cdt', this)">
                                                        <div class="label-menu-container">
                                                            <div class="label-submenu"> Forums pédagogiques</div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="item-menu_niveau0 is-collapse" id="note" tabindex="0" role="menuitem" aria-haspopup="true">
                                            <div id="GInterface.Instances[0].Instances[1]_Combo2" aria-atomic="true"  class="label-menu_niveau0" onmouseover="hover(this)" onmouseleave="hover(this)">Notes</div>
                                            <div id="GInterface.Instances[0].Instances[1]_Liste_niveau2" class="submenu-wrapper" style="height: 13.3rem;">
                                                <ul role="menu" class="menu-principal_niveau1">
                                                    <li role="menuitem" aria-label="Détail de mes notes" tabindex="-1" data-genre="198" class="item-menu_niveau1 menuitem-niveau" onmouseover="hoverchildon('note', this)" onmouseout="hoverchildoff('note', this)">
                                                        <div class="label-menu-container">
                                                            <div class="label-submenu"> Mes notes</div>
                                                        </div>
                                                    </li>
                                                    <li role="menuitem" aria-label="Relevé  de notes" tabindex="-1" data-genre="12" class="item-menu_niveau1 menuitem-niveau" onmouseover="hoverchildon('note', this)" onmouseout="hoverchildoff('note', this)">
                                                        <div class="label-menu-container">
                                                            <div class="label-submenu"> Relevé</div>
                                                        </div>
                                                    </li>
                                                    <li role="menuitem" aria-label="Bulletins" tabindex="-1" data-genre="217" class="item-menu_niveau1 menuitem-niveau has-submenu" aria-haspopup="true" onmouseover="hoverchildon('note', this)" onmouseout="hoverchildoff('note', this)">
                                                        <div class="label-menu-container">
                                                            <div class="label-submenu"> Bulletins</div>
                                                        </div>
                                                        <ul role="menu" class="menu-principal_niveau2">
                                                            <li role="menuitem" aria-label="Mon bulletin de notes" tabindex="-1" data-genre="13" class="item-menu_niveau2 menuitem-niveau" onmouseover="hoverchildon('note', this)" onmouseout="hoverchildoff('note', this)">
                                                                <div class="label-menu-container">
                                                                    <div class="label-submenu"> Mon bulletin de notes</div>
                                                                </div>
                                                            </li>
                                                            <li role="menuitem" aria-label="Bulletin de ma classe" tabindex="-1" data-genre="41" class="item-menu_niveau2 menuitem-niveau" onmouseover="hoverchildon('note', this)" onmouseout="hoverchildoff('note', this)">
                                                                <div class="label-menu-container">
                                                                    <div class="label-submenu"> Bulletin de ma classe</div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li role="menuitem" aria-label="Graphes" tabindex="-1" data-genre="38" class="item-menu_niveau1 menuitem-niveau has-submenu" aria-haspopup="true" onmouseover="hoverchildon('note', this)" onmouseout="hoverchildoff('note', this)">
                                                        <div class="label-menu-container">
                                                            <div class="label-submenu"> Graphes</div>
                                                        </div>
                                                        <ul role="menu" class="menu-principal_niveau2">
                                                            <li role="menuitem" aria-label="Mon profil" tabindex="-1" data-genre="111" class="item-menu_niveau2 menuitem-niveau" onmouseover="hoverchildon('note', this)" onmouseout="hoverchildoff('note', this)">
                                                                <div class="label-menu-container">
                                                                    <div class="label-submenu"> Mon profil</div>
                                                                </div>
                                                            </li>
                                                            <li role="menuitem" aria-label="Mon évolution annuelle" tabindex="-1" data-genre="112" class="item-menu_niveau2 menuitem-niveau" onmouseover="hoverchildon('note', this)" onmouseout="hoverchildoff('note', this)">
                                                                <div class="label-menu-container">
                                                                    <div class="label-submenu"> Mon évolution annuelle</div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li role="menuitem" aria-label="Anciens bulletins" tabindex="-1" data-genre="227" class="item-menu_niveau1 menuitem-niveau" onmouseover="hoverchildon('note', this)" onmouseout="hoverchildoff('note', this)">
                                                        <div class="label-menu-container">
                                                            <div class="label-submenu"> Anciens bulletins</div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="item-menu_niveau0 is-collapse" id="compet" tabindex="0" role="menuitem" aria-haspopup="true">
                                            <div id="GInterface.Instances[0].Instances[1]_Combo3" aria-atomic="true"  class="label-menu_niveau0" onmouseover="hover(this)" onmouseleave="hover(this)">Compétences</div>
                                            <div id="GInterface.Instances[0].Instances[1]_Liste_niveau3" class="submenu-wrapper" style="height: 16rem;">
                                                <ul role="menu" class="menu-principal_niveau1">
                                                    <li role="menuitem" aria-label="Evaluations" tabindex="-1" data-genre="204" class="item-menu_niveau1 menuitem-niveau has-submenu" aria-haspopup="true" onmouseover="hoverchildon('compet', this)" onmouseout="hoverchildoff('compet', this)">
                                                        <div class="label-menu-container">
                                                            <div class="label-submenu"> Evaluations</div>
                                                        </div>
                                                        <ul role="menu" class="menu-principal_niveau2">
                                                            <li role="menuitem" aria-label="Détail de mes évaluations" tabindex="-1" data-genre="201" class="item-menu_niveau2 menuitem-niveau" onmouseover="hoverchildon('compet', this)" onmouseout="hoverchildoff('compet', this)">
                                                                <div class="label-menu-container">
                                                                    <div class="label-submenu"> Mes évaluations</div>
                                                                </div>
                                                            </li>
                                                            <li role="menuitem" aria-label="Difficultés et points d'appui" tabindex="-1" data-genre="277" class="item-menu_niveau2 menuitem-niveau" onmouseover="hoverchildon('compet', this)" onmouseout="hoverchildoff('compet', this)">
                                                                <div class="label-menu-container">
                                                                    <div class="label-submenu"> Difficultés et points d'appui</div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li role="menuitem" aria-label="Bilan périodique" tabindex="-1" data-genre="218" class="item-menu_niveau1 menuitem-niveau has-submenu" aria-haspopup="true" onmouseover="hoverchildon('compet', this)" onmouseout="hoverchildoff('compet', this)">
                                                        <div class="label-menu-container">
                                                            <div class="label-submenu"> Bilan périodique</div>
                                                        </div>
                                                        <ul role="menu" class="menu-principal_niveau2">
                                                            <li role="menuitem" aria-label="Mon bilan périodique" tabindex="-1" data-genre="100" class="item-menu_niveau2 menuitem-niveau" onmouseover="hoverchildon('compet', this)" onmouseout="hoverchildoff('compet', this)">
                                                                <div class="label-menu-container">
                                                                    <div class="label-submenu"> Mon bilan périodique</div>
                                                                </div>
                                                            </li>
                                                            <li role="menuitem" aria-label="Bilan périodique de ma classe" tabindex="-1" data-genre="219" class="item-menu_niveau2 menuitem-niveau" onmouseover="hoverchildon('compet', this)" onmouseout="hoverchildoff('compet', this)">
                                                                <div class="label-menu-container">
                                                                    <div class="label-submenu"> Bilan périodique de ma classe</div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li role="menuitem" aria-label="Bilan par domaine" tabindex="-1" data-genre="237" class="item-menu_niveau1 menuitem-niveau has-submenu" aria-haspopup="true" onmouseover="hoverchildon('compet', this)" onmouseout="hoverchildoff('compet', this)">
                                                        <div class="label-menu-container">
                                                            <div class="label-submenu"> Bilan par domaine</div>
                                                        </div>
                                                        <ul role="menu" class="menu-principal_niveau2">
                                                            <li role="menuitem" aria-label="Évaluations par compétence" tabindex="-1" data-genre="45" class="item-menu_niveau2 menuitem-niveau" onmouseover="hoverchildon('compet', this)" onmouseout="hoverchildoff('compet', this)">
                                                                <div class="label-menu-container">
                                                                    <div class="label-submenu"> Évaluations par compétence</div>
                                                                </div>
                                                            </li>
                                                            <li role="menuitem" aria-label="Niveaux de maitrise par matière" tabindex="-1" data-genre="216" class="item-menu_niveau2 menuitem-niveau" onmouseover="hoverchildon('compet', this)" onmouseout="hoverchildoff('compet', this)">
                                                                <div class="label-menu-container">
                                                                    <div class="label-submenu"> Niveaux de maitrise par matière</div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                    <li role="menuitem" aria-label="Bilan de fin de cycle" tabindex="-1" data-genre="178" class="item-menu_niveau1 menuitem-niveau" onmouseover="hoverchildon('compet', this)" onmouseout="hoverchildoff('compet', this)">
                                                        <div class="label-menu-container">
                                                            <div class="label-submenu"> Bilan de fin de cycle</div>
                                                        </div>
                                                    </li>
                                                    <li role="menuitem" aria-label="Livret de compétences numériques" tabindex="-1" data-genre="249" class="item-menu_niveau1 menuitem-niveau" onmouseover="hoverchildon('compet', this)" onmouseout="hoverchildoff('compet', this)">
                                                        <div class="label-menu-container">
                                                            <div class="label-submenu"> Livret de compétences numériques</div>
                                                        </div>
                                                    </li>
                                                    <li role="menuitem" aria-label="Anciens bilans" tabindex="-1" data-genre="228" class="item-menu_niveau1 menuitem-niveau" onmouseover="hoverchildon('compet', this)" onmouseout="hoverchildoff('compet', this)">
                                                        <div class="label-menu-container">
                                                            <div class="label-submenu"> Anciens bilans</div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="item-menu_niveau0 is-collapse" id="result" tabindex="0" role="menuitem" aria-haspopup="true">
                                            <div id="GInterface.Instances[0].Instances[1]_Combo4" aria-atomic="true"  class="label-menu_niveau0" onmouseover="hover(this)" onmouseleave="hover(this)">Résultats</div>
                                            <div id="GInterface.Instances[0].Instances[1]_Liste_niveau4" class="submenu-wrapper" style="height: 8rem;">
                                                <ul role="menu" class="menu-principal_niveau1">
                                                    <li role="menuitem" aria-label="Livret scolaire" tabindex="-1" data-genre="83" class="item-menu_niveau1 menuitem-niveau" onmouseover="hoverchildon('result', this)" onmouseout="hoverchildoff('result', this)">
                                                        <div class="label-menu-container">
                                                            <div class="label-submenu"> Livret scolaire</div>
                                                        </div>
                                                    </li>
                                                    <li role="menuitem" aria-label="Suivi pluriannuel" tabindex="-1" data-genre="44" class="item-menu_niveau1 menuitem-niveau" onmouseover="hoverchildon('result', this)" onmouseout="hoverchildoff('result', this)">
                                                        <div class="label-menu-container">
                                                            <div class="label-submenu"> Pluriannuel</div>
                                                        </div>
                                                    </li>
                                                    <li role="menuitem" aria-label="Fiche brevet" tabindex="-1" data-genre="34" class="item-menu_niveau1 menuitem-niveau" onmouseover="hoverchildon('result', this)" onmouseout="hoverchildoff('result', this)">
                                                        <div class="label-menu-container">
                                                            <div class="label-submenu"> Brevet</div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="item-menu_niveau0 is-collapse" id="vie" tabindex="0" role="menuitem" aria-haspopup="true">
                                            <div id="GInterface.Instances[0].Instances[1]_Combo5" aria-atomic="true"  class="label-menu_niveau0" onmouseover="hover(this)" onmouseleave="hover(this)">Vie<br>scolaire</div>
                                            <div id="GInterface.Instances[0].Instances[1]_Liste_niveau5" class="submenu-wrapper" style="height: 5.3rem;">
                                                <ul role="menu" class="menu-principal_niveau1">
                                                    <li role="menuitem" aria-label="Mon emploi du temps" tabindex="-1" data-genre="16" class="item-menu_niveau1 menuitem-niveau" onmouseover="hoverchildon('vie', this)" onmouseout="hoverchildoff('vie', this)">
                                                        <div class="label-menu-container">
                                                            <div class="label-submenu"> Emploi du temps</div>
                                                        </div>
                                                    </li>
                                                    <li role="menuitem" aria-label="Récapitulatif des évènements de la vie scolaire" tabindex="-1" data-genre="19" class="item-menu_niveau1 menuitem-niveau" onmouseover="hoverchildon('vie', this)" onmouseout="hoverchildoff('vie', this)">
                                                        <div class="label-menu-container">
                                                            <div class="label-submenu"> Récapitulatif</div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="item-menu_niveau0 is-collapse" id="com" tabindex="0" role="menuitem" aria-haspopup="true">
                                            <div id="GInterface.Instances[0].Instances[1]_Combo6" aria-atomic="true"  class="label-menu_niveau0" onmouseover="hover(this)" onmouseleave="hover(this)">Communication</div>
                                            <div id="GInterface.Instances[0].Instances[1]_Liste_niveau6" class="submenu-wrapper" style="height: 13.3rem;">
                                                <ul role="menu" class="menu-principal_niveau1">
                                                    <li role="menuitem" aria-label="Informations &amp; sondages" tabindex="-1" data-genre="8" class="item-menu_niveau1 menuitem-niveau" onmouseover="hoverchildon('com', this)" onmouseout="hoverchildoff('com', this)">
                                                        <div class="label-menu-container">
                                                            <div class="label-submenu"> Informations &amp; sondages</div>
                                                        </div>
                                                    </li>
                                                    <li role="menuitem" aria-label="Mes discussions" tabindex="-1" data-genre="131" class="item-menu_niveau1 menuitem-niveau" onmouseover="hoverchildon('com', this)" onmouseout="hoverchildoff('com', this)">
                                                        <div class="label-menu-container">
                                                            <div class="label-submenu"> Discussions</div>
                                                        </div>
                                                    </li>
                                                    <li role="menuitem" aria-label="Agenda de l'établissement" tabindex="-1" data-genre="9" class="item-menu_niveau1 menuitem-niveau" onmouseover="hoverchildon('com', this)" onmouseout="hoverchildoff('com', this)">
                                                        <div class="label-menu-container">
                                                            <div class="label-submenu"> Agenda</div>
                                                        </div>
                                                    </li>
                                                    <li role="menuitem" aria-label="Menu de la cantine" tabindex="-1" data-genre="10" class="item-menu_niveau1 menuitem-niveau" onmouseover="hoverchildon('com', this)" onmouseout="hoverchildoff('com', this)">
                                                        <div class="label-menu-container">
                                                            <div class="label-submenu"> Menu</div>
                                                        </div>
                                                    </li>
                                                    <li role="menuitem" aria-label="Calendrier scolaire" tabindex="-1" data-genre="11" class="item-menu_niveau1 menuitem-niveau" onmouseover="hoverchildon('com', this)" onmouseout="hoverchildoff('com', this)">
                                                        <div class="label-menu-container">
                                                            <div class="label-submenu"> Calendrier</div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="objetBandeauEntete_boutons">
                                <span>
                                    <i role="button" tabindex="0" id="GInterface.Instances[0]_btncommunication" class="icon_envoyer btnImageIcon btnImage" aria-label="Communication" title="Communication"></i>
                                </span>
                                <hr class="objetBandeauEntete_sep_boutons">
                                <div id="GInterface.Instances[0].Instances[5]" class="objetBandeauEntete_boutons_ifc">
                                    <div class="ObjetWrapperCentraleNotifications_Espace">
                                        <i role="button" tabindex="0" title="Aucune notification" aria-label="Aucune notification" class="image_centrale_notification btnImageIcon btnImage"></i>
                                    </div>
                                </div>
                                <div id="GInterface.Instances[0].Instances[6]" class="objetBandeauEntete_boutons_ifc">
                                    <div class="ObjetWrapperAideContextuelle_Espace"><i role="button" tabindex="0" title="Accéder à l'aide en ligne" aria-label="Accéder à l'aide en ligne" class="icon_base_connaissance btnImageIcon btnImage"></i>
                                        <div class="bcne_compteur_aide">9</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                        if($_SERVER['SCRIPT_NAME'] == "/pronote/eleve/index.php"){ ?>
                            <div id="GInterface.Instances[0]_secondMenu" class="objetBandeauEntete_secondmenu" role="navigation">
                                <h3 class="fil-ariane"></h3>
                                <div aria-hidden="true" class="secondmenu-container" role="menubar">
                                    <ul role="group" class="menu-principal_niveau1">
                                        <li role="menuitem" aria-label="Page d'accueil" tabindex="-1" data-genre="7" class="item-menu_niveau1 menuitem-niveau has-submenu is-member-accueil selected" aria-current="page">
                                            <div class="label-menu-container">
                                                <div role="presentation" class="label-submenu"> Page d'accueil</div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="objetBandeauEntete_fullsize"><span class="precedenteConnexion">Précédente connexion le samedi 03 février à 13h12</span></div>
                                <div class="menu-commandes" id="GInterface.Instances[0].Instances[4]">
                                    <i role="button" tabindex="0" title="Aucune donnée à valider" aria-label="Aucune donnée à valider" class="icon_disquette_pleine btn-bandeau btnImageDisable btnImage" aria-disabled="true"></i>
                                    <i role="button" tabindex="0" title="Aucun PDF pour cet affichage" aria-label="Aucun PDF pour cet affichage" class="icon_pdf btn-bandeau btnImageDisable btnImage" aria-disabled="true"></i>
                                    <div style="display: none;">
                                        <div class="Texte12 Gras SansMain" style="background-color:#c15353;color:#ffffff;" title="Des opérations doivent être effectuées sur la base de données. Vous êtes temporairement mis en mode consultation.">
                                            <div class="PetitEspace">Consultation&nbsp;temporaire</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="id_6" class="objetBandeauEntete_thirdmenu wai_hidden"  role="navigation">
                                <h1 id="breadcrumbBandeau" class="titre-onglet" tabindex="0" aria-label="Page d'accueil">Page
                                    d'accueil</h1>
                            </div>
                        <?php 
                        } elseif ($_SERVER['SCRIPT_NAME'] == "/pronote/eleve/cdt.php") { ?>
                            <div id="GInterface.Instances[0]_secondMenu" class="objetBandeauEntete_secondmenu" role="navigation">
                                <h3 class="fil-ariane">Contenu et ressources</h3>
                                <div aria-hidden="true" class="secondmenu-container" role="menubar">
                                    <ul role="group" class="menu-principal_niveau1">
                                        <li role="menuitem" aria-label="Contenu et ressources pédagogiques" tabindex="-1" data-genre="89" class="item-menu_niveau1 menuitem-niveau selected" aria-current="page">
                                            <div class="label-menu-container">
                                                <div class="label-submenu"> Contenu et ressources</div>
                                            </div>
                                        </li>
                                        <li role="menuitem" aria-label="Travail à faire à la maison" tabindex="-1" data-genre="88" class="item-menu_niveau1 menuitem-niveau">
                                            <div class="label-menu-container">
                                                <div class="label-submenu"> Travail à faire</div>
                                            </div>
                                        </li>
                                        <li role="menuitem" aria-label="Forums pédagogiques" tabindex="-1" data-genre="275" class="item-menu_niveau1 menuitem-niveau">
                                            <div class="label-menu-container">
                                                <div class="label-submenu"> Forums pédagogiques</div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                                <div class="objetBandeauEntete_fullsize"></div>
                                <div class="menu-commandes" id="GInterface.Instances[0].Instances[4]">
                                    <i role="button" tabindex="0" title="Aucune donnée à valider" aria-label="Aucune donnée à valider" class="icon_disquette_pleine btn-bandeau btnImageDisable btnImage" aria-disabled="true"></i>
                                    <i role="button" tabindex="0" title="Imprimer" aria-label="Imprimer" class="icon_print btn-bandeau btnImage"></i>
                                    <div style="display: none;">
                                        <div class="Texte12 Gras SansMain" style="background-color:#c15353;color:#ffffff;" title="Des opérations doivent être effectuées sur la base de données. Vous êtes temporairement mis en mode consultation.">
                                            <div class="PetitEspace">Consultation&nbsp;temporaire</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        } ?>
                    </div>