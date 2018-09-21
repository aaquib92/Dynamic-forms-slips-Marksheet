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



foreach($array_data['data'] as $key_data => $data)
        { 
            
        //   echo print_array($data);die();

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
										$sem1_exms_name[$v1['exam_id']] = $v1['exam_name'].'<div style="border-top:1px solid #4970AA;">'.$v1['total_marks'].'</div><div style="border-top:1px solid #4970AA;"></div>';
										$sem1_exms_tots[$v1['exam_id']] = isset($v1['total_marks']) ? $v1['total_marks'] : $sem1_exms_tots[$v1['exam_id']];
										!(in_array($v1['exam_id'],$sem1_exms)) ? $sem1_exms[] = $v1['exam_id'] : FALSE;	
                                    						
                        }
                        //----------------------------FOR SEM 2-------------------
                        if( $v1['sem'] == 2){
                                $temp1[]  = $t;
										$sem2_exms_tots[$v1['exam_id']] = !(isset($sem2_exms_tots[$v1['exam_id']])) ? 0 :$sem2_exms_tots[$v1['exam_id']];
										$sem2_exms_name[$v1['exam_id']] = $v1['exam_name'].'<div style="border-top:1px solid #4970AA;">'.$v1['total_marks'].'</div><div style="border-top:1px solid #4970AA;"></div>';
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


<section onload="setTimeout(myFunction(), 3000)">
<style>
    .marksheet-div{width:95%; height:auto; display:inline-block; border:1px solid #4970AA; }
    
    .left{float:left; padding-top:1%; padding-left:3%;}
    .right{float:right;  padding-top:1%;  padding-right:3%;}
    .div-input1{ margin:0 auto;float:left; padding-left:3%;font-size:0.7em;}
    .slip-input1 { min-width: 100px; border-bottom: 1px solid black;display: inline-block; }
     @page { size: Landscape; margin:1%;}
     .div_tab_col1, .div_tab_col2 { display: table-cell;}
    .tab_container {text-align:left; padding-left:3%;}
    .div_tab { display: table; table-layout: fixed; }
    .div_tab_row {  display: table-row;}
    @media print{ span{border:none}*{-webkit-print-color-adjust:exact}    }    
    /*td { vertical-align:center;border: 1px; border-style:solid; border-color:#4970AA;color:#4970AA; }
    th { text-align: center; vertical-align:center;border: 1px; border-color:#4970AA;color:#4970AA; }
 */
   .th_class{
    border:1px;
    border-style:solid;
    }
    .td_class{
    border:1px;
    border-style:solid;
    border-color: #4970AA;
    }
    
</style>
        <!--MARKSHEET DIV STARTS-->
<div class="marksheet-div" style="padding:3%;"> 
         <!--START OF HEADER BLOCK-->
    <div id="header_block" style="display:flex;">    
        
        <div id="school_logo" style="width:15%"> 
            <img width="100px" height="100px" src="<?php echo $stud_school_logo; ?>"> 
        </div>
    
        <div id="school_name" style="width:85%;">
            <center>
            <span style="font-size:2em;font-weight:700;font-family:Arial, Helvetica, sans-serif;color:#4970AA;"><?php echo $stud_school_name; ?></span><br>
            <span style="font-size:1em;font-weight:700;color:#4970AA;"><?php echo $stud_school_addr; ?> </span><br>
            <span style="font-size:1.2em;font-weight:700;color:#4970AA;">STATEMENT OF MARKS </span><br>
            <span style="font-size:1em;font-weight:700;"><?php echo $academic_year; ?> </span><br><br>
            </center>
        </div>
        
    </div> <!--HEADER BLOCK ENDS --> 
            <!--STUDENT INFO DIV-->
    <div class="stud_info" style="padding:5px">
        
        <table style="width:95%; border-style:none; line-height:20px;border:0px">
            <tr>
            <td style="border-style:none;color:#4970AA;"><b> NAME OF THE CANDIDATE:</b></td>
            <td style="border-style:none;"><?php echo $stud_name;  ?></td>
            <td style="border-style:none;color:#4970AA;"><b>CLASS:</b></td>
            <td style="border-style:none;"><?php echo $stud_class;?></td>
            <td style="border-style:none;color:#4970AA;"><b>SEAT NO:</b></td>
            <td style="border-style:none;"></td>
            </tr>
           
        </table>    
        <br>
    </div>   
        <!--STUDENT INFO DIV ENDS-->
    
         <!--IF USER SELECTS ANY ONE OF SEM I EXAM-->
         <table class ="sem1_table"  cellpadding ="4" style="float:left; width:50%;border-collapse:collapse;font-size:100%;  border:1px #4970AA;">
         <tr class ="sem1_head">
<?php

$total = '';
       echo "<th class='td_class' style='color: #4970AA'>". "SUBJECTS" . "</th>";
                  if(count($sem1)){

             

                       foreach($sem1_exms_name as $k =>  $v_exam)

                  {
                // echo print_array($v_exam);
                echo "<th class='td_class' style='color: #4970AA' >". $v_exam . "</th>";

               
               
                  }
                  }
                 
            echo "<th class='td_class' style='color: #4970AA'>TOTAL <div style='border-top:1px solid #4970AA;'>50</div><div style='border-top:1px solid #4970AA;'>A</div> </th>";
            echo "<th class='td_class' style='color: #4970AA'>1st Term </th>";


 ?>

</tr>
<?php

$sem1_total=[];
$sem1_max=[];
// loop for printing subjects
   foreach ($sem1 as $k_sem1 => $v_sem1){
                  
    echo "<tr class = 'sem1_row'> <td class='td_class  nowrap align ' style='font-size:0.7em;'>";
    echo $v_sem1['exam'][0]['subject_name']."</td>";


                 $sem1_sub_total =0;
                 $sub_max_marks =0;

        $exms_list =  array_column($v_sem1['exam'],'exam_id');

        $temp_exm = [];

        foreach ($sem1_exms as $k3 => $v3) {

                        $temp_exm[$k3] =  Array(
                                                'exam_id' => $v3,
                                                'total_marks' => 0,
                                                'passing_marks' => 0,
                                                'marks_obtained' => 0,
                                                );
                        
                        foreach ($v_sem1['exam'] as $k5 => $v5) {

                                if( $v3 == $v5['exam_id'])
                                {
                                        $temp_exm[$k3] = $v5;
                                }  
                        }
                
        }
                     // loop for printing sem1 marks
    foreach($temp_exm as $k_marks => $v_marks)
    {
                        $v_marks['marks_obtained'] = isset($v_marks['marks_obtained']) ? $v_marks['marks_obtained'] : 0;
                        echo "<td class='td_class'>" . $v_marks['marks_obtained']."</td>";
                        $sem1_sub_total += $v_marks['marks_obtained'];
                        $sub_max_marks += $v_marks['total_marks'];
    }
    // end
    $sem1_total[] =$sem1_sub_total;
    $sem1_max[]=$sub_max_marks;
    echo "<td class='td_class'>".$sem1_sub_total ."</td><td class='td_class'></td></tr>";
 
    }
    // end of subjects loop
    echo "</table>";

    //  SEM 2 
 $sem2_total=[];
 $sem2_max=[];
if(sizeof($sem2) > 0)
{

 echo "<table class ='sem2_table' cellpadding ='4' style='float:left; width:35%;border-collapse:collapse;font-size:100%;  border:1px #4970AA;'>";

 echo"<tr class ='sem2_head'>";

    foreach($sem2_exms_name as  $v_exam)
        {
                echo "<th class='td_class'  style='color: #4970AA'><br>". $v_exam . "</th>";
        }
                echo "<th class='td_class' style='color: #4970AA'>TOTAL <div style='border-top:1px solid #4970AA;'>100</div><div style='border-top:1px solid #4970AA;'>C</div> </th>";
 echo"</tr>";  


foreach ($sem2 as $k_sem2 => $v_sem2)  // loop to print sem2 marks  ------LOOP START FOR SUBJECT ROW
{

    echo "<tr class = 'sem2_row'>";
 
    $sem2_sub_total =0;
    $sub_max_marks =0;

        $exms_list =  array_column($v_sem2['exam'],'exam_id');

        $temp_exm = [];

        foreach ($sem2_exms as $k3 => $v3) {

                        $temp_exm[$k3] =  Array(
                                                'exam_id' => $v3,
                                                'total_marks' => 0,
                                                'passing_marks' => 0,
                                                'marks_obtained' => 0,
                                                );
                        
                        foreach ($v_sem2['exam'] as $k5 => $v5) {

                                if( $v3 == $v5['exam_id'])
                                {
                                        $temp_exm[$k3] = $v5;
                                }  
                        }
                
        }

    foreach($temp_exm as $k_marks => $v_marks)
    {
                        $v_marks['marks_obtained'] = isset($v_marks['marks_obtained']) ? $v_marks['marks_obtained'] : 0;
                        echo "<td class='td_class'>" . $v_marks['marks_obtained'] . "</td>";
                        $sem2_sub_total += $v_marks['marks_obtained'];

                        if(!(isset($v_marks['total_marks'])))
                        {
                        
                        }
                        $sub_max_marks += $v_marks['total_marks'];
                      
    }
                        $sem2_total[] = $sem2_sub_total;
                        $sem2_max[]=$sub_max_marks;
    
    echo "<td class='td_class'>".$sem2_sub_total ."</td>";
    echo "</tr>";
}

echo"</table>";
}






?>



          <!--END OF SEM 1 EXAM-->









   </div>
     <!--MARKSHEET DIV ENDS-->





<script>
 
$(document).ready(function(){
     // for table equal height
    $('.sem2_head').css({ 'height': $('.sem1_head').outerHeight() });
    $('.sem2_row').css({ 'height': $('.sem1_row').outerHeight() });


// end

       
});
</script>





</section>