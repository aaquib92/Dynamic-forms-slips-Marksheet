<?php
$global_arr = array();
$academic_year = "";
$id = "";
if( isset($data['student_id']))
{
$id = $data['student_id'];
$global_arr = get_student_by_id($id);
$co_scho_res = json_decode(get_students_class_curriculum($id) , true)['data'];
$traits = json_decode(get_stud_traits($id) , true)['traits'];
$promote_to = $data['promote_to'];

// echo print_array(get_stud_traits($id));die;
//echo print_array($global_arr);die();
}

$grades_arr =[
    "A1"=>" It has truly been a pleasure getting to know and work with you this year. 
    You have been consistent and have thorough understanding of the required knowledge and skills, and the ability to apply them almost faultlessly in a wide variety of situations. 
    You have consistently demonstrated originality, insight, analytical thinking and produced work of high quality. 
    I am so proud of all you have accomplished. Keep up the wonderful things you are doing! ",
    "A2"=>" It has truly been a pleasure getting to know and work with you this year. 
    You have been consistent and have thorough understanding of the required knowledge and skills, and the ability to apply them in a wide variety of situations. You have consistently demonstrated originality, insight, and analytical thinking. 
    I am so proud of all you have accomplished. Keep up the wonderful things you are doing! 
    ",
    "B1"=>" It has truly been a pleasure getting to know and work with you this year. 
    You seem to have thorough understanding of the required knowledge and skills, and the ability to apply them in a variety of situations. 
    You have occasionally demonstrated originality, insight and analytical thinking. 
    While you are surely learning and growing, there is always room for improvement and I am confident the next year will witness an improved performance from you. 
    ",
    "B2"=>" It has truly been a pleasure getting to know and work with you this year. 
    You have general understanding of the required knowledge and skills and the ability to apply them effectively in normal situations. There is occasional evidence of analytical thinking. 
    While you are surely learning and growing, there is always room for improvement and I am confident the next year will witness an improved performance from you.  
    ",
    "C1"=>" It has truly been a pleasure getting to know and work with you this year. 
    Inspite of your best efforts, you have had limited achievement against most of the objectives or seem to have clear difficulties in some areas. 
    You seem to demonstrate a limited and basic understanding of the required knowledge and skills and are only able to apply them restrictively to normal situations, but with support. 
    While you are slowly but surely learning and growing, I can hardly wait to see how you improve and impress me during the next year. 
    ",
    "C2"=>" It has truly been a pleasure getting to know and work with you this year. 
    You have very limited achievement in terms of the learning objectives. You seemingly have difficulty in understanding the required knowledge and skills and are unable to apply them fully to normal situations, even with support. 
    While you are slowly but surely learning and growing, I can hardly wait to see how you improve and impress me during the next year. 
    ",
    "D"=>" It has truly been a pleasure getting to know and work with you this year. 
    You, unfortunately have had minimal achievement in terms of the objectives and seem to struggle with understanding the elementary knowledge and skills. 
    ",
    "E1"=>"  It has truly been a pleasure getting to know and work with you this year. 
    You have had limited success in terms of achieving objectives and failed to understand the basic knowledge and skills. 
    You seems to find the rigours of the present academics challenging and would benefit from concerted remediation spread over a period of time. 
    ",
    "E2"=>"It has truly been a pleasure getting to know and work with you this year.
You have had very limited success in terms of achieving objectives and have been failed to understand the basic knowledge and skills. 
You seems to find the rigours of the present academics challenging and need help to increase your effort and motivation. You would benefit from counselling to alter your attitude towards work and self-belief. 
    "];




$academic_year = (date('m') < 6) ?((date('Y')-1)." - ".date('Y')):date('Y')." - ".(date('Y')+1);
$global_arr['student_credentials']['mobile'] = !(isset($global_arr['student_credentials']['mobile']) || empty($global_arr['student_credentials']['mobile'])) ?'':FALSE;
$parent_mobile = !(isset($global_arr['parent_credentials']['parent_mobile']) || empty($global_arr['parent_credentials']['parent_mobile'])) ?'':'';

$global_arr['student_details'][0]['phone'] = (isset($global_arr['student_details'][0]['phone']) && !empty($global_arr['student_details'][0]['phone'])) ?''.$global_arr['student_details'][0]['phone'].'':$global_arr['student_credentials']['mobile'];
$global_arr['parent_details'][0]['phone'] = (isset($global_arr['parent_details'][0]['phone']) && !empty($global_arr['parent_details'][0]['phone'])) ?''.$global_arr['parent_details'][0]['phone'].'':'';
$parent_name = (isset($global_arr['parent_details'][0]['first_name']) && !empty($global_arr['parent_details'][0]['first_name']))?strtoupper(''.$global_arr['parent_details'][0]['first_name'].'  '.$global_arr['parent_details'][0]['last_name'].''):'';

// $stud_name = (isset($global_arr['student_details'][0]['first_name']) && !empty($global_arr['student_details'][0]['first_name']))?strtoupper(''.$global_arr['student_details'][0]['first_name'].'  '.$global_arr['student_details'][0]['last_name'].''):'';
$stud_fname = (isset($global_arr['student_details'][0]['first_name']) && !empty($global_arr['student_details'][0]['first_name']))?strtoupper($global_arr['student_details'][0]['first_name']):'';
$stud_mname = (isset($global_arr['student_details'][0]['middle_name']) && !empty($global_arr['student_details'][0]['middle_name']))?strtoupper($global_arr['student_details'][0]['middle_name']):'';
$stud_lname = (isset($global_arr['student_details'][0]['last_name']) && !empty($global_arr['student_details'][0]['last_name']))?strtoupper($global_arr['student_details'][0]['last_name']):'';

$stud_name = $stud_lname.' '.$stud_fname.' '.$stud_mname;
$stud_nationality = (isset($global_arr['student_details'][0]['nationality']) && !empty($global_arr['student_details'][0]['nationality']))?''.$global_arr['student_details'][0]['nationality'].'':'';
$gr_number = (isset($global_arr['student_details'][0]['gr_number']) && !empty($global_arr['student_details'][0]['gr_number']))?''.$global_arr['student_details'][0]['gr_number'].'':'';
$aadhar_no = (isset($global_arr['student_details'][0]['aadhar_no']) && !empty($global_arr['student_details'][0]['aadhar_no']))?''.$global_arr['student_details'][0]['aadhar_no'].'':'';
$dob = (isset($global_arr['student_details'][0]['dob']) && !empty($global_arr['student_details'][0]['dob']))?''.$global_arr['student_details'][0]['dob'].'':'';
$place_of_birth = (isset($global_arr['student_details'][0]['place_of_birth']) && !empty($global_arr['student_details'][0]['place_of_birth']))?''.$global_arr['student_details'][0]['place_of_birth'].'':'';
$admission_year = (isset($global_arr['student_details'][0]['admission_year']) && !empty($global_arr['student_details'][0]['admission_year']))?''.$global_arr['student_details'][0]['admission_year'].'':'';
$religion = (isset($global_arr['student_details'][0]['religion']) && !empty($global_arr['student_details'][0]['religion']))?''.$global_arr['student_details'][0]['religion'].'':'';
$blood_group = (isset($global_arr['student_details'][0]['blood_group']) && !empty($global_arr['student_details'][0]['blood_group']))?''.$global_arr['student_details'][0]['blood_group'].'':'';
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
$pc_id = $global_arr['student_selected_class'][0]['pc_id'];
// $class_section = ($global_arr['student_selected_class'][0]['rank'] > 80) ? "SECONDARY" : " Marathi PRIMARY";

$section_coordinator = "http://ternavidyalaya.org/media/1176/mm_section_coordinator.jpg";


// if($global_arr['student_selected_class'][0]['rank'] > 80){
//     $class_section =  "SECONDARY";
//     $section_coordinator = "http://ternavidyalaya.org/media/1177/6to8_section_coordinator.jpg";
// }else{
//     $class_section =  "PRIMARY";
//     $section_coordinator = "http://ternavidyalaya.org/media/1169/signatures_6.jpg";
// }


$array_data = unserialize(base64_decode(get_session_data()['marksheet']));

$this->session->unset_userdata('marksheet');

// $gr_arr = ['E','D','C2','C1','B2','B1','A2','A1'];
function check_grade($marks)
{
$grade ;
if($marks <= 20){ $grade = 'E2'; return $grade;   }
elseif($marks >= 21 && $marks <= 32)    {$grade = 'E1'; return $grade; }
elseif($marks >= 33 && $marks <= 40)    {$grade = 'D'; return $grade; }
elseif($marks >= 41 && $marks <= 50)    {$grade = 'C2'; return $grade; }
elseif($marks >= 51 && $marks <= 60)    { $grade = 'C1'; return $grade; }
elseif($marks >= 61 && $marks <= 70)    { $grade = 'B2'; return $grade; }
elseif($marks >= 71 && $marks <= 80)    { $grade = 'B1'; return $grade; }
elseif($marks >= 81 && $marks <= 90)    { $grade = 'A2'; return $grade; }
elseif($marks >= 91 && $marks <= 100)   { $grade = 'A1'; return $grade;  }
}

function check_grade2($marks)
{
$grade ;
if($marks <= 33){ $grade = '5'; return $grade;   }
elseif($marks >= 33 && $marks <= 40)    { $grade = '4'; return $grade; }
elseif($marks >= 41 && $marks <= 60)    { $grade = '3'; return $grade; }
elseif($marks >= 61 && $marks <= 80)    { $grade = '2'; return $grade; }
elseif($marks >= 81 && $marks <= 100)    { $grade = '1'; return $grade; }
}


function calc_percent($obt,$max)
{
    // return $percent = ($obt/$max)* 100;
    $percent =  ($max > 0) ? ($obt/$max)* 100 : 0;
    return $percent ;
}


echo '<section onload="setTimeout(myFunction(), 3000)">';

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
$exam_id_temp[$key9] = $row9['exam_id'];
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

// $actual_names =[
//      'English'          => "English / Marathi",
//      'Hindi'            => "Marathi / Hindi",
//      'Marathi'          => "Hindi / Marathi",
//      'Maths'            => "Mathematics",
//      'EVS'              => "Environment Studies",
//      'Science'          => "Science & Tech.",
//      'social_science'   => "English / Marathi"
// ];


// $addin_subjs =[
//     'english'          => "English / Marathi",
//     'hindi'            => "Marathi / Hindi",
//     'marathi'          => "Hindi / Marathi",
//     'maths'            => "Mathematics",
//     'evs'              => "Environment Studies",
//     'science'          => "Science & Tech.",
//     'social_science'   => "Social Science"
// ];

$addin_subjs = ['hindi'=>'hindi','for_lang'=>'Ind. Class/For. Lang'] ;

$sem1=array();
$sem2=array();
$sorted_arr = [];

// $subject_sequence =['english','hindi','marathi','maths','evs','evs_1','evs_2','ma','french','german','sanskrit','chess',
// 'c.s','cs','p.d','pd','pt','science','social_science','scia','ssr','drawing','music','science_a','a&c','mdd'];

$subject_sequence =['marathi','hindi','english','french','german','sanskrit', 'maths','evs','evs_1','evs_2','science','social_science','science_a'];

    foreach ($subject_sequence as $k_sub => $v_sub)
    {
        foreach($array_data['data'] as $key_data => $data)
        {
            $arr_subj = str_replace(' ','_',(strtolower(trim($data['subject_name']))));

                if($v_sub == $arr_subj)
                {
                  $sorted_arr[] = $data;
                  //---------------------------ADDITIONAL SUBJ WITH NA--------
                  if($arr_subj == 'hindi'){unset($addin_subjs['hindi']);}
                  if(in_array($arr_subj,['german','french','sanskrit'])){unset($addin_subjs['for_lang']);}
                }
        }
    }
// echo print_array($sorted_arr);die;

foreach($sorted_arr as $key_data => $data)
{
unset($temp);
$temp=array();
unset($temp1);
$temp1=array();
$sem1[$key_data] = $data;
$sem2[$key_data] = $data;
foreach($data['exam'] as $key_exam => $v1)
{
$v1['sem'] = isset($v1['sem']) ? $v1['sem'] : 'ND';
if($v1['sem'] =='1')
{
$temp[] = $data['exam'][$key_exam];
}
if($v1['sem'] =='2')
{
$temp1[] = $data['exam'][$key_exam];
}
}
$sem1[$key_data]['exam'] = $temp;
$sem2[$key_data]['exam'] = $temp1;
}

?>
<style>
.extra_curricular_marks,.subject_marks{display:inline-table;width:48%;margin-bottom:1%}
.pt_marks,.subject_marks{margin-bottom:1%;text-align:center;}
td,th{border-right:1px solid #000}
.bord_tr,table{border:1px solid #000}
section{margin:1%;page-break-after: always;}
.left_align{text-align:left}
#remark_div{padding: 1%;font-size:75%;border: 1px solid #212121;border-radius: 5px;}
.center_td td,th{text-align:center}
.subj_mrx_tab tbody tr td{text-align:center}
.subj_mrx_tab tbody tr td:nth-child(1){text-align:left}
.lf_trt_tab tbody tr td{text-align:center}
.lf_trt_tab tbody tr td:nth-child(1){text-align:left}
.extra_curricular_marks{margin-left:1%;margin-right:2%;height:auto;float:left}
.grade_scheme,.pt_marks{display:inline-table;width:48%;margin-left:2%;}
.pt_marks td,.subject_marks td{padding-left:1%}
th{border-bottom:1px solid #000}
table{border-collapse:collapse;width:100%;font-size:70%}
.col-container{display:table;width:100%;}
.col-div{display:table-cell;vertical-align: top;}
.att_perc{min-width:10px}
h1,h1,h4,h5,h6{margin:.5rem 0}
@media print{*{-webkit-print-color-adjust:exact}
/* body{page-break-after:always} */
section{margin:1%;page-break-after: always;}
.print_hide{display:none;}
.margin_shif{display:inline-block;margin-left:-5%;}
}
@page{size:A4 portrait;margin:0}
.center_td td{padding:initial}
.school_det{visibility:hidden}
</style>
<button class="print_hide" style="position:fixed"  onclick="hide_toggle()">Heading Hide / Show</button>
<section>
 <div>
        <h2 class="head_logo" style="color:#f44336;text-align: center;">
            <img style="ververtical-align: top;float: left;" src="https://static.wixstatic.com/media/5b31f2_a61b4041bb2b408b89835992cecc6206~mv2.png" width="80" height="100" alt="">
            PROGRESS REPORT
        </h2>        

        <div class="academic_det">
            <h5 style="text-align: center;">ACADEMIC YEAR 2017-18</h5>
            <h5 style="text-align: center;"><span style="border-radius: 20px;background:#f44336;padding:0.2rem 0.5rem;color: #fff"> Primary Marathi School (Semi-English)</span></h5>
            <h5 style="text-align: center;">ANNUAL PROGRESS REPORT</h5>
        </div>

    </div>
    <br><br>

    <div class="col-container" style="padding: 1px;border: 1px solid #212121;border-radius: 7px;font-size:70%">
        <div class="col-div" style="text-align:left;    padding: 1%;">
                <div class="row-div">
                    <span class="column">NAME OF STUDENT </span>
                    <span class="column inp_head">:<?php echo $stud_name;?> </span>
                </div>
                <br>
                <div class="row-div">
                    <span class="column">DATE OF BIRTH </span>
                    <span class="column inp_head">:<?php echo $stud_dob;?> </span>
                </div>
                <br>
                <div class="row-div">
                    <span class="column">GRADE / DIV </span>
                    <span class="column inp_head">:<?php echo $stud_std." ".$stud_div;?> </span>
                </div>
                <br>
                <div class="row-div">
                    <span class="column">ROLL NO. </span>
                    <span class="column inp_head">:<?php echo $stud_roll;?> </span>
                </div>
                <br>
                <div class="row-div">
                    <span class="column">ATTENDANCE (%) </span>
                    <span class="column inp_head" >:<u><b class="att_perc" > &emsp;<?php echo substr($blood_group,0,2);?>&emsp; </b></u>
                        <!-- <input class="inp_head" type="text" value="" /> -->
                    </span>
                </div>
                <br>
        </div>
        <div class="col-div" style="text-align:right;     padding: 1%;">
            <img style="border:1px solid #ccc" width="80" height="100" src="" alt=""><br>
            <span class="column">U.I.D.:<?php echo $aadhar_no;?></span><br>
            <span class="column">G.R.NO.:<?php echo $gr_number;?></span>
        </div>
    </div>

<div>

<div class="subject_marks">
<h4 class="left_align">PART 1: SCHOLASTIC PERFORMANCE</h4>
<?php

// echo print_array($sem1);
$i=0;
echo "<table class='subj_mrx_tab'>";
echo "<thead><th>SUBJECTS</th><th colspan='2'> TERM 1</th><th colspan='2'>TERM 2 </th><th colspan='2'> ANNUAL</th></thead>";
echo "<tr class='bord_tr'><td></td><td>AG</td><td>EG</td><td>AG</td><td>EG</td><td>AG</td><td>EG</td></tr>";

$grand_total_max_sem1=0;
$grand_total_obt_sem1=0;
$grand_total_max_sem2=0;
$grand_total_obt_sem2=0;
foreach ($sem1 as $k_sem1 => $v_sem1) {
//------------------------PRINTING SEM 1-------------------

echo "<tr> <td>";
// $subj_nam = isset($actual_names[$v_sem1['subject_name']]) ? $actual_names[$v_sem1['subject_name']] : $v_sem1['subject_name'];
echo $v_sem1['subject_name']. "</td>";
$total_marks_sem1=0;
$max_marks_sem1=0;
$subject_total=0;
foreach ($v_sem1['exam'] as $key => $value) {
$total_marks_sem1 += isset($value['marks_obtained']) ? $value['marks_obtained'] : 0;
$max_marks_sem1 += isset($value['total_marks']) ? $value['total_marks'] : 0;
$subject_total += $total_marks_sem1;
$grand_total_obt_sem1 += $total_marks_sem1;
$grand_total_max_sem1 += $max_marks_sem1;
}

$percent =  (($max_marks_sem1 > 0) && ($total_marks_sem1 > 0))  ?  ($total_marks_sem1/ $max_marks_sem1)*100 : 0;
  echo "<td>" .check_grade(round($percent))."</td>";
  echo "<td>" .check_grade2(round($percent))."</td>";
//------------------------PRINTING SEM 2-------------------
$total_marks_sem2=0;
$max_marks_sem2=0;
foreach($sem2[$i]['exam'] as $k_sem2 => $v_sem2){
$total_marks_sem2 += isset($v_sem2['marks_obtained']) ? $v_sem2['marks_obtained'] : 0;
$max_marks_sem2 += isset($v_sem2['total_marks']) ? $v_sem2['total_marks'] : 0;
$grand_total_obt_sem2 += $total_marks_sem2;
$grand_total_max_sem2 += $max_marks_sem2;
$subject_total += $total_marks_sem2;
}
     $percent2 =  (($max_marks_sem2 > 0) && ($total_marks_sem2 > 0)) ? ($total_marks_sem2/ $max_marks_sem2)*100 : 0;
 echo "<td>" .check_grade(round($percent2))."</td>";
 echo "<td>" .check_grade2(round($percent2))."</td>";

($i<count($sem1)) ? $i++ : FALSE;

//------------------------PRINTING TOTAL   SEM1 +  SEM2  -------------------
echo "<td>". check_grade(round($subject_total/2)) . "</td><td>".check_grade2(round(($total_marks_sem1+$total_marks_sem2)/2))."</td>";
echo "</tr>";
}
// //------------------------ADITIONAL ROWS WITH NA -------------------
$addin_trs = "";
foreach ($addin_subjs as $k6 => $v6) {
    $v6 = ucfirst($v6);
    $addin_trs .= "<tr><td>$v6</td><td>NA</td><td>NA</td><td>NA</td><td>NA</td><td>NA</td><td>NA</td></tr>";
}
echo $addin_trs;
echo "<tr><td></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>";
echo "<tr><td><b>CO SCHOLASTIC PURSUITS</b></td><td></td><td></td><td></td><td></td><td></td><td></td></tr>";

if(count($co_scho_res)){
    $co_scho_tab = '';
    if(isset($co_scho_res[$pc_id])) {
        //----------------------MAKING CO SHCO TABLE--------------------
        foreach ($co_scho_res[$pc_id] as $k => $value) {
            foreach ($value as $key => $v) {
                $co_scho_tab[$v['ec_id']]['name'] = $v['curriculum_name'];
                $co_scho_tab[$v['ec_id']][$v['sem']] = $v['grade'];
            }
        }
        foreach ($co_scho_tab as $k1 => $v1) {
            $tds = "";$tot_tds = 0;
            foreach ($v1 as $k2 => $v2) {
                $tds .= ($k2 == "name") ? "<td>$v2</td>" : "<td>".check_grade($v2)."</td><td>".check_grade2($v2)."</td>";
                $tot_tds += ($k2 == "name") ? 0 : $v2;
            }
            $tds .= (sizeof($v1) > 2) ? "" : "<td></td><td></td>";
            // $tds .= "<td>".($tot_tds/2)."</td><td>".check_grade2($tot_tds/2)."</td>";
            $tds .= "<td>".check_grade(round($tot_tds/2))."</td><td>".check_grade2(round($tot_tds/2))."</td>";
            echo "<tr>$tds</tr>";
        }
    }
}

$fin_grade_sem1 = check_grade(round(calc_percent($grand_total_obt_sem1,$grand_total_max_sem1)));
$e_grade_sem1 = check_grade2(round(calc_percent($grand_total_obt_sem1,$grand_total_max_sem1)));
$fin_grade_sem2 = check_grade(round(calc_percent($grand_total_obt_sem2,$grand_total_max_sem2)));
$e_grade_sem2 = check_grade2(round(calc_percent($grand_total_obt_sem2,$grand_total_max_sem2)));


$grand_obt = $grand_total_obt_sem1 + $grand_total_obt_sem2;
$grand_max = $grand_total_max_sem1 + $grand_total_max_sem2;

$grand_grade = check_grade(round(calc_percent($grand_obt,$grand_max)));
$e_grand_grade = check_grade2(round(calc_percent($grand_obt,$grand_max)));

// echo "<tr class='bord_tr'><td>GRAND TOTAL </td><td>". $grand_total_obt_sem1 ."</td><td></td><td>". $grand_total_obt_sem2."</td><td></td><td></td><td></td>";
echo "<tr class='bord_tr'><td>GRAND TOTAL</td><td>". $fin_grade_sem1 ."</td><td>$e_grade_sem1</td><td>". $fin_grade_sem2."</td><td>$e_grade_sem1</td><td>$grand_grade</td><td>$e_grand_grade</td>";
echo "<tr class='bord_tr'><td>GRADE/PERCENTAGE</td><td>". $fin_grade_sem1 ."</td><td>$e_grade_sem1</td><td>". $fin_grade_sem2."</td><td>$e_grade_sem1</td><td>$grand_grade</td><td>$e_grand_grade</td>";

echo "</table>";
?>
</div>

<div class="pt_marks">

<h4 class="left_align">PART 2: PERSONALITY TRAITS</h4>
<?php
echo "<table>";
echo "<thead><th>LIFE TRAITS</th><th colspan='2'> TERM 1</th><th colspan='2'>TERM 2 </th><th colspan='2'> ANNUAL</th></thead>";
echo "<tr class='bord_tr'><td></td><td>AG</td><td>EG</td><td>AG</td><td>EG</td><td>AG</td><td>EG</td></tr>";

if(count($traits)){
    $co_scho_tab = '';
    if(isset($traits[$pc_id])) {
        //----------------------MAKING CO SHCO TABLE--------------------
        foreach ($traits[$pc_id] as $k => $value) {
            foreach ($value as $key => $v) {
                $co_scho_tab[$v['trait_id']]['name'] = $v['traits_name'];
                $co_scho_tab[$v['trait_id']][$v['sem']] = $v['grade'];
            }
        }
        foreach ($co_scho_tab as $k1 => $v1) {
            $tds = "";$tot_tds = 0;
            foreach ($v1 as $k2 => $v2) {
                $tds .= ($k2 == "name") ? "<td>$v2</td>" : "<td>".check_grade($v2)."</td><td>".check_grade2($v2)."</td>";
                $tot_tds += ($k2 == "name") ? 0 : $v2;
            }
            $tds .= (sizeof($v1) > 2) ? "" : "<td></td><td></td>";
            // $tds .= "<td>".($tot_tds/2)."</td><td>".check_grade2($tot_tds/2)."</td>";
            $tds .= "<td>".check_grade(round($tot_tds/2))."</td><td>".check_grade2(round($tot_tds/2))."</td>";
            echo "<tr>$tds</tr>";
        }
    }
}
echo "</table>";
$class_teach_sig = "http://ternavidyalaya.org/Signatures/class_teacher_$stud_std$stud_div.jpg";

$sel_class = $stud_std.$stud_div;

$class_teach_sig = [
    "1A" => "http://ternavidyalaya.org/media/1253/mm_1a.jpg",
    "2A" => "http://ternavidyalaya.org/media/1252/mm_2a.jpg",
    "3A" => "http://ternavidyalaya.org/media/1254/mm_3a.jpg",
    "4A" => "http://ternavidyalaya.org/media/1255/mm_4a.jpg",
    "4B" => "http://ternavidyalaya.org/media/1256/mm_4b.jpg",
    "5A" => "http://ternavidyalaya.org/media/1257/mm_5a.jpg",
    "5B" => "http://ternavidyalaya.org/media/1258/mm_5b.jpg",
    "6A" => "http://ternavidyalaya.org/media/1259/mm_6a.jpg",
    "6B" => "http://ternavidyalaya.org/media/1260/mm_6b.jpg",
    "7A" => "http://ternavidyalaya.org/media/1261/mm_7a.jpg",
    "7B" => "http://ternavidyalaya.org/media/1251/mm_7b.jpg"
];
!isset($class_teach_sig[$sel_class]) ? $class_teach_sig[$sel_class] = "" : FALSE;



?>


        <!-- //----------------------GRADE SCHEME-------------------- -->
<h4 class="left_align">PART 3: GRADE KEY</h4>
<table class="center_td">
<thead><th colspan='2'>ACHIEVEMENT(AG)</th><th colspan='2'>EFFORT(EG)</th><th>DESCRIPTION</th></thead>
<tbody>
<tr class='bord_tr'><td>GRADE</td><td>%</td><td>GRADE</td><td>%</td><td></td></tr>
<tr><td>A1</td><td>91-100</td><td> 1</td><td>81-100</td><td>Excellent</td></tr>
<tr><td>A2</td><td>81-90</td><td></td><td></td><td></td></tr>
<tr><td>B1</td><td>71-80</td><td> 2</td><td>61-80</td><td>Good</td></tr>
<tr><td>B2</td><td>61-70</td><td></td><td></td><td></td></tr>
<tr><td>C1</td><td>51-60</td><td> 3</td><td>41-60</td><td>Satisfactory</td></tr>
<tr><td>C2</td><td>41-50</td><td></td><td></td><td></td></tr>
<tr><td>D</td><td>33-40</td><td> 4</td><td>33-40</td><td>Req. Remediation</td></tr>
<tr><td>E1</td><td>21-32</td><td></td><td></td><td></td></tr>
<tr><td>E2</td><td>Below 21</td><td> 5</td><td>Below 33</td><td>Req. Counseling</td>
</tr>
</tbody>
</table>



</div>


<br>
<h4 class="left_align" >PART 4: OVERALL COMMENTS: FEEDBACK & SUGGESTION(S) </h4>

<div id="remark_div" class="left_align">
<?php echo $grades_arr[$grand_grade]; ?>
</div>

<h4 class="left_align">PART 5: REMARKS </h4>
<h6 class="left_align">Passed and Promoted To Grade/ Div. <input type="text" style="width: 60px;border:0;border-bottom: 1px dotted #212121;" value ="<?php echo $promote_to; ?>"></h6>
<h6 class="left_align">The School Re-opens On <input type="text" value="12 June 2018" style="width: 100px;border:0;border-bottom: 1px dotted #212121;"></h6>

<br>
<div style="width: 100%;display:flex;font-size:1rem;">

    <div style="width:33.33%;text-align:center;">
        <span style="border-top:1px dotted #212121;"><img height="55" width="90" src="<?php echo $class_teach_sig[$sel_class];?>" alt="class_tech"><br>Home Room Teacher</span>
    </div>
    <div style="width:33.33%;text-align:center;">
        <span style="border-top:1px dotted #212121;"><img height="55" width="90" src="<?php echo $section_coordinator; ?>" alt="sec_coord"><br>Section Coordinator</span>
    </div>
    <div style="width:33.33%;text-align:center;">
        <span style="border-top:1px dotted #212121;"><img height="55" width="90" src="http://ternavidyalaya.org/media/1175/mm_principal.jpg" alt="princy"><br>Principal</span>
    </div>
</div>
</section>

<script>

function hide_toggle() {

    for (var index = 0; index < document.getElementsByClassName("head_logo").length; index++) {
         document.getElementsByClassName("head_logo")[index].classList.toggle("school_det");
    }
    for (var index = 0; index < document.getElementsByClassName("academic_det").length; index++) {
         document.getElementsByClassName("academic_det")[index].classList.toggle("margin_shif");
    }
}

    for (var index = 0; index < document.getElementsByClassName("subj_mrx_tab").length; index++) {
        var ht_sml  = document.getElementsByClassName("subject_marks")[index].clientHeight;
        var ht_big  = document.getElementsByClassName("pt_marks")[index].clientHeight;
        var sbj_tab = document.getElementsByClassName("subj_mrx_tab")[index].clientHeight;  
        var fin_ht = (ht_big - ht_sml) + sbj_tab;
        document.getElementsByClassName("subj_mrx_tab")[index].style.height = fin_ht;
    }

</script>