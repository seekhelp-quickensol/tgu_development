<?php if($this->session->flashdata('success') !=""){?>
        <div class="alert alert-success animated fadeInUp text-center">
            <strong class="">Success ✅ <br></strong> <?=$this->session->flashdata('success')?>
        </div>
    <?php }else if($this->session->flashdata('message') !=""){?>
        <div class="alert alert-danger animated fadeInUp">
            <strong>Error!</strong> <?=$this->session->flashdata('message')?>
        </div>
    <?php }elseif(validation_errors()!=''){?>
        <div class="alert alert-danger animated fadeInUp">
            <strong>Error!</strong> <?=validation_errors()?>
        </div>
    <?php }?>
   

<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Add Document </h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
      <form action="" method="post" id="add_name" novalidate="novalidate">
                        <div class="form-group">
                            <label for="email">Name</label>
                            <input type="text" name="text" id="add_name" class="form-control" placeholder="Add Name" />
                        </div>

                        <div class="row">
                            <div class="col-12 text-center">
                                <button class="btn-facility">Submit</button>
                            </div>
                        </div>
                    </form>

      </div>

      <!-- Modal footer -->
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div> -->

    </div>
  </div>
</div>



</main>



</body> 
<link rel="stylesheet" href=" https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">

<!--<script src="<?=base_url();?>admin_assets/js/popper.min.js"></script>-->

<!-- <script src="<?=base_url();?>assets/js/bootstrap.bundle.min.js"></script> -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script> -->
<script src="https://code.jquery.com/jquery-2.1.3.min.js" integrity="sha256-ivk71nXhz9nsyFDoYoGf2sbjrR9ddh+XDkCcfZxjvcM=" crossorigin="anonymous"></script>
<script src="<?=base_url();?>admin_assets/js/bootstrap.bundle.min.js"></script>
<script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.14.0/jquery.validate.js"></script>
<script src="<?=base_url();?>admin_assets/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url();?>admin_assets/js/summernote-bs4.min.js"></script>
<script src="<?=base_url();?>admin_assets/js/dataTables.buttons.min.js"></script>
<script src="<?=base_url();?>admin_assets/js/jszip.min.js"></script>
<script src="<?=base_url();?>admin_assets/js/pdfmake.min.js"></script>
<script src="<?=base_url();?>admin_assets/js/buttons.html5.min.js"></script>  
<script>
// $(".sidebar-dropdown > a").click(function() {
//   $(".sidebar-submenu").slideUp(200);
//   if (
//     $(this)
//       .parent()
//       .hasClass("active")
//   ) {
//     $(".sidebar-dropdown").removeClass("active");
//     $(this)
//       .parent()
//       .removeClass("active");
//   } else {
//     $(".sidebar-dropdown").removeClass("active");
//     $(this)
//       .next(".sidebar-submenu")
//       .slideDown(200);
//     $(this)
//       .parent()
//       .addClass("active");
//   }
// });

// $("#close-sidebar").click(function() {
//   $(".page-wrapper").removeClass("toggled");
// });
// $("#show-sidebar").click(function() {
//   $(".page-wrapper").addClass("toggled");
// });


</script>
<script>

document.addEventListener('keydown', function() {
  if (event.keyCode == 123) {
    alert("Sorry! you can not do this.");
    return false;
  } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) {
    alert("Sorry! you can not do this.");
    return false;
  } else if (event.ctrlKey && event.keyCode == 85) {
    alert("Sorry! you can not do this.");
    return false;
  }
}, false);

if (document.addEventListener) {
  document.addEventListener('contextmenu', function(e) {
    alert("Sorry! you can not do this.");
    e.preventDefault();
  }, false);
} else {
  document.attachEvent('oncontextmenu', function() {
    alert("Sorry! you can not do this.");
    window.event.returnValue = false;
  });
}
$(document).keydown(function(e){
    if(e.which === 123){
       return false;
    }
});


document.addEventListener('keydown', function() {
  if (event.keyCode == 123) {
    alert("Sorry! you can not do this.");
    return false;
  } else if (event.ctrlKey && event.shiftKey && event.keyCode == 73) {
    alert("Sorry! you can not do this.");
    return false;
  } else if (event.ctrlKey && event.keyCode == 85) {
    alert("Sorry! you can not do this.");
    return false;
  }
}, false);

if (document.addEventListener) {
  document.addEventListener('contextmenu', function(e) {
    alert("Sorry! you can not do this.");
    e.preventDefault();
  }, false);
} else {
  document.attachEvent('oncontextmenu', function() {
    alert("Sorry! you can not do this.");
    window.event.returnValue = false;
  });
}
$(document).keydown(function(e){
    if(e.which === 123){
       return false;
    }
});
$('input').on('keypress', function (event) {
    var regex = new RegExp("^[a-zA-Z0-9 @ & .]+$");
    var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
    if (!regex.test(key)) {
       event.preventDefault();
       return false;
    }
});
$(document).on('keydown', function(e) {
    if((e.ctrlKey || e.metaKey) && (e.key == "p" || e.charCode == 16 || e.charCode == 112 || e.keyCode == 80) ){
        alert("Please use the Print PDF button below for a better rendering on the document");
        e.cancelBubble = true;
        e.preventDefault();

        e.stopImmediatePropagation();
    }  
});
  $('.dropdown-menu a.dropdown-toggle').on('click', function(e) {
  if (!$(this).next().hasClass('show')) {
    $(this).parents('.dropdown-menu').first().find('.show').removeClass("show");
  }
  var $subMenu = $(this).next(".dropdown-menu");
  $subMenu.toggleClass('show');


  $(this).parents('li.nav-item.dropdown.show').on('hidden.bs.dropdown', function(e) {
    $('.dropdown-submenu .show').removeClass("show");
  });


  return false;
});
</script>

<script>
const displayTime = document.querySelector(".display-time");
// Time
// function showTime() {
//   let time = new Date();
//   displayTime.innerText = time.toLocaleTimeString("en-US", { hour12: false });
//   setTimeout(showTime, 1000);
// }

//showTime();

// Date
// function updateDate() {
//   let today = new Date();

//   // return number
//   let dayName = today.getDay(),
//     dayNum = today.getDate(),
//     month = today.getMonth(),
//     year = today.getFullYear();

//   const months = [
//     "January",
//     "February",
//     "March",
//     "April",
//     "May",
//     "June",
//     "July",
//     "August",
//     "September",
//     "October",
//     "November",
//     "December",
//   ];
//   const dayWeek = [
//     "Sunday",
//     "Monday",
//     "Tuesday",
//     "Wednesday",
//     "Thursday",
//     "Friday",
//     "Saturday",
//   ];
//   // value -> ID of the html element
//   const IDCollection = ["day", "daynum", "month", "year"];
//   // return value array with number as a index
//   const val = [dayWeek[dayName], dayNum, months[month], year];
//   for (let i = 0; i < IDCollection.length; i++) {
//     document.getElementById(IDCollection[i]).firstChild.nodeValue = val[i];
//   }
// }

//updateDate();

</script>

<script>
//   var myDate = new Date();
// var hrs = myDate.getHours();

// var greet;

// if (hrs < 12)
//   greet = 'Good Morning';
// else if (hrs >= 12 && hrs <= 17)
//   greet = 'Good Afternoon';
// else if (hrs >= 17 && hrs <= 24)
//   greet = 'Good Evening';
//   else if (hrs >= 24 && hrs <= 12)
//   greet = 'Good Night';

// document.getElementById('greetings').innerHTML = greet;

// window.onload = function() {
//   clock();  
//     function clock() {
//     var now = new Date();
//     var TwentyFourHour = now.getHours();
//     var hour = now.getHours();
//     var min = now.getMinutes();
//     var sec = now.getSeconds();
//     var mid = 'pm';
//     if (min < 10) {
//       min = "0" + min;
//     }
//     if (hour > 12) {
//       hour = hour - 12;
//     }    
//     if(hour==0){ 
//       hour=12;
//     }
//     if(TwentyFourHour < 12) {
//        mid = 'am';
//     }     
//   document.getElementById('currentTime').innerHTML =     hour+':'+min+' '+mid ;
//     setTimeout(clock,0);
//     }
// }

</script>

<!-- show hide password -->
<script>
//   $(document).ready(function() {
//     $("#show_hide_password a").on('click', function(event) {
//         event.preventDefault();
//         if($('#show_hide_password input').attr("type") == "text"){
//             $('#show_hide_password input').attr('type', 'password');
//             $('#show_hide_password i').addClass( "fa-eye-slash" );
//             $('#show_hide_password i').removeClass( "fa-eye" );
//         }else if($('#show_hide_password input').attr("type") == "password"){
//             $('#show_hide_password input').attr('type', 'text');
//             $('#show_hide_password i').removeClass( "fa-eye-slash" );
//             $('#show_hide_password i').addClass( "fa-eye" );
//         }
//     });
// });


</script>
<!-- <script>
  $.fn.dataTable.ext.errMode = 'throw';
</script> -->

<script>
$('.dropdown-toggle ').click(function(){
  // alert('Yes');
  $(this).closest('.hover-dropdown-g').find('.cust-dropdown').slideToggle();
})

$(".alert").fadeTo(3000, 500).slideUp(500, function(){
        $(".alert").slideUp(300);
    });
</script>

</html>