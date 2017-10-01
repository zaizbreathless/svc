<?php
require_once 'tcpdf/tcpdf.php';

$host = "localhost";
$username = "svc-v4";
$password = "4e2usaty8";
$database = "faisal_svc-v4";

$connect = new PDO("mysql: host=$host; dbname=$database", $username, $password, array(
PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
));


class MYPDF extends TCPDF {
    //Page header
    public function Header() {
		
		
    }
	public function Footer() {
		
    }
   
}

$pdf = new MYPDF();
$pdf->AddPage('P','A4',true,'');
$pdf->SetMargins('25','20','25',true);
$pdf->SetFont('helvetica','',10);
$pdf->SetAutoPageBreak(true, 20);
					

$html='<table width="80%" cellpadding="5" border="0">';

if (isset($_GET['id'])) {
	$id = $_GET['id'];
// $query1 = $connect->query("SELECT * FROM visits WHERE visits.id=$id");
// 	if($query1->rowCOunt()){
// 		}
		$html .='
		
	<tr>
                
                <h4 align="right">(DBKL - JKB - L - LT -01)</h4>
                
                <h4 align="center"><strong>JABATAN KAWALAN BANGUNAN</strong><br><strong>DEWAN BANDARAYA KUALA LUMPUR</strong><br><br><strong><u>LAPORAN LAWATAN TAPAK</u></strong></h4>
                
	</tr>';


$filterid = "1";
//$query = $connect->prepare("SELECT * FROM sites INNER JOIN visits ON visits.site_id=sites.id WHERE visits.site_id=$id AND status_visit LIKE '%$filterid%'");
$query = $connect->prepare("SELECT * FROM tapak INNER JOIN lawat ON lawat.tapak_id=tapak.id WHERE lawat.id=$id");
$query->bindValue(1, "%$filterid%", PDO::PARAM_STR);
$query->execute();

         if (!$query->rowCount() == 0) {            
            while ($result = $query->fetch()) {

$html.='<tr>
			<h4 align="left"><u>BAHAGIAN A</u></h4>
			<th>
			No Rujukan       : <strong>'.$result['no_fail'].'</strong><br><br>
			1. No Lot        : <strong></strong><br><br>
			2. Seksyen/Mukim : ______________________________<br><br>
			3. Lokasi        : <strong>'.$result['lokasiTapak'].'</strong><br><br>
			4. Perkara/Tajuk : <strong>'.$result['perkara'].'</strong><br><br><strong>UNTUK TETUAN:&nbsp;'.$result['pemilikPemaju'].'</strong><br><br>
			5. Pelan Tapak / Lokasi <strong>dikepilkan</strong> / tidak dikepilkan*.<br><br>
			6. Lukisan / Lakaran kerja-kerja binaan <strong>dikepilkan</strong> / tidak dikepilkan*.<br><br>
			7. Gambar-gambar tapak <strong>dikepilkan</strong> / tidak dikepilkan*.<br><br>
			8. Laporan Pemeriksaan <strong>dikepilkan</strong> / tidak dikepilkan*.<br><br>
			9. Laporan Lawatan Tapak : <br>(ukuran, bahan yang digunakan dan sebagainya)<br><br><strong>'.$result['laporan'].'</strong><br><br>
			10. Ada kelulusan BP / Permit? &nbsp;&nbsp;&nbsp;<strong>YA</strong> / TIDAK* &nbsp;&nbsp;&nbsp;&nbsp;Rujukan: <strong>'.$result['no_fail'].'</strong><br><br>
			11. Tindakan susulan yang dilakukan :-<br><br><strong>'.$result['tindakan'].'</strong><br><br>
			12. Tarikh lawatan dilakukan : <u>'.$result['tarikh'].'</u>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Masa : <u>'.$result['masa'].'</u><br><br>
			( *Potong yang tidak berkenaan )
			
			</th>	
			
		</tr>';
$html .='<br pagebreak="true"/>
		
	<tr>
		<h4 align="right">(DBKL - JKB - L - LT -01)</h4>
                
	</tr>';


$html.='<tr><h4 align="left"><u>BAHAGIAN B</u></h4>
			<th>
			13. Pemilik Tanah / Alamat : <strong>'.$result['pemilikPemaju'].'</strong><br><strong>'.$result['alamatPemaju'].'</strong><br><br>
			14. Juruperunding / Alamat : <strong>'.$result['pemohonPSP'].'</strong><br><strong>'.$result['alamatPemohon'].'</strong><br><br>
			15. Kontraktor / Alamat : <strong>'.$result['incharge'].'</strong><br><strong>'.$result['alamatIncharge'].'</strong><br><br>
			Lawatan tapak dilakukan oleh : <strong>'.$result['pegawai'].'</strong><br><br><br><br>
			Tandatangan : &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			Tarikh :  
			<br><br><br pagebreak="true"/>';

$html .='
		
	<tr>
                
                <h4 align="right">(DBKL - JKB - L - LT -01)</h4><br>
                
                <h4 align="center"><strong>'.$result['perkara'].'</strong></h4><hr>
                <h4 align="center"><strong>UNTUK TETUAN:&nbsp;'.$result['pemohonPSP'].'</strong></h4><br><br>

                
	</tr>';

			
			

			
			$html.='</th>
			
		</tr><br>';

	

            }
                
        } 

        //-----------------------------------------------------------------------------------------------

      

}


$html.='</table>';

$query = $connect->prepare("SELECT * FROM lawat INNER JOIN fail_lawat ON fail_lawat.lawat_id=lawat.id WHERE lawat.id=$id");
			//$query->bindValue(1, "%$filterid%", PDO::PARAM_STR);
			$query->execute();

         if (!$query->rowCount() == 0) { 
         //$check = 1;         
            while ($result = $query->fetch()) {
            	$html.='<p style = "text-align:center"><img src="'.$result['fail_path'].'" style="float: center; width: 2800%; margin: auto;"/></p><br><br><br>';
            	$html.='<p style = "text-align:center"><strong>'.$result['file_desc'].'</strong></p>';

            	// if($check>=2 ){
	            $html.='<p style="page-break-after: avoid;"></p>';
	            		
	            // }
	            // else if($check >=2 && $check % 5 == 0){
	            // 	$html.='<p style="page-break-after: always;"></p>';	
	            // }


	            //$check++;

            }
        }


//--------------------------------------------------------------------------




$pdf->writeHTML($html, true, false, true, false, '');
$pdf->Output();
?>
