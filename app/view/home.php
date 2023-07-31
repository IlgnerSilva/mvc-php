<?php $this->layout('layout/template') ?>
<h1>User Profile</h1>
<p>Hello, <?=CCGetUserLogin()," e ", $this->e($year) ?></p>
<p>Hello, <?=CCGetSession("TESTE")?></p>
<a href="/logout">Sair</a>