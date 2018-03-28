<?php
  require('modules/connect.php');
  
  
  $sql = "SELECT * FROM `upload`";
  $result = mysqli_query($conn, $sql);
  ?>
<html>
  <head>
    <style>
      body{
      padding-left: 10%;
      }	
      .navbar {
      position:fixed;
      top:0px;
      left:0px;
      width:100px;
      height:100vh;
      background:#484848;
      display:flex;
      flex-direction:column;
      }
    </style>
  </head>
  <body>
    <div class="navbar"><button><a href="employeelist.php"></a>Employees</button></div>
    <div class="container">
      <div class="row">
        <table class="table">
          <thead>
            <tr>
              <th>S.No</th>
              <th>Name</th>
              <th>Email</th>
              <th>Size</th>
              <th>Type</th>
              <th>Location</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody>
            <?php
              while($r = mysqli_fetch_assoc($result)){ 
                  
              
              ?>
            <tr>
              <th scope="row"><?php echo $r['task_id'] ?></th>
              <td><?php  echo $r['name'] ?></td>
              <td><?php  echo $r['email'] ?></td>
              <td><?php echo $r['size'] ?></td>
              <td><?php echo $r['type'] ?></td>
              <td><a href="<?php echo $r['location'] ?>">View</a></td>
              <td><a href="delete.php?id=<?php echo $r['location'] ?>" >Delete </a></td>
            </tr>
            <?php
              }
              
              ?>
          </tbody>
        </table>
      </div>
    </div>
  </body>
</html>