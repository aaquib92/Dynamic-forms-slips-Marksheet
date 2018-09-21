<style>
table, thead, td, th, tr {
border-collapse: collapse;
    text-align: center;
    font-size:94%;
}

tbody,thead, td, th, tr
{
border: solid 1px black; 
}

table {
    user-select: none;
    -webkit-user-select: none;
    -moz-user-select: none;
}

.jsdragtable-contents {
    background: #fff;
    user-select: none;
    -webkit-user-select: none;
    -moz-user-select: none;
    box-shadow: 2px 2px 5px #aaa;
    padding: 0;
}

.jsdragtable-contents table {
    margin-bottom: 0;
}

th:hover{
    cursor:move;
}
</style>

<script>

    var Anterec;
    (function (Anterec) {
        var JsDragTable = (function () {
            function JsDragTable(target) {
                this.offsetX = 20;
                this.offsetY = 20;
                this.container = target;
                this.rebind();
            }
            JsDragTable.prototype.rebind = function () {
                var _this = this;
                $(this.container).find("th").each(function (headerIndex, header) {
                    $(header).off("mousedown touchstart");
                    $(header).off("mouseup touchend");
                    $(header).on("mousedown touchstart", function (event) {
                        _this.selectColumn($(header), event);
                    });
                    $(header).on("mouseup touchend", function (event) {
                        _this.dropColumn($(header), event);
                    });
                });
                $(this.container).on("mouseup touchend", function () {
                    _this.cancelColumn();
                });
            };

            JsDragTable.prototype.selectColumn = function (header, event) {
                var _this = this;
                event.preventDefault();
                var userEvent = new UserEvent(event);
                this.selectedHeader = header;
                var sourceIndex = this.selectedHeader.index() + 1;
                var cells = [];

                $(this.container).find("tr td:nth-child(" + sourceIndex + ")").each(function (cellIndex, cell) {
                    cells[cells.length] = cell;
                });

                this.draggableContainer = $("<div/>");
                this.draggableContainer.addClass("jsdragtable-contents");
                this.draggableContainer.css({ position: "absolute", left: userEvent.event.pageX + this.offsetX, top: userEvent.event.pageY + this.offsetY });

                var dragtable = this.createDraggableTable(header);

                $(cells).each(function (cellIndex, cell) {
                    var tr = $("<tr/>");
                    var td = $("<td/>");
                    $(td).html($(cells[cellIndex]).html());
                    $(tr).append(td);
                    $(dragtable).find("tbody").append(tr);
                });

                this.draggableContainer.append(dragtable);
                $("body").append(this.draggableContainer);
                $(this.container).on("mousemove touchmove", function (event) {
                    _this.moveColumn($(header), event);
                });
                $(".jsdragtable-contents").on("mouseup touchend", function () {
                    _this.cancelColumn();
                });
            };

            JsDragTable.prototype.moveColumn = function (header, event) {
                event.preventDefault();
                if (this.selectedHeader !== null) {
                    var userEvent = new UserEvent(event);
                    this.draggableContainer.css({ left: userEvent.event.pageX + this.offsetX, top: userEvent.event.pageY + this.offsetY });
                }
            };

            JsDragTable.prototype.dropColumn = function (header, event) {
                var _this = this;
                event.preventDefault();
                var sourceIndex = this.selectedHeader.index() + 1;
                var targetIndex = $(event.target).index() + 1;
                var tableColumns = $(this.container).find("th").length;

                var userEvent = new UserEvent(event);
                if (userEvent.isTouchEvent) {
                    header = $(document.elementFromPoint(userEvent.event.clientX, userEvent.event.clientY));
                    targetIndex = $(header).prevAll().length + 1;
                }

                if (sourceIndex !== targetIndex) {
                    var cells = [];
                    $(this.container).find("tr td:nth-child(" + sourceIndex + ")").each(function (cellIndex, cell) {
                        cells[cells.length] = cell;
                        $(cell).remove();
                        $(_this.selectedHeader).remove();
                    });

                    if (targetIndex >= tableColumns) {
                        targetIndex = tableColumns - 1;
                        this.insertCells(cells, targetIndex, function (cell, element) {
                            $(cell).after(element);
                        });
                    } else {
                        this.insertCells(cells, targetIndex, function (cell, element) {
                            $(cell).before(element);
                        });
                    }

                    $(this.container).off("mousemove touchmove");
                    $(".jsdragtable-contents").remove();
                    this.draggableContainer = null;
                    this.selectedHeader = null;
                    this.rebind();
                }
            };

            JsDragTable.prototype.cancelColumn = function () {
                $(this.container).off("mousemove touchmove");
                $(".jsdragtable-contents").remove();
                this.draggableContainer = null;
                this.selectedHeader = null;
            };

            JsDragTable.prototype.createDraggableTable = function (header) {
                var table = $("<table/>");
                var thead = $("<thead/>");
                var tbody = $("<tbody/>");
                var tr = $("<tr/>");
                var th = $("<th/>");
                $(table).addClass($(this.container).attr("class"));
                $(table).width($(header).width());
                $(th).html($(header).html());
                $(tr).append(th);
                $(thead).append(tr);
                $(table).append(thead);
                $(table).append(tbody);
                return table;
            };

            JsDragTable.prototype.insertCells = function (cells, columnIndex, callback) {
                var _this = this;
                $(this.container).find("tr td:nth-child(" + columnIndex + ")").each(function (cellIndex, cell) {
                    callback(cell, $(cells[cellIndex]));
                });
                $(this.container).find("th:nth-child(" + columnIndex + ")").each(function (cellIndex, cell) {
                    callback(cell, $(_this.selectedHeader));
                });
            };
            return JsDragTable;
        })();
        Anterec.JsDragTable = JsDragTable;

        var UserEvent = (function () {
            function UserEvent(event) {
                this.event = event;
                if (event.originalEvent && event.originalEvent.touches && event.originalEvent.changedTouches) {
                    this.event = event.originalEvent.touches[0] || event.originalEvent.changedTouches[0];
                    this.isTouchEvent = true;
                }
            }
            return UserEvent;
        })();
    })(Anterec || (Anterec = {}));
    jQuery.fn.extend({
        jsdragtable: function () {
            return new Anterec.JsDragTable(this);
        }
    });


</script>

<?php 
$academic_year = "";
$id = "";
$exam_title = "";

$student_array_data = [];
foreach ($students['data'] as $k0 => $v0) {
    $student_array_data[$v0['id']] = $v0;

    $temp = ['status' =>1];
    $temp['data'] = $result['data'][$v0['id']];
    $student_array_data[$v0['id']]['exam_info'] = $temp;
}
//echo print_array($student_array_data);die;

$student_array_data = array_values($student_array_data);

// $global_arr = get_student_by_id($student_array_data[0]['id']);
$stud_school_name = get_session_data()['profile']['partner_name'];


// $month = 0;
// $year = 0;
// foreach($student_array_data[0]['exam_info']['exams'] as $key => $all_exam)
// {  
//     if($key==0)
//     {
//         if($all_exam['month']<6)
//         {
//         $month = $all_exam['month'];
//         $year = $all_exam['end_year'];
//         }
//         else
//         {
//         $month = $all_exam['month'];
//         $year = $all_exam['start_year'];
//         }
//     }

   
//     $new_year;
//     if($all_exam['month']<6)
//     {
//         $new_year = $all_exam['end_year'];
//     }
//     else
//     {
//         $new_year = $all_exam['start_year'];
//     }
    
//     if($new_year>$year)
//     {
//         $month = $all_exam['month'];
//         $year = $new_year;
//     }
// }

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

$std_check=array(9,10);
$stud_class=$class_name[0]['standard'];

function check_grade($marks_obtained)
{
    $marks_obtained = ceil($marks_obtained);
    $grade ;
    if($marks_obtained <= 20)                                 {$grade = 'E-2';   return $grade; }
    elseif($marks_obtained >= 21 && $marks_obtained <= 32.99)    {$grade = 'E-1';   return $grade; }
    elseif($marks_obtained >= 33 && $marks_obtained <= 40.99)    {$grade = 'D';     return $grade; }
    elseif($marks_obtained >= 41 && $marks_obtained <= 50.99)    {$grade = 'C-2';   return $grade; }
    elseif($marks_obtained >= 51 && $marks_obtained <= 60.99)    {$grade = 'C-1';   return $grade; }
    elseif($marks_obtained >= 61 && $marks_obtained <= 70.99)    {$grade = 'B-2';   return $grade; }
    elseif($marks_obtained >= 71 && $marks_obtained <= 80.99)    {$grade = 'B-1';   return $grade; }
    elseif($marks_obtained >= 81 && $marks_obtained <= 90.99)    {$grade = 'A-2';   return $grade; }
    elseif($marks_obtained >= 91 && $marks_obtained <= 100)   {$grade = 'A-1';   return $grade; }
}

function check_grade_9_10($marks_obtained)
{
    $marks_obtained = ceil($marks_obtained);
    $grade ;
    if($marks_obtained <= 35)                                 {$grade = 'D';   return $grade; }
    elseif($marks_obtained >= 35 && $marks_obtained <= 44)    {$grade = 'C';   return $grade; }
    elseif($marks_obtained >= 45 && $marks_obtained <= 59)    {$grade = 'B';     return $grade; }
    elseif($marks_obtained >= 60 && $marks_obtained <= 100)    {$grade = 'A';   return $grade; }
    
}

function calc_percent($obt,$max)
{
    return $percent =  ($max > 0) ? round((($obt/$max)* 100),2) : 0;
}

function calc_avg_of_600($obt,$max)
{
    return $percent =  ($max > 0) ? round(($obt * 600 /$max),2) : 0;
}
//--------------------Class Report of classes 5th to 8th.---------------------------------------------------------------



if(!in_array($stud_class,$std_check)) //checks if stud_class = 9 or 10 
{

?>
<section style="margin-top:40px;text-align:center;" onload="setTimeout(myFunction(), 3000)">
<div class="class_report_div">
<br>
<table style="width:98%; border:1px solid black; border:1; margin:1%" border="1px">
<?php
$array_data = $student_array_data[0]['exam_info'];

// Displaying all headers/headings... 
    echo '<th>' . "Sr. No." . '</th>';
    echo '<th>' . "Roll No." . '</th>';
    echo '<th>' . "Name of the Student" . '</th>';
    foreach($array_data['data'] as $key => $value)
    {

        

        if(strlen($value['subject_name'])>9)
         {
             $temp_subject= $value['subject_name'];
             $arr_subject=explode(" ",$temp_subject);
        echo '<th>'; 
        foreach ($arr_subject as $value) {
            echo $value;
            echo '<br>';
        }
        echo '</th>';
         }
         else {
           echo '<th class="nowrap">' . $value['subject_name'] . '</th>'; 
         }
    }
  
    echo '<th>'. 'No. of' . '<br>'. 'passing'. '<br>' .'subjects' .'</th>';
    echo '<th style="width:15%;">'. 'Remarks' .'</th>';


  

//Displaying student names and marks
    $sr_no = 1;
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
                
        $max_marks=0;
        $no_of_passing_subjects=0;
        $no_of_subjects=0;

        foreach($v['exam_info']['data'] as $key => $marks)     
        {
           ;

            $total_obtained_marks=0;
            $marks_obtained = '';
            $total_passing =0;
            $onesubject_total_marks=0;        
          
            foreach ($marks['exam'] as $k1 => $v1)
           
            {
               
                $v1['marks_obtained'] = (($v1['marks_obtained']) =='-') ? 0 : $v1['marks_obtained'];
                $total_obtained_marks += $v1['marks_obtained'];
                $marks_obtained = $v1['marks_obtained'];

                $v1['passing_marks'] = (($v1['passing_marks']) =='-') ? 0 : $v1['passing_marks'];
                $total_passing += $v1['passing_marks'];

                $v1['total_marks'] = (($v1['total_marks']) =='-') ? 0 : $v1['total_marks'];
                $onesubject_total_marks += $v1['total_marks'];            
            }

            $no_of_subjects++;
            if($total_obtained_marks >= $total_passing)  //condition to check in how many subjects student is passing
            {            $no_of_passing_subjects++;        }
        
            $g_marks = ($total_obtained_marks*100)/$onesubject_total_marks;
            if($total_obtained_marks < $total_passing)
            {echo "<td style='background-color:lightgrey' class ='nowrap'>".$marks_obtained.'/'.check_grade($g_marks). '</td>';} // marks obtained in one subject including all exams
            else
            {
            echo '<td class = "nowrap">'  .$marks_obtained.'/'.check_grade($g_marks). '</td>';
            }

            $grand_total += $total_obtained_marks;          // adding marks obtained by student in all subjects
            $max_marks += $onesubject_total_marks;          // adding total_marks of all subjects
        }

       $percent = round((($grand_total*100) / $max_marks),2) ;
       

        if($no_of_subjects == $no_of_passing_subjects)
        {echo '<td>' .$no_of_subjects . '</td>';}
        else{
        echo '<td style="padding:0px 2px;">' .$no_of_passing_subjects. '</td>';
        }
        echo '<td>' .' '. '</td>';
            
        echo '</tr>';
    }
echo "</table>";
echo "</div>";
echo "</section>";

}


//-----------------------------------------Report of class 9th n 10th----------------------------------------------------------
else
{
    ?>
    <section style="margin-top:40px;text-align:center;" onload="setTimeout(myFunction(), 3000)">
        <style>
            pre {
                overflow: unset;
                text-align: left !important;
            }
        </style>
    <div class="class_report_div" style="display: inline-block;">

    <br>

    <table style="width:auto; border:1px solid black; border:1;" border="1px">
    <?php

    $array_data = $student_array_data[0]['exam_info'];
    // echo print_array($array_data);die();
    $grade_subjects = ['computer','p.t.','s.g.','ict','p.d.', 's.v.k.','r.s.p.'];
    $combined_subs = [];
    $combined_sub_groups = [];
    $temp_data = array_values($array_data['data']);

    foreach ($temp_data as $k5 => $v5) {
        if(strpos(strtolower($v5['subject_name']),'maths') !== FALSE) {
            $combined_sub_groups['maths'][$v5['subject_id']] = $v5['subject_id'];
            $combined_subs[$v5['subject_id']] = 'maths';
        
        }elseif(strpos(strtolower($v5['subject_name']),'science') !== FALSE) {
            $combined_sub_groups['science'][$v5['subject_id']] = $v5['subject_id'];
            $combined_subs[$v5['subject_id']] = 'science';

        }elseif(strpos(strtolower($v5['subject_name']),'history') !== FALSE || strpos(strtolower($v5['subject_name']),'geography') !== FALSE) {
            $combined_sub_groups['social_science'][$v5['subject_id']] = $v5['subject_id'];
            $combined_subs[$v5['subject_id']] = 'social_science';
        }
    }

    $temp2 = [];
    foreach ($temp_data as $k5 => $v5) {            //loop to add marks of 2 subjects for eg: Maths 1 + Maths 2, Hist + Geog
        if(strpos($v5['subject_name'],'1',0) !== FALSE) {
            $strsize = strlen($v5['subject_name']) - (strlen($v5['subject_name']) - (strpos($v5['subject_name'],'1',0) - 1));
            $tester = trim(substr($v5['subject_name'],0,$strsize));

            foreach ($temp_data as $k6 => $v6) {
                if(($tester == substr($v6['subject_name'],0,$strsize)) && ($v6['subject_name'] != $v5['subject_name'])) {
                    
                    $temp3 = $v6;
                    $temp3['subject_name'] = $tester.'';
                    $temp3['combined'] = '1';     

                    foreach ($v6['exam'] as $k7 => $v7) {
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
                    $v5['sub_divided'] = '1';
                    $temp2[] = $v5;
                    $temp2[] = $temp3;
                }
            }
        } elseif(trim(strtolower($v5['subject_name']))=="history") {
            foreach ($temp_data as $k6 => $v6) {
                if(strtolower($v6['subject_name']) == 'geography') {
                    $temp3 = $v6;
                    $temp3['subject_name'] = 'Social Science';
                    $temp3['combined'] = '1';
                    $temp3['no_total'] = '1';//In mark-sheet dont show total

                    foreach ($v6['exam'] as $k7 => $v7) {
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
                    $v5['sub_divided'] = '1';
                    $v5['no_total'] = '1';//In mark-sheet dont show total

                    $temp2[] = $v5;
                    $temp2[] = $temp3;
                }
            }
        } else {
            //If subject contains 2 (e.g:Science 2, Maths 2, etc) then mark it is as divided subject
            if(strpos($v5['subject_name'],'2',0) !== false) {
                    $v5['sub_divided'] = '1';
            }
            //If subject is geography then mark it is as divided subject
            if(strtolower($v5['subject_name']) == 'geography') {
                    $v5['sub_divided'] = '1';
                    $v5['no_total'] = '1';//In mark-sheet dont show total
            }
            $temp2[] = $v5;
        }
    }
    // echo print_array($temp2);die;
    $subject_order = [];

    // Displaying all headers/headings... 
    echo '<th>' . "Sr. No." . '</th>';
    echo '<th>' . "Roll No." . '</th>';
    echo '<th>' . "Name of the Student" . '</th>';
    foreach($temp2 as $key => $value)
    {
        if (isset($value['sub_divided'])) {
            continue;
        }
        $subject_order[$value['subject_id']] = $value['subject_id'];
        if(strlen($value['subject_name'])>9) {
         echo '<th style="word-wrap:break-word";>' . $value['subject_name'] . '</th>';
         }
         else {
           echo '<th class="nowrap">' . $value['subject_name'] . '</th>'; 
         }
    }
    echo '<th style="padding:0% 1%">' . 'Grand' .'<br>'.'Total' . '</th>';
    echo '<th style="padding:0% 1%">' . '%' . '</th>';
    // echo '<th style="padding:0% 1%">' . 'Avg of 600' . '</th>';
    echo '<th>'. 'No. of'.'<br>'.'passing'.'<br>'.'subjects' .'</th>';
    echo '<th style="width:15%">'. 'Remarks' .'</th>';


// Row to print Max_marks in each subject
    $grand_total=0;
    $graded_subs = [];
    echo "<tr><td></td><td></td><td>Max Marks</td>";
    foreach($temp2 as $k => $v)    
    { 
        if(isset($v['sub_divided'])){
            continue;
        }        
        $total_obtained_marks=0;
        $total_passing =0;
        $onesubject_total_marks=0;
        $grade_subject_total_marks="";
        $temp= str_replace(' ','_',(strtolower(trim($v['subject_name']))));
        foreach ($v['exam'] as $k1 => $v1)
        {
            if(!in_array($temp,$grade_subjects))
            {
                $v1['total_marks'] = (($v1['total_marks']) =='-') ? 0 : $v1['total_marks'];
                $onesubject_total_marks += $v1['total_marks'];
            }else{
                $graded_subs[$v['subject_id']] = $v['subject_id'];
            }            
        }
        if($onesubject_total_marks==0)  //If subject is a grade subject
        {
            $avg=0;
            echo "<td>"."-"."</td>";
        }
        else
        {
            $avg = ($onesubject_total_marks > 200) ? round($onesubject_total_marks/3) : round($onesubject_total_marks/2);
            echo "<td>".$avg ."</td>";
        }
            $grand_total +=$avg;
    }
    
    echo "<td>".$grand_total."</td><td></td><td></td><td></td></tr>";
// Max_marks row ends 

//Displaying student names and marks
    $sr_no = 1;
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
                
        $max_marks=0;
        $no_of_passing_subjects=0;
        $no_of_subjects=0;
        $sub_wise_total = [];
        foreach($v['exam_info']['data'] as $key => $marks)     
        {
            $total_obtained_marks=0;
            $total_passing =0;
            $onesubject_total_marks=0; 
            $grade_subject_total_marks=0; 
            $grade_total_obtained_marks=0;      
            $temp= str_replace(' ','_',(strtolower(trim($marks['subject_name']))));  
            // echo $marks['subject_name'];
            // echo print_array(array_column($marks['exam'],'passing_marks'));
            // echo print_array(array_column($marks['exam'],'total_marks'));

            foreach ($marks['exam'] as $k1 => $v1)
            {

                (!isset($sub_wise_total[$marks['subject_id']]['sub_obt'])) ? $sub_wise_total[$marks['subject_id']]['sub_obt'] = 0 :FALSE;
                (!isset($sub_wise_total[$marks['subject_id']]['sub_max'])) ? $sub_wise_total[$marks['subject_id']]['sub_max'] = 0 :FALSE;
                (!isset($sub_wise_total[$marks['subject_id']]['sub_pass'])) ? $sub_wise_total[$marks['subject_id']]['sub_pass'] = 0 :FALSE;
                $sub_wise_total[$marks['subject_id']]['sub_obt'] += $v1['marks_obtained'];
                $sub_wise_total[$marks['subject_id']]['sub_max'] += $v1['total_marks'];
                $sub_wise_total[$marks['subject_id']]['sub_pass'] += $v1['passing_marks'];

                // if(!in_array($temp,$grade_subjects))
                // {
                //     $v1['marks_obtained'] = (($v1['marks_obtained']) =='-') ? 0 : $v1['marks_obtained'];
                //     $v1['passing_marks'] = (($v1['passing_marks']) =='-') ? 0 : $v1['passing_marks'];
                //     $v1['total_marks'] = (($v1['total_marks']) =='-') ? 0 : $v1['total_marks'];
                //     $total_passing += $v1['passing_marks'];
                //     $total_obtained_marks += $v1['marks_obtained'];
                //     $onesubject_total_marks += $v1['total_marks'];            
                // }
                // else{
                //     $v1['passing_marks'] = (($v1['passing_marks']) =='-') ? 0 : $v1['passing_marks'];
                //     $v1['marks_obtained'] = (($v1['marks_obtained']) =='-') ? 0 : $v1['marks_obtained'];
                //     $v1['total_marks'] = (($v1['total_marks']) =='-') ? 0 : $v1['total_marks'];
                //     $total_passing += $v1['passing_marks'];
                //     $grade_subject_total_marks += $v1['total_marks'];      
                //     $grade_total_obtained_marks += $v1['marks_obtained'];
                // }
            }

            // $no_of_subjects++;
            // if($total_obtained_marks >= $total_passing)  //condition to check in how many subjects student is passing
            // {            $no_of_passing_subjects++;        }
        
            
            // if(in_array($temp,$grade_subjects))
            // {  $g_marks = 0;
            //   if($grade_total_obtained_marks > 0 && $grade_subject_total_marks > 0){
            //         $g_marks = ($grade_total_obtained_marks*100)/$grade_subject_total_marks;
            //     }
            
            // if($grade_total_obtained_marks < $total_passing)
            // {echo "<td style='background-color:lightgrey'>".check_grade_9_10($g_marks). '</td>';} // marks obtained in one subject including all exams
            // else
            // {
            // echo '<td>'.check_grade_9_10($g_marks). '</td>';
            // }


            // }
            // else
            // {   if($total_obtained_marks < $total_passing)
            //     {echo "<td style='background-color:lightgrey'>" .$total_obtained_marks. '</td>';} // marks obtained in one subject including all exams
            //     else
            //     { echo '<td>' .$total_obtained_marks. '</td>'; }
            // }

            // $grand_total += $total_obtained_marks;          // adding marks obtained by student in all subjects
            // $max_marks += $onesubject_total_marks;          // adding total_marks of all subjects
        }

        foreach ($subject_order as $k1 => $v1) {
            //$v1: subject_id
            if (isset($sub_wise_total[$v1])) {
                if (isset($combined_subs[$v1])) {
                    $style='';
                    $subject_ids = array_keys($combined_sub_groups[$combined_subs[$v1]]);
                    $subj_obt_tot = ($sub_wise_total[$subject_ids[0]]['sub_obt']+$sub_wise_total[$subject_ids[1]]['sub_obt'])/2;
                    $grand_total += round($subj_obt_tot);
                    $max_marks += round(($sub_wise_total[$subject_ids[0]]['sub_max']+$sub_wise_total[$subject_ids[1]]['sub_max'])/2);
                    // ($subj_obt_tot >= ($sub_wise_total[$subject_ids[0]]['sub_pass']+$sub_wise_total[$subject_ids[1]]['sub_pass']/2)) ? $no_of_passing_subjects++ : FALSE; 
                    (round($subj_obt_tot) >= 35) ? $no_of_passing_subjects++ : $style = 'font-weight:bolder;background:#e5e5e5;'; 
                    // echo print_array($sub_wise_total[$subject_ids[0]]['sub_pass']);
                    // echo print_array($sub_wise_total[$subject_ids[1]]['sub_pass']);
                    // echo "<br>";
                    echo "<td style=".$style.">".round($subj_obt_tot)."</td>";
                }else{
                    $style = '';
                    $mark_obt = (isset($graded_subs[$v1])) ? check_grade_9_10(ceil(($sub_wise_total[$v1]['sub_obt']*100)/$sub_wise_total[$v1]['sub_max'])) : round($sub_wise_total[$v1]['sub_obt']/3);
                    $grand_total += (isset($graded_subs[$v1])) ? 0 : $mark_obt;
                    $max_marks += (isset($graded_subs[$v1])) ? 0 : round($sub_wise_total[$v1]['sub_max']/3);
                    if (!isset($graded_subs[$v1])) {
                        if($mark_obt >= 35) { $no_of_passing_subjects++;}
                        else{ $style = 'font-weight:bolder;background:#e5e5e5;';}
                    }
                    echo "<td style=".$style.">".$mark_obt."</td>";
                }
            }
        }
        echo '<td>' .round($grand_total)/*."/".$max_marks*/. '</td>';  // total marks obtained in all subjects
        $percent = 0;
        if($grand_total > 0 && $max_marks > 0){
            $percent = round((($grand_total*100) / $max_marks),2) ;
        }
        echo '<td style="padding:0% 1%">' .round($percent) . '</td>';
        // echo '<td style="padding:0% 1%">' . calc_avg_of_600($grand_total,$max_marks) . '/600</td>';

        if($no_of_subjects == $no_of_passing_subjects)
        {echo '<td>' .$no_of_subjects . '</td>';}
        else{
        echo '<td style="padding:0px 2px;">' .$no_of_passing_subjects. '</td>';
        }
        echo '<td>' .' '. '</td>';
            
        echo '</tr>';
    }

}
?>

</table>
</div>
</section>
<script>
    $(document).ready(function() {
        $("table").jsdragtable();
    });
</script>
<footer class="page-break"></footer>
