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

    <style>
          body
     {
            font-size: 70%;
        }
        
        .main_slip5 {
            display: inline-block;
            padding: 3px;
        }
        
        .slip_label {
            font-size: 65%;
            background-color: #888;
            padding: 3px;
            color: white;
            position: absolute;
        }
        
        .slip_input {
            min-width: 80px;
            border-bottom: 1px solid black;
            display: inline-block;
        }
        .slip_input1 {
            min-width: 80px;
            border-top: 1px solid black;
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

  .div_tab_row  {
    display: table-row;
    }


   @page {
      size: portrait;   /* auto is the initial value */
      margin: 2%;
   }
     @media print
   {
       span{border:none;}
    * {-webkit-print-color-adjust:exact;}  
   
   }
        
    </style>
    <section onload="setTimeout(myFunction(), 3000)">

    <div class="main_slip5">
    <center>
    <span style="font-size:200%;font-weight:700;">BANDRA URDU HIGH SCHOOL <br>JR COLLEGE OF SCI,COM & HSC.VOCATIONAL</span><br>
    <span style="font-size:200%;font-weight:200;"><?php echo $stud_school_addr;?></span><br>
    </center><br><br>
        <div class="slip_div" style="text-align:right">
            <p style="padding-right:9px;">From&emsp;&nbsp;&emsp;:
                <span><?php echo $stud_name;?></span><br>         
            </p>
            <p style="padding-right:38px;">
                Tel No.&emsp;&nbsp;&nbsp;&nbsp;<span><?php echo $stud_phone ;?></span></p>
                 <p style="padding-right:37px;">
                Date. &nbsp;&emsp;&nbsp;&nbsp;:&nbsp;<span><?php echo $date ; ?></span></p>
<p style="text-align:left;font-size:160%;">To</p>
<p style="text-align:left;font-size:160%;">The Principal,</p>
<p style="text-align:center;font-size:160%;"><u>Sub : Application for Leaving Certificate</u></p>
<p style="text-align:left;font-size:160%;">Respected Sir/Madam,</p>
<p style="text-align:left; padding-left:10px; font-size:160%;">I undesigned most respectfully request your good self to issue the bonafide certificate <br> of my son/myself,who has/have been/was studying in your institution during the academic <br> year&nbsp;&emsp;<span><?php echo $academic_year; ?></span></p>
 <p style="text-align:left; font-size:160%;">
                NAME&emsp;&nbsp;&nbsp;:&nbsp;<span><?php echo $stud_name;?></span></p>
                 <p>
              <p style="text-align:left;font-size:160%;">
              
              STD & DIV&emsp;:&nbsp;<span><?php echo $stud_class;?></span>&emsp;ROLL.NO &emsp;: <span><?php echo $stud_roll;?></span>&emsp;GR.NO &emsp;: <span><?php echo $gr_number;?></span>
              </p>       
<p style="text-align:left;font-size:160%;">
                REASON OF LEARNING&emsp;&nbsp;&nbsp;:&nbsp;<span class="slip_input" style="min-width:325px;" ></span><br><br>
            
                <p style="text-align:left;padding-left:147px;"><span class="slip_input" style="min-width:600px;" ></span></p>
                 </p>
                   <p  style="text-align:right; padding-right:60px;"><br><br>
                <span class="slip_input1" style="min-width:100px;"></span>
                 <p style="text-align:right; padding-right:70px; font-size:160%;">
                Sign of Applicant </p>
                </p>
                <hr></hr>
               <center> <p style=" font-size:160%;"><u>FOR OFFICE USE ONLY</p></u></center><BR>
 <p style="text-align:left;font-size:160%;">
              
              STD & DIV&emsp;:&nbsp;<span><?php echo $stud_class;?></span>&emsp;DATE OF LEARNING&emsp;: <span class="slip_input" style="min-width:195px;"></span>
              </p><br><br>


 <div class="tab_container">
                <div class="div_tab">

                    <div class="div_tab_row"><!--row-->
                            <div class="div_tab_col1">
                                CLERK    &emsp;  &emsp; &emsp;
                            </div>
                            <div class="div_tab_col1">
                            LIBRARIAN  &emsp;  &emsp; &emsp;
                            </div>
                            <div class="div_tab_col1">
                            COMPUTER TEACHER &emsp;  &emsp; &emsp;
                            </div>
                              <div class="div_tab_col1">
                            FEES CLERK  &emsp;  &emsp; &emsp;
                            </div>


                    </div><!--row-->
                     </div><!-- main table-->
            </div>
            <br><!--table container-->
<p style="text-align:left;">
                Remark&emsp;&nbsp;&nbsp;:&nbsp;<span class="slip_input" style="min-width:409px;" ></span></p>
                 <p><br><br>

               <div class="tab_container">
                <div class="div_tab">

                    <div class="div_tab_row"><!--row-->
                            <div class="div_tab_col1">
                                  CLass Teacher Name    &emsp;  &emsp; &emsp;
                            </div>
                            <div class="div_tab_col1">
                             Class Teacher Sign  &emsp;  &emsp; &emsp;
                            </div>
                            <div class="div_tab_col1">
                            A.H.M./Vice Principal &emsp;  &emsp; &emsp;
                            </div>
                              <div class="div_tab_col1">
                            Principal  &emsp;  &emsp; &emsp;
                            </div>


                    </div><!--row-->
                     </div><!-- main table-->
            </div><!--table container-->

                <h6 style="text-align:left; padding-left:30px; padding-right:30px; ;font-size:160%;">Note : It is necessary to bring School Calender/ Result/Card<br>(Any of them) for verification of identity</h6>


        </div>
    </div>
    
</section>


  

