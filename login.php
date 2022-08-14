<?php
require_once 'config/config.php';
require_once 'templates/header.php';
$type = filter_input(INPUT_GET,'type');

if($_SESSION['alert']){
    echo "<div class='alert alert-info container' role='alert'>".$_SESSION['alert']."</div>";
    $_SESSION['alert'] = '';
}

if($type == 'patient') : ?>

<section class="container">
    <div>
        <h1>Faça seu login</h1>
    </div>
    <div >
        <form action="<?=BASE_URL?>/auth.php" method="post" class="form-login">
        <input type="hidden" name="type" value="patient">
            <div class="mb-3">
                <label for="login" class="form-label">Digite seu login</label>
                <input type="text" name="login" class="form-control" placeholder="Digite seu CPF" id="login">
            </div>
            <div class="mb-3">
                <label for="pass" class="form-label">Digite sua senha</label>
                <input type="password" name="pass" class="form-control" placeholder="Digite sua senha" id="pass">
            </div>
            <button type="submit" class="btn btn-primary">Fazer o login</button>
        </form>
    </div>
    <div>
        <a href="register.php?type=patient">Ainda não tem cadastro? Faça agora</a>
    </div>
</section>



<?php elseif($type=='doctor'): ?>
    <section class="container">
    <div>
        <h1>Faça seu login</h1>
    </div>
    <div >
        <form action="<?=BASE_URL?>/auth.php" method="post" class="form-login">
        <input type="hidden" name="type" value="doctor">
            <div class="mb-3">
                <label for="login" class="form-label">Digite seu login</label>
                <input type="text" name="login" class="form-control" placeholder="Digite seu CRM" id="login">
            </div>
            <div class="mb-3">
                <label for="pass" class="form-label">Digite sua senha</label>
                <input type="password" name="pass" class="form-control" placeholder="Digite sua senha" id="pass">
            </div>
            <button type="submit" class="btn btn-primary">Fazer o login</button>
        </form>
    </div>
    <div>
        <a href="register.php?type=doctor">Ainda não tem cadastro? Faça agora</a>
    </div>
</section>

<?php elseif($type=='employee'): ?>

    <section class="container">
    <div>
        <h1>Faça seu login</h1>
    </div>
    <div >
        <form action="<?=BASE_URL?>/auth.php" method="post" class="form-login">
            <input type="hidden" name="type" value="employee">
            <div class="mb-3">
                <label for="login" class="form-label">Digite seu login</label>
                <input type="text" name="login" class="form-control" placeholder="Digite seu CPF" id="login">
            </div>
            <div class="mb-3">
                <label for="pass" class="form-label">Digite sua senha</label>
                <input type="password" name="pass" class="form-control" placeholder="Digite sua senha" id="pass">
            </div>
            <button type="submit" class="btn btn-primary">Fazer o login</button>
        </form>
    </div>
    <div>
        <a href="register.php?type=employee">Ainda não tem cadastro? Faça agora</a>
    </div>
</section>

<?php else:?>
<h1>Setor não reconhecido</h1>

<?php endif;

require_once 'templates/footer.php';
?>