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
.bus_faculty_form-div{
    width:95%;
    height:95%;
    display:inline-block; 
    /*border: 2px solid black;*/
}
.left{
    float:left;
    padding-top:0%;
    padding-left:3%;
}
.right{
    float:right;
    padding-top:3%;
    padding-right:2%;
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
        size: A4 Portrait;
        margin: 1m 1mm 1mm 1mm;
        /*margin: 1mm 1mm 1mm 1mm;*/
    }

         @media print
   {
       span{border:none}
    * {-webkit-print-color-adjust:exact;}      
   }
</style>
 <!--main div-->
 <div class="bus_faculty_form-div">
 <center> <span style="font-size:1.1em;font-weight:500;"><u>BUS FACULTY FORM</u></span></center><br>
 <span style="float:right;">Sr No____________</span><br><br>
 <table style ="width:94%">
     <tr>
         <td>Gen.Reg.No <?php echo $gr_number ;?> </td>
         <td>ID No <?php echo $stud_roll ;?></td>
         <td style="width:39%">Date:</td>
     </tr>
 </table><br>
 <!--<div style="display:inline;">
 <span style=" display:inline;">Gen.Reg.No</span>
<span style="display:inline;">ID No</span>
<span style=" display:inline;">Date:</span>
</div><br><br>-->
<div style="text-align:left;float:left;width:97%;padding-left:3%;">Student's Name' <span class="slip-input1" style="min-width:344px;"><?php echo $stud_name ;?></span></div><br><br>
<p class="div-input1">Std<span class="slip-input1"><?php echo $stud_std ;?>&nbsp;</span> Div<span class="slip-input1"><?php echo $stud_div ;?>&nbsp;</span>Roll No<span class="slip-input1"><?php echo $stud_roll ;?></span></p><br><br><hr>
<div><span  class="div-input1">To</span><br>
<span  class="div-input1">The Headmistress</span><br>
<span  class="div-input1">S.H.V.O Vidyalaya</span><br>
<span  class="div-input1">Bhivandi</span></div><br>
<center>Subject:School Bus facility for the year 2017-2018</center><br><br>
<span  class="div-input1">Respected Madam,</span><br><br>
<div style="text-align:left;float:left;width:97%;padding-left:3%;">I Mr / Mrs <span class="slip-input1" style="min-width:344px;"><?php echo $stud_name ;?></span>would like to use bus facility for</div><br><br>
<p class="div-input1"> my Son/Daughter  <span class="slip-input1"><?php echo $parent_name ;?> &nbsp;</span>studying in std<span class="slip-input1"><?php echo $stud_std ;?>&nbsp;</span> I.D  &nbsp;<span class="slip-input1"></span></p><br><br>
<p class="div-input1">for the academic year 2017-2018</p><br><br>
<p class="div-input1">I am ready to pay half year / full year fschool bus fee Hence I request you to please accept  </p><br><br>
<p class="div-input1"> and allowed my child to use bus facility for <span class="slip-input1"></span> as stated. </p><br><br>
<p class="div-input1">Address <span class="slip-input1"><?php echo $stud_addr ;?></span></p><br><br>
<p class="div-input1"> <span class="slip-input1"></span> </p><br><br>
<p class="div-input1">Phone No: <span class="slip-input1"></span> </p><br><br>
<span style="float:right;">Parents Signature</span><br><br><hr>
<center> <span style="font-size:1.1em;font-weight:500;"><u>FOR OFFICE USE ONLY</u></span></center><br>
<div style="text-align:left;float:left;width:97%;padding-left:3%;">Remark by clerk <span class="slip-input1" style="min-width:344px;"></span></div><br><br>
<p class="div-input1">Collected the following</p><br><br>
<p class="div-input1">I.Card with holder</p><br><br>
<p class="div-input1">Photocopy of Previous Year Fee Paid receipt</p><br><br>
<!--<ul>
    <li style="float:left;">I.Card with holder</li>
    <li style="float:left;">Photocopy of Previous Year Fee Paid receipt</li>
</ul><br><br>-->
<p class="div-input1">Remark by Bus in charge  <span class="slip-input1"></span>Seat No: <span class="slip-input1"></span></p><br><br>
<p class="div-input1">Remark by Headmistress  <span class="slip-input1"></span>Seat No: <span class="slip-input1"></span></p><br><br><br><br><br><br><hr>
<center> <span style="font-size:1.1em;font-weight:500;"><u>PARENT COPY</u></span></center><br>
<div style="text-align:left;float:left;width:97%;padding-left:3%;">Bus facility to Mst / Ms <span class="slip-input1" style="min-width:344px;"><?php echo $stud_name ;?></span></div><br><br>
<p class="div-input1">std<span class="slip-input1"><?php echo $stud_std ;?>&nbsp;</span>Div<span class="slip-input1"><?php echo $stud_div ;?>&nbsp;</span> I.D<span class="slip-input1"></span>will be provided in the year 2017-2018</p><br><br>
<p class="div-input1">Bus Stop<span class="slip-input1"></span>Seat No:<span class="slip-input1"></span></p><br><br>
<p class="div-input1"><span>Note:</span>Submit following cumpulsorily with this form</p><br><br>
<p class="div-input1"> 1 I.Card with holder</p><br><br>
<p class="div-input1"> 2 Photocopy of Previous Year Fee Paid receipt</p><br><br>
<span style="float:right;">School Stamp</span>
   </div>
  </section>

    <!--end-->