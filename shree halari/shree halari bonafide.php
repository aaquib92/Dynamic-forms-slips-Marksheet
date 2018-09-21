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
.bonafide_certif {
    width:95%;
    height:95%;
    display:inline-block; 
    background-color:#DCEDC8;
    border:1px solid black;
    border-radius:25px;
    padding-top:1%;
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
        size: Portrait;
        margin:0;
        /*margin: 2mm 2mm 2mm 2mm;*/
        /*margin: 1mm 1mm 1mm 1mm;*/
    }
	  @media print
   {
       span{border:none}
    * {-webkit-print-color-adjust:exact;}  
    body{
           background-color:#DCEDC8;
    }    
   }
</style>

<div class="bonafide_certif">
<center>
 <span style="font-weight:400;font-size:0.9em;">Oswal Shikshan and Rahat Sangh Sanchalit</span><br>
  <span style="font-weight:600;font-size:1.1em;"><?php echo $stud_school_name ;?></span><br>
   <span style="font-weight:300;font-size:0.9em;">Near Anjurphata, Opp. Bhiwandi Road Railway Station, Bhiwandi - 421305. Ph. 278201, 278133</span><br>
   <span style="font-weight:600;font-size:1.1em;">Bonafide Certificate</span><br>
</center><br>
<span style="float:left; width:12%;">Sr.No :</span><br><br>
<div><span style="float:left; padding-left:3%;">G.Reg.No <?php echo $gr_number ;?></span><span style="float:right; width:72%;">Date:</span></div><br><br><br>
 <div style="text-align:left;float:left;width:97%;padding-left:3%;">This is to Certify that Kumar /Kumari <span class="slip-input1" style="min-width:344px;"><?php echo $stud_name;?></span></div><br><br>
 <!--<p class="div-input1"><span class="slip-input1"></span></p><br><br>-->
 <p class="div-input1"> is/was a bonafied student of this school studying in Std<span class="slip-input1"><?php echo $stud_std ;?></span></p><br><br>
 <p class="div-input1"> His/Her date of birth according to school register is<span class="slip-input1"><?php echo $dob ;?></span></p><br><br>
 <!--<p class="div-input1"><span class="slip-input1"></span></p><br><br>-->
 <p class="div-input1">His/Her place of birth is<span class="slip-input1"><?php echo $place_of_birth ;?></span></p><br><br>
 <p class="div-input1">And caste is<span class="slip-input1"><?php echo $caste ;?></span></p><br><br>
  <p class="div-input1"> His/Her Progress is/was<span class="slip-input1"></span></p><br><br>
  <p class="div-input1">He/She bears a good moral character.</p><br><br>
   <p class="div-input1">Certified that the above information is in accordance with school register.</p><br><br><br><br>
  <div style="width:80%;"> <span style="float:right;min-width:100px;border-top:1px solid black;"></span><br>
   <span style="float:right;"> H.M.</span></div>
</div>
<section>


