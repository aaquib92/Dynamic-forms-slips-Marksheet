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
        margin:5% 3% 3% 3%;
        /*margin: 1m 1mm 1mm 1mm;*/
    }
    .div_tab_col1, .div_tab_col2 {
    display: table-cell;
    /*word-wrap: break-word;*/
    font-size:0.7em;
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
         <img class="left"  width="100" height="80" src="<?php echo $stud_school_logo ; ?>" >
         <center style="line-height:1.2em;">
             <span style="font-size:1.5em;font-weight:700;"><?php echo $stud_school_name ;?></span><br>
            <span style="font-size:0.8em; margin-right:-2%">AFFILLIATED TO C.B.S.E</span><br>
  <span style="font-size:0.8em;"><?php echo $stud_school_addr ;?></span><br>
   <span style="font-size:0.8em;margin-right:-1%">0565-2490908,7535938481</span><br>
    <span style="font-size:0.8em; margin-right:-2%">Email:<u>Sanskarschool2009@gmail.com</u> ,Website:<u>www.sanskarsps.in</u></span><hr style="border:1px solid black;">
  <span style="font-weight:600;font-size:1em; width:24%;height:7%; background-color:black; color:white; padding:0.5%;">TRANSFER CERTIFICATE </span>
         </center>
    </div><br>

   <div class="tab_container">
                <div class="div_tab">

                    <div class="div_tab_row"><!--row-->
                            <div class="div_tab_col1">
                                School No  &emsp;  
                            </div>
                            <div class="div_tab_col2">
                              :&nbsp;<span class="slip-input1">55642</span>  &emsp; 
                            </div>
                            <div class="div_tab_col1">
                                Book No  &emsp;  
                            </div>
                            <div class="div_tab_col2">
                              : &nbsp;<span class="slip-input1"></span>  &emsp; 
                            </div>
                             <div class="div_tab_col1">
                                Serial No  &emsp;  
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

                        <div class="div_tab_row"><!--row-->
                            <div class="div_tab_col1">
                                Affiliation No  &emsp;  
                            </div>
                            <div class="div_tab_col2">
                              : &nbsp;<span class="slip-input1">2132432</span>  &emsp; 
                            </div>
                            <div class="div_tab_col1">
                                Renewed upto  &emsp;  
                            </div>
                            <div class="div_tab_col2">
                              :&nbsp; <span class="slip-input1"></span>  &emsp; 
                            </div>
                             <div class="div_tab_col1">
                                School Status  &emsp;  
                            </div>
                            <div class="div_tab_col2">
                              :&nbsp; <b>Secondary / Sr.Senior Secondary</b>
                            </div>
                    </div><!--row-->

     </div><br><!-- main table-->
            </div><!--table container-->

            <div style="line-height:1.7em;">
           <div style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd;"> Registration No of the candidate( in case Class IX to XII):  &emsp;  <span></span></div><br>
         <div style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd;"> 1. Name of the Pupil:  &emsp;  <span><?php echo $stud_name ;?></span></div><br>
         <div style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd;" class="div-input1">2. Mother's Name: &emsp; <span></span> </div><br>
         <div style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd;" class="div-input1">3. Father's Name: &emsp; <span><?php echo $middle_name ;?></span> </div><br>
         <div style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd;" class="div-input1"> 4. Nationality: &emsp;<span><?php echo $stud_nationality ;?></span> </div><br>
         <div style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd;" class="div-input1"> 5. Whether the pupil belongs to SC/ST/OBC Category:<span><?php echo $caste ;?></span> </div><br>
         <div style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd;" class="div-input1">6. Date of Birth (according to the admissionn Register(and / in figure): &emsp;  <span><?php echo $newDate ;?></span> </div><br>
         <div style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd;" class="div-input1">7. Whether the student is failed:  &emsp;<span></span> </div><br>
         <div style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd;" class="div-input1">8. Subjects offered: &emsp;  <span></span> </div><br>
         <div style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd;" class="div-input1">9. Class in which pupil last studied (in words): <span><?php echo $stud_class ;?></span> </div><br>
         <div style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd;" class="div-input1">10.  School / Board Annual examination taken with result: &emsp; <span></span> </div><br>
         <div style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd;" class="div-input1">11. Whether qualified for promotion to the next higher class: &emsp; <span></span> </div><br>
         <div style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd;" class="div-input1">12.  Whether the pupil has paid all dues to the Vidyalaya: &emsp; <span></span> </div><br>
         <div style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd;" class="div-input1">13.  Whether the pupil was in receipt of any fee Concession,if so the nature of </div><br>
         <div style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd;" class="div-input1">  such concession: &emsp; <span></span></div><br>
         <div style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd;" class="div-input1">14.  Whether the pupil is NCC Cadet//Boy Scout/ Girl Guide(give details): &emsp; <span></span> </div><br>
         <div style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd;" class="div-input1">15.  Date on which pupils name was stuck off the rolls of the Vidyalaya: &emsp; <span></span> </div><br>
         <div style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd;" class="div-input1">16.  Reason for leaving the Vidyalaya: &emsp; <span></span> </div><br>
         <div style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd;" class="div-input1">17.  No of meetings up to date: &emsp; <span></span></div><br>
         <div style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd;" class="div-input1">18.  No of school days the pupil attended: &emsp; <span></span> </div><br>
         <div style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd;" class="div-input1">19.  General Conduct: &emsp; <span></span> </div><br>
         <div style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd;" class="div-input1">20.  Any other remarks: &emsp; <span></span> </div><br>
         <div style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd;" class="div-input1">21.  Date of issue of certificate: &emsp; <span></span> </div><br><br><br><br>
    </div>  
    
   <div class="tab_container">
                <div class="div_tab">

                    <div class="div_tab_row"><!--row-->
                            <div class="div_tab_col1">
                                Prepared by <br> (Name & Designation)  &emsp;  &emsp; &emsp;
                            </div>
                           
                            <div class="div_tab_col2">
                                Checked by <br> (Name & Designation)  &emsp;  &emsp; &emsp;
                            </div>
                            <div  style="float:right;margin-top:-5%">
                            <br>  Sign of Principal with Official Seal  &emsp;  &emsp; &emsp;
                            </div>
                           
                    </div><!--row-->

     </div><!-- main table-->
            </div><!--table container--><hr style="border:1px solid black;">


   <p class="div-input1" style="font-size:0.7em;"><b><u>Note:-</u></b> &emsp;if,this T.C. is issued by the officiating/incharge Principal,in variably countersigned by Manager.V.MC.</p>


          
   </div>
  </section>

    <!--end-->