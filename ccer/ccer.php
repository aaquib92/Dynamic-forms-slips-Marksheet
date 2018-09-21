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

$exam_name_map = [];

$this->session->unset_userdata('marksheet');

foreach($array_data['exams'] as $key => $all_exam)
{
    $exam_name_map[$all_exam['id']]['name'] = $all_exam['name'];
    $exam_name_map[$all_exam['id']]['exam_table_id'] = $all_exam['exam_table_id'];
    
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
$sem1_exms = [];
$sem2_exms = [];
$sem1_exms_name = [];
$sem1_marks_obt = [];
$sem2_exms_name = [];
$subj_all_tots = [];
$sorted_arr =[];
// $t_name = [];
$summative =['oral','practical','theory','summative'];
$sem1_frmt_exam_name = [];
$sem1_smt_exam_name = [];
$sem2_frmt_exam_name = [];
$sem2_smt_exam_name = [];

$all_exams = [];

foreach ($array_data['exams'] as $k => $v) {
  $all_exams[$v['id']]  =$v;
}

      


// -------------------------------------------------

        foreach($array_data['data'] as $key_data => $data)
        { 
        $temp=[];                                                               
        $temp1=[];          
        // echo print_array($data);die();
        

                                                
        
                foreach($data['exam'] as $key_exam => $v1)
                {


                              //  echo print_array($v1);

                        $v1['sem'] = isset($v1['sem']) ? $v1['sem'] : 'ND';
                        $t = $data['exam'][$key_exam];
                        $t['subject_name'] = $data['subject_name'];
                        $t['subject_id'] = $data['subject_id'];
                        //----------------------------FOR SEM 1-------------------
                        if( $v1['sem'] == 1){
                                $temp[$v1['exam_id']]  = $t;
                                $sem1_exms_name[$v1['exam_id']] = $v1['exam_name'];

                                !(in_array($v1['exam_id'],$sem1_exms)) ? $sem1_exms[] = $v1['exam_id'] : FALSE;
                                $sem1[$key_data]['subject_name'] = $data['subject_name'];

                        }
                        //----------------------------FOR SEM 2-------------------
                        if( $v1['sem'] == 2){
                                $temp1[$v1['exam_id']]  = $t;
                                $sem2_exms_name[$v1['exam_id']] = $v1['exam_name'];
                                !(in_array($v1['exam_id'],$sem2_exms)) ? $sem2_exms[] = $v1['exam_id'] : FALSE;
                                $sem2[$key_data]['subject_name'] = $data['subject_name'];

                        }


                }
                !(empty($temp)) ? $sem1[$key_data]['exam'] = $temp  : FALSE;
                !(empty($temp1)) ? $sem2[$key_data]['exam'] = $temp1 : FALSE;
  
        }
            //  echo print_array($sem1);

            // sem 1 exams summative and formative wise seperation
         


           foreach ($sem1 as $k => $v)  
              {

                foreach ($all_exams as $k3 => $v3) {

                        if(!(isset($sem1[$k]['exam'][$k3]))   && ($v3['sem'] == '1')  )  {
                             
                              $v3['exam_id'] =$v3['id']; 
                              $v3['exam_name'] =$v3['name']; 
                              $v3['marks_obtained'] = '-';
                              $v3['total_marks'] = '-';
                              $v3['exam_type'] = '';
                              $sem1[$k]['exam'][$k3] = $v3;
                        }
                      }

                foreach ($sem1[$k]['exam'] as $k2 => $v2) {
                                $e = $v2['exam_id'];  
                                $arr_exam = str_replace(' ','_',(strtolower(trim($v2['exam_name']))));
                                if(in_array($arr_exam,$summative)) {
                                        $sem1[$k]['exam'][$e]['exam_type'] = 'summative';
                                }else{
                                        $sem1[$k]['exam'][$e]['exam_type'] = 'formative';  
                                }
                }

              }
//       echo print_array($sem1);die();



              // To print summative and formative sem1 exam names

              foreach ($sem1 as $k => $v)  
              {

      
                foreach ($v['exam'] as $k2 => $v2) {

                        if($v2['exam_type'] == 'formative'){
                        //    print_r($v2['exam_name']);
                        $sem1_frmt_exam_name[$v2['exam_id']]=$v2['exam_name'];

                            }

                      if($v2['exam_type'] == 'summative'){
                    //    print_r($v2['exam_name']);
                         $sem1_smt_exam_name[$v2['exam_id']]=$v2['exam_name'];

                           }
                   }
                }     
                // end
              // sem 2 exams summative and formative wise seperation

              
           foreach ($sem2 as $k => $v)  
           {

             foreach ($all_exams as $k3 => $v3) {

                     if(!(isset($sem2[$k]['exam'][$k3]))   && ($v3['sem'] == '2')  )  {
                          
                           $v3['exam_id'] =$v3['id']; 
                           $v3['exam_name'] =$v3['name']; 
                           $v3['marks_obtained'] = '-';
                           $v3['total_marks'] = '-';
                           $v3['exam_type'] = '';
                           $sem2[$k]['exam'][$k3] = $v3;
                     }
                   }

             foreach ($sem2[$k]['exam'] as $k2 => $v2) {
                             $e = $v2['exam_id'];  
                             $arr_exam = str_replace(' ','_',(strtolower(trim($v2['exam_name']))));
                             if(in_array($arr_exam,$summative)) {
                                     $sem2[$k]['exam'][$e]['exam_type'] = 'summative';
                             }else{
                                     $sem2[$k]['exam'][$e]['exam_type'] = 'formative';  
                             }
             }

           }

           // end


//        echo print_array($sem2);die();



              // To print summative and formative sem2s exam names

              foreach ($sem2 as $k => $v)  
              {

                foreach ($v['exam'] as $k2 => $v2) {


                        if($v2['exam_type'] == 'formative'){
                        //    print_r($v2['exam_name']);
                         $sem2_frmt_exam_name[$v2['exam_id']]=$v2['exam_name'];

                            }

                      if($v2['exam_type'] == 'summative'){
                    //    print_r($v2['exam_name']);
                         $sem2_smt_exam_name[$v2['exam_id']]=$v2['exam_name'];

                           }
                   }
                }     
                // end


         //  echo print_array($sem1);die();

         





     //   echo print_array($sem1_exms_name);
        
        
?><?php

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
   .center{
      text-align:center;
   }
    
    .slip-input1 {
    min-width: 100px;
    border-bottom: 1px solid black;
    display: inline-block;
    }
    /* css for print */
    @media print
    {
    span{border:none}
    * {-webkit-print-color-adjust:exact;}

    #sem2_div{
        /* margin-top:25%; */
        margin-right:-2.4%
    }
    #sem1_div{
        margin-right:-2.4%;
        /* page-break-after: always; */
    }
    .main_div{
      page-break-after: always; 

    }
    
    }

    /* end of print css */

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
    .max_marks{
    /* float: right; */
    }
    .marks_obt{
    margin-left: 36%;
    margin-top: 37%;
    }
    @page{
        size:portrait;
        margin:5%;
    }
    #sem1_div{
     border:1px solid black;
     border-radius:25px;
    }
    #sem2_div{
     border:1px solid black;
     border-radius:25px;
    }
    
.table{
  width:96%;border-collapse:collapse;font-size:75%;border:1px; border-style:solid; border-right-width:0px;   
}
</style>

<!-- start of marksheet -->

<div class="marksheet-div">

<!-- start of sem1 div -->

<div id ="sem1_div" class ="main_div">
      <!-- header -->
<center>
<h5><b>CONTINUOUS COMPREHENSIVE EVALUATION RECORD BOOK</b></h5>
</center>
<br>

<table>
        <tr>
                <td>Name of the Student &emsp; <span class="slip-input1"><?php echo $stud_name ;?></span></td>
        </tr>
        <tr>
                <td> <b>FIRST SEMESTER</b> &emsp; &emsp;G.R.No &emsp; <span class="slip-input1"><?php echo $gr_number ;?></td>
                <td>Std &emsp;<span class="slip-input1"><?php echo $stud_std ;?></td>
                <td>Div &emsp;<span class="slip-input1"><?php echo $stud_div ;?></td>
                <td>Roll No &emsp;<span class="slip-input1"><?php echo $stud_roll ;?></td>
                
        </tr>
</table><br>

<!-- end of header -->

<!-- main body start -->
<?php 

         $sem1_e_fr = isset($sem1_frmt_exam_name) ? (count($sem1_frmt_exam_name) + 3) : 3; 
         $sem1_e_sm = isset($sem1_smt_exam_name) ? (count($sem1_smt_exam_name) + 1) : 1; 
         $sem2_e_fr = isset($sem2_frmt_exam_name) ? (count($sem2_frmt_exam_name) + 3) : 3; 
         $sem2_e_sm = isset($sem2_smt_exam_name) ? (count($sem2_smt_exam_name) + 1) : 1; 

        // echo sizeof($sem1_frmt_exams_name);


?>
           <!-- start of sem1 table -->
<table cellpadding="6" class ="table">

<tr>    <!--Printing first row Term name  -->
  <th class="th_class"  rowspan="2"> Sr<br> No: </th>
  <th class="th_class" rowspan="2"> Particulars: <div style ="display:inline-block;font-size: 1.5em;"> &#10142; &#8595;</div> </th>
  <?php 
  $sem1_e_no ='';
  $sem1_e_no = $sem1_e_fr-1;

  echo "<th class='th_class center'  colspan='$sem1_e_fr'>(A) Formative Evaluation<br></th><th class='th_class'  colspan='$sem1_e_sm' style ='border-bottom:hidden;'>(B) Summative Evaluation<br></th><th class ='th_class' rowspan ='3'>Grand Total A+B</th><th class ='th_class' rowspan ='3'>Grade</th>"; 
  ?>

 </tr> 
 <tr>
<?php    //printing second row exam names
 echo "<th class='td_class'><div style ='transform: rotate(-90deg);line-height:2em;'></div></th>";
//  echo print_array($sem2);die;
if(sizeof($sem1) > 0)
{
        foreach($sem1_frmt_exam_name as $k_exam => $v_exam)
        {
                echo "<th class='td_class center'><div>". $v_exam ."</div></th>";
        }
}

echo "<th class='td_class'><div></div></th><th class='td_class'><div></div></th><th class ='th_class' colspan ='$sem1_e_sm'></th>";

?>
</tr>
<tr>
<td class ="td_class"></td>
<td>Subject</td>
<?php
 echo "<th class='td_class'><div class ='center'>1</div></th>";

$count =1;

// Print formative exam names
if(sizeof($sem1) > 0)
{
        foreach($sem1_frmt_exam_name as $k_exam => $v_exam)
        {
                echo "<th class='td_class'><div class ='center'>". ++$count . "</div></th>";
        }
}

// end
echo "<th class='td_class'><div>".$sem1_e_no."</div></th><th class='td_class'><div>Total</div></th>";

// Print summative exam names
if(sizeof($sem1) > 0)
{
        foreach($sem1_smt_exam_name as $k_exam => $v_exam)
        {
                echo "<th class='td_class'>". $v_exam. "</th>";
        }
}
// end



      echo "<th class='td_class'>Total</th></tr>";


?>

</tr>
 <?php
//  echo print_array($sem1_exm_name);
 
 $serial_no = 0;

         // to print subject names

 foreach ($sem1 as $k => $v) {
      //    echo print_array($v);



        $sem1_table ='';
        $subj_name = $v['subject_name'];


        $sem1_table .= "<tr><td class ='td_class' rowspan ='2'>".++$serial_no."</td><td class ='td_class'  rowspan ='2'>
        <div>".$subj_name ."</div><div class ='max_marks'>Max Marks</div><div class ='marks_obt'>
        Marks Obtd</div></td><td class ='td_class'></td>";
        $max_marks_tot_sem1_frm = 0;
        $marks_obt_tot_sem1_frm = 0;
        $max_marks_tot_sem1_sm = 0;
        $marks_obt_tot_sem1_sm = 0;
        $grand_max_tot_sem1 = '';
        $grand_marks_obt_tot_sem1 = '';
        $percent ='';

        ksort($v['exam']);

        // To print total marks formative
         foreach($v['exam'] as $k1 => $v1){
             //   echo print_array($v1);


            if($v1['exam_type'] == 'formative' ){

                $sem1_table .="<td class ='td_class center'>".$v1['total_marks']."</td>";
                $max_marks_tot_sem1_frm += $v1['total_marks'];

            }

      } // end of total marks print


      $sem1_table .= "<td class ='td_class'></td><td class ='td_class center'>".$max_marks_tot_sem1_frm."</td>";


                 //  summative calculation

            // To print total marks for summative
         foreach($v['exam'] as $k1 => $v1){
                //  echo print_array($v1);
  
              if($v1['exam_type'] == 'summative' ){
  
                $sem1_table .= "<td class ='td_class center'>".$v1['total_marks']."</td>";
                $max_marks_tot_sem1_sm += $v1['total_marks'];
  
              }
  
         } // end of total marks print

         $grand_max_tot_sem1 = $max_marks_tot_sem1_frm + $max_marks_tot_sem1_sm;

        $sem1_table .="<td class ='td_class center'>".$max_marks_tot_sem1_sm."</td><td class ='td_class center'>".$grand_max_tot_sem1."</td><td class ='td_class'></td></tr><tr><td class ='td_class'></td>";

          


          // end

      // To print marks obtained formative
      foreach($v['exam'] as $k1 => $v1){



        if($v1['exam_type'] == 'formative'){

            $sem1_table .= "<td class ='td_class center'>".$v1['marks_obtained']."</td>";
            $marks_obt_tot_sem1_frm += $v1['marks_obtained'];

        }
    }
    $sem1_table .= "<td class ='td_class'></td><td class ='td_class center'>".$marks_obt_tot_sem1_frm."</td>";



                  // To print marks obtained for summative
      foreach($v['exam'] as $k1 => $v1){



        if($v1['exam_type'] == 'summative'){

            $sem1_table .= "<td class ='td_class center'>".$v1['marks_obtained']."</td>";
            $marks_obt_tot_sem1_sm  += $v1['marks_obtained'];

        }
    }
// end




        $grand_marks_obt_tot_sem1 = $marks_obt_tot_sem1_frm + $marks_obt_tot_sem1_sm;


        $percent = ($grand_marks_obt_tot_sem1 != 0) ? round((( $grand_marks_obt_tot_sem1 / $grand_max_tot_sem1 ) * 100),2) : 0;


    $sem1_table .= "<td class ='td_class center'>".$marks_obt_tot_sem1_sm."</td><td class ='td_class center'>". $grand_marks_obt_tot_sem1."</td><td class ='td_class center'>".check_grade($percent)."</td></tr>";

               echo $sem1_table;

 }// end of marks obtained print

 // end of foreach for subjects

// Printing co-scholastic subjects for sem 1
$pc_id = $global_arr['student_selected_class'][0]['pc_id'];

if(count($co_scho_res)){
        if(isset($co_scho_res[$pc_id]['1']) && (sizeof($co_scho_res[$pc_id]['1'])> 0))
                {
                  
                        foreach($co_scho_res[$pc_id]['1'] as $k => $v) {
                                $sem1_table ='';
                         
                             $sem1_table.="<tr><td class ='td_class center' rowspan ='2'>".++$serial_no."</td><td class ='td_class' rowspan ='2'>".$v['curriculum_name']."</td><td class ='td_class'></td>";



                                       // formative td for max marks 
                             if(sizeof($sem1) > 0)
                             {
                                     foreach($sem1_frmt_exam_name as  $k_exam =>$v_exam)
                                     {
                                        $sem1_table.= "<td class='td_class'></td>";
                                     }
                                     $sem1_table.= "<td class='td_class'></td><td class='td_class'></td><td class='td_class'></td><td class='td_class'></td>";
                             }
                             // end



                            // formative td for  marks obtained


                             if(sizeof($sem1) > 0)
                             {
                                     foreach($sem1_smt_exam_name as  $k_exam =>$v_exam)
                                     {
                                        $sem1_table.= "<td class='td_class'></td>";
                                     }
                                //      $sem1_table.= "<td class='td_class'></td><td class='td_class'></td><td class='td_class'></td><td class='td_class'></td><td class='td_class'></td><td class='td_class'></td>";
                             }

                             // end


                             $sem1_table.="<td class ='td_class'></td></tr>";


                             $sem1_table.= "<tr><td class ='td_class'></td>";



                             if(sizeof($sem1) > 0)
                             {
                                     foreach($sem1_frmt_exam_name as  $k_exam =>$v_exam)
                                     {
                                        $sem1_table.= "<td class='td_class'></td>";
                                     }
                                     $sem1_table.="<td class='td_class'></td><td class='td_class center'>".$v['grade']."</td><td class='td_class'></td><td class='td_class'></td><td class='td_class'></td><td class='td_class'></td><td class='td_class'></td><td class='td_class'></td></tr>";
                             }


                             echo $sem1_table;

                        }
                        // end of co-scho loop
                }
                
                
        }  
        //end 
 
?>

</table><br><br>
            <!-- end of sem1 table -->
           
            <!-- Signature start -->

<div style="width: 100%;display:flex;font-size:0.8rem;">
	<div style="width:33.33%;text-align:left;padding-left:1%;"><b>Sign. of Class Teacher:</b></div>
	<div style="width:33.33%;text-align:center;"><b>Sign. of Head Master/Mistress</b></div>
	<div style="width:33.33%;text-align:center;"><b>Sign. of Center Incharge</b></div>
</div><br>

                  <!-- Signature end -->



  
<table cellpadding ="6" class ="table">
  <tr>
          <th class ="td_class">Subject</th>
          <th class ="td_class">Particular Note</th>
  </tr>

  <?php

            for($i=1;$i<=10;$i++)
         {
            echo "<tr>";
              for ($j=1;$j<=2;$j++)
             {
             echo "<td class ='td_class' contenteditable = 'true'></td>";
             }
              echo "</tr>";
         }

  ?>
  
  </table><br><br>




</div>


         <!-- end of sem1 div -->
<br>


          <!-- start of sem2 div -->

   <div id ="sem2_div" class ="main_div">       

          <!-- start of sem2 table -->


             <center><h4>SECOND SEMESTER</h4></center><br>






<table cellpadding="6" class ="table">

<tr>    <!--Printing first row Term name  -->
  <th class="th_class"  rowspan="2"> Sr<br> No: </th>
  <th class="th_class" rowspan="2"> Particulars: <div style ="display:inline-block;font-size: 1.5em;"> &#10142; &#8595;</div> </th>
  <?php 
  $sem2_e_no ='';
  $sem2_e_no = $sem2_e_fr-1;

  echo "<th class='th_class center'  colspan='$sem2_e_fr'>(A) Formative Evaluation<br></th><th class='th_class'  colspan='$sem2_e_sm' style ='border-bottom:hidden;'>(B) Summative Evaluation<br></th><th class ='th_class' rowspan ='3'>Grand Total A+B</th><th class ='th_class' rowspan ='3'>Grade</th>"; 
  ?>

 </tr> 
 <tr>
<?php    //printing second row exam names
 echo "<th class='td_class'><div></div></th>";
//  echo print_array($sem2);die;
if(sizeof($sem2) > 0)
{
        foreach($sem2_frmt_exam_name as $k_exam => $v_exam)
        {
                echo "<th class='td_class center'><div>". $v_exam . "</div></th>";
        }
}

echo "<th class='td_class'><div></div></th><th class='td_class'><div></div></th><th class ='th_class' colspan ='$sem2_e_sm'></th>";

?>
</tr>
<tr>
<td class ="td_class"></td>
<td>Subject</td>
<?php
 echo "<th class='td_class'><div class ='center'>1</div></th>";

$count =1;

// Print formative exam names
if(sizeof($sem2) > 0)
{
        foreach($sem2_frmt_exam_name as $k_exam => $v_exam)
        {
                echo "<th class='td_class'><div class ='center'>". ++$count . "</div></th>";
        }
}

// end
echo "<th class='td_class'><div>".$sem2_e_no."</div></th><th class='td_class'><div>Total</div></th>";

// Print summative exam names
if(sizeof($sem2) > 0)
{
        foreach($sem2_smt_exam_name as $k_exam => $v_exam)
        {
                echo "<th class='td_class'>". $v_exam. "</th>";
        }
}
// end



      echo "<th class='td_class'>Total</th></tr>";


?>

</tr>
 <?php
 
 $serial_no = 0;

         // to print subject names

 foreach ($sem2 as $k => $v) {
        $sem2_table ='';
        $subj_name = $v['subject_name'];


        $sem2_table .= "<tr><td class ='td_class' rowspan ='2'>".++$serial_no."</td><td class ='td_class'  rowspan ='2'><div>". $subj_name ."</div><div class ='max_marks'>Max Marks</div><div class ='marks_obt'>Marks Obtd</div></td><td class ='td_class'></td>";
        $max_marks_tot_sem2_frm = 0;
        $marks_obt_tot_sem2_frm = 0;
        $max_marks_tot_sem2_sm = 0;
        $marks_obt_tot_sem2_sm = 0;
        $grand_max_tot_sem2 = '';
        $grand_marks_obt_tot_sem2 = '';
        $percent ='';

        ksort($v['exam']);


        // To print total marks formative
         foreach($v['exam'] as $k1 => $v1){
             //   echo print_array($v1);

            if($v1['exam_type'] == 'formative' ){

                $sem2_table .="<td class ='td_class center'>".$v1['total_marks']."</td>";
                $max_marks_tot_sem2_frm += $v1['total_marks'];

            }

      } // end of total marks print


      $sem2_table .= "<td class ='td_class'></td><td class ='td_class center'>".$max_marks_tot_sem2_frm."</td>";


                 //  summative calculation

            // To print total marks for summative
         foreach($v['exam'] as $k1 => $v1){
                //  echo print_array($v1);
  
              if($v1['exam_type'] == 'summative' ){
  
                $sem2_table .= "<td class ='td_class center'>".$v1['total_marks']."</td>";
                $max_marks_tot_sem2_sm += $v1['total_marks'];
  
              }
  
         } // end of total marks print

         $grand_max_tot_sem2 = $max_marks_tot_sem2_frm + $max_marks_tot_sem2_sm;

        $sem2_table .="<td class ='td_class center'>".$max_marks_tot_sem2_sm."</td><td class ='td_class center'>".$grand_max_tot_sem2."</td><td class ='td_class'></td></tr><tr><td class ='td_class'></td>";

          


          // end

      // To print marks obtained formative
      foreach($v['exam'] as $k1 => $v1){



        if($v1['exam_type'] == 'formative'){

            $sem2_table .= "<td class ='td_class center'>".$v1['marks_obtained']."</td>";
            $marks_obt_tot_sem2_frm += $v1['marks_obtained'];

        }
    }
    $sem2_table .= "<td class ='td_class'></td><td class ='td_class center'>".$marks_obt_tot_sem2_frm."</td>";



                  // To print marks obtained for summative
      foreach($v['exam'] as $k1 => $v1){



        if($v1['exam_type'] == 'summative'){

            $sem2_table .= "<td class ='td_class center'>".$v1['marks_obtained']."</td>";
            $marks_obt_tot_sem2_sm  += $v1['marks_obtained'];

        }
    }
// end




        $grand_marks_obt_tot_sem2 = $marks_obt_tot_sem2_frm + $marks_obt_tot_sem2_sm;


        $percent = ($grand_marks_obt_tot_sem2 != 0) ? round((( $grand_marks_obt_tot_sem2 / $grand_max_tot_sem2 ) * 100),2) : 0;


    $sem2_table .= "<td class ='td_class center'>".$marks_obt_tot_sem2_sm."</td><td class ='td_class center'>". $grand_marks_obt_tot_sem2."</td><td class ='td_class center'>".check_grade($percent)."</td></tr>";

               echo $sem2_table;

 }// end of marks obtained print

 // end of foreach for subjects

// Printing co-scholastic subjects for sem 2
$pc_id = $global_arr['student_selected_class'][0]['pc_id'];

if(count($co_scho_res)){
        if(isset($co_scho_res[$pc_id]['2']) && (sizeof($co_scho_res[$pc_id]['2'])> 0))
                {
                  
                        foreach($co_scho_res[$pc_id]['2'] as $k => $v) {
                                $sem2_table ='';
                         
                             $sem2_table.="<tr><td class ='td_class center' rowspan ='2'>".++$serial_no."</td><td class ='td_class' rowspan ='2'>".$v['curriculum_name']."</td><td class ='td_class'></td>";



                                       // formative td for max marks 
                             if(sizeof($sem2) > 0)
                             {
                                     foreach($sem2_frmt_exam_name as  $k_exam =>$v_exam)
                                     {
                                        $sem2_table.= "<td class='td_class'></td>";
                                     }
                                     $sem2_table.= "<td class='td_class'></td><td class='td_class'></td><td class='td_class'></td><td class='td_class'></td>";
                             }
                             // end



                            // formative td for  marks obtained


                             if(sizeof($sem1) > 0)
                             {
                                     foreach($sem2_smt_exam_name as  $k_exam =>$v_exam)
                                     {
                                        $sem2_table.= "<td class='td_class'></td>";
                                     }
                                //      $sem1_table.= "<td class='td_class'></td><td class='td_class'></td><td class='td_class'></td><td class='td_class'></td><td class='td_class'></td><td class='td_class'></td>";
                             }

                             // end


                             $sem2_table.="<td class ='td_class'></td></tr>";


                             $sem2_table.= "<tr><td class ='td_class'></td>";



                             if(sizeof($sem2) > 0)
                             {
                                     foreach($sem2_frmt_exam_name as  $k_exam =>$v_exam)
                                     {
                                        $sem2_table.= "<td class='td_class'></td>";
                                     }
                                     $sem2_table.="<td class='td_class'></td><td class='td_class center'>".$v['grade']."</td><td class='td_class'></td><td class='td_class'></td><td class='td_class'></td><td class='td_class'></td><td class='td_class'></td><td class='td_class'></td></tr>";
                             }


                             echo $sem2_table;

                        }
                        // end of co-scho loop
                }
                
                
        }  
        //end 
 
?>

</table><br><br>


      <!-- end of sem2 table -->

    
      <!-- Signature start -->

<div style="width: 100%;display:flex;font-size:0.8rem;">
	<div style="width:33.33%;text-align:left;padding-left:1%;"><b>Sign. of Class Teacher:</b></div>
	<div style="width:33.33%;text-align:center;"><b>Sign. of Head Master/Mistress</b></div>
	<div style="width:33.33%;text-align:center;"><b>Sign. of Center Incharge</b></div>
</div><br>

                  <!-- Signature end -->
<table cellpadding ="6" class ="table"> 
<tr>
        <th class ="td_class">Subject</th>
        <th class ="td_class">Particular Note</th>
</tr>

<?php

          for($i=1;$i<=10;$i++)
       {
          echo "<tr>";
            for ($j=1;$j<=2;$j++)
           {
           echo "<td class ='td_class' contenteditable = 'true'></td>";
           }
            echo "</tr>";
       }

?>
</table>
<table class ="table" cellpadding ="6">

<tr rowspan ="2">
        <td  class = "td_class" style ="border-bottom:hidden;" ><b>Working Day</b></td>
        <td  class = "td_class" ><b>June</b></td>
        <td  class = "td_class" ><b>July</b></td>
        <td  class = "td_class" ><b>August</b></td>
        <td  class = "td_class" ><b>September</b></td>
        <td  class = "td_class" ><b>October</b></td>
        <td  class = "td_class" ><b>November</b></td>
        <td  class = "td_class" ><b>December</b></td>
        <td  class = "td_class" ><b>January</b></td>
        <td  class = "td_class" ><b>February</b></td>
        <td  class = "td_class" ><b>March</b></td>
        <td  class = "td_class" ><b>April</b></td>
        <td  class = "td_class" ><b>May</b></td>
</tr>
<tr>
        <td class = "td_class" contenteditable = "true" ></td>
        <td class = "td_class" contenteditable = "true" ></td>
        <td class = "td_class" contenteditable = "true" ></td>
        <td class = "td_class" contenteditable = "true" ></td>
        <td class = "td_class" contenteditable = "true" ></td>
        <td class = "td_class" contenteditable = "true" ></td>
        <td class = "td_class" contenteditable = "true" ></td>
        <td class = "td_class" contenteditable = "true" ></td>
        <td class = "td_class" contenteditable = "true" ></td>
        <td class = "td_class" contenteditable = "true" ></td>
        <td class = "td_class" contenteditable = "true" ></td>
        <td class = "td_class" contenteditable = "true" ></td>
        <td class = "td_class" contenteditable = "true" ></td>
</tr>
<tr>
        <td class = "td_class"><b>Present</b></td>
        <td class = "td_class" contenteditable = "true"></td>
        <td class = "td_class" contenteditable = "true"></td>
        <td class = "td_class" contenteditable = "true"></td>
        <td class = "td_class" contenteditable = "true"></td>
        <td class = "td_class" contenteditable = "true"></td>
        <td class = "td_class" contenteditable = "true"></td>
        <td class = "td_class" contenteditable = "true"></td>
        <td class = "td_class" contenteditable = "true"></td>
        <td class = "td_class" contenteditable = "true"></td>
        <td class = "td_class" contenteditable = "true"></td>
        <td class = "td_class" contenteditable = "true"></td>
        <td class = "td_class" contenteditable = "true"></td>
</tr>

</table><br><br>


 </div>     


       <!-- end of sem2 div -->




</div>

</section>