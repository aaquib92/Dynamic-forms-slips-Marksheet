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
.bonafide-certificate-div{
    width:95%;
    height:95%;
    display:inline-block; 
    /*border: 1px solid black;*/
}
.left{
    float:left;
    padding-top:3%;
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
   }
</style>
 <!--main div-->
 <div class="bonafide-certificate-div">
    <!--header-->
    <div class="head-div">
         <img class="left"  width="100" height="120" src="<?=base_url()?>/assets/images/RCT logo.png" >
         <img class="right"  width="100" height="100" src="<?php echo $stud_school_logo ; ?>" >
         <center style="color:#2671a6;">
             <span style="font-weight:600;font-size:1.1em"><?php echo $stud_school_name ;?></span><br>
             <span style="font-size:1.3em;font-weight:700;">PRATAPSINH MORAJI MEMORIAL</span><br>
             <span style="font-size:1.3em;font-weight:700;">ROTARY SCHOOL & JUNIOR COLLEGE</span><br>
             <span style="font-size:1.3em;font-weight:700;">OF ARTS,SCIENCE & COMMERCE</span><br>
            <span style="font-weight:600;font-size:0.9em;">Permanently Non Grant Basis</span>
         </center>
             <span style="font-size:0.7em;font-weight:500;color:#2671a6;">Recognized by Resolution No.733 dt.7/1/72 Since 1-6-70 by  Deputy Ed Office Zilla Parishad,Thane</span>
             <hr>
              <center><span style="font-weight:500;font-size:0.8em;color:#2671a6;">Sharma Prasad Mukherjee Road,Opp.State Bank,,Ambernath &#9990; : 2602872  </span></center>
    </div><hr>
     <div>
    <span style="font-weight:600;font-size:0.9em;float:left;color:#2671a6;">School Index No :16.02.039</span>
    <span style="font-weight:600;font-size:0.9em; float:right;color:#2671a6;">College Index No :J-16.02.008</span>
    </div><br><br>

    <div>
    <span style="font-weight:600;float:left;color:#2671a6;">Ref No:</span>
   <span style="font-weight:600;float:right;color:#2671a6;">Date<span class="slip-input1"></span>
    </div><br>
  <br><br>
      <center><span style="font-weight:700;font-size:1.2em;">BONAFIDE CERTIFICATE</span></center><br><br>
       <center><span style="font-weight:600;font-size:1.1em;">TO WHOSOEVER IT MAY CONCERN</span></center><br><br>
       <div style="text-align:left;float:left;width:97%;padding-left:3%;">This is to Certify that Miss./Mast <span class="slip-input1" style="min-width:344px;"><?php echo $stud_name;?></span>Is a Bonafide</div><br><br>
       <p class="div-input1">Student of this institution studying in STD in Class <span class="slip-input1"><?php echo $stud_class ;?> </span> in the year <?php echo $academic_year ;?>.</p><br><br>
       <p class="div-input1">Her date of birth as recorded in the school register is <span class="slip-input1"><?php echo $dob ;?></span></p>
       <p class="div-input1">[Four April Two Thousand Nine]</p><br><br>
      
         <!--end-->
       <table style="float:left;" width="30%;">
           <tr>
               <td><b>Having Caste</b></td>
               <td>:<?php echo $caste ;?></td>
           </tr>
           <tr>
               <td><b>Sub Caste</b></td>
               <td>:</td>
           </tr>
           <tr>
               <td><b>Place of Birth</b></td>
               <td>:<?php echo $place_of_birth ;?></td>
           </tr>
           <tr>
               <td> <b>Reg No </b></td>
               <td>:<?php echo $gr_number ;?></td>
           </tr>
       </table><br><br>
            <p class="div-input1">She Bears a Good Moral Character</p><br><br><br>
            <span style="float:right;font-weight:600;">Mrs.Nalim Patil</span><br>
            <span style="float:right;font-weight:600;width:17%;" >H.M.Primary</span><br>
              
   </div>
  </section>

    <!--end-->