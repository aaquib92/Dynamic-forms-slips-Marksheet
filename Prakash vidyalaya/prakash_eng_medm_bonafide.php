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
.bonafide-certificate1-div{
    width:95%;
    height:auto;
    display:inline-block; 
    border: 1px solid black;
}
.left{
    float:left;
    padding-top:3%;
    padding-left:3%;
}
.div-input1{
margin:0 auto;float:left; padding-left:3%;
}
.size1{
    font-size:1.3em;
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
 <div class="bonafide-certificate1-div">
    <!--header-->
      <!--header-->
    <div class="head-div">
         <center style="padding-top:2%">
           <img class="left"  width="100" height="100" src="<?php echo $stud_school_logo ; ?>" >
             <span style="font-weight:700;font-size:1.2em">MATASHREE NAVRANGIDEVI MEMORIAL TRUSTS</span><br>
             <span style="font-weight:700;font-size:1em">(Govt Recog)</span><br>
             <span style="font-size:1.6em;font-weight:700;"><?php echo $stud_school_name ;?></span><br>
             <span style="font-size:1em;font-weight:300;"><?php echo $stud_school_addr ;?></span><br><br>
              <span style="font-size:1em;font-weight:700;">English Medium</span><br><br>
               <span style="font-size:1em;font-weight:700;">Primary / Secondary Section </span><br><br>
             <div style="border:solid black 1px; width:40%;height:3%;padding-top:0.5%;padding-bottom:0.5%;"><span style="font-weight:600;font-size:1.3em;">BONAFIDE CERTIFICATE</span></div><br>
         </center>
    </div><br><br>

         <!--end-->
         <!--section-->
         
      <center style="max-width:95%;">
    <span style="float:right; font-weight:200;">Date.: _________</span>
    </center><br><br><br>
 
    
<div style="text-align:left;float:left;width:97%;padding-left:3%; font-size:1.4em;">This is to Certify that Mr./Miss <span class="slip-input1" style="min-width:344px;"><?php echo $stud_name ;?></span></div><br><br><br>
<p class="div-input1 size1"> is / was a bonafide student of this college studying in Std <span class="slip-input1"><?php echo $stud_std ;?></span></p><br><br><br>
<p class="div-input1 size1">G.R.No <span class="slip-input1"><?php echo $gr_number ;?></span> in the year <span class="slip-input1"><?php echo $academic_year ;?></span> &nbsp;His/Her</p><br><br><br>
<p class="div-input1 size1"> date of birth as recorded in the General Register of our High School is </p><br><br><br>
<p class="div-input1 size1"><span class="slip-input1"><?php echo $stud_dob ;?></span> &emsp;He/She is/ was regualar in attendance To </p><br><br><br>
<p class="div-input1 size1"> the best of my knowledge he /she bears a good moral character </p><br><br><br>
<p style="float:right; font-weight:bold; padding-right:3%;">Head of the School</p>

   </div>
  </section>

    <!--end-->