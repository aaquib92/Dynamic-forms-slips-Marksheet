<?php

$global_arr = array();
$academic_year = "";
$id = "";
if( isset($data['student_id']))
{
$id = $data['student_id'];
$global_arr = get_student_by_id($id);

 $co_scho_res = json_decode(get_students_class_curriculum($id) , true)['data'];
//  echo print_array($global_arr);die();
//   echo print_array($co_scho_res);die();
}
$academic_year = (date('m') < 6) ?((date('Y')-1)." - ".date('Y')):date('Y')." - ".(date('Y')+1);
$global_arr['student_credentials']['mobile'] = !(isset($global_arr['student_credentials']['mobile']) || empty($global_arr['student_credentials']['mobile'])) ?'':FALSE;
$parent_mobile = !(isset($global_arr['parent_credentials']['parent_mobile']) || empty($global_arr['parent_credentials']['parent_mobile'])) ?'':'';

$global_arr['student_details'][0]['phone'] = (isset($global_arr['student_details'][0]['phone']) && !empty($global_arr['student_details'][0]['phone'])) ?''.$global_arr['student_details'][0]['phone'].'':$global_arr['student_credentials']['mobile'];
$global_arr['parent_details'][0]['phone'] = (isset($global_arr['parent_details'][0]['phone']) && !empty($global_arr['parent_details'][0]['phone'])) ?''.$global_arr['parent_details'][0]['phone'].'':'';
$parent_name = (isset($global_arr['parent_details'][0]['first_name']) && !empty($global_arr['parent_details'][0]['first_name']))?strtoupper(''.$global_arr['parent_details'][0]['first_name'].'  '.$global_arr['parent_details'][0]['last_name'].''):'';
$mother_name    = (isset($global_arr['parent_details'][0]['mothers_name']) && !empty($global_arr['parent_details'][0]['mothers_name']))?''.$global_arr['parent_details'][0]['mothers_name'].'':'';
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
$class_remark = (isset($global_arr['student_selected_class']['class_remark']) && !empty($global_arr['student_selected_class']['class_remark']))?''.$global_arr['student_selected_class']['class_remark']:'';

// echo print_array($class_remark);die();



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
$sem1_exms_names = [];
$sem2_exms_name = [];
$sem2_exms_names = [];
$sem1_exms_tots = [];
$sem2_exms_tots = [];
$sem1_exms_marks_obt =[];
$sem2_exms_marks_obt=[];
$subj_all_tots = [];

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
									    $sem1_exms_name[$v1['exam_id']] =  $v1['exam_name'].'<br>('.$v1['total_marks'].'M)' ;
                                        $sem1_exms_names[$v1['exam_id']] =  $v1['exam_name'] ;
										$sem1_exms_tots[$v1['exam_id']] = isset($v1['total_marks']) ? $v1['total_marks'] : $sem1_exms_tots[$v1['exam_id']];
										!(in_array($v1['exam_id'],$sem1_exms)) ? $sem1_exms[] = $v1['exam_id'] : FALSE;	
                                    						
                        }
                        //----------------------------FOR SEM 2-------------------
                        if( $v1['sem'] == 2){
                                $temp1[]  = $t;
										$sem2_exms_tots[$v1['exam_id']] = !(isset($sem2_exms_tots[$v1['exam_id']])) ? 0 :$sem2_exms_tots[$v1['exam_id']];
                                        $sem2_exms_name[$v1['exam_id']] =  $v1['exam_name'].'<br>('.$v1['total_marks'].'M)' ;
                                        $sem2_exms_names[$v1['exam_id']] =  $v1['exam_name'] ;
                             			$sem2_exms_tots[$v1['exam_id']] = isset($v1['total_marks']) ? $v1['total_marks'] : $sem2_exms_tots[$v1['exam_id']];
										!(in_array($v1['exam_id'],$sem2_exms)) ? $sem2_exms[] = $v1['exam_id'] : FALSE;
                        
					}
                }
                !(empty($temp)) ? $sem1[$key_data]['exam'] = $temp  : FALSE;
                !(empty($temp1)) ? $sem2[$key_data]['exam'] = $temp1 : FALSE;
        }


// $sem1_e = isset($sem1[0]['exam']) ? (count($sem1[0]['exam']) + 4) : 4;
// $sem2_e = isset($sem2[0]['exam']) ? (count($sem2[0]['exam']) + 4) : 4;
// $sem1_m =  isset($sem1[0]['exam']) ? (count($sem1[0]['exam']) +0) : 0;
// $sem2_m =  isset($sem2[0]['exam']) ? (count($sem2[0]['exam']) + 0) : 0;



   // GRADE FUNCTION

$gr_arr = ['E','D','C2','C1','B2','B1','A2','A1'];
function check_grade($marks)
{
    $grade ;
    if($marks <= 32){ $grade = 'E';  return $grade;   }
    elseif($marks >= 33 && $marks <= 40)    {$grade = 'D';     return $grade; }
    elseif($marks >= 41 && $marks <= 50)    {$grade = 'C-2';   return $grade; }
    elseif($marks >= 51 && $marks <= 60)    { $grade = 'C-1';  return $grade; } 
    elseif($marks >= 61 && $marks <= 70)    { $grade = 'B-2';  return $grade; }
    elseif($marks >= 71 && $marks <= 80)    { $grade = 'B-1';  return $grade; } 
    elseif($marks >= 81 && $marks <= 90)    { $grade = 'A-2';  return $grade; }
    elseif($marks >= 91 && $marks <= 100)   { $grade = 'A-1'; return $grade;  }
}

function check_co_scho_grade($marks){


        if($marks < 2){
                $grade = 'C';
        } elseif($marks == 2) {
                $grade = 'B';
        }elseif ($marks >= 3) {
                $grade = 'A';
        }
        return $grade; 
}


?>

<!--Marksheet for 4, 5, 6,7 and 8 -->

<?php if ($stud_std == '4' || $stud_std == '5'  || $stud_std == '6'  || $stud_std == '7' || $stud_std == '8' ) { ?>




<section onload="setTimeout(myFunction(), 3000)">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/css/pikaday.min.css">
<style>
    .marksheet-div{
    width:95%;
    height:auto;
    display:inline-block;
    }
    .left{
    float:left;
    padding-left:3%;
    }
    .right{
    float:right;
    padding-right:3%;
    margin-top:-9%;
    }
    .div-input1{
    margin:0 auto;
    float:left; 
    padding-left:3%;
    font-size:0.7em;
    }
    .slip-input1 {
    min-width: 100px;
    border-bottom: 1px solid black;
    display: inline-block;
    }
    @page {
    size: portrait;
    margin:0;
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
    .div_tab_row {
    display: table-row;
    }
    @media print
    {
    span{border:none}
    * {-webkit-print-color-adjust:exact;}
    .common_input{border:none;}
    .date{border:none;}
    }
    .th_class{
    border:1px;
    border-style:solid;
    }
    .td_class{
    border:1px;
    border-style:solid;
    }
    .head-div{
    margin-top:2%;
    }





    
</style>

<div class="marksheet-div">
<!--header-->
<div class="head-div">
<img class="left" width="100" height="60" src="<?php echo $stud_school_logo ?>" >

<center>
<h3 style="margin-bottom:0px; padding-top:2% font-weight:700;color: #311B92; text-shadow: 2px 2px #311B92; font-size:1.7em;">JINDAL VIDYA MANDIR</h3>
<span style="font-size:0.9em;color:black;font-weight:700;">Vasind,Tal.Shahapur, Dist.Thane</span><br>

</center>
  <table style="width:95%; border-style:none;font-size:50% line-height:20px;border:0px">
            <tr>
            <td style="border-style:none;color:#5a2727;font-weight:700; font-size:0.8em;"> Affiliation No:C.B.S.E./AFF/1130090</td>
            <td style="border-style:none;color:#5a2727;font-weight:700; font-size:0.8em;">Tel.No.:02527-220022-25 Ext.334,335</td>
            <td style="border-style:none;color:#5a2727;font-weight:700; font-size:0.8em;">Website: www.jvm.in</td>
            </tr>
</table>

</div><hr style="color:black;">

<!--end of head div-->


<center>
<span style="font-weight:700; font-sizer:1em; color:#4CAF50; font-size:1.2em;">Academic Session: <?php echo $academic_year;?></span><br>
<span style="color:#A1887F;font-weight:700; font-size:1.2em;">Report Card for class:-<?php echo $stud_class ;?> </span>
</center><br>

           <!--student info section-->
<img class="right" width="150" height="170" src="<?php echo $stud_img ?>" >
      <table style="width:75%; border-style:none; line-height:20px;border:0px">
        <tr>
            <td style="border-style:none;color:#A1887F;font-weight:700;"> Student's Name:</td>
            <td style="border-style:none;font-weight:700;"><?php echo $stud_name;?></td>
         </tr>
         <tr>
            <td style="border-style:none;color:#A1887F;font-weight:700;"> Class/Section:</td>
            <td style="border-style:none;font-weight:700;"><?php echo $stud_class;?></td>
            <td style="border-style:none;color:#A1887F;font-weight:700;"> Roll No:</td>
            <td style="border-style:none;font-weight:700;"><?php echo $stud_roll;?></td>
         </tr>
          <tr>
            <td style="border-style:none;color:#A1887F;font-weight:700;"> Date of Birth:</td>
            <td style="border-style:none;font-weight:700;"><?php echo $stud_dob;?></td>
            <td style="border-style:none;color:#A1887F;font-weight:700;"> G.R.No.:</td>
            <td style="border-style:none;font-weight:700;"><?php echo $gr_number;?></td>
        </tr>
         <tr>
            <td style="border-style:none;color:#A1887F;font-weight:700;"> Father Name:</td>
            <td style="border-style:none;font-weight:700;"><?php echo $parent_name;?></td>
            <td style="border-style:none;color:#A1887F;font-weight:700;"> Mother Name.:</td>
            <td style="border-style:none;font-weight:700;"><?php echo $mother_name;?></td>
        </tr>
</table>
<br>
            <!--end-->


<?php  //  $sem1_e = count($sem1[$key_data]['exam']) + 2;
       //  $sem2_e =count($sem2[$key_data]['exam']) + 2; 

         $sem1_e = isset($sem1[0]['exam']) ? (count($sem1[0]['exam']) + 2) : 2; 
         $sem2_e = isset($sem2[0]['exam']) ? (count($sem2[0]['exam']) + 2) : 2; 

?>
<div style="align-content:center;">
<table class="cust_table" cellpadding ="2"  style=" float:left;width:50%;border-collapse:collapse;font-size:65%; border-left:2px; border-top:2px; border-bottom:2px; border-style:solid; border-right-width:0px;">


<tr class ="sem1_title">    <!--Printing first row Term name  -->
  <th class="th_class" > <div style ="color:#673AB7;font-weight:700;">Scholastic Areas:</div> </th>
  <?php 
  echo "<th class='th_class' style= 'align-content:center;' colspan='$sem1_e'><div style ='color:#673AB7;font-weight:700;'>TERM-1(100 MARKS)</div><br><br></th>"; 
  ?>
</tr>

<tr class ="sem1_head">
<?php    //printing second row exam names
echo "<th class='td_class' >". "<div style='color:#A1887F;'>SUBJECT NAME</div>" . "</th>";
//  echo print_array($sem2);die;
if(sizeof($sem1) > 0)
{
        foreach($sem1_exms_name as  $v_exam)
        {
                echo "<th class='td_class' ' ><div style='color:#A1887F;font-weight:700;'>". $v_exam . "</div></th>";
        }
}

echo "<th class='td_class' ><div style='color:#A1887F;font-weight:700;'>" . "TOTAL" . "<br>(100 M)</div></th>";
echo "<th class='td_class' ><div style='color:#A1887F;font-weight:700;'>" . "Grade<br><br><br>" . "</div></th>";


?>
</tr>


<?php
$total_subjects = count($sem1) + count($sem2);
$sem1_total=[];
$sem1_max=[];
foreach ($sem1 as $k_sem1 => $v_sem1)  // loop to print sem1 marks  ------LOOP START FOR SUBJECT ROW
{

    echo "<tr class ='sem1_row'> <td class='td_class' style='font-size:0.8em;'><div style='color:#4CAF50; font-weight:700; '>";
    echo strtoupper($v_sem1['exam'][0]['subject_name'])."</div></td>";
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

    foreach($temp_exm as $k_marks => $v_marks)
    {
                        $v_marks['marks_obtained'] = isset($v_marks['marks_obtained']) ? $v_marks['marks_obtained'] : 0;
                        echo "<td class='td_class' style='text-align:center;'>" . $v_marks['marks_obtained']."</td>";
                        $sem1_sub_total += $v_marks['marks_obtained'];
                        $sub_max_marks += $v_marks['total_marks'];
                      
    }

    $sem1_total[] =$sem1_sub_total;
    $sem1_max[]=$sub_max_marks;
    //----------------------------------------------------------------
    echo "<td class='td_class'  style='text-align:center;'>".$sem1_sub_total ."</td>";
    $subject_grade  = ($sub_max_marks==0) ? 'Fail' : check_grade(ceil(($sem1_sub_total *100)/$sub_max_marks));
    echo "<td class='td_class'  style='text-align:center;'>". $subject_grade."</td>";
    echo "</tr>";
}

echo "</table>";

//------------------------------------TBALE FOR SEM 2

$sem2_total=[];
$sem2_max=[];
if(sizeof($sem2) > 0)
{
        $clspn_t2 = $sem2_e+1;
echo "<table class='cust_table' cellpadding ='2'  style='float:left;width:50%; border-collapse:collapse;font-size:65%; border-top:2px; border-bottom:2px; border-right:2px; border-style:solid; border-left-width:0px;'>";
echo "<tr class = 'sem2_title'><th class='th_class' style= 'align-content:center;' colspan='$clspn_t2'><div style ='color:#673AB7;font-weight:700;'>TERM-2(100 MARKS)</div><br><br></th></tr>" ;
echo "<tr class ='sem2_head'>";     //row to print exam name and other headings

        //----------------------------------------------SUBJECT NAMES COLUMN IN TABLE IF SEM 1 IS NOT SELECTED --------
        // if(sizeof($sem1) == 0){
          
        //----------------------------------------------EXAM NAMES IN TABLE HEADING --------
        foreach($sem2_exms_name as  $v_exam)
        {
                 echo "<th class='td_class' ' ><div style='color:#A1887F;font-weight:700;'>". $v_exam . "</div></th>";
        }
 echo "<th class='td_class' ><div style='color:#A1887F;font-weight:700;'>" . "TOTAL" . "<br>(100 M)</div></th>";
 echo "<th class='td_class' ><div style='color:#A1887F;font-weight:700;'>" . "Grade<br><br><br>" . "</div></th>";

    echo "</tr>";

//  echo print_array($sem2);die;
foreach ($sem2 as $k_sem2 => $v_sem2)  // loop to print sem2 marks  ------LOOP START FOR SUBJECT ROW
{

    echo "<tr class ='sem2_row'>";
      //----------------------------------------------SUBJECT NAMES COLUMN IN TABLE IF SEM 1 IS NOT SELECTED --------    
//       if(sizeof($sem1) == 0){
      
//       }
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
                        echo "<td class='td_class'  style='text-align:center;'>" . $v_marks['marks_obtained'] . "</td>";
                        $sem2_sub_total += $v_marks['marks_obtained'];
                        $sub_max_marks += $v_marks['total_marks'];
    }

    $sem2_total[] = $sem2_sub_total;
    $sem2_max[]=$sub_max_marks;
        //-------------------------------------    
    echo "<td class='td_class'  style='text-align:center;'>".$sem2_sub_total ."</td>";
    $subject_grade  = ($sub_max_marks==0) ? 'Fail' : check_grade(ceil(($sem2_sub_total *100)/$sub_max_marks));
    echo "<td class='td_class' style='text-align:center;'>". $subject_grade."</td>";
    echo "</tr>";
}


echo "</table>";   
}

?>
</div><br>

<!-- Second tabel for printing grade subjects -->
<div style="align-content:center;">
<?php

//--------------------------------------------------------------PRINT TABLES OF CO SCHOLASTIC-----------
$pc_id = $global_arr['student_selected_class'][0]['pc_id'];
// $co_scho_tab_1 = "";
// $co_scho_tab_2 = "";
// echo print_array(count($co_scholastic));
// echo print_array($co_scho_res);die;

if(count($co_scho_res)){
if(isset($co_scho_res[$pc_id]['1']) && (sizeof($co_scho_res[$pc_id]['1'])> 0))
        {
        echo "<table  cellpadding='4' style='display:inline-table; width:50%; border-collapse:collapse;font-size:65%; border-top:2px;vertical-align: top;margin-top:1%; '>
                <thead>
                <th class='th_class'> <div style='color:#A1887F;font-weight:700;'>Co-Scholastic Areas:Term-I[on a 3 point [A C] grading scale]</div></th>
                <th class='th_class'><div style='color:#A1887F;font-weight:700;'>Grade <br><br><br></div></th>
                </thead><tbody>";

                $trs = "";
                // echo print_array($co_scho_res[$pc_id]);die;
                foreach($co_scho_res[$pc_id]['1'] as $k => $v) {
                        ($v['grade']) ? $trs .="<tr><td class='td_class' ><div style=' color:#4CAF50;font-weight:700;'>".strtoupper($v['curriculum_name'])."</div></td><td class='td_class' style='text-align:center;'>".check_co_scho_grade($v['grade'])."</td></tr>" : FALSE;
                }
           echo    $trs."</tbody></table>";
        }
if(isset($co_scho_res[$pc_id]['2']) && (sizeof($co_scho_res[$pc_id]['2'])> 0))        
  {
     echo "<table  cellpadding='4' style='display:inline-table; width:50%; border-collapse:collapse;font-size:65%; border-top:2px;vertical-align: top;margin-top:1%; '>
                <thead>
                <th class='th_class'> <div style='color:#A1887F;font-weight:700;'>Co-Scholastic Areas:Term-I[on a 3 point [A C] grading scale]</div></th>
                <th class='th_class'><div style='color:#A1887F;font-weight:700;'>Grade <br><br><br></div></th>
                </thead><tbody>";

                $trs = "";
                // echo print_array($co_scho_res[$pc_id]);die;
                foreach($co_scho_res[$pc_id]['2'] as $k => $v) {
                        ($v['grade']) ? $trs .="<tr><td class='td_class' ><div style=' color:#4CAF50;font-weight:700;'>".strtoupper($v['curriculum_name'])."</div></td><td class='td_class' style='text-align:center;'>".check_co_scho_grade($v['grade'])."</td></tr>" : FALSE;
                }
           echo    $trs."</tbody></table>";
    }
}else{
    echo  "<h5>Co-Scholastic Marks are not assigned to this student for same class.</h5>";   
}
    

?>
</div>
<!-- Third table for printing discipline grade  -->

<div style="align-content:center;">
<?php
  if(sizeof($sem1)> 0)
        {
echo '<table  cellpadding="4" style="display:inline-table; width:50%; border-collapse:collapse;font-size:65%; border-top:2px;vertical-align:top; margin-top:1%;">
                <thead>
                <th class="th_class"><div style="color:#A1887F;font-weight:700;">Discipline:Term-1[on a 3 point [A C] grading scale]</div></th>  <th class="th_class"><div style="color:#A1887F;font-weight:700;">Grade</div></th>
                </thead>
                <tr>
                <td class="td_class"><div style="color:#4CAF50;font-weight:700;">DISCIPLINE</div></td>
                <td class="td_class">
                        
               <select class="select_grade" name="" id="select_grade" style="width:100%; border:0px;">
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="E">E</option>
                </select>
                <span class="selected_grade" id="selected_grade"> </span>

                </td>
                </tr>
            </table>';
        }
  if(sizeof($sem2)> 0)
        {
        echo '<table cellpadding="4" style="display:inline-table; width:50%; border-collapse:collapse;font-size:65%; border-top:2px;vertical-align: top;margin-top:1%; ">
                <thead>
                <th class="th_class"><div style="color:#A1887F;font-weight:700;">Discipline:Term-2[on a 3 point [A C] grading scale]</div></th>  <th class="th_class"><div style="color:#A1887F;font-weight:700;">Grade</div></th>
                </thead>
                <tr>
                <td class="td_class"><div style="color:#4CAF50;font-weight:700;">DISCIPLINE</div></td>
                <td class="td_class">
                <select class="select_grade1" name="" id="select_grade1" style="width:100%; border:0px; ">
                <option value="A">A</option>
                <option value="B">B</option>
                <option value="C">C</option>
                <option value="D">D</option>
                <option value="E">E</option>
                </select>
                <span class="selected_grade1" id="selected_grade1"> </span>
                
                </td>
                </tr>
            </table>';


        }
?>
</div><br>
<p class="div-input1" >Class Teacher's Remarks: &emsp;<span style="border-bottom:1px solid black;"> <?php echo $class_remark; ?></span></p><br><br>
<p class="div-input1">ATTENDANCE: &emsp;<input type="text" class ="common_input"></p><br><br>
<div>
    <div style="float:left;font-size:0.9em;padding-left:5%;">Date <input type ="text" size="12" class ="date" id ="picka1"></div>
    <span style="float:left;font-size:0.9em;padding-left:25%;">Signature of Class Teacher</span>
    <span  style="float:right;font-size:0.9em;padding-right:3%"> Signature of Principal</span>
</div><br>
<hr style="color:black;">

<center><span style="font-size:1em;color:#4CAF50; font-weight:700;">Instructions</span></center><br>
 <p class="div-input1" style="font-size:0.8em;"><b>Grading scale for scholastic areas</b>: Grades are awarded ona 8-point grading scale as follows</p><br> 

           <!--Grade key table-->

          <table cellpadding="4" style=" float:left;width:40%;  border-collapse:collapse; font-size:60%;">
 <thead style="text-align:center;">
 <th class ="th_class" ><div style="color:#A1887F;font-weight:700;">MARKS RANGE</div></th>
 <th class ="th_class" ><div style="color:#A1887F;font-weight:700;">GRADE</div></th>
 </thead>
 <tr style="text-align:center;"> <td class="td_class" >91-100</td> <td class="td_class" >A1</td> </tr>
 <tr style="text-align:center;"> <td class="td_class" >81-90</td>  <td class="td_class" >A2</td> </tr>
 <tr style="text-align:center;"> <td class="td_class" >71-80</td>  <td class="td_class" >B1</td> </tr>
 <tr style="text-align:center;"> <td class="td_class" >61-70</td>  <td class="td_class" >B2</td> </tr>
 <tr style="text-align:center;"> <td class="td_class" >51-60</td>  <td class="td_class" >C1</td> </tr>
 <tr style="text-align:center;"> <td class="td_class" >41-50</td>  <td class="td_class" >C2</td> </tr>
 <tr style="text-align:center;"> <td class="td_class" >33-40</td>  <td class="td_class" >D</td> </tr>
 <tr style="text-align:center;"> <td class="td_class" >32 & BELOW</td>   <td class="td_class">E(Needs Improvement)</td> </tr>
</table> 


           <!--end of grade key table-->

<table  cellpadding="4" style=" float:right;width:40%;  border-collapse:collapse; font-size:60%;">
    <tr>
        <td class="td_class" ><div style="color:#A1887F;font-weight:700;">PT</div></td>
        <td class="td_class">Periodic Test</td>
    </tr>
    <tr>
        <td class="td_class" ><div style="color:#A1887F;font-weight:700;">NBK</div></td>
        <td class="td_class">Notebook</td>
    </tr>
    <tr>
        <td class="td_class" ><div style="color:#A1887F;font-weight:700;">SEA</div></td>
        <td class="td_class" >Sub Enrichment Activity</td>
    </tr>
    <tr>
        <td class="td_class" ><div style="color:#A1887F;font-weight:700;">HYE</div></td>
        <td class="td_class">Half Yearly Exam</td>
    </tr>
    <tr>
        <td class="td_class" ><div style="color:#A1887F;font-weight:700;">ANE</div></td>
        <td class="td_class">Annual Exam</td>
    </tr>
</table>


<script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/pikaday.min.js"></script>

<script>
 
$(document).ready(function(){
     // for table equal height
    $('.sem2_title').css({ 'height': $('.sem1_title').outerHeight() });
    $('.sem2_head').css({ 'height': $('.sem1_head').outerHeight() });
    $('.sem2_row').css({ 'height': $('.sem1_row').outerHeight() });
    

// end

$('.common_input').keyup(function(){
        $(this).attr('value',$(this).val()); 
    });


$('.date').keyup(function(){
        $(this).attr('value',$(this).val()); 
    });

// pick a date
  var picker = new Pikaday({
        field: document.getElementById('picka1'),
        format: 'DD-MM-YYYY'
    });
// end of pick a day

       
});
</script>


</div>

</section>
  <!--end of marksheet for 6th 7th and 8th-->


   <!--start of Marksheet for 9th-->
<?php  }  else if($stud_std == '9' ) { ?>



<section onload="setTimeout(myFunction(), 3000)">



<?php 
	$newSorted  = $array_data['data'] ;//Assigning sorted array to newsorted array
	$annualData = $allExamsMap = $allSubMap1 = []; 
//   echo print_array($newSorted);die();

	//Handling periodic test and making new exam ID wise array($annualData)
	foreach ($newSorted as $index => $value) {
		$periodicTest = $perTest1 = $perTest2 = $perTest3 = [];
		$totalMarks = 0;
	
		//Sort Periodic test 1,2,3 for each exams
		// foreach ($value['exam'] as $key => $val) {
		// 	if( !isset($val['exam_name']) ) {
		// 		$val['exam_name'] = $exam_name_map[$val['exam_id']]['name'];
		// 	}
	
			//If "periodic" is found in current exam then push periodic test value to an array for further comparisons
		// 	if ( stripos(strtolower( $val['exam_name'] ), "periodic") !== FALSE ) {
		// 		$periodicTest[$val['pes_id']] = $val;
		// 		unset($newSorted[$index]['exam'][$key]);//Remove old periodic test
		// 	}
		// }

		//If periodic test(s) were found then calculate obtained marks and push to sorted array
		if ( sizeof( $periodicTest ) > 0 ) {

			$totalMarks = max(array_column($periodicTest,'total_marks'));
			$perMarksObt = array_column($periodicTest,'marks_obtained');
			$outOf = ( count($periodicTest) < 2 ) ? $totalMarks : $totalMarks*2 ;

			if ( ( count($periodicTest) < 2 ) ) {
				//Getting Obtained marks if only single periodic test is present in array
				$perObtTmp = array_sum( $perMarksObt );
			}else{
				//Getting obtained marks using formula sumOf(all obtained marks arr)-minOf(all obtained marks arr)
				$perObtTmp = array_sum( $perMarksObt ) - min( $perMarksObt );
			}

			//Checking if total marks is 0 i.e exam is not given or marks not entered
			if( $totalMarks > 0 ) { 
				$perObt = number_format($perObtTmp / ( ( $outOf ) * 0.10 ),2);//Calculate obtained marks using: (obtained marks) / (10 percent of total marks)
			}else{
				$perObt = 0;
			}

			//Making final periodic test exam
			$per_fin = array_values($periodicTest)[0];//Getting first perTest by making zero based index array using array values
			$per_fin['exam_name']	  = 'Periodic Test';
			$per_fin['total_marks']	  = 10;
			$per_fin['passing_marks']	  = 4;
			$per_fin['marks_obtained'] = $perObt;
			$newSorted[$index]['exam'][] = $per_fin;//Push final periodic test in newSorted array
		}

		//Making New Array Exam ID (exam_table_id) wise
		foreach ($newSorted[$index]['exam'] as $key1 => $val1) {

			//Handling exam data if not given by student
			if( !isset($newSorted[$index]['exam'][$key1]['exam_table_id']) ) {
				$newSorted[$index]['exam'][$key1]['exam_table_id'] = $exam_name_map[$newSorted[$index]['exam'][$key1]['exam_id']]['exam_table_id'];
			}
			if( !isset($newSorted[$index]['exam'][$key1]['total_marks']) ) {  $newSorted[$index]['exam'][$key1]['total_marks'] = 0; }
			if( !isset($newSorted[$index]['exam'][$key1]['marks_obtained']) ) {  $newSorted[$index]['exam'][$key1]['marks_obtained'] = '-';}
			if( !isset($newSorted[$index]['exam'][$key1]['passing_marks']) ) {  $newSorted[$index]['exam'][$key1]['passing_marks'] = '-';}
			if( !isset($newSorted[$index]['exam'][$key1]['exam_name']) ) {  $newSorted[$index]['exam'][$key1]['exam_name'] = $exam_name_map[$newSorted[$index]['exam'][$key1]['exam_id']]['name'];}

			//Adding data to new array
			$annualData[$index]['pcs_id'] = $value['pcs_id'];
			$annualData[$index]['subject_name'] = $value['subject_name'];
			$annualData[$index]['optional'] = $value['optional'];
			$annualData[$index]['subject_id'] = $value['subject_id'];
			$annualData[$index]['exam'][$newSorted[$index]['exam'][$key1]['exam_table_id']][] = $newSorted[$index]['exam'][$key1];
		}
	}
	//Totaling/Averaging Exam Marks whith same exam_table_id
	foreach ($annualData as $index => $value) {

        // echo print_array($value);die();
		foreach ($value['exam'] as $key => $val) {
                        // echo print_array($val);die();
			//Handling exam which occured for both sem and averaging them both
			if ( count( $val ) > 1 ) {
				$total_marks = $passing_marks = $marks_obtained = 0;
			
				//Adding all exam marks stats
				foreach ($val as $k => $v) {
					$total_marks += $v['total_marks'];
					$passing_marks += $v['passing_marks'];
					$marks_obtained += $v['marks_obtained'];
				}
				$tmp = $val[0];
			
				//Making avg of both exams
				$tmp['total_marks'] = $total_marks / count($val);
				$tmp['passing_marks'] = $passing_marks / count($val);
				$tmp['marks_obtained'] = $marks_obtained / count($val);
			
				//Removing old(multiple) exam from array and adding new(averaged) single entry for that exam
				unset($annualData[$index]['exam'][$key]);
				$annualData[$index]['exam'][$key][] = $tmp;
			}

			//Making exam details mapper
			foreach ($annualData[$index]['exam'][$key] as $k1 => $v1) {
				$allExamsMap[$v1['exam_table_id']][$v1['exam_id']]['exam_name'] = $v1['exam_name'];
				$allExamsMap[$v1['exam_table_id']][$v1['exam_id']]['total_marks'] = $v1['total_marks'];
			}
		}
		krsort($annualData[$index]['exam']);
	}
	krsort($allExamsMap);
?>	
<section>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/css/pikaday.min.css">
	<style>
		table, td, th {border: 1px solid black;}
		table { border-collapse: collapse;border: 3px solid #000;margin: unset;}
		.center { text-align: center; }
		div { text-align: left; }
		.left { float:left; padding-top:1%; padding-left:3%; }
		.right { float:right; padding-top:1%; padding-right:3%; }
		/*@page { size: Portrait; margin: 1mm 1mm 1mm 1mm; }*/
		@media print { span{border:none} * {-webkit-print-color-adjust:exact;}  .common_input{border:none;}.date{border:none;} }		
	</style>
	<div class="head-div">
		<!--<img class="left" width="100" height="80" src="http://blog.askiitians.com/wp-content/uploads/2014/09/CBSE-logo.jpg" >
		<img class="right" width="100" height="80" src="<?php echo $stud_school_logo ; ?>" >-->
		<center>
			<!--<h3 style="margin-bottom:0px; padding-top:2% font-weight:700;"><?php echo $stud_school_name ;?></h3><br>-->
			<!-- <span style="font-size:0.8em;">AFFILLIATED TO C.B.S.E</span><br>
			<span style="font-size:0.8em;">AFFILIATION NO:1180013</span> -->
		</center>
	</div>
	<br><br>20%
	
	<div class="center">
		<center>
			<span style="margin-bottom:0px; padding-top:2% font-weight:700;"><b>Academic Session: <?= $academic_year; ?></b></span><br>
			<span style="margin-bottom:0px; padding-top:2% font-weight:700;"><b>Report Card for Class <?= $stud_class; ?></b></span>
		</center>
	</div>
	<div style="width: 100%;display: inline-block;margin-bottom:1rem;">
		<div>Roll No.: <?= $stud_roll ;?></div>
		<div>Student's Name: <?= $stud_name ;?></div>
		<div>Fathe Name: <?= $parent_name ;?></div>
        <div>Mother Name: <?= $mother_name ;?></div>
		<div>Date of Birth: <?= $stud_dob ;?></div>
		<div>Class/Section: <?= $stud_class ;?></div>
	</div>
	<br>
	<table border="1" class ="cust_table">
		<thead>
			<tr>
				<th>Scholastic Areas</th>
				<th class="center" colspan="<?= ( count( $allExamsMap ) + 2 ); ?>">Academic Year ( 100 marks )</th>
			</tr>
			<tr>
				<th>Sub Name</th>
					<?php foreach ($allExamsMap as $key => $value) : ?>
						<?php foreach ($value as $key => $value) : ?>
							<th class="center"> <?= $value['exam_name']; ?> <br> (<?= $value['total_marks']; ?>) </th>
						<?php endforeach; ?>
					<?php endforeach; ?>
				<th class="center">Marks Obtained <br>(100)</th>
				<th class="center">Grade</th>
			</tr>
		</thead>
		<tbody>
			<?php $grandTotal = 0; ?>
			<?php foreach ($annualData as $index => $value) : ?>
				<?php $totalObt = $totalMarks = 0 ;?>
				<tr>
					<td><?= strtoupper($value['subject_name']) ;?></td>

					<?php foreach ($value['exam'] as $key => $val) : ?>
						<?php foreach ($val as $k => $v) : ?>
							<?php 
								$totalObt += $v['marks_obtained']; 
								$totalMarks += $v['total_marks']; 
							?>
							<td class="center"><?= $v['marks_obtained'] ;?></td>
						<?php endforeach; ?>
					<?php endforeach; ?>
					<td class="center"> <?= round($totalObt) ;?> </td>
					<td class="center"> <?= check_grade( round($totalObt) ) ;?> </td>
				</tr>
			<?php endforeach; ?>
		</tbody>
	</table>
	
	<br>
<div style="width: 100%;display: inline-block;">
<?php
//PRINT TABLE OF CO-SCHOLASTIC
$pc_id = $global_arr['student_selected_class'][0]['pc_id'];

$curriculurMap = [];

//Checking if scholastic data is there for the student class
if(isset($co_scho_res[$pc_id])) { 
	foreach ($co_scho_res[$pc_id] as $index => $value) {
		foreach ($value as $key => $val) {

			//Combining co-scholastic marks of both sem(if both sem present)
			if( !isset( $curriculurMap[$val['ec_id']]['grade'] ) ) { $curriculurMap[$val['ec_id']]['grade'] = 0; }
			$curriculurMap[$val['ec_id']]['name'] = $val['curriculum_name'];
			$curriculurMap[$val['ec_id']]['grade'] += $val['grade'];
		}
	}
}
if ( count( $curriculurMap ) ) {
	$trs = "<table  cellpadding='6' style='margin:1% 0%;width:50%;font-size:70%;vertical-align: top;'>
				<thead>
				<th class='th_class'>Co-Scholastic Areas [on a 5 point [A-E] grading scale]</th>
				<th class='th_class center'>Grade</th>
				</thead><tbody>";
				foreach($curriculurMap as $k => $v) {
						$trs .="<tr><td class='td_class'>".strtoupper($v['name'])."</td><td class='td_class center' >".check_co_scho_grade( $v['grade']/2 )."</td></tr>";
				}
	 echo $trs."</tbody></table>";
}else{
	echo  "<br><h5>Co-Scholastic Marks are not assigned to this student for same class.</h5>";
}
		
?>
</div><!-- End Co-Scholatic Div -->
<br>
<!-- Discipline Table Start -->
<div style="width: 100%;display: inline-block;">
	<table border="1" cellpadding="6" style=" margin:1% 0%;font-size:70%;width: 50%;">
		<thead>
			<tr>
                <th class ="">Discipline:Term-I [on a 5 point [A-E] grading scale]</th>
				<th class="th_class" ><span style="float: right;">Grade</span> </th>
			</tr>
		</thead>
		<tbody>
			<tr>
				<td class="td_class">DISCIPLINE</td>
				<td class="td_class">
					<select class="select_grade_2 browser-default" name="" id="select_grade_2" style="width:100%; border:0px;">
						<option value="A">A</option>
						<option value="B">B</option>
						<option value="C">C</option>
						<option value="D">D</option>
						<option value="E">E</option>
					</select>
					<span class="selected_grade" id="selected_grade"> </span>
				</td>
			</tr>			
		</tbody>
	</table>
</div>
<!-- End Discipline Table -->
<br>
<div style="text-align: left;width: 100%;"><b>Class Teacher's Remarks: </b><input type="text" style="border:none;border-bottom: 1px dotted #000;" value="<?php echo $class_remark; ?>" ></div>
<div style="text-align: left;width: 100%;"><b>ATTENDANCE:</b><input type="text" style="border:none;border-bottom: 1px dotted #000;" class ="common_input"></div>
<div style="width: 100%;display:flex;font-size:0.8rem;">
	<div style="width:33.33%;text-align:left;"><b><br><br>Date <input type="text" id="myDatepicker" class ="date" style="border:none;border-bottom: 1px dotted #000;" ></b></div>
	<div style="width:33.33%;text-align:center;"><b><br>Signature of<br>Class Teacher</b></div>
	<div style="width:33.33%;float:right;text-align:center;"><b><br>Signature of<br>principal</b></div>
</div>
<hr style="border-color: #000;">
<div class="center"><b>Instructions</b></div>
<br>
<div style="text-align: left;width: 100%;">
	<b>Grading scale for scholastic areas : </b>Grades are awarded on a 8- point grading scale as follows -
</div>
<br>
<div class="center">
<!-- Table for grading scheme -->
<table border="1" cellpadding="10" style=" width:auto; line-height:2px;  border-style: solid;  border-collapse:collapse; font-size:70%;margin:0 auto;">
	<thead style="text-align:center;">
		<th>MARKS RANGE</th>
		<th>GRADE</th>
	</thead>
	<tbody>
		<tr style="text-align:center;"> <td>91-100</td> <td>A1</td> </tr>
		<tr style="text-align:center;"> <td>81-90</td>  <td>A2</td> </tr>
		<tr style="text-align:center;"> <td>71-80</td>  <td>B1</td> </tr>
		<tr style="text-align:center;"> <td>61-70</td>  <td>B2</td> </tr>
		<tr style="text-align:center;"> <td>51-60</td>  <td>C1</td> </tr>
		<tr style="text-align:center;"> <td>41-50</td>  <td>C2</td> </tr>
		<tr style="text-align:center;"> <td>33-40</td>  <td>D</td> </tr>
		<tr style="text-align:center;"> <td>32 & BELOW</td> <td>E (Failed)</td> </tr>
	</tbody>
</table>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pikaday/1.6.1/pikaday.min.js"></script>
<script>
    var picker = new Pikaday({
        field: document.getElementById('myDatepicker'),
        format: 'DD-MM-YYYY'
    });
    $('.common_input').keyup(function(){
        $(this).attr('value',$(this).val()); 
    });


  $('.date').keyup(function(){
        $(this).attr('value',$(this).val()); 
    });

</script>
</section>






  <!--end  of 9th Marksheet-->
 <!--for class 1st 2nd and 3rd-->
<?php } else if($stud_std == '1' || $stud_std == '2'   || $stud_std == '3') { ?>

<section onload="setTimeout(myFunction(), 3000)">

<style>
 .marksheet-div{  width:95%; height:auto;  display:inline-block;}
 .left{ float:left; padding-left:3%; margin-top:-1%;}
 .right{float:right;padding-right:3%; font-size:0.7em;}
 .center{text-align:center;}
    @page {   size:portrait; margin:2%;  }
    @media print {  span{border:none}  * {-webkit-print-color-adjust:exact;} .common_input{border:none;}  }
    .th_class{ border:1px;  border-style:solid; }
    .td_class{ border:1px;  border-style:solid; }
    /*.head-div{ margin-top:2%;}*/
    .student_info{width:100%; height:auto; background-color:#FF9100; color:white}
     .acad_info{width:100%; height:auto; background-color:#FF9100; color:white}
    .stud_info{font-size:1em; padding-left:3%; text-align:left;}
    .table{width:100%; border-style:none; margin-top:-2%; font-size:70%;}
    .decor{border-style:none;}
    /*.section{border:1px solid #FF9100; margin-top:4%; height:85%; }*/
     .e_color{background-color:#A5D6A7; color:white; text-align:center; }
     .d_color{background-color:#b71c1c; color:white; text-align:center;}
     .c2_color{background-color:#FFD180; color:white; text-align:center;}
    .c1_color{background-color:#9CCC65; color:white; text-align:center; }
    .b2_color{background-color:#40C4FF; color:white; text-align:center; }
    .b1_color{background-color:#BA68C8;  color:white; text-align:center; }
    .a2_color{background-color:#2979FF; color:white; text-align:center; }
    .a1_color{background-color:#00C853;  color:white; text-align:center; }
    .table_head{background-color:#EEEEEE;}
    .marks_color{text-align:center; min-width:75%;color:white;font-weight:700;}
    .sem1_row{height:25px !important;}
    .sem2_row{height:25px !important;}
    .overall_row{height:25px !important;}
</style>



<div class="marksheet-div">
<!--header-->
    <div class="head-div">
        <img class="left" width="60" height="50" src="<?php echo $stud_school_logo ?>" >
         <span style=" font-size:1em; float:left; padding:1%;">Jindal Vidya Mandir</span> 
   </div>
    <div class ="right">
         <span style="font-weight:700; font-sizer:0.7em;">Year: <?php echo $academic_year;?></span><br>
         <span style="font-weight:700; font-sizer:0.7em;"> <?php echo $stud_name;?></span><br>
         <span style="font-weight:700; font-sizer:0.7em;"> <?php echo $stud_class;?>&nbsp; | <?php echo $stud_roll; ?> </span> <br>
    </div><br>
   <!--end of header-->

     <!--start of section-->
  <!--<div class ="section">-->
    <div class ="student_info">
         <div><h4 class ="stud_info"> STUDENT INFORMATION</h4></div>
    </div>
    <table class ="table">
        <tr>
            <td class = "decor"><b>Roll No:</b></td>
            <td class = "decor"><?php echo $stud_roll; ?></td>
            <td class = "decor"><b>Father's Name:</b></td>
            <td class = "decor"><?php echo $parent_name; ?></td>
            <td class = "decor"><b>Mother's Name:</b></td>
            <td class = "decor"><?php echo $mother_name; ?></td>
            <td class = "decor"><b>Standard:</b></td>
            <td class = "decor"><?php echo $stud_std; ?></td>
            <td class = "decor"><b>Section:</b></td>
            <td class = "decor"><?php echo $stud_div; ?></td>
        </tr>

        <tr>
             <td class = "decor"><b>Date of Birth:</b></td>
            <td class = "decor"><?php echo $stud_dob; ?></td>
            <td class = "decor"><b>Admission Number:</b></td>
            <td class = "decor"></td>
        </tr>
    </table>
    <div class ="acad_info">
         <div><h4 class ="stud_info"> ACADEMIC PERFORMANCE</h4></div>
    </div><br>
    <div style="width:100%;display: inline-block;">
        <table cellpadding ="4" style=" float:left;width:50%;border-collapse:collapse;margin:-3% 0 0 3%; font-size:70%;">
            <tr>
                <td class ="e_color td_class">E</td>
                <td class ="d_color td_class">D</td>
                <td class ="c2_color td_class">C2</td>
                <td class ="c1_color td_class">C1</td>
                <td class ="b2_color td_class">B2</td>
                <td class ="b1_color td_class">B1</td>
                <td class ="a2_color td_class">A2</td>
                <td class ="a1_color td_class">A1</td>
            </tr>
            <tr>
            <td class ="td_class">0-32</td>
            <td class ="td_class">32-40</td>
            <td class ="td_class">40-50</td>
            <td class ="td_class">50-60</td>
            <td class ="td_class">60-70</td>
            <td class ="td_class">70-80</td>
            <td class ="td_class">80-90</td>
            <td class ="td_class">90-100</td>
            </tr>
        
        </table>
    </div>
    <br>
<!--</div><br>-->
 <p style="float:left;padding-left:3%;">(All values are in %)</p><br>
<!--end of section div-->

<div style="align-content:center;display:inline-block;">
<table class="cust_table" cellpadding="6" style="float:left;width:25%;border-collapse:collapse;font-size:60%; border-left:2px; border-top:2px; border-bottom:2px; border-style:solid; border-right-width:0px;">


<tr class ="sem1_haed table_head">    <!--Printing first row Term name  -->
  <th class="th_class"></th>
  <?php 
   $sem1_e = isset($sem1[0]['exam']) ? (count($sem1[0]['exam']) + 2) : 2; 
   $sem2_e = isset($sem2[0]['exam']) ? (count($sem2[0]['exam']) + 2) : 2; 

  echo "<th class='th_class' style= 'align-content:center;' colspan='$sem1_e'>Term 1<br><br></th>"; 
  ?>
</tr>

<tr class ="sem1_exam table_head">
<?php    //printing second row exam names
echo "<th class='td_class'></th>";
//  echo print_array($sem2);die;
if(sizeof($sem1) > 0)
{
        foreach($sem1_exms_names as  $v_exam)
        {
                echo "<th class='td_class'>". $v_exam . "</th>";
        }
}

echo "<th class='td_class table_head'>" . "Term 1" . "</th>";
// echo "<th class='td_class'>" . "Grade<br><br><br>" . "</th>";


?>
</tr>
<?php
 echo "<tr class ='sem1_score table_head'>";
 echo "<th class='td_class'>Subject</th>";

if(sizeof($sem1) > 0)
{
        foreach($sem1_exms_names as  $v_exam)
        {
                echo "<th class='td_class'>Score </th>";
        }
}
echo "<th class='td_class'>Score</th>";
 echo "</tr>";
 
?>
<?php

 
$total_subjects = count($sem1) + count($sem2);
$sem1_total=[];
$sem1_max=[];

foreach ($sem1 as $k_sem1 => $v_sem1)  // loop to print sem1 marks  ------LOOP START FOR SUBJECT ROW
{

    echo "<tr class ='sem1_row'> <td class='td_class'>";
    echo strtoupper($v_sem1['exam'][0]['subject_name'])."</td>";
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

    foreach($temp_exm as $k_marks => $v_marks)
    {                   $percent = 0;
                        $marks_obt =  $v_marks['marks_obtained'];
                        $marks_tot =  $v_marks['total_marks'];
                        $percent = ceil(( $marks_obt *100)/ $marks_tot);
                       
                        $v_marks['marks_obtained'] = isset($v_marks['marks_obtained']) ? $v_marks['marks_obtained'] : 0;
                       
                       // color for marks according to their percent range
                           if($percent >= 91 && $percent <= 100){

                                 echo "<td class='td_class center'><div class ='a1_color marks_color'>" . $v_marks['marks_obtained'] . "</div></td>";
                           }else if($percent >= 81  && $percent <= 90){
                                 echo "<td class='td_class center'><div class ='a2_color marks_color'>" . $v_marks['marks_obtained'] . "</div></td>";
                           }else if($percent >= 71 && $percent <= 80){
                                  echo "<td class='td_class center'><div class ='b1_color marks_color'>" . $v_marks['marks_obtained'] . "</div></td>";
                           }else if($percent >= 61 && $percent <= 70){
                                  echo "<td class='td_class center'><div class ='b2_color marks_color'>" . $v_marks['marks_obtained'] . "</div></td>";  
                           }else if($percent >= 51 && $percent <= 60){
                                 echo "<td class='td_class center'><div class ='c1_color marks_color' >" . $v_marks['marks_obtained'] . "</div></td>"; 
                           }else if($percent >= 41 && $percent <= 50){
                                 echo "<td class='td_class center'><div class ='c2_color marks_color'>" . $v_marks['marks_obtained'] . "</div></td>";  
                           }else if($percent >= 33 && $percent <= 40){
                                 echo "<td class='td_class center'><div class ='d_color marks_color'>" . $v_marks['marks_obtained'] . "</div></td>";     
                           }else if($percent <= 32){
                                 echo "<td class='td_class center'><div class ='e_color marks_color' >" . $v_marks['marks_obtained'] . "</div></td>";       
                           }

                        // end
                   

                        // echo "<td class='td_class center'><div class ='a1_color' style='text-align:center;border:1px solid black; width:75%;color:white;font-weight:700;padding:1%;'>" . $v_marks['marks_obtained'] . "</div></td>";
                        $sem1_sub_total += $v_marks['marks_obtained'];
                        $sub_max_marks += $v_marks['total_marks'];
                     
                        // $subj_all_tots[$v_sem1['exam'][0]['subject_id']] = isset($subj_all_tots[$v_sem1['exam'][0]['subject_id']]) ? $subj_all_tots[$v_sem1['exam'][0]['subject_id']] += $sem1_sub_total : $subj_all_tots[$v_sem1['exam'][0]['subject_id']] = $v_marks['marks_obtained'];
                       
    }
$sem1_total[] =$sem1_sub_total;
$sem1_max[]=$sub_max_marks;
$percent =  ($sem1_sub_total != 0) ? round((( $sem1_sub_total / $sub_max_marks ) * 100),2) : 0;    
// $percent = ceil(($sem1_sub_total *100)/$sub_max_marks);
        //-------------------------------------    

         // color of total marks for sem2 according to percent

              if($percent >= 91 && $percent <= 100){

                                 echo "<td class='td_class center'><div class ='a1_color marks_color'>" . $sem1_sub_total . "</div></td>";
                           }else if($percent >= 81  && $percent <= 90){
                                 echo "<td class='td_class center'><div class ='a2_color marks_color'>" . $sem1_sub_total . "</div></td>";
                           }else if($percent >= 71 && $percent <= 80){
                                  echo "<td class='td_class center'><div class ='b1_color marks_color'>" . $sem1_sub_total . "</div></td>";
                           }else if($percent >= 61 && $percent <= 70){
                                  echo "<td class='td_class center'><div class ='b2_color marks_color'>" . $sem1_sub_total. "</div></td>";  
                           }else if($percent >= 51 && $percent <= 60){
                                 echo "<td class='td_class center'><div class ='c1_color marks_color' >" .$sem1_sub_total . "</div></td>"; 
                           }else if($percent >= 41 && $percent <= 50){
                                 echo "<td class='td_class center'><div class ='c2_color marks_color'>" . $sem1_sub_total. "</div></td>";  
                           }else if($percent >= 33 && $percent <= 40){
                                 echo "<td class='td_class center'><div class ='d_color marks_color'>" . $sem1_sub_total . "</div></td>";     
                           }else if($percent <= 32){
                                 echo "<td class='td_class center'><div class ='e_color marks_color' >" . $sem1_sub_total . "</div></td>";       
                           }



       // end
    // echo "<td class='td_class center'><div class ='a1_color ' style='text-align:center;border:1px solid black; width:75%;color:white;font-weight:700;padding:1%;'>".$sem2_sub_total ."</td>";
    $subject_grade  = ($sub_max_marks==0) ? 'Fail' : check_grade(ceil(($sem1_sub_total *100)/$sub_max_marks));
    // echo "<td class='td_class'>". $subject_grade."</td>";
}

echo "</table>";

//------------------------------------TBALE FOR SEM 2

$sem2_total=[];
$sem2_max=[];
if(sizeof($sem2) > 0)
{
        $clspn_t2 = $sem2_e+1;
echo "<table class='cust_table'  cellpadding='6' style='float:left;width:25%; border-collapse:collapse;font-size:60%; border-top:2px; border-bottom:2px; border-right:1px; border-style:solid; border-left-width:0px;'>";
echo "<tr class ='sem2_head table_head'><th class='th_class' style= 'align-content:center;' colspan='$clspn_t2'>Term 2<br><br></th></tr>" ;
echo "<tr class ='sem2_exam table_head'>";     //row to print exam name and other headings

        //----------------------------------------------SUBJECT NAMES COLUMN IN TABLE IF SEM 1 IS NOT SELECTED --------
        // if(sizeof($sem1) == 0){
               
        // }
        //----------------------------------------------EXAM NAMES IN TABLE HEADING --------
        foreach($sem2_exms_names as  $v_exam)
        {
                echo "<th class='td_class'>". $v_exam . "</th>";
        }
    echo "<th class='td_class'>" . "Term 1" . "</th>";
    echo "</tr>";


 echo "<tr class='sem2_score table_head'>";


if(sizeof($sem2) > 0)
{
        foreach($sem2_exms_names as  $v_exam)
        {
                echo "<th class='td_class'>Score </th>";
        }
}
echo "<th class='td_class'>Score</th>";
 echo "</tr>";
 





//  echo print_array($sem2);die;
foreach ($sem2 as $k_sem2 => $v_sem2)  // loop to print sem2 marks  ------LOOP START FOR SUBJECT ROW
{

    echo "<tr class ='sem2_row'>";
      //----------------------------------------------SUBJECT NAMES COLUMN IN TABLE IF SEM 1 IS NOT SELECTED --------    
//       if(sizeof($sem1) == 0){
    
//       }
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
                        $percent = 0;
                        $total_percent = 0;
                        $marks_obt =  $v_marks['marks_obtained'];
                        $marks_tot =  $v_marks['total_marks'];
                        $percent =  ($marks_obt != 0) ? round((( $marks_obt / $marks_tot ) * 100),2) : 0;
                        // $percent = ceil(( $marks_obt *100)/ $marks_tot);

                       
                        $v_marks['marks_obtained'] = isset($v_marks['marks_obtained']) ? $v_marks['marks_obtained'] : 0;
                       
                       // color for marks according to their percent range
                            if($percent >= 91 && $percent <= 100){

                                 echo "<td class='td_class center'><div class ='a1_color marks_color'>" . $v_marks['marks_obtained'] . "</div></td>";
                           }else if($percent >= 81  && $percent <= 90){
                                 echo "<td class='td_class center'><div class ='a2_color marks_color'>" . $v_marks['marks_obtained'] . "</div></td>";
                           }else if($percent >= 71 && $percent <= 80){
                                  echo "<td class='td_class center'><div class ='b1_color marks_color'>" . $v_marks['marks_obtained'] . "</div></td>";
                           }else if($percent >= 61 && $percent <= 70){
                                  echo "<td class='td_class center'><div class ='b2_color marks_color'>" . $v_marks['marks_obtained'] . "</div></td>";  
                           }else if($percent >= 51 && $percent <= 60){
                                 echo "<td class='td_class center'><div class ='c1_color marks_color' >" . $v_marks['marks_obtained'] . "</div></td>"; 
                           }else if($percent >= 41 && $percent <= 50){
                                 echo "<td class='td_class center'><div class ='c2_color marks_color'>" . $v_marks['marks_obtained'] . "</div></td>";  
                           }else if($percent >= 33 && $percent <= 40){
                                 echo "<td class='td_class center'><div class ='d_color marks_color'>" . $v_marks['marks_obtained'] . "</div></td>";     
                           }else if($percent <= 32){
                                 echo "<td class='td_class center'><div class ='e_color marks_color' >" . $v_marks['marks_obtained'] . "</div></td>";       
                           }

                        // end





                        $sem2_sub_total += $v_marks['marks_obtained'];

                      
                        $sub_max_marks += $v_marks['total_marks'];
                       
    }
 $sem2_total[] = $sem2_sub_total;
 $sem2_max[]=$sub_max_marks;


  
//   $percent = ceil(($sem2_sub_total *100)/$sub_max_marks);
  $total_percent =  ($sem2_sub_total != 0) ? round((( $sem2_sub_total / $sub_max_marks ) * 100),2) : 0; 
        //-------------------------------------    

         // color of total marks for sem2 according to percent

             if($percent >= 91 && $percent <= 100){

                                 echo "<td class='td_class center'><div class ='a1_color marks_color'>" . $sem2_sub_total . "</div></td>";
                           }else if( $total_percent >= 81  &&  $total_percent <= 90){
                                 echo "<td class='td_class center'><div class ='a2_color marks_color'>" . $sem2_sub_total . "</div></td>";
                           }else if( $total_percent >= 71 &&  $total_percent <= 80){
                                  echo "<td class='td_class center'><div class ='b1_color marks_color'>" . $sem2_sub_total . "</div></td>";
                           }else if( $total_percent >= 61 &&  $total_percent <= 70){
                                  echo "<td class='td_class center'><div class ='b2_color marks_color'>" . $sem2_sub_total . "</div></td>";  
                           }else if( $total_percent >= 51 &&  $total_percent <= 60){
                                 echo "<td class='td_class center'><div class ='c1_color marks_color' >" . $sem2_sub_total . "</div></td>"; 
                           }else if( $total_percent >= 41 &&  $total_percent <= 50){
                                 echo "<td class='td_class center'><div class ='c2_color marks_color'>" . $sem2_sub_total . "</div></td>";  
                           }else if( $total_percent >= 33 &&  $total_percent <= 40){
                                 echo "<td class='td_class center'><div class ='d_color marks_color'>" . $sem2_sub_total . "</div></td>";     
                           }else if( $total_percent <= 32){
                                 echo "<td class='td_class center'><div class ='e_color marks_color' >" . $sem2_sub_total . "</div></td>";       
                           }



       // end
    // echo "<td class='td_class center'><div class ='a1_color ' style='text-align:center;border:1px solid black; width:75%;color:white;font-weight:700;padding:1%;'>".$sem2_sub_total ."</td>";
    $subject_grade  = ($sub_max_marks==0) ? 'Fail' : check_grade(ceil(($sem2_sub_total *100)/$sub_max_marks));
    // echo "<td class='td_class'>". $subject_grade."</td>";
    echo "</tr>";
}

echo "</table>";       
// echo "<br> <br>";
}

?>


<!--Total of sem 1 and sem2-->
<?php
// $overall_grand_total = 0;
// $scho_subjs_count = 0;

// echo print_array($subj_all_tots);die;
// echo print_array($sem1_total);die;
  if(sizeof($sem2)> 0)
        {
                // echo "<table class='cust_table'  cellpadding='6' style='float:left; width:10%; border-collapse:collapse;font-size:70%; margin-bottom:2%; border-top:2px; border-bottom:2px; border-right:2px; border-style:solid; border-left-width:0px;'>";
                echo "<table class='cust_table'  cellpadding='6' style='float:left;width:10%; border-collapse:collapse;font-size:60%; border-top:2px; border-bottom:2px; border-right:2px; border-style:solid; border-left-width:0px;'>";
                echo "<tr class = 'overall_head table_head'><th class='th_class' style= 'align-content:center;' colspan='2'>Term1+Term 2</th></tr>" ;
                echo "<tr class ='overall_exam table_head'>";
                echo "<th class='td_class' colspan ='2'>End of Year</th>";
                echo "</tr>";
                echo "<tr class ='overall_score table_head'>";
                echo "<th class='td_class'>Score</th>";
                echo "<th class='td_class'>Grade</th>";
                echo "</tr>";
        }
       

     




        $max=0;
        $total = 0;
		$percent = 0;
        $grand_total =0;
        $grand_max = 0;
    

        if(sizeof($sem2)> 0)
        {
           // loop for addition of sem1 and sem2
        for($i=0; $i<count($sem1_total); $i++)
        {
        echo "<tr class ='overall_row'>";
        $total=round(((int)$sem1_total[$i] +(int)$sem2_total[$i]));
        $max=round(((int)$sem1_max[$i] +(int)$sem2_max[$i]));
        $percent=ceil(($total)*100/($max));
       $grand_total+= $total;
       $grand_max+= $max;


     

        //  echo print_array($grand_total);die();


           // color of marks for overall total
          
       
            if($percent >= 91 && $percent <= 100){

                                 echo "<td class='td_class center'><div class ='a1_color marks_color'>" . $total . "</div></td>";
                           }else if($percent >= 81  && $percent <= 90){
                                 echo "<td class='td_class center'><div class ='a2_color marks_color'>" . $total . "</div></td>";
                           }else if($percent >= 71 && $percent <= 80){
                                  echo "<td class='td_class center'><div class ='b1_color marks_color'>" . $total . "</div></td>";
                           }else if($percent >= 61 && $percent <= 70){
                                  echo "<td class='td_class center'><div class ='b2_color marks_color'>" . $total . "</div></td>";  
                           }else if($percent >= 51 && $percent <= 60){
                                 echo "<td class='td_class center'><div class ='c1_color marks_color' >" . $total . "</div></td>"; 
                           }else if($percent >= 41 && $percent <= 50){
                                 echo "<td class='td_class center'><div class ='c2_color marks_color'>" .  $total. "</div></td>";  
                           }else if($percent >= 33 && $percent <= 40){
                                 echo "<td class='td_class center'><div class ='d_color marks_color'>" .   $total . "</div></td>";     
                           }else if($percent <= 32){
                                 echo "<td class='td_class center'><div class ='e_color marks_color' >" .  $total . "</div></td>";       
                           }


   
        
          // end


       
       // end
       
                // color for grades according to percent
 
            
                    if($percent >= 91 && $percent <= 100){

                                 echo "<td class='td_class center'><div class ='a1_color marks_color'>" . check_grade($percent). "</div></td>";
                           }else if($percent >= 81  && $percent <= 90){
                                 echo "<td class='td_class center'><div class ='a2_color marks_color'>" . check_grade($percent) . "</div></td>";
                           }else if($percent >= 71 && $percent <= 80){
                                  echo "<td class='td_class center'><div class ='b1_color marks_color'>" . check_grade($percent) . "</div></td>";
                           }else if($percent >= 61 && $percent <= 70){
                                  echo "<td class='td_class center'><div class ='b2_color marks_color'>" . check_grade($percent) . "</div></td>";  
                           }else if($percent >= 51 && $percent <= 60){
                                 echo "<td class='td_class center'><div class ='c1_color marks_color' >" . check_grade($percent) . "</div></td>"; 
                           }else if($percent >= 41 && $percent <= 50){
                                 echo "<td class='td_class center'><div class ='c2_color marks_color'>" .  check_grade($percent). "</div></td>";  
                           }else if($percent >= 33 && $percent <= 40){
                                 echo "<td class='td_class center'><div class ='d_color marks_color'>" .   check_grade($percent). "</div></td>";     
                           }else if($percent <= 32){
                                 echo "<td class='td_class center'><div class ='e_color marks_color' >" .  check_grade($percent) . "</div></td>";       
                           }
            



            // end

        //echo "<td class='td_class'>" .check_grade($percent) . "</td>";



        echo "</tr>";       
        }

         $percent = ceil(($grand_total*100)/$grand_max);


       


     


     

    //    echo print_array($grand_total);die();

       // end of loop
        




        echo "</table>";
      
        }
?>
 

</div><br><br>
<?php
   if(sizeof($sem2)> 0)
        {

  echo"<div style='float:left;'>";
        echo "<span style ='color:#FF9100;border-bottom:1px #FF9100'>Overall Grade</span><br>";
        echo "<span style ='font-size:1em;'>".check_grade($percent)."</span><br>";
        echo "<span style ='font-size:0.7em;'>Class Avg. &nbsp".check_grade($percent)."</span>";
        echo "</div><br><br>";

        }
?>
<br><br>

<!-- Second tabel for printing grade subjects -->
<div style="align-content:center;display:inline-block; width:100%;">
<?php

//--------------------------------------------------------------PRINT TABLES OF CO SCHOLASTIC-----------
$pc_id = $global_arr['student_selected_class'][0]['pc_id'];
// $co_scho_tab_1 = "";
// $co_scho_tab_2 = "";
// echo print_array(count($co_scholastic));
// echo print_array($co_scho_res);die;

if(count($co_scho_res)){
if(isset($co_scho_res[$pc_id]['1']) && (sizeof($co_scho_res[$pc_id]['1'])> 0))
        {
        echo "<table  cellpadding='6' style='margin:2% 0%; float:left; width:30%; border-collapse:collapse;font-size:70%; border-top:2px;vertical-align: top; '>
                <tr> <th colspan ='2' class ='th_class' style =' background-color:#FF9100; color:white;'>CO-SCHOLASTIC PERFORMANCE</th></tr>
                <tr>
                <th class='th_class'>subject</th>
                <th class='th_class'>Grade </th>
                </tr><tbody>";

                $trs = "";
                // echo print_array($co_scho_res[$pc_id]);die;
                foreach($co_scho_res[$pc_id]['1'] as $k => $v) {
                    $trs .="<tr><td class='td_class'>".$v['curriculum_name']."</td><td class='td_class center'><div class ='c1_color' style ='max-width:50%;color:white;'>".check_co_scho_grade($v['grade'])."</div></td></tr>";
                }
           echo    $trs."</tbody></table>";
        }
if(isset($co_scho_res[$pc_id]['2']) && (sizeof($co_scho_res[$pc_id]['2'])> 0))        
  {
    echo "<table  cellpadding='6' style='margin:2% 0%;float:left; width:30%; border-collapse:collapse;font-size:70%; border-top:2px;vertical-align: top; '>
           <tr> <th colspan ='2' class='th_class'  style =' background-color:#FF9100; color:white;'>CO-SCHOLASTIC PERFORMANCE</th></tr>
                <tr>
                <th class='th_class'>Grade</th>
                </tr><tbody>";

            $trs = "";
            foreach ($co_scho_res[$pc_id]['2'] as $k => $v) {
                $trs .="<tr><td class='td_class center'><div class ='c1_color' style ='max-width:10%;color:white;'>".check_co_scho_grade($v['grade'])."</div></td></tr>";
            }
       echo    $trs."</tbody></table>";
    }
}else{
    echo  "<h5>Co-Scholastic Marks are not assigned to this student for same class.</h5>";   
}
    
?>

</div><br>


<!--footer section-->

<div style ="float:left; padding-left:3%; color:#FF9100; border-bottom:1px solid #FF9100; ">Attendance </div>
<div style ="text-align:center;color:#FF9100; border-bottom:1px solid #FF9100; ">Remarks &emsp; <?php echo $class_remark; ?></div>
<br>
<div style="float:left;padding-left:3%;">Attd &emsp;<input type="text" class ="common_input" ></div><br><br><br><br>
<div>
       <span style=" float:left; border-top:1px solid black;font-size:0.8em;font-weight:200;">Class Teacher's Signature</span>
       <span style=" text-align:center; border-top:1px solid black;font-size:0.8em;font-weight:200;"> Signature of Principal</span>
       <span style=" float:right; border-top:1px solid black;font-size:0.8em;font-weight:200;">Signature of Parent</span>
       
    </div>

<!--end of footer sextion-->









</div>
<!--end of marksheet div-->
<script>
 
$(document).ready(function(){
     // for table equal height
    $('.sem2_head').css({ 'height': $('.sem1_head').outerHeight() });
    // $('.sem2_row').css({ 'height': $('.sem1_row').outerHeight() });
    $('.sem2_exam').css({ 'height': $('.sem1_exam').outerHeight() });
    $('.sem2_score').css({ 'height': $('.sem1_score').outerHeight() });

    $('.overall_head').css({ 'height': $('.sem2_head').outerHeight() });
    // $('.overall_row').css({ 'height': $('.sem2_row').outerHeight() });
    $('.overall_exam').css({ 'height': $('.sem2_exam').outerHeight() });
    $('.overall_score').css({ 'height': $('.sem2_score').outerHeight() });



// end

$('.common_input').keyup(function(){
        $(this).attr('value',$(this).val()); 
    });



});
</script>

</section>


 <!--end of marksheet for 1st 2nd and 3rd-->

<!--for other classes-->

<?php } else{ ?>
<section onload="setTimeout(myFunction(), 3000)">
<h1>There is no Marksheet</h1>
</section>

<?php } ?>


 <!--end  of other classes-->