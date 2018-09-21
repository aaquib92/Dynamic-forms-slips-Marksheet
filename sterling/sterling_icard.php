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

$global_arr['student_details'][0]['phone'] = (isset($global_arr['student_details'][0]['phone']) && !empty($global_arr['student_details'][0]['phone'])) ?''.$global_arr['student_details'][0]['phone'].'':$global_arr['student_credentials']['mobile'];
$global_arr['parent_details'][0]['phone'] = (isset($global_arr['parent_details'][0]['phone']) && !empty($global_arr['parent_details'][0]['phone'])) ?''.$global_arr['parent_details'][0]['phone'].'':'';

$stud_name    = (isset($global_arr['student_details'][0]['first_name']) && !empty($global_arr['student_details'][0]['first_name']))?strtoupper(''.$global_arr['student_details'][0]['first_name'].'  '.$global_arr['student_details'][0]['last_name'].''):'';
$stud_img     = (isset($global_arr['student_details'][0]['image']) && !empty($global_arr['student_details'][0]['image']))?''.$global_arr['student_details'][0]['image'].'':'';
$stud_class   = (isset($global_arr['student_selected_class'][0]['standard']) && !empty($global_arr['student_selected_class'][0]['standard']))?''.$global_arr['student_selected_class'][0]['standard'].' '.$global_arr['student_selected_class'][0]['section']:'';
$stud_dob     = (isset($global_arr['student_details'][0]['dob']) && !empty($global_arr['student_details'][0]['dob']))?''.date("d/m/Y", strtotime($global_arr['student_details'][0]['dob'])).'':'';
$stud_admi_no = (isset($global_arr['student_details'][0]['admission_user_id']) && !empty($global_arr['student_details'][0]['admission_user_id']))?''.$global_arr['student_details'][0]['admission_user_id']:'';
$stud_phone   = (isset($global_arr['student_details'][0]['phone']) && !empty($global_arr['student_details'][0]['phone']))?''.$global_arr['student_details'][0]['phone'].'':$global_arr['parent_details'][0]['phone'];
$stud_addr    = (isset($global_arr['student_details'][0]['address']) && !empty($global_arr['student_details'][0]['address']))?''.$global_arr['student_details'][0]['address'].'':'';


?>

<section onload="setTimeout(myFunction(), 3000)">
    <style>
        body {font-size: 80%;}
     .main_div{float:left;margin:0.7%;margin-top:1%;display:inline-block; margin-bottom:0.5in; padding-bottom:10px; width:54mm; height:82mm !important; border: 1px solid black; border-radius:12px; background-color: #f44336;
                /*outline: 1px solid #cccecc;*/
                /*outline-offset: 10px;*/
     }
      h4{color:yellow; font-size:0.8em; margin-left:17px; margin-bottom:-10px;}
     .college_title{font-size:0.6em; margin:1% 0px 0px 17% !important;color:white}
     span{border: none}
      .heading{color:yellow; font-size:0.65em; margin-left:17%; margin-top:-11%;text-align: center}
      table{font-size:0.7em; margin-top:-10px;}
      .title{font-weight:bold;}
      h6{font-size:0.6em; color:white;margin-top: 4%}
      .header{background-color: #f44336;text-align: left}
      #main_content {margin-top:-7%;min-height: 65%}
      .student_name_hide{display:none}
  

.tab_container {
        text-align:left;
        padding:1%;
    }
.div_tab {
    display: table;
    table-layout: fixed; width: 100%
    }
.title_tag{
    margin-top:2%;
}
  .div_tab_row  {
    display: table-row;
    }

  .div_tab_col1, .div_tab_col2 {
    display: table-cell;
    word-wrap: break-word;
    font-size:0.7em;
    padding: 1.5%;
    }
    .div_tab_col1{
        vertical-align: middle;
        width:25%;
    }

     @media print
        {
            #main_content {margin-top:-8%}
            * {-webkit-print-color-adjust:exact;}
        }
    </style>

<div class="main_div">
     <div class="header">
        <center class="title_tag"> <b class="college_title">National Center for Rural Development's</b></center><br>
         <img  width="27" height="31" src="<?=base_url()?>/assets/images/ncrd2.png"  style="margin-left:3%; margin-top:-12%;">
       
          <h4 class="heading"><span style="font-size:1.6em;">STERLING COLLEGE</span> <br>  OF ARTS,COMMERCE & SCIENCE </h4>
      
         <center><h6>D G Walse Patil Marg Plot No -43 Sec 19<br> Nerul,Navi Mumbai-4000 706 Ph No-022-27705535</h6></center>
     </div>
    <!-- ---------------end header-------------------------------->

    <div id="main_content" style="background-color:#fff;">
       <center><div class="" style="border-radius:1%; color:white;background-color:#e53935; width:60%;font-size:0.7em ;margin-bottom:-13px;">IDENTITY CARD:2017-2018</div></center><br>
       <center><img  width="75" class="school_logo" height="80" src="<?php echo $stud_img;?>" style="margin-bottom:-3px;"></center>
       <center style="font-size:0.80em;margin-top:2%"><b><?php echo $stud_name;?></b></center>

            <div class="tab_container">
                <div class="div_tab">

                    <div class="div_tab_row"><!--row-->
                            <div class="div_tab_col1">
                                <b>Program : </b>
                            </div>
                            <div class="div_tab_col2">
                                <?php echo $stud_class ;?>
                            </div>
                    </div><!--row-->
                    <div class="div_tab_row"><!--row-->
                            <div class="div_tab_col1">
                                <b>DOB : </b>
                            </div>
                            <div class="div_tab_col2">
                                <?php echo $stud_dob ;?>
                            </div>
                    </div><!--row-->
                    <div class="div_tab_row"><!--row-->
                            <div class="div_tab_col1">
                                <b>Mob.No:</b>
                            </div>
                            <div class="div_tab_col2">
                                <?php echo $stud_phone ;?>
                            </div>
                    </div><!--row-->
                    <div class="div_tab_row"><!--row-->
                            <div class="div_tab_col1">
                                <b>Address : </b>
                            </div>
                            <div class="div_tab_col2">
                                <?php echo $stud_addr ;?>
                            </div>
                    </div><!--row-->

                </div><!-- main table-->
            </div><!--table container-->

  </div>
          <div style="text-align:right;font-size:0.65em; background-color:#fff"><img width="75" height="27" src="<?=base_url()?>/assets/images/sterling_sign.png" alt="">&emsp;<br>Principal&emsp;&emsp;</div>
<!--end-->
</div>
<!--end-->
</section> 
   <style>
  @page {
        size: 12in 18in;
        margin: 25mm 1mm 30mm 1mm; 
    }
    </style>
