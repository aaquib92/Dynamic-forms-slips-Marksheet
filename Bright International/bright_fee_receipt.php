<?php 
$global_arr1 = array();
$academic_year = "";
$id = "";
if(isset($data['stud_id']))
{
  $id = $stud_id;
  $global_arr1 = get_student_by_id($id);
}

$session_data = $this->session->all_userdata();
// die("iamhere");
$global_arr = array();
$cycle_arr[1] = "Annual";
$cycle_arr[2] = "Half yearly";
$cycle_arr[3] = "Quarterly";
$cycle_arr[4] = "Monthly";
$half_yearly_arr[1] = "Term 1";
$half_yearly_arr[2] = "Term 2";
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
// echo print_array($global_arr['data']);die();

$paid_fees = [];
$temp='';
$fee_cycle='';
foreach ($global_arr['data'] as $key => $value)
    {

        !(isset($paid_fees[$value['partner_class_fee_id']]['sub_total'])) ? $paid_fees[$value['partner_class_fee_id']]['sub_total'] = 0 : FALSE;
        !(isset($paid_fees[$value['partner_class_fee_id']]['months'])) ? $paid_fees[$value['partner_class_fee_id']]['months'] = '' : FALSE;

        if($value['cycle']=='4')            {$fee_cycle = 'Monthly';}
        elseif ($value['cycle']=='3')       {$fee_cycle = 'Quaterly';}
        elseif($value['cycle']=='2')        {$fee_cycle = 'Half Yearly';}
        elseif($value['cycle']=='1')        {$fee_cycle = 'Yearly';}

        $paid_fees[$value['partner_class_fee_id']]['cycle'] = $value['cycle'].$fee_cycle;
        $paid_fees[$value['partner_class_fee_id']]['partner_fee_name'] = $value['partner_fee_name'];

        if($value['cycle']=='4') {
            $temp = $monthly_arr[$value['cyclvalue']];}
        elseif ($value['cycle']=='3') {
            $temp = $quarterly_arr[$value['cyclvalue']];}
        elseif($value['cycle']=='2') {
            $temp = $half_yearly_arr[$value['cyclvalue']];}
        elseif($value['cycle']=='1') {
            $temp = 'Annual';}

        $paid_fees[$value['partner_class_fee_id']]['months'] = $paid_fees[$value['partner_class_fee_id']]['months'].$temp.', ';
        $paid_fees[$value['partner_class_fee_id']]['sub_total'] += $value['amount'];
    }

 //echo print_array($paid_fees);die;

//  echo print_array($paid_fees);die;

$grand_total =  (isset($global_arr['data']) && count($global_arr['data'])>0)?array_sum(array_column($global_arr['data'], 'amount')):0;
$first_name = isset($global_arr['data'][0]['first_name'])?$global_arr['data'][0]['first_name']:'';
$last_name = isset($global_arr['data'][0]['last_name'])?$global_arr['data'][0]['last_name']:'';
$roll_no = isset($global_arr['data'][0]['rollno'])?$global_arr['data'][0]['rollno']:'';
$standard = isset($global_arr['data'][0]['standard'])?$global_arr['data'][0]['standard']:'';
$div = isset($global_arr['data'][0]['section'])?$global_arr['data'][0]['section']:'';
$date = isset($global_arr['data'][0]['added_on'])?$global_arr['data'][0]['added_on']:'';
$gr_no = isset($global_arr['data'][0]['gr_number'])?$global_arr['data'][0]['gr_number']:'';
$section_check = ['8','9','10'];
$section = (in_array($standard,$section_check))?'Secondary':'Primary';

?>
<section onload="setTimeout(myFunction(), 3000)">
<script>
 $('.common_input').keyup(function(){
        $(this).attr('value',$(this).val()); 
    });

</script>
<style>
/*css for preview*/
.fee-receipt-div3{ width:95%;  height:95%;display:inline-block;}
.sign{ float:left;padding-left:10%;}
table{ margin-left:3%;}
.footer_div{ margin-left:-9%;}
.center{ text-align:center;}
.slip-input1 { min-width:149px;  border-bottom: 1px solid black; display: inline-block; }
.div-input1{ margin:0 auto;float:left; padding-left:3%;}
.name{ min-width: 547px;  border-bottom: 1px solid black; display: inline-block;}
   /*end of preview css*/
      /*css for print*/
 @media print{ span{border:none}  .common_input{border:none;} * {-webkit-print-color-adjust:exact;}  .fee_receipt-div3{ width:33%; }
 .slip-input1 { min-width:47px; }  .footer_div{ margin-left:0;} .sign{ padding-left:3%; } .name{ min-width: 267px; }

   }
   /*end of  print css*/
      @page { size: landscape;  margin:1%; }
</style>
<!--main div-->
<div class="fee_receipt-div3">
    <!--header-->
    <div class="head-div">
         <center>
            <?php if(get_session_data()['user']['type'] != 3)
{
?>
 <span style="font-size:1.2em;font-weight:700;"><?php echo get_session_data()['profile']['partner_name'] ; ?></span><br><br>
<?php
}
else
{
?>
<span style="font-size:1.2em;font-weight:700;"><?php echo $global_arr['partner_data'][0]['partner_name'] ; ?></span><br><br>
<?php
}
?>
        
                <span style="font-size:0.9em;font-weight:700;">VLS/107/ C-357 DATED 30-05-97-98/I.NO.16-16-131 </span><br>
                <span style="font-size:0.8em;font-weight:700;">Madhubn Bldg, Beverly Park, Near Kanakia Police station, </span><br>
                <span style="font-size:0.8em;font-weight:700;">Mira Road(E), Dist. Thane-401107 Tel.:02228111999 </span><br><br><br>
               <span style="font-size:1.3em;font-weight:700;"><u>FEE RECEIPT</u> </span><br>
         </center>
    </div><br>
     <div style="font-size:1em;font-weight:700;float:left;padding-left:3%;">No. <input type ="text" class ="common_input"></div><br><br>

     
     <div style="font-size:1.1em;font-weight:700;float:left;padding-left:3%">Section:<?php echo $section; ?></div>
     <div style="font-size:1.1em;font-weight:700;float:right;padding-right:3%;">Date <span class ="slip-input1"> <?php echo date('d-m-y'); ?></span> </div><br>
     

    <!--start of section div-->
    <div class="section-div" style ="margin-top:3%;">
       <div style="text-align:left;float:left;width:97%;padding-left:3%;">Mr/Mis: &emsp; <span class="name" ><b><?php echo $first_name .'  '. $last_name;?></b></span></div><br><br><br>
       <p class="div-input1">Std . &nbsp; <span class="slip-input1"><b><?php echo $standard . ' ' .$div;?></b> &nbsp; </span> Roll No. &nbsp; <span class="slip-input1"><b> <?php echo $roll_no ;?></b></span>  &nbsp; G.R. No.   &nbsp;<span class="slip-input1"><b> <?php echo $gr_no; ?></b> </span></p><br><br>
    </div>
            <!--end of section div-->

`
<!--start of footer div-->

<div class="footer_div">
<table cellpadding ="6" border="1" style="width:95%; border-collapse:collapse;">
<tbody>
    <tr>
        <td class = "center"><b>Particulars</b></td>
        <td class = "center"><b>Description</b></td>
        <td class = "center"><b>Rs.</b></td>
        <td class = "center"><b>P.</b></td>
    </tr>
    <tr>
    <?php  if(isset($global_arr['data']) && count($global_arr['data'])>0)
   
   
    foreach ($paid_fees as $key => $value)
   
    {
    
        echo "<tr>";
        echo "<td class = 'center'>" . $value['partner_fee_name']. "</td>";
        echo "<td class = 'center'>" .substr($value['months'],0,-2) . "</td>";
        echo "<td class = 'center'>".$value['sub_total'] . "</td>";
        echo "<td></td>";
        echo "</tr>";
    }
    ?>
     
        <tr>
        <td></td>
        <td class = "center"><b>TOTAL</b> </td>
        <td class = "center"><b><?php echo $grand_total;?></b></td>
        <td></td>
        </tr>
</tbody></table><br><br><br>
          
     <span class ="sign">Receiver's Signature</span>


<!--end of footer-->
</div>
</section>