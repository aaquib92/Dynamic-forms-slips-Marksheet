<?php

$global_arr = array();
$academic_year = "";
$id = "";
if( isset($data['student_id']))
{
$id = $data['student_id'];
$global_arr = get_student_by_id($id);
$co_scho_res = json_decode(get_students_class_curriculum($id) , true)['data'];
;}

$academic_year = (date('m') < 6) ?((date('Y')-1)." - ".date('Y')):date('Y')." - ".(date('Y')+1);
$global_arr['student_credentials']['mobile'] = !(isset($global_arr['student_credentials']['mobile']) || empty($global_arr['student_credentials']['mobile'])) ?'':FALSE;
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
$stud_school_name = get_session_data()['profile']['partner_name'];
$stud_school_addr = get_session_data()['profile']['address'];
$stud_school_logo = get_session_data()['profile']['logo'];


$array_data = unserialize(base64_decode(get_session_data()['marksheet']));

// echo print_array($array_data);die;

$this->session->unset_userdata('marksheet');

foreach($array_data['exams'] as $key => $all_exam)
{
        foreach($array_data['data'] as $key1 => $data)
{
        $datas = array();
        $temp_key = 0;
        foreach($data['exam'] as $key2 => $single_exam)
        {
        $datas[] = $single_exam['exam_id'];
        if($all_exam['id']==$single_exam['exam_id'])
        {
        $array_data['exams'][$key]['total_marks'] = $single_exam['total_marks'];
        $array_data['exams'][$key]['passing_marks'] = $single_exam['passing_marks'];
        }
        $temp_key = $key2;
        }

        if (in_array($all_exam['id'], $datas)) {
        }
        else
        {
         $array_data['data'][$key1]['exam'][$temp_key+1] = array(
         'exam_id' => $all_exam['id'],
         'marks_obtained' => '-'
         );
         foreach ($array_data['data'][$key1]['exam'] as $key9 => $row9) 
         {
         $exam_id_temp[$key9]  = $row9['exam_id'];
         }
         array_multisort($exam_id_temp, SORT_ASC, $array_data['data'][$key1]['exam']);
         $exam_id_temp = [];
        }
}
}



$month = 0;

$year = 0;

foreach($array_data['exams'] as $key => $all_exam)
{
        if($key==0)
        {
         if($all_exam['month']<6)
         {
         $month = $all_exam['month'];
         $year = $all_exam['end_year'];
         }
         else 
         {
         $month = $all_exam['month'];
         $year = $all_exam['start_year'];
         }
        }

        $new_year;
        if($all_exam['month']<6)
        {
        $new_year = $all_exam['end_year'];
        }
        else
        {
        $new_year = $all_exam['start_year'];
        }
        if($new_year>$year)
        { $month = $all_exam['month'];
        $year = $new_year;
        }
}
$month_arr[1] = "Jan";
$month_arr[2] = "Feb";
$month_arr[3] = "March";
$month_arr[4] = "April";
$month_arr[5] = "May";
$month_arr[6] = "June";
$month_arr[7] = "July";
$month_arr[8] = "August";
$month_arr[9] = "Sept";
$month_arr[10] = "Oct";
$month_arr[11] = "Nov";
$month_arr[12] = "Dec";

$price = array();
foreach ($array_data['exams'] as $key => $row)
{
        $price[$key] = $row['id'];
}
array_multisort($price, SORT_ASC, $array_data['exams']);



$sem1=[];
$sem2=[];
$sorted_arr = [];       
$sem1_exms = [];
$sem2_exms = [];
$sem1_exms_name = [];
$sem2_exms_name = [];
$sem1_total_max =0;
$sem2_total_max =0;

$subject_sequence =['english','hindi','marathi','maths', 'science','evs'];
// periodic test 1
$co_scholastic =['work_education','art_education','health_and_physical_education'];


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
// -------------------------------------------------
        foreach($sorted_arr as $key_data => $data)
        { 
        $temp=[];                                                               
        $temp1=[];  
                                                                            
         
        //  echo print_array($data);die();

                foreach($data['exam'] as $key_exam => $v1)
                {
                 
                        //   echo print_array($v1);die();
                        //   $exam_total[$v1['exam_id']] = $v1['total_marks'];
                   

                        $v1['sem'] = isset($v1['sem']) ? $v1['sem'] : 'ND';
                        $t = $data['exam'][$key_exam];
                        $t['subject_name'] = $data['subject_name'];
                        //----------------------------FOR SEM 1-------------------
                        if( $v1['sem'] == 1){
                                $temp[]  = $t;
                                $sem1_exms_name[$v1['exam_id']] = $v1['exam_name'].'<br>('.$v1['total_marks'].')' ;
                                $sem1_total_max+= $v1['total_marks'];
                                !(in_array($v1['exam_id'],$sem1_exms)) ? $sem1_exms[] = $v1['exam_id'] : FALSE;
                        }
                        //----------------------------FOR SEM 2-------------------
                        if( $v1['sem'] == 2){
                                $temp1[]  = $t;
                                $sem2_exms_name[$v1['exam_id']] =  $v1['exam_name'].'<br>('.$v1['total_marks'].')' ;
                                $sem2_total_max+= $v1['total_marks'];
                                !(in_array($v1['exam_id'],$sem2_exms)) ? $sem2_exms[] = $v1['exam_id'] : FALSE;

                        }
                }
                !(empty($temp)) ? $sem1[$key_data]['exam'] = $temp  : FALSE;
                !(empty($temp1)) ? $sem2[$key_data]['exam'] = $temp1 : FALSE;
        }

// ------------------------------------------------- COMPARING PERIODIC TEST SPECIAL CASE CRS----------



        foreach ($sem1 as $k7 => $v7) {
                $per_test_1 = [];
                $per_test_2 = [];

                foreach ($v7['exam'] as $k8 => $v8) {
                        $t_name = strtr($v8['exam_name']," -","__");
                        (($t_name == 'periodic_test_1')) ? $per_test_1 = $v8  : FALSE;
                        (($t_name == 'periodic_test_2')) ? $per_test_2 = $v8  : FALSE;
                }

                if(sizeof($per_test_1) > 0 && sizeof($per_test_2) > 0)
                {
                                $per_obt = ($per_test_1['marks_obtained'] > $per_test_2['marks_obtained']) ? $per_test_1['marks_obtained'] : $per_test_2['marks_obtained'];
                                $per_fin = $per_test_1;
                                $per_fin['exam_name']     = 'periodic test';
                                $per_fin['total_marks']     = $per_test_1['total_marks']/2;
                                $per_fin['passing_marks']   = $per_test_1['passing_marks']/2;
                                $per_fin['marks_obtained']  = $per_obt/2;

                                $sem1[$k7]['exam'][] = $per_fin;

                                foreach ($sem1[$k7]['exam'] as $k9 => $v9) {
                                        if($v9['exam_id'] == $per_test_2['exam_id']){
                                                unset($sem1[$k7]['exam'][$k9]);
                                        }
                                }
                                foreach ($sem1_exms as $k10 => $v10) {
                                        if($v10 == $per_test_2['exam_id']){
                                                unset($sem1_exms[$k10]);
                                                unset($sem1_exms_name[$v10]);                                        
                                        }
                                }
                                $sem1[$k7]['exam'] = array_values($sem1[$k7]['exam']);
                                $sem1_exms = array_values($sem1_exms);
                }

        }



        foreach ($sem2 as $k7 => $v7) {
                $per_test_1 = [];
                $per_test_2 = [];

                foreach ($v7['exam'] as $k8 => $v8) {
                        $t_name = strtr($v8['exam_name']," -","__");
                        (($t_name == 'periodic_test_1')) ? $per_test_1 = $v8  : FALSE;
                        (($t_name == 'periodic_test_2')) ? $per_test_2 = $v8  : FALSE;
                }

                if(sizeof($per_test_1) > 0 && sizeof($per_test_2) > 0)
                {
                                $per_obt = ($per_test_1['marks_obtained'] > $per_test_2['marks_obtained']) ? $per_test_1['marks_obtained'] : $per_test_2['marks_obtained'];
                                $per_fin = $per_test_1;
                                $per_fin['exam_name']     = 'periodic test';
                                $per_fin['total_marks']     = $per_test_1['total_marks']/2;
                                $per_fin['passing_marks']   = $per_test_1['passing_marks']/2;
                                $per_fin['marks_obtained']  = $per_obt/2;

                                $sem2[$k7]['exam'][] = $per_fin;

                                foreach ($sem2[$k7]['exam'] as $k9 => $v9) {
                                        if($v9['exam_id'] == $per_test_2['exam_id']){
                                                unset($sem2[$k7]['exam'][$k9]);
                                        }
                                }
                                foreach ($sem2_exms as $k10 => $v10) {
                                        if($v10 == $per_test_2['exam_id']){
                                                unset($sem2_exms[$k10]);
                                                unset($sem2_exms_name[$v10]);                                        
                                        }
                                }
                                $sem2[$k7]['exam'] = array_values($sem2[$k7]['exam']);
                                $sem2_exms = array_values($sem2_exms);
                }

        }











        //  echo print_array($sem1_exms_name);die;
        
        
?>
<?php

$gr_arr = ['E','D','C2','C1','B2','B1','A2','A1'];
function check_grade($marks){
$grade ;
if($marks <= 32)                      { $grade = 'E'; return $grade;   }
elseif($marks >= 33 && $marks <= 40)  { $grade = 'D'; return $grade;   }
elseif($marks >= 41 && $marks <= 50)  { $grade = 'C-2'; return $grade; }
elseif($marks >= 51 && $marks <= 60)  { $grade = 'C-1'; return $grade; } 
elseif($marks >= 61 && $marks <= 70)  { $grade = 'B-2'; return $grade; }
elseif($marks >= 71 && $marks <= 80)  { $grade = 'B-1'; return $grade; } 
elseif($marks >= 81 && $marks <= 90)  { $grade = 'A-2'; return $grade; }
elseif($marks >= 91 && $marks <= 100) { $grade = 'A-1'; return $grade; }
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
<section onload="setTimeout(myFunction(), 3000)">

<style>
    .marksheet-div{
    width:95%;
    height:auto;
    display:inline-block;
    }
    .left{
    float:left;
    padding-top:1%;
    padding-left:3%;
    }
    .right{
    float:right;
    padding-top:1%;
    padding-right:3%;
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
    size: landscape;
    margin: 1mm 1mm 1mm 1mm;*/
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
<!--main div-->
<div class="marksheet-div">
<!--header-->
<div class="head-div">
<img class="left" width="100" height="80" src="http://blog.askiitians.com/wp-content/uploads/2014/09/CBSE-logo.jpg" >
<img class="right" width="100" height="80" src="<?php echo $stud_school_logo ; ?>" >

<center>
<h4 style="margin-bottom:0px; padding-top:2% font-weight:700;"><?php echo $stud_school_name ;?></h4><br>
<span style="font-size:0.8em;">AFFILLIATED TO C.B.S.E</span><br>
<span style="font-size:0.8em;">AFFILIATION NO:1180013</span>
</center>
</div><br>
<hr style="border:1px solid black;">

<center>
<span style="">ACADEMIC SESSION: <?php echo $academic_year;?></span><br>
<span style="">REPORT CARD FOR CLASS:-<?php echo $stud_class ;?> </span>
</center>
<br>
<div style="text-align:left;float:left;width:100%;padding-left:3%; font-size:0.7em;">
Student's Name : &emsp; <span class="slip-input1"><?php echo $stud_name ;?></span>
(Mother's/Father's' Name) : &emsp; <span class="slip-input1"><?php echo $parent_name ;?></span>
</div><br>
<div style="text-align:left;float:left;width:100%;padding-left:3%; font-size:0.7em;">
Roll No :&emsp; <span class="slip-input1"><?php echo $stud_roll ;?> &emsp;&emsp;&emsp; </span>
Gr/Sr No :&emsp; <span class="slip-input1"><?php echo $gr_number ;?> &emsp;&emsp;&emsp; </span>
Date of Birth : &emsp;<span class="slip-input1"><?php echo $dob ;?></span>
Class : &emsp;<span class="slip-input1"><?php echo $stud_class ;?></span>
</div><br>
<?php  //  $sem1_e = count($sem1[$key_data]['exam']) + 2;
       //  $sem2_e =count($sem2[$key_data]['exam']) + 2; 

         $sem1_e = isset($sem1[0]['exam']) ? (count($sem1[0]['exam']) + 2) : 2; 
         $sem2_e = isset($sem2[0]['exam']) ? (count($sem2[0]['exam']) + 2) : 2; 

?>
<div style="align-content:center; margin:2%">
<table class="cust_table" cellpadding="6" style="float:left; width:40%;border-collapse:collapse;font-size:70%; margin-bottom:2%; border-left:2px; border-top:2px; border-bottom:2px; border-style:solid; border-right-width:0px;">


<tr>    <!--Printing first row Term name  -->
  <th class="th_class"> Scholastic Areas: </th>
  <?php 
  echo "<th class='th_class' style= 'align-content:center;' colspan='$sem1_e'>TERM-1(100 MARKS)</th>"; 
  ?>
</tr>

<tr>
<?php    //printing second row exam names
echo "<th class='td_class'>". "Subject Name" . "</th>";
//  echo print_array($sem2);die;
if(sizeof($sem1) > 0)
{
       
        foreach($sem1_exms_name as $k =>  $v_exam)
                   
        {
                // echo print_array($v_exam);
                echo "<th class='td_class'>". $v_exam . "</th>";
        }
}

echo "<th class='td_class'>" . "Marks Obtained <br> (100) </th>";
echo "<th class='td_class'>" . "Grade" . "</th>";


?>
</tr>


<?php
$total_subjects = count($sem1) + count($sem2);
$sem1_total=[];
$sem1_max=[];

foreach ($sem1 as $k_sem1 => $v_sem1)  // loop to print sem1 marks  ------LOOP START FOR SUBJECT ROW
{

    echo "<tr> <td class='td_class'>";
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

    foreach($temp_exm as $k_marks => $v_marks)
    {
                        $v_marks['marks_obtained'] = isset($v_marks['marks_obtained']) ? $v_marks['marks_obtained'] : 0;
                        echo "<td class='td_class'>" . $v_marks['marks_obtained']."</td>";
                        $sem1_sub_total += $v_marks['marks_obtained'];
                        $sub_max_marks += $v_marks['total_marks'];
    }

    $sem1_total[] =$sem1_sub_total;
    $sem1_max[]=$sub_max_marks;
    echo "<td class='td_class'>".$sem1_sub_total ."</td>";
    $subject_grade  = ($sub_max_marks==0) ? 'Fail' : check_grade(ceil(($sem1_sub_total *100)/$sub_max_marks));
    echo "<td class='td_class'>". $subject_grade."</td>";
    echo "</tr>";
}

echo "</table>";

//------------------------------------TBALE FOR SEM 2
 $sem2_total=[];
 $sem2_max=[];
if(sizeof($sem2) > 0)
{
        $clspn_t2 = $sem2_e+1;
echo "<table class='cust_table'  cellpadding='6' style='float:left; width:40%; border-collapse:collapse;font-size:70%; margin-bottom:2%; border-top:2px; border-bottom:2px; border-right:2px; border-style:solid; border-left-width:0px;'>";
echo "<tr><th class='th_class' style= 'align-content:center;' colspan='$clspn_t2'>TERM-2(100 MARKS)<br></th></tr>" ;
echo "<tr>";     //row to print exam name and other headings
                      

        foreach($sem2_exms_name as  $v_exam)
        {
                echo "<th class='td_class'>". $v_exam . "</th>";
        }
    echo "<th class='td_class'>" . "Marks Obtained <br>(100) </th>";
    echo "<th class='td_class'>" . "Grade" . "</th>";
    echo "</tr>";

//  echo print_array($sem2);die;
foreach ($sem2 as $k_sem2 => $v_sem2)  // loop to print sem2 marks  ------LOOP START FOR SUBJECT ROW
{

    echo "<tr>";
 
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
    $subject_grade  = ($sub_max_marks==0) ? 'Fail' : check_grade(ceil(($sem2_sub_total *100)/$sub_max_marks));
    echo "<td class='td_class'>". $subject_grade."</td>";
    echo "</tr>";
}

echo "</table>";       
}

?>

<!--Total of sem 1 and sem2-->
<?php

  if(sizeof($sem2)> 0)
        {
echo "<table class='cust_table'  cellpadding='6' style='float:left; width:10%; border-collapse:collapse;font-size:70%; margin-bottom:2%; border-top:2px; border-bottom:2px; border-right:2px; border-style:solid; border-left-width:0px;'>";
echo "<tr><th class='th_class' style= 'align-content:center;' colspan='2'>OVERALL(TERM 1+ TERM 2)</th></tr>" ;
echo "<tr>";
echo "<th class='td_class'>" . "Marks" . "</th>";
echo "<th class='td_class'>" . "Grade" . "</th>";
echo "</tr>";
        }
       $max=0;
     $total = 0;
		$percent = 0;
        if(sizeof($sem2)> 0)
        {
           // loop for addition of sem1 and sem2
        for($i=0; $i<count($sem1_total); $i++)
        {
        echo "<tr>";
        $total=round(((int)$sem1_total[$i] +(int)$sem2_total[$i])/2);
        $max=round(((int)$sem1_max[$i] +(int)$sem2_max[$i])/2);
     
        echo "<td class='td_class'>" .$total . "</td>";
        // calculation for percentage
        $percent=ceil(($total)*100/($max));
       // end
        echo "<td class='td_class'>" .check_grade($percent) . "</td>";
        echo "</tr>";       
        }

// end
   

echo "</table>";
        }
echo"<br><br>"

?>


<!--end-->

</div>






<!-- Second tabel for printing grade subjects -->
<div style="align-content:center;">

<br><br><br><br><br><br>
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
        echo "<table  cellpadding='6' style='margin:2% 0%;display:inline-table; width:50%; border-collapse:collapse;font-size:70%; border-top:2px;vertical-align: top; '>
                <thead>
                <th class='th_class'>Co-Scholastic Areas:Term-I[on a 3 point [A C] grading scale]</th>
                <th class='th_class'>Grade <?php  ?></th>
                </thead><tbody>";

                $trs = "";
                // echo print_array($co_scho_res[$pc_id]);die;
                foreach($co_scho_res[$pc_id]['1'] as $k => $v) {
                    $trs .="<tr><td class='td_class'>".$v['curriculum_name']."</td><td class='td_class'>".check_co_scho_grade($v['grade'])."</td></tr>";
                }
           echo    $trs."</tbody></table>";
        }
if(isset($co_scho_res[$pc_id]['2']) && (sizeof($co_scho_res[$pc_id]['2'])> 0))        
  {
    echo "<table  cellpadding='6' style='margin:2% 0%;display:inline-table; width:50%; border-collapse:collapse;font-size:70%; border-top:2px;vertical-align: top; '>
            <thead>
            <th class='th_class'>Co-Scholastic Areas:Term-II[on a 3 point [A C] grading scale]</th>
            <th class='th_class'>Grade <?php  ?></th>
            </thead><tbody>";

            $trs = "";
            foreach ($co_scho_res[$pc_id]['2'] as $k => $v) {
                $trs .="<tr><td class='td_class'>".$v['curriculum_name']."</td><td class='td_class'>".check_co_scho_grade($v['grade'])."</td></tr>";
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
//   if(sizeof($sem1)> 0)
//         {
          echo '<table border="1" cellpadding="6" style=" margin:2% 0%; width:100%; border:1px; border-style: solid; border-collapse:collapse;font-size:70%;">
                <thead>
                <th class="th_class"></th>        <th class="th_class">Grade  </th>
                </thead>
                <tr>
                <td class="td_class">Discipline:Term-I[on a 3 point [A C] grading scale]</td>
                <td class="td_class">
                        
               <select class="select_grade" name="" id="select_grade" style="width:100%; border:0px;">
               <option value="Outstanding">Outstanding</option>
                <option value="Excellent">Excellent</option>
                <option value="Very Good">Very Good</option>
                <option value="Good">Good</option>
                <option value="Above Average">Above Average</option>
                <option value="Average">Average</option>
                </select>
                <span class="selected_grade" id="selected_grade"> </span>

                </td>
                </tr>
            </table>';
        // }
//   if(sizeof($sem2)> 0)
//         {
//           echo '<table border="1" cellpadding="6" style="width:96%; border:2px; border-style: solid; border-collapse:collapse;font-size:70%;margin:1% 2%;">
//                 <thead>
//                 <th class="th_class"></th>        <th class="th_class">Grade  </th>
//                 </thead>
//                 <tr>
//                 <td class="td_class">Discipline:Term-II[on a 3 point [A C] grading scale]</td>
//                 <td class="td_class">
//                 <select class="select_grade1" name="" id="select_grade1" style="width:100%; border:0px; ">
//                 <option value="Outstanding">Outstanding</option>
//                 <option value="Excellent">Excellent</option>
//                 <option value="Very Good">Very Good</option>
//                 <option value="Good">Good</option>
//                 <option value="Above Average">Above Average</option>
//                 <option value="Average">Average</option>
//                 </select>
//                 <span class="selected_grade1" id="selected_grade1"> </span>
                
//                 </td>
//                 </tr>
//             </table>';
//         }

?>
</div>

<br> 
<p class="div-input1">Class Teacher's Remarks ________________________</p><br>
<p style="width:14%;float:left;font-size:0.9em;">Place:KALYAN</p><br><br>

<div>
    <span style="width:20%;float:left;font-size:0.9em;">Date</span>
    <span style="width:40%;font-size:0.9em;">Signature of Class Teacher</span>
    <span  style="width:40%;float:right;font-size:0.9em;"> PRINCIPAL</span>
</div>
</div>
</section>

<!--end-->
