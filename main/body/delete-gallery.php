<?php include 'body/header.php'; ?>

<?php
    if(isset($_GET['idd'])){
    $img = $_GET['nama_baru'];
    $id = $_GET['idd'];
    $padam = unlink("./files/".$img);
    //if($padam){
        $pdm = $pdo->prepare("DELETE FROM fail_lawat WHERE id='$id'");
        if($pdm->execute()){

            echo "DONE";
            
        }
    //}
    }
?>

<script>
    alert('Berjaya dipadam.'); 
    window.history.go(-1);
</script>";