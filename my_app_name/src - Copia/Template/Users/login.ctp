<?php
echo $this->Flash->render('Auth');
?>
<h1> Acesso ao sistema</h1>

<?php
 echo $this->Form->create();
echo $this->Form->input('username');
echo $this->Form->input('password');
echo $this->Form->button('acessar');
echo $this->Form->end();


?>