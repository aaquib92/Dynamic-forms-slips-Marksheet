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

$stud_name    = (isset($global_arr['student_details'][0]['first_name']) && !empty($global_arr['student_details'][0]['first_name']))?strtoupper(''.$global_arr['student_details'][0]['first_name'].' '.$global_arr['student_details'][0]['middle_name'].'  '.$global_arr['student_details'][0]['last_name'].''):'';
$stud_img     = (isset($global_arr['student_details'][0]['image']) && !empty($global_arr['student_details'][0]['image']))?''.$global_arr['student_details'][0]['image'].'':'';
$stud_class   = (isset($global_arr['student_selected_class'][0]['standard']) && !empty($global_arr['student_selected_class'][0]['standard']))?''.$global_arr['student_selected_class'][0]['standard'].' '.$global_arr['student_selected_class'][0]['section']:'';
$stud_std   = (isset($global_arr['student_selected_class'][0]['standard']) && !empty($global_arr['student_selected_class'][0]['standard']))?''.$global_arr['student_selected_class'][0]['standard']:'';
$stud_div   = (isset($global_arr['student_selected_class'][0]['section']) && !empty($global_arr['student_selected_class'][0]['section']))?''.$global_arr['student_selected_class'][0]['section']:'';
$stud_dob     = (isset($global_arr['student_details'][0]['dob']) && !empty($global_arr['student_details'][0]['dob']))?''.date("d/m/Y", strtotime($global_arr['student_details'][0]['dob'])).'':'';
$stud_roll    = (isset($global_arr['student_details'][0]['rollno']) && !empty($global_arr['student_details'][0]['rollno']))? $global_arr['student_details'][0]['rollno'] : '';
$stud_admi_no = (isset($global_arr['student_details'][0]['admission_user_id']) && !empty($global_arr['student_details'][0]['admission_user_id']))?''.$global_arr['student_details'][0]['admission_user_id']:'';
$stud_phone   = (isset($global_arr['student_details'][0]['phone']) && !empty($global_arr['student_details'][0]['phone']))?''.$global_arr['student_details'][0]['phone'].'':$global_arr['parent_details'][0]['phone'];
$parent_phone   = (isset($global_arr['parent_details'][0]['phone']) && !empty($global_arr['parent_details'][0]['phone']))?''.$global_arr['parent_details'][0]['phone'].'':$global_arr['parent_details'][0]['phone'];

$stud_addr    = (isset($global_arr['student_details'][0]['address']) && !empty($global_arr['student_details'][0]['address']))?''.$global_arr['student_details'][0]['address'].'':'';
$stud_school_name = get_session_data()['profile']['partner_name'];
$stud_school_addr = get_session_data()['profile']['address'];
$stud_school_logo = get_session_data()['profile']['logo'];
// echo print_array($global_arr);die();

?>
<section class="card1" onload="setTimeout(myFunction(), 3000)">

<style>

.card1{
    background: #ffffff url('<?php echo base_url();?>assets/images/hlems.png') no-repeat right top;
    background-size:cover;
    height: 95%;
    width: 96%;
    /* outline: red solid 1px; */
    float:left;
    display:inline-block;
}
.heading{
    /* outline: blue solid 1px; */
    height: 57%;
}
.stud_name{
    margin-left: -50%;
    font-size: 75%;
    vertical-align: top;
    margin-top:1.5%;
}
.stud_dob{
    margin-left: 32%;
    font-size: 75%;
    vertical-align: top;
    margin-top:-1.7%;
}
.stud_std{
    margin-left: -2%;
    font-size: 75%;
    vertical-align: top;
    margin-top:7.5%;
}
.stud_div{
    margin-left: 20%;
    font-size: 75%;
    vertical-align: top;
    margin-top: -1.7%;
}



/* CSS FOR MEDIA PRINT */

  @media print{
   .card1{
    page-break-before:always;
    page-break-after:always;
    page-break-inside: avoid;
   }   

.stud_name{
    margin-left: -42%;
    margin-top:3%;
}
.stud_dob{
    margin-top:-1.5%;

}
.stud_std{
    margin-left: 4%;
    margin-top:7.9%;
}
.stud_div{
    margin-left: 25%;
    margin-top: -1.5%;
}


  }
  /* END OF MEDIA PRINT */



  @page {
        size: landscape;
    }


</style>


        <div class="heading"></div>
        <div class="stud_name"> <?php echo $stud_name ;?> </div>
        <div class="stud_dob"> <?php echo $stud_dob ;?> </div>
        <div class="stud_std"> <?php echo $stud_std ;?> </div>
        <div class="stud_div"> <?php echo $stud_div ;?> </div>





        

</section>
   
