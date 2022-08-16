<?php require_once 'config/config.php'?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="<?=BASE_URL?>/public/css/colorido.css">
    <title>CleaNika</title>
    <link rel="shortcut icon" href="<?=BASE_URL?>/public/img/logocleaNika.png" type="image/x-icon">
<body>

    <div class="global-div">

        <div class="topo-div"></div>
        <center>
            <img src="<?=BASE_URL?>/public/img/CleaNika2.png">
        </center>
        
        <div class="menu-div">
            <ul>
                <li><a href="<?=BASE_URL?>/" title="Home">Início</a></li>
                <li><a href="appointment.php" href="<?=BASE_URL?>/appointment.php">Marcar consulta</a></li>
                <li><a href="<?=BASE_URL?>/medicalrecord.php">Analisar prontuário</a></li>
               
                <li><a href="<?=BASE_URL?>/healthinsurance.php">Inscrever convênio</a></li>
               
                <li><a href="Galeria.html" href="#"> Quem Somos</a></li>
                 <li><a href="#">Fale conosco</a></li>
                 <li><a href="#" title="Exposição">Doe</a></li>
                <li><a href="Galeria.html" href="#"> Serviços</a></li>
                <li> Você não está logado</li>
            </ul>
        </div>

        <div class="esq-div">

            <div class="destaques-div">

                <h5><center>Consultas</center></h5>

                <div class="foto-destaque">  <img src="<?=BASE_URL?>/public/img/CleaNika10.png"></div>
                <h1>Marque sua consulta sem sair de casa</h1>
                <p class="right17">  Agora é possível fazer o agendamento da sua consulta sem perder o conforto da sua casa, basta acessar a área de "Marcar consulta" e caso não possua login, se cadastrar como um paciente, sem nenhum custo adicional.</p>
                <a href="https://www.google.com/search?q=canal+de+dente&sxsrf=ALiCzsYSPCiidKz5iTVOgj0j3_bp4hpwfA:1660616317747&source=lnms&tbm=isch&sa=X&ved=2ahUKEwjDyOjtpcr5AhUeu5UCHaQLChMQ_AUoAXoECAEQAw&biw=1366&bih=636&dpr=1#imgrc=S5CJJWqHnio3GM" title="Leia mais" class="leiamais" target="_blank">Link do Canal</a>
            </div>

            <div class="chamadas-div">
                <h4><center>Convênios</center></h4>
                <div class="foto-destaque5">  <img src="<?=BASE_URL?>/public/img/Convenios.jpg"></div>

                <p class="right17"><b>Caso você esteja interessado em se inscrever em um convênio, informe para um de nossos funcionários</b> </p>            <a href="#" title="Leia mais" class="leiamais">leia mais</a>
                <h6>Informações</h6>
                <ul class="maisartigos">
                    <li><a href="#" title="Equipe">Ótimo benefício com o preço que cabe no seu bolso</a></li>
                    <li><a href="#" title="Lorem impsum amet">Ótimos profissionais</b></a></li>

                </ul>
            </div>

            <div class="chamadas-div left17">

                <h4> <center>Nóticias</center></h4>


                <div class="foto-destaque6">  <img src="<?=BASE_URL?>/public/img/CleaNika11.jpg"></div>
                <p><b>Você também pode ficar ligado nas notícias sobre nossa Cleanika</h6>
                <p><b>Conteúdos interessantes para você</b></p>
                <a href="#" title="Leia mais" class="leiamais">leia mais</a>



            </div>


            <br>


        </div>

        <div class="dir-div">

            <form action="#">
                <fieldset>
                    <br>
                    <img src="<?=BASE_URL?>/public/img/logocleaNika.png" class="busca..." />
                    <input type="text" name="termo" class="busca" placeholder="Buscar" />
                </fieldset>
            </form>

            <div class="maislidos-div">
                <h4>Mais lidos</h4>
                <ul class="maisartigos escuro top8">
                    <li><a href="#" title="Nossa Programação ">Consultas Disponível</a></li>
                    <li><a href="#" title="Equipe">Conheça nossa Equipe</a></li>
                    

                </ul>
            </div>
            <br>
            <img src="<?=BASE_URL?>/public/img/CleaNika10.png" height="152px" width="268px">
            <img src="<?=BASE_URL?>/public/img/CleaNika9.jpg" height="152px" width="268px">

        </div>

        <div class="dir-div2">

            <form action="#">
                <fieldset>
                    <br>
                    <img src="<?=BASE_URL?>/public/img/CleaNika6.png" />
                    <img src="<?=BASE_URL?>/public/img/CleaNika7.png">
                    <img src="<?=BASE_URL?>/public/img/CleaNika9.jpg">
                    <img src="<?=BASE_URL?>/public/img/CleaNika10.png">
                </fieldset>
            </form>
            <div id="grid">
  <img src="<?=BASE_URL?>/public/img/galeria1.jpg">
  <img src="<?=BASE_URL?>/public/img/galeria2.jpg">
  <img src="<?=BASE_URL?>/public/img/galeria3.jpg">
</div>
        </div>

        <div class="rodape-div"><p>IFRN-Campus Ipanguaçu</p></div>

    </div>

    </div>
    
<?php require_once 'templates/footer.php'?>