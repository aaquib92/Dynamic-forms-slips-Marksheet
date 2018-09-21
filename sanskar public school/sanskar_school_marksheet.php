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

$subject_ids_opt = [];
foreach ($global_arr['student_selected_subjects'] as $k1 => $v1) {

$subject_ids_opt[$v1['id']]= $v1['optional'];

}

// code for regular and optional heading

$heading_regular = [];
$heading_optional = [];

foreach ($array_data['data'] as $k5 => $v5)
{
if(empty($heading_regular) && $v5['optional'] == 0)
{
foreach ($v5['exam'] as $k6 => $v6)
{
$heading_regular[$v6['exam_name']]['total_marks']       = $v6['total_marks'];
$heading_regular[$v6['exam_name']]['passing_marks']     = $v6['passing_marks'];
}
}
if(empty($heading_optional) && $v5['optional'] == 1)
{
foreach ($v5['exam'] as $k6 => $v6)
{
$heading_optional[$v6['exam_name']]['total_marks']       = $v6['total_marks'];
$heading_optional[$v6['exam_name']]['passing_marks']     = $v6['passing_marks'];
}
}
}


// end


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
foreach ($array_data['data'][$key1]['exam'] as $key9 => $row9) {
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
                   {

                         $month = $all_exam['month'];

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

?>
<?php

$gr_arr = ['E','D','C2','C1','B2','B1','A2','A1'];

function check_grade($makrs){
$grade ;
if($makrs <= 32){
$grade = 'E';
return $grade;
}
elseif($makrs >= 33 && $makrs <= 40)
{
$grade = 'D';
return $grade;
}

elseif($makrs >= 41 && $makrs <= 50)
{
$grade = 'C-2';
return $grade;

}
elseif($makrs >= 51 && $makrs <= 60)
{
$grade = 'C-1';
return $grade;

} elseif($makrs >= 61 && $makrs <= 70)
{
$grade = 'B-2';
return $grade;

}
elseif($makrs >= 71 && $makrs <= 80)
{
$grade = 'B-1';
return $grade;

} elseif($makrs >= 81 && $makrs <= 90)
{
$grade = 'A-2';
return $grade;

}
elseif($makrs >= 91 && $makrs <= 100)
{
$grade = 'A-1';
return $grade;

}
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
margin:0 auto;float:left; padding-left:3%;font-size:0.7em;
}
.slip-input1 {
min-width: 100px;
border-bottom: 1px solid black;
display: inline-block;
}
@page {
size: Portrait;
margin:2%;
}

@media print
{
span{border:none}
* {-webkit-print-color-adjust:exact;}

}
</style>
<!--main div-->
<div class="marksheet-div">
<!--header-->
<div class="head-div">
<img class="left" width="100" height="80"  src="<?=base_url()?>/assets/24//images/sanskar_school.png" >
<img class="right" width="100" height="80" src="<?php echo $stud_school_logo ; ?>" >
<center>
<b style="padding-top:2% font-weight:700;"><?php echo $stud_school_name ;?></b><br>
<span style="font-size:0.8em;">AFFILLIATED TO C.B.S.E</span><br>
<span style="font-size:0.8em;">AFFILIATION NO:2132432</span>
</center>
</div><br><br>
<hr style="border:2px solid black;">

<center>
<span style="">ACADEMIC SESSION: <?php echo $academic_year;?></span><br>
<span style="">REPORT CARD FOR CLASS:-<?php echo $stud_class ;?> </span>
</center>
<br>
<div style="text-align:left;float:left;width:97%;padding-left:3%; font-size:0.7em;">Roll No ;&emsp; <span class="slip-input1"><?php echo $stud_roll ;?> &emsp;&emsp;&emsp; </span></div><br>
<p class="div-input1">Student's Name' &emsp; <span class="slip-input1"><?php echo $stud_name ;?></span> </p><br>
<p class="div-input1">(Mother's/Father's' Name) &emsp; <span class="slip-input1"><b>Mr.&nbsp;</b><?php echo $parent_name ;?></span> </p><br>
<p class="div-input1">Date of Birth &emsp;<span class="slip-input1"><?php echo $dob ;?></span> </p><br><br>


<table border ="1" cellpadding="4" style="width:90%;   border-style: solid; border-collapse:collapse;font-size:70%;">
<thead>
<tr>
<th>Scholastic Areas</th>
<th colspan ="6">Term-I (100 Marks)</th>
</tr>
<th>Subject Name</th>
<?php foreach($heading_regular as $k7 => $v7):?>
<th><?php echo $k7; ?> (<?php echo $v7['total_marks']; ?>)</th>
<?php endforeach;?>

<th>Marks Obtained (100)</th>
<th>Grade</th>
</thead>
<?php $grand_total = 0;$grand_total_out_of = 0;?>

<?php foreach($array_data['data'] as $all_subject):?>
<?php if($subject_ids_opt[$all_subject['subject_id']]== 0){?>

<tr>
<td><?php echo $all_subject['subject_name']; ?></td>

<?php $total_marks = 0;$total_full_marks = 0;?>

<?php foreach($all_subject['exam'] as $v):?>

<?php $v['marks_obtained']  =(isset($v['marks_obtained']) ? $v['marks_obtained'] : 0 ) ; ?>
<?php $total_marks += $v['marks_obtained'] ; ?></td>
<?php $v['total_marks']  =(isset($v['total_marks']) ? $v['total_marks'] : 0 ) ; ?>
<?php $total_full_marks += (isset($v['total_marks']) ? $v['total_marks'] : 0 ) ; ?></td>

<td><?php echo $v['marks_obtained']; ?></td>

<?php endforeach;?>

<td><?php echo round((($total_marks / $total_full_marks) * 100),2) ?></td>
<td><?php echo check_grade((($total_marks / $total_full_marks) * 100)) ?></td>
<?php $grand_total +=$total_marks;?>
<?php $grand_total_out_of +=$total_full_marks;?>

</tr>
<?php }?>

<?php endforeach;?>

</table><br>



<table border ="1" cellpadding="6" style="width:90%; border-style: solid; border-collapse:collapse;font-size:70%;">
<thead>
<tr>
<th>Co-Scholastic Areas:Term-I[on a 3 point [A C] grading scale]</th>
<th colspan = "6">Grade</th>
</tr>
</thead>
<?php $grand_total = 0;$grand_total_out_of = 0;?>

<?php foreach($array_data['data'] as $all_subject):?>
<?php if($subject_ids_opt[$all_subject['subject_id']]== 1){?>
<tr>
<td><?php echo $all_subject['subject_name']; ?></td>
<?php $total_marks = 0;$total_full_marks = 0;?>

<?php foreach($all_subject['exam'] as $v):?>

<?php $v['marks_obtained']  =(isset($v['marks_obtained']) ? $v['marks_obtained'] : 0 ) ; ?>
<?php $total_marks += $v['marks_obtained'] ; ?></td>
<?php $v['total_marks']  =(isset($v['total_marks']) ? $v['total_marks'] : 0 ) ; ?>
<?php $total_full_marks += (isset($v['total_marks']) ? $v['total_marks'] : 0 ) ; ?></td>

<?php endforeach;?>

<td><?php echo check_grade((($total_marks / $total_full_marks) * 100)) ?></td>
<?php $grand_total +=$total_marks;?>
<?php $grand_total_out_of +=$total_full_marks;?>

</tr>
<?php }?>

<?php endforeach;?>
</table><br>

<p class="div-input1">Class Teacher's Remarks ________________________</p><br><br>

<div>
<span style="width:20%;float:left;font-size:0.9em;">Date</span>
<span style="width:40%;font-size:0.9em;">Signature of Class Teacher</span>
<span  style="width:40%;float:right;font-size:0.9em;"> Signature of Principal</span>
</div>
<br><hr style="border:2px solid black;">
<center><span style="font-size:1em;font-weight:400;">Instructions</span></center><br>
<p class="div-input1" style="font-size:0.8em;"><b>Grading scale for scholastic areas</b>: Grades are awarded ona 8-point grading scale as follows</p><br>
<table border ="1" cellpadding="6" style="width:60%;   border-style: solid;  border-collapse:collapse; font-size:70%;text-align:center;">
<thead>
<th>MARKS RANGE</th>
<th>GRADE</th>
</thead>
<tr>
<td>91-100</td>
<td>A-1</td>
</tr>
<tr>
<td>81-90</td>
<td>A-2</td>
</tr>
<tr>
<td>71-80</td>
<td>B-1</td>
</tr>
<tr>
<td>61-70</td>
<td>B-2</td>
</tr>
<tr>
<td>51-60</td>
<td>C-1</td>
</tr>
<tr>
<td>41-50</td>
<td>C-2</td>
</tr>
<tr>
<td>33-40</td>
<td>D</td>
</tr>
<tr>
<td>32 & BELOW</td>
<td>E(Needs Improvement)</td>
</tr>
</table>
</div>
</section>

<!--end-->