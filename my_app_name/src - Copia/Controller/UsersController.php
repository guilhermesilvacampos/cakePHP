<?php
namespace App\Controller;
use Cake\ORM\TableRegistry;
use Cake\Event\Event;

class UsersController extends AppController{




	public function beforeFilter(Event $event){
parent::beforeFilter($event);

	$this->Auth->allow(['adicionar','salvar']);

	}

public function adicionar(){

	$userTable = TableRegistry::get('users');

	$user = $userTable->newEntity();

 $this->set('users',$user);
}


public function salvar(){

	$usersTable = TableRegistry::get('users');

	$user = $usersTable->newEntity($this->request->data());

	if($usersTable->save($user)){
		$this->Flash->set("Usuario Salvo com sucesso :)"); 
	}else{
		$this->Flash->set("Usuario não foi salvo :("); 
		
	}
	$this->redirect('Users/Adicionar');



}

public function login(){

	$userTable = TableRegistry::get('users');

	$user = $userTable->newEntity();

	$this->set('user',$user);

	if($this->request->is('post')){
		$user = $this->Auth->identify();

		if($user){
			$this->Auth->setUser($user);
			return $this->redirect($this->Auth->redirectUrl());
		}else{
			$this->Flash->set('Usuario ou senha invalidos',['element' => 'error']);
		}
	}


}



public function logout(){

return $this->redirect($this->Auth->logout());

}



}

?>