<h1> Cadastrar Usuario</h1>


<?php

echo $this->Form->create($users, ['action'=>'salvar']);
echo $this->Form->input('username');
echo $this->Form->input('password');
echo $this->Form->button('cadastrar');
echo $this->Form->end();

?>