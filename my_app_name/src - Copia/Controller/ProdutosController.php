<?php
namespace App\Controller;
use Cake\ORM\TableRegistry; 
class ProdutosController extends AppController{

public $paginate = ['limit'=>5];

public function initialize(){
	parent::initialize();

	$this->loadComponent('Paginator');
}

public function index(){

		$produtosTable = TableRegistry::get('Produto');

		$produtos = $produtosTable ->find('all');

 		$this->set('produtos',$this->paginate($produtos));	
}


public function novo(){

		$produtosTable = TableRegistry::get('Produto');

		$produto = $produtosTable->newEntity();

	$this->set('produto',$produto);
}

public function salva(){

	$produtosTable = TableRegistry::get('Produto');



	$produto = $produtosTable->newEntity($this->request->data());


	if(!$produto->errors() && $produtosTable->save($produto)){
		$msg = "Produto Salvo com Sucesso!!!";
	}else{
		$msg = "Erro ao salvar!!";
		var_dump($this->request->data());
		var_dump($produtosTable->save($produto));
		$this->set('produto',$produto);
		$this->render('novo');
	}
$this->set('msg',$msg);

}

public function editar($id){

	$produtosTable = TableRegistry::get('Produto');

	$produto = $produtosTable->get($id);
	$this->set('produto',$produto);

	$this->render('novo');

}

public function apagar($id){
		$produtosTable = TableRegistry::get('Produto');

		$produto = $produtosTable->get($id);

		if($produtosTable->delete($produto)){
		$msg = "Produto Deletado com Sucesso!!!";
		$this->Flash->set($msg,['element'=>'success']);
	}else{
		$msg = "Erro ao deletar!!";
		$this->Flash->set($msg,['element'=>'error']);
	}
$this->redirect('Produtos/index');


}

}

?>