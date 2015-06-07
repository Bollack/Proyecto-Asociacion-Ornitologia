<?php
$sql = "SELECT idZonaVida FROM zonavida where idZonaVida =1";
          $sqlresult = mysqli_query($dbhandle, $sql);

          if (mysqli_num_rows($sqlresult) > 0) {
              // output data of each row
              while($row = mysqli_fetch_assoc($sqlresult)) {
                  echo "id: " . $row["idZonaVida"]."<br>";
              }
          } else {
              echo "0 results";
          }
?>