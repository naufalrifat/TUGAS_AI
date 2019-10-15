
  <html>
  <style>
    body{
        color: red;
  background-color: red; /* For browsers that do not support gradients */
  background-image: linear-gradient(to bottom right, black, white); /* Standard syntax (must be last) */
    }
  </style>
  <body>
    <center>
     <form action="index.php" method="post">
         <input type="text" name="search_query" />
         <input type="submit" name="search" />
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
                   <br><?=$row['id']?>
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
                    while($row=mysqli_fetch_assoc($res))
                    {
                         $count++;
                         ?>
                         <br><?=$row['id']?>
                         <?=$row['judul_lagu']?>
                         <?=$row['penyanyi'] ?>
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
