<?php
/**
 * Created by PhpStorm.
 * User: guilherme.s.campos
 * Date: 10/07/2018
 * Time: 07:21
 */

namespace App\Form;
use Cake\Form\Form;
use Cake\Form\Schema;
use Cake\Validation\Validator;
use Cake\Network\Email\Email;

class ContatoForm extends Form{

    public function _buildSchema(Schema $schema){
        $schema->addField('nome','string');
        $schema->addField('email','string');
        $schema->addField('mensagem','text');
        return $schema;
    }

    public function _buildValidator (Validator $validator){
        $validator->add('mensagem',['minLength'=> ['rule'=> ['minLength',10],'message' =>'A mensagem precisa ter pelo menos 10 letras' ]]);
        $validator->notEmpty('nome');
        $validator->notEmpty('email');
        return $validator;
    }


        public function _execute(array $data){

        $email = new Email('gmail');
        $email->to('guilherme.silva.c@hotmail.com');
        $email->subject('Contato feito pelo site');

        $msg = "Contato feio pelo site <br>
                    Nome: {$data['nome']}<br>
                    Email: {$data['email']}<br>
                    Mensagem: {$data['mensagem']}<br>
                    ";

        return $email->send($msg);

        }


}