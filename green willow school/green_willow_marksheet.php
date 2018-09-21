<?php

$global_arr = array();
$academic_year = "";
$id = "";
if( isset($data['student_id']))
{
$id = $data['student_id'];
$global_arr = get_student_by_id($id);
}

$academic_year = (date('m') < 6) ?((date('Y')-1)." - ".date('Y')):date('Y')." - ".(date('Y')+1);
// echo print_array($global_arr);die;
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



$sem1=array();
$sem2=array();
$sorted_arr = [];      

$subject_sequence =['english','hindi','marathi','maths', 'science'];

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

        $subjects = array();

// echo print_array($sorted_arr);die;
        foreach($sorted_arr as $key_data => $data)
        {
        unset($temp);
        $temp=array();
        unset($temp1);
        $temp1=array();
         $x = $data['subject_name'];
            $subjects[] = $x;

         //  echo print_array($data);die;

        //     $sem1[$key_data] = $data;
        //     $sem2[$key_data] = $data;      
                foreach($data['exam'] as $key_exam => $v1)

                {
                         //  echo print_array($v1);die;

                        $v1['sem'] = isset($v1['sem']) ? $v1['sem'] : 'ND';
                        if($v1['sem'] == 1)
                        {
                                $t1 = $data['exam'][$key_exam];
                                $t1['subject_name'] = $data['subject_name'];
                        $temp[] = $t1;
                 // echo print_array($t1);die;
                       
                        // $temp[] = $data['exam'][$key_exam];
                        if(strtolower($v1['exam_name']) == strtolower("Periodic Test 1"))
                        {
                                $temp_exam['exam'][$key_exam]['marks_obtained'] = $v1['marks_obtained'];
                                $temp_exam['exam'][$key_exam]['total_marks'] = $v1['total_marks'];
                                $temp_exam['exam'][$key_exam]['passing_marks'] = $v1['passing_marks'];
                               
                                // echo $v1['marks_obtained'] ."<br>" ;
                                foreach($data['exam'] as $k7 => $v7)
                                {
                                if(strtolower($v1['exam_name']) == strtolower("Periodic Test 2"))
                                {  
                                $temp_exam['exam'][$k7]['marks_obtained'] = $v1['marks_obtained'];
                                $temp_exam['exam'][$k7]['total_marks'] = $v1['total_marks'];
                                $temp_exam['exam'][$k7]['passing_marks'] = $v1['passing_marks'];
                                // echo $v1['marks_obtained'] ."<br>" ;
                               
                                }
                                // if ($temp_exam['exam'][$key_exam]['marks_obtained'] > $temp_exam['exam'][$k7]['marks_obtained'])
                                // {
                                //     echo $temp_exam['exam'][$key_exam]['marks_obtained'];
                               
                                // }
                                // else{
                                //     echo $temp_exam['exam'][$k7]['marks_obtained'];
                               
                                // }
                                }
                        }
                        }
                        if($v1['sem'] == 2)
                        {
                        //echo print_array('Here');
                        $temp1[] = $data['exam'][$key_exam];
                        
                        }
                }
        !(empty($temp)) ? $sem1[$key_data]['exam'] = $temp  : FALSE;
        !(empty($temp1)) ? $sem2[$key_data]['exam'] = $temp1 : FALSE;
        }

            //  echo print_array($subjects);die();
        
       
?>
<?php
                       //  echo print_array($sem1);die;
                        //  echo print_array($sem2);die;

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
    size: Portrait;
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
<img class="left" width="100" height="80" src="<?php echo $stud_school_logo ; ?>" >
<img class="right" width="100" height="80" src=<?php echo "$stud_img"?> >
<center>
<h3 style="margin-bottom:0px; padding-top:2% font-weight:700;"><?php echo $stud_school_name ;?></h3><br>
<span style="font-size:0.8em;">AFFILLIATED TO C.B.S.E</span><br>
<span style="font-size:0.8em;">AFFILIATION NO:2132432</span>
</center>
</div><br><br>
<hr style="border:1px solid black;">

<center>
<span style="">ACADEMIC SESSION: <?php echo $academic_year;?></span><br>
<span style="">REPORT CARD FOR CLASS:-<?php echo $stud_class ;?> </span>
</center>
<br>
<div style="text-align:left;float:left;width:100%;padding-left:3%; font-size:0.7em;">
Student's Name : &emsp; <span class="slip-input1"><?php echo $stud_name ;?></span>
(Mother's/Father's' Name) : &emsp; <span class="slip-input1"><b>Mr.&nbsp;</b><?php echo $parent_name ;?></span>
</div><br>
<div style="text-align:left;float:left;width:100%;padding-left:3%; font-size:0.7em;">
Roll No :&emsp; <span class="slip-input1"><?php echo $stud_roll ;?> &emsp;&emsp;&emsp; </span>
Gr/Sr No :&emsp; <span class="slip-input1"><?php echo $gr_number ;?> &emsp;&emsp;&emsp; </span>
Date of Birth : &emsp;<span class="slip-input1"><?php echo $dob ;?></span>
Class : &emsp;<span class="slip-input1"><?php echo $stud_class ;?></span>
</div><br>
<?php $sem1_e = isset($sem1[0]['exam']) ? (count($sem1[0]['exam']) + 3) : 3;
      $sem2_e = isset($sem2[0]['exam']) ? (count($sem2[0]['exam']) + 3) : 3;
      $sem1_m =  isset($sem1[0]['exam']) ? (count($sem1[0]['exam']) +0) : 0;
      $sem2_m =  isset($sem2[0]['exam']) ? (count($sem2[0]['exam']) + 0) : 0;

// echo print_array($sem1_m);die();
//  echo print_array($sem2_m);die();

?>
<div style="align-content:center; margin:2%">
<table cellpadding="6" style="float:left; width:60%;border-collapse:collapse;font-size:70%; margin-bottom:2%; border-left:2px; border-top:2px; border-bottom:2px; border-style:solid; border-right-width:0px;">


<tr>    <!--Printing first row Term name  -->
  <th class="th_class"> Scholastic Areas: </th>
  <?php
      if(sizeof($sem1) >  0)
        {
  echo "<th class='th_class' style= 'align-content:center;' colspan='$sem1_e'>" ."Term 1" ."</th>";
        }
  ?>
</tr>

<tr>
<?php    //printing second row exam names
  
echo "<td class='td_class'>". "Subject Name" . "</td>";
$max_total =0;

        if(sizeof($sem1) >  0)
        {

foreach ($sem1 as $k_sem1 => $v_sem1)
{
}

foreach($v_sem1['exam'] as  $v_exam)
{

echo "<td class='td_class'>". $v_exam['exam_name'] . "<br>(". $v_exam['total_marks'] .")</td>";
   $max_total +=  $v_exam['total_marks'];
}
        
echo "<td class='td_class'>" . "Marks Obtained" . "<br>(".  $max_total. ")</td>";
echo "<td class='td_class'>" . "Percentage" . "</td>";
echo "<td class='td_class'>" . "Grade" . "</td>";

        }


?>
</tr>


<?php
$total_subjects = count($sem1) + count($sem2);
$overall_total = 0; 
$overall_max_marks = 0;
// if(sizeof($sem1) > sizeof($sem2)){
//         foreach ($sem1 as $k_sem1 => $v_sem1)  // loop to print sem1 marks
// {
// echo "<td class='td_class'>"; $v_sem1['exam'][0]['subject_name'] . "</td>";
// }

//  }

foreach ($sem1 as $k_sem1 => $v_sem1)  // loop to print sem1 marks
{
    //echo print_array($v_sem1);die();
       
    echo "<tr> <td class='td_class'>";

    echo $v_sem1['exam'][0]['subject_name'] . "</td>";
    
    $sem1_sub_total =0;
    $sub_max_marks =0;
    
    foreach($v_sem1['exam'] as $k_marks => $v_marks)
    {
        $v_marks['marks_obtained'] = isset($v_marks['marks_obtained']) ? $v_marks['marks_obtained'] : 0;
        echo "<td class='td_class'>" . $v_marks['marks_obtained'] . "</td>";
        $sem1_sub_total += $v_marks['marks_obtained'];
        $sub_max_marks += $v_marks['total_marks'];
    }
    echo "<td class='td_class'>".$sem1_sub_total ."</td>";
    $subject_grade = check_grade(ceil(($sem1_sub_total *100)/$sub_max_marks));
    $subject_percent = round((( $sem1_sub_total / $sub_max_marks ) * 100),2);
    echo "<td class='td_class'>". $subject_percent.'%' ."</td>";
    echo "<td class='td_class'>". $subject_grade."</td>";
    echo "</tr>";
    $overall_total+= $sem1_sub_total; 
    $overall_max_marks+=  $sub_max_marks;
//   echo  print_array($sem1_sub_total++);die();
}
// $overall_percent = round((( $overall_total / $overall_max_marks ) * 100),2);
 if($overall_max_marks != 0){
$overall_percent = round(((   $overall_total / $overall_max_marks ) * 100),2);
}
//if it is zero than set it to null
else{
  $overall_percent = 0;//is set to null
} 
 $overall_grade = check_grade(ceil(($overall_percent)));
    if(sizeof($sem1)> 0)
        {
echo"<tr><td class ='td_class'>Total</td><td class = 'td_class' colspan='$sem1_m'></td><td class = 'td_class'>".$overall_total."</td><td class = 'td_class'>". $overall_percent.'%' ."</td><td class = 'td_class'>. $overall_grade.</td></tr>";
        }
echo "</table>";
echo "<table  cellpadding='6' style='float:left; width:40%; border-collapse:collapse;font-size:70%; margin-bottom:2%; border-top:2px; border-bottom:2px; border-right:2px; border-style:solid; border-left-width:0px;'>";
if(sizeof($sem2)> 0)
        {
echo "<tr><th class='th_class' style= 'align-content:center;' colspan='$sem2_e'>". "Term 2" ."</th></tr>" ;
        }
echo "<tr>";     //row to print exam name and other heading
        if(sizeof($sem2) >  0)
   {
$overall_total = 0; 
$overall_max_marks = 0;
$max_total =0;

        foreach ($sem2 as $k_sem2 => $v_sem2)
        {
                //  echo   print_array($v_sem2); die();
        }

        foreach($v_sem2['exam'] as  $v_exam)
        {
                //   echo   print_array( $v_exam); die();

     echo "<td class='td_class'>". $v_exam['exam_name'] . "<br>(". $v_exam['total_marks'] .")</td>";
     $max_total +=  $v_exam['total_marks'];
        }

        }

    
  if(sizeof($sem2)> 0)
        {
           

    echo "<td class='td_class'>" . "Marks Obtained" . "<br>(".  $max_total. ")</td>";
    echo "<td class='td_class'>" . "Percentage" . "</td>";
    echo "<td class='td_class'>" . "Grade" . "</td>";
        }
    echo "</tr>";

        if(sizeof($sem2)> 0)
        {
                foreach ($sem2 as $k_sem2 => $v_sem2)   // loop to print term 2 marks
                {




                        $sem2_sub_total =0;
                        $sub_max_marks =0;
                        echo "<tr>";

                if(sizeof($sem1) ==0){

                   echo "<td>".$subjects[$k_sem2] . "</td>";

                      }






                        foreach($v_sem2['exam'] as $k_marks2 => $v_marks2)
                        {
                                $v_marks2['marks_obtained'] = isset($v_marks2['marks_obtained']) ? $v_marks2['marks_obtained'] : 0;
                                echo "<td class='td_class'>" . $v_marks2['marks_obtained'] . "</td>";
                                $sem2_sub_total += $v_marks2['marks_obtained'];
                                $sub_max_marks += $v_marks2['total_marks'];
                        }
                        echo "<td class='td_class'>".$sem2_sub_total ."</td>";

                        $subject_grade = check_grade(ceil(($sem2_sub_total *100)/$sub_max_marks));
                        $subject_percent = round((( $sem2_sub_total / $sub_max_marks ) * 100),2);
                        echo "<td class='td_class'>". $subject_percent .'%' ."</td>";
                        echo "<td class='td_class'>". $subject_grade."</td>";
                        echo "</tr>";
                          $overall_total+= $sem2_sub_total; 
                          $overall_max_marks+=  $sub_max_marks;
                }
        }
//  $overall_percent = round(((   $overall_total / $overall_max_marks ) * 100),2);
 //If it's not 0 then divide
if($overall_max_marks != 0){
$overall_percent = round(((   $overall_total / $overall_max_marks ) * 100),2);
}
//if it is zero than set it to null
else{
  $overall_percent = 0;//is set to null
} 
//  $overall_grade = check_grade(ceil(($overall_total *100)/ $overall_max_marks));
 $overall_grade = check_grade(ceil(($overall_percent)));
    if(sizeof($sem2)> 0)
        {
echo"<tr><td class = 'td_class' colspan='$sem2_m'></td><td class = 'td_class'>".$overall_total."</td><td class = 'td_class'>". $overall_percent.'%' ."</td><td class='td_class'>. $overall_grade.</td></tr>";
        }
echo "</table>";      
echo "<br> <br>";
?>
</div>

<!-- Second tabel for printing grade subjects -->
<table border="1" cellpadding="6" style="width:96%; border:2px; border-style: solid; border-collapse:collapse;font-size:70%;margin:1% 2%;">
    <thead>
    <th class="th_class">Co-Scholastic Areas:Term-I[on a 3 point [A C] grading scale]</th>
    <th class="th_class">Grade <?php  ?></th>
    <th class="th_class">Co-Scholastic Areas:Term-I[on a 3 point [A C] grading scale]</th>
    <th class="th_class">Grade <?php  ?></th>
    </thead>
    <tr>
    <td class="td_class">Work Education (on Pre vocational Education)</td>
    <td class="td_class"></td>
    <td class="td_class">Work Education (on Pre vocational Education)</td>
    <td class="td_class"></td>
    </tr>
    <tr>
    <td class="td_class">Art Education</td>
    <td class="td_class"></td>
    <td class="td_class">Art Education</td>
    <td class="td_class"></td>
    </tr>
    <tr>
    <td class="td_class">Health and Physical Education</td>
    <td class="td_class"></td>
    <td class="td_class">Health and Physical Education</td>
    <td class="td_class"></td>
    </tr>
</table>

<!-- Third table for printing discipline grade  -->
<table border="1" cellpadding="6" style="width:96%; border:2px; border-style: solid; border-collapse:collapse;font-size:70%;margin:1% 2%;">
    <thead>
    <th class="th_class"></th>        <th class="th_class">Grade  </th>
    <th class="th_class"></th>        <th class="th_class">Grade  </th>
    </thead>
    <tr>
    <td class="td_class">Discipline:Term-I[on a 3 point [A C] grading scale]</td>
    <td class="td_class"></td>
    <td class="td_class">Discipline:Term-I[on a 3 point [A C] grading scale]</td>
    <td class="td_class"></td>
    </tr>
</table>


<br> <br>
<p class="div-input1">Class Teacher's Remarks ________________________</p><br><br>

<div>
    <span style="width:20%;float:left;font-size:0.9em;">Date</span>
    <span style="width:40%;font-size:0.9em;">Signature of Class Teacher</span>
    <span  style="width:40%;float:right;font-size:0.9em;"> Signature of Principal</span>
</div>

<br><hr style="border:1px solid black;">
<center><span style="font-size:1em;font-weight:400;">Instructions</span></center><br>
<p class="div-input1" style="font-size:0.8em;"><b>Grading scale for scholastic areas</b>: Grades are awarded ona 8-point grading scale as follows</p><br>

<!-- Table for grading scheme -->
<table border="1" cellpadding="6" style=" width:auto; line-height:2px;  border-style: solid;  border-collapse:collapse; font-size:70%;">
<thead style="text-align:center;">
<th>MARKS RANGE</th>
<th>GRADE</th>
</thead>
<tr style="text-align:center;"> <td>91-100</td> <td>A1</td> </tr>
<tr style="text-align:center;"> <td>81-90</td>  <td>A2</td> </tr>
<tr style="text-align:center;"> <td>71-80</td>  <td>B1</td> </tr>
<tr style="text-align:center;"> <td>61-70</td>  <td>B2</td> </tr>
<tr style="text-align:center;"> <td>51-60</td>  <td>C1</td> </tr>
<tr style="text-align:center;"> <td>41-50</td>  <td>C2</td> </tr>
<tr style="text-align:center;"> <td>33-40</td>  <td>D</td> </tr>
<tr style="text-align:center;"> <td>32 & BELOW</td> <td>E(Needs Improvement)</td> </tr>
</table>
</div>
</section>

<!--end-->

