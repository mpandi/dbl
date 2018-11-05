<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include 'header.php'; 
?>
<style>
body {
background: url(http://dblverified.com/wp-content/uploads/2018/10/10.jpg) !important;

background-color: rgba(0, 0, 0, 0);

background-color: rgba(10, 21, 57, 0.55) !important;

background-blend-mode: hard-light;
}
.form-widget .btn {
  background:#9cdf43;

}
.form-widget {
background: #fff;

border-radius: 10px;

padding: 40px 40px;
}
input#email {
width: 100%;

margin: 10px 0px;

border-radius: 4px;

border: 1px solid #538a0a;

padding: 3px 13px;
}
input#password {
width: 100%;

margin: 10px 0px;

border-radius: 4px;

border: 1px solid #538a0a;

padding: 3px 13px;
}
.m-b-md {
  padding: 20px 0px;
}
footer {
  color: #ffffff;
}
a, a:hover, a:active, a:focus {
    outline: none;
    text-decoration: none;
    color: #538a0a;

}
label.md-check {

font-size: 14px;
}
label.md-check input {
  margin-right: 10px;

}
label {
font-size: 17px;
}

</style>
<body class="hold-transition skin-blue sidebar-mini">
  <div class="container text-center" style="padding:60px 15px;">        
    <img class="scale-with-grid" src="http://dblverified.com/wp-content/uploads/2018/10/logo-white2.png" height="60" data-retina="" data-height="60" alt="logo-white2">
  </div>
  <div class="container" style="padding:40px 15px;">         
      <div class="row">
        <div class="col-lg-4 col-lg-offset-4 col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 form-widget">
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
                <br/>
        <p>Forgot password? <a href="<?php echo base_url();?>forgot">Click Here</a></p>      
        </div> 

      </div>

  </div>
  <footer class="container text-center" style="padding:60px 15px;">        
    <div class=""><b>Version</b> 1.1.0</div>
    <strong>Copyright &copy; 2018 DBL</strong> All rights reserved.</footer>


<?php include "footer.php";?>
</body>
</html>