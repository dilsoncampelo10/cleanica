<?php
require_once 'config/config.php';
require_once 'templates/header.php';

if($_SESSION['patient']):
?>

<section>
    <div>
        <h2>Marque uma consulta</h2>
    </div>
    <form action="" method="post" class="mb-3">
        
    </form>
</section>


<?php else:

header('location: login.php');
exit();

endif?>