
  <html>
  <style>
    body{
        color: ;
  background-color: red; /* For browsers that do not support gradients */
  background-image: linear-gradient(to bottom right, white 5%, black 80%, white); /* Standard syntax (must be last) */
    font-family: "Century Gothic";
    }
    .button {
  background-color: black;
  border: none;
  color: white;
  padding: 10px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 12px;
  margin: 4px 2px;
  cursor: pointer;
}
table, th, td {
  border: 1px solid black;
  background-color: orange;
  border-collapse: collapse;
  text-align: center;
  color: white;
  box-shadow: 5px 10px #ff8c00;
}
th, td {
  padding: 5px;
}
.button1 {border-radius: 12px;}
  </style>
  <body>
    <center>
     <form action="index.php" method="post">
         <input type="text" name="search_query" />
         <button type="submit" class="button button1" name="search" >Search</button>
     </form>
   </center>
  </body>
  </html>
   <?php

      if(isset($_POST['search_query']))
      {

          include('config.php');
          $query= $_POST['search_query'];
          $search=explode(" ",$query);
          $search_string="<center>"."";
          foreach($search as $word)
          {
               $search_string.=($word)."";
          }
          
          echo $search_string."<center>";
          $sql="SELECT * FROM daftarlagu WHERE keyword like '%$search_string%'";
          $res=mysqli_query($conn,$sql);
          if(!$res)
          {
              echo mysqli_error($conn);
          }

          if(mysqli_num_rows($res)>0)
          {
              while($row=mysqli_fetch_assoc($res))
              {
                   ?>
                   <?=$row['judul_lagu']?>
                   <?=$row['judul_lagu']?>
                   <?=$row['penyanyi'] ?>
                   <?php
              }
          }



          if(mysqli_num_rows($res)==0)
          {
              $count=0;
              $words=explode(" ",$query);
              foreach ($words as $word)
              {
                  $mword=($word);
                  $sql="SELECT * FROM daftarlagu WHERE keyword like '%$mword%'";
                  $res=mysqli_query($conn,$sql);
                  if(!$res)
                  {
                      echo mysqli_error($conn);
                  }
                  if(mysqli_num_rows($res)>0)
                  {
                    echo "<table style='width:600px'>
                    <tr>
                        <th style='width:100px'>No</th>
                        <th style='width:300px'>Judul Lagu</th>
                        <th style='width:300px'>Penyanyi</th>
                    </tr>";
                    while($row=mysqli_fetch_assoc($res))
                    {
                         $count++;
                         ?>
                            <tr>
                                <td><?=$row['id']?></td>
                                <td><?=$row['judul_lagu']?></td>
                                <td><?=$row['penyanyi'] ?></td>
                            </tr>
                            </table>
                         <?php
                    }
                  }
              }
              if($count==0)
              {
                   echo "Lagu tidak ditemukan!";
              }
          }


      }

    ?>
</body>
</html>
