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
$academic_year = (date('m') < 6) ?((date('Y')-1)." - ".date('Y')):date('Y')." - ".(date('Y')+1);
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
//echo print_array($global_arr['data']);die;

$paid_fees = [];
$temp='';
$fee_cycle='';
$mode_of_payment='';
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

if($value['cycle']=='4')        {$temp = $monthly_arr[$value['cyclvalue']];}
elseif ($value['cycle']=='3')   {$temp = $quarterly_arr[$value['cyclvalue']];}
elseif($value['cycle']=='2')    {$temp = $half_yearly_arr[$value['cyclvalue']];}
elseif($value['cycle']=='1')    {$temp = 'Annual';}

$paid_fees[$value['partner_class_fee_id']]['months'] = $paid_fees[$value['partner_class_fee_id']]['months'].$temp.', ';
$paid_fees[$value['partner_class_fee_id']]['sub_total'] += $value['amount'];

if($value['mop']=='4')            {$mode_of_payment = 'Online';}
elseif ($value['mop']=='3')       {$mode_of_payment = 'RTGS/NEFT';}
elseif($value['mop']=='2')        {$mode_of_payment = 'Cheque'; $cheque_number = $value['cheque_no'];}
elseif($value['mop']=='1')        {$mode_of_payment = 'Cash';}
elseif($value['mop']=='5')        {$mode_of_payment = 'Bank Deposit';}

}

//echo print_array($paid_fees);die;

//echo print_array($paid_fees);die;

$grand_total = (isset($global_arr['data']) && count($global_arr['data'])>0)?array_sum(array_column($global_arr['data'], 'amount')):0;
$first_name = isset($global_arr['data'][0]['first_name'])?$global_arr['data'][0]['first_name']:'';
$last_name = isset($global_arr['data'][0]['last_name'])?$global_arr['data'][0]['last_name']:'';
$roll_no = isset($global_arr['data'][0]['rollno'])?$global_arr['data'][0]['rollno']:'';
$standard = isset($global_arr['data'][0]['standard'])?$global_arr['data'][0]['standard']:'';
$section = isset($global_arr['data'][0]['section'])?$global_arr['data'][0]['section']:'';
$date = isset($global_arr['data'][0]['added_on'])?$global_arr['data'][0]['added_on']:'';
$gr_no = isset($global_arr['data'][0]['gr_number'])?$global_arr['data'][0]['gr_number']:'';
?>
<?php

function convert_number_to_words($number) {

    $hyphen      = '-';
    $conjunction = ' and ';
    $separator   = ', ';
    $negative    = 'negative ';
    $decimal     = ' point ';
    $dictionary  = array(
        0                   => 'zero',
        1                   => 'one',
        2                   => 'two',
        3                   => 'three',
        4                   => 'four',
        5                   => 'five',
        6                   => 'six',
        7                   => 'seven',
        8                   => 'eight',
        9                   => 'nine',
        10                  => 'ten',
        11                  => 'eleven',
        12                  => 'twelve',
        13                  => 'thirteen',
        14                  => 'fourteen',
        15                  => 'fifteen',
        16                  => 'sixteen',
        17                  => 'seventeen',
        18                  => 'eighteen',
        19                  => 'nineteen',
        20                  => 'twenty',
        30                  => 'thirty',
        40                  => 'fourty',
        50                  => 'fifty',
        60                  => 'sixty',
        70                  => 'seventy',
        80                  => 'eighty',
        90                  => 'ninety',
        100                 => 'hundred',
        1000                => 'thousand',
        1000000             => 'million',
        1000000000          => 'billion',
        1000000000000       => 'trillion',
        1000000000000000    => 'quadrillion',
        1000000000000000000 => 'quintillion'
    );

    if (!is_numeric($number)) {
        return false;
    }

    if (($number >= 0 && (int) $number < 0) || (int) $number < 0 - PHP_INT_MAX) {
        // overflow
        trigger_error(
            'convert_number_to_words only accepts numbers between -' . PHP_INT_MAX . ' and ' . PHP_INT_MAX,
            E_USER_WARNING
        );
        return false;
    }

    if ($number < 0) {
        return $negative . convert_number_to_words(abs($number));
    }

    $string = $fraction = null;

    if (strpos($number, '.') !== false) {
        list($number, $fraction) = explode('.', $number);
    }

    switch (true) {
        case $number < 21:
            $string = $dictionary[$number];
            break;
        case $number < 100:
            $tens   = ((int) ($number / 10)) * 10;
            $units  = $number % 10;
            $string = $dictionary[$tens];
            if ($units) {
                $string .= $hyphen . $dictionary[$units];
            }
            break;
        case $number < 1000:
            $hundreds  = $number / 100;
            $remainder = $number % 100;
            $string = $dictionary[$hundreds] . ' ' . $dictionary[100];
            if ($remainder) {
                $string .= $conjunction . convert_number_to_words($remainder);
            }
            break;
        default:
            $baseUnit = pow(1000, floor(log($number, 1000)));
            $numBaseUnits = (int) ($number / $baseUnit);
            $remainder = $number % $baseUnit;
            $string = convert_number_to_words($numBaseUnits) . ' ' . $dictionary[$baseUnit];
            if ($remainder) {
                $string .= $remainder < 100 ? $conjunction : $separator;
                $string .= convert_number_to_words($remainder);
            }
            break;
    }

    if (null !== $fraction && is_numeric($fraction)) {
        $string .= $decimal;
        $words = array();
        foreach (str_split((string) $fraction) as $number) {
            $words[] = $dictionary[$number];
        }
        $string .= implode(' ', $words);
    }

    return $string;
}

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

.div_tab_row {
display: table-row;
}

@media print
{
span{border:none}
* {-webkit-print-color-adjust:exact;}
}
   @page {
        size: Landscape;
        margin: 2%;
        /*margin: 1mm 1mm 1mm 1mm;*/
    }


</style>
<section onload="setTimeout(myFunction(), 3000)">
<!--main div-->
<div class="fee_receipt-div3" style=" width:90%; padding:3%">
<!--header-->
<div class="head-div">
<div id="header_block" style="display:flex;">
<div id="school_logo"> <img width="100" height="100" src="<?php echo $stud_school_logo; ?>"> </div>
<center>

<div id="school_name" style="margin-left:70px;">
<span style="font-size:1.2em;font-weight:300; border:1px">BOMBAY AND BANDRA BAKAR KASAI JAMAT MOSQUES TRUST (Regd.B-582)</span><br><br>
<span style="font-size:1.4em;font-weight:700;">BANDRA URDU HIGH SCHOOL <br>JR COLLEGE OF SCI,COM & HSC.VOCATIONAL</span><br>
<span style="font-size:1em;font-weight:300;"><?php echo $stud_school_addr; ?> </span><br><br>
<span style="font-size:1em;font-weight:300;">(SECONDARY SECTION) </span><br><br>
</div>
</center>
</div>
</div>
<!--start of section div-->
<div class="section_div">
<p class="div-input1">
<span> G.R. No. :  &emsp;<b> <?php echo $gr_no; ?> </b></span> &emsp;
<span class="slip-input1"> Std & Div: &emsp; <b><?php echo $standard . ' ' .$section;?></b> &emsp; </span>
<span class="slip-input1"> year: &emsp; <b><?php echo $academic_year ;?></b></span> &emsp;
</p><br><br>
<div style="text-align:left;float:left;width:97%;padding-left:3%;">Received From Master: &emsp; <span class="slip-input1" style="min-width:344px;"><b><?php echo $first_name .'  '. $last_name;?></b></span></div><br><br>
<div style="text-align:left;float:left;width:97%;padding-left:3%;">The Sum of Rupees: &emsp; <span class="slip-input1" style="min-width:344px;"><b><?php echo convert_number_to_words($grand_total); ?></b>
</span> only as detailed below</div><br>
</div>
<!--end of section div-->
`
<!--start of footer div-->

<div class="footer_div"><br>
<table border=1; style="width:95%; border-collapse:collapse; margin:10px;">
<tbody>
<tr>
<td style="width:20%"><b>Particulars</b></td>
<td style="width:20%"><b>Amount</b></td>
</tr>
<?php if(isset($global_arr['data']) && count($global_arr['data'])>0)

foreach ($paid_fees as $key => $value)
{

echo "<tr>";
echo "<td>" . $value['partner_fee_name']. "</td>";
echo "<td>".$value['sub_total'] . "</td>";
echo "</tr>";
}
?>
<tr>
<td><b> Grand Total</b> </td>
<td><b><?php echo $grand_total;?></b></td>
</tr>
</tbody></table><br>
<div style="float:left;padding-left:5%;">Date: <?php echo date('d-m-y'); ?>  &emsp; &emsp;  Fees Clerk   _____________-</div><br><br>

<!--end of footer-->
</div><br>






<!--//end-->


</section>