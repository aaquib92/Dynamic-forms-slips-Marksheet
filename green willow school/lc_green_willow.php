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
$middle_name = (isset($global_arr['student_details'][0]['middle_name']) && !empty($global_arr['student_details'][0]['middle_name']))?''.$global_arr['student_details'][0]['middle_name'].'':'';
// $stud_school_name = (isset($global_arr['school_info']['partner_name']) && !empty($global_arr['school_info']['partner_name']))?''.$global_arr['school_info']['partner_name'].'':'';
$stud_school_name = get_session_data()['profile']['partner_name'];
// $stud_school_addr = (isset($global_arr['school_info']['address']) && !empty($global_arr['school_info']['address']))?''.$global_arr['school_info']['address'].'':'';
$stud_school_addr = get_session_data()['profile']['address'];
// $stud_school_logo = (isset($global_arr['school_info']['logo']) && !empty($global_arr['school_info']['logo']))?''.$global_arr['school_info']['logo'].'':get_session_data()['profile']['logo'];
$stud_school_logo = get_session_data()['profile']['logo'];
//  echo print_array($global_arr);die;

if($parent_name == ''){
    echo $middle_name;
}
?>
<section onload="setTimeout(myFunction(), 3000)">

<style>
.leaving-certificate-div{
    width:95%;
    height:95%;
    display:inline-block; 
    background-color:#E8F5E9;
	padding-top:1%;
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
        size: Portrait;
        margin:0;
        /*margin: 1m 1mm 1mm 1mm;*/
    }
    .div_tab_col1, .div_tab_col2 {
    display: table-cell;
    /*word-wrap: break-word;*/
    /*font-size:0.7em;*/
    }
    .tab_container {
    text-align:left;
    padding-left:3%;  
    }

         @media print
   {
       span{border:none}
    * {-webkit-print-color-adjust:exact;} 
    body{
           background-color:#E8F5E9;
    }     
   }
</style>
 <!--main div-->
 <div class="leaving-certificate-div">
    <!--header-->
    <div class="head-div">
	  <span style="font-weight:500;font-size:0.8em">(No change in any entry in this Certificate shall be made except by the authority issuing it & any infringement of his <br> requirement is laible to invoice the imposition at penalty such as that of rustication)</span><br>
         <img class="left"  width="100" height="100" src="<?php echo $stud_school_logo ; ?>" >
         <center>
             <span style="font-weight:500;font-size:1.1em">Oswal Shikshan and Rahat Sangh Sanchalit</span><br>
             <span style="font-size:1.3em;font-weight:700;"><?php echo $stud_school_name ;?></span><br>
             <span style="font-size:0.8em;font-weight:600;"> (Recog. by Deputy Director Nasik Division No. 10364-65 / 88 Dated 23--88)
</span><br>
 <span style="font-size:0.8em;font-weight:400;">Near Anjurphata, Opp. Bhiwandi Road Railway Station, Bhiwandi - 421305. Ph. 278201, 278133</span><br>
  <span style="font-weight:600;font-size:1.1em;">LEAVING CERTIFICATE </span><br>
         </center>
    </div><br><br>
	   <div><span style="float:left; font-weight:400; width:20%;font-size:0.8em;"><b>Serial No : _________</b></span><span style="float:right;font-weight:400; width:30%;font-size:0.8em;"><b>Register No:</b><span class="slip-input1"<?php echo $gr_number ;?>></span></span></div><br><br>
  
   

         <div style="text-align:left;float:left;width:97%;padding-left:3%;"> 1) Name of the pupil in full &emsp;  <span><?php echo $stud_roll ;?> &emsp;&emsp;&emsp; <span class="slip-input1"><?php echo $stud_name ;?></span></div><br><br>
         <p class="div-input1">2) Mother's Name &emsp; <span><?php echo $parent_name ;?></span> </p><br><br>
           <p class="div-input1">3) Father's Name &emsp; <span><?php echo $parent_name ;?></span> </p><br><br>
              <p class="div-input1"> 4) Nationality &emsp;<span><?php echo $stud_nationality ;?></span> </p><br><br>
         <p class="div-input1"> 5) Whether the pupil belongs to SC/ST/OBC Category<span><?php echo $caste ;?></span> </p><br><br>
           <p class="div-input1">6) Date of Birth (according to the admissionn Register(and / in figure) &emsp;  <span><?php echo $dob ;?></span> </p><br><br>
         <p class="div-input1">7) Whether the student is failed  &emsp;<span></span> </p><br><br>
         <p class="div-input1">8) Subjects offered &emsp;  <span></span> </p><br><br>
         <p class="div-input1">9) Class in which pupil last studied (in words) <span><?php echo $stud_class ;?></span> </p><br><br>
         <p class="div-input1">10)  School / Board Annual examination taken with result &emsp; <span></span> </p><br><br>
         <p class="div-input1">11)  Whether qualified for promotion to the next higher class &emsp; <span></span> </p><br><br>
          <p class="div-input1">12)  Whether the pupil has paid all dues to the school &emsp; <span></span> </p><br><br>
         <p class="div-input1">13)  Whether the pupil was in receipt of any fee Concession,if so the nature of such concession &emsp; <span></span> </p><br><br>
         <p class="div-input1">10)  School / Board Annual examination taken with result &emsp; <span class="slip-input1"></span> </p><br><br>
         <!--<p class="div-input1">6) Date of Admission &emsp; <span class="slip-input1"><?php echo $admission_year ;?></span>Admitted Std <span class="slip-input1"> <?php echo $stud_std ;?></span></p><br><br>
         <p class="div-input1">7) Progress &emsp; <span class="slip-input1"></span>8. Conduct <span class="slip-input1"><span></p><br><br>
		  <p class="div-input1">9) Date of leaving School  &emsp; <span class="slip-input1"></span> </p><br><br>
         <p class="div-input1"> 10) Standard in which studying & since when &emsp;<span class="slip-input1"><?php echo $stud_class ;?></span> </p><br><br>
         <p class="div-input1">11) Reason of leaving school &emsp;<span class="slip-input1"></span> </p><br><br>
          <p class="div-input1">12) Remarks &emsp; <span class="slip-input1"></span> </p><br><br>
          <p class="div-input1" style="font-weight:bolder;">Certified that above information is in accordance with the school register.</p><br><br>-->
    
          <div><span style="float:left; font-weight:400; width:20%;font-size:0.8em;"><b>dated :__________</b></span><span style="float:right;font-weight:400; width:30%;font-size:0.8em;"><b>Prepared by:</b><span class="slip-input1"></span></span></div><br><br>
		   <div><span style="float:left; font-weight:400; width:20%;font-size:0.8em;"><b>Checked by ______</b></span><br><br><span style="float:right;font-weight:400; width:30%;font-size:0.8em;"><b>Head Mistres</b></span></div><br><br>
   </div>
  </section>

    <!--end-->