
<?php

class Kalorientabelle
{

    public function insertJavaScript()
    {
        echo "<script src='" . plugin_dir_url(__FILE__) . "script.js'></script>";
    }

    public function insertForm()
    {
        $this->insertJavaScript();

        echo '<form onsubmit="return formHandler(event)" id="kalorentabelleForm1">';
        echo '<input type="text" name="textInput" id="kalorientabelleTextinput1" />';
        echo '<br \>';
        echo '<br \>';
        echo '<input type="submit" value="Details anzeigen" />';
        echo '</form>';
        echo '<div class="main-content"></div>';
    }

    public function showKalorientabelleForAdmins()
    {
        echo "Kalorientabelle for Admins <br \>";
    }

    public function showKalorientabelleForUsers()
    {
        echo "Kalorientabelle for Users <br \>";

    }

}
