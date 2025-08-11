
  <link rel="stylesheet" href="<?=base_url();?>admin_assets/css/sidebar.css">
  <div class="page-wrapper chiller-theme toggled">
    <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
      <i class="fas fa-bars"></i>
    </a>
    <nav id="sidebar" class="sidebar-wrapper">
      <div class="sidebar-content">
   
        
          <div id="close-sidebar" style="display:none">
            <i class="fas fa-times"></i>
          </div>
    

        <!-- sidebar-search  -->
        <div class="sidebar-menu">
          <ul>
         
			<li class="hover-dropdown-g dashbord">
              <a id="dashboard" href="<?=base_url();?>dashboard" class="dropdown-toggle <?php if($this->uri->segment(1) == "dashboard"){?>active-menu<?php }?>">Dashboard</a>
			</li>

            <!-- <li class="hover-dropdown-g">
              <a href="javascript:void(0)" class="dropdown-toggle <?php if($this->uri->segment(1) == "add-employee" || $this->uri->segment(1) == "employee-list"){?>active-menu<?php }?>">Manage Employee<i class="fa fa-caret-down" aria-hidden="true"></i> </a>
              <ul class="cust-dropdown">
                  <li><a id="employee" href="<?=base_url()?>add-employee" class="dropdown-item">Add Employee</a></li>
                  <li><a id="employeelist"  href="<?=base_url()?>employee-list" class="dropdown-item">Employee List</a></li>
              
                </ul>
            </li>
            <li class="hover-dropdown-g">
              <a href="javascript:void(0)" class="dropdown-toggle <?php if( $this->uri->segment(1) == "add-stock" || $this->uri->segment(1) == "stock-list"){?>active-menu<?php }?>">Row Stock Material<br> Management <i class="fa fa-caret-down" aria-hidden="true"></i>
</a>
              <ul class="cust-dropdown">-->
                       
                  <!-- <li><a href="<?=base_url()?>material-list" class="dropdown-item">Material List</a></li> -->
                  <!--<li><a id="general_purchase" href="<?=base_url()?>general-purchase-order" class="dropdown-item">General Purchase</a></li>
                  <li><a id="add_stock" href="<?=base_url()?>add-stock" class="dropdown-item">Add Stock</a></li>
                  <li><a id="stock_list" href="<?=base_url()?>stock-list" class="dropdown-item">Stock Availability</a></li>
              
                </ul>
            </li>-->
            <!-- <li class="hover-dropdown-g">
            <a href="javascript:void(0)" class="dropdown-toggle ">Window Management <i class="fa fa-caret-down" aria-hidden="true"></i></a> 
              <ul class="cust-dropdown">
                 
                            
                </ul>
            </li> -->
            <!--<li class="hover-dropdown-g">
              <a href="javascript:void(0)" class="dropdown-toggle <?php if($this->uri->segment(1) == "department-management" || $this->uri->segment(1) == "rack-management" ||  $this->uri->segment(1) == "unit-management" || $this->uri->segment(1) == "material-management" ||$this->uri->segment(1) == "designation-management" || $this->uri->segment(1) == "window-type-management" || $this->uri->segment(1) == "window"|| $this->uri->segment(1) == "finish-type-management" || $this->uri->segment(1) == "finish-type-management" || $this->uri->segment(1) == "specification-management" || $this->uri->segment(1) == "dispatch-managament"){?>active-menu<?php }?>">Master Management <i class="fa fa-caret-down" aria-hidden="true"></i> </a>
              <ul class="cust-dropdown">
                   
              <li><a id="department" href="<?=base_url()?>department-management" class="dropdown-item">Department Management</a></li>
                  <li><a id="designation" href="<?=base_url()?>designation-management" class="dropdown-item">Designation Management</a></li>
                  <li><a id="rack_management" href="<?=base_url()?>rack-management" class="dropdown-item">Rack Management</a></li>
           
                  <li><a id="bin_management" href="<?=base_url()?>bin-card-management" class="dropdown-item">Bin Card Management</a></li>
                  <li><a id="unit-management" href="<?=base_url()?>unit-management" class="dropdown-item">Unit Management</a></li> <li><a href="<?=base_url()?>rack-list" class="dropdown-item">Rack List</a></li>
                  <li><a id="material_management" href="<?=base_url()?>material-management" class="dropdown-item">Material Management</a></li>
                  <li><a id="add_window_type" href="<?=base_url()?>window-series-management" class="dropdown-item">Food Series Management</a></li>
                
                <li><a id="add_window" href="<?=base_url()?>window-type-management" class="dropdown-item">Food Type Management</a></li>
                <li><a id="window_assets" href="<?=base_url()?>window-assets-management" class="dropdown-item">Food Assets Management</a></li>
                  <li><a id="finish_management" href="<?=base_url()?>finish-type-management" class="dropdown-item"> Finish Management</a></li>
                  <li><a id="add-finish-type" href="<?=base_url()?>finish-color-code-management" class="dropdown-item">Finish Color Code Management</a></li>
                  <li><a id="specification_management" href="<?=base_url()?>specification-management" class="dropdown-item"> Specification Management</a></li>
             
             
                  <li><a id="particular" href="<?=base_url()?>particulars-managament" class="dropdown-item">Particulars Management</a></li>
                  <li><a id="dispatch" href="<?=base_url()?>dispatch-managament" class="dropdown-item">Dispatch Management</a></li>-->
                
                  <!-- <li><a id="specification_management" href="<?=base_url()?>add-specification" class="dropdown-item"> Specification Management</a></li> -->
                  <!-- <li><a href="<?=base_url()?>specification-list" class="dropdown-item">Specification List</a></li> -->
              <!--</ul>
            </li> 
            <li class="hover-dropdown-g">
              <a href="javascript:void(0)" class="dropdown-toggle <?php if($this->uri->segment(1) == "vendor-management"){?>active-menu<?php }?>
">Vendor Management <i class="fa fa-caret-down" aria-hidden="true"></i></a>
              <ul class="cust-dropdown">
                  <li><a id="vendor_management" href="<?=base_url()?>vendor-management" class="dropdown-item">Vendor Management</a></li>
                        
                </ul>
            </li>
            <li class="hover-dropdown-g">
              <a href="javascript:void(0)" class="dropdown-toggle <?php if($this->uri->segment(1) == "add-transporter" || $this->uri->segment(1) == "add-vehicle"){?>active-menu<?php }?>
">Transporter Management <i class="fa fa-caret-down" aria-hidden="true"></i></a>
              <ul class="cust-dropdown">
                  <li><a id="transport_management" href="<?=base_url()?>transporter-management" class="dropdown-item">Transporter Management</a></li>                 
                  <li><a id="vehicle_management" href="<?=base_url()?>vehicle-management" class="dropdown-item">Vehicle Management</a></li>
                 
                </ul>
            </li>
            <li class="hover-dropdown-g">
              <a href="javascript:void(0)" class="dropdown-toggle <?php if($this->uri->segment(1) == "create-order" | $this->uri->segment(1) == "list-of-order" ){?>active-menu<?php }?>">Manage Order  <i class="fa fa-caret-down" aria-hidden="true"></i></a>
              <ul class="cust-dropdown">
                  <li><a id="create_order" href="<?=base_url()?>create-order" class="dropdown-item">Create Order</a></li>
                  <li><a id="list_of_order" href="<?=base_url();?>list-of-order" class="dropdown-item">List of Order</a></li>
              </ul>
            </li>-->
			<li class="hover-dropdown-g">
              <a href="javascript:void(0)" class="dropdown-toggle <?php if($this->uri->segment(1) == "new_verifications" || $this->uri->segment(1) == "blended-student-list" || $this->uri->segment(1) == "new-pending-list" || $this->uri->segment(1) == "new-pending-document-list"){?>active-menu<?php }?>">New Verifications  <i class="fa fa-caret-down" aria-hidden="true"></i></a>
              <ul class="cust-dropdown">
                  <li><a id="create_order" href="<?=base_url()?>new_verifications" class="dropdown-item">All Admissions </a></li>
                  <li><a id="list_of_order" href="<?=base_url();?>blended-student-list" class="dropdown-item">Blended student list</a></li>
                  <li><a id="list_of_order" href="<?=base_url();?>new-pending-list" class="dropdown-item">New Pending List</a></li>
                  <li><a id="list_of_order" href="<?=base_url();?>new-pending-document-list" class="dropdown-item">New Pending for Document List</a></li>
              </ul>
            </li> 
			
			<li class="hover-dropdown-g">
              <a href="javascript:void(0)" class="dropdown-toggle <?php if($this->uri->segment(1) == "verified_student_list" || $this->uri->segment(1) == "verified-blended-student-list"){?>active-menu<?php }?>">Verified List  <i class="fa fa-caret-down" aria-hidden="true"></i></a>
              <ul class="cust-dropdown">
                  <li> <a id="list_of_order" href="<?=base_url();?>verified_student_list" class="dropdown-item ">All Students</a></li>
                  <li><a id="list_of_order" href="<?=base_url();?>verified-blended-student-list" class="dropdown-item">Blended Student List</a></li>
              </ul>
            </li> 
			<li class="hover-dropdown-g">
              <a href="javascript:void(0)" class="dropdown-toggle <?php if($this->uri->segment(1) == "rejected_student_list" || $this->uri->segment(1) == "rejected-blended-student-list"){?>active-menu<?php }?>">Rejected List  <i class="fa fa-caret-down" aria-hidden="true"></i></a>
              <ul class="cust-dropdown">
                  <li>  <a id="reject" href="<?=base_url();?>rejected_student_list" class="dropdown-item">Rejected Verification</a></li>
                  <li><a id="list_of_order" href="<?=base_url();?>rejected-blended-student-list" class="dropdown-item">Blended Rejected List</a></li>
              </ul>
            </li> 
            
            


             
            <!-- <li class="hover-dropdown-g ">
              <a href="javascript:void(0)" class="dropdown-toggle <?php if($this->uri->segment(1) == "new_verifications" | $this->uri->segment(1) == "Policy-list" ){?>active-menu<?php }?>">Document Management  <i class="fa fa-caret-down" aria-hidden="true"></i></a>
              <ul class="cust-dropdown">
                  <li><a id="create_order" href="<?=base_url()?>new_verifications" class="dropdown-item">New Verifications </a></li>
                  <li><a id="list_of_order" href="<?=base_url();?>verified_student_list" class="dropdown-item">Verified Students</a></li> 
                </ul>
            </li>  -->
            
  
          </ul>
        </div>
        <!-- sidebar-menu  -->
      </div>
      <!-- sidebar-content  -->
  
    </nav>
    <!-- sidebar-wrapper  -->
    <main class="page-content">
  
