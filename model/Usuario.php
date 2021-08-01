<?php
class Usuario{

    public $id;
    public $nome;
    public $email;
    public $senha;
    public $telefone;
    public $endereco;
    public $idUsuario;
    public $confirmarsenha;
    public $usuario;



    public function InserirCliente() {
        $sql = "INSERT INTO usuario (nome, email, senha, telefone) 
        VALUES ('".$this->nome."', '".$this->email."', '".$this->senha."', '".$this->telefone."')"; 
        $conexao = new PDO('mysql:host=127.0.0.1;dbname=lanchonete2', 'root', '');
        $conexao->exec($sql);
    }

    public function InserirAdmin() {
        $sql = "INSERT INTO usuario (nome, email, senha, telefone) 
        VALUES ('".$this->nome."' , '".$this->email."' , '".$this->senha."' , '".$this->telefone."' , '".$this->endereco."' , '1')"; 
        $conexao = new PDO('mysql:host=127.0.0.1;dbname=lanchonete2', 'root', '');
        $conexao->exec($sql);
    }

    public function ListarAdmin() {
        $sql = "SELECT usuario.id, usuario.nome, usuario.email, usuario.telefone, admin.niveis_acesso FROM usuario INNER JOIN admin ON usuario.id = admin.id_usuario";
        $conexao = new PDO('mysql:host=127.0.0.1;dbname=lanchonete2', 'root', '');
        $resultado = $conexao->query($sql);
        $lista = $resultado->fetchAll();
        //var_dump($lista);
        return $lista;
    }
    
    public function ListarCliente() {
        $sql = "SELECT * FROM usuario INNER JOIN admin ON usuario.id <> admin.id_usuario";
        $conexao = new PDO('mysql:host=127.0.0.1;dbname=lanchonete2', 'root', '');
        $resultado = $conexao->query($sql);
        $lista = $resultado->fetchAll();
        //var_dump($lista);
        return $lista;
    }

    public function ListarUsuarioLogado($idUsuario) { 

        $sql = "SELECT * FROM usuario where id = '$idUsuario'";
        $conexao = new PDO('mysql:host=127.0.0.1;dbname=lanchonete2', 'root', '');
        $resultado = $conexao->query($sql);
        $lista = $resultado->fetch();
        return $lista;
        
    }   

    public function atualizarCliente($idCliente){
        $sql = "UPDATE usuario SET 
        
                    email = '$this->email' ,
                    telefone =  '$this->telefone' ,
                    endereco = '$this->endereco' 
            
                 WHERE id = $idCliente ";
        $conexao = new PDO('mysql:host=127.0.0.1;dbname=lanchonete2', 'root', '');
        $conexao->exec($sql);
    }

    public function Excluir($id){
        $sql = "DELETE FROM usuario WHERE id = $id";
        $conexao = new PDO('mysql:host=127.0.0.1;dbname=lanchonete2', 'root', '');
        $conexao->exec($sql);
    }

    public function LogarUsuario($usuario, $senha){
        $query = "SELECT * FROM usuario WHERE email='$usuario' and senha='$senha'";
        $conexao = new PDO('mysql:host=127.0.0.1;dbname=lanchonete2', 'root', '');
        $resultado = $conexao->query($query);
        $logado = $resultado->fetch();
        return $logado;
    }

}

?>