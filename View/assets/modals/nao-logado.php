<?php if(isset($_SESSION["acesso_restrito"])){ $_SESSION["acesso_restrito"] = null;?>
    <script>
        alert("Você nao está logado!");
    </script>
<?php }?>