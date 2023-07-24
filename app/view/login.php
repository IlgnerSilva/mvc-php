<?php $this->layout('layout/template') ?>

<form method="post">
    <div id="error">
        <?php 
            echo CCGetSession("msgError"); 
            echo CCGetSession("msgSucesso");
            unset($_SESSION["msgError"]); 
            unset($_SESSION["msgSucesso"]); 
        ?>
    </div> 
    <input type="email" name="email" id="" placeholder="email">
    <input type="password" name="password" id="" placeholder="password">
    <button>enviar</button>
</form>
