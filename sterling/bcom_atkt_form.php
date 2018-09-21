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
	// echo print_array($global_arr);die('Reached End');
?>
<script src="<?php echo base_url().'assets/js/jquery-3.1.0.min.js';?>"></script>
<section style="margin:0 auto;text-align:center" onload="setTimeout(myFunction(), 3000)">

<style>
	.t{width:25%;}
	.t2{width:10%;}
	div{
		width: 100%;
	}
	select{display:initial;background: none;height:initial;width:initial;border: none;padding:none;}
	/*tr{all: initial;}*/
	table.bonafide{border:1px solid black;border-collapse: collapse;}
	.bonafide tbody,thead,th,tr,td{text-align:center;border:1px solid black;border-collapse: collapse;font-size:0.7rem;}
	/*td{font-size:0.9rem;}*/
	@media print{
/*		#mySelect{display: none;}
		.sem_select_value{display:block;}*/
		#main_content {margin-top:-8%}
		* {-webkit-print-color-adjust:exact;}
		select{-webkit-appearance: none;-moz-appearance: none;appearance: none;border: none;background: none;height:initial;width:initial;padding:none;}
		.print_hidden{display:none !important;}
	}
/*	.div_input{width:480px;line-height:30px;margin-left:20px;text-align:left;font-size:100%; display: block; }
	.main_div_bonafide{width:500px;text-align:center;margin-top:5vh;display:inline-block; border:solid black 1px; padding-bottom:10px; height:600px;}*/
	@page {margin: 5%;size: portrait; /* auto is the initial value */}
	.stude_name_border{border-top: 0 !important;border-left: 0 !important;border-right: 0 !important;}
	span{border:0};
	
</style>

<div class="page-break main_div_bonafide">
	<img src="<?php echo (isset($global_arr['school_info']['logo']) && !empty($global_arr['school_info']['logo']))?''.$global_arr['school_info']['logo']:'';?>" style="float:left;padding-left:20px;" width="70" height="70"/>
	<h4> 
		<?php echo (isset($global_arr['school_info']['partner_name']) && !empty($global_arr['school_info']['partner_name']))?''.$global_arr['school_info']['partner_name']:'School/College Name';?>
	</h4>
	<span style="font-size:14px; font-weight:bold;">
		<?php echo (isset($global_arr['school_info']['address']) && !empty($global_arr['school_info']['address']))?''.$global_arr['school_info']['address']:'School/College Address';?> 
	</span>
	<hr>
	<br>
	<div style="text-align:left;">
		<span>To,</span><br>
		<span>The Principal,</span><br>
		<span>Sterling College,</span><br>
		<span>Nerul, Navi Mumbai.</span><br>
	</div>
	<br>
	<!-- <h6>BONAFIDE CERTIFICATE</h6> -->
	<div style="text-align: left;">
		<p><span style="text-align: left;">Sir/ Madam ,</span><br>
			I request the permission to present myself at the ensuing 
			<b>
				<select class="mySelect" onchange="myChangeFunction(this,<?=$data['stud_id'];?>)" style="font-weight:700;">;
					<option value="0">Select Semister</option>
					<option value="first_sem">First Sem</option>
					<option value="second_sem">Second Sem</option>
					<option value="third_sem">Third Sem</option>
					<option value="fourth_sem">Fourth Sem</option>
				</select>
				<!-- <span class="sem_select_value"></span> -->
			</b> Examination <?=$academic_year;?> of  Bachelor of Commerce
		</p>
	</div>
	<div style="text-align:left;">
		<span style="text-align: left;">Name in full BLOCK CAPITAL LETTERS : (Beginning with surname)</span><br>
		<table style="border:0 !important;width: 100%;">
			<tbody>
				<tr>
					<td class="stude_name_border"><?=$stud_last_name;?></td>
					<td class="stude_name_border"><?=$stud_first_name;?></td>
					<td class="stude_name_border"><?=$stud_middle_name;?></td>
				</tr>
				<tr>
					<td style="border:0 !important;">Surname</td>
					<td style="border:0 !important;">Name</td>
					<td style="border:0 !important;">Father's Name</td>
				</tr>
			</tbody>
		</table>
		<br>
		<span style="text-align: left;">Mother's Name: <input class="mother_name" type="text" style="border-right: 0;border-left: 0;border-top: 0;border-bottom: 1px solid #000;"> </span><br><br>
		<span style="text-align: left;">P.R.N No.: <input class="mother_name" type="text" style="border-right: 0;border-left: 0;border-top: 0;border-bottom: 1px solid #000;"> </span><br><br>
		<span style="text-align: left;">Hall Ticket No.: <input class="mother_name" type="text" style="border-right: 0;border-left: 0;border-top: 0;border-bottom: 1px solid #000;"> </span><br><br>
		<span style="text-align: left;"><u>Have You enrolled ( Admitted) before academic year <?=$academic_year;?> Yes/ No</u></span><br><br>
		<span style="text-align: left;">Subject I wish to offer are as follows:</span>
	</div>
	<div id="tabDiv<?=$data['stud_id'];?>" style="width:100%;"></div>
	</div>
</div>
</section>

<script>
var first_sem = [
'ACCOUNTANCY AND FINANCIAL MGMT - I'
,'COMMERCE - I'
,'BUSINESS ECONOMICS -I'
,'BUSINESS COMMUNICATION - I'
,'ENVIRONMENTAL STUDIES – I'
,'MATHEMATICAL AND STATISTICAL TECHNICS-I'
,'FOUNDATION COURSE - I'];

var second_sem = [
'ACCOUNTANCY AND FINANCIAL MGMT - II'
,'COMMERCE - II'
,'BUSINESS ECONOMICS - II '
,'BUSINESS COMMUNICATION - II'
,'ENVIRONMENTAL STUDIES – II '
,'MATHEMATICAL AND STATISTICAL  TECHNICS-II'
,'FOUNDATION COURSE - II '];

var third_sem = [
'ACCOUNTANCY AND FINANCIAL MGMT - III'
,'COMMERCE - III '
,'BUSINESS LAW - I'
,'BUSINESS ECONOMICS - III'
,'COMPUTER PROGRAMMING – I'
,'FOUNDATION COURSE - III'];

var fourth_sem = [
'ACCOUNTANCY AND FINANCIAL MGMT - IV'
,'COMMERCE - IV'
,'BUSINESS ECONOMICS - IV '
,' BUSINESS LAW - II'
,'COMPUTER PROGRAMMING – II'
,'FOUNDATION COURSE - IV'];

function myChangeFunction(ele,stud_id) {
var x = ele.value;
console.log(x);
var sem = eval(x);
// document.getElementsByClassName('sem_select_value')[0].innerHTML = x;
// console.log(first_sem);
var table = '<table class="bonafide" style="width:100%;"><tbody>';
var row = '';
table += "<tr><th class='print_hidden'>Actions</th><th>Sr. No.</th><th>"+x.toUpperCase().replace('_',' ')+"</th><th>THEORY</th><th>INTERNAL</th><th>Remark</th></tr>";
for (var i = 0; i < sem.length; i++) {
row += "<tr><td class='print_hidden'><button class='remove_me' style='color:red;'>X</button></td><td>" +(i+1)+ "</td><td>" + sem[i] + "</td><td></td><td></td><td></td></tr>";
}
table += row;
table += '</tbody></table>';
// document.getElementById("tabDiv").innerHTML = table;
  document.getElementById("tabDiv"+stud_id).innerHTML = table;
}

$(document).ready(function(){
	$('body').delegate('.remove_me','click',function(){
		$(this).parent().parent().remove();
	});
});
</script>
