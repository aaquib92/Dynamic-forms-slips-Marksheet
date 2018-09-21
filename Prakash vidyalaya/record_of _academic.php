<?php
$global_arr = array();
$academic_year = "";
$id = "";
if( isset($data['stud_id']))
{
  $id = $stud_id;
  $global_arr = get_student_by_id($id);
}

$academic_year = (date('m') < 6) ?((date('Y')-1)." - ".date('Y')):date('Y')." - ".(date('Y')+1);

$global_arr['student_credentials']['mobile'] = !(isset($global_arr['student_credentials']['mobile']) || empty($global_arr['student_credentials']['mobile'])) ?'':FALSE;
$global_arr['student_details'][0]['phone'] = (isset($global_arr['student_details'][0]['phone']) && !empty($global_arr['student_details'][0]['phone'])) ?''.$global_arr['student_details'][0]['phone'].'':$global_arr['student_credentials']['mobile'];
$global_arr['parent_details'][0]['phone'] = (isset($global_arr['parent_details'][0]['phone']) && !empty($global_arr['parent_details'][0]['phone'])) ?''.$global_arr['parent_details'][0]['phone'].'':'';
$parent_name    = (isset($global_arr['parent_details'][0]['first_name']) && !empty($global_arr['parent_details'][0]['first_name']))?strtoupper(''.$global_arr['parent_details'][0]['first_name'].'  '.$global_arr['parent_details'][0]['last_name'].''):'';
$stud_name    = (isset($global_arr['student_details'][0]['first_name']) && !empty($global_arr['student_details'][0]['first_name']))?strtoupper(''.$global_arr['student_details'][0]['first_name'].'  '.$global_arr['student_details'][0]['last_name'].''):'';
$stud_nationality    = (isset($global_arr['student_details'][0]['nationality']) && !empty($global_arr['student_details'][0]['nationality']))?''.$global_arr['student_details'][0]['nationality'].'':'';
$gr_number    = (isset($global_arr['student_details'][0]['gr_number']) && !empty($global_arr['student_details'][0]['gr_number']))?''.$global_arr['student_details'][0]['gr_number'].'':'';
$aadhar_no    = (isset($global_arr['student_details'][0]['aadhar_no']) && !empty($global_arr['student_details'][0]['aadhar_no']))?''.$global_arr['student_details'][0]['aadhar_no'].'':'';
$dob    = (isset($global_arr['student_details'][0]['dob']) && !empty($global_arr['student_details'][0]['dob']))?''.$global_arr['student_details'][0]['dob'].'':'';
$place_of_birth    = (isset($global_arr['student_details'][0]['place_of_birth']) && !empty($global_arr['student_details'][0]['place_of_birth']))?''.$global_arr['student_details'][0]['place_of_birth'].'':'';
$admission_year   = (isset($global_arr['student_details'][0]['admission_year']) && !empty($global_arr['student_details'][0]['admission_year']))?''.$global_arr['student_details'][0]['admission_year'].'':'';
$religion    = (isset($global_arr['student_details'][0]['religion']) && !empty($global_arr['student_details'][0]['religion']))?''.$global_arr['student_details'][0]['religion'].'':'';
$caste   = (isset($global_arr['student_details'][0]['caste']) && !empty($global_arr['student_details'][0]['caste']))?''.$global_arr['student_details'][0]['caste'].'':'';
$stud_img     = (isset($global_arr['student_details'][0]['image']) && !empty($global_arr['student_details'][0]['image']))?''.$global_arr['student_details'][0]['image'].'':'';
$stud_class   = (isset($global_arr['student_selected_class'][0]['standard']) && !empty($global_arr['student_selected_class'][0]['standard']))?''.$global_arr['student_selected_class'][0]['standard'].' '.$global_arr['student_selected_class'][0]['section']:'';
$stud_std   = (isset($global_arr['student_selected_class'][0]['standard']) && !empty($global_arr['student_selected_class'][0]['standard']))?''.$global_arr['student_selected_class'][0]['standard']:'';
$stud_div   = (isset($global_arr['student_selected_class'][0]['section']) && !empty($global_arr['student_selected_class'][0]['section']))?''.$global_arr['student_selected_class'][0]['section']:'';
$stud_dob     = (isset($global_arr['student_details'][0]['dob']) && !empty($global_arr['student_details'][0]['dob']))?''.date("d/m/Y", strtotime($global_arr['student_details'][0]['dob'])).'':'';
$stud_roll    = (isset($global_arr['student_details'][0]['rollno']) && !empty($global_arr['student_details'][0]['rollno']))? $global_arr['student_details'][0]['rollno'] : '';
$stud_admi_no = (isset($global_arr['student_details'][0]['admission_user_id']) && !empty($global_arr['student_details'][0]['admission_user_id']))?''.$global_arr['student_details'][0]['admission_user_id']:'';
$stud_phone   = (isset($global_arr['student_details'][0]['phone']) && !empty($global_arr['student_details'][0]['phone']))?''.$global_arr['student_details'][0]['phone'].'':$global_arr['parent_details'][0]['phone'];
$stud_addr    = (isset($global_arr['student_details'][0]['address']) && !empty($global_arr['student_details'][0]['address']))?''.$global_arr['student_details'][0]['address'].'':'';
// $stud_school_name = (isset($global_arr['school_info']['partner_name']) && !empty($global_arr['school_info']['partner_name']))?''.$global_arr['school_info']['partner_name'].'':'';
$stud_school_name = get_session_data()['profile']['partner_name'];
// $stud_school_addr = (isset($global_arr['school_info']['address']) && !empty($global_arr['school_info']['address']))?''.$global_arr['school_info']['address'].'':'';
$stud_school_addr = get_session_data()['profile']['address'];
// $stud_school_logo = (isset($global_arr['school_info']['logo']) && !empty($global_arr['school_info']['logo']))?''.$global_arr['school_info']['logo'].'':get_session_data()['profile']['logo'];
$stud_school_logo = get_session_data()['profile']['logo'];
//  echo print_array($global_arr);die;
?>

<section onload="setTimeout(myFunction(), 3000)">

<style>
.record-acad-div{
    width:47%;
    height:95%;
    display:inline-block; 
    /*background-color:#FFF176;*/
    background: #FFF176; /* For browsers that do not support gradients */
    background: -webkit-linear-gradient(#FFF176, white); /* For Safari 5.1 to 6.0 */
    background: -o-linear-gradient(#FFF176, white); /* For Opera 11.1 to 12.0 */
    background: -moz-linear-gradient(#FFF176, white); /* For Firefox 3.6 to 15 */
    background: linear-gradient(#FFF176, white);  Standard syntax (must be last) 
    float:left;
}
  
  .record-acad-div2{
    width:47%;
    height:95%;
    display:inline-block; 
    background: #FFF176; /* For browsers that do not support gradients */
    background: -webkit-linear-gradient(#FFF176, white); /* For Safari 5.1 to 6.0 */
    background: -o-linear-gradient(#FFF176, white); /* For Opera 11.1 to 12.0 */
    background: -moz-linear-gradient(#FFF176, white); /* For Firefox 3.6 to 15 */
    background: linear-gradient(#FFF176, white);  Standard syntax (must be last) 
   float:right;
   
}
  

.div-input1{
margin:0 auto;float:left; padding-left:3%; 
}
.slip-input1 {
        min-width: 100px;
        border-bottom: 1px solid black;
        display: inline-block;
                }
                 @page {
        size:Landscape;
        margin:0;
    }

         @media print
   {
       span{border:none}
    * {-webkit-print-color-adjust:exact;} 
    body{
        background: #FFF176; /* For browsers that do not support gradients */
        background: -webkit-linear-gradient(#FFF176, white); /* For Safari 5.1 to 6.0 */
        background: -o-linear-gradient(#FFF176, white); /* For Opera 11.1 to 12.0 */
        background: -moz-linear-gradient(#FFF176, white); /* For Firefox 3.6 to 15 */
        background: linear-gradient(#FFF176, white);  Standard syntax (must be last)     
    }
    
         
   }
</style>
 <!--main div-->
 <div class="record-acad-div">
    <!--header-->
    <div class="head-div">
         <center>
            <img  width="650" height="30" src="<?=base_url()?>assets/images/header.jpg"><br><br>
             <span style="font-weight:700;font-size:1.2em">MATASHREE NAVRANGIDEVI MEMORIAL TRUST (REGD.)</span><br>
             <span style="font-size:1.6em;font-weight:700;color:blue;"><?php echo $stud_school_name ;?></span><br>
             <span style="font-size:1em;font-weight:300;"><?php echo $stud_school_addr ;?></span><br><br>
             <img  width="150" height="150" src="<?php echo $stud_school_logo ;?>"><br><br>
             <span style="font-weight:600;font-size:1.3em; color:#e57373; text-shadow: 1px 1px #e57373;">RECORD OF ACADEMIC PERFORMANCE</span><br>
             <span style="font-weight:600;font-size:1.3em; color:#e57373; text-shadow: 1px 1px #e57373;">Year <?php echo $academic_year ;?> </span><br><br>
         </center>
    </div><br><br>
    <!--<centter><span style="font-weight:600;font-size:1.1em">LEAVING CERTIFICATE</span></center><br><br>-->

         <div style="text-align:left;float:left;width:97%;padding-left:3%;">Name of Student:- &emsp; <span class="slip-input1"><?php echo $stud_name ;?></span></div><br><br>
         <p class="div-input1">Class:- &emsp; <span class="slip-input1"><?php echo $stud_class ;?></span> </p><br><br>
         <p class="div-input1">General Register No:- &emsp;<span class="slip-input1"><?php echo $gr_number ;?></span> Roll No:-  &emsp;<span class="slip-input1"><?php echo $stud_roll ;?>  </p><br><br>
         <p class="div-input1">Father's Name:- &emsp; <span class="slip-input1"><?php echo $parent_name ;?></span> </p><br><br>
          <p class="div-input1">Mother's Name:- &emsp; <span class="slip-input1"><?php echo $parent_name ;?></span> </p><br><br>
         <p class="div-input1">Date of Birth:- &emsp;  <span class="slip-input1"><?php echo $dob ;?></span> </p><br><br>
         <p class="div-input1">Address:- &emsp;  <span class="slip-input1"><?php echo $stud_addr ;?></span> </p><br><br>
         <p class="div-input1">Tel No:- &emsp; <span class="slip-input1"><?php echo $stud_phone ;?></span>Mobile No:- <span class="slip-input1"> <?php echo $stud_phone ;?></span></p><br><br>
         <img  width="650" height="70" src="<?=base_url()?>assets/images/footer.jpg" >
   </div>

<!--main div part 2-->


<div class="record-acad-div2">
    <!--header-->
    <div class="head-div">
         <center>
        <img  width="650" height="30" src="<?=base_url()?>assets/images/header.jpg" ><br><br>
             <span style="font-weight:700;font-size:1.2em;color:#e57373;">ATTENDANCE</span><br>
         </center>
    </div><br><br>
    <table border="1" style="font-size:0.9em;height:40%; width:25%">
        <tr>
            <td>Month</td>
            <td>June</td>
            <td>July</td>
            <td>Aug</td>
            <td>Sept</td>
            <td>Oct</td>
            <td>Nov</td>
            <td>Dec</td>
            <td>Jan</td>
            <td>Feb</td>
            <td>March</td>
            <td>April</td>
        </tr>
        <tr>
            <td>Total No of Working days</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Total No of present days</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Class Teacher's Sign</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Parent's Sign</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Head Master's Sign</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table><br><br>



<table border="1"  style="font-size:0.9em; height:30%;width:25%;">
    <tr>
        <td>GRADATION TABLE</td>
    </tr>
    <tr>
        <td>Marks</td>
        <td>91% to 100%</td>
        <td>81% to 90%</td>
        <td>71% to 80%</td>
        <td>61% to 70%</td>
        <td>51% to 60%</td>
        <td>41% to 50%</td>
        <td>33% to 40%</td>
        <td>21% to 32% </td>
        <td>Less than 20%</td>
    
    </tr>
    <tr>
        <td style="color=blue;">Grade</td>
        <td>A-1</td>
        <td>A-2</td>
        <td>B-1</td>
        <td>B-2</td>
        <td>C-1</td>
        <td>C-2</td>
        <td>D</td>
        <td>E-1</td>
        <td>E-2</td>
    </tr>
</table><br><br>
         <img  width="650" height="70" src="<?=base_url()?>assets/images/footer.jpg" >
   </div>




  <!--end-->



  </section>

    <!--end-->