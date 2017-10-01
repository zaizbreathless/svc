<?php include 'body/header.php'; ?>

<?php

    if(isset($_GET['idd'])){
        $idd = $_GET['idd'];
        $del = "DELETE FROM borang WHERE id = $idd";
        $stmt = $pdo->prepare($del);  
        $stmt->execute(); 
    }

?>

<script>
    alert('Berjaya dipadam.'); 
    window.history.go(-1);
</script>";