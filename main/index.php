<?php
$p = $_GET['p'];
if($p == '' || !isset($p)){
    include 'body/dashboard.php';
    //include 'assets/customers-list.php';
    }
else if($p == 'Add-Users'){
    include 'body/add-users.php';
    }
else if($p == 'Input-Users'){
    include 'body/input-users.php';
    }
else if($p == 'Users-List'){
    include 'body/users-list.php';
    }
else if($p == 'Profile'){
    include 'body/profile.php';
    }
else if($p == 'Add-Site'){
    include 'body/add-site.php';
    }
else if($p == 'Input-Site'){
    include 'body/input-site.php';
    }
else if($p == 'Delete-Site'){
    include 'body/delete-site.php';
    }
else if($p == 'Info-Site'){
    include 'body/info-site.php';
    }
else if($p == 'Fee-Site'){
    include 'body/fee-site.php';
    }
else if($p == 'Input-Fee'){
    include 'body/input-fee.php';
    }
else if($p == 'Delete-Fee'){
    include 'body/delete-fee.php';
    }
else if($p == 'Meeting-Site'){
    include 'body/meeting-site.php';
    }
else if($p == 'Input-Meeting'){
    include 'body/input-meeting.php';
    }
else if($p == 'Delete-Meeting'){
    include 'body/delete-meeting.php';
    }
else if($p == 'Form-Site'){
    include 'body/form-site.php';
    }
else if($p == 'Input-Form'){
    include 'body/input-form.php';
    }
else if($p == 'Delete-Form'){
    include 'body/delete-form.php';
    }
else if($p == 'Edit-Site'){
    include 'body/edit-site.php';
    }
else if($p == 'Update-Site'){
    include 'body/update-site.php';
    }
else if($p == 'All-Site'){
    include 'body/all-site.php';
    }
else if($p == 'All-North'){
    include 'body/all-north.php';
    }
else if($p == 'All-Mid'){
    include 'body/all-mid.php';
    }
else if($p == 'All-South'){
    include 'body/all-south.php';
    }
else if($p == 'Visit-Site'){
    include 'body/visit-site.php';
    }
else if($p == 'Monitor-Site'){
    include 'body/monitor-site.php';
    }
else if($p == 'CCC-Site'){
    include 'body/ccc-site.php';
    }
else if($p == 'North-1'){
    include 'body/north-1.php';
    }
else if($p == 'North-2'){
    include 'body/north-2.php';
    }
else if($p == 'North-3'){
    include 'body/north-3.php';
    }
else if($p == 'Mid-1'){
    include 'body/mid-1.php';
    }   
else if($p == 'Mid-2'){
    include 'body/mid-2.php';
    }
else if($p == 'Mid-3'){
    include 'body/mid-3.php';
    }
else if($p == 'Mid-4'){
    include 'body/mid-4.php';
    }
else if($p == 'South-1'){
    include 'body/south-1.php';
    }
else if($p == 'South-2'){
    include 'body/south-2.php';
    }   
else if($p == 'South-3'){
    include 'body/south-3.php';
    }   
else if($p == 'Client-Site'){
    include 'body/client-site.php';
    }
else if($p == 'Site-Amend'){
    include 'body/site-amend.php';
    }
else if($p == 'Amend-Site'){
    include 'body/amend-site.php';
    }
else if($p == 'Input-Amend'){
    include 'body/input-amend.php';
    }
else if($p == 'Site-Penalty'){
    include 'body/site-penalty.php';
    }
else if($p == 'Penalty-Site'){
    include 'body/penalty-site.php';
    }
else if($p == 'Input-Penalty'){
    include 'body/input-penalty.php';
    }
else if($p == 'Site-Visit'){
    include 'body/site-visit.php';
    }
else if($p == 'Input-Visit'){
    include 'body/input-visit.php';
    }
else if($p == 'Site-File'){
    include 'body/site-file.php';
    }
else if($p == 'Input-File'){
    include 'body/input-file.php';
    }
else if($p == 'Delete-File'){
    include 'body/delete-file.php';
    }
else if($p == 'Search-Site'){
    include 'body/search-site.php';
    }
else if($p == 'Filtered-Site'){
    include 'body/filtered-site.php';
    }
else if($p == 'Site-Move'){
    include 'body/site-move.php';
    }
else if($p == 'Move-Site'){
    include 'body/move-site.php';
    }
else if($p == 'Input-Move'){
    include 'body/input-move.php';
    }
else if($p == 'Pdf-Dom'){
    include 'body/pdf-dom.php';
    }
else if($p == 'Pdf-Site'){
    include 'body/pdf-site.php';
    }
else if($p == 'Iso'){
    include 'body/iso.php';
    }
else if($p == 'Gallery'){
    include 'body/gallery.php';
    }
else if($p == 'Delete-Gallery'){
    include 'body/delete-gallery.php';
    }
else if($p == 'QueryPSP'){
    include 'body/queryPSP.php';
    }
else if($p == 'QueryOWN'){
    include 'body/queryOWN.php';
    }
else if($p == 'Error-404'){
    include 'assets/404.php';   
    }
else{
    include 'assets/404.php';   
    }
?>