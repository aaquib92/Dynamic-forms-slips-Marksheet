<pre>
<?php 
$global_arr = array();
$academic_year = "";
$id = "";
$exam_title = "";

$total_max = 0;
$total_min = 0;


  $id = $stud_id;

   $exam_title = $exam_name;

  $global_arr = get_student_by_id($id);

  $custom_fields = [];

//  $session_data = $this->session->all_userdata();

 
            if($global_arr['student_details'][0]['custom_fields'] != null)
            {
            if(sizeof($global_arr['student_details'][0]['custom_fields']) > 0)
                    {
                        
                            $temp = json_decode($global_arr['student_details'][0]['custom_fields']);
                            foreach ($temp as $k3 => $v3) {
                                $global_arr['student_details'][0][$k3] = $v3;
                                $custom_fields[$k3] = $v3;
                            }
                    }
            }

//   echo print_array($global_arr);die();


 $array_data = unserialize(base64_decode(get_session_data()['marksheet']));

 $this->session->unset_userdata('marksheet');

if(date('m')<6)
{
$academic_year = (date('Y')-1)." - ".date('Y');
}
else
{
$academic_year = date('Y')." - ".(date('Y')+1);
}

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
	//  $array_data['all_exam'][$key][]
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
// print_r($array_data['exams']);die();

if($array_data['exams'][0]['sem'] == '1'){
	$sem ='<b>I</b>';
}else{
	$sem ='<b>II</b>';
}


?>   
</pre> 
<!-- saved from url=(0045)file:///D:/DigiMKey/designs/exam%20table.html -->
<section style="text-align:center;" onload="setTimeout(myFunction(), 3000)">
<style>
table {
    border-collapse: collapse;
	table-layout:fixed;
    width: 100%;
	font-size : 80%;
}

tbody,thead, td, th, tr
{
border: solid 2px lightgrey;
}

.break
{
	word-wrap: break-word;white-space:normal;
}

.nowrap
{
	white-space:nowrap;
	width:1%;
}

.marksheet_div { max-width:100%; overflow: auto; }

@page {
      size: landscape;   /* auto is the initial value */
      margin: 5%;
   }
   .left{
	   float:left;
	   text-align:justify;
	   font-size:0.7em;
   }
   .right{
	   float:right;
	   margin-top:4%;
	   font-size:0.7em;
   }
</style>
<div class="marksheet_div" style="padding: 10px;border-top-width: 1px;border-right-width: 1px; border: 1px solid black;">

<table border="1" width="100%">
<caption align="top"> 
	
	<p style="position:absolute;left: 25px;">
		
		<img width="60 px" height="60 px" src="./exam table_files/dmk_tri_logo.png"> 
		<br>
		
		
	</p>
	<span position:relative="">
	<center>
		<h2 style="margin-top: 5px;margin-bottom: 5px;"> STERLING COLLEGE OF ARTS,COMMERCE & SCIENCE </h2>
		<h4 style="margin-top: 5px;margin-bottom: 5px;"> D.G.WALSE PATIL MARG, PLOT NO.-43, SEC-19, NERUL EAST </h4>
		<h4 style="margin-top: 5px;margin-bottom: 5px;"> (Affiliated to University of Mumbai) </h4>
		<br>
		<h4 style="margin-top: 5px;margin-bottom: 5px;"> GRADE CARD </h4>
		</center>
	</span>
</caption>
		
	</table><br>

	<p class ="left">CERTIFICATE SHOWING THE RESULT OF THE CANDIDATE<br>
	Name  : /<?php echo (isset($global_arr['student_details'][0]['first_name']) && !empty($global_arr['student_details'][0]['first_name']))?''.
			$global_arr['student_details'][0]['first_name'].'    '.$global_arr['student_details'][0]['last_name'].'':'';?><br>
			Examination : <?php echo (isset($global_arr['student_selected_class'][0]['standard']) && 
			!empty($global_arr['student_selected_class'][0]['standard']))?''.$global_arr['student_selected_class'][0]['standard'].' ':'';?>
			&emsp;<?php echo (isset($global_arr['student_selected_class'][0]['section']) && !empty($global_arr['student_selected_class']
			[0]['section']))?''.$global_arr['student_selected_class'][0]['section'].' ':'';?> &emsp; SEMESTER <?php echo $sem; ?> HELD IN &nbsp; <?php echo strtoupper($month_arr[$month]);?>-<?php echo $year;?> <br>
			Pattern : CHOICE BASED CREDIT AND GRADING SYSTEM
			</p>
			   <?php
			   echo '-<p class ="right">Seat No :';
             foreach ($custom_fields as $k5 => $v5) {       
                   echo  '' .$v5.' ';
                }
				echo '</p>'
            ?>

	<table  border="1" width="100%">
		
		<tr>
			<td rowspan="2"> Course <br> Code</td>
			<td rowspan="2" colspan="4">  Course Title</td>
			<td rowspan="2"> CP </td>
			<td colspan="<?php echo sizeof($array_data['exams'])+1; ?>"> GRADE </td>
			<td rowspan="2">  Credit <br> Earned <br> (C)</td>
			<td rowspan="2">  Grade <br> Points <br> (G)</td>
			<td rowspan="2"> (C * G)</td>
			
		</tr>
		<tr> 

		 <?php foreach($array_data['exams'] as $all_exam):?>
   <td>  <?php echo $all_exam['name'];
   //$total_max +=$all_exam['total_marks']; $total_min +=$all_exam['passing_marks'];?> </td>
   
      <?php endforeach;?>
		 <td> CRSE </td>

<?php 
$subject_count = 0;
$credit_earned = 0;
$grade_points = 0;
$overall_fail = false;
$total_marks_overall = 0;
$total_marks_exam = 0;
$cg = 0;


		$count_pass = 0;
		$count_fail = 0;
		?>


			<?php foreach($array_data['data'] as $key1 => $subjects):?>
			<tr border="0">
			<?php $fail_flag = false;  ?>
				<td ></td>
     <td colspan="4"><p class="break"><?php echo $subjects['subject_name']; $total_marks = 0;$total_max=0;$subject_count++;?></p></td>
     <td>3</td>
	 <?php foreach($subjects['exam'] as $key2 => $single_exam):?>
     <td align=""><?php
         $grade = "";
     	// $incr_subj = ($single_exam['total_marks'] - $single_exam['passing_marks'])/5;
    if(isset($single_exam['total_marks']) || !empty($single_exam['total_marks'])){

		$F_subj = (float)0.4 * $single_exam['total_marks'];
		$D_subj = (float)0.45 * $single_exam['total_marks'];
		$C_subj = (float)0.5 * $single_exam['total_marks'];
		$B_subj = (float)0.55 * $single_exam['total_marks'];
		$B_plus_subj = (float)0.6 * $single_exam['total_marks'];
		$A_subj = (float)0.7 * $single_exam['total_marks'];
        $A_plus_subj = (float)0.8 * $single_exam['total_marks'];

		$total_max +=  $single_exam['total_marks'];

     if($single_exam['marks_obtained'] != '-')
		 {
             $total_marks +=  $single_exam['marks_obtained'];
		 
         
         switch (true) {
    case $single_exam['marks_obtained'] < $F_subj:
        $grade = 'F';
        break;

    case $single_exam['marks_obtained'] >= $F_subj && $single_exam['marks_obtained'] < $D_subj:
        $grade = 'D';
        break;

    case $single_exam['marks_obtained'] >= $D_subj && $single_exam['marks_obtained'] < $C_subj:
        $grade = 'C';
        break;

	case $single_exam['marks_obtained'] >= $C_subj && $single_exam['marks_obtained'] < $B_subj:
		$grade = 'B';
	break;

	case $single_exam['marks_obtained'] >= $B_subj && $single_exam['marks_obtained'] < $B_plus_subj:
		$grade = 'B+';
	break;

	case $single_exam['marks_obtained'] >= $B_plus_subj && $single_exam['marks_obtained'] < $A_subj:
		$grade = 'A';
	break;

	case $single_exam['marks_obtained'] >= $A_subj && $single_exam['marks_obtained'] < $A_plus_subj:
		$grade = 'A+';
	break;

	case $single_exam['marks_obtained'] >= $A_plus_subj:
		$grade = 'O';
	break;

    default:
        $grade = 'N.A';
        break;
			}
         }
         else
         {
                     $grade = 'F';
         }


		 if($grade == 'F')
		 {
               $fail_flag = true;
		 }
    }
      echo $grade;
	     
	 ?> </td>
	 <?php endforeach;?>
	  <td align="">
		 <?php 
		$F = (float)0.4 * $total_max;
		$D = (float)0.45 * $total_max;
		$C = (float)0.5 * $total_max;
		$B = (float)0.55 * $total_max;
		$B_plus = (float)0.6 * $total_max;
		$A = (float)0.7 * $total_max;
        $A_plus = (float)0.8 * $total_max;

        $total_marks_exam += $total_max;
		 $grade = '';

			switch (true) {
    case $total_marks < $F:
        $grade = 'F';
        break;

    case $total_marks >= $F && $total_marks < $D:
        $grade = 'D';
        break;

    case $total_marks >= $D && $total_marks < $C:
        $grade = 'C';
        break;

	case $total_marks >= $C && $total_marks < $B:
		$grade = 'B';
	break;

	case $total_marks >= $B && $total_marks < $B_plus:
		$grade = 'B+';
	break;

	case $total_marks >= $B_plus && $total_marks < $A:
		$grade = 'A';
	break;

	case $total_marks >= $A && $total_marks < $A_plus:
		$grade = 'A+';
	break;

	case $total_marks >= $A_plus:
		$grade = 'O';
	break;

    default:
        $grade = 'N.A';
        break;
			}

			$total_marks_overall +=  $total_marks;

			if($fail_flag)
			{
                $grade = 'F';
			}

			if($grade != 'F')
			{
				$count_pass++;
			}
			else
			{
				$count_fail++;
			}

			if($grade == 'F')
			{
               $overall_fail = true;
			}

     echo $grade;

		 ?>
		 
		 </td>

		  <td align="">
		  <?php
           if($grade != 'F')
			{
				echo '3';
				$credit_earned += 3;
			}
			else
			{
				echo '0';
			}
            
		  ?>
		  </td>
		 <td align="">
		 
		 <?php 
		 $gp = 0;

			switch ($grade) {
    case 'F':
        $gp = 0;
        break;

    case 'D':
        $gp = 4;
        break;

    case 'C':
        $gp = 5;
		break;

	case 'B':
		$gp = 6;
	break;

	case 'B+':
		$gp = 7;
	break;

	case 'A':
		$gp = 8;
	break;

	case 'A+':
		$gp = 9;
	break;

	case 'O':
		$gp = 10;
	break;

    default:
		$gp = -1;
        break;
			}

     echo $gp;

	 $grade_points += $gp;

		 ?>
		 
		 
		 </td>
		 <td align="">
			
            <?php 
		  if($grade != 'F')
			{
				echo $gp*3;
				$cg += ($gp*3);
			}
			else
			{
				echo '0';
			}

		 ?>
		 </td>
		 
	 <tr>
      <?php endforeach;?> 

	<tr>
	<td colspan ="5"> Total </td> <td> <?php  echo $subject_count*3; ?> </td> 
	 <?php foreach($array_data['exams'] as $all_exam):?>
         <td> </td>
     <?php endforeach;?>
    	 <td> </td>
	    <td><?php echo $credit_earned; ?> </td> <td><?php echo $grade_points; ?></td> <td><?php echo $cg; ?></td>
	</tr>
	
</tbody></table>

<table border="1" width="100%">
	<tr text-align="left" !important> 
		 <td colspan="4"><b>Remark : 
		 <?php
		 if($count_fail>0)
		 {
            echo 'Unsuccessful (ATKT - '.$count_fail.')';
		 }
		 else
		 {
			echo 'Successful';
		 }
		 
		  ?>
		 </b></td>
		 <td colspan="<?php echo sizeof($array_data['exams'])+2; ?>"> 
		 <b>SGPA (&Sigma;CG/&Sigma;C) =  <?php echo number_format(($cg/($subject_count*3)),2,'.',''); ?>
		 </td>
		 <td colspan="3"> Overall Grade: - 
		 <?php

		$F = (float)0.4 * $total_marks_exam;
		$D = (float)0.45 * $total_marks_exam;
		$C = (float)0.5 * $total_marks_exam;
		$B = (float)0.55 * $total_marks_exam;
		$B_plus = (float)0.6 * $total_marks_exam;
		$A = (float)0.7 * $total_marks_exam;
        $A_plus = (float)0.8 * $total_marks_exam;

   $total_marks = $total_marks_overall;

			switch (true) {
    case $total_marks < $F:
        $grade = 'F';
        break;

    case $total_marks >= $F && $total_marks < $D:
        $grade = 'D';
        break;

    case $total_marks >= $D && $total_marks < $C:
        $grade = 'C';
        break;

	case $total_marks >= $C && $total_marks < $B:
		$grade = 'B';
	break;

	case $total_marks >= $B && $total_marks < $B_plus:
		$grade = 'B+';
	break;

	case $total_marks >= $B_plus && $total_marks < $A:
		$grade = 'A';
	break;

	case $total_marks >= $A && $total_marks < $A_plus:
		$grade = 'A+';
	break;

	case $total_marks >= $A_plus:
		$grade = 'O';
	break;

    default:
        $grade = 'N.A';
        break;
			}

			if($overall_fail)
			{
                 $grade = 'F';
			}

     echo $grade;

		 ?>
		 
		 </b></td> 
	</tr>

	
</table>
<br> <br> <br>
<br> <br> 
<table width="100%">
	 <tr> 
		<td><b> Checked By </b> </td>
		<td><b> CHAIRMAN <br> Examination committee </b> </td>
		<td><b>  </b> </td>
		<td><div> PRINCIPAL <br><b style="font-size:0.7em;"> Sterling College of Arts,Commerce & Science <br> Nerul,Navi Mumbai </b>  </div> </td>
	 
	 </tr>
</table>
<tr>
<td style="font-size:0.7em;">ABS = Absent, &nbsp; F = Fail, &nbsp; # = 0.229, &nbsp; @ = 0.5042A/0.5043A/0.5044A, &nbsp;  * = 0.5045A, &nbsp; + = Marks Carried </td>
</tr>
</div>

</section>
<footer class="page-break"></footer>
