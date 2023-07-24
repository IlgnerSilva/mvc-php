<?php $this->layout('layout/template') ?>

<h1>Register</h1>
<form method="post">
    <div id="error"><?php echo CCGetSession("msgError"); unset($_SESSION["msgError"]) ?></div> 
    <input type="email" name="email" id="" placeholder="email">
    <input type="password" name="password" id="" placeholder="password">
    <button>enviar</button>
</form>
