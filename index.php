
  <html>
  <style>
    body{
        color: red;
  background-color: red; /* For browsers that do not support gradients */
  background-image: linear-gradient(to bottom right, black, white); /* Standard syntax (must be last) */
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
