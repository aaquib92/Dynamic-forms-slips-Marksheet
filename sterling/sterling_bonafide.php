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
// $stud_addr    = (isset($global_arr['student_details'][0]['address']) && !empty($global_arr['student_details'][0]['address']))?''.$global_arr['student_details'][0]['address'].'':'';
$originalDate =  (isset($global_arr['student_details'][0]['dob']) && !empty($global_arr['student_details'][0]['dob']))?''.$global_arr['student_details'][0]['dob'].'':'';;
$newDate = date("d-m-Y", strtotime( (isset($global_arr['student_details'][0]['dob']) && !empty($global_arr['student_details'][0]['dob']))?''.$global_arr['student_details'][0]['dob'].'':''));

//echo print_r($global_arr); die;

?> 
<section style="margin:0 auto;text-align:center" onload="setTimeout(myFunction(), 3000)">
    <style>
      
        /*td {
            width: 120px;
        }*/
        
          .t{
    width:25%;
        }

 .t2{
    width:10%;
        }
        
         .div_input{width:480px;line-height:30px;margin-left:20px;text-align:left;font-size:100%; display: block; }
    .main_div_bonafide{width:650px;text-align:center;margin-top:5vh;display:inline-block; border:solid black 1px; padding-bottom:10px; height:500px;}
        .addr{font-size:14px; border-bottom: none; } 
         
   @page {
      size: portrait;   /* auto is the initial value */
      margin: 5%;
   }
    </style>

    
  <div class="main_div_bonafide">
   
    <img src="<?php echo (isset($global_arr['school_info']['logo']) && !empty($global_arr['school_info']['logo']))?''.$global_arr['school_info']['logo']:
              '';?>" style="float:left;padding-left:20px;margin-top:3%;"  width="60" height="70"/>
<h4>  <?php echo (isset($global_arr['school_info']['partner_name']) && !empty($global_arr['school_info']['partner_name']))?''.$global_arr['school_info']['partner_name']:
              'School/College Name';?></h4><br>
<span class="addr"><?php echo (isset($global_arr['school_info']['address']) && !empty($global_arr['school_info']['address']))?''.$global_arr['school_info']['address']:
              'School/College Address';?></span><br><br>

       <div><a style ="float:left; padding-left:20px;"> Ref No:-</a><a style="float:right; padding-right:30px;" >Date : <?php echo $date;?></a></div><br><hr>
       <h4 style="font:weight:bold;"><u>BONAFIDE CERTIFICATE</u></h4>
          <div class="div_input" style="margin-top:40px;"><a>This is to Certify that </a><b><?php echo strtoupper($stud_name) ;?></b>
              
          <a> is bonafied student of this school.<br>Address: - </a><?php echo  (isset($global_arr['student_details'][0]['address']) && !empty($global_arr['student_details'][0]['address']))?''.$global_arr['student_details'][0]['address'].'':'' ; ?><br><a> Studying in Std </a>  <b> <?php echo (isset($global_arr['student_selected_class'][0]['standard']) && !empty($global_arr['student_selected_class'][0]['standard']))?''.$global_arr['student_selected_class'][0]['standard'].' '.$global_arr['student_selected_class'][0]['section']:'' ;?> </b>
            
         
    <a>in the year <?php echo $academic_year;?>.<br> His/her birth date as per the G.R. is</a><b> <?php echo $newDate ; ?></b>
              &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</div>
   <div class="div_input"><br>
 </div><br>

     <div style="text-align:right;font-size:0.65em; background-color:#fff;padding-right:10%;"><img width="35" height="32" src="<?=base_url()?>/assets/images/sterling_sign.png" alt="">&emsp;<br>Principal&emsp;&emsp;</div>



        </div>
    
    



  
</section>
