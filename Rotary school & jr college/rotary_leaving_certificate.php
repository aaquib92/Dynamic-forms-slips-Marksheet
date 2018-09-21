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
<body id="a">
<section onload="setTimeout(myFunction(), 3000)">

<style>
.leaving-certificate-div{
    width:95%;
    height:95%;
    display:inline-block; 
    background-color:#DCEDC8;
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
        size:  Portrait;
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
 .div_tab {
    display: table;
    table-layout: fixed; 
    }

  .div_tab_row  {
    display: table-row;
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
 <!--main div-->
 <div class="leaving-certificate-div">
    <!--header-->
    <div class="head-div">
         <img class="left"  width="100" height="150" src="<?=base_url()?>assets/images/RCT logo.png" >
         <img class="right"  width="100" height="100" src="<?php echo $stud_school_logo ; ?>" >
         <center>
             <span style="font-weight:600;font-size:1.1em">ROTARY CHARITABLE TRUST'S</span><br>
             <span style="font-size:1.3em;font-weight:700;"><?php echo $stud_school_name ;?></span><br>
             <span style="font-size:0.6em;font-weight:400;">Permanently NonGrant Basis,, Recognized by Resolution No 733 Dt.7
/71,, Since 1/6/70 by Deputy Ed.Officer ZP ,Thane,(Prescribed by Rule
of SS Code),, Sharma Prasad Mukherjee Road,, Opp SBI Ambe
</span><br><br>
 <span style="font-size:1em;font-weight:400;">Tel: 0251-2602872 E-Mail Id : rctamb@gmail.com</span>
         </center>
    </div><br><br><br><hr><br>
    <div><span style="float:left; font-weight:400; width:29%;font-size:0.8em;"><b>General Regd No :</b><?php echo $gr_number ;?></span><span style="float:right;font-weight:400; width:29%;font-size:0.8em;"><b>Medium:&nbsp;&nbsp;</b>English</span><br>
    <div><span style="float:left; font-weight:400; width:30%;font-size:0.8em;"><b>UDIS No :</b>27211511904</span><span style="float:right;font-weight:400; width:30%;font-size:0.8em;"><b>School Index No:</b>S-16.02.039</span></div><br>
    <div><span style="float:left; font-weight:400; width:20%;font-size:0.8em;"><b>Serial No :</b>16</span><span style="float:right;font-weight:400; width:30%;font-size:0.8em;"><b>College Index No:</b>J-16.02.008</span></div><br>
    <centter><span style="font-weight:600;font-size:1.1em">LEAVING CERTIFICATE</span></center><br><br>

         <div style="text-align:left;float:left;width:97%;padding-left:3%;">Student ID ;&emsp; <span class="slip-input1"><?php echo $stud_roll ;?> &emsp;&emsp;&emsp; </span> U.I.D No/(Aadhar Card No):;&emsp;<span class="slip-input1"><?php echo $aadhar_no ;?></span></div><br><br>
         <p class="div-input1">Name of the Pupil &emsp; <span class="slip-input1"><?php echo $stud_name ;?></span> </p><br><br>
         <p class="div-input1">(Mother's Name) &emsp; <span class="slip-input1"><?php echo $parent_name ;?></span> </p><br><br>
         <p class="div-input1">Nationality &emsp;<span class="slip-input1"><?php echo $stud_nationality ;?></span> </p><br><br>
         <p class="div-input1">Religion/Caste/Sub Caste &emsp; <span class="slip-input1"><?php echo $religion ;?>/<?php echo $caste ;?></span> </p><br><br>
         <p class="div-input1">Place of Birth(Village City) &emsp;<span class="slip-input1"><?php echo $place_of_birth ;?></span> </p><br><br>
         <p class="div-input1">Date of Birth according to the Christian Calender&emsp;  <span class="slip-input1"><?php echo $dob ;?></span> </p><br><br>
         <p class="div-input1">In Words &emsp; <span class="slip-input1"></span> </p><br><br>
         <p class="div-input1">Last School attended &emsp; <span class="slip-input1"></span> </p><br><br>
         <p class="div-input1">Date of Admission &emsp; <span class="slip-input1"><?php echo $admission_year ;?></span>Admitted Std <span class="slip-input1"> <?php echo $stud_std ;?></span></p><br><br>
         <p class="div-input1">Progress &emsp; <span class="slip-input1"></span>Conduct <span class="slip-input1"></span>Date of leaving School<span class="slip-input1"></span></p><br><br>
         <p class="div-input1">Student in which studying and since when &emsp;<span class="slip-input1"><?php echo $stud_class ;?> since</span> </p><br><br>
         <p class="div-input1">Reason of leaving School &emsp;<span class="slip-input1"></span> </p><br><br>
          <p class="div-input1">Remarks &emsp; <span class="slip-input1"></span> </p><br><br>
          <p class="div-input1">This is to certify that all information given above as per the General Register</p><br><br>
        <div class="tab_container">
                <div class="div_tab">
                    <div class="div_tab_row"><!--row-->
          <div class="div_tab_col1">
                                Date  &nbsp;  
                            </div>
                            <div class="div_tab_col2">
                        <b>  19 &emsp; &emsp;  &emsp;  &emsp;  &emsp; </b>
                            </div>
                             <div class="div_tab_col1">
                                Month  &nbsp;   
                            </div>
                            <div class="div_tab_col2">
                        <b>  July  &emsp; &emsp; &emsp; &emsp;  &emsp;  </b>
                            </div>
                             <div class="div_tab_col1">
                                Year  &nbsp;   
                            </div>
                            <div class="div_tab_col2">
                        <b>  2017 </b>
                            </div>
            </div><!--row-->
                  </div><!-- main table-->
            </div><br><br><br><br><!--table container-->
            <div style="width:90%;">
         <span style=" dispaly:inline; float:left;padding-left:10%;">Class Teacher</span>
         <span style="text-align:center; dispaly:inline;">Clerk</span>
         <span style=" dispaly:inline; float:right;">Sign of Principal <br> with stamp</span>
           </div><br><br>

            <center> <span style="font-weight:600;font-size:1.1em">N.B:Any unauthorized changes effected in this certificate will attract legal action</span></center>

   </div>
  </section>

    <!--end-->