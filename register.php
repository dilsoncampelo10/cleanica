<?php
session_start();
require_once 'templates/headerRegister.php';
require_once  'config/config.php';
$type = filter_input(INPUT_GET,'type');

if($_SESSION['alert']){
    echo $_SESSION['alert'];
    $_SESSION['alert'] = '';
}

if($type == 'patient') : ?>
<div id="Fotolado">
        <h2>Faça seu Cadastro! <br> Para pacientes</h2>
        <img src="<?=BASE_URL?>/public/img/fundocleaNika.png">
    </div>

    <div id="central">
        <img src="<?=BASE_URL?>/public/img/logocleaNika.png"  padding-top: 20px;
            width: 230px;
            height: 140px;>
        <center>
            <form action="patient_insert.php" method="post">
            
            <label for="cpf">CPF</label>
                <input type="text" name="cpf" placeholder="Digite seu CPF" id="cpf">         <br>         <br>         
 
          
                <label for="name">Nome</label>
                <input type="text" name="name"  placeholder="Digite seu nome" id="name"><br><br>
            
                <label for="phone">Telefone</label>
                <input type="tel" name="phone"  placeholder="Digite seu telefone" id="phone"><br><br>
          
                <label for="address">Endereço</label>
                <input type="tel" name="address"  placeholder="Digite seu endereço" id="address"><br><br>
           
                <label for="pass">Senha</label>
                <input type="password" name="pass"  placeholder="Digite sua senha" id="pass">
                <p>Sexo</p>
                <div class="grupo">
                     <input type="radio" name="gender" id="male" class="form-check-input" value="M">
                    <label for="male" >Masculino</label><br><br>
                    <input type="radio" name="gender" id="female" class="form-check-input" value="F">
                    <label for="female" >Feminino</label>
                </div>
               
            <button type="submit" >Fazer o cadastro</button> <br><br>
            <a href="<?=BASE_URL?>/login.php?type=patient" title="Login">Já tem sua conta? Faça seu Login!</a>
            </form>
        </center>
    </div>




<?php elseif($type=='doctor'): 
    ?>
    <div id="Fotolado">
        <h2>Faça seu Cadastro! <br> Para médicos</h2>
        <img src="<?=BASE_URL?>/public/img/fundocleaNika.png">
    </div>
    <div id="central" style="height: 820px;">
    <img src="<?=BASE_URL?>/public/img/logocleaNika.png"  padding-top: 20px;
            width: 230px;
            height: 140px;>
        <center>
            <form action="doctor_insert.php" method="post" >
            <br><br> 
                <label for="crm">CRM</label>
                <input type="text" name="crm"  placeholder="Digite seu CRM" id="crm">
                <br><br>
                
                
                <label for="crm">Nome</label>
                <input type="text" name="name" placeholder="Digite seu nome" id="crm">
                <br><br>
                
                    <label for="specialty">Especialidade</label>
                    <input type="text" name="specialty"  placeholder="Digite sua especialidade" id="specialty">
                
                    <br><br>
                    <label for="phone" >Telefone</label>
                    <input type="tel" name="phone"  placeholder="Digite seu telefone" id="phone">
                
                    <br><br>
                    <label for="address" >Endereço</label>
                    <input type="tel" name="address"  placeholder="Digite seu endereço" id="address">
                    <br><br>
                
                    <label for="pass">Senha</label>
                    <input type="password" name="pass"  placeholder="Digite sua senha" id="pass"> <br><br>
                    <p>Sexo</p>
                    <div class="grupo">
                    <input type="radio" name="gender" id="male" value="M">
                    <label for="male">Masculino</label>
                    <input type="radio" name="gender" id="female" value="F">
                    <label for="female">Feminino</label>
                    
                    </div>
                    <button type="submit">Fazer o cadastro</button> <br> <br>
                    <a href="login.php?type=doctor">Já possui cadastro? Faça login</a>
               
            </form>
        </center>
    </div>
   


       
    

<?php elseif($type=='employee'): ?>
<div id="Fotolado">
        <h2>Faça seu Cadastro! <br>Para funcionários</h2>
     
        <img src="<?=BASE_URL?>/public/img/fundocleaNika.png">
</div>
    <div id="central">
    <img src="<?=BASE_URL?>/public/img/logocleaNika.png"  padding-top: 20px;
            width: 230px;
            height: 140px;>
        <center>
            <form action="employee_insert.php" method="post" class="form-login">
         
                    <label for="cpf">CPF</label>
                    <input type="text" name="cpf" placeholder="Digite seu CPF" id="cpf">
              
                
                    <label for="name" >Nome</label>
                    <input type="text" name="name" placeholder="Digite seu nome" id="name">
              
                    
                <div class="mb-3">
                    <label for="phone" >Telefone</label>
                    <input type="tel" name="phone" placeholder="Digite seu telefone" id="phone">
                </div>
                <div class="mb-3">
                    <label for="address" >Endereço</label>
                    <input type="tel" name="address" placeholder="Digite seu endereço" id="address">
                </div>
                <div>
                <label for="office" >Cargo</label>
                    <input type="text" name="office" placeholder="Digite seu cargo" id="office">
                </div>
                <div class="mb-3">
                    <label for="pass" >Senha</label>
                    <input type="password" name="pass" placeholder="Digite sua senha" id="pass">
                </div>
                <p >Sexo</p>
                 <div class="grupo">
                   
                    <input type="radio" name="gender" id="male" value="M">
                    <label for="male" >Masculino</label>
                    <input type="radio" name="gender" id="female" value="F">
                    <label for="female" >Feminino</label>
                </div>
                <button type="submit" class="btn btn-primary">Fazer o cadastro</button> <br><br>
                <a href="login.php?type=employee">Já tem sua conta? Faça seu Login!</a>
            </form>
        </center>
    </div>
  
       
  


<?php else:?>
<h1>Setor não reconhecido</h1>

<?php endif;

require_once 'templates/footer.php';
?>