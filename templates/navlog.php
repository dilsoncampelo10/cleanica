<?php require_once 'config/config.php';

?>
<header>
<nav class="navbar navbar-dark" id="navbar">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">CleaNiKa</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link" aria-current="page" href="<?=BASE_URL?>/">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link <?=$status?>" href="<?=BASE_URL?>/appointment.php">Marcar consulta</a>
        </li>
        <li class="nav-item">
          <a class="nav-link  <?=$status?>" href="<?=BASE_URL?>/medicalrecord.php">Analisar prontuário</a>
        </li>
        <li class="nav-item">
          <a class="nav-link  <?=$status?>" href="<?=BASE_URL?>/healthinsurance.php">Inscrever convênio</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=BASE_URL?>/<?=$url?>?logout">Desconectar</a>
        </li>
      </ul>
      <span class="navbar-text">
        Você está logado como <?=$log?>
      </span>
    </div>
  </div>
</nav>
</header>

<?php
if(isset($_GET['logout'])){
 
    session_destroy();
    header("location: ".BASE_URL."/");
    exit();
}

?>