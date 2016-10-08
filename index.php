<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=ISO-8859-1" />
</head>

<body>
<style>
    body
    {
        background-image:url(images/fond.jpg);
        background-origin:content-box;
        font-family: Calibri;
    }
    .table {
        margin-left:auto;
        margin-right:auto;
        text-align:center;
        width:90%;
        margin-top: 100px;
        background-color:white;
        opacity:0.8;
        border-radius:30px;
        border-collapse: separate;
        border-spacing: 5px 15px; /* Nombre de pixels d'espace horizontal (5px), vertical (8px) */
    }
    .table td {
        text-align:center;
    }
    .inputT {
        border:1px solid black;
        border-radius:5px;
        background-color:#333;
        color:#FFF;
        padding-left:5px;
        padding-right:5px;
    }
    .inputT:hover {
        background-color:#444;
    }
    h1 {
        font-size: 72px;
        color:#00FF33;
    }
</style>
<?php
if(isset($_GET['prenom'], $_GET['nom'])) {
    ?>
    <table class="table" align="center" style="text-align:center; margin-top:200px; margin-bottom:auto; opacity:1; width:50%;" width="100%">
        <tr>
            <td><img src="image.php?prenom=<?php echo $_GET['prenom']; ?>&nom=<?php echo $_GET['nom']; ?>&classe=<?php echo $_GET['classe']; ?>&cote=<?php echo $_GET['cote']; ?>&sens=<?php echo $_GET['sens']; ?>" /></td>
        </tr>
    </table>
    <?php
}
else {
    ?>
    <center>
        <h1>Bulle Generator</h1>
    </center>
    <div align="center">
        <form action="index.php" method="get">
            <table class="table">
                <tr>
                    <td colspan="2"><strong>Prenom :</strong></td>
                    <td colspan="2"><input type="text" name="prenom" class="inputT" size="50"/></td>
                </tr>
                <tr>
                    <td colspan="2" width="50%"><strong>Nom : </strong></td>
                    <td colspan="2" width="50%"><input type="text" name="nom" class="inputT" size="50"/></td>
                </tr>
                <tr>
                    <td colspan="2"><strong>Classe (facultatif) : </strong></td>
                    <td colspan="2"><input type="text" name="classe" class="inputT" size="50"/></td>
                </tr>
                <tr>
                    <td colspan="2"><strong>Police de caractère</strong></td>
                    <td colspan="2">
                        <?php
                        $dir = realpath('./').'/fonts';
                        echo $dir.'<br />';

                        echo '<select name="font">';
                        $dh = opendir($dir);
                        while (($file = readdir($dh)) !== false) {
                            if (is_dir($file) && $file != '.' && $file != '..')
                                echo '<option value="'.$file.'">'.$file.'</option>'."\n";
                        }
                        closedir($dh);
                        echo '</select>';
                        ?>
                    </td>
                </tr>
                <tr>
                    <td colspan="2"><strong>Cot&eacute; de la bulle :</strong></td>
                    <td colspan="2"><strong>Sens de la bulle</strong></td>
                </tr>
                <tr>
                    <td width="25%"><input type="radio" name="cote" value="g" checked="checked"/></td>
                    <td width="25%">Gauche</td>
                    <td width="25%"><input type="radio" name="sens" value="h" checked="checked"/></td>
                    <td width="25%">Haut</td>
                </tr>
                <tr>
                    <td><input type="radio" name="cote" value="d"/></td>
                    <td>Droite</td>
                    <td><input type="radio" name="sens" value="b"/></td>
                    <td>Bas</td>
                </tr>
                <tr>
                    <td colspan="4"><input type="submit" class="inputT" value="                 Generer la bulle                 "/></td>
                </tr>
            </table>
        </form>
        <p align="right" style="font-size:12px; margin-right:100px;">Par Thibault Piana</p>
    </div>
<?php } ?>
</body>
</html>
