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
$mother_name    = (isset($global_arr['parent_details'][0]['mothers_name']) && !empty($global_arr['parent_details'][0]['mothers_name']))?''.$global_arr['parent_details'][0]['mothers_name'].'':'';
$stud_school_name = get_session_data()['profile']['partner_name'];
$stud_school_addr = get_session_data()['profile']['address'];
$stud_school_logo = get_session_data()['profile']['logo'];

?>
 

<style>
.div_input2{border-top:1px solid black;}
.div_input1{
margin:0 auto;float:left; padding-left:3%;font-size:0.8em; 
}
.common_input{
        font-size:1em;
        font-weight:700;
         background-color:#E8F5E9;
    }
.slip_input1 {
       font-weight:700;
                }
    .main_div2{width:48%;height:auto;display:inline-block;float:left;  background-color:#E8F5E9;}
    h2{ color:white;background-color:#ff6644;font-size:1.2em;}
    h1{ color:white;background-color:#ff6644;line-height:2em ;font-size:1.2em; }
    img{
        position:relative;
        /*left:10vw;*/
        width:50px;
        height:60px;
        float:left;
        margin-left:2vw;
    }
  
   @page {
      size: landscape;   /* auto is the initial value */
      margin:5%;
   }
       @media print
   {
      .common_input{border:none;}
       span{border:none}
    * {-webkit-print-color-adjust:exact;}   
       body{
           background-color:#E8F5E9;
    }        
   }

</style>

<section onload="setTimeout(myFunction(), 3000)">

<div class="main_div2" style= "border-right: dotted grey 2px;">
    <div class="div_input1">L.C. No <span class="slip_input1"></span> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Gr No.<span class="slip_input1"><?php echo $gr_number;?></span></div>
   <h4 style="text-align:center;font-size:0.8em;">BOMBAY AND BANDRA BAKAR KASAI JAMAT MOSQUES TRUST(Regd.B-582)</h4>
<h1>  <img src="<?php echo $stud_school_logo ; ?>"/>BANDRA URDU HIGH SCHOOL</h1>
<h2>JR COLLEGE OF SCI,COM & HSC.VOCATIONAL</h2>
  <p style="font-size:0.6em;">   School Sanction Order No.S.S.C.A-13,(New) dated 01-06-1961
Jr. College Sanction Order No. H.S.C/1074/1975-76/'C' 18-03-1975
  H.S.C Vocational section Order No.1074/1809/dated 22-01-1990
       S.V. Road, Bandra(West), Mumbai-400050 Tel.26422459
Recognised By Dept  of Education Govt. of Maharashtra.(Vide Rule 17) </p>
            <h3 style="font-size:1em;">LEAVING CERTIFICATE</h3>
<hr>

<div class="div_input1" style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd">1. Name of the Pupil in Full(in Block Letters)  <input type ="text" class="common_input"  value="<?php echo $stud_name; ?>" style="width:40%;"></div><br>
<div class="div_input1" style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd">2. Mother's Name <input type ="text" class="common_input"  value="<?php echo $mother_name; ?>" style="width:32%;"></div><br>
<div class="div_input1" style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd">3. Race,Caste & Sub Caste (if any) <span class="slip_input1"><?php echo $caste;?></span></div><br>
<div class="div_input1" style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd">4. Place of Birth <input type ="text" class="common_input"  value="<?php echo $place_of_birth; ?>" style="width:32%;"> </div><br>
<div class="div_input1" style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd">5. Date of Birth(in Figure) <span class="slip_input1"> <?php echo $dob;?></span></div><br>
<div class="div_input1" style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd">6. Previous School / College attended  <input type ="text" class="common_input"  style="width:32%;"> </div><br>
<div class="div_input1" style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd">7. Date of admission  <input type ="text" class="common_input"  value="<?php echo $admission_year; ?>" style="width:15%;">&emsp; 8 Date of leaving  <input type ="text" class="common_input" style="width:15%;"></div><br>
<div class="div_input1" style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd">9. Reason of Leaving Present School / College <input type ="text" class="common_input"  style="width:32%;"> </div><br>
<div class="div_input1" style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd">10. Class in which studying & since when <span class="slip_input1"> <?php echo $stud_class ;?></span></div><br>
<div class="div_input1" style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd">11. Progress <input type ="text" class="common_input"   style="width:20%;"> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; 12 Conduct <input type ="text" class="common_input" style="width:20%;"></div><br>
<div class="div_input1" style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd">13. Remarks <input type ="text" class="common_input"  style="width:32%;"></div><br>


<hr>
 <p  style="text-align:center;">Certified that above information is in accordance with institution's Register.</p>
<p  style="text-align:left; padding-left:100px;font-size:0.7em;"><b style="color:#ff6644;">No change in any entry is to be made except by authority issuing the certificate<br> and that the infringement of the rule will be punished with rustification</b></p>
<div><div style="width:400px;margin:0 auto;text-align:left;" >Dated &emsp;<?php echo $date;?>.</div><br><br><div class="div_input2"  style="display:inline; ">Prepared by</div>&emsp;&emsp;&emsp;<div class="div_input2" style="display:inline;">Checked by </div>&emsp;&emsp;&emsp;<div class ="div_input2" style="display:inline; ">Principal </div></div>




</div>



<!--block2-->


<div class="main_div2" >
    <div class="div_input1">L.C. No <span class="slip_input1"></span> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;Gr No.<span class="slip_input1"><?php echo $gr_number;?></span></div>
   <h4 style="text-align:center;font-size:0.8em;">BOMBAY AND BANDRA BAKAR KASAI JAMAT MOSQUES TRUST(Regd.B-582)</h4>
<h1>  <img src="<?php echo $stud_school_logo ;?>"/>BANDRA URDU HIGH SCHOOL</h1>
<h2>JR COLLEGE OF SCI,COM & HSC.VOCATIONAL</h2>
  <p style="font-size:0.6em;"> School Sanction Order No.S.S.C.A-13,(New) dated 01-06-1961
Jr. College Sanction Order No. H.S.C/1074/1975-76/'C' 18-03-1975
  H.S.C Vocational section Order No.1074/1809/dated 22-01-1990
       S.V. Road, Bandra(West), Mumbai-400050 Tel.26422459
Recognised By Dept  of Education Govt. of Maharashtra.(Vide Rule 17)  </p>
            <h3 style="font-size:1em;">LEAVING CERTIFICATE</h3>
<hr>
<div class="div_input1" style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd">1. Name of the Pupil in Full(in Block Letters)  <input type ="text" class="common_input"  value="<?php echo $stud_name; ?>" style="width:40%;"></div><br>
<div class="div_input1" style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd">2. Mother's Name <input type ="text" class="common_input"  value="<?php echo $mother_name; ?>" style="width:32%;"></div><br>
<div class="div_input1" style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd">3. Race,Caste & Sub Caste (if any) <span class="slip_input1"><?php echo $caste;?></span></div><br>
<div class="div_input1" style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd">4. Place of Birth <input type ="text" class="common_input"  value="<?php echo $place_of_birth; ?>" style="width:32%;"> </div><br>
<div class="div_input1" style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd">5. Date of Birth(in Figure) <span class="slip_input1"> <?php echo $dob;?></span></div><br>
<div class="div_input1" style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd">6. Previous School / College attended  <input type ="text" class="common_input"  style="width:32%;"> </div><br>
<div class="div_input1" style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd">7. Date of admission  <input type ="text" class="common_input"  value="<?php echo $admission_year; ?>" style="width:15%;">&emsp; 8 Date of leaving  <input type ="text" class="common_input" style="width:15%;"></div><br>
<div class="div_input1" style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd">9. Reason of Leaving Present School / College <input type ="text" class="common_input"  style="width:32%;"> </div><br>
<div class="div_input1" style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd">10. Class in which studying & since when <span class="slip_input1"> <?php echo $stud_class ;?></span></div><br>
<div class="div_input1" style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd">11. Progress <input type ="text" class="common_input"   style="width:20%;"> &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp; 12 Conduct <input type ="text" class="common_input" style="width:20%;"></div><br>
<div class="div_input1" style="text-align:left;float:left;width:97%;padding-left:3%;border-bottom:thin solid #ddd">13. Remarks <input type ="text" class="common_input"  style="width:32%;"></div><br>



<hr>
 <p  style="text-align:center;">Certified that above information is in accordance with institution's Register.</p>
<p  style="text-align:left; padding-left:100px;font-size:0.7em;"><b style="color:#ff6644;">No change in any entry is to be made except by authority issuing the certificate<br> and that the infringement of the rule will be punished with rustification</b></p>
<div><div style="width:400px;margin:0 auto;text-align:left;" >Dated &emsp;<?php echo $date;?>.</div><br><br><div class="div_input2"  style="display:inline; ">Prepared by</div>&emsp;&emsp;&emsp;<div class="div_input2" style="display:inline;">Checked by </div>&emsp;&emsp;&emsp;<div class ="div_input2" style="display:inline; ">Principal </div></div>



</div>
   

<script>
    $('.common_input').keyup(function(){
        $(this).attr('value',$(this).val());   
   
    });
   
</script>


   </section>



  