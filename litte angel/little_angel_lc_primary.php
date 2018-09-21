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
$parent_name    = (isset($global_arr['parent_details'][0]['first_name']) && !empty($global_arr['parent_details'][0]['first_name']))?''.$global_arr['parent_details'][0]['first_name'].'':'';
$name    = (isset($global_arr['student_details'][0]['first_name']) && !empty($global_arr['student_details'][0]['first_name']))?''.$global_arr['student_details'][0]['first_name'].'':'';
$father_name    = (isset($global_arr['student_details'][0]['middle_name']) && !empty($global_arr['student_details'][0]['middle_name']))?''.$global_arr['student_details'][0]['middle_name'].'':'';
$surname    = (isset($global_arr['student_details'][0]['last_name']) && !empty($global_arr['student_details'][0]['last_name']))?''.$global_arr['student_details'][0]['last_name'].'':'';
$stud_nationality    = (isset($global_arr['student_details'][0]['nationality']) && !empty($global_arr['student_details'][0]['nationality']))?''.$global_arr['student_details'][0]['nationality'].'':'';
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
$stud_dob     = (isset($global_arr['student_details'][0]['dob']) && !empty($global_arr['student_details'][0]['dob']))?''.date("d/m/Y", strtotime($global_arr['student_details'][0]['dob'])).'':'';
$stud_roll    = (isset($global_arr['student_details'][0]['rollno']) && !empty($global_arr['student_details'][0]['rollno']))? $global_arr['student_details'][0]['rollno'] : '';
$stud_admi_no = (isset($global_arr['student_details'][0]['admission_user_id']) && !empty($global_arr['student_details'][0]['admission_user_id']))?''.$global_arr['student_details'][0]['admission_user_id']:'';
$stud_phone   = (isset($global_arr['student_details'][0]['phone']) && !empty($global_arr['student_details'][0]['phone']))?''.$global_arr['student_details'][0]['phone'].'':$global_arr['parent_details'][0]['phone'];
$stud_addr    = (isset($global_arr['student_details'][0]['address']) && !empty($global_arr['student_details'][0]['address']))?''.$global_arr['student_details'][0]['address'].'':'';
$middle_name = (isset($global_arr['student_details'][0]['middle_name']) && !empty($global_arr['student_details'][0]['middle_name']))?''.$global_arr['student_details'][0]['middle_name'].'':'';
$newDate = date("d-m-Y", strtotime( (isset($global_arr['student_details'][0]['dob']) && !empty($global_arr['student_details'][0]['dob']))?''.$global_arr['student_details'][0]['dob'].'':''));
$state   = (isset($global_arr['student_details'][0]['state']) && !empty($global_arr['student_details'][0]['state']))?''.$global_arr['student_details'][0]['state'].'':'';
$mother_name    = (isset($global_arr['parent_details'][0]['mothers_name']) && !empty($global_arr['parent_details'][0]['mothers_name']))?''.$global_arr['parent_details'][0]['mothers_name'].'':'';
$stud_school_name = get_session_data()['profile']['partner_name'];
$stud_school_addr = get_session_data()['profile']['address'];
$stud_school_logo = get_session_data()['profile']['logo'];
$country =    $this->config->item(1,'country') ;
// echo print_array($global_arr);die();

$serial_no['count'] ;
$nationality = array("0" => "","1" => "Indian");

?>
<script>

var dob_text =   date_to_words("<?php echo $newDate; ?>");
//  var doj = date_to_words($('.date_since').val());

// --------------------------Date To words function------------------
$('#dob_in_wds').empty();
$('#dob_in_wds').text(dob_text)


  $('.common_input').keyup(function(){
        $(this).attr('value',$(this).val()); 
    });

    $('.date_of_lvng').change(function(){
        $(this).attr('value',$(this).val());   
    });

    $('.date_since').change(function(){
         $(this).attr('value',$(this).val());   

         console.log( $(this).val());
        
         var doj = date_to_words($(this).val());
         $('#doj_in_wds').empty();
         $('#doj_in_wds').text(doj);
         console.log(doj);
    });

//   // serial no
//  function serial_no(event) {
//    var value = String.fromCharCode(event.which);
//    var pattern = new RegExp(/[a-zåäö ]/i);
//    return pattern.test(value);
// }
// $('#serial_no').bind('keypress', serial_no);

// // end
      // sub caste
 function sub_caste(event) {
   var value = String.fromCharCode(event.which);
   var pattern = new RegExp(/[a-zåäö ]/i);
   return pattern.test(value);
}
$('#sub_caste').bind('keypress', sub_caste);

// end

    // tal
 function tal(event) {
   var value = String.fromCharCode(event.which);
   var pattern = new RegExp(/[a-zåäö ]/i);
   return pattern.test(value);
}
$('#tal').bind('keypress', tal);

// end
 // prev school
 function prev_school(event) {
   var value = String.fromCharCode(event.which);
   var pattern = new RegExp(/[a-zåäö ]/i);
   return pattern.test(value);
}
$('#prev_school').bind('keypress', prev_school);

// end
 // progress
 function prog(event) {
   var value = String.fromCharCode(event.which);
   var pattern = new RegExp(/[a-zåäö ]/i);
   return pattern.test(value);
}
$('#prog').bind('keypress', prog);

// end

// conduct
 function conduct(event) {
   var value = String.fromCharCode(event.which);
   var pattern = new RegExp(/[a-zåäö ]/i);
   return pattern.test(value);
}
$('#conduct').bind('keypress', conduct);
// end
// reason
 function reason(event) {
   var value = String.fromCharCode(event.which);
   var pattern = new RegExp(/[a-zåäö ]/i);
   return pattern.test(value);
}
$('#reason').bind('keypress', reason);
// end// 
//remark
 function remark(event) {
   var value = String.fromCharCode(event.which);
   var pattern = new RegExp(/[a-zåäö ]/i);
   return pattern.test(value);
}
$('#remark').bind('keypress', remark);
// end
 
   
// Serial no

// $(function() {
//   var regExp = /[a-z]/i;
//   $('#serial_no').on('keydown keyup', function(e) {
//     var value = String.fromCharCode(e.which) || e.key;

//     // No letters
//     if (regExp.test(value)) {
//       e.preventDefault();
//       return false;
//     }
//   });
// });

$(document).ready(function(){
    $('[id^=serial_no]').keypress(validateNumber);
});

function validateNumber(event) {
    var key = window.event ? event.keyCode : event.which;
    if (event.keyCode === 8 || event.keyCode === 46) {
        return true;
    } else if ( key < 48 || key > 57 ) {
        return false;
    } else {
    	return true;
    }
};
// end





</script>
<section onload="setTimeout(myFunction(), 3000)">

<style>
.leaving-certificate-div{
    width:95%;
    height:auto;
    display:inline-block; 
	padding-top:1%;
    /*border: 1px solid black;*/
}
.left{
    float:left;
    padding-top:1%;
    padding-left:3%;
}
.right{
    float:right;
    padding-top:3%;
    padding-right:2%;
}

.div-input1{
margin:0 auto;float:left; padding-left:3%;
}
.slip-input1 {
        min-width: 250px;
        border-bottom: 1px solid black;
        display: inline-block;
                }
                 @page {
        size: Portrait;
         margin:1% 1% 1% 1%;
        /*margin: 1m 1mm 1mm 1mm;*/
    }
    .div_tab_col1, .div_tab_col2 {
    display: table-cell;
    /*word-wrap: break-word;*/
    font-size:0.7em;
    }
    .tab_container {
    text-align:left;
    padding-left:3%;  
    }
 

         @media print
   {
         
       span{border:none;}
    * {-webkit-print-color-adjust:exact;} 
.common_input{border:none;}
.date_of_lvng{border:none;}
#date_since{border:none;}

  
   }
</style>
<?php 
 $serial_no_count = 1 + (( isset($serial_no['count'])) ? (int)$serial_no['count'] : 0 );

?>
 <!--main div-->
 <div class="leaving-certificate-div">
    <!--header-->
    <div class="head-div">
         <img class="left"  width="100" height="100" src="<?php echo $stud_school_logo ; ?>" >
         <center style="line-height:1.2em;">
             <span style="font-weight:600;font-size:1.1em">SHREE RAMNIKLAL NAGJI CHEDDA (GAJODWALA)</span><br>
             <span style="font-weight:600;font-size:1.1em">CHARITABLE TRUST'S (E/1584/THANE)</span><br>
             <span style="font-weight:600;font-size:0.8em">Reg.Maha/86/96/Thane/Dt. 13-2-96</span><br>
             <span style="font-size:1.1em;font-weight:700;">LITTLE ANGEL'S English Medium High School</span><br>
             <span style="font-weight:600;font-size:0.8em">VLS 1096/573/PS3 - VLS1002/420/2002/PS3</span><br>
             <span style="font-weight:700;font-size:0.9em;padding-left:15%;">Kasar Wadawali, Ghodbunder Road, Thane - 40615.Ph. 2597 0457</span><br>
             <div style="padding-left:15%;"><span style="font-weight:400;font-size:0.7em;">(No change in any entry in this certificate shall be made except by the authority issuing it and any.</span><br><span style="font-weight:400;font-size:0.7em;"> infringement of this requirement is liable to invoice the imposition of penalty such as that of rustification )</span><br>

  <!--<span style="font-weight:600;font-size:1em; width:24%;height:7%; background-color:black; color:white; padding:0.5%;">TRANSFER CERTIFICATE </span>-->
         </center>
    </div><br>

   <div class="tab_container">
                <div class="div_tab">

                    <div class="div_tab_row"><!--row-->
                            <div class="div_tab_col1">
                                Udise No  &emsp;  
                            </div>
                            <div class="div_tab_col2">
                              :&nbsp;<span class="slip-input1">27212000103</span>  &emsp; 
                            </div>
                            <div class="div_tab_col1">
                                Email ID  &emsp;  
                            </div>
                            <div class="div_tab_col2">
                              : &nbsp;<span> admin@littleangelhighschool.com</span>  &emsp; 
                            </div>
                            
                    </div><br><!--row-->

                      <div class="div_tab_row"><!--row-->
                             <div class="div_tab_col1">
                                Affiliation No:  &emsp;  
                            </div>
                            <div class="div_tab_col2">
                              : &nbsp;<span class="slip-input1"></span>  &emsp; 
                            </div>
                            <div class="div_tab_col1">
                                Board  &emsp;  
                            </div>
                            <div class="div_tab_col2">
                              :&nbsp; <span class="slip-input1"></span> 
                            </div>
                    </div><!--row-->
               </div><!-- main table-->
            </div><br><!--table container-->
                 <center>
                   <span style="font-weight:500;font-size:1.7em">Leaving Certificate - Primary Section</span><br>
                   <span style="font-weight:600;font-size:0.9em">(Vide Rule 17 Chapter to Section of the Secondary School Code Reprint 1971)</span>
                 </center><br>
                 <div>
                 <span style ="float:left;">G.R.No.&emsp; <?php echo $gr_number ;?></span>
                 <span style ="float:right;padding-right:10%;">Sr.No. &emsp; <input type ="text" class ="common_input" id="serial_no"  style="width:20%;" value ="<?php echo $serial_no_count ; ?>"> </span>
                 </div><br>
         <div style="text-align:left;float:left;width:97%;border-bottom:thin solid #ddd;"> Student ID:  &emsp;  <span></span></div><br><br>
         <div style="text-align:left;float:left;width:97%;border-bottom:thin solid #ddd;"> UID No (Adhar Card No):  &emsp;  <span><?php echo $aadhar_no ; ?></span></div><br><br>
         <hr>

        <div style="line-height:1.4em;">
           <div style="text-align:left;float:left;width:97%;padding-left:0;border-bottom:thin solid #ddd;"> Name of the Pupil:  &emsp; (Name) &emsp; <span><?php echo $name ;?></span>  &emsp; &emsp;  (Father's Name) &emsp; <span><?php echo $parent_name ;?></span></div><br>
           <div style="text-align:left;float:left;width:97%;padding-left:0;border-bottom:thin solid #ddd;">   &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&nbsp; (Surname)  &emsp; <span><?php echo $surname ;?></span></div><br>
           <div style="text-align:left;float:left;width:97%;padding-left:0;border-bottom:thin solid #ddd;" class="div-input1"> Mother's Name: &emsp; <span><?php echo $mother_name ;?></span> </div><br>
           <div style="text-align:left;float:left;width:97%;padding-left:0;border-bottom:thin solid #ddd;" class="div-input1"> Nationality: &emsp;<span>
           <?php
           foreach($nationality as $key => $value){
                  echo $value;
           }
           ?></span> </div><br>
           <div style="text-align:left;float:left;width:97%;padding-left:0;border-bottom:thin solid #ddd;" class="div-input1"> Religion: <span><?php echo $religion ;?></span> &emsp;&emsp; &emsp;  &emsp; &emsp; &emsp; Caste &emsp; <span><?php echo $caste ;?></span> &emsp; &emsp;&emsp; &emsp; &emsp; &emsp; Sub Caste &emsp; <input type ="text" class="common_input" id="sub_caste" style="width:20%;"> </div><br>
           <div style="text-align:left;float:left;width:97%;padding-left:0;border-bottom:thin solid #ddd;" class="div-input1"> Place of Birth:  &emsp;<span><?php echo $place_of_birth ;?></span> &emsp;Tal &emsp; <input type ="text" class="common_input"  style="width:10%;" id="tal">  &emsp;  Dist &emsp; <span><?php echo $state; ?></span>  &emsp;  Country &emsp; <span><?php echo $country ?></span> </div><br>   
           <div style="text-align:left;float:left;width:97%;padding-left:0;border-bottom:thin solid #ddd;" class="div-input1"> Date of Birth according to Hindu Era: &emsp;  <span><?php echo $newDate ;?></span> </div><br>
           <div style="text-align:left;float:left;width:97%;padding-left:0;border-bottom:thin solid #ddd;" class="div-input1"> Date of Birth in words: &emsp;  <span id ="dob_in_wds"></span> </div><br>
           <div style="text-align:left;float:left;width:97%;padding-left:0;border-bottom:thin solid #ddd;" class="div-input1"> Name of the previous School and Std: &emsp; <input type ="text" class="common_input"  style="width:40%;" id="prev_school"> </div><br>
           <div style="text-align:left;float:left;width:97%;padding-left:0;border-bottom:thin solid #ddd;" class="div-input1"> Date of Admission:  &emsp; <span><?php echo $admission_year;?></span> &emsp; &emsp;&emsp; &emsp; &emsp; &emsp;Standard  &emsp;<span><?php echo $stud_class ;?></span></div><br>
           <div style="text-align:left;float:left;width:97%;padding-left:0;border-bottom:thin solid #ddd;" class="div-input1"> Progress in studies: &emsp; <input type ="text" class="common_input"  style="width:20%;" id ="prog"> &emsp; &emsp;&emsp;  &emsp; Conduct in school &emsp;<input type ="text" class="common_input"  style="width:20%;" id ="conduct"></div><br>
           <div style="text-align:left;float:left;width:97%;padding-left:0;border-bottom:thin solid #ddd;" class="div-input1">Date of leaving school: &emsp;<input type ="date" class="date_of_lvng"  style="width:40%;"> </div><br>
           <div style="text-align:left;float:left;width:97%;padding-left:0;border-bottom:thin solid #ddd;" class="div-input1">Standard in which studying:  &emsp;<span><?php echo $stud_class ;?></span> </div><br>
           <div style="text-align:left;float:left;width:97%;padding-left:0;border-bottom:thin solid #ddd;" class="div-input1">and since when (in figure & words ): <input type ="date" id="date_since"  style="width:20%;"> &emsp;  <span id ="doj_in_wds" style="font-size:0.8em;"></span></div><br>
           <div style="text-align:left;float:left;width:97%;padding-left:0;border-bottom:thin solid #ddd;" class="div-input1">Reason of leaving school: &emsp; <input type ="text" class="common_input"  style="width:40%;" id="reason"> </div><br>
           <div style="text-align:left;float:left;width:97%;padding-left:0;border-bottom:thin solid #ddd;" class="div-input1">Remark: &emsp; <input type ="text" class="common_input"  style="width:40%;" id ="remark"> </div>
    </div><br><br>
    <div style="text-align:left;float:left;width:97%;padding-left:0;" class="div-input1">Certified that the above information is in according with the General Register record </div><br><br>
      <div style="text-align:left;float:left;width:97%;padding-left:0;" class="div-input1">Day <input type ="text" class="common_input"  style="width:10%;" id="day"> &nbsp; Month <input type ="text" class="common_input"  style="width:10%;" id ="month"> &nbsp; Year <input type ="text" class="common_input"  style="width:10%;" id ="year"></div><br><br>
      <span style ="float:right;margin-right:10%;">Signature</span><br><br><br><br>
                            
                            <div  style="float:left;margin-top:-5%">
                            <br>  Class Teacher  &emsp;  &emsp; &emsp;
                            </div>
                            <center>
                            <div  style="margin-top:-5%">
                            <br>  Clerk  &emsp;  &emsp; &emsp;
                            </div>
                           </center>
                            <div  style="float:right;margin-top:-5%">
                            <br>  Head Mistress  &emsp;  &emsp; &emsp;
                            </div><br>
                           
                    


   <p class="div-input1" style="font-size:0.7em; text-align:justify;text-align:left;float:left;width:97%;padding-left:0;">W.B.1.Entries regarding the date of birth according to the christian era and the New National Calendar and the standard in which studying in columns 5 and 7 to the Leaving Certificate should made both in figures and in word.2. Theses entries shall be in manuscript and not typewritten.3.Accelerated promotion earned by the pupil during his her school carrier should be specified in the Remarks column indicating the standard year and the school i which accelerated Promotion was given. </p>
        
   </div>



   
  </section>

    <!--end-->