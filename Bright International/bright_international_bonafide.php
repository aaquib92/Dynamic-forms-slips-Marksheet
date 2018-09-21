<?php
$global_arr = array();
$academic_year = "";
$id = "";
if( isset($data['stud_id']))
{
  $id = $stud_id;
  $global_arr = get_student_by_id($id);
}
if( isset($data['id']))
{
  $doc_id = $data['id'];
  $serial_no = get_partner_documnets_log_count()[$doc_id];
}

$academic_year = (date('m') < 6) ?((date('Y')-1)." - ".date('Y')):date('Y')." - ".(date('Y')+1);

$global_arr['student_credentials']['mobile'] = !(isset($global_arr['student_credentials']['mobile']) || empty($global_arr['student_credentials']['mobile'])) ?'':FALSE;
$global_arr['student_details'][0]['phone'] = (isset($global_arr['student_details'][0]['phone']) && !empty($global_arr['student_details'][0]['phone'])) ?''.$global_arr['student_details'][0]['phone'].'':$global_arr['student_credentials']['mobile'];
$global_arr['parent_details'][0]['phone'] = (isset($global_arr['parent_details'][0]['phone']) && !empty($global_arr['parent_details'][0]['phone'])) ?''.$global_arr['parent_details'][0]['phone'].'':'';
$parent_name    = (isset($global_arr['parent_details'][0]['first_name']) && !empty($global_arr['parent_details'][0]['first_name']))?strtoupper(''.$global_arr['parent_details'][0]['first_name'].'  '.$global_arr['parent_details'][0]['last_name'].''):'';
$stud_nationality    = (isset($global_arr['student_details'][0]['nationality']) && !empty($global_arr['student_details'][0]['nationality']))?''.$global_arr['student_details'][0]['nationality'].'':'';
$stud_fname = (isset($global_arr['student_details'][0]['first_name']) && !empty($global_arr['student_details'][0]['first_name']))?strtoupper($global_arr['student_details'][0]['first_name']):'';
$stud_mname = (isset($global_arr['student_details'][0]['middle_name']) && !empty($global_arr['student_details'][0]['middle_name']))?strtoupper($global_arr['student_details'][0]['middle_name']):'';
$stud_lname = (isset($global_arr['student_details'][0]['last_name']) && !empty($global_arr['student_details'][0]['last_name']))?strtoupper($global_arr['student_details'][0]['last_name']):'';

$stud_name = $stud_lname.' '.$stud_fname.' '.$stud_mname;

$gr_number    = (isset($global_arr['student_details'][0]['gr_number']) && !empty($global_arr['student_details'][0]['gr_number']))?''.$global_arr['student_details'][0]['gr_number'].'':'';
$aadhar_no    = (isset($global_arr['student_details'][0]['aadhar_no']) && !empty($global_arr['student_details'][0]['aadhar_no']))?''.$global_arr['student_details'][0]['aadhar_no'].'':'';
$dob    = (isset($global_arr['student_details'][0]['dob']) && !empty($global_arr['student_details'][0]['dob']))?''.$global_arr['student_details'][0]['dob'].'':'';
$place_of_birth    = (isset($global_arr['student_details'][0]['place_of_birth']) && !empty($global_arr['student_details'][0]['place_of_birth']))?''.$global_arr['student_details'][0]['place_of_birth'].'':'';
$admission_year   = (isset($global_arr['student_details'][0]['admission_year']) && !empty($global_arr['student_details'][0]['admission_year']))?''.$global_arr['student_details'][0]['admission_year'].'':'';
$religion    = (isset($global_arr['student_details'][0]['religion']) && !empty($global_arr['student_details'][0]['religion']))?''.$global_arr['student_details'][0]['religion'].'':'';
$caste   = (isset($global_arr['student_details'][0]['caste']) && !empty($global_arr['student_details'][0]['caste']))?''.$global_arr['student_details'][0]['caste'].'':'';
$stud_img     = (isset($global_arr['student_details'][0]['image']) && !empty($global_arr['student_details'][0]['image']))?''.$global_arr['student_details'][0]['image'].'':'';
$stud_class   = (isset($global_arr['student_selected_class'][0]['standard']) && !empty($global_arr['student_selected_class'][0]['standard']))?''.$global_arr['student_selected_class'][0]['standard'].' '.$global_arr['student_selected_class'][0]['section']:'';
$stud_std   = (isset($global_arr['student_selected_class'][0]['standard']) && !empty($global_arr['student_selected_class'][0]['standard']))?''.$global_arr['student_selected_class'][0]['standard']:'';
$stud_div   = (isset($global_arr['student_selected_class'][0]['section']) && !empty($global_arr['student_selected_class'][0]['section']))?''.$global_arr['student_selected_class'][0]['section']:'';
$stud_roll    = (isset($global_arr['student_details'][0]['rollno']) && !empty($global_arr['student_details'][0]['rollno']))? $global_arr['student_details'][0]['rollno'] : '';
$originalDate =  (isset($global_arr['student_details'][0]['dob']) && !empty($global_arr['student_details'][0]['dob']))?''.$global_arr['student_details'][0]['dob'].'':'';;
$newDate = date("d-m-Y", strtotime( (isset($global_arr['student_details'][0]['dob']) && !empty($global_arr['student_details'][0]['dob']))?''.$global_arr['student_details'][0]['dob'].'':''));
$stud_admi_no = (isset($global_arr['student_details'][0]['admission_user_id']) && !empty($global_arr['student_details'][0]['admission_user_id']))?''.$global_arr['student_details'][0]['admission_user_id']:'';
$stud_phone   = (isset($global_arr['student_details'][0]['phone']) && !empty($global_arr['student_details'][0]['phone']))?''.$global_arr['student_details'][0]['phone'].'':$global_arr['parent_details'][0]['phone'];
$stud_addr    = (isset($global_arr['student_details'][0]['address']) && !empty($global_arr['student_details'][0]['address']))?''.$global_arr['student_details'][0]['address'].'':'';
$date = date('d/m/Y', time());
$serial_no['count'] ;


// $stud_school_name = (isset($global_arr['school_info']['partner_name']) && !empty($global_arr['school_info']['partner_name']))?''.$global_arr['school_info']['partner_name'].'':'';
$stud_school_name = get_session_data()['profile']['partner_name'];
// $stud_school_addr = (isset($global_arr['school_info']['address']) && !empty($global_arr['school_info']['address']))?''.$global_arr['school_info']['address'].'':'';
$stud_school_addr = get_session_data()['profile']['address'];
// $stud_school_logo = (isset($global_arr['school_info']['logo']) && !empty($global_arr['school_info']['logo']))?''.$global_arr['school_info']['logo'].'':get_session_data()['profile']['logo'];
$stud_school_logo = get_session_data()['profile']['logo'];
 // echo print_array($global_arr);die();
?>
<section onload="setTimeout(myFunction(), 3000)">
<script>
var dob_text =   date_to_words("<?php echo $newDate; ?>");
var student_id = "<?php echo $id; ?>";


// --------------------------Date To words function------------------


$('.dob_in_wds'+student_id).empty();
$('.dob_in_wds'+student_id).text(dob_text)
</script>



<style>
.bonafide-certificate1-div{
    width:95%;
    height:auto;
    display:inline-block; 
}
 .box {
            display: table-cell;
            text-align: left;
            vertical-align:middle;
            line-height: 1em;
          }
          
.left{
    float:left;
    padding-top:3%;
    padding-left:3%;
}
.div-input1{
margin:0 auto;float:left;
}
.size1{
    font-size:1.2em;
}
.slip-input1 {
        min-width: 100px;
        border-bottom: 1px solid black;
        display: inline-block;
                }
                 @page {
        size: A4 Portrait;
        margin:2%;
        /*margin: 1m 1mm 1mm 1mm;*/
        /*margin: 1mm 1mm 1mm 1mm;*/
    }

         @media print
   {
       span{border:none}
    * {-webkit-print-color-adjust:exact;}      
   }
</style>
<?php 
 $serial_no_count = 1 + (( isset($serial_no['count'])) ? (int)$serial_no['count'] : 0 );

?>
 <!--main div-->
 <div class="bonafide-certificate1-div">
    <!--header-->
      <!--header-->
    <div class="head-div">
         <center>
             <!--<div style="font-size:1.7em;font-weight:700;"><u>BONAFIDE CERTIFICATE</u></div><br>-->
         </center>
    </div><br><br>

         <!--end-->
         <!--section-->
         

 <center>
 <!--start of section-->
<div style ="width:65%;text-align:justify">
   <div style="font-size:1.7em;font-weight:700;text-align:center;"><u>BONAFIDE CERTIFICATE</u></div><br><br>

        <div class="box box1" style=" font-size:1.2em; text-align: left;" >
                         No &nbsp;  <span class ="slip-input1" contenteditable ="true"><?php echo $serial_no_count ;?></span>
                        </div>


                        <div class="box box1" style="font-size:1.2em;text-align: center;">
                            GR.No <span class ="slip-input1"> <?php echo $gr_number ;?></span>
                        </div>

                        <div class="box box1" style="font-size:1.2em; text-align: right;">
                                Date  &nbsp; <span class ="slip-input1" contenteditable ="true"> <?php echo $date ;?></span>
                        </div><br><br><br>


<div style="text-align:left;float:left;width:97%; font-size:1.1em;">This is to Certify that Master / Miss </div><br><br><br>
<p class="div-input1 size1"><span class="slip-input1" style="min-width:455px;"><?php echo $stud_name ;?></span></p><br><br><br>
<p style ="font-size:1.08em;" class="div-input1 "> is / Was a Bonafide Student of this school studying in STD. </p><br><br><br>
<p style ="font-size:1.07em;" class="div-input1"><span class="slip-input1"><?php echo $stud_class ;?></span>From <span class="slip-input1" contenteditable="true"></span>&emsp; To <span class="slip-input1" contenteditable="true"></span> &nbsp;His/Her</p><br><br><br>
<p style ="font-size:1.12em;" class="div-input1"> Date of Birth, As Recorded in the GR is &emsp; <span class="slip-input1"><?php echo $newDate ;?></span> in </p><br><br><br>
<p style ="font-size:1.04em;" class="div-input1">Words &emsp; <span class="slip-input1 dob_in_wds<?php echo $id;?>"></span> &emsp;He/She is </p><br><br><br>
<p class="div-input1 size1"> <span class="slip-input1"><?php echo $caste ;?></span>Caste, He /She bears a Good Moral </p><br><br><br>
<p class="div-input1 size1">Character.</p><br><br><br><br><br>
<p class ="div-input1 size1" > School rubber stamp</p>
</div>
<!--end of section-->

</center>







   </div>
  </section>


 


    <!--end-->