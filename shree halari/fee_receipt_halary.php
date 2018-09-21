<?php
$global_arr1 = array();
$academic_year = "";
$id = "";
if( isset($data['stud_id']))
{
  $id = $stud_id;
  $global_arr1 = get_student_by_id($id);
}

$stud_school_name = get_session_data()['profile']['partner_name'];
// $stud_school_addr = (isset($global_arr['school_info']['address']) && !empty($global_arr['school_info']['address']))?''.$global_arr['school_info']['address'].'':'';
$stud_school_addr = get_session_data()['profile']['address'];
// $stud_school_logo = (isset($global_arr['school_info']['logo']) && !empty($global_arr['school_info']['logo']))?''.$global_arr['school_info']['logo'].'':get_session_data()['profile']['logo'];
$stud_school_logo = get_session_data()['profile']['logo'];

$session_data = $this->session->all_userdata();
// die("iamhere");
$global_arr = array();
$cycle_arr[1] = "Annual";
$cycle_arr[2] = "Half yearly";
$cycle_arr[3] = "Quarterly";
$cycle_arr[4] = "Monthly";
$half_yearly_arr[1] = "Sem1";
$half_yearly_arr[2] = "Sem2";
$monthly_arr[1] = "Jan";
$monthly_arr[2] = "Feb";
$monthly_arr[3] = "March";
$monthly_arr[4] = "April";
$monthly_arr[5] = "May";
$monthly_arr[6] = "June";
$monthly_arr[7] = "July";
$monthly_arr[8] = "August";
$monthly_arr[9] = "Sept";
$monthly_arr[10] = "Oct";
$monthly_arr[11] = "Nov";
$monthly_arr[12] = "Dec";
$quarterly_arr[1] = "Quarter 1";
$quarterly_arr[2] = "Quarter 2";
$quarterly_arr[3] = "Quarter 3";
$quarterly_arr[4] = "Quarter 4";
 $global_arr = unserialize(base64_decode($session_data['myfeedata']));
//  echo print_array($global_arr);die;
 
 $grand_total =  (isset($global_arr['data']) && count($global_arr['data'])>0)?array_sum(array_column($global_arr['data'], 'amount')):0;
 $first_name = isset($global_arr['data'][0]['first_name'])?$global_arr['data'][0]['first_name']:'';
 $last_name = isset($global_arr['data'][0]['last_name'])?$global_arr['data'][0]['last_name']:'';
 $roll_no = isset($global_arr['data'][0]['rollno'])?$global_arr['data'][0]['rollno']:'';
$standard = isset($global_arr['data'][0]['standard'])?$global_arr['data'][0]['standard']:'';
$section = isset($global_arr['data'][0]['section'])?$global_arr['data'][0]['section']:'';
$date = isset($global_arr['data'][0]['added_on'])?$global_arr['data'][0]['added_on']:'';
?>
<section onload="setTimeout(myFunction(), 3000)">

<style>
.fee-receipt-div1{
    width:95%;
    height:95%;
    display:inline-block; 
    /*border: 1px solid black;*/
}
table{
    margin-left:3%;
}
.column_align{
    width:33%;
}
.left{
    float:left;
    padding-top:3%;
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
        min-width: 100px;
        border-bottom: 1px solid black;
        display: inline-block;
                }
                 @page {
        size: A4 Portrait;
        /*margin: 1m 1mm 1mm 1mm;*/
        /*margin: 1mm 1mm 1mm 1mm;*/
    }
    .div_tab_col1, .div_tab_col2 {
    display: table-cell;
    /*word-wrap: break-word;*/
    /*font-size:0.7em;*/
    } 
    .tab_container {
    text-align:left;
    padding-left:3%;  
    }
 .div_tab {
    display: table;
    table-layout: fixed; 
    }
    .align{
         width:100%;
    }
    .position{
        text-align:right;
    }

  .div_tab_row  {
    display: table-row;
    }

         @media print
   {
       span{border:none}
    * {-webkit-print-color-adjust:exact;}      
   }
</style>
 <!--main div-->
 <div class="fee_receipt-div1">
    <center> <span style="font-size:1.1em;font-weight:500;">OSWAL SHIKSHAN AND RAHAT SINGH</span></center><br>
    <center> <span style="font-size:0.8em;font-weight:500;">Sanchalit</span></center><br>
      <center> <span style="font-size:1.3em;font-weight:500;"><?php echo $stud_school_name ;?></span></center><br>
       <center> <span style="font-size:0.8em;font-weight:500;">Bhiwandi </span></center><span style="float:right;">Tel:278201278133</2781></span><br>
     <table class="align">
         <tr>
             <td class="column_align">  R. No    <b></b></td>
             <td class="column_align">Section</td>
             <td class="column_align position"></td>
         </tr>
         <tr>
             <td class="column_align"> Gr No</td>
             <td class="column_align"></td>
             <td class="column_align position">Date :<b><?php echo $date ?></b></td>
         </tr>
         <tr>
             <td class="column_align">Name of Pupil : <b><?php echo $first_name." " . $last_name ?></td>
             <td class="column_align"></td>
             <td class="column_align position"></td>
         </tr>
         <tr>
             <td class="column_align">class <b>:<?php echo $standard ?> </b></td>
             <td class="column_align"> Div <?php echo $section ?> </td>
             <td class="column_align position">  Roll No   <b> : <?php echo $roll_no ?> </b></td>
         </tr>
     </table><br>
              <table border="1" cellspacing="0" cellpadding="6" width="100%">
                  <th>Particulars</th>
                  <th>Amount</th>
             <?php if(isset($global_arr['data']) && count($global_arr['data'])>0):?>
            <?php foreach($global_arr['data'] as $val):?>
            <?php foreach($val['bifu'] as $bifr):?>
            <tr>
                <td><?php echo $bifr['fee_type'];?></td>
                <td><?php echo $bifr['amount'];?></td>
            </tr>
     <?php endforeach;?>
        <?php endforeach;?>
         <?php endif;?>
         <tr>
             <td>Total</td>
             <td><?php echo $grand_total ?></td>
         </tr>

     </table><br>
     <span style="float:left;">Note:!)Subject to Realisation of cheque.</span><br>
     <span style="float:left;"> 2) In case of cheque dishonour,bank charges would be explicitly charged.</span><br>
     <span style="float:right;">Signature</span>
   </div>
  </section>

    <!--end-->