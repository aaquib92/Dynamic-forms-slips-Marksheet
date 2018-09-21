<?php 

$global_arr = array();
$attendance=array();
$academic_year = "";
$id = "";
$std_check=array(9,10);
if( isset($data['student_id']))
{
$id = $data['student_id'];
$global_arr = get_student_by_id($id);
$attendance = get_monthly_stud_att_school($id);
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
if(in_array($stud_class,$std_check))        //It checks if selected class is 9th or 10th, since there are 2 different marksheets
                                            //first one in the if-loop is for 9th n 10th std   Click here to see second marksheet ->> 2nd
{
    $month = 0;
    $year = 0;

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
    
        if (in_array($all_exam['id'], $datas))
        {

        }
        else
        {
        $array_data['data'][$key1]['exam'][$temp_key+1] = array(
        'exam_id' => $all_exam['id'],
        'exam_name' => $all_exam['name'],
        'marks_obtained' => 0,
        'total_marks' => 0
        );
        foreach ($array_data['data'][$key1]['exam'] as $key9 => $row9) {
        $exam_id_temp[$key9]  = $row9['exam_id'];
        }
        array_multisort($exam_id_temp, SORT_ASC, $array_data['data'][$key1]['exam']);
        $exam_id_temp = [];
        }
        }
    }

    foreach($array_data['exams'] as $key => $all_exam)  //loop to calculate academic year of the exams
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

    function check_grade($marks)
    {
        $grade ;
        if($marks <= 35)                        {$grade = 'D';   return $grade; }
        elseif($marks >= 35 && $marks <= 44)    {$grade = 'C';   return $grade; }
        elseif($marks >= 45 && $marks <= 59)    {$grade = 'B';     return $grade; }
        elseif($marks >= 60)    {$grade = 'A';   return $grade; }
    }
    ?>


    <section onload="setTimeout(myFunction(), 3000)">
    <style>
        .marksheet-div{width:95%; height:auto; display:inline-block; }

        .left{float:left; padding-top:1%; padding-left:3%;}

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
        size: Landscape;
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
        *{-webkit-print-color-adjust:exact;}
        }

        td
        {
        text-align: center;
        vertical-align:center;
        border: 1px solid black;
        font-size:14px;
        }
        th
        {

        vertical-align:center;
        border: 1px solid black;

        }
    </style>


    <?php
    //calculating total attendance
    $count_months=6;
    $days_present=0;
    $total_days=0;
    foreach($attendance['data']['report_data'] as $att_key => $att_value)
    {
        while($count_months<12)
        {
         $total_days+=$att_value['status'][$count_months]['total_count'];
         $present = $att_value['status'][$count_months]['total_count'] - $att_value['status'][$count_months]['absent_count'];
         $days_present+=$present;
         $count_months++;
        }
    }
    ?>
    <div class="marksheet-div" style="padding:2%;">
        <div id="header_block" style="display:flex;">
            <div id="school_logo" style="width:15%">
            <img width="100px" height="100px" src="<?php echo $stud_school_logo; ?>">
            </div>
            <div id="school_name" style="width:85%;">
            <center>
            <span style="font-size:1.4em;font-weight:700;"><?php echo $stud_school_name; ?></span><br>
            <span style="font-size:1em;font-weight:300;"><?php echo $stud_school_addr; ?> </span><br><br>
            <span style="font-size:1.4em;font-weight:300; border:1px">PROGRESS REPORT </span><br><br>
            </center>
            </div>
        </div>
    <div style="padding:5px">
    <table style="border:1px solid black; width:95%; border-collapse:collapse; line-height:20px;";>
    <th style="padding-left:15px;">STUDENT'S NAME </th>
    <th style="text-align: center;">STD</th>
    <th style="text-align: center;">DIV</th>
    <th style="text-align: center;">G.R. NO.</th>
    <th style="text-align: center;">ROLL NO.</th>
    <th style="text-align: center;">DATE OF BIRTH</th>
    <th style="text-align: center;">YEAR</th>
    <tr>
    <td><?php echo '<span style="float:left; padding-left:10px;">'. $stud_name .'</span>'; ?> </td>
    <td><?php echo $stud_std; ?></td>
    <td><?php echo $stud_div; ?></td>
    <td><?php echo $gr_number; ?></td>
    <td><?php echo $stud_roll; ?></td>
    <td><?php echo $stud_dob; ?></td>
    <td><?php echo $academic_year; ?></td>
    </tr>
    <tr>
    <td colspan="7" style="border-bottom:none;"> <span style="float:left; padding-left:10px;">ATTENDANCE :  <?php echo $days_present." /".$total_days ?></span> </td>
    </tr>
    </table>
    <table style="border:1px solid black; width:95%; border-collapse:collapse; line-height:20px;";>
    <tr>
    <td> SUBJECTS </td>
    <td colspan ="10";> Semester - I</td>
    </tr>
    <tr>
    <td>Exam Name</td>
    <?php
    $no_exams=0;
    foreach($array_data['exams'] as $k1 => $v1)
    {
    echo "<td colspan ='2'>". $v1['name']. "</td>";
    $no_exams++;
    }
    ?>
    <td colspan="2">Total</td>
    </tr>
    <tr>
    <td>Marks</td>
    <?php
    for($j=1; $j<= $no_exams+1; $j++)
    {
    echo "<td>" . "Max" . "</td>";
    echo "<td>" . "Obt" . "</td>";
    }
    ?>
    </tr>
    <?php
    $temp = $array_data['data'];
    $temp2 = [];

    foreach ($array_data['data'] as $k5 => $v5)             //loop to add marks of 2 subjects for eg: Maths 1 + Maths 2, Hist + Geog
    {
            if(strpos($v5['subject_name'],'1',0))
            {
            $strsize = strlen($v5['subject_name']) - (strlen($v5['subject_name']) - (strpos($v5['subject_name'],'1',0) - 1));
            $tester = trim(substr($v5['subject_name'],0,$strsize));
            foreach ($array_data['data'] as $k6 => $v6)
            {
            if(($tester == substr($v6['subject_name'],0,$strsize)) && ($v6['subject_name'] != $v5['subject_name']))
            {
            $temp3 = $v6;
            $temp3['subject_name'] = $tester.' Total';
            $temp3['combined'] = '1';      
            foreach ($v6['exam'] as $k7 => $v7)
            {
            !(isset($v6['exam'][$k7]['total_marks'])) ? $v6['exam'][$k7]['total_marks'] = 0 : FALSE;
            !(isset($v6['exam'][$k7]['passing_marks'])) ? $v6['exam'][$k7]['passing_marks'] = 0 : FALSE;
            !(isset($v6['exam'][$k7]['marks_obtained'])) ? $v6['exam'][$k7]['marks_obtained'] = 0 : FALSE;

            !(isset($v5['exam'][$k7]['total_marks'])) ? $v5['exam'][$k7]['total_marks'] = 0 : FALSE;
            !(isset($v5['exam'][$k7]['passing_marks'])) ? $v5['exam'][$k7]['passing_marks'] = 0 : FALSE;
            !(isset($v5['exam'][$k7]['marks_obtained'])) ? $v5['exam'][$k7]['marks_obtained'] = 0 : FALSE;

            $temp3['exam'][$k7]['total_marks'] = $v5['exam'][$k7]['total_marks'] + $v6['exam'][$k7]['total_marks'];
            $temp3['exam'][$k7]['passing_marks'] = $v5['exam'][$k7]['passing_marks'] + $v6['exam'][$k7]['passing_marks'];
            $temp3['exam'][$k7]['marks_obtained'] = $v5['exam'][$k7]['marks_obtained'] + $v6['exam'][$k7]['marks_obtained'];
            }
            $temp2[] = $v5;
            $temp2[] = $temp3;
            }
            }
            }
        elseif(trim(strtolower($v5['subject_name']))=="history")
        {
            foreach ($array_data['data'] as $k6 => $v6)
            {
            if(strtolower($v6['subject_name']) == 'geography')
            {
            $temp3 = $v6;
            $temp3['subject_name'] = 'SS Total';
            $temp3['combined'] = '1';

            foreach ($v6['exam'] as $k7 => $v7)
            {
            !(isset($v6['exam'][$k7]['total_marks'])) ? $v6['exam'][$k7]['total_marks'] = 0 : FALSE;
            !(isset($v6['exam'][$k7]['passing_marks'])) ? $v6['exam'][$k7]['passing_marks'] = 0 : FALSE;
            !(isset($v6['exam'][$k7]['marks_obtained'])) ? $v6['exam'][$k7]['marks_obtained'] = 0 : FALSE;

            !(isset($v5['exam'][$k7]['total_marks'])) ? $v5['exam'][$k7]['total_marks'] = 0 : FALSE;
            !(isset($v5['exam'][$k7]['passing_marks'])) ? $v5['exam'][$k7]['passing_marks'] = 0 : FALSE;
            !(isset($v5['exam'][$k7]['marks_obtained'])) ? $v5['exam'][$k7]['marks_obtained'] = 0 : FALSE;

            $temp3['exam'][$k7]['total_marks'] = $v5['exam'][$k7]['total_marks'] + $v6['exam'][$k7]['total_marks'];
            $temp3['exam'][$k7]['passing_marks'] = $v5['exam'][$k7]['passing_marks'] + $v6['exam'][$k7]['passing_marks'];
            $temp3['exam'][$k7]['marks_obtained'] = $v5['exam'][$k7]['marks_obtained'] + $v6['exam'][$k7]['marks_obtained'];
            }
            $temp2[] = $v5;
            $temp2[] = $temp3;
            }
            }
        }
    else
    {
    $temp2[] = $v5;
    }
    }
    $temp5=$temp2;


    $sorted_arr = [];               // to sort the array according to subject names & sequence given by school
    $grade_subs_arr=[];
    $raubs_rsequenc = ['english','marathi','hindi','maths_1','maths_2','maths','maths_total','e.v.s.','e.v.s._2',
    'science_1','science_2','science','science_total','social_studies','history','geography','ss','ss_total',
    'sst','s.s.t.','drawing'];

    //----------------------SEM CHECK----------------
//$exam_sems = array_unique(array_column($array_data['exams'],'sem'));
//----------------------REMOVING 2ND TERM SUBJECTS----------------
//!(in_array('2',$exam_sems)) ? $raubs_rsequenc = array_diff($raubs_rsequenc, array('ict','s.d.','s.g.','s.v.','rsp','r.s.p.')) : FALSE;


    foreach ($raubs_rsequenc as $k6 => $v6)
    {
        foreach ($temp2 as $k5 => $v5)
        {
            $arr_subj = str_replace(' ','_',(strtolower(trim($v5['subject_name']))));
            if($v6 ==$arr_subj)         //checking if the subject name in the sequence $raubs_rsequenc matches subject name in the array.
            {
                $sorted_arr[] = $v5;
            }
        }
    }
    $temp2 = [];
    $temp2 = $sorted_arr;

$grade_subjects=['computer','w.e.','computer_and_w.e.','p.t.','ict','s.d.','s.g.','s.v.k.','rsp','r.s.p.'];
    foreach ($grade_subjects as $grd_k => $grd_v)   //grading subjects
    {
        foreach ($temp5 as $key_temp5 => $v_temp5)
        {
            $arr_subj = str_replace(' ','_',(strtolower(trim($v_temp5['subject_name']))));
            if($grd_v ==$arr_subj)         //checking if the subject name in the sequence $raubs_rsequenc matches subject name in the array.
            {
                $grade_subs_arr[] = $v_temp5;
            }
        }
    }
    $temp5 = [];
    $temp5 = $grade_subs_arr;

 

    $duplicate = array();
    $total_max_marks=0;
    $total_obtained_marks=0;
    $grand_max_marks =0;
    $grand_obt_marks=0;

    $grand_marks_arr = [];
    $grand_marks_arr[] ='TOTAL';


    foreach ($temp2 as $k5 => $subj_row)                            //loop to print subject names
    {
        $subj_max_tot = 0;
        $subj_obt_tot = 0;
        $subj_passing_tot = 0;


        foreach ($subj_row['exam'] as $key => $value) {
            $subj_max_tot += $single_exam['total_marks'];
            $subj_obt_tot += $single_exam['marks_obtained'];
            $subj_passing_tot += $single_exam['passing_marks'];
        }

        $row_clr =  ( $subj_obt_tot > $subj_passing_tot) ? ('style="background-color: lightgrey;"') : '';


        if(isset($subj_row['combined']))
        {

            echo "<tr ".$row_clr."><td> <b>".$subj_row['subject_name']."</b></td>";
        }
        else
        {
            echo "<tr ".$row_clr."><td>".$subj_row['subject_name']."</td>";
        }


   $subj_max_tot = 0;
        $subj_obt_tot = 0;
        foreach ($subj_row['exam'] as $k7 => $single_exam) 
        {            //loop to print marks and add total marks
            if(isset($subj_row['combined']))
            {
            echo "<td><b>".$single_exam['total_marks']."</b></td><td><b>".$single_exam['marks_obtained']."</b></td>";
            }
            else
            {
            echo "<td>".$single_exam['total_marks']."</td><td>".$single_exam['marks_obtained']."</td>";
            }
            $subj_max_tot += $single_exam['total_marks'];
            $subj_obt_tot += $single_exam['marks_obtained'];
       
            if(!isset($subj_row['combined']))
            {
            $t1 = $single_exam['exam_id'].'max';
            $t2 = $single_exam['exam_id'].'obt';
                   
            isset($grand_marks_arr[$t1]) ? $grand_marks_arr[$t1] += $single_exam['total_marks'] : $grand_marks_arr[$t1] = $single_exam['total_marks'];
            isset($grand_marks_arr[$t2]) ? $grand_marks_arr[$t2] += $single_exam['marks_obtained'] : $grand_marks_arr[$t2] = $single_exam['marks_obtained'];
            }
        }

        if(isset($subj_row['combined']))
        {
        echo "<td> <b>".$subj_max_tot."</b></td><td><b>".$subj_obt_tot."</b></td></tr>";
        }
        else
        {
        echo "<td> ".$subj_max_tot."</td><td>".$subj_obt_tot."</td></tr>";
        }










        //        $subj_max_tot = 0;
        // $subj_obt_tot = 0;
        // $subj_passing_tot = 0;

        // foreach ($subj_row['exam'] as $k7 => $single_exam) 
        // {            //loop to print marks and add total marks
        //     if(isset($subj_row['combined']))
        //     {
        //     echo "<td><b>".$single_exam['total_marks']."</b></td><td><b>".$single_exam['marks_obtained']."</b></td>";
        //     }
        //     else
        //     {
        //     echo "<td>".$single_exam['total_marks']."</td><td>".$single_exam['marks_obtained']."</td>";
        //     }

       
        //     if(!isset($subj_row['combined']))
        //     {
        //     $t1 = $single_exam['exam_id'].'max';
        //     $t2 = $single_exam['exam_id'].'obt';
                   
        //     isset($grand_marks_arr[$t1]) ? $grand_marks_arr[$t1] += $single_exam['total_marks'] : $grand_marks_arr[$t1] = $single_exam['total_marks'];
        //     isset($grand_marks_arr[$t2]) ? $grand_marks_arr[$t2] += $single_exam['marks_obtained'] : $grand_marks_arr[$t2] = $single_exam['marks_obtained'];
        //     }
        // }

        // if(isset($subj_row['combined']))
        // {
        // isset($grand_marks_arr['total.max']) ? $grand_marks_arr['total.max'] += $subj_max_tot : $grand_marks_arr['total.max'] = $subj_max_tot;
        // isset($grand_marks_arr['total.obt']) ? $grand_marks_arr['total.obt'] += $subj_obt_tot : $grand_marks_arr['total.obt'] = $subj_obt_tot;

        // echo "<td> <b>".$subj_max_tot."</b></td><td><b>".$subj_obt_tot."</b></td></tr>";
        // }
        // else
        // {
        // echo "<td> ".$subj_max_tot."</td><td>".$subj_obt_tot."</td></tr>";
        // }
       
















       
        // if(!isset($subj_row['combined']))
        // {
        // }
    }


    //------------printing subjects which have grades ( refer --> $temp5)

    $grd_max_tot=0;
    $grd_obt_tot=0;
    foreach($temp5 as $key_temp6 => $v_temp6)
    {
        echo "<tr><td>".$v_temp6['subject_name']."</td>";

        foreach($v_temp6['exam'] as $grd_marks => $grd_value)
        {
            echo "<td>"."-"."</td><td>"."-"."</td>";
            $grd_max_tot += $grd_value['total_marks'];
            $grd_obt_tot += $grd_value['marks_obtained'];
        }
        $grade_percent= check_grade(ceil(($grd_obt_tot*100)/$grd_max_tot));

        echo "<td>"."-"."</td><td>". $grade_percent. "</td></tr>";
       
    }
    echo "<tr>";
    foreach ($grand_marks_arr as $k9 => $v9) {
    echo "<td><b>".$v9."</b></td>";   
    }
    echo "</tr>";

    ?>
    </table>
   
    <br>
    <div style="width:95%; text-align:left; padding:3px; border:1px solid black; margin:0% 2%; font-size:14px; padding-left:15px;"> Remarks : &emsp; <?php echo $_POST["remark"]; ?> <br> Result : &emsp;</
    <br>
   
    <br>
    <span style="padding-left:83%;padding-bottom:3%;font-size:14px;">
    <img src="https://digimkey.com/dmk//assets/images/idubs_princy_sig.png" width="50px" height="35px"></span>
    <br>
    <span style="font-size:14px;"> School Reopens on:_____________ </span>
    <span style="padding-left:30%; font-size:14px;"> Class Teacher</span>
    <span style="padding-left:5%;font-size:14px;"> A HM's sign</span>
    <span style="padding-left:5%;font-size:14px;"> Head Mistress Sign</span>
    </div>

    </div>
    </section>
    <?php
}


else                                            //2nd marksheet from 5th to 8th std
{ ?>

<?php
$gr_arr = ['E','D','C2','C1','B2','B1','A2','A1'];
function check_grade($marks)
{
    $grade ;
    if($marks <= 20)                        {$grade = 'E-2';   return $grade; }
    elseif($marks >= 21 && $marks <= 32)    {$grade = 'E-1';   return $grade; }
    elseif($marks >= 33 && $marks <= 40)    {$grade = 'D';     return $grade; }
    elseif($marks >= 41 && $marks <= 50)    {$grade = 'C-2';   return $grade; }
    elseif($marks >= 51 && $marks <= 60)    {$grade = 'C-1';   return $grade; }
    elseif($marks >= 61 && $marks <= 70)    {$grade = 'B-2';   return $grade; }
    elseif($marks >= 71 && $marks <= 80)    {$grade = 'B-1';   return $grade; }
    elseif($marks >= 81 && $marks <= 90)    {$grade = 'A-2';   return $grade; }
    elseif($marks >= 91 && $marks <= 100)   {$grade = 'A-1';   return $grade; }
}

?>
<section onload="setTimeout(myFunction(), 3000)">
<style>
    @page {
    size: Landscape;
    margin:0;
    }
   
    @media print
    {
    span{border:none}
    *{-webkit-print-color-adjust:exact;}
    }

    td
    {
    vertical-align:center;
    border: 1px;
    border-style:solid;
    border-color:#000000;
    color:#000000;
    padding-left:1%;
    }
   
</style>

<div style="margin:1%;">  <!-- Marksheet Main Div-->
    <center>
    <table width="96%" style="line-height:38px; border-collapse: collapse;">
    <caption align="top" style="margin-top:30px; border:1px; border-style:solid; border-color:#000000">
       
        <span style="position:absolute; margin-top: 10px; margin-left:-310px;">
            <img width="100 px" height="100 px" src="<?php echo $stud_school_logo; ?>">
        </span>
        <span style="position:relative;">
            <center>
            <h2 style="margin-bottom:5px;"> <?php echo $stud_school_name; ?> </h2>
            <h5 style="margin-top: 5px;margin-bottom: 5px;"> <?php echo $stud_school_addr; ?> </h5>
            <h4 style="margin-top: 5px;margin-bottom: 5px;"> PROGRESS REPORT </h4>
            </center>
        </span>
    </caption>
    <tr>
        <td style="width:28%">STUDENT'S NAME</td>
        <td style="width:12%">STD</td>
        <td style="width:12%">DIV</td>
        <td style="width:12%">G.R.NO.</td>
        <td style="width:12%">ROLL NO.</td>
        <td style="width:12%">D.O.B.</td>
        <td style="width:12%">YEAR</td>
    </tr>    <tr>
        <td style="width:28%"><b><?php echo $stud_name; ?></b></td>
        <td style="width:12%"><b><?php echo $stud_std; ?></b></td>
        <td style="width:12%"><b><?php echo $stud_div; ?></b></td>
        <td style="width:12%"><b><?php echo $gr_number; ?></b></td>
        <td style="width:12%"><b><?php echo $stud_roll; ?></b></td>
        <td style="width:12%"><b><?php echo $stud_dob; ?></b></td>
        <td style="width:12%"><b><?php echo $academic_year; ?></b></td>
    </tr>    <tr>
        <td style="width:28%">Attendance</td>
        <?php
        foreach($attendance['data'] as $att_key => $att_value)
        {}
            foreach($att_value as $v)
        {
         echo "<td style='width:12%'>" . $v. "</td>";
        }
        ?>

    </tr>    <tr>
        <td style="width:28%">Out Of</td>
        <?php
        $count_months=6;            // school starts from june therefore months array is initialized as 6
        foreach($attendance['data']['report_data'] as $att_key => $att_value)       //printing total number of days
        {
        while($count_months<12)
        {
        echo "<td style='width:12%'>" .$att_value['status'][$count_months]['total_count']. "</td>";
        $days_present[] = $att_value['status'][$count_months]['total_count'] - $att_value['status'][$count_months]['absent_count'];
        //calculating number of days present in $days_present array
        $count_months++;
        }
        }
        ?>
    </tr>    <tr>
        <td style="width:28%">No of Days Attended</td>
        <?php
        foreach($days_present as $present)       //printing $days_present                   
        {
            echo "<td style='width:12%'>" .$present. "</td>";
        }

        ?>
    </tr>
</table>
<br>
<table width="96%" style="line-height:38px; border-collapse:collapse;">
    <tr>
        <td> Subject </td>
        <?php
        $sorted_arr = [];           // to sort the array according to subject names & sequence given by school
       
        $raubs_rsequenc = ['english','marathi','hindi','maths_1','maths_2','maths','maths_total','e.v.s.','e.v.s._2',
        'science_1','science_2','science','science_total','social_studies','history','geography','ss','ss_total','sst',
        's.s.t.','drawing','computer','w.e.','computer_and_w.e.','p.t.','ict','s.d.','s.g.','s.v.k.','rsp','r.s.p.'];
        foreach ($raubs_rsequenc as $k6 => $v6)
        {
            foreach ($array_data['data'] as $key => $exam_details)
            {
                $arr_subj = str_replace(' ','_',(strtolower(trim($exam_details['subject_name']))));
                if($v6 == $arr_subj)
                {
                $sorted_arr[] = $exam_details;
                }
            }
        }
        $temp2 = [];
        $temp2 = $sorted_arr;

      
        foreach($temp2 as $key1 => $subject_detail)
        {
        echo "<td style='text-align:center;'>".$subject_detail['subject_name'] .'</td>';
        }
        echo "</tr>";

        echo "<tr>";
        echo "<td>". "I Semester" . "</td>";
        foreach($temp2 as $key2 => $marks2)
        {
        $total_marks_obtained=0;
        $total_max_marks=0;
        $percent=0;
        foreach($marks2['exam'] as $k1 => $m1)
        {
        $m1['marks_obtained']=isset($m1['marks_obtained']) ? $m1['marks_obtained'] : 0;
        $m1['total_marks']=isset($m1['total_marks']) ? $m1['total_marks'] : 0;
        $total_marks_obtained += $m1['marks_obtained'];
        $total_max_marks += $m1['total_marks'];
        }
        $percent= round(($total_marks_obtained/$total_max_marks)*100);
        echo "<td style='text-align:center;'>". check_grade($percent) . '</td>';
        }
        ?>
    </tr>
   
    <tr>
        <td>Special Remarks </td>
        <td colspan="20"><b> <?php echo $_POST["remark"]; ?></b> </td>
    </tr>
    <tr>
        <td>Hobby/Interest </td>
        <td colspan="20"> </td>
    </tr>
    <tr>
        <td>Improvement Required</td>
        <td colspan="20"> </td>
    </tr>
    <tr>
        <td>Result  </td>
        <td colspan="20"><b> </b></td>
    </tr>
    </table>
    </center>
    <br>
   
    <br>
    <div>
    <span style="padding-left:69%;padding-bottom:3%;font-size:14px;">
    <img src="https://digimkey.com/dmk//assets/images/idubs_princy_sig.png" width="50px" height="35px"></span>
    <br>
        <span style="padding-left:5%;"> SCHOOL REOPENS ON : ______________</span>
        <span style="padding-left:5%;"> CLASS TEACHER</span>
        <span style="padding-left:5%;">A H.M's SIGN</span>
        <span style="padding-left:5%;"> HEAD MASTER'S SIGN</span>
    </div>
    </div>  <!-- Marksheet Main Div Ends-->
    </section>
    <?php
} ?>