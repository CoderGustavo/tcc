<?php
class Usuario{

    public $id;
    public $nome;
    public $email;
    public $senha;
    public $telefone;
    public $confirmarsenha;


    public function Inserir() {
        $sql = "INSERT INTO usuario (nome, email, senha, telefone) 
        VALUES ('".$this->nome."', '".$this->email."', '".$this->senha."', '".$this->telefone."')"; 
        $conexao = new PDO('mysql:host=127.0.0.1;dbname=lanchonete2', 'root', '');
        $conexao->exec($sql);
    }
    
    public function Listar() {
        $sql = "SELECT usuario.id, usuario.nome, usuario.email, usuario.telefone FROM usuario";
        $conexao = new PDO('mysql:host=127.0.0.1;dbname=lanchonete2', 'root', '');
        $resultado = $conexao->query($sql);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function ListarLogado($id) { 
        $sql = "SELECT * FROM usuario where id = '$id'";
        $conexao = new PDO('mysql:host=127.0.0.1;dbname=lanchonete2', 'root', '');
        $resultado = $conexao->query($sql);
        $lista = $resultado->fetch();
        return $lista;
    }   

    public function atualizar($id){
        $sql = "UPDATE usuario SET email = '$this->email' ,telefone =  '$this->telefone' ,endereco = '$this->endereco' WHERE id = $id ";
        $conexao = new PDO('mysql:host=127.0.0.1;dbname=lanchonete2', 'root', '');
        $conexao->exec($sql);
    }

    public function Excluir($id){
        $sql = "DELETE FROM usuario WHERE id = $id";
        $conexao = new PDO('mysql:host=127.0.0.1;dbname=lanchonete2', 'root', '');
        $conexao->exec($sql);
    }

    public function LogarUsuario($email, $senha){
        $query = "SELECT * FROM usuario WHERE email='$email' and senha='$senha'";
        $conexao = new PDO('mysql:host=127.0.0.1;dbname=lanchonete2', 'root', '');
        $resultado = $conexao->query($query);
        $logado = $resultado->fetch();
        return $logado;
    }

}

?>