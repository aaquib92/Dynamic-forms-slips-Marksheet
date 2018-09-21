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
//  echo print_array($global_arr1);die;
 
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
.fee-receipt-div{
    width:95%;
    height:95%;
    display:inline-block; 
    /*border: 1px solid black;*/
}
table{
    margin-left:3%;
}
td{
    width:16%;
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
 <div class="fee_receipt-div">
    <!--header-->
    <div class="head-div">
         <img class="left"  width="100" height="120" src="<?=base_url()?>/assets/images/RCT logo.png" >
         <img class="right"  width="100" height="100" src="<?php echo $stud_school_logo ; ?>" >
         <center>
             <span style="font-weight:600;font-size:1.1em">ROTARY CHARITABLE TRUST'S</span><br>
             <span style="font-size:1.3em;font-weight:700;">PRATAPSINH MORAJI MEMORIAL</span><br>
             <span style="font-size:1.3em;font-weight:700;"><?php echo $stud_school_name ;?></span><br>
             <span style="font-size:1.3em;font-weight:700;">AMBERNATH</span><br>
         </center>
             <span style="font-size:0.7em;font-weight:500;">Recognized by Resolution No.733 dt.7/1/72 Since 1-6-70 <br>  byDeputy Ed Office Zilla Parishad,Thane </span>
             <hr>
              <center><span style="font-weight:500;font-size:1.1em;">Sharma Prasad Mukherjee Road,Opp.State Bank,,Ambernath &#9990; : 2602872  </span><hr></center>
    </div><br><br>
    <center><span style="font-size:1.3em;font-weight:700;">FEE RECEIPT</span></center><br>
     <div class="tab_container">
                <div class="div_tab">

                    <div class="div_tab_row"><!--row-->
                            <div class="div_tab_col1">
                                Receipt No  &emsp;  &emsp; &emsp;
                            </div>
                            <div class="div_tab_col2">
                              : <b></b>
                            </div>
                            <div class="div_tab_col1">
                                Date  &emsp;  &emsp; &emsp;
                            </div>
                            <div class="div_tab_col2">
                              : <b> <?php echo $date ?> </b>
                            </div>
                    </div><!--row-->

                    <div class="div_tab_row"><!--row-->
                           <div class="div_tab_col1">
                                Received From  &emsp;  &emsp; &emsp; 
                            </div>
                            <div class="div_tab_col2">
                              : <b><?php echo $first_name." " . $last_name ?> &emsp;</b>
                            </div>
                            <div class="div_tab_col1">
                                Student-ID  &emsp;  &emsp; &emsp;
                            </div>
                            <div class="div_tab_col2">
                              : <b> <?php echo $roll_no ?></b>
                            </div>
                    </div><!--row-->

                    <div class="div_tab_row"><!--row-->
                           <div class="div_tab_col1">
                                Mother Name  &emsp;  &emsp; &emsp;
                            </div>
                            <div class="div_tab_col2">
                              : <b> </b>
                            </div>
                            <div class="div_tab_col1">
                                Class  &emsp;  &emsp; &emsp;
                            </div>
                            <div class="div_tab_col2">
                              : <?php echo $standard. $section ?> 
                            </div>
                    </div><!--row-->

                  </div><!-- main table-->
            </div><!--table container--><hr>

 <div class="tab_container">
                <div class="div_tab">
                    <div class="div_tab_row"><!--row-->
                            <div class="div_tab_col1">
                                <b>  &emsp;Description  &emsp;  &emsp; &emsp; &emsp; &emsp;</b>
                            </div>
                            <div class="div_tab_col2">
                             <b> Amount  &emsp;  &emsp; &emsp; &emsp;&emsp;</b>
                            </div>
                            <div class="div_tab_col1">
                                <b>Description  &emsp;  &emsp; &emsp;  &emsp;&emsp;&emsp;</b>
                            </div>
                            <div class="div_tab_col2">
                             <b>   &emsp;Amount</b>
                            </div>
                    </div><!--row-->
                       <!--<div class="div_tab_row">
                        <div class="div_tab_col1">
                                Tution Fees/1718  &emsp;  &emsp; &emsp; &emsp; 
                            </div>
                            <div class="div_tab_col2">
                             &nbsp;  1,367.00
                            </div>
                       </div>
                           <div class="div_tab_col1">
                                <b>Sub-Total  &emsp;  &emsp; &emsp;</b>
                            </div>
                            <div class="div_tab_col2">
                              <b><?php// echo $grand_total;?></b>
                            </div>
                       </div>-->
           </div><!-- main table-->
            </div><br>
            <table>
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
             <td>Sub-Total</td>
             <td><?php echo $grand_total ?></td>
         </tr>

     </table>


            
 <div class="tab_container">
                <div class="div_tab">
                    <div class="div_tab_row"><!--row-->
          <div class="div_tab_col1">
                                <b>Total  &emsp;  &emsp; &emsp; &emsp; </b>
                            </div>
                            <div class="div_tab_col2">
                        <b> &emsp;  &emsp;  &emsp;  &emsp;  &emsp; <?php echo $grand_total ?> </b>
                            </div>
            </div><!--row-->
                  </div><!-- main table-->
            </div><hr><!--table container-->

         <div>
             <span style="float:left;width:22%;font-weight:700;">Amount in Words:</span>
             <span style="float:right; font-weight:300; width:34%;"><b style="font-weight:400;">Cashier</b> : TALLY User</span><br>
               <span style="float:left; width:52%;"></span><br><br>
             </div>
             <p><b style="float:left; width:18%;">Bank Name :</b>
             <center style="width:50%">: The Navjeeevan Co-Op Bank Ltd</center>
             </p>
             <b style="float:left; width:13%;">Remark</b><br><br>
               <b style="float:left; width:11%;">Note:</b><br>
               <p style="float:left; width:40%;">: Fees once paid will not be refunded <br><br><br> * Pleasee ensure that resseipt is signed.</p><br><br>
               <!--<p style="float:left; width:28%;">* Pleasee ensure that resseipt is signed.</p>-->



   
   </div>
  </section>

    <!--end-->