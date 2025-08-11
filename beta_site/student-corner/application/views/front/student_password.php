<?php include('header.php');?>
 <section class="py-5">
         <div class="container">
            <div class="row">
               <div class="col-lg-3">
                  <div class="bg-white rounded shadow-sm py-3 sidebar-fix setting_layer">
					<h3>Profile Setting</h3>
                     <div class="dropdown-menu-show">
                        <a class="dropdown-item py-2" href="<?=base_url('dashboard')?>">Dashboard</a>
                        <a class="dropdown-item py-2 " href="<?=base_url('admission_form')?>">Admission Form</a>
                        <a class="dropdown-item py-2 active" href="<?=base_url('student-password')?>">Edit Password</a>
                        <a class="dropdown-item py-2" href="<?=base_url('student_logout')?>">Logout</a>
                     </div>
                  </div>
               </div>
               <div class="col-lg-9">
                  <div class="bg-white rounded shadow-sm sidebar-page-right">
                     <div>
                        <div class="p-3 border-bottom">
                           <form method="post" id="change_password" >
                              <p class="text-muted font-weight-bold">CHANGE PASSWORD</p>
                              
                              <div class="row d-flex align-items-center form-group">
                                 <div class="col-md-4">
                                    <p class="text-muted font-weight-bold mb-0">New Password</p>
                                 </div>
                                 <div class="col-md-8">
                                    <input type="password" name="new_password" id="new_password" class="form-control font-weight-bold text-muted">
                                 </div>
                              </div>
                              <div class="row d-flex align-items-center form-group">
                                 <div class="col-md-4">
                                    <p class="text-muted font-weight-bold mb-0">Confirm Password</p>
                                 </div>
                                 <div class="col-md-8">
                                    <input type="password" name="confirm_password" id="confirm_password" class="form-control font-weight-bold text-muted">
                                    <p class="text-muted pt-2">For Security Please enter 8 characters or longer. Combine upper and lowercase letters and numbers.</p>
                                 </div>
                              </div>
                              <div class="text-right">
                                 <button class="btn btn-success" type="submit" >Save Changes</button>
                              </div>
                           </form>
                        </div> 
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
<?php include('footer.php');?>
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script>
   $(document).ready(function(){
      $('#change_password').validate({
         rules:{
            current_password:{
               required:true,
            },
            new_password:{
               required:true,
            },
            confirm_password:{
               equalTo:'#new_password',
               required:true,
            }, 
         },
         messages:{
            current_password:{
               required:"Please enter current password*",
            },
            new_password:{
               required:"Please enter new password *",
            }, 
            confirm_password:{
               required:"Please enter confirm password same as new password*",
               equalTo:"The passwords do not match",
            },   
         }
      });
   });
</script>
