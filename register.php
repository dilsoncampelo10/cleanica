<?php
session_start();
require_once 'templates/header.php';
$type = filter_input(INPUT_GET,'type');

if($_SESSION['alert']){
    echo $_SESSION['alert'];
    $_SESSION['alert'] = '';
}

if($type == 'patient') : ?>

<section class="container">
    <div>
        <h1>Faça seu cadastro</h1>
    </div>
    <div >
        <form action="patient_insert.php" method="post" class="form-login">
            <div class="mb-3">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" name="cpf" class="form-control" placeholder="Digite seu CPF" id="cpf">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" name="name" class="form-control" placeholder="Digite seu nome" id="name">
            </div>
             <div class="mb-3">
                <p class="form-label">Sexo</p>
                <input type="radio" name="gender" id="male" class="form-check-input" value="M">
                <label for="male" class="form-check-label">M</label>
                <input type="radio" name="gender" id="female" class="form-check-input" value="F">
                <label for="female" class="form-check-label">F</label>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Telefone</label>
                <input type="tel" name="phone" class="form-control" placeholder="Digite seu telefone" id="phone">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Endereço</label>
                <input type="tel" name="address" class="form-control" placeholder="Digite seu endereço" id="address">
            </div>
            <div class="mb-3">
                <label for="pass" class="form-label">Digite sua senha</label>
                <input type="password" name="pass" class="form-control" placeholder="Digite sua senha" id="pass">
            </div>
            <button type="submit" class="btn btn-primary">Fazer o cadastro</button>
        </form>
    </div>
    <div>
        <a href="login.php?type=patient">Já possui cadastro? Faça login</a>
    </div>
</section>



<?php elseif($type=='doctor'): 
    ?>
    <section class="container">
    <div>
        <h1>Faça seu cadastro</h1>
    </div>
    <div >
        <form action="doctor_insert.php" method="post" class="form-login">
            <div class="mb-3">
                <label for="crm" class="form-label">CRM</label>
                <input type="text" name="crm" class="form-control" placeholder="Digite seu CRM" id="crm">
            </div>
            <div class="mb-3">
                <label for="crm" class="form-label">Nome</label>
                <input type="text" name="name" class="form-control" placeholder="Digite seu nome" id="crm">
            </div>
            <div class="mb-3">
                <p class="form-label">Sexo</p>
                <input type="radio" name="gender" id="male" class="form-check-input" value="M">
                <label for="male" class="form-check-label">M</label>
                <input type="radio" name="gender" id="female" class="form-check-input" value="F">
                <label for="female" class="form-check-label">F</label>
            </div>
            <div class="mb-3">
                <label for="specialty" class="form-label">Especialidade</label>
                <input type="text" name="specialty" class="form-control" placeholder="Digite sua especialidade" id="specialty">
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Telefone</label>
                <input type="tel" name="phone" class="form-control" placeholder="Digite seu telefone" id="phone">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Endereço</label>
                <input type="tel" name="address" class="form-control" placeholder="Digite seu endereço" id="address">
            </div>

            <div class="mb-3">
                <label for="pass" class="form-label">Digite sua senha</label>
                <input type="password" name="pass" class="form-control" placeholder="Digite sua senha" id="pass">
            </div>
            
            <button type="submit" class="btn btn-primary">Fazer o cadastro</button>
        </form>
    </div>
    <div>
        <a href="login.php?type=doctor">Já possui cadastro? Faça login</a>
    </div>
</section>

<?php elseif($type=='employee'): ?>

    <section class="container">
    <div>
        <h1>Faça seu cadastro</h1>
    </div>
    <div >
        <form action="employee_insert.php" method="post" class="form-login">
        <div class="mb-3">
                <label for="cpf" class="form-label">CPF</label>
                <input type="text" name="cpf" class="form-control" placeholder="Digite seu CPF" id="cpf">
            </div>
            <div class="mb-3">
                <label for="name" class="form-label">Nome</label>
                <input type="text" name="name" class="form-control" placeholder="Digite seu nome" id="name">
            </div>
             <div class="mb-3">
                <p class="form-label">Sexo</p>
                <input type="radio" name="gender" id="male" class="form-check-input" value="M">
                <label for="male" class="form-check-label">Masculino</label>
                <input type="radio" name="gender" id="female" class="form-check-input" value="F">
                <label for="female" class="form-check-label">Feminino</label>
            </div>
            <div class="mb-3">
                <label for="phone" class="form-label">Telefone</label>
                <input type="tel" name="phone" class="form-control" placeholder="Digite seu telefone" id="phone">
            </div>
            <div class="mb-3">
                <label for="address" class="form-label">Endereço</label>
                <input type="tel" name="address" class="form-control" placeholder="Digite seu endereço" id="address">
            </div>
            <div>
            <label for="office" class="form-label">Digite seu cargo</label>
                <input type="text" name="office" class="form-control" placeholder="Digite seu cargo" id="office">
            </div> 
            <div class="mb-3">
                <label for="pass" class="form-label">Digite sua senha</label>
                <input type="password" name="pass" class="form-control" placeholder="Digite sua senha" id="pass">
            </div>
       
            <button type="submit" class="btn btn-primary">Fazer o cadastro</button>
        </form>
    </div>
    <div>
        <a href="login.php?type=employee">Já possui cadastro? Faça login</a>
    </div>
</section>

<?php else:?>
<h1>Setor não reconhecido</h1>

<?php endif;

require_once 'templates/footer.php';
?>