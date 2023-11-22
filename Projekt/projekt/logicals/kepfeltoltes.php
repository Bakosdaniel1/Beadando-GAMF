<?php 
// Kapcsolódás
$sqlSzerver = "localhost";
$sqlFhnev = "hallgato123";
$sqlJelszo = "hallgato123";
$sqlAdatbazis = "Hallgato12345";
$csatlakozas = new mysqli($sqlSzerver, $sqlFhnev, $sqlJelszo, $sqlAdatbazis);  

$statusMsg = '';
 
$targetDir = "./../images/uploads/"; 

if(isset($_POST["submit"])){ 
    if(!empty($_FILES["file"]["name"])){ 
        $fileName = basename($_FILES["file"]["name"]); 
        $targetFilePath = $targetDir . $fileName; 
        $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION); 
     
        $allowTypes = array('jpg','png','jpeg'); 
        if(in_array($fileType, $allowTypes)){ 
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){ 
                $insert = $csatlakozas->query("INSERT INTO kepek (fajlnev, datum) VALUES ('".$fileName."', NOW())");
                if($insert){ 
                    header("Location: ./../index.php#fotogaleria"); 
                }else{ 
                    $statusMsg = "Hiba a feltöltés közben. Próbáld újra."; 
                }  
            }else{ 
                $statusMsg = "Hiba történt a kép feltöltése közben."; 
            } 
        }else{ 
            $statusMsg = 'Csak JPG, PNG, JPEG formátum engedélyezett.'; 
        } 
    }else{ 
        $statusMsg = 'Válassz ki egy képfájlt.'; 
    } 
} 



if ($csatlakozas->connect_error) {
    die("Hiba: " . $csatlakozas->connect_error);
}
?>