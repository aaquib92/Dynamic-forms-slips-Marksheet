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
        <style>
                .icard{
                        outline: #eee groove thin;
                        width: 57mm;
                        height: 91mm;
                        font-family: "Trebuchet MS",sans-serif;
                        font-size: 80%;
                        float:left;
                        display:inline-block; 
                        margin:1mm;
                        margin-top:3mm;
                }
                span{
                        vertical-align: top;
                        border: none;
                }
                .section_div{
                        padding: 3%;
                        /*outline: blue groove thin;*/
                        min-height: 15%;
                        display: -webkit-flex;
                        display: flex;
                        /*-webkit-flex-flow: row;*/
                }
                .font_small{font-size: 60%}
                .font_med{font-size: 70%}
                .text_left{ text-align: left;}
                .info_content{
                        padding-left: 3%;
                }
                .name_section{
                        padding-top: 2%;
                }
                .address_section{
                        padding-top: 3%;
                        line-height: 1.1em;
                }
                .address_section div{
                    max-height:20%;
                }
                .sign_section{
                        padding-right: 9%;
                        padding-top: 0%;
                        float: right;
                }
                .head_section{
                        background-color: #e53939;
                        color: white;
                }

               .student_name_hide{display:none}
				
			   .school_logo{
                        background-color: white;					
				}
               @page {
                   
                    size: A4 landscape;
                    margin: 9mm 1mm 9mm 1mm;
                }
        </style>

        <center class="icard">

                <!------------------ HEAD SECTION-------------------->
                <div class="section_div head_section">
                        <div><img class="school_logo" src="<?php echo $stud_school_logo ; ?>" height="50" width="50"></div>
                        <div><b><?php echo $stud_school_name ; ?></b><br><span class="font_med"><?php echo $stud_school_addr ; ?></span></div>
                        <div></div>
                        
                </div>
                <!------------------ NAME SECTION-------------------->
                <div class="name_section">
                        <center><b> <?php echo $stud_name ;?></b></center>
                </div>
                <!------------------ IMAGE SECTION-------------------->
                <div class="section_div image_section">
                        <div><img src="<?php echo $stud_img ; ?>" height="100" width="80"></div>
                        <div class="info_content font_med text_left">
                                    <div><b>Std.</b> :&emsp; <?php echo $stud_std ;?></div>
                                <br><div><b>Div.</b> :&emsp; <?php echo $stud_div ;?></div>
                                <br><div><b>Roll No.</b> :&emsp; <?php echo $stud_roll ;?></div>
                                <br><div><b>Dob.</b> :&emsp; <?php echo $stud_dob ;?></div>
                                <br><div><b>Mob.</b> :&nbsp; <?php echo $stud_phone ;?></div>
                        </div>
                        
                </div>
                <!------------------ ADDRESS SECTION-------------------->
                <div class="section_div address_section">
                         <div class="font_med text_left">
                        <div><b> Address. :</b><?php echo $stud_addr ;?></div>
                         </div>
                        
                </div>
                <div class="section_div sign_section font_med">
                        <div><img src="<?php echo base_url()."assets/23/images/prakash_principal.png" ; ?>" height="15" width="35"><br><img src="<?php echo base_url()."assets/23/images/Prakash Vidyalaya Stamp.png" ; ?>" height="20" width="70"><br><b>Principal<b></div>
                </div>


        </center>
