<?php include('header.php');?>

<style>

.tab {overflow: hidden; border: 1px solid #ccc; 

background-color: #f1f1f1;}



.tabcontent {display: none; padding: 6px 12px; border: 1px solid #ccc;

    border-top: none;}

    

.tab button {background-color: inherit; float: left; border: none;

    outline: none; cursor: pointer; 

    transition: 0.3s;}

    

.tab button:hover {background-color: #ddd;}



.tab .active {background-color: #ccc;}



.tabcontent {display: none; padding: 6px 12px;



border: 1px solid #ccc; border-top: none;}



table {font-family: arial, sans-serif; border-collapse: collapse;

    width: 100%;}



td, th {border: 1px solid #dddddd; padding: 8px; 

    text-align: center;}



/*Change color to gray*/

tr:nth-child(even) {

    background-color: #dddddd;}



.actived a{color:green}

.actived a:hover{ font-weight: bold}



.deactivated a{color:red}

.deactivated a:hover{ font-weight: bold}



.available {color:green; }

.disable{ color: red; font-weight: bold}

.intraining{color: blue; font-weight: bold}

.vacation{ font-weight: bold}



</style>

<section>









<div class="container w3-animate-opacity mt-5">

	<div class="tab">

  <button class="tablinks" onclick="openCity(event, 'self_assessment')">Self Assessment Student</button>

  <button class="tablinks" onclick="openCity(event, 'teacher_assessment')">Teacher Assessment</button>

  <button class="tablinks" onclick="openCity(event, 'assignment')">Assignment</button>

</div>

<div id="self_assessment" class="tabcontent">

<table 

            style="width:100%"

            id="example"

            class="table table_account table-striped datatable_parent">

            <thead class="">

                <h4 class="statement_title title_padding">Self Assessment Student</h4>

                <tr class="">

                    <th >Sr No</th>

                    <th>Year/Sem</th> 

                    <th> Student Name</th>

                    <th> File </th>

                </tr>

            </thead>

            <tbody>

                <?php //print_r($self_assement);

             if(!empty($self_assement)){

                $i=1;

                foreach($self_assement as $self_assement){

                   ?>

                <tr>

                    <td class="center"><?=$i?></td>



                    <td><?=$self_assement->year_sem?></td>

                    <td><?=$self_assement->student_name?></td>

                  

                    <td><a href="<?=$this->Digitalocean_model->get_photo('uploads/assessment_form_seperate_student/self_assement/'.$self_assement->file)?>" target="_blank"><i class="mdi mdi-eye"></i></a></td>

                    



                </tr>

            <?php $i++; }} else{ ?>

                <tr>

                    <td class="text-center" colspan="7">No Data Available</td>

                </tr>

                <?php } ?>

               

            </tbody>

        </table>





</div>



<div id="teacher_assessment" class="tabcontent w3-animate-opacity">

<table

            id="student_table"

            style="width:100%"

            class="table table_account table-striped datatable_parent">

            <thead class="">

                <h4 class="statement_title title_padding">Teacher Assessment </h4>

                <tr class="">

                <tr class="">

                    <th>Sr No</th>

                    <th>Year/Sem</th> 

                    <th> Student Name</th>

                    <th> File </th>

                </tr>



                </tr>

            </thead>

            <tbody>

                <?php //print_r($self_assement);

             if(!empty($teacher_assement)){

                $i=1;

                foreach($teacher_assement as $teacher_assement_result){

                   ?>

                <tr>

                    <td class="center"><?=$i?></td>



                    <td><?=$teacher_assement_result->year_sem?></td>

                    <td><?=$teacher_assement_result->student_name?></td>

                  

                    <td><a href="<?=$this->Digitalocean_model->get_photo('uploads/assessment_form_seperate_student/teacher_assement/'.$teacher_assement_result->file)?>" target="_blank"><i class="mdi mdi-eye"></i></a></td>

                    



                </tr>

            <?php $i++; }} else{ ?>

                <tr>

                    <td class="text-center" colspan="7">No Data Available</td>

                </tr>

                <?php } ?>

               

            </tbody>

        </table>

</div>



<div id="assignment" class="tabcontent w3-animate-opacity">

<table

            id="separate_student_table"

            class="table table_account table-striped datatable_parent" 

            style="width:100%">

            <thead class="">

            <h4 class="statement_title title_padding">Assignment</h4>

             

            <tr class="">

                    <th>Sr No</th>

                    <th>Year/Sem</th> 

                     <th> Title</th>

                    <th> Student Name</th>

                    <th> File </th>

                </tr>

            </thead>

            </tr>

            </thead>

            <tbody>

                <?php //print_r($self_assement);

             if(!empty($assignment)){

                $i=1;

                foreach($assignment as $assignment_result){

                   ?>

                <tr>

                    <td class="center"><?=$i?></td>



                    <td><?=$assignment_result->year_sem?></td>

                    <td><?=$assignment_result->assignment_title?></td>

                 

                   

                    <td><?=$assignment_result->student_name?></td>

                  

                    <td><a href="<?=$this->Digitalocean_model->get_photo('uploads/assessment_form_seperate_student/assignment/'.$assignment_result->file)?>" target="_blank"><i class="mdi mdi-eye"></i></a></td>

                    



                </tr>

            <?php $i++; }} else{ ?>

                <tr>

                    <td class="text-center" colspan="7">No Data Available</td>

                </tr>

                <?php } ?>

               

            </tbody>

        </table>

</div>

</div>









    <div class="container-fluid  table-responsive-sm">



    </div>

</section>

<?php include('footer.php');

$id = 0;

if($this->uri->segment(2) !=""){

	$id = $this->uri->segment(2);

}

?>

<script

    src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.2/Chart.min.js"></script>

<script>

    $(document).ready(function () {

        var table = $('#example').DataTable({

            "lengthChange": false,

            "processing": true,

            "serverSide": false,

            "responsive": true,

            "cache": false,

            "order": [

                [0, "asc"]

            ],

            buttons: [



                {

                    extend: "excelHtml5",

                    title: 'Data in Table Format (Center)',

                    messageBottom: 'The information in this table is copyright to Bir Tikendrajeet University.',

                    exportOptions: {

                        columns: [

                            0,

                            1,

                            2,

                            3,

                            4,

                            5,

                            6

                        ],

                        modifier: {

                            search: 'applied',

                            order: 'applied'

                        }

                    }

                }

            ],

            dom: "Bfrtip",



            "complete": function () {

                $('[data-toggle="tooltip"]').tooltip();

            }

        });

        //table.buttons().container().appendTo( '#example_wrapper:eq(0)' );

    });

</script>

<script>

    $(document).ready(function () {



        var table = $('#student_table').DataTable({

            "lengthChange": false,

            "processing": true,

            "serverSide": false,

            "responsive": true,

            "cache": false,

            "order": [

                [0, "asc"]

            ],

            buttons: [



                {

                    extend: "excelHtml5",

                    title: 'Data in Table Format (Student)',

                    messageBottom: 'The information in this table is copyright to Bir Tikendrajeet University.',

                    exportOptions: {

                        columns: [

                            0,

                            1,

                            2,

                            3,

                            4,

                            5,

                            6,

                            7,

                            8,

                            9

                        ],

                        modifier: {

                            search: 'applied',

                            order: 'applied'

                        }

                    }

                }

            ],

            dom: "Bfrtip",



            "complete": function () {

                $('[data-toggle="tooltip"]').tooltip();

            }

        });

        //table.buttons().container().appendTo( '#example_wrapper:eq(0)' );

    });

</script>

<script>

    $(document).ready(function () {

        var table = $('#separate_student_table').DataTable({

            "lengthChange": false,

            "processing": true,

            "serverSide": false,

            "responsive": true,

            "cache": false,

            "order": [

                [0, "asc"]

            ],

            buttons: [



                {

                    extend: "excelHtml5",

                    title: 'Data in Table Format (Seperate Student)',

                    messageBottom: 'The information in this table is copyright to Bir Tikendrajeet University.',

                    exportOptions: {

                        columns: [

                            0,

                            1,

                            2,

                            3,

                            4,

                            5,

                            6,

                            7,

                            8,

                            9

                        ],

                        modifier: {

                            search: 'applied',

                            order: 'applied'

                        }

                    }

                }

            ],

            dom: "Bfrtip",



            "complete": function () {

                $('[data-toggle="tooltip"]').tooltip();

            }

        });

        //table.buttons().container().appendTo( '#example_wrapper:eq(0)' );

    });

</script>

<!-- <script>

	function openCity(evt, cityName) {

    var i, tabcontent, tablinks;

    tabcontent = document.getElementsByClassName("tabcontent");

    for (i = 0; i < tabcontent.length; i++) {

        tabcontent[i].style.display = "none";}

        

    tablinks = document.getElementsByClassName("tablinks");

    for (i = 0; i < tablinks.length; i++) {

        tablinks[i].className = tablinks[i].className.replace("active", "");}



document.getElementById(cityName).style.display = "block";

    evt.currentTarget.className += " active";}

</script> -->

<script>
    function openCity(evt, cityName) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        tablinks = document.getElementsByClassName("tablinks");
        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].className = tablinks[i].className.replace("active", "");
        }

        document.getElementById(cityName).style.display = "block";
        if (evt) {
            evt.currentTarget.className += " active";
        }
    }

    // Call the openCity function with the first tab as the default when the page loads
    openCity(null, 'self_assessment');
</script>

