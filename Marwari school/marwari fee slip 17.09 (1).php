
   <?php
$global_arr1 = array();
$academic_year = "";
$id = "";
if(isset($data['stud_id']))
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
//  echo print_array($global_arr['data']);die;
 
 $paid_fees = []; 

   foreach ($global_arr['data'] as $key => $value)
    {

        !(isset($paid_fees[$value['partner_class_fee_id']]['sub_total'])) ? $paid_fees[$value['partner_class_fee_id']]['sub_total'] = 0 : FALSE;

        $paid_fees[$value['partner_class_fee_id']]['cycle'] = $value['cycle'];
        $paid_fees[$value['partner_class_fee_id']]['partner_fee_name'] = $value['partner_fee_name'];
        $paid_fees[$value['partner_class_fee_id']]['months'][] = $value['cyclvalue'];
        $paid_fees[$value['partner_class_fee_id']]['sub_total'] += $value['amount'];
    }

 $no_of_months=''; 
 $no_of_quarters='';
 $no_of_terms='';
 $yearly='annual';
 

     foreach ($paid_fees as $key => $value)
    {
        if($value['cycle']=='4') {
            
            foreach($value['months'] as $key1 => $val) {
             $no_of_months = $no_of_months.$monthly_arr[$val].', '; }
           }
           
        
        elseif($value['cycle']=='3')
        {
            foreach($value['months'] as $key1 => $val1) {
            $no_of_quarters=$no_of_quarters.$quarterly_arr[$val1].', ';}
           
        }
        elseif($value['cycle']=='2')
        {
            foreach($value['months'] as $key1 => $val2) {
                $no_of_terms = $no_of_terms.$half_yearly_arr[$val2].', ';}
                
            }
           
        }
        
    


//  echo print_array($paid_fees);die;

$grand_total =  (isset($global_arr['data']) && count($global_arr['data'])>0)?array_sum(array_column($global_arr['data'], 'amount')):0;
$first_name = isset($global_arr['data'][0]['first_name'])?$global_arr['data'][0]['first_name']:'';
$last_name = isset($global_arr['data'][0]['last_name'])?$global_arr['data'][0]['last_name']:'';
$roll_no = isset($global_arr['data'][0]['rollno'])?$global_arr['data'][0]['rollno']:'';
$standard = isset($global_arr['data'][0]['standard'])?$global_arr['data'][0]['standard']:'';
$section = isset($global_arr['data'][0]['section'])?$global_arr['data'][0]['section']:'';
$date = isset($global_arr['data'][0]['added_on'])?$global_arr['data'][0]['added_on']:'';
$gr_no = isset($global_arr['data'][0]['gr_number'])?$global_arr['data'][0]['gr_number']:'';
?>
<section onload="setTimeout(myFunction(), 3000)">

<style>
.fee-receipt-div3{
    width:95%;
    height:95%;
    display:inline-block; 
    /*border: 1px solid black;*/
}*/
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
 <div class="fee_receipt-div3">
    <!--header-->
    <div class="head-div">
 <div style="float:right;padding-right:5%;">Date: <?php echo date('d-m-y'); ?> </div><br>
         <center>
             <span style="font-size:1.4em;font-weight:700;"><?php echo $stud_school_name ; ?></span><br><br>
             <span style="font-size:1em;font-weight:300;"><?php echo $stud_school_addr ; ?> </span><br><br>
               <span style="font-size:1.3em;font-weight:300;">FEE RECEIPT </span><br>
         </center>
    </div><br>
    <!--start of section div-->
    <div class="section_div">
       <div style="text-align:left;float:left;width:97%;padding-left:3%;">Name in Full: &emsp; <span class="slip-input1" style="min-width:344px;"><b><?php echo $first_name .'  '. $last_name;?></b></span></div><br><br>
       <p class="div-input1">Std & Div: &emsp; <span class="slip-input1"><b><?php echo $standard . ' ' .$section;?></b> &emsp; </span> Roll No: &emsp; <span class="slip-input1"><b> <?php echo $roll_no ;?></b></span>  &emsp; <span>G.R. No. :  &emsp; <?php echo $gr_no; ?> </span></p><br><br>
    </div>
            <!--end of section div-->

`
<!--start of footer div-->

 <div class="footer_div"><br>
 <table border=1; style="width:80%; border-collapse:collapse;">
<tbody>
    <tr>
        <td style="width:25%"><b>Particulars</b></td>
        <td style="width:15%"><b>Cycle</b></td>
        <td style="width:40%"><b>Description</b></td>
        <td style="width:20%"><b>Amount</b></td>
    </tr>
    <?php  if(isset($global_arr['data']) && count($global_arr['data'])>0)
    $temp ='';
    
    foreach ($paid_fees as $key => $value)
    
    {
    //print_r($monthly_arr);die;
        if($value['cycle']=='4') 
        {$temp ='Monthly';
        echo "<tr>";
        echo "<td>" . $value['partner_fee_name']. "</td>";
        echo "<td  >". $temp. "</td>";
        echo "<td>" . substr(trim($no_of_months),0,-1) . "</td>";
        echo "<td>".$value['sub_total'] . "</td>";
        echo "</tr>";
        } 

        elseif($value['cycle']=='3') 
        {$temp ='Quarterly';
        echo "<tr>";
        echo "<td>" . $value['partner_fee_name']. "</td>";
        echo "<td  >". $temp. "</td>";
        echo "<td>" . substr(trim($no_of_quarters),0,-1) . "</td>";
        echo "<td>".$value['sub_total'] . "</td>";
        echo "</tr>";
        }

        elseif($value['cycle']=='2')
        {$temp ='Half Yearly';
        echo "<tr>";
        echo "<td>" . $value['partner_fee_name']. "</td>";
        echo "<td  >". $temp. "</td>";
       echo "<td>" . substr(trim($no_of_terms),0,-1) . "</td>";
        echo "<td>".$value['sub_total'] . "</td>";
        echo "</tr>";
        } 

        elseif($value['cycle']=='1') 
        {$temp ='Annual';
        echo "<tr>";
        echo "<td>" . $value['partner_fee_name']. "</td>";
        echo "<td  >". $temp. "</td>";
        echo "<td>" .$yearly . "</td>";
        echo "<td>".$value['sub_total'] . "</td>";
        echo "</tr>";
        }
    }
    ?>
      
        <tr>
        <td></td>
        <td> </td>
        <td><b>Total</b> </td>
        <td><b><?php echo $grand_total;?></b></td>
        </tr>
</tbody></table><br><br>
           
     <span style="float:right;padding-right:5%">Class Teacher</span>


<!--end of footer-->
</div><br><br><br><hr>

<div class="fee_receipt-div3">
    <!--header-->
    <div class="head-div">
 <div style="float:right;padding-right:5%;">Date: <?php echo date('d-m-y'); ?> </div><br>
         <center>
             <span style="font-size:1.4em;font-weight:700;"><?php echo $stud_school_name ; ?></span><br><br>
             <span style="font-size:1em;font-weight:300;"><?php echo $stud_school_addr ; ?> </span><br><br>
               <span style="font-size:1.3em;font-weight:300;">FEE RECEIPT </span><br>
         </center>
    </div><br>
    <!--start of section div-->
    <div class="section_div">
       <div style="text-align:left;float:left;width:97%;padding-left:3%;">Name in Full: &emsp; <span class="slip-input1" style="min-width:344px;"><b><?php echo $first_name .'  '. $last_name;?></b></span></div><br><br>
       <p class="div-input1">Std & Div: &emsp; <span class="slip-input1"><b><?php echo $standard . ' ' .$section;?></b> &emsp; </span> Roll No: &emsp; <span class="slip-input1"><b> <?php echo $roll_no ;?></b></span>  &emsp; <span>G.R. No. :  &emsp; <?php echo $gr_no; ?> </span></p><br><br>
    </div>
            <!--end of section div-->

`
<!--start of footer div-->

 <div class="footer_div"><br>
 <table border=1; style="width:80%; border-collapse:collapse;">
<tbody>
    <tr>
        <td style="width:25%"><b>Particulars</b></td>
        <td style="width:15%"><b>Cycle</b></td>
        <td style="width:40%"><b>Description</b></td>
        <td style="width:20%"><b>Amount</b></td>
    </tr>
    <?php  if(isset($global_arr['data']) && count($global_arr['data'])>0)
    $temp ='';
    
    foreach ($paid_fees as $key => $value)
    
    {
    //print_r($monthly_arr);die;
        if($value['cycle']=='4') 
        {$temp ='Monthly';
        echo "<tr>";
        echo "<td>" . $value['partner_fee_name']. "</td>";
        echo "<td  >". $temp. "</td>";
        echo "<td>" . substr(trim($no_of_months),0,-1) . "</td>";
        echo "<td>".$value['sub_total'] . "</td>";
        echo "</tr>";
        } 

        elseif($value['cycle']=='3') 
        {$temp ='Quarterly';
        echo "<tr>";
        echo "<td>" . $value['partner_fee_name']. "</td>";
        echo "<td  >". $temp. "</td>";
        echo "<td>" . substr(trim($no_of_quarters),0,-1) . "</td>";
        echo "<td>".$value['sub_total'] . "</td>";
        echo "</tr>";
        }

        elseif($value['cycle']=='2')
        {$temp ='Half Yearly';
        echo "<tr>";
        echo "<td>" . $value['partner_fee_name']. "</td>";
        echo "<td  >". $temp. "</td>";
        echo "<td>" . substr(trim($no_of_terms),0,-1) . "</td>";
        echo "<td>".$value['sub_total'] . "</td>";
        echo "</tr>";
        } 

        elseif($value['cycle']=='1') 
        {$temp ='Annual';
        echo "<tr>";
        echo "<td>" . $value['partner_fee_name']. "</td>";
        echo "<td  >". $temp. "</td>";
        echo "<td>" .$yearly . "</td>";
        echo "<td>".$value['sub_total'] . "</td>";
        echo "</tr>";
        }
    }
    ?>
      
        <tr>
        <td></td>
        <td> </td>
        <td><b>Total</b> </td>
        <td><b><?php echo $grand_total;?></b></td>
        </tr>
</tbody></table><br><br>
           
     <span style="float:right;padding-right:5%">Class Teacher</span>


<!--end of footer-->
</div><br><br><br><hr>
</section>
