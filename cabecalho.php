<?php 
 session_start();
?>
<div>
<?php
    if(isset($_SESSION['id'])){ //o usuario esta logado
        $nome = $_SESSION['nome'];  
        $nivel = $_SESSION['nivel'];
        if($nivel==1){ //usuario comum
            ?>
             <a href="lista_carta.php"><button>Lista Carta</button></a>
             <a href="lista_usuarios.php"><button>Lista Usuarios</button></a>
             <a href="lista_deck.php"><button>Lista Decks</button></a>
             <a href="cadastra_deck.php"><button>Novos Decks</button></a>
             <a href="cadastro_carta.php"><button>Novas Cartas</button></a>
             <a href="cadastro_usuarios.php"><button>Novos Usuários</button></a>  
            <?php
        }
        else{ //usuario admim
            ?>
            <a href="lista_carta.php"><button>Lista Carta</button></a>
            <a href="lista_usuarios.php"><button>Lista Usuarios</button></a> 
            <a href="lista_deck.php"><button>Lista Decks</button></a> 
            <a href="cadastro_carta.php"><button>Novas Cartas</button></a> 
            <a href="cadastra_deck.php"><button>Novos Decks</button></a> 
            <a href="cadastro_usuarios.php"><button>Novos Usuários</button></a> 
           <?php      
        }
        ?>
        <span>Seja bem vindo,<?=$nome?></span>
        <a href="logout.php">Sair</a>
        <?php    
        
    }else{ //
     ?>
     <a href="login.php">Entrar</a>
     <?php
    }
?>



