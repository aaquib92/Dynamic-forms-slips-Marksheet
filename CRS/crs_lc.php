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
$newDate = date("d-m-Y", strtotime( (isset($global_arr['student_details'][0]['dob']) && !empty($global_arr['student_details'][0]['dob']))?''.$global_arr['student_details'][0]['dob'].'':''));
$stud_school_name = get_session_data()['profile']['partner_name'];
$stud_school_addr = get_session_data()['profile']['address'];
$stud_school_logo = get_session_data()['profile']['logo'];
// convert no to words function



?>
<section onload="setTimeout(myFunction(), 3000)">

<style>
.leaving-certificate-div{
    width:95%;
    height:auto;
    display:inline-block; 
	padding-top:1%;
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
        margin:5% 3% 3% 3%;
    }
    .div_tab_col1, .div_tab_col2 {
    display: table-cell;
    font-size:1em;
    }
    .tab_container {
    text-align:left;
    padding-left:3%;  
    }
 
         @media print
   {
       span{border:none;}
    * {-webkit-print-color-adjust:exact;} 
  
   }
</style>
 <!--main div-->
 <div class="leaving-certificate-div">
    <!--header-->
    <div class="head-div">
     <span style="font-size:0.7em; margin-right:-2%">(No change in entry in this certificate shall be made except by the authority issueing it and any infringement of this requirement is liable to <br> involve the imposition of penalty such as that rustication  ) </span><br><br>
         <center style="line-height:1.3em;">
             <span style="font-size:1.5em;font-weight:700;"><?php echo $stud_school_name ;?></span><br>
                <img class="left"  width="100" height="80" src="<?php echo $stud_school_logo ; ?>">
             <span style="font-size:1emem; margin-right:-2%">(Affiliated to CENTRAL BOARD OF SECONDARY EDUCATION, NEW DELHI) </span><br>
             <span style="font-size:1.2em;font-weight:600;"><?php echo $stud_school_addr ;?></span><br>
             <span style="font-size:0.9em; margin-right:-1%">website:www.crskyn.org  Email:crskyn1918@gmail.com</span><br>
             <span style="font-size:0.9em;margin-right:-2%">Tel: (0251) 2327347 /2212888 Rly:63230/31</span><br>
             <span>Affiliation No:-1130073</span> &emsp;&emsp;School Code:-06883<span></span> &emsp;&emsp;Sl.No<span></span><br><hr style="border:1px solid black;">
             <span style="font-weight:600;font-size:1em;"><u> SCHOOL LEAVING CERTIFICATE / TRANSFER CERTIFICATE </u> </span>
     </center>
 </div><br>

   <div class="tab_container">
                <div class="div_tab">
                            <div class="div_tab_col1">
                                Book No  &emsp;  
                            </div>
                            <div class="div_tab_col2">
                              : &nbsp;<span class="slip-input1"></span>  &emsp; 
                            </div>
                            <div class="div_tab_col1">
                                Admission No  &emsp;  
                            </div>
                            <div class="div_tab_col2">
                              :&nbsp; <span class="slip-input1"></span> 
                            </div>
                    </div><!--row-->

         </div><br><!-- main table-->
 </div><!--table container-->

            <div style="line-height:1.7em;">
      <div style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd;"> 1. Name of the Pupil:  &emsp;  <span><?php echo $stud_name ;?></span></div><br>
      <div style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd;" class="div-input1">2. Mother's Name: &emsp; <span></span> &emsp; &emsp;&emsp;&emsp;&emsp;&emsp;  Father / Guardian's Name  <span><span><?php echo $middle_name ;?></span> </div><br>
      <div style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd;" class="div-input1"> 3. Nationality: &emsp;<span><?php echo $stud_nationality ;?></span>&emsp;&emsp;&emsp;Place of Birth &emsp;<span><?php echo $place_of_birth ;?></span> </div><br>
      <div style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd;" class="div-input1"> 4. Whether the pupil belongs to SC/ST/OBC Category<span><?php echo $caste ;?></span> </div><br>
      <div style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd;" class="div-input1"> 5. Date of first admission in the School with class<span>&emsp;<?php echo $admission_year.' '.$stud_class ;?></span> </div><br>
      <div style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd;" class="div-input1">6. Date of Birth (in Christian Era) according to the Admissionn Register </div><br>
      <div style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd;" class="div-input1">(in figures) &emsp;<span><?php echo $newDate ;?></span>&emsp;(in words) &emsp; </div><br>
      <div style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd;" class="div-input1">7. Class in which pupil last studied in &emsp; <span><?php echo $stud_class ;?></span> &emsp; &emsp;(in words) &emsp; </div><br>
      <div style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd;" class="div-input1">8.  School / Board Annual examination taken with result &emsp; <span></span> </div><br>
      <div style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd;" class="div-input1">9. Whether failed,if so,once / twice in the same class  &emsp;<span></span> </div><br>
      <div style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd;" class="div-input1">10. Subjects studied &emsp; </div><br>
      <div style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd;" class="div-input1">11. Whether qualified for promotion to the next higher class &emsp; <span></span> </div><br>
      <div style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd;" class="div-input1">if so, to which class (in fig): &emsp; &emsp;&emsp; (in words) </div><br>
      <div style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd;" class="div-input1">12.Month up to which the (pupil has paid) school dues paid &emsp; <span></span> </div><br>
      <div style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd;" class="div-input1">13. Any fee concession availed of:if so the nature of such concession </div><br>
      <div style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd;" class="div-input1"> 14. Total No of working days &emsp; <span></span></div><br>
      <div style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd;" class="div-input1">15. Total No of working days present &emsp; <span></span></div><br>
      <div style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd;" class="div-input1">16.  Whether  NCC Cadet//Boy Scout/ Girl Guide( details may be given) &emsp; <span></span> </div><br>
      <div style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd;" class="div-input1">17.Games played in extra curicular activities in which the pupil usually took part &emsp; <span></span> </div><br>
      <div style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd;" class="div-input1">(mention achievement level therein) &emsp; <span></span> </div><br>
      <div style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd;" class="div-input1">18.  Date of application for certificate &emsp; <span></span> </div><br>
      <div style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd;" class="div-input1">19.  Date of issue of certificate &emsp; <span></span> </div><br>
      <div style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd;" class="div-input1">20.  Reason for leaving the School &emsp; <span></span> </div><br>
      <div style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd;" class="div-input1">21.  Any other remarks: &emsp; <span></span> </div><br><br><br><br>

    </div>  
    
   <div class="tab_container">
                <div class="div_tab">
                    <div class="div_tab_row"><!--row-->
                            <div class="div_tab_col1">
                                Signature of   &emsp;  &emsp; &emsp;
                            </div>
                            <div class="div_tab_col2">
                                Checked by  &emsp;  &emsp; &emsp;
                            </div>
                            <div  style="float:right;margin-top:-5%">
                              <br> Principal Sign &emsp;  &emsp; &emsp;
                            </div>
                           
                    </div><!--row-->

               </div><!-- main table-->
  </div><!--table container-->

          
   </div>
  </section>

    <!--end-->