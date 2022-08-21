<?php
require_once 'config/config.php';
require_once 'templates/headerLogin.php';
$type = filter_input(INPUT_GET,'type');

if($_SESSION['alert']){
    echo "<div class='alert alert-info container' role='alert'>".$_SESSION['alert']."</div>";
    $_SESSION['alert'] = '';
}

if($type == 'patient') : ?>


    <div id="bordagrande">
        <h2>Faça login <br/>Saúde é coisa séria!</h2>
        <div id="Fotolado">
            <img src="<?=BASE_URL?>/public/img/Hospital3.gif">
        </div> 
        <div id="central">
            <center>
                
            <form action="<?=BASE_URL?>/auth.php" method="post">
            <br><br> 
            <h1><b>LOGIN</h1><br></b>
            <label for="login">Usuário</label>
                 <input type="hidden" name="type" value="patient">
            
            
                <input type="text" name="login" placeholder="Digite seu CPF" id="login"> <br><br>
                <label for="pass">Senha</label>
            
                <input type="password" name="pass" placeholder="Password" id="pass"> <br><br>
                <input type="submit" value="Login">
                <br><br>
                <input type="checkbox" name="con" id="con">
                <label for="con" id="label_con">Mantenha-me conectado</label>
        </form>
            </center>
        </div>
    </div>
   
    <div style="text-align: center;">
        <a href="register.php?type=patient">Ainda não tem cadastro? Faça agora</a> <br>
        <a href="<?=BASE_URL?>"><i class="fa-solid fa-arrow-rotate-left"></i>
        Voltar</a>
    </div>




<?php elseif($type=='doctor'): ?>
    <div id="bordagrande">
        <h2>Faça login <br/>Saúde é coisa séria!</h2>
        <div id="Fotolado">
            <img src="<?=BASE_URL?>/public/img/Hospital3.gif">
        </div> 
        <div id="central">
            <center>
                
            <form action="<?=BASE_URL?>/auth.php" method="post">
            <br><br> 
            <h1><b>LOGIN</h1><br></b>
            <label for="login">Usuário</label>
                 <input type="hidden" name="type" value="doctor">
            
            
                <input type="text" name="login" placeholder="Digite seu CRm" id="login"> <br><br>
                <label for="pass">Senha</label>
            
                <input type="password" name="pass" placeholder="Password" id="pass"> <br><br>
                <input type="submit" value="Login">
                <br><br>
                <input type="checkbox" name="con" id="con">
                <label for="con" id="label_con">Mantenha-me conectado</label>
            
              
        </form>
            </center>
        </div>
    </div>
    <div style="text-align: center;">
        <a href="register.php?type=doctor">Ainda não tem cadastro? Faça agora</a>
        <br> 
        <a href="<?=BASE_URL?>"><i class="fa-solid fa-arrow-rotate-left"></i>Voltar</a>
    </div>
</section>

<?php elseif($type=='employee'): ?>

    <div id="bordagrande">
        <h2>Faça login <br/>Saúde é coisa séria!</h2>
        <div id="Fotolado">
            <img src="<?=BASE_URL?>/public/img/Hospital3.gif">
        </div> 
        <div id="central">
            <center>
                
            <form action="<?=BASE_URL?>/auth.php" method="post">
            <br><br> 
            <h1><b>LOGIN</h1><br></b>
            <label for="login">Usuário</label>
                 <input type="hidden" name="type" value="employee">
            
            
                <input type="text" name="login" placeholder="Digite seu CPF" id="login"> <br><br>
                <label for="pass">Senha</label>
            
                <input type="password" name="pass" placeholder="Password" id="pass"> <br><br>
                <input type="submit" value="Login">
                <br><br>
                <input type="checkbox" name="con" id="con">
                <label for="con" id="label_con">Mantenha-me conectado</label>
        </form>
            </center>
        </div>
    </div>
    <div style="text-align: center;">
        <a href="register.php?type=employee">Ainda não tem cadastro? Faça agora</a>
        <br>
        <a href="<?=BASE_URL?>"><i class="fa-solid fa-arrow-rotate-left"></i>Voltar</a>
    </div>
</section>

<?php else:?>
<h1>Setor não reconhecido</h1>

<?php endif;

require_once 'templates/footer.php';
?>