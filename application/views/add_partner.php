<?php
defined('BASEPATH') OR exit('No direct script access allowed');
if (isset($this->session->userdata['logged_in'])) {
    $email = $this->session->userdata['logged_in']['email'];
    $password = $this->session->userdata['logged_in']['password'];
    $level = $this->session->userdata['logged_in']['is_admin'];
 include "header.php";
 } 
else {
  redirect('/', 'refresh');
 }
?>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">
<?php include 'heading.php';?>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">
          <img src="<?php echo base_url();?>dist/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>
        </div>
        <div class="pull-left info">
          <p>Alexander Pierce</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
       <?php include 'search-form.php';?>
      <ul class="sidebar-menu" data-widget="tree">
        <li class="treeview">
          <a href="<?php echo base_url();?>dashboard">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>            
          </a>          
        </li>
        <li class="active treeview">
          <a href="#">
            <i class="fa fa-handshake-o"></i>
            <span>Partners</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right">4</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>partners/view"><i class="fa fa-eye"></i> View All</a></li>
            <li class="active"><a href="<?php echo base_url();?>partners/create"><i class="fa fa-user-plus"></i> Create New</a></li>
            
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-users"></i>
            <span>Clients</span>
            <span class="pull-right-container">
              <span class="label label-primary pull-right bg-green">10</span>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="<?php echo base_url();?>clients/view"><i class="fa fa-eye"></i> View All</a></li>
            <li class=""><a href="<?php echo base_url();?>clients/create"><i class="fa fa-user-plus"></i> Create New</a></li>
            
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>Charts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
            <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
            <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
            <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-laptop"></i>
            <span>Contacts</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/UI/general.html"><i class="fa fa-circle-o"></i> General</a></li>
            <li><a href="pages/UI/icons.html"><i class="fa fa-circle-o"></i> Icons</a></li>
            <li><a href="pages/UI/buttons.html"><i class="fa fa-circle-o"></i> Buttons</a></li>
            <li><a href="pages/UI/sliders.html"><i class="fa fa-circle-o"></i> Sliders</a></li>
            <li><a href="pages/UI/timeline.html"><i class="fa fa-circle-o"></i> Timeline</a></li>
            <li><a href="pages/UI/modals.html"><i class="fa fa-circle-o"></i> Modals</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-edit"></i> <span>Calls</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/forms/general.html"><i class="fa fa-circle-o"></i> General Elements</a></li>
            <li><a href="pages/forms/advanced.html"><i class="fa fa-circle-o"></i> Advanced Elements</a></li>
            <li><a href="pages/forms/editors.html"><i class="fa fa-circle-o"></i> Editors</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-table"></i> <span>Tables</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/tables/simple.html"><i class="fa fa-circle-o"></i> Simple tables</a></li>
            <li><a href="pages/tables/data.html"><i class="fa fa-circle-o"></i> Data tables</a></li>
          </ul>
        </li>
        <li>
          <a href="pages/calendar.html">
            <i class="fa fa-calendar"></i> <span>Calendar</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-red">3</small>
              <small class="label pull-right bg-blue">17</small>
            </span>
          </a>
        </li>
        <li>
          <a href="pages/mailbox/mailbox.html">
            <i class="fa fa-envelope"></i> <span>Mailbox</span>
            <span class="pull-right-container">
              <small class="label pull-right bg-yellow">12</small>
              <small class="label pull-right bg-green">16</small>
              <small class="label pull-right bg-red">5</small>
            </span>
          </a>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-folder"></i> <span>Collaboration</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="pages/examples/invoice.html"><i class="fa fa-circle-o"></i> Invoice</a></li>
            <li><a href="pages/examples/profile.html"><i class="fa fa-circle-o"></i> Profile</a></li>
            <li><a href="pages/examples/login.html"><i class="fa fa-circle-o"></i> Login</a></li>
            <li><a href="pages/examples/register.html"><i class="fa fa-circle-o"></i> Register</a></li>
            <li><a href="pages/examples/lockscreen.html"><i class="fa fa-circle-o"></i> Lockscreen</a></li>
            <li><a href="pages/examples/404.html"><i class="fa fa-circle-o"></i> 404 Error</a></li>
            <li><a href="pages/examples/500.html"><i class="fa fa-circle-o"></i> 500 Error</a></li>
            <li><a href="pages/examples/blank.html"><i class="fa fa-circle-o"></i> Blank Page</a></li>
            <li><a href="pages/examples/pace.html"><i class="fa fa-circle-o"></i> Pace Page</a></li>
          </ul>
        </li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-share"></i> <span>Multilevel</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
            <li class="treeview">
              <a href="#"><i class="fa fa-circle-o"></i> Level One
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu">
                <li><a href="#"><i class="fa fa-circle-o"></i> Level Two</a></li>
                <li class="treeview">
                  <a href="#"><i class="fa fa-circle-o"></i> Level Two
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                    <li><a href="#"><i class="fa fa-circle-o"></i> Level Three</a></li>
                  </ul>
                </li>
              </ul>
            </li>
            <li><a href="#"><i class="fa fa-circle-o"></i> Level One</a></li>
          </ul>
        </li>
        
      </ul>
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Partners<small>Add Partner</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-handshake-o"></i> Partners</a></li>
        <li class="active">Add Partner</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
    <div class="row">
      <form action="" method="POST">
      <table class="table">
      <tr>
      <td><label>Full Name</label></td><td><input type="text" name="fname" id="fname"/></td>
      <td><label>Email</label></td><td><input type="email" name="email" id="email"/></td>
      <td><label>Phone</label></td><td><input type="telephone" name="phone" id="phone"/></td>
      <td><label>Address</label></td> <td><input type="text" name="address" id="address"/></td>
      </tr>
      
      <tr>      
      <td><label>City</label></td><td><input type="text" name="city" id="city"/></td>
      <td><label>State</label></td><td><input type="text" name="state" id="state"/></td>
      <td><label>Postal Code</label></td><td><input type="text" name="postal" id="postal"/></td>
      <td><label>Country</label></td><td><input type="text" name="country" id="country"/></td>
      </tr>
      
      <tr style="">      
      <td><label>Assigned To</label></td><td><input type="text" name="assignee" id="assignee"/></td>
      
      </tr>
      </table>
      </form> 
      <button name="add" class="btn btn-default" onclick="submitForm()" value="">ADD</button>   
      </div>
    </section>
  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer"><strong>Copyright &copy; 2018 <a href="">DBL</a>.</strong> All rights reserved.</footer>
</div>
<?php include "footer-two.php";?>
<script>
function submitForm(){
var fname = $('#fname').val(),
    email = $('#email').val(),
    phone = $('#phone').val(),
    address = $('#address').val(),
    city = $('#city').val(),
    state = $('#state').val(),
    country = $('#country').val(),
    postal = $('#postal').val(),
    assignee = $('#assignee').val();
    var items_array = ['fname','email','phone','address','city','state','country','postal','assignee'];
    var length = items_array.length;
    var error = false;
    for(var i = 0; i < length; i++) {
        var item = items_array[i],
            item_div = '#'+ item,
            item = $(item_div).val();
        if(item.length < 1){
            $(item_div).css('border','1px solid red');
            error = true;
        } 
        else{
            $(item_div).css('border','1px solid white');
        }
    }
    if(!error){
     swal('Sending ....Please wait');
     swal.showLoading();
     $.post("<?php echo base_url(); ?>partners/add", {fname:fname, email: email, phone:phone, address:address, city:city, state:state, country:country, postal:postal, assignee:assignee}, function(message){
         if(message.trim() == 'success'){            
            swal({   
            title: "Success!",text: "Partner successfully created",
            type: "success",   
            confirmButtonText: "OK" 
            });
         }
         else{
          swal({   
            title: "Error!",text: message,
            type: "error",   
            confirmButtonText: "OK" 
            });
         }
         });
   }
 }  
</script>
</body>
</html>