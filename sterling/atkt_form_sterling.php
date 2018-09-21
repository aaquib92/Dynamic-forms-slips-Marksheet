<?php
	$global_arr = [];
	$academic_year = $id = "";
	if( isset($data['stud_id'])){
		$id = $stud_id;
		$global_arr = get_student_by_id($id);
	}
	$academic_year = date('m')<6 ? (date('Y')-1)." - ".date('Y') : date('Y')." - ".(date('Y')+1);
	$date = date('d/m/Y', time());
	// $stud_id = $global_arr['student_details'][0]['user_id'];
	$stud_first_name = (isset($global_arr['student_details'][0]['first_name']) && !empty($global_arr['student_details'][0]['first_name'])) ? $global_arr['student_details'][0]['first_name']:'';
	$stud_middle_name = (isset($global_arr['student_details'][0]['middle_name']) && !empty($global_arr['student_details'][0]['middle_name'])) ? $global_arr['student_details'][0]['middle_name']:'';
	$stud_last_name = (isset($global_arr['student_details'][0]['last_name']) && !empty($global_arr['student_details'][0]['last_name'])) ? $global_arr['student_details'][0]['last_name']:'';
	$stud_class   = (isset($global_arr['student_selected_class'][0]['standard']) && !empty($global_arr['student_selected_class'][0]['standard']))?''.$global_arr['student_selected_class'][0]['standard'].' '.$global_arr['student_selected_class'][0]['section']:'';
	$stud_img     = (isset($global_arr['student_details'][0]['image']) && !empty($global_arr['student_details'][0]['image']))?''.$global_arr['student_details'][0]['image'].'':'';
    $stud_school_name = get_session_data()['profile']['partner_name'];
	
// $stud_school_addr = (isset($global_arr['school_info']['address']) && !empty($global_arr['school_info']['address']))?''.$global_arr['school_info']['address'].'':'';
$stud_school_addr = get_session_data()['profile']['address'];
// $stud_school_logo = (isset($global_arr['school_info']['logo']) && !empty($global_arr['school_info']['logo']))?''.$global_arr['school_info']['logo'].'':get_session_data()['profile']['logo'];
$stud_school_logo = get_session_data()['profile']['logo'];
// echo print_array($global_arr);die('Reached End');
?>
<section style="margin:0 auto;text-align:center" onload="setTimeout(myFunction(), 3000)">

<style>
.sub_chip{
		background-color: #DDD;
    padding: 0.7%;
    font-size: 60%;
	border-radius:25px;
    margin: 0.3%;
    width: fit-content;
    display: inline-block;
	}
.size{font-size:90%; text-align:left;}
	.t{width:25%;}
	.t2{width:10%;}
	div{
		/*width: 100%;*/
	}
	.sub_chip{
		background-color: #DDD;
    padding: 0.7%;
    font-size: 60%;
	border-radius:25px;
    margin: 0.3%;
    width: fit-content;
    display: inline-block;
	}
	select{display:initial;background: none;height:initial;width:initial;border: none;padding:none;}
	/*tr{all: initial;}*/
	table.bonafide{border:1px solid black;border-collapse: collapse;}
	.bonafide tbody,thead,th,tr,td{text-align:center;border:1px solid black;border-collapse: collapse;font-size:0.7rem;}
	/*td{font-size:0.9rem;}*/
	@media print{
/*		#mySelect{display: none;}
		.sem_select_value{display:block;}*/
		#main_content {margin-top:-8%;}
		* {-webkit-print-color-adjust:exact;}
		select{-webkit-appearance: none;-moz-appearance: none;appearance: none;border: none;background: none;height:initial;width:initial;padding:none;}
		.print_hidden{display:none !important;}
		#profile_file{display:none;}
	}
/*	.div_input{width:480px;line-height:30px;margin-left:20px;text-align:left;font-size:100%; display: block; }
	.main_div_bonafide{width:500px;text-align:center;margin-top:5vh;display:inline-block; border:solid black 1px; padding-bottom:10px; height:600px;}*/
	@page {margin: 1%;size: portrait; /* auto is the initial value */}
	.stude_name_border{border-top: 0 !important;border-left: 0 !important;border-right: 0 !important;}
	span{border:0};
	
</style>

<div class="page-break main_div_bonafide">

	<img src="<?php echo $stud_school_logo ;?>" style="float:left;padding-left:20px;" width="70" height="70"/>
	<h4> 
	<?php echo  $stud_school_name ; ?>
	</h4>
	<span style="font-size:14px; font-weight:bold;">
	<?php echo $stud_school_addr;?>
	</span>
    <br>
   <div> <center>EXAMINATION ADMIT CARD</center><span style="float:right"></span></div><br>
   <table style="border:0 !important;width: 100%;">
			<tbody>
				<tr>
					<td style="border:0 !important;"><b style="font-size:1.3em;">Class:&emsp;<?php echo $stud_class;?> &emsp;&emsp;Semister:&emsp;</b><input style="border:none !important;" size="50" type="text" value ="1"> </td>
				</tr>
			</tbody>
		</table>
    <!--<div><span style="float:left;">Class:- F.Y B.Com</span> <input type="text" id="srt"> &emsp;&emsp;&emsp; Exam:-ATKT<span style="float:right;width:15%; height:4%;border:1px solid black;"></span> </div><br>-->
<br>
       <span style="float: left;">Name of the Student: <input class="student_name" size="50"  type="text" style="border-right: 0;border-left: 0;border-top: 0;border-bottom: 1px solid #000;" value ="<?php echo $stud_last_name.'&nbsp;'.$stud_first_name.'&nbsp;'.$stud_middle_name ; ?>">  </span><br><br>

			<!--<div id="selected_subject"></div>-->
			   <!--<img  src="<?=base_url()?>/assets/images/student_placeholder.jpg" width="70" height="90" style="float:right; margin-top:0;" >
			     <input type="file" id="profile_file" onchange="readURL(this);" >-->
				  <!--<div class="input-field col s3 offset-s9">-->
				  <div  style="float:right;margin-top:-2%;">
                    <img src="<?php echo $stud_img?>"   width="70" height="90" ><br>
					
                        <!--<input type="file" id="profile_file" onchange="readURL(this);"  styl="float:right;"><br>-->
                    <br>
					<br><b>Principal</b>
						
						</div>
                    <br>
			<div><b>Subjects:</b>

		<?php foreach($global_arr['student_selected_subjects']  as $val):?>
	<div class="sub_chip">
           <?php echo $val['name'] ?>
			</div>
			 <?php endforeach;?>
		
		<hr>
        <!--<img  src="<?=base_url()?>/assets/images/student_placeholder.jpg" width="70" height="90" style="float:right; margin-top:0;" >-->
		<p class="size"> NOTE:</p>
		<p class="size">1 Candidate must be present in exam hall in 15 minutes before exam Time</p>
		<p class="size">2.Mobile phone is strictly prohibited in examination hall</p>
		<p class="size">3 Candidate must preserve and produce this card along with I-card on each session of the examination without which admission to the examination may be disallowed</p>
        <!--<ol>
           Note:- <li>Candidate must bee present in exam hall in 15 minutes before exam Time.</li>
            <li>Mobile phone is strictly prohibited in examination hall</li>
            <li>Candidate must preserve and produce this card along with I-card on each session of the examination without which admission to the examination may be disallowed</li>
        </ol>-->
	</div>
	</div>
</div>

