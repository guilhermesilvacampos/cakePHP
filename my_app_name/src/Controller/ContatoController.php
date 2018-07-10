<?php
/**
 * Created by PhpStorm.
 * User: guilherme.s.campos
 * Date: 10/07/2018
 * Time: 07:11
 */

namespace App\Controller;

use App\Form\ContatoForm;

class ContatoController extends AppController {

    public function index(){

        $contato = new ContatoForm();
        if($this->request->is('post')){
            if($contato->execute($this->request->data())){
             $this->Flash->set(__('Email enviado com sucesso'),['element'=>'success']);
            }else{
                $this->Flash->set(__('Erro ao enviar o e-mail'),['element'=>'error']);
            }
        }
        $this->set('contato', $contato);
    }

}