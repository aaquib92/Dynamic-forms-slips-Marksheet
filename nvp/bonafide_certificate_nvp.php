<?php      
 $global_arr = array();
$academic_year = "";
$id = "";
if( isset($data['stud_id']))
{
  $id = $stud_id;
  $global_arr = get_student_by_id($id);
}

if(date('m')<6)
{
$academic_year = (date('Y')-1)." - ".date('Y');
}
else
{
$academic_year = date('Y')." - ".(date('Y')+1);
}

$date = date('d/m/Y', time());
$stud_name  = (isset($global_arr['student_details'][0]['first_name']) && !empty($global_arr['student_details'][0]['first_name']))?''.$global_arr['student_details'][0]['first_name'].' '.$global_arr['student_details'][0]['middle_name'].'    '.$global_arr['student_details'][0]['last_name'].'':
$originalDate =  (isset($global_arr['student_details'][0]['dob']) && !empty($global_arr['student_details'][0]['dob']))?''.$global_arr['student_details'][0]['dob'].'':'';;
$newDate = date("d-m-Y", strtotime( (isset($global_arr['student_details'][0]['dob']) && !empty($global_arr['student_details'][0]['dob']))?''.$global_arr['student_details'][0]['dob'].'':''));
$stud_gender    = (isset($global_arr['student_details'][0]['gender']) && !empty($global_arr['student_details'][0]['gender']))? $global_arr['student_details'][0]['gender'] : '';
if($stud_gender == 'male'){
    $var = "his";
    $var2 ="His";
}else{
     $var = "her";
     $var2 ="Her";
}
$stud_school_name = get_session_data()['profile']['partner_name'];
?> 
<style>
p { 
    word-spacing: 15px;
	 line-height: 200%;
	 text-align: justify;
    text-justify: inter-word;
	font-size: 20px
	
}
hr{
margin : 1px;
}
@page {
      size: landscape;   /* auto is the initial value */
      margin:1%;
   }
       @media print
   {
       span{border:none}
    * {-webkit-print-color-adjust:exact;}      
   }


</style>
<section class="page-break">
<center>
<div style="width:55%; border:1px solid black; padding:20px">

<b>Sai Shraddha Foundation</b><br>
<h4 style="margin:1px;font-size:1.5em;font-weight:700;"> <?php  echo $stud_school_name ;?></h4> 
<hr>
Trust Office : Ground floor, Madhukunj Building, Near S.T.Stand Alibag, Dist Raigad.<br>
Tel : - 02141-325548 / 8390909470 / 8390909478 
<hr>
SCHOOL AT : Bandhan, Tal Alibag, Dist Raigad<hr>
<br>
<span style="float:left"> Ref. No: </span>
<span style="float:right"> Date: <?php echo $date; ?></span>
<br><br>
<b>BONAFIDE CERTIFICATE </b>
<br> <br>
<p>
	This is to certify that Kumar. <b><?php echo $stud_name;?> </b> is bonafied student of this school. Studying in std. <b> <?php echo (isset($global_arr['student_selected_class'][0]['standard']) && !empty($global_arr['student_selected_class'][0]['standard']))?''.$global_arr['student_selected_class'][0]['standard'].' '.$global_arr['student_selected_class'][0]['section'].'':'';?></b> , in the year
	<b> <?php echo $academic_year; ?> </b>. 
	 <?php echo $var2 ; ?> birth date as per G.R. is <?php echo $newDate;?> 
	place of birth is <?php echo (isset($global_arr['student_details'][0]['place_of_birth']) && !empty($global_arr['student_details'][0]['place_of_birth']))?''.$global_arr['student_details'][0]['place_of_birth'].'':'';?>, and  <?php echo $var ; ?> G.R. No. is <?php echo (isset($global_arr['student_details'][0]['gr_number']) && !empty($global_arr['student_details'][0]['gr_number']))?''.$global_arr['student_details'][0]['gr_number'].'':'________________________';?>.
	</p>
	<br><br><br><br>
</div>
</center>
</section>