<?php
    header("Access-Control-Allow-Origin: *");
    $plik = fopen("dane.txt","r");

    echo "<table border='1'>";
    echo "<tr>
            <th>Imię</th>
            <th>Nazwisko</th>
            <th>Email</th>
            <th>Temat Wiadomości</th>
            <th>Wiadomość</th>
         </tr>";

    while(($linia = fgets($plik)) !== false){

        $dane = explode("|",$linia);

if(count($dane) < 5){
continue;
}

        echo "<tr>";
        echo "<td>".$dane[0]."</td>";
        echo "<td>".$dane[1]."</td>";
        echo "<td>".$dane[2]."</td>";
        echo "<td>".$dane[3]."</td>";
        echo "<td>".$dane[4]."</td>";
        echo "</tr>";

    }
    echo "</table>";

    fclose($plik);

?>