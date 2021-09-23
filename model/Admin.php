<?php
class Admin{

    public $id;
    public $nome;
    public $email;
    public $senha;
    public $telefone;
    public $idUsuario;
    public $confirmarsenha;
    public $usuario;
    public $niveis;


    public function InserirAdmin() {
        $sql1 = "INSERT INTO usuario (nome, email, senha, telefone) 
        VALUES ('".$this->nome."' , '".$this->email."' , '".$this->senha."' , '".$this->telefone."')"; 
        $conexao1 = new PDO('mysql:host=127.0.0.1;dbname=lanchonete2', 'root', '');
        $conexao1->exec($sql1);
        
        $sql2 = "SELECT id FROM usuario WHERE nome = '".$this->nome."' AND email = '".$this->email."'";
        $conexao2 = new PDO('mysql:host=127.0.0.1;dbname=lanchonete2', 'root', '');
        $resultado = $conexao2->query($sql2);
        $lista = $resultado->fetch();
    
        $sql3 = "INSERT INTO admin (id_usuario, niveis_acesso) 
        VALUES ('".$lista["id"]."' , '1')"; 
        $conexao3 = new PDO('mysql:host=127.0.0.1;dbname=lanchonete2', 'root', '');
        $conexao3->exec($sql3);
    }

    public function ListarAdmin() {
        $sql = "SELECT usuario.id, usuario.nome, usuario.email, usuario.telefone, admin.niveis_acesso FROM usuario INNER JOIN admin ON usuario.id = admin.id_usuario";
        $conexao = new PDO('mysql:host=127.0.0.1;dbname=lanchonete2', 'root', '');
        $resultado = $conexao->query($sql);
        $lista = $resultado->fetchAll();
        return $lista;
    }

    public function ListarUsuarioLogado($idUsuario) { 
        $sql = "SELECT * FROM usuario where id = '$idUsuario'";
        $conexao = new PDO('mysql:host=127.0.0.1;dbname=lanchonete2', 'root', '');
        $resultado = $conexao->query($sql);
        $lista = $resultado->fetch();
        return $lista;
        
    }   

    public function Excluir($id){
        $conexao = new PDO('mysql:host=127.0.0.1;dbname=lanchonete2', 'root', '');
        
        $sql = "DELETE FROM usuario WHERE id = $id";
        $conexao->exec($sql);
        $sql = "DELETE FROM admin WHERE id_usuario = $id";
        $conexao->exec($sql);
    }

}

?>