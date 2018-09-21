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
$stud_addr    = (isset($global_arr['student_details'][0]['address']) && !empty($global_arr['student_details'][0]['address']))?''.$global_arr['student_details'][0]['address'].'':'';
$stud_school_name = get_session_data()['profile']['partner_name'];
$stud_school_addr = get_session_data()['profile']['address'];
$stud_school_logo = get_session_data()['profile']['logo'];
// echo print_array($global_arr);die;

?>
<section onload="setTimeout(myFunction(), 3000)">
<style>
       /*body {
            font-size: 80%;
        }*/
.main_div{
     /*border:1px solid black;*/
     font-size: 65%;
     width:91mm;
     height:58mm;
     float:left;
     display:inline-block; 
}

#grad1 {
    background: red; /* For browsers that do not support gradients */
    background: -webkit-linear-gradient(yellow, white); /* For Safari 5.1 to 6.0 */
    background: -o-linear-gradient(yellow, white); /* For Opera 11.1 to 12.0 */
    background: -moz-linear-gradient(yellow, white); /* For Firefox 3.6 to 15 */
    background: linear-gradient(yellow, white); /* section syntax (must be last) */
}
.tab_container {
        text-align:left;
    max-width: 70%;
    min-width: 67%;
    vertical-align: text-top;
    float:right;
    line-height:2em;
    
    }
 .div_tab {
    display: table;
    table-layout: fixed; 
    }

  .div_tab_row  {
    display: table-row;
    }
.head_div{
    line-height:2em;
    padding:3%;
}
.head_div img{
float:left;
} 
 .div_tab_col1, .div_tab_col2,.div_tab_col3 ,.div_tab_col4,.div_tab_addr {
    display: table-cell;
    /*word-wrap: break-word;*/
    /*font-size:0.7em;*/
    }
    .div_tab_col1{
        /*vertical-align: middle;*/
        /*width:17%;*/
    }
.div_tab_col2{
    line-height:1em;
    max-width:45mm;
}

         @media print
   {
       .main_div{
            margin:0.5mm 3mm;
       }
       .student_name_hide{display:none}
       span{border:none}

      /*#main_content {margin-top:-7%}*/
    * {-webkit-print-color-adjust:exact;}      
   }
</style>
    <!--main div-->
<div class ="main_div" >
 <!--header-->
     <div id="grad1">
                <div class="head_div"> <img  width="45" height="50" src="<?php echo $stud_school_logo ; ?>">

                                <center>
                                    <span style="font-weight:500;font-size:1.5em"><?php echo $stud_school_name ;?></span><br>
                                    <span style="font-size:1.2em"><?php echo $stud_school_addr ; ?></span><br>
                                    <span style="padding:0.8%; color:white; background-color: cyan; border:2px solid cyan;border-radius:25px; font-weight:500;">Academic Year 2017-2018</span>
                                </center>
                </div>
     </div>
     <!--end-->

     <!--main content-->
<div class="main-content" style="padding: 3%;" >
     <div style="float:left"><img height="81" width="81" style="" src="<?php echo (isset($global_arr['student_details'][0]['image']) && !empty($global_arr['student_details'][0]['image']))?''.$global_arr['student_details'][0]['image'].'':
     '';?>"><br>
     <!--<img width="75" height="27" src="<?=base_url()?>/assets/images/idubs_princy_sig.png" alt=""><br><b>Principal&emsp;&emsp;</b>-->
     
     </div>


      <div class="tab_container">
                <div class="div_tab">

                    <div class="div_tab_row"><!--row-->
                            <div class="div_tab_col1">
                                <b>Name : &nbsp;</b>
                            </div>
                            <div class="div_tab_col2">
                              <?php echo $stud_name ;?>
                            </div>
                    </div><!--row-->
                    <div class="div_tab_row"><!--row-->
                            <div class="div_tab_col1">
                                <b>Std : </b>
                            </div>
                            <div class="div_tab_col2">
                                <?php echo $stud_std ;?>
                                 <b>&emsp;Div : </b>&nbsp;
                                 <?php echo $stud_div ;?>
                                 <b>&emsp;Roll No.:</b>&nbsp;
                                 <?php echo $stud_roll ;?>
                            </div>
                    </div><!--row-->
                    <div class="div_tab_row"><!--row-->
                            <div class="div_tab_col1">
                                <b>D.O.B.:</b>
                            </div>
                            <div class="div_tab_col2">
                                 <?php echo $stud_dob ;?>
                            </div>
                    </div><!--row-->
                    <div class="div_tab_row"><!--row-->
                            <div class="div_tab_col1">
                                <b>Add : </b>
                            </div>
                            <div class="div_tab_col2">
                                <?php echo $stud_addr ;?>
                            </div>
                    </div><!--row-->

                </div><!-- main table-->
            </div><!--table container-->
    </div>


     <!--end-->


</div>
 <!--end-->
</section>
   <style>
  @page {
        size: A4 portrait;
        /*margin: 1m 1mm 1mm 1mm;*/
        margin: 1mm 1mm 1mm 1mm;
    }
    </style>