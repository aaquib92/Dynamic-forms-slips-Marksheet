
<script src="<?php echo base_url().'assets/js/jquery-3.1.0.min.js';?>"></script>
<section style="margin:0 auto;text-align:center" onload="setTimeout(myFunction(), 3000)">

<style>
.size{font-size:58%;}
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
	}
/*	.div_input{width:480px;line-height:30px;margin-left:20px;text-align:left;font-size:100%; display: block; }
	.main_div_bonafide{width:500px;text-align:center;margin-top:5vh;display:inline-block; border:solid black 1px; padding-bottom:10px; height:600px;}*/
	@page {margin: 1%;size: portrait; /* auto is the initial value */}
	.stude_name_border{border-top: 0 !important;border-left: 0 !important;border-right: 0 !important;}
	span{border:0};
	
</style>

<div class="page-break main_div_bonafide">
	<img src="<?=base_url()?>/assets/images/ncrd2.png" style="float:left;padding-left:20px;" width="70" height="70"/>
	<h5>National Centre for Rural Developement's</h5>
	<h4> 
	Sterling College of Arts,Commerce & Science
	</h4>
	<span style="font-size:14px; font-weight:bold;">
	D.G.Walse Patil Marg, Plot No.-43, Sec-19, Nerul East
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
				<select class="mySelect" id="select_val" onchange="myChangeFunction(this)" style="font-weight:700;">;
					<option value="0">Select Semister</option>
					<option value="first_sem" data-id="First Semister">First Sem</option>
					<option value="second_sem"  data-id="Second Semister">Second Sem</option>
					<option value="third_sem"  data-id="Third Semister">Third Sem</option>
					<option value="fourth_sem"  data-id="Fourth Semister">Fourth Sem</option>
				</select>
				<!-- <span class="sem_select_value"></span> -->
			</b> Examination 2016-2017 of  
				<select id="select_class" onchange="ChangeFunction()" style="font-weight:700;">;
					<option value="">Select Class</option>
					<option value="" data-id="FY B.Com">FY B.Com<option>
					<option value=""  data-id="SY B.Com">SY B.Com</option>
					<option value=""  data-id="TY B.Com">TY B.Com</option>
				</select>
		</p>
	</div>
	<div style="text-align:left;">
		<span style="text-align: left;">Name in full BLOCK CAPITAL LETTERS : (Beginning with surname)</span><br>
		<table style="border:0 !important;width: 100%;">
			<tbody>
				<tr>
					<td style="border:0 !important;">Surname <input type ="text"></td>
					<td style="border:0 !important;">Name  <input type ="text"></td>
					<td style="border:0 !important;">Father's Name <input type ="text"></td>
                    <td style="border:0 !important;">Mother's Name <input type ="text"></td>
				</tr>
			</tbody>
		</table><br>
			<button id="confirm" onclick ="confirmFunction()" >Confirm</button>
	<div id="tabDiv" style="width:100%;"></div><br>
   <div> <span style="float: left;">Date ______________  </span> <span style="float:right;">Signature of Student ________________ </span></div><br><hr style="border:2px solid black;">
<img src="<?=base_url()?>/assets/images/ncrd2.png" style="float:left;padding-left:20px;" width="70" height="70"/>
<center><h4> 
	Sterling College of Arts,Commerce & Science
	</h4>
	<span style="font-size:14px; font-weight:bold;">
	D.G.Walse Patil Marg, Plot No.-43, Sec-19, Nerul East
	</span>
</center>
    <br>
   <div> <center>EXAMINATION ADMIT CARD</center><span style="float:right"></span></div><br>
   <table style="border:0 !important;width: 100%;">
			<tbody>
				<tr>
					<td style="border:0 !important;"><b style="font-size:2em;">Class:</b>&emsp;<input style="border:none !important;" type="text" id="cls"> <input style="border:none !important;" type="text" id="srt"> </td>
					<!--<td style="border:0 !important;"><input style="border:none !important;" type="text" id="srt"> </td>-->
					<td style="border:0 !important;">Exam:-ATKT </td>
					<td style="border:none !important;"><input style="border:none !important;" type="text" placeholder="Exam Seat No_________________"> </td>
				</tr>
			</tbody>
		</table>
    <!--<div><span style="float:left;">Class:- F.Y B.Com</span> <input type="text" id="srt"> &emsp;&emsp;&emsp; Exam:-ATKT<span style="float:right;width:15%; height:4%;border:1px solid black;"></span> </div><br>-->

       <span style="float: left;">Name of the Student: <input class="mother_name" type="text" style="border-right: 0;border-left: 0;border-top: 0;border-bottom: 1px solid #000;"> </span><br><br>
		<span style="float: left;">Signature Of Student.: <input class="mother_name" type="text" style="border-right: 0;border-left: 0;border-top: 0;border-bottom: 1px solid #000;"> </span><br><br>
			<!--<div id="selected_subject"></div>-->
			   <img  src="<?=base_url()?>/assets/images/student_placeholder.jpg" width="70" height="90" style="float:right; margin-top:0;" >
			<!--<table id="selected_subject"  style="width:100%;" ><tr></tr></table>-->
			<div><b>Subjects:</b>

		<div style="" id="selected_subject">		</div>


			</div>
		
		<hr>
        <!--<img  src="<?=base_url()?>/assets/images/student_placeholder.jpg" width="70" height="90" style="float:right; margin-top:0;" >-->
		<p class="size"> NOTE:</p>
		<p class="size">1 Candidate must bee present in exam hall in 15 minutes before exam Time</p>
		<p class="size">2.Mobile phone is strictly prohibited in examination hall</p>
		<p class="size">3 Candidate must preserve and produce this card along with I-card on each session of the examination without which admission to the examination may be disallowed</p>
        <!--<ol>
           Note:- <li>Candidate must bee present in exam hall in 15 minutes before exam Time.</li>
            <li>Mobile phone is strictly prohibited in examination hall</li>
            <li>Candidate must preserve and produce this card along with I-card on each session of the examination without which admission to the examination may be disallowed</li>
        </ol>-->
	</div>
</div>
</section>

<script>
var first_sem = [
'FINANCE ACCOUNTING- I'
,'COST ACCOUNTING - I'
,'BUSINESS ECONOMICS -I'
,'COMMERCE - I'
,'BUSINESS COMMUNICATION '
,'FOUNDATION COURSE-I '
,'BUSINESS ENVIRONMENT'
,'FINANCIAL MANAGEMENT'];

var second_sem = [
'FINANCE ACCOUNTING- II'
,'AUDITING - I'
,'FINANCIAL MANAGEMENT - I '
,'TAXATION - I'
,'BUSINESS LAW-I'
,'QUANTITATIVE METHODS FOR BUSINESS-I'
,'BUSINESS COMMUNICATION-II '
,'TAXATION'];

var third_sem = [
'FINANCE ACCOUNTING- II'
,'COST ACCOUNTING - II '
,'AUDITING - III'
,'ECONOMICS - II'
,'PRINCIPAL OF MANAGEMENT-I'
,'BUSINESS LAW-II'
,'QUANTITATIVE METHOD FOR BUSINESS'];

var fourth_sem = [
'FINANCIAL ACCOUNTING-IV'
,'MANAGEMENT ACCOUNTING - I'
,'TAXATION- II'
,'COMMERCE - II(F.M.O)'
,'BUSINESS LAW– I'
,'INFORMATION TECHNOLOGY-II'
,'FOUNDATION COURSE - II'];
function myChangeFunction(ele,stud_id) {
var x = ele.value;
// console.log(x);
var sem = eval(x);
// document.getElementsByClassName('sem_select_value')[0].innerHTML = x;
// console.log(first_sem);
var table = '<table class="bonafide" style="width:100%;"><tbody>';
var row = '';
table += "<tr><th class='print_hidden'>Actions</th><th>Sr. No.</th><th>"+x.toUpperCase().replace('_',' ')+"</th><th>THEORY</th><th>INTERNAL</th><th>Remark</th></tr>";
for (var i = 0; i < sem.length; i++) {
row += "<tr><td class='print_hidden'><button class='remove_me' style='color:red;'>X</button></td><td>" +(i+1)+ "</td><td class='subs'>" + sem[i] + "</td><td><input type='checkbox' id='test5' /><label for='test5'></label></td><td><input type='checkbox' id='test6' /><label for='test6'></label></td><td></td></tr>";
}
table += row;
table += '</tbody></table>';
// document.getElementById("tabDiv").innerHTML = table;
  document.getElementById("tabDiv").innerHTML = table;
    //   document.getElementById("tabDiv1").innerHTML = table;
	//    document.getElementById("srt").value = document.getElementById("select_val").value;
	var subject_name = $('#select_val').find('option:selected').attr('data-id');

 $('#srt').val(subject_name);
}



function ChangeFunction(){

		var class_name = $('#select_class').find('option:selected').attr('data-id');

 $('#cls').val(class_name);

}
function confirmFunction() {
	$('#selected_subject').empty();
$('.subs').each(function() {
	
	var theory = '';
	var internal = '';
	if($(this).next().find('input').is(':checked')){
		theory = '<b>Theory</b>';
	}
	if($(this).next().next().find('input').is(':checked')){
		internal = '<b>Internal</b>';
	}
	 var subject = '<div class="sub_chip">'+$(this).html() +'  &emsp;'+ theory + ' &emsp;'+ internal+'</div>';

	//   var subject = $(this).html()+'<br>' ;

	// console.log((subject))
		// $('#thr').append(theory)
		// $('#int').append(internal)
	$('#selected_subject').append(subject)
		
 });

}



// var subject_name = $('#select_val').find('option:selected').attr('data-id');

// $('#srt').html(subject_name);




// function up() {

//     //if (document.getElementById("srt").value != "") {
//         var dop = document.getElementById("srt").value;
//     //}
//     pop(dop);

// }

// function pop(val) {
//     alert(val);
// }
$(document).ready(function(){
	$('body').delegate('.remove_me','click',function(){
		$(this).parent().parent().remove();
	});

	

});
</script>
