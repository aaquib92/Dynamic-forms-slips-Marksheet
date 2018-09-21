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
.character-certificate-div{
    width:95%;
    height:95%;
    display:inline-block; 
    /*border: 1px solid black;*/
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
        /*margin: 1m 1mm 1mm 1mm;*/
        /*margin: 1mm 1mm 1mm 1mm;*/
    }

         @media print
   {
       span{border:none}
    * {-webkit-print-color-adjust:exact;}      
   }
</style>
 <!--main div-->
 <div class="character-certificate-div">
    <!--header-->
    <div class="head-div">
         <center>
             <span style="font-weight:600;font-size:1.1em"><?php echo $stud_school_name ;?></span><br>
             <span style="font-size:0.8em;font-weight:600;">CBSE/AFF/1130031/99/436-39</span><br>
             <span style="font-size:0.8em;font-weight:200;">Permanently NonGrant Basis</span><br>
             <span style="font-size:0.8em;font-weight:600;">Tel.:0251-2602872</span><br>
             <span style="font-size:0.8em;font-weight:200;">Email: rctamb@gmail.com</span>
         </center>
    </div><br><br>

         <!--end-->
         <!--section-->
         
      <center style="max-width:75%;">
    <span style="float:left; font-weight:bolder;">No.:</span>
    <span style="float:right; font-weight:bolder;">Date.:</span>
    </center><br><br>
    <center style="max-width:85%;"><span style="font-weight:600;font-size:1.1em">STUDY CONDUCT AND CHARACTER CERTIFICATE</span></center><br>
    <!--end-->
    <!--<center><h4 style="font-weight:500;font-size:1em">STUDY CONDUCT AND CHARACTER CERTIFICATE</h4></center><br>-->
    
<div style="text-align:left;float:left;width:97%;padding-left:3%;">This is to Certify that Mr./Ms <span class="slip-input1" style="min-width:344px;"><?php echo $stud_name ;?></span></div><br><br>
<p class="div-input1">Son/Daughter of <span class="slip-input1"><?php echo $parent_name ;?> &nbsp;</span>is / was a bonafide student from<span class="slip-input1"></span>standard </p><br><br>
<p class="div-input1" style="padding-right:2%;">to <span class="slip-input1"></span>standard during the year<span class="slip-input1"></span> &emsp;to  &emsp;<span class="slip-input1"></span> &emsp;and </p><br><br>
<p class="div-input1"> passes/ will be passing the<span class="slip-input1">&nbsp;<?php echo $stud_class ;?> &nbsp;</span>examination from this institute</p><br><br>
<p class="div-input1">During the period of study ,his/her conduct and character was / is</p><br><br><br>
<p class="div-input1">Date</p><br><br>
<p class="div-input1">Place</p>
<p style="float:right; font-weight:bold; padding-right:3%;">Signature and Name of Head of Institution</p>

   </div>
  </section>

    <!--end-->