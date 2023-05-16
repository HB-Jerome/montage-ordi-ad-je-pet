<?php if($isDelete){
?>    <div class="alert alert-danger" role="alert">
    Le composant a été supprimé !
  </div> <?php 
 
}else {
    ?> <div class="alert alert-warning" role="alert">
    Le composant a été archivé !
  </div> <?php
}
?>
<div class="text-center"> <a class="btn btn-primary" href="?page=listPiece" > Retour à la liste des pièces </a> </div>
