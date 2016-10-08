<?php
header ("Content-type: image/png");  // On dit que l'on va crée un png

// putenv('GDFONTPATH=' . realpath('.'));
$repFont = 'fonts/';
$repImg = "images/";
$name = "bulle";

// Recupération des variables
$font = $_POST['police'];
$font = $repFont.$font.'.ttf';

$prenom = ucfirst($_POST['prenom']);
$nom = ucfirst($_POST['nom']);

$classe = $_POST['classe'];

$cote = $_POST['cote'];
$sens = $_POST['sens'];

// Code //
$longueur_prenom = strlen($prenom);
$longueur_nom = strlen($nom);

switch($longueur_prenom)
{
    case ($longueur_prenom <= 7):
        $size_font_prenom = 31;
        break;

    case '8':
        $size_font_prenom = 30;
        break;

    case (($longueur_prenom >= 9) && ($longueur_prenom <= 11)):
        $size_font_prenom = 28;
        break;

    case ($longueur_prenom >= 12):
        $size_font_prenom = 25;
        break;
}
switch($longueur_nom)
{
    case ($longueur_nom <= 13):
        $size_font_nom = 24;
        break;

    case ($longueur_nom >= 14):
        $size_font_nom = 21;
        break;
}
switch($sens)
{
    case 'h':
        if(!empty($classe))
        {
            $y_prenom = 81;
            $y_nom = 128;
            $y_classe = 185;
        }
        else
        {
            $y_prenom = 105;
            $y_nom = 174;
        }
        $name = $name."h";
        break;

    case 'b':
        if(!empty($classe))
        {
            $y_prenom = 131;
            $y_nom = 178;
            $y_classe = 235;
        }
        else
        {
            $y_prenom = 155;
            $y_nom = 224;
        }
        $name = $name."b";
        break;
}
switch($cote)
{
    case 'g':
        $name = $name."g";
        break;
    case 'd':
        $name = $name."d";
        break;
}

$img = imagecreatefrompng($repImg.$name.".png");

// Déclaration des couleurs
$blanc = imagecolorallocate($img, 255, 255, 255);
// ------------------------------------ //
$taille_prenom = imageftbbox($size_font_prenom, 0, $font, $prenom); // Retourne un array
$taille_nom = imageftbbox($size_font_nom, 0, $font, $nom); // Retourne un array

if(!empty($classe))
    $taille_classe = imageftbbox(20, 0, $font, $classe); // Retourne un array

$infos_prenom['largeur'] = $taille_prenom[4];
$infos_nom['largeur'] = $taille_nom[4];
$infos_image['largeur'] = imagesx($img);
if(!empty($classe))
    $infos_classe['largeur'] = $taille_classe[4];
// ----------------------------------- //

$x_prenom = ($infos_image['largeur'] - $infos_prenom['largeur']) / 2;
$x_nom = ($infos_image['largeur'] - $infos_nom['largeur']) / 2;

if(!empty($classe))
    $x_classe = ($infos_image['largeur'] - $infos_classe['largeur']) / 2;

if(empty($classe))
{
    imagettftext($img, $size_font_prenom, 0, $x_prenom, $y_prenom, $blanc, $font, $prenom);
    imagettftext($img, $size_font_nom, 0, $x_nom, $y_nom, $blanc, $font, $nom);
}
else
{
    imagettftext($img, $size_font_prenom, 0, $x_prenom, $y_prenom, $blanc, 'fonts/edosz.ttf', $font);
    imagettftext($img, $size_font_nom, 0, $x_nom, $y_nom, $blanc, 'fonts/edosz.ttf', $prenom);
    imagettftext($img, 20, 0, $x_classe, $y_classe, $blanc, $font, $classe);
}

imagealphablending($img, false);
imagesavealpha($img, true);

// Affichage
imagepng($img);
imagedestroy($img);
?>