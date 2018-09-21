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

if(date('m')<6)
{
$academic_year = (date('Y')-1)." - ".date('Y');
}
else
{
$academic_year = date('Y')." - ".(date('Y')+1);
}

$date = date('d/m/Y', time());
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
// $stud_school_name = (isset($global_arr['school_info']['partner_name']) && !empty($global_arr['school_info']['partner_name']))?''.$global_arr['school_info']['partner_name'].'':'';
$stud_school_name = get_session_data()['profile']['partner_name'];
// $stud_school_addr = (isset($global_arr['school_info']['address']) && !empty($global_arr['school_info']['address']))?''.$global_arr['school_info']['address'].'':'';
$stud_school_addr = get_session_data()['profile']['address'];
// $stud_school_logo = (isset($global_arr['school_info']['logo']) && !empty($global_arr['school_info']['logo']))?''.$global_arr['school_info']['logo'].'':get_session_data()['profile']['logo'];
$stud_school_logo = get_session_data()['profile']['logo'];
//  echo print_array($global_arr);die;
?> 


    <style>
     
        
      
        .div_input1{
margin:0 auto;float:left; padding-left:3%;font-size:1em;text-align:justify;
}
        
    .main_div3{width:95%;height:auto;display:inline-block; border:solid black 1px
      
    }
    .common_input{
        font-size:1em;
        font-weight:700;
    }
   @page {
      size: portrait;   /* auto is the initial value */
      margin: 3%
   }
   @media print
   {
       .common_input{border:none;}
       span{border:none}
    * {-webkit-print-color-adjust:exact;}      
   }
       .slip-input1 {
        min-width: 100px;
        border-bottom: 1px solid black;
        display: inline-block;
                }
   
    </style>
 <section onload="setTimeout(myFunction(), 3000)">
    
  <div class="main_div3">
   <h4 style="text-align:center;color:#1846C0;font-size:1em;">BOMBAY AND BANDRA BAKAR KASAI JAMAT MOSQUES TRUST (Regd.B-582)</h4>
    <img src="<?php echo $stud_school_logo ; ?>" style="float:left;padding-left:20px;"  width="70" height="70"/>
<h3 style="color:#1846C0;font-size:1.4em;"> BANDRA URDU HIGH SCHOOL <br> JR COLLEGE OF SCI,COM & HSC.VOCATIONAL </h3>
<p style="color:#1846C0"><?php echo $stud_school_addr ; ?></p>
            <hr>
       <div class="div_input1" style="text-align:left;float:left;width:97%;padding-left:3%;">G.R.No &emsp;<span style="font-weight:700;"><?php echo $gr_number;?></span>&emsp;Date. &emsp;<span style="font-weight:700;"><?php echo $date; ?></span></div><br><br>
          <p class="div_input1">This is to certify that  Master &emsp;<input type ="text" class="common_input" value="<?php echo $stud_name; ?>" style="width:50%;">  &emsp; </p><br><br>
   <p class="div_input1"> is a bonafide student of this School / College studying in standard &emsp;<span style="font-weight:700;"><?php echo $stud_class;?></span></p><br><br> 
 <p class="div_input1"> From &emsp;<input type ="text" class="common_input" style="width:15%;"> &emsp;To &emsp; <input type ="text" class="common_input" style="width:15%;"> &emsp;He appeared in the </p><br><br>
    <p class="div_input1"> S.S.C /H.S.C Examination of Feb/March/Oct &emsp; <input type ="text" class="common_input" style="width:15%;"> &emsp; and  &emsp;<input type ="text" class="common_input" style="width:15%;"></p><br><br>
 <p class="div_input1">passed/failed in his &emsp; <input type ="text" class="common_input" style="width:15%;"> &emsp;attempt</p><br><br>
  <p class="div_input1">As per your General Register his date of birth is &emsp;<span style="font-weight:700;"><?php echo $dob;?></span></p><br><br><br>
 <p class="div_input1">Place of birth is  &emsp; &emsp; &emsp; &emsp; <input type ="text" class="common_input" style="width:47%;" value="<?php echo $place_of_birth ; ?>"></p><br><br>
 <p class="div_input1" >To the best of my Knowledge he bears a good moral character</p><br><br><br>
 <p  style="text-align:right; padding-right:20px;">PRINCIPAL</p>
        </div>
    
    

<script>
    $('.common_input').keyup(function(){
        $(this).attr('value',$(this).val());
    });
</script>
</section>
