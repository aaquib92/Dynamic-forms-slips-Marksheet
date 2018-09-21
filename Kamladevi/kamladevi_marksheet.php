<?php

$global_arr = array();
$academic_year = "";
$id = "";
if( isset($data['student_id']))
{
$id = $data['student_id'];
$global_arr = get_student_by_id($id);

 $co_scho_res = json_decode(get_students_class_curriculum($id) , true)['data'];

//   echo print_array($co_scho_res);die();
}
$academic_year = (date('m') < 6) ?((date('Y')-1)." - ".date('Y')):date('Y')." - ".(date('Y')+1);
$global_arr['student_credentials']['mobile'] = !(isset($global_arr['student_credentials']['mobile']) || empty($global_arr['student_credentials']['mobile'])) ?'':FALSE;
$parent_mobile = !(isset($global_arr['parent_credentials']['parent_mobile']) || empty($global_arr['parent_credentials']['parent_mobile'])) ?'':'';

$global_arr['student_details'][0]['phone'] = (isset($global_arr['student_details'][0]['phone']) && !empty($global_arr['student_details'][0]['phone'])) ?''.$global_arr['student_details'][0]['phone'].'':$global_arr['student_credentials']['mobile'];
$global_arr['parent_details'][0]['phone'] = (isset($global_arr['parent_details'][0]['phone']) && !empty($global_arr['parent_details'][0]['phone'])) ?''.$global_arr['parent_details'][0]['phone'].'':'';
$parent_name = (isset($global_arr['parent_details'][0]['first_name']) && !empty($global_arr['parent_details'][0]['first_name']))?strtoupper(''.$global_arr['parent_details'][0]['first_name'].'  '.$global_arr['parent_details'][0]['last_name'].''):'';

$stud_name = (isset($global_arr['student_details'][0]['first_name']) && !empty($global_arr['student_details'][0]['first_name']))?strtoupper(''.$global_arr['student_details'][0]['first_name'].'  '.$global_arr['student_details'][0]['last_name'].''):'';
$stud_nationality = (isset($global_arr['student_details'][0]['nationality']) && !empty($global_arr['student_details'][0]['nationality']))?''.$global_arr['student_details'][0]['nationality'].'':'';
$gr_number = (isset($global_arr['student_details'][0]['gr_number']) && !empty($global_arr['student_details'][0]['gr_number']))?''.$global_arr['student_details'][0]['gr_number'].'':'';
$aadhar_no = (isset($global_arr['student_details'][0]['aadhar_no']) && !empty($global_arr['student_details'][0]['aadhar_no']))?''.$global_arr['student_details'][0]['aadhar_no'].'':'';
$dob = (isset($global_arr['student_details'][0]['dob']) && !empty($global_arr['student_details'][0]['dob']))?''.$global_arr['student_details'][0]['dob'].'':'';
$place_of_birth = (isset($global_arr['student_details'][0]['place_of_birth']) && !empty($global_arr['student_details'][0]['place_of_birth']))?''.$global_arr['student_details'][0]['place_of_birth'].'':'';
$admission_year = (isset($global_arr['student_details'][0]['admission_year']) && !empty($global_arr['student_details'][0]['admission_year']))?''.$global_arr['student_details'][0]['admission_year'].'':'';
$religion = (isset($global_arr['student_details'][0]['religion']) && !empty($global_arr['student_details'][0]['religion']))?''.$global_arr['student_details'][0]['religion'].'':'';
$caste = (isset($global_arr['student_details'][0]['caste']) && !empty($global_arr['student_details'][0]['caste']))?''.$global_arr['student_details'][0]['caste'].'':'';
$stud_img = (isset($global_arr['student_details'][0]['image']) && !empty($global_arr['student_details'][0]['image']))?''.$global_arr['student_details'][0]['image'].'':'';
$stud_class = (isset($global_arr['student_selected_class'][0]['standard']) && !empty($global_arr['student_selected_class'][0]['standard']))?''.$global_arr['student_selected_class'][0]['standard'].' '.$global_arr['student_selected_class'][0]['section']:'';
$stud_std = (isset($global_arr['student_selected_class'][0]['standard']) && !empty($global_arr['student_selected_class'][0]['standard']))?''.$global_arr['student_selected_class'][0]['standard']:'';
$stud_div = (isset($global_arr['student_selected_class'][0]['section']) && !empty($global_arr['student_selected_class'][0]['section']))?''.$global_arr['student_selected_class'][0]['section']:'';
$stud_dob = (isset($global_arr['student_details'][0]['dob']) && !empty($global_arr['student_details'][0]['dob']))?''.date("d/m/Y", strtotime($global_arr['student_details'][0]['dob'])).'':'';
$stud_roll = (isset($global_arr['student_details'][0]['rollno']) && !empty($global_arr['student_details'][0]['rollno']))? $global_arr['student_details'][0]['rollno'] : '';
$stud_admi_no = (isset($global_arr['student_details'][0]['admission_user_id']) && !empty($global_arr['student_details'][0]['admission_user_id']))?''.$global_arr['student_details'][0]['admission_user_id']:'';
$stud_phone = (isset($global_arr['student_details'][0]['phone']) && !empty($global_arr['student_details'][0]['phone']))?''.$global_arr['student_details'][0]['phone'].'':$global_arr['parent_details'][0]['phone'];
$stud_addr = (isset($global_arr['student_details'][0]['address']) && !empty($global_arr['student_details'][0]['address']))?''.$global_arr['student_details'][0]['address'].'':'';
$parent_email = (isset($global_arr['parent_credentials']['parent_email']) && !empty($global_arr['parent_credentials']['parent_email']))?''.$global_arr['parent_credentials']['parent_email'].'':'';
$class_rank = (isset($global_arr['student_selected_class'][0]['rank']) && !empty($global_arr['student_selected_class'][0]['rank']))?''.$global_arr['student_selected_class'][0]['rank'].' '.$global_arr['student_selected_class'][0]['rank']:'';

$stud_school_name = get_session_data()['profile']['partner_name'];
$stud_school_addr = get_session_data()['profile']['address'];
$stud_school_logo = get_session_data()['profile']['logo'];

$array_data = unserialize(base64_decode(get_session_data()['marksheet']));

$this->session->unset_userdata('marksheet');
// $co_scho_res = json_decode(get_students_class_curriculum($id) , true)['data'];

// echo print_array($co_scho_res);die();

$sem1=[];
$sem2=[];
$sorted_arr = [];       
$sem1_exms = [];
$sem2_exms = [];
$sem1_exms_name = [];
$sem2_exms_name = [];
$sem1_exms_tots = [];
$sem2_exms_tots = [];
$sem1_exms_marks_obt =[];
$sem2_exms_marks_obt=[];

$subjects = [];

// $subject_sequence_primary =['english','marathi','hindi','maths','e.v.s','computer','art','craft','health & p.Edu'];
if($class_rank > 80){

   $subject_sequence =['english','marathi','hindi','maths', 'science','social_science','drawing','computer','art','p.e','p.edu'];

}else{
    $subject_sequence =['english','marathi','hindi','maths','e.v.s','evs','evs_1','evs_2','e.v.s_1','e.v.s_2','computer','art','craft','sports','p.e','drawing','p.edu'];

}

// subject sequence for primary

    foreach ($subject_sequence as $k_sub => $v_sub)
      
        {
                foreach($array_data['data'] as $key_data => $data)

                        {
                       

                                $arr_subj = str_replace(' ','_',(strtolower(trim($data['subject_name']))));
                                if($v_sub == $arr_subj)
                                {
                                $sorted_arr[] = $data;
                                }
                        }
        }

        // end

foreach($sorted_arr as $key_data => $data)
        { 
            
        //  echo print_array($data);die();

        $temp=[];                                                               
        $temp1=[];                                                              
                foreach($data['exam'] as $key_exam => $v1)
                {
                   
					    //-------- ADD SUBJECTS IN SUBJECTS ARRAY
                        (!(in_array($data['subject_name'],$subjects))) ? $subjects[] = $data['subject_name'] : FALSE; 
                        
                        $v1['sem'] = isset($v1['sem']) ? $v1['sem'] : 'ND';
                        $t = $data['exam'][$key_exam];
                        $t['subject_name'] = $data['subject_name'];
                        //----------------------------FOR SEM 1-------------------
                        if( $v1['sem'] == 1){
		                        $temp[]  = $t;
										$sem1_exms_tots[$v1['exam_id']] = !(isset($sem1_exms_tots[$v1['exam_id']])) ? 0 :$sem1_exms_tots[$v1['exam_id']];
										$sem1_exms_name[$v1['exam_id']] = $v1['exam_name'];
										$sem1_exms_tots[$v1['exam_id']] = isset($v1['total_marks']) ? $v1['total_marks'] : $sem1_exms_tots[$v1['exam_id']];
										!(in_array($v1['exam_id'],$sem1_exms)) ? $sem1_exms[] = $v1['exam_id'] : FALSE;							
                        }
                        //----------------------------FOR SEM 2-------------------
                        if( $v1['sem'] == 2){
                                $temp1[]  = $t;
										$sem2_exms_tots[$v1['exam_id']] = !(isset($sem2_exms_tots[$v1['exam_id']])) ? 0 :$sem2_exms_tots[$v1['exam_id']];
										$sem2_exms_name[$v1['exam_id']] = $v1['exam_name'];
										$sem2_exms_tots[$v1['exam_id']] = isset($v1['total_marks']) ? $v1['total_marks'] : $sem2_exms_tots[$v1['exam_id']];
										!(in_array($v1['exam_id'],$sem2_exms)) ? $sem2_exms[] = $v1['exam_id'] : FALSE;
                        
					}
                }
                !(empty($temp)) ? $sem1[$key_data]['exam'] = $temp  : FALSE;
                !(empty($temp1)) ? $sem2[$key_data]['exam'] = $temp1 : FALSE;
        }


$sem1_e = isset($sem1[0]['exam']) ? (count($sem1[0]['exam']) + 4) : 4;
$sem2_e = isset($sem2[0]['exam']) ? (count($sem2[0]['exam']) + 4) : 4;
$sem1_m =  isset($sem1[0]['exam']) ? (count($sem1[0]['exam']) +0) : 0;
$sem2_m =  isset($sem2[0]['exam']) ? (count($sem2[0]['exam']) + 0) : 0;








   // GRADE FUNCTION

$gr_arr = ['E','D','C2','C1','B2','B1','A2','A1'];
function check_grade($marks)
{
    $grade ;
    if($marks <= 20){ $grade = 'E-2';  return $grade;   }
    elseif($marks >= 21 && $marks <= 32)    {$grade = 'E-1';   return $grade; }
    elseif($marks >= 33 && $marks <= 40)    {$grade = 'D';     return $grade; }
    elseif($marks >= 41 && $marks <= 50)    {$grade = 'C-2';   return $grade; }
    elseif($marks >= 51 && $marks <= 60)    { $grade = 'C-1';  return $grade; } 
    elseif($marks >= 61 && $marks <= 70)    { $grade = 'B-2';  return $grade; }
    elseif($marks >= 71 && $marks <= 80)    { $grade = 'B-1';  return $grade; } 
    elseif($marks >= 81 && $marks <= 90)    { $grade = 'A-2';  return $grade; }
    elseif($marks >= 91 && $marks <= 100)   { $grade = 'A-1'; return $grade;  }
}

?>
<head> <link rel="stylesheet" href="<?php echo base_url().'assets/css/pikaday.min.css';?>">
</head>
<script>
$('.common_input').keyup(function(){
        $(this).attr('value',$(this).val()); 
    });
     $('.date_of_reopen').change(function(){
        $(this).attr('value',$(this).val());   
    });
     $('.date_of_generation').change(function(){
        $(this).attr('value',$(this).val());   
    });
</script>
<section onload="setTimeout(myFunction(), 3000)">
<style>
    .marksheet-div{width:95%; height:auto; display:inline-block; }
    
    .left{float:left; padding-top:1%; padding-left:3%;}
    .right{float:right;  padding-top:1%;  padding-right:3%;}
    .div-input1{ margin:0 auto;float:left; padding-left:3%;font-size:0.7em;}
    .slip-input1 { min-width: 100px; border-bottom: 1px solid black;display: inline-block; }
     @page { size: Landscape; margin:0;}
     .div_tab_col1, .div_tab_col2 { display: table-cell;}
    .tab_container {text-align:left; padding-left:3%;}
    .div_tab { display: table; table-layout: fixed; }
    .div_tab_row {  display: table-row;}
    @media print{ span{border:none}*{-webkit-print-color-adjust:exact} .common_input{border:none;} .date_of_reopen{border:none;}  .date_of_generation{border:none;}      }    
    td { vertical-align:center;border: 1px; border-style:solid; border-color:#4970AA;color:#4970AA; }
    th { text-align: center; vertical-align:center;border: 1px; border-color:#4970AA;color:#4970AA; }
 
 
    
</style>
        <!--MARKSHEET DIV STARTS-->
<div class="marksheet-div" style="padding:3%; color:#4970AA"> 
         <!--START OF HEADER BLOCK-->
    <div id="header_block" style="display:flex;">    
        
        <div id="school_logo" style="width:15%"> 
            <img width="100px" height="100px" src="<?=base_url();?>/assets/18/images/kamladevi_logo.png"> 
        </div>
    
        <div id="school_name" style="width:85%;">
            <center>
            <span style="font-size:2em;font-weight:700;font-family:Arial, Helvetica, sans-serif;"><?php echo $stud_school_name; ?></span><br>
            <span style="font-size:1em;font-weight:300;"><?php echo $stud_school_addr; ?> </span><br><br>
            <span><table style="border:1px; border-style:solid; border-color:#4970AA;width:27%; font-weight:700; font-family:Arial, Helvetica, sans-serif; box-shadow: -5px 10px 5px #4970AA;"> 
            <tr> <th>PROGRESS REPORT<br><?php echo $academic_year; ?></th></tr> 
            </table> </span><br>
            </center>
        </div>
        <!--<div>
            <img width="100px" height="100px" src="<?=base_url();?>/assets/18/images/kamladevi_logo.png"> 
        </div>-->
    </div> <!--HEADER BLOCK ENDS --> 
            <!--STUDENT INFO DIV-->
    <div class="stud_info" style="padding:5px">
        
        <table style="width:95%; border-style:none; line-height:20px;border:0px">
            <tr>
            <td style="border-style:none;"> Student's name:</td>
            <td style="border-style:none;"><b><?php echo $stud_name;  ?></b></td>
            <td style="border-style:none;">Father's Name:</td>
            <td style="border-style:none;"><b><?php echo $parent_name;?></b></td>
            </tr>
            <tr>
            <td style="border-style:none;"> Class:</td>
            <td style="border-style:none;"><b><?php echo $stud_std; ?></b></td>
            <td style="border-style:none;"> Div:</td>
            <td style="border-style:none;"><b><?php echo $stud_div; ?></b></td>
            <td style="border-style:none;"> G.R. No.:</td>
            <td style="border-style:none;"><b><?php echo $gr_number; ?></b></td>
            <td style="border-style:none;"> Roll No.:</td>
            <td style="border-style:none;"><b><?php echo $stud_roll; ?></b></td>
            </tr>
            <tr>
            <td style="border-style:none;"> Date of Birth:</td>
            <td  style="border-style:none;"><b><?php echo $stud_dob; ?></b></td>
            <td  style="border-style:none;"> Contact No.:</td>
            <td  style="border-style:none;"><b><?php echo $global_arr['parent_details'][0]['phone']; ?></b></td>
            <td  style="border-style:none;"> E-mail: </td>
            <td  style="border-style:none;" colspan="3"><b><?php echo $parent_email; ?></b></td>
            </tr>
        </table>    
        <br>
    </div>      <!-- STUDENT INFO DIV ENDS-->
     <hr>
     <!--MARKSHEET DIV FOR SEM 1 STARTS-->
    <div class="marks_div">     
        <div style="width:21%; float:left; ">
                   
       <?php    
       $sem1_table ='';  
       $serial_no ='';
       $serial_num ='';
       $pc_id = (isset($global_arr['student_selected_class'][0]['pc_id']) && !empty($global_arr['student_selected_class'][0]['pc_id']))?$global_arr['student_selected_class'][0]['pc_id']:'';

      //-- IF USER SELECTS ANY ONE OF SEM I EXAM-->
        if(count($sem1)){
            $sem1_table .= "<span><center><b> FIRST SEMESTER </b></center></span>"
                        . "<table  class ='cust_table sem1_table' style='border-collapse:collapse;border: 1px; line-height:normal; width:95%;' cellpadding ='6'>"
                        . "<tr><td style='text-align:center; width:25%;'>Sr <br> No.</td><td style='text-align:center; width:25%;'>SUBJECT</td><td style='text-align:center; width:25%;'>GRADE</td></tr>";
                    
                    // START OF LOOP FOR SEM1
                foreach ($sem1 as $k1 => $v1) {
                  
                    $serial_no = $k1+1;
                    $sem1_table .= "<tr><td style='font-size:0.8em; text-align:center;'>$serial_no</td><td style='font-size:0.8em;'>".$v1['exam'][0]['subject_name']."</td>";

                            $total_marks_obtained =0;
                            $total_max_marks =0;

                            //-----------------PRINTING  MARKS OBTAINED AND TOTAL MARKS 

                        foreach ($v1['exam'] as $k2 => $v2) {

                            $v2['marks_obtained']=isset($v2['marks_obtained']) ? $v2['marks_obtained'] : 0;
                            $v2['total_marks']=isset($v2['total_marks']) ? $v2['total_marks'] : 0;
                            $total_marks_obtained += $v2['marks_obtained'];
                            $total_max_marks += $v2['total_marks'];

                        }
                        //   CALCULATION OF PERCENTAGE

                            $percent= round(($total_marks_obtained/$total_max_marks)*100);
                            $sem1_table .=    "<td style='font-size:0.8em;'>". check_grade($percent)."</td></tr>";
                }
              // END OF LOOP SOR SEM1 



                        // code for co-scholastic subjects for sem 1
                  if(isset($co_scho_res[$pc_id]['1']) && (sizeof($co_scho_res[$pc_id]['1'])> 0)){
                         
                          foreach($co_scho_res[$pc_id]['1'] as $k => $v) {
                               $serial_num = $serial_no+1;

                                $sem1_table.= "<tr><td style='font-size:0.8em; text-align:center;'>$serial_num</td><td style='font-size:0.8em;'>".$v['curriculum_name']."</td><td style='font-size:0.8em;'>".check_grade($v['grade'])."</td></tr>";

                          }
                        //   echo  $co_scho_table;

                      }

                     // end of co scholastic
  

            $sem1_table .= "</table>";
            echo $sem1_table;
            
        }

?>

</div>
    
               <!--MARKSHEET DIV FOR SEM II STARTS-->
            <div style="width:21%; float:left;">
          
             
           <?php 
             $sem2_table ='';  
             $serial_no ='';
               $serial_num ='';
       $pc_id = (isset($global_arr['student_selected_class'][0]['pc_id']) && !empty($global_arr['student_selected_class'][0]['pc_id']))?$global_arr['student_selected_class'][0]['pc_id']:'';
          //-- IF USER SELECTS ANY ONE OF SEM II EXAM-->    
        if(count($sem2)){
                 $sem2_table .= "<span><center><b> SECOND SEMESTER </b></center></span>"
                        . "<table class = 'cust_table sem2_table' style='border-collapse:collapse;border: 1px; line-height:normal; width:95%;' cellpadding ='6'>"
                        . "<tr><td style='text-align:center; width:25%;'>Sr<br> No.</td><td style='text-align:center; width:25%;'>SUBJECT</td><td style='text-align:center; width:25%;'>GRADE</td></tr>";
                    // STARRT OF SEM 2 FOR LOOP
                foreach ($sem2 as $k1 => $v1) {
                      $serial_no = $k1+1;


                    $sem2_table .= "<tr><td style='font-size:0.8em;text-align:center;'>$serial_no</td><td style='font-size:0.8em;'>".$v1['exam'][0]['subject_name']."</td>";

                           $total_marks_obtained =0;
                           $total_max_marks =0;

                                   //-----------------PRINTING  MARKS OBTAINED AND TOTAL MARKS 

                        foreach ($v1['exam'] as $k2 => $v2) {

                            $v2['marks_obtained']=isset($v2['marks_obtained']) ? $v2['marks_obtained'] : 0;
                            $v2['total_marks']=isset($v2['total_marks']) ? $v2['total_marks'] : 0;
                            $total_marks_obtained += $v2['marks_obtained'];
                            $total_max_marks += $v2['total_marks'];

                        }
                               //   CALCULATION OF PERCENTAGE
                            $percent= round(($total_marks_obtained/$total_max_marks)*100);

                            $sem2_table .=    "<td style='font-size:0.8em;'>". check_grade($percent)."</td></tr>";

                }

                // END OF SEM 2 FOR LOOP



                  // code for co-scholastic subjects for sem 2
                  if(isset($co_scho_res[$pc_id]['2']) && (sizeof($co_scho_res[$pc_id]['2'])> 0)){
                         
                          foreach($co_scho_res[$pc_id]['2'] as $k => $v) {
                               $serial_num = $serial_no+1;

                                $sem2_table.= "<tr><td style='font-size:0.8em;text-align:center;'>$serial_num</td><td style='font-size:0.8em;'>".$v['curriculum_name']."</td><td style='font-size:0.8em;'>".check_grade($v['grade'])."</td></tr>";

                          }
                        //   echo  $co_scho_table;

                      }

                     // end of co scholastic
  

            $sem2_table .= "</table>";

            echo  $sem2_table ;      
            
        }

?>

            </div>


 <!--END-->
      
        <div style="width:32%; float:left;">
            <span><center><b> REMARKS: </b></center></span>
        
            <table style="width:95%; border-collapse:collapse; line-height:normal;" class ="remarks_table" cellpadding="6" >
                <tr><td colspan="2" style ="text-align:center;">DESCRIPTIVE REMARKS</td></tr>

                <tr>
                <td style='font-size:0.8em;' >Special Progress:</td>
                <td style="text-align : center; padding-bottom:3px;">______________________<br><br>______________________ </td>
                </tr>

                <tr>
                <td style='font-size:0.8em;'>Interest/Hobbies:</td>
                <td style="text-align : center;padding-bottom:3px;">______________________<br><br>______________________</td>
                </tr>

                <tr>
                <td style='font-size:0.8em;'>Improvement Needed:</td>
                <td style="text-align : center;padding-bottom:3px;">______________________<br><br>______________________</td>
                </tr>
            </table>
            </div>
            

              <!--<div style="width:32%; float:left;">
            <span><center><b> REMARKS: </b></center></span>
        
            <table style="width:95%; border-collapse:collapse; line-height:normal;" class="remarks_table" >
                <tr><td colspan="2">DESCRIPTIVE REMARKS</td></tr>

                <tr>
                <td>Special Progress:</td>
                <td style="text-align : center; padding-bottom:3px;"><input type="text" class = "common_input"><br><input type="text" class = "common_input"></td>
                </tr>

                <tr>
                <td>Interest/Hobbies:</td>
                <td style="text-align : center; padding-bottom:3px;"><input type="text" class = "common_input"><br><input type="text" class = "common_input"></td>
                </tr>

                <tr>
                <td>Improvement Needed:</td>
                <td style="text-align : center; padding-bottom:3px;"><input type="text" class = "common_input"><br><input type="text" class = "common_input"></td>
                </tr>
            </table>
            </div>-->


             <div style="width:20%; float:left;">
                <span ><b><center style="margin-top:-1%;">ATTENDANCE RECORD: </center></b></span>
                <table style="text-align:center; line-height:normal;"  class ="att_rec">
                    <tr>
                        <td>GRAND TOTAL</td>
                        <td><input type="text" class = "common_input"></td>
                    </tr>
                    <tr>
                        <td> FIRST SEMESTER </td>
                        <td><input type="text" class = "common_input"></td>
                    </tr>
                    <tr>
                        <td>SECOND SEMESTER </td>
                        <td><input type="text" class = "common_input"></td>
                    </tr>
                </table>
                
                
             </div>
            

        
    </div>  <!-- MARKS DIV ENDS-->
    <br>
    
    
</div>    <!-- CLASS MARKSHEET DIV ENDS  -->
    <br>
    <div style="float:left;padding-left:3%">
        <span style="color:#4970AA;font-size:0.7em;font-weight:700;">PROMOTED TO STD:_________ </span>
        <span style="color:#4970AA;padding:1%;font-size:0.7em;font-weight:700;">DIV:________ </span>
        <span style="color:#4970AA;padding-left:1%;font-size:0.7em;font-weight:700;">SCHOOL RE-OPENS ON:&nbsp; <input type ="text"  style="width:14%" class="date_of_reopen" value="15 June 2018"> </span>
	
	  <span style="color:#4970AA;padding-left:1%;font-size:0.7em;font-weight:700;">DATE: &nbsp; <input type ="text" style="width:25%"   class ="date_of_generation" placeholder="Marksheet generation date" value="27 April 2018"> </span> 

    </div><br><br><br>
    <div style ="float:right;padding-right:3%;">
       <span style="color:#4970AA; padding-right:10%; border-top:1px solid black;font-size:0.8em;font-weight:700;">Class Teacher's Signature</span>
       <span style="color:#4970AA; padding-right:5%; border-top:1px solid black;font-size:0.8em;font-weight:700;">Headmistress Signature</span>
       
    </div>
    <br>
<table style="width:94%; border-collapse:collapse; line-height:15px; margin-left:3%;text-align:center;">
    <tr>
        <td rowspan ="2">GRADE KEY</td>
        <td>91% - 100%</td>
        <td>81% - 90%</td>
        <td>71% - 80%</td>
        <td>61% - 70%</td>
        <td>51% - 60%</td>
        <td>41% - 50%</td>
        <td>33% - 40%</td>
        <td>21% - 32%</td>
        <td>20% & Below</td>
    </tr>
    <tr>
        <td>A-1</td>
        <td>A-2</td>
        <td>B-1</td>
        <td>B-2</td>
        <td>C-1</td>
        <td>C-2</td>
        <td>D</td>
        <td>E-1</td>
        <td>E-2</td>
    
    </tr>
</table>

<script>
 
$(document).ready(function(){
     // for table equal height
    $('.remarks_table').css({ 'height': $('.sem2_table').outerHeight() });
    $('.remarks_table').css({ 'height': $('.sem1_table').outerHeight() });
    $('.attr_rec').css({ 'height': $('.sem2_table').outerHeight() });
// end
 
         //   pickaday datepicker
var student_id = "<?php echo $id; ?>";
        

        var picker = new Pikaday({
                        field: document.getElementById('picka1'+student_id),
                        format: 'DD-MM-YYYY',
                        onSelect: function() {
                        }
                    });
                      var picker = new Pikaday({
                        field: document.getElementById('picka2'+student_id),
                        format: 'DD-MM-YYYY',
                        onSelect: function() {
                        }
                    });
                   // end
});
</script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/pikaday.min.js';?>"></script>

</section>