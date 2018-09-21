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
$stud_name  = (isset($global_arr['student_details'][0]['first_name']) && !empty($global_arr['student_details'][0]['first_name']))?''.$global_arr['student_details'][0]['first_name'].' '.$global_arr['student_details'][0]['middle_name'].'    '.$global_arr['student_details'][0]['last_name'].'':
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
$stud_gender    = (isset($global_arr['student_details'][0]['gender']) && !empty($global_arr['student_details'][0]['gender']))? $global_arr['student_details'][0]['gender'] : '';
$stud_school_name = get_session_data()['profile']['partner_name'];
$stud_school_addr = get_session_data()['profile']['address'];
$stud_school_logo = get_session_data()['profile']['logo'];

if(date('m')<6)
{
$academic_year = (date('Y')-1)." - ".date('Y');
}
else
{
$academic_year = date('Y')." - ".(date('Y')+1);
}

$date = date('d/m/Y', time());


if($stud_gender == 'male'){
    $var1 = "Kumar";
    $var2 ="His";
    $var3 ="He";
    

}else{
     $var1 = "Kumari";
     $var2 ="Her";
     $var3 ="She";
}



?>
<section onload="setTimeout(myFunction(), 3000)">

<style>
.bonafide-certificate1-div{
    width:95%;
    height:auto;
    display:inline-block; 
   
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
    font-size:0.9em;
}
.slip-input1 {
        min-width: 100px;
        border-bottom: 1px solid black;
        display: inline-block;
                }

.div_tab_col1, .div_tab_col2 {
display: table-cell;
}
.tab_container {
text-align:left;
padding-left:3%;
}
.div_tab {
display: table;
table-layout: fixed;
}

.div_tab_row {
display: table-row;
}



                 @page {
        size:  Portrait;
        margin:2%;
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
              <span style="font-size:1.4em;font-weight:700;"><?php echo $stud_school_name ;?></span><br>
             <span style="font-weight:400;font-size:1em">Owned and Managed by Ministry of Railways,Govt. of India </span><br>
             <span style="font-weight:400;font-size:1em">Affiliated to Central Board of Sec.Education,New Delhi ,Affiliation No:- 1130073</span><br>
             <span style="font-size:1em;font-weight:700;"><?php echo $stud_school_addr ;?></span><br>
              <span style="font-size:1em;font-weight:700;">U-DISE No:- 27210601705</span><br><br>
             <div style="border:solid black 1px; width:40%;height:3%;padding-top:0.5%;padding-bottom:0.5%;border-radius:25px; "><span style="font-weight:600;font-size:1.3em;">BONAFIDE CERTIFICATE</span></div><br>
         </center>
    </div><br><br>

         <!--end-->
         <!--section-->
         
     
   <div class="tab_container">
                <div class="div_tab">
                    <div class="div_tab_row"><!--row-->
                            <div class="div_tab_col1">
                                Sr No  &emsp;  
                            </div>
                            <div class="div_tab_col2">
                              :&nbsp;<span class="slip-input1"></span>  &emsp; 
                            </div>
                            <div class="div_tab_col1">
                                Gr No  &emsp;  
                            </div>
                            <div class="div_tab_col2">
                              : &nbsp;<span class="slip-input1"><?php echo $gr_number ; ?></span>  &emsp; 
                            </div>
                             <div class="div_tab_col1">
                                Date  &emsp;  
                            </div>
                            <div class="div_tab_col2">
                              : &nbsp;<span class="slip-input1"><?php echo $date ; ?></span>  &emsp; 
                            </div>
                    </div><!--row-->
             </div><br><!-- main table-->
     </div><!--table container-->
 
    
<div style="text-align:left;float:left;width:97%;padding-left:3%; font-size:0.9em;">This is to Certify that <?php echo $var1;?>&emsp; <span class="slip-input1" style="min-width:344px;"><?php echo $stud_name ;?></span></div><br><br><br>
 <p class="div-input1 size1">is a regular student of this college studying in the <span class="slip-input1"><?php echo $stud_class ;?></span>class in academic year <span class="slip-input1"><?php echo $academic_year ;?></span> </p><br><br><br>
 <p class="div-input1 size1"><?php echo $var2;?> date of birth as per school register(in figure) <span class="slip-input1"><?php echo $stud_dob ;?></span> </p><br><br><br>
 <p class="div-input1 size1">(in words) &emsp;<span class="slip-input1"  style="min-width:344px;"></span></p><br><br><br>
 <p class="div-input1 size1"><?php echo $var2;?> place of Birth is<span class="slip-input1"><?php echo $place_of_birth ;?></span></p><br><br><br>
 <p class="div-input1 size1"><?php echo $var3;?> bears a good moral character. <span class="slip-input1"></span></p><br><br><br>




<div class="tab_container">
                <div class="div_tab">
                    <div class="div_tab_row"><!--row-->
                            <div class="div_tab_col1">
                                Prepared  &emsp;  
                            </div>
                            <div class="div_tab_col2">
                              &nbsp;<span class="slip-input1"></span>  &emsp; 
                            </div>
                            <div class="div_tab_col1">
                                Checked by  &emsp;  
                            </div>
                            <div class="div_tab_col2">
                               &nbsp;<span class="slip-input1"></span>  &emsp; 
                            </div>
                             <div class="div_tab_col1">
                            Principal's Signature  &emsp;  
                            </div>
                            <div class="div_tab_col2">
                               &nbsp;<span></span>  &emsp; 
                            </div>
                    </div><!--row-->
              </div><br><!-- main table-->
         </div><!--table container-->

   </div>
  </section>

    <!--end-->