<?php 
$global_arr = array();
$academic_year = "";
$id = "";
$exam_title = "";

//  $session_data = $this->session->all_userdata();

//print_r(get_session_data()['pay_slip_data']);die();
$student_array_data = unserialize(base64_decode(get_session_data()['class_report']));


$this->session->unset_userdata('class_report');

$global_arr = get_student_by_id($student_array_data[0]['id']);

$stud_school_name = get_session_data()['profile']['partner_name'];
$month = 0;
$year = 0;
foreach($student_array_data[0]['exam_info']['exams'] as $key => $all_exam)
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

?>
<style>
table, thead, td, th, tr {
border-collapse: collapse;
    text-align: center;
    font-size:94%;
}

tbody,thead, td, th, tr
{
border: solid 2px lightgrey;
}

.class_report_div { max-width:100%; overflow: auto;background : white; }
</style>
<section style="margin-top:40px;text-align:center;" onload="setTimeout(myFunction(), 3000)">
<div class="class_report_div" style="padding: 10px;border-top-width: 1px;border-right-width: 1px; border: 1px solid black;background : white;">
<center> <?php echo $stud_school_name;?> </center>

    <span> Consolidated Result Of
        <?php echo (isset($global_arr['student_selected_class'][0]['standard']) && !empty($global_arr['student_selected_class'][0]['standard']))?''.$global_arr['student_selected_class'][0]['standard'].' ':'';?>
        <?php echo (isset($global_arr['student_selected_class'][0]['section']) && !empty($global_arr['student_selected_class'][0]['section']))?''.$global_arr['student_selected_class'][0]['section'].' ':'';?>
        <?php echo $exam_title;?> Examination Held In <?php echo $month_arr[$month];?>-<?php echo $year;?>
    </span>
<br>

<table style="width:100%; border:1px solid black; border:1" border="1px">

    <?php
        $array_data = $student_array_data[0]['exam_info'];
    ?>
<?php
  foreach($student_array_data as $k => $v)       
    {
      
    foreach($v['exam_info']['data'] as $key => $marks)     
        {
               $onesubject_total_marks=0;
           
             foreach ($marks['exam'] as $k1 => $v1){
                   $v1['total_marks'] = (($v1['total_marks']) =='-') ? 0 : $v1['total_marks'];
                  $onesubject_total_marks += $v1['total_marks'];
            //    echo print_array($v1); die();
             }
                
        }

    }
     
    

//echo print_array( $array_data); die();
    // Displaying all headers
    echo '<th>' . "Sr. No." . '</th>';
echo '<th>' . "Roll No." . '</th>';
echo '<th>' . "Name of the Student" . '</th>';
    foreach($array_data['data'] as $key => $value)
 
    {echo '<th>' . $value['subject_name'] . '<br> '.   $onesubject_total_marks . ' </th>';}
echo '<th>' . 'Grand Total' . '</th>';
echo '<th>' . '%' . '</th>';
echo '<th>'. 'No. of passing subjects' .'</th>';
    echo '<th>'. 'Remarks' .'</th>';


    //Displaying student names and marks
    $sr_no = 1;
    // for($i=0; $i<count($student_array_data);$i++)
    foreach($student_array_data as $k => $v)       
    {
        echo '<tr>';

        $grand_total = 0;
        echo '<td>'. $sr_no . '</td>';
        $sr_no++;
        echo '<td>'. $v['rollno'].'</td>';
        echo '<td>'. $v['last_name']. ' '.
                    $v['first_name']. ' '.
                    $v['middle_name'].'</td>';
                   
        $i=0;

            $max_marks=0;
            $no_of_passing_subjects=0;
            $no_of_subjects=0;
            foreach($v['exam_info']['data'] as $key => $marks)     
        {
           // echo print_array($marks); die();
            $total_obtained_marks=0;
            $total_passing =0;
            $onesubject_total_marks=0;
           
           
            foreach ($marks['exam'] as $k1 => $v1)
      //   echo print_array($v1); die();
            {

                $v1['marks_obtained'] = (($v1['marks_obtained']) =='-') ? 0 : $v1['marks_obtained'];
                $total_obtained_marks += $v1['marks_obtained'];

                $v1['passing_marks'] = (($v1['passing_marks']) =='-') ? 0 : $v1['passing_marks'];
                $total_passing += $v1['passing_marks'];

                $v1['total_marks'] = (($v1['total_marks']) =='-') ? 0 : $v1['total_marks'];
                $onesubject_total_marks += $v1['total_marks'];
               
            }

            $no_of_subjects++;

            if($total_obtained_marks >= $total_passing)
            {
                $no_of_passing_subjects++;
            }
           
            if($total_obtained_marks < $total_passing)
            {echo "<td style='background-color:lightgrey'>" .$total_obtained_marks. '</td>';}   // marks obtained in one subject including all exams
            else
            {echo '<td>' .$total_obtained_marks. '</td>';}
            $grand_total += $total_obtained_marks;          // adding marks obtained by student  of all subjects
            $max_marks += $onesubject_total_marks;          // adding total_marks of all subjects
        }

            echo '<td>' .$grand_total. '</td>';                 // total marks obtained in all subjects
            $percent = round((($grand_total*100) / $max_marks),2) ;
            echo '<td>' .$percent . '</td>';
            if($no_of_subjects == $no_of_passing_subjects)
            {echo '<td>' .$no_of_subjects . '</td>';}
            else{
            echo '<td>' .$no_of_passing_subjects. '</td>';
            }
            echo '<td>' .' '. '</td>';
               
            echo '</tr>';
    }

?>


<?php //echo print_array($v); die();?>
</table>
</div>
</section>
<footer class="page-break"></footer>
