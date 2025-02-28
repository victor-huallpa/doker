<body>

    <?php

    /*------------ Validar vista ------------*/
    if($vista == 'login' || $vista == '404' || $vista == 'register'){
        ?>
        <main class="">
            <?php require_once "./app/views/content/".$vista."-view.php"; ?>
        </main>

        <?php 
        include_once 'layout/footer.php';
        

    }else{
        # Cerrar sesion #
        if((!isset($_SESSION['id']) || $_SESSION['id']=="") || (!isset($_SESSION['usuario']) || $_SESSION['usuario']=="")){
            $insLogin->cerrarSesionControlador();
            exit();
        }

        include_once 'layout/header.php';
    ?>
        <main> 
            <?php require_once "./app/views/content/".$vista."-view.php";?>
        </main>
    <?php
        include_once 'layout/footer.php';
    }
    include_once 'layout/script.php';
        
    ?>


</nav>
</body>
</html>