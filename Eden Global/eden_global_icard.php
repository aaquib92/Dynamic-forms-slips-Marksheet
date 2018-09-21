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
    background: #ffffff url('<?php echo base_url();?>assets/images/eden.png') no-repeat right top;
    background-size:cover;
    height: 54mm;
    width: 85mm;
    outline: red solid 1px;
    float:left;
    display:inline-block;
}

.heading{
    /* outline: blue solid 1px; */
    height: 17mm;
}
.stud_name{
    margin-left: -3mm;
    font-size: 35%;
    vertical-align: top;
}

.stud_img img{
    margin-left: 60mm;
    margin-top: -6mm;
    height: 27mm;
    width: 21mm;
    /* transform: rotate(-3deg) */
}
.class{
    margin-left: -47mm;
    font-size: 50%;
    vertical-align: top;
    margin-top: -18mm;
}
.division{
    margin-top: -3mm;
    font-size: 60%;
}
.roll{
    margin-left: -44mm;
    margin-top: 5mm;
    font-size: 60%;
}
.bus_root{
    margin-top: -3mm;
    margin-left: 23mm;
    font-size: 60%;
}
.contact_no{
    font-size: 60%;
    margin-left: -18mm;
}

@page {
        size: portrait;
        margin: 1mm 1mm 1mm 1mm;
    }
    @media print{
        .card1{
           
           margin: 1mm 2mm 1mm 2mm;
        }
    }
.addr{

    width: 40mm;
    line-height: 5mm;
    font-size: 55%;
    margin-top: 5mm;
    margin-left: 2mm;
    min-height: 12mm;
}
   
</style>


        <div class="heading"></div>
        <div class="stud_name"> <?php echo $stud_name ;?> </div>

        <div class="stud_img"> <img src="<?php echo $stud_img ;?>" alt=""> </div>
        <div class="class">  <?php echo $stud_std ;?> </div>
        <div class="division">  <?php echo $stud_div ;?> </div>
        <div class="roll">  <?php echo $stud_roll ;?> </div>
        <div class="bus_root"> 
        
        <?php

if(isset($global_arr['student_details'])){
    if(isset($global_arr['student_details'][0]['custom_fields'])){

   if(sizeof($global_arr['student_details'][0]['custom_fields']) > 0 )
     {
      $temp = json_decode($global_arr['student_details'][0]['custom_fields'],true);

        foreach ($temp as $k1 => $v1) {

           echo $v1;
             }
         }

           }
        }

            ?>
        
        </div>

        <div class ="addr"><?php echo $stud_addr;?></div>

        <div class="contact_no"> <?php echo $parent_phone ;?> </div>

</section>
   
