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
$class_remark = (isset($global_arr['student_selected_class']['class_remark']) && !empty($global_arr['student_selected_class']['class_remark']))?''.$global_arr['student_selected_class']['class_remark']:'';
$stud_school_name = get_session_data()['profile']['partner_name'];
$stud_school_addr = get_session_data()['profile']['address'];
$stud_school_logo = get_session_data()['profile']['logo'];
$country =    $this->config->item(1,'country') ;
//  echo print_array($global_arr['student_details'][0]['custom_fields']['mother_tongue']);die();
 $temp = json_decode($global_arr['student_details'][0]['custom_fields'],true);
 $mother_tongue = $temp['mother_tongue'];

//    foreach ($temp as $k1 => $v1) {
        //    echo print_array($temp['mother_tongue']);die();
//    }




$serial_no['count'] ;
$nationality = array("0" => "","1" => "Indian");

?>
<script>

// var dob_text =   (date_to_words("<?php echo $newDate; ?>")).toUpperCase();
var dob_text =   date_to_words("<?php echo $newDate; ?>");
var student_id = "<?php echo $id; ?>";

//  var doj = date_to_words($('.date_since').val());

// --------------------------Date To words function------------------


$('.dob_in_wds'+student_id).empty();
$('.dob_in_wds'+student_id).text(dob_text)


  $('.common_input').keyup(function(){
        $(this).attr('value',$(this).val()); 
    });

    $('.date_of_lvng').change(function(){
        $(this).attr('value',$(this).val());   
    });
     $('.date').change(function(){
        $(this).attr('value',$(this).val());   
    });

 
// mother tongue
function mother_tongue(event) {
   var value = String.fromCharCode(event.which);
   var pattern = new RegExp(/[a-zåäö ]/i);
   return pattern.test(value);
}
$('#mother_tongue'+student_id).bind('keypress', mother_tongue);
// end
// village
function village(event) {
   var value = String.fromCharCode(event.which);
   var pattern = new RegExp(/[a-zåäö ]/i);
   return pattern.test(value);
}
$('#village'+student_id).bind('keypress', village);
// end
// taluka
function tal(event) {
   var value = String.fromCharCode(event.which);
   var pattern = new RegExp(/[a-zåäö ]/i);
   return pattern.test(value);
}
$('#tal'+student_id).bind('keypress', tal);
// end
// District
function dist(event) {
   var value = String.fromCharCode(event.which);
   var pattern = new RegExp(/[a-zåäö ]/i);
   return pattern.test(value);
}
$('#dist'+student_id).bind('keypress', dist);
// end

  
 // prev school
 function prev_school(event) {
   var value = String.fromCharCode(event.which);
   var pattern = new RegExp(/[a-zåäö ]/i);
   return pattern.test(value);
}
$('#prev_school'+student_id).bind('keypress', prev_school);

// end
 // progress
 function prog(event) {
   var value = String.fromCharCode(event.which);
   var pattern = new RegExp(/[a-zåäö ]/i);
   return pattern.test(value);
}
$('#prog'+student_id).bind('keypress', prog);

// end

// conduct
 function conduct(event) {
   var value = String.fromCharCode(event.which);
   var pattern = new RegExp(/[a-zåäö ]/i);
   return pattern.test(value);
}
$('#conduct'+student_id).bind('keypress', conduct);
// end
// reason
 function reason(event) {
   var value = String.fromCharCode(event.which);
   var pattern = new RegExp(/[a-zåäö ]/i);
   return pattern.test(value);
}
$('#reason'+student_id).bind('keypress', reason);
// end// 
//remark
 function remark(event) {
   var value = String.fromCharCode(event.which);
   var pattern = new RegExp(/[a-zåäö ]/i);
   return pattern.test(value);
}
$('#remark'+student_id).bind('keypress', remark);
// end
 
// since when
 function date_since(event) {
   var value = String.fromCharCode(event.which);
   var pattern = new RegExp(/[a-zåäö ]/i);
   return pattern.test(value);
}
$('#date_since'+student_id).bind('keypress', date_since);
// end
// // date of lvng
//  function date_of_lvng(event) {
//    var value = String.fromCharCode(event.which);
//    var pattern = new RegExp(/[a-zåäö ]/i);
//    return pattern.test(value);
// }
// $('.date_of_lvng'+student_id).bind('keypress', date_of_lvng);
// // end





// // promoted as
//  function promoted(event) {
//    var value = String.fromCharCode(event.which);
//    var pattern = new RegExp(/[a-zåäö ]/i);
//    return pattern.test(value);
// }
// $('#promoted_as'+student_id).bind('keypress', promoted);
// // end




$(document).ready(function(){
    $('[id^=serial_no]'+student_id).keypress(validateNumber);
    
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
<head> <link rel="stylesheet" href="<?php echo base_url().'assets/css/pikaday.min.css';?>">
</head>
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
    /* padding-top:3%; */
    /* padding-right:2%; */
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
         margin:0%;
        /*margin: 1m 1mm 1mm 1mm;*/
    }

    .div_tab_col1, .div_tab_col2 {
    display: table-cell;
    /*word-wrap: break-word;*/
    font-size:0.7em;
    }
    .tab_container {
    text-align:left;
    /* padding-left:1%;   */
    }
   /* .content{text-align:left;float:left;width:97%;padding-left:0;border-bottom:thin solid #ddd;} */
   .content{text-align:left;border-bottom:thin solid #ddd;line-height:1.5em;}

#school_logo{
    position:absolute;
    left:0;margin-left:3em;
}

         @media print
   {
    body{
      font-size:90% !important; 
    } 
       span{border:none;}
    * {-webkit-print-color-adjust:exact;} 
.common_input{border:none;}
.date_of_lvng{border:none;}
.date_since{border:none;}
.date{border:none;}
hr{border:0.5px black dashed;}
.leaving-certificate-div{
    margin:0 auto;text-align:center;padding:0.5em;
}

  
   }
</style>

          <style>
          
          
          
          .boxes {
            display:table;
            width: 100%;
            /* height: 100%; */
          }
          
          .box {
            display: table-cell;
            text-align: left;
            vertical-align:middle;
            line-height: 1em;
          }
          
          .col_1 {
            /* outline:red groove thin;  */
            width:30%;
          }
          .col_srno {
            /* outline:red groove thin;  */
            width:5%;
          }


          .content div{
            display: inline-block;
            min-width:75px;
          }
          
          
.content span{
    text-transform:capitalize;
}



                    </style>    


<?php 
 $serial_no_count = 1 + (( isset($serial_no['count'])) ? (int)$serial_no['count'] : 0 );

?>
 <!--main div-->
 <div class="leaving-certificate-div">
 <!--header-->
 <div class="head-div">
         <img id="school_logo"  width="130" height="130" src="<?php echo $stud_school_logo ; ?>" >
         <center style="line-height:1.2em;">
             <span style="font-weight:600;font-size:1.4em">BRIGHT INTERNATIONAL SCHOOL</span><br>
             <span style="font-weight:600;font-size:0.8em">(Govt.Recognized) Index No 16.16.131 </span><br>
             <span style="font-weight:600;font-size:0.9em">V.L.S /1097/(357) / Pra.Shi./Dt.30-5-1997</span><br>
             <span style="font-weight:600;font-size:0.9em">V.S.S/ 1002/(1000/02/Pra.Shi-3)/Dt.23/09/2003</span><br>
             <span style="font-weight:600;font-size:0.9em">S.S.N/ 1002/591/2002/Ma.Shi-1/Dt.07/06/2003</span><br>
             <span style="font-size:0.8em;font-weight:300;">Nr Kanakia Police Station,Mira Road(E),Dist. Thane-401107.</span><br>
             <span style="font-weight:600;font-size:1.2em;">Leaving Certificate</span><br>
             <span style="font-weight:400;font-size:0.8em;">(Vide Chapter II, Section II, Rule 17) (Primary Section-English Medium)</span><br>
         </center>
           <div><span style="font-weight:400;font-size:0.9em;">(No change in any entry in this certificate shall be made except by the authority issuing it and any</span><br><span style="font-weight:400;font-size:0.9em;"> infringement this requirement is liable to invoice the imposition of penalty such as that of rustication )</span></div>
    </div><br>
    <!--end of head -->
    <!--start of tab container-->

                 <!-- BOX  = COLUMNS -->

          <div style="display:table;width:100%">
       

                        <div class="box box1" style="    text-align: left;" >
                        General Register No : <?php echo $gr_number ;?>
                        </div>


                        <div class="box box1" style="    text-align: center;">
                          U-Dise No   : &nbsp; 27210700498 
                        </div>

                        <div class="box box1" style="    text-align: right;">
                                Serial Number : &nbsp;<input type ="text" class ="common_input browser-default" size="10" id ="serial_no<?php echo $id;?>" value ="<?php echo $serial_no_count ;?>" >
                        </div>

         </div>

                   <div style="font-weight:300;font-size:0.8em">AFFILIATED TO MAHARASHTRA STATE BOARD OF SECONDARY AND HIGHER SECONDARY EDUCATION PUNE</div><hr>


          <div class="boxes">

                <div class="box col_srno">

                      <div class="content">1      .   </div>
                      <div class="content">2      .   </div>
                      <div class="content">3      .   </div>
                      <div class="content">4      .   </div>
                      <div class="content">5      .   </div>
                      <div class="content">6      .   </div>
                      <div class="content">7      .   </div>
                      <div class="content">8      .   </div>
                      <div class="content">9      .   </div>
                      <div class="content">10     .   </div>
                      <div class="content">11     .   </div>
                      <div class="content">&emsp;    </div>
                      <div class="content">12     .   </div>
                      <div class="content">&emsp;    </div>
                      <div class="content">13     .   </div>
                      <div class="content">14     .   </div>
                      <div class="content">&emsp;    </div>
                      <div class="content">15     .   </div>
                      <div class="content">16     .   </div>
                      <div class="content">17     .   </div>
                      <div class="content">18     .   </div>
                      <div class="content">&emsp;    </div>
                      <div class="content">19     .   </div>
                      <div class="content">20     .   </div>
                      <div class="content">21     .   </div>

                </div>






                        <div class="box col_1">

                            <div class="content">Student's ID                       </div>
                            <div class="content">UID No (Adhar Card Number)          </div>
                            <div class="content">Surname                             </div>
                            <div class="content">Name of the Pupil                   </div>
                            <div class="content">Father's Name                       </div>
                            <div class="content">Mother's Name                       </div>
                            <div class="content">Nationality                         </div>
                            <div class="content">Mother Tongue                       </div>
                            <div class="content">Religion                            </div>
                            <div class="content">Caste and Sub-Caste                </div>
                            <div class="content">Place of Birth                     </div>
                            <div class="content"> &emsp;                            </div>
                            <div class="content">Date of Birth (DD/MM/YYYY)         </div>
                            <div class="content">Date of Birth (in words)           </div>
                            <div class="content">Last School Attended               </div>
                            <div class="content">a)Date of Admission               </div>
                            <div class="content">b)Class to which admitted              </div>
                            <div class="content">Progress                           </div>
                            <div class="content">Conduct                            </div>
                            <div class="content">Date of leaving the school         </div>
                            <div class="content">Standard in which studying         </div>
                            <div class="content">and since when (in words )         </div>
                            <div class="content">Reason of leaving school           </div>
                            <div class="content">Promoted to                        </div>
                            <div class="content">Remarks                            </div>

                        </div>



                        <div class="box ">

                                <div class="content">:&nbsp;<div contenteditable="true" > </div></div>
                                <div class="content">:&nbsp;<span><?php echo $aadhar_no ; ?></span> </div>
                                <div class="content">:&nbsp;<span><?php echo $surname ;?></span> </div>
                                <div class="content">:&nbsp;<span><?php echo $name ;?></span> </div>
                                <div class="content">:&nbsp;<span><?php echo $parent_name ;?></span> </div>
                                <div class="content">:&nbsp;<?php echo $mother_name ;?> </div>
                                <div class="content">:&nbsp;Indian </div>
                                <div class="content">:&nbsp; <?php echo $mother_tongue; ?> </div>
                                <div class="content">:&nbsp;<span><?php echo $religion ;?></span> </div>
                                <div class="content">:&nbsp;<?php echo $caste;?> &emsp; <div contenteditable="true"> </div>                     </div>
                                <div class="content">:&nbsp;Village &nbsp;  <div contenteditable="true">: </div>  &emsp; &emsp; &emsp; Taluka &nbsp; <div contenteditable="true">: </div>       </span>                </div>
                                <div class="content">:&nbsp;Dist    &nbsp;  <div contenteditable="true">: </div>  &emsp; &emsp; &emsp;  State &nbsp; <div contenteditable="true">: </div>   &emsp;&emsp;&emsp; Country : <span contenteditable="true">India</span>   </div>
                                <div class="content">:&nbsp;<?php echo $newDate ;?> </div>
                                <div class="content">:&nbsp;<span class ="dob_in_wds<?php echo $id;?>"></span> </div>
                                <div class="content">:&nbsp;<div contenteditable="true" > </div>&emsp;&emsp; Std <div contenteditable="true">: </div>   </div>
                                <div class="content">:&nbsp;<div contenteditable="true" ><?php echo $admission_year;?> </div> </div>
                                <div class="content">:&nbsp;<div contenteditable="true" ><?php echo $stud_class;?>     </div> </div>
                                <div class="content">:&nbsp;<div contenteditable="true" > </div> </div>
                                <div class="content">:&nbsp;<div contenteditable="true" > </div> </div>
                                <div class="content">:&nbsp;<input type ="text" class ="date_of_lvng browser-default" id ="picka1<?php echo $id;?>" style="width:40%;" > </div>
                                <div class="content">:&nbsp;<span><?php echo $stud_class ;?></span> </div>
                                <div class="content">:&nbsp;<div contenteditable="true" > </div> </div>
                                <div class="content">:&nbsp;<div contenteditable="true" > </div> </div>
                                <div class="content">:&nbsp;<div contenteditable="true" > </div> </div>
                                <div class="content">:&nbsp;<div contenteditable="true"><?php echo $class_remark; ?> </div contenteditable="true"> </div>

                                </div>


          </div>









<hr><br><br>
    <!--end of main section-->

                <!--start of footer section-->
           
             <div class="div-input1 content">Certified that the above information is in according with the General Register of school </div><br><br>
             <div class="div-input1 content">Date &nbsp;:<input type ="text" class="date"  style="width:50%;"  id ="picka3<?php echo $id; ?>"></div><br><br><br><br>
                            
            <div>
              <span style=" float:left; border-top:1px solid black;">  Office Clerk </span>
              <span style=" text-align:center; border-top:1px solid black;">  Class Teacher </span>
              <span style=" float:right; border-top:1px solid black;">Principal / H.M</span>
       
          </div>

                           
                           
                  <!--end of footer section -->
   </div>
   <!--end of main div-->

<script>
 
$(document).ready(function(){
  
         //   pickaday datepicker
var student_id = "<?php echo $id; ?>";
        

        var picker = new Pikaday({
                        field: document.getElementById('picka1'+student_id),
                        format: 'DD-MM-YYYY',
                        onSelect: function() {
                        }
                    });
                      var picker = new Pikaday({
                        field: document.getElementById('picka2'+student_id),
                        format: 'DD-MM-YYYY',
                        onSelect: function() {
                        }
                    });
                  
                     var picker = new Pikaday({
                        field: document.getElementById('picka3'+student_id),
                        format: 'DD-MM-YYYY',
                        onSelect: function() {
                        }
                    });

                  //  end
});
</script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/pikaday.min.js';?>"></script>










   
  </section>

    <!--end-->