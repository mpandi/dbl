<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include 'header.php'; 
?>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="content-wrapper">         
      <div class="row">
        <div class="col-lg-3">
         <form class='' method="POST" action="<?php echo base_url();?>dashboard">
            <?php     
            if(isset($error_message)){
                echo "<div class='alert alert-danger'>";
                echo $error_message;
                echo "</div>";
                }
            if(isset($logout_message)){
                echo "<div class='alert alert-success'>";
                echo $logout_message;
                echo "</div>";
              } ?>
           <div class="el-form-item"><label for="email">Email</label>
           <div class="">
           <div class="el-input"><input id="email" type="email" name="email" required=""/></div>
          </div>
          </div> 
          <div class="el-form-item"><label for="password" class="">Password</label>
          <div class="el-form-item__content">
          <div class="el-input">
          <input id="password" class="" type="password" name="password"/>
          
          </div>
          
          </div></div> 
          <div class="m-b-md">
          <label class="md-check">
          <input class="has-value" type="checkbox"/>
          <i class="greenish"></i> Keep me signed in
                </label></div> 
                <button type="submit" class="btn greenish btn-block p-x-md"><span class="pull-right hidden">
                <i class="material-icons loader">?</i></span> <span class="clear">Sign in</span></button></form>
        </div>       
      </div>
  </div>
  <footer class="main-footer">
    <div class="pull-right hidden-xs"><b>Version</b> 1.1.0</div>
    <strong>Copyright &copy; 2018 DBL</strong> All rights reserved.</footer>


<?php include "footer.php";?>
</body>
</html>