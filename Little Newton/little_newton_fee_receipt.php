<?php 

function convert_number_to_words($number) {

    $hyphen      = '-';
    $conjunction = ' and ';
    $separator   = ', ';
    $negative    = 'negative ';
    $decimal     = ' point ';
    $dictionary  = array(
        0                   => 'Zero',
        1                   => 'One',
        2                   => 'Two',
        3                   => 'Three',
        4                   => 'Four',
        5                   => 'Five',
        6                   => 'Six',
        7                   => 'Seven',
        8                   => 'Eight',
        9                   => 'Nine',
        10                  => 'Ten',
        11                  => 'Eleven',
        12                  => 'Twelve',
        13                  => 'Thirteen',
        14                  => 'Fourteen',
        15                  => 'Fifteen',
        16                  => 'Sixteen',
        17                  => 'Seventeen',
        18                  => 'Eighteen',
        19                  => 'Nineteen',
        20                  => 'Twenty',
        30                  => 'Thirty',
        40                  => 'Fourty',
        50                  => 'Fifty',
        60                  => 'Sixty',
        70                  => 'Seventy',
        80                  => 'Eighty',
        90                  => 'Ninety',
        100                 => 'Hundred',
        1000                => 'Thousand',
        1000000             => 'Million',
        1000000000          => 'Billion',
        1000000000000       => 'Trillion',
        1000000000000000    => 'Quadrillion',
        1000000000000000000 => 'Quintillion'
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
<?php




$global_arr1 = [];
$academic_year = "";
$id = "";
if(isset($data['stud_id']))
{
  $id = $stud_id;
  $global_arr1 = get_student_by_id($id);
}
$session_data = $this->session->all_userdata();
$global_arr = [];
$cycle_arr = ["","Annual","Half yearly","Quarterly","Monthly"];
$half_yearly_arr = ["","Term 1","Term 2"];
$monthly_arr = ["","Jan","Feb","March","April","May","June","July","August","Sept","Oct","Nov","Dec"];
$quarterly_arr = ["","Quarter 1","Quarter 2","Quarter 3","Quarter 4"];
$payment_mode = ["","CASH","CHEQUE","NEFT/RTGS","ONLINE","BANK DEPOSITE"];
$global_arr = unserialize(base64_decode($session_data['myfeedata']));
 //echo print_array($global_arr);die();

$payment_receipts = 9200 + count(array_unique(array_column(get_fee_payment_info_with_transactions(),'payment_id')));

$grand_total =  (isset($global_arr['data']) && count($global_arr['data'])>0)?array_sum(array_column($global_arr['data'], 'amount')):0;
$first_name = isset($global_arr['data'][0]['first_name'])?$global_arr['data'][0]['first_name']:'';
$last_name = isset($global_arr['data'][0]['last_name'])?$global_arr['data'][0]['last_name']:'';
$roll_no = isset($global_arr['data'][0]['rollno'])?$global_arr['data'][0]['rollno']:'';
$standard = isset($global_arr['data'][0]['standard'])?$global_arr['data'][0]['standard']:'';
$div = isset($global_arr['data'][0]['section'])?$global_arr['data'][0]['section']:'';
$gr_no = isset($global_arr['data'][0]['gr_number'])?$global_arr['data'][0]['gr_number']:'';
$stud_id = isset($global_arr['data'][0]['student_id'])?$global_arr['data'][0]['student_id']:'';

$section = 'Pre Primary';
$section_sec = ['8th','9th','10th'];
$section_pri = ['1st','2nd','3rd','4th','5th','6th','7th'];
(in_array($standard,$section_pri))? $section ='Primary'    :FALSE;
(in_array($standard,$section_sec))? $section ='Secondary'  :FALSE;
?>
<section onload="setTimeout(myFunction(), 3000)">

<style>
    
    .fee-receipt-div3{ width:100%; outline:1px solid black;}
    #fine-div{display:none;}
    table{ width:100%; }
    .left{float:left;padding-left:3%;}
    .center{text-align:center;}
    .border{border-right:1px solid black;}
    .top{border-top:1px solid black;}
    .center{ text-align:center;}
    .slip-input1 { min-width:149px;  border-bottom: 1px solid black; display: inline-block; }
    .div-input1{ margin:0 auto;float:left; padding-left:3%;}
    .name{ min-width: 547px;  border-bottom: 1px solid black; display: inline-block;}
     @media print{ span{border:none}
       .common_input{border:none;} 
       * {-webkit-print-color-adjust:exact;}
         #fine-div{display:none;}
       }
    </style>

    <!--main div-->
<div class="fee-receipt-div3">
    <!--header-->
    <div class="head-div">
         <center>
          <?php
          if(get_session_data()['user']['type'] != 3){
            $school_name =  get_session_data()['profile']['partner_name'] ;
          }
          else{$school_name =  $global_arr['partner_data'][0]['partner_name'] ;}
          ?>
                <img src ="" class ="left">
                <span style="font-size:1.5em;font-weight:700;"><u>LITTLE NEWTON</u></span> <br><br>
                <span style="font-size:1em;font-weight:400;">(Pre-Primary Section) </span><br><br>
                <span style="font-size:1.2em;font-weight:400;"><u>RELEVANT E-TECHNO HIGH SCHOOL</u> </span><br>
                <span style="font-size:1em;font-weight:400;">(International School for Radical Science, Mathematics & Technology) </span><br>
                <span style="font-size:1em;font-weight:400;"> [State Board School (1st-10th)] </span><br>

         </center>
     </div><br><br>

     <table>
         <tr>
             <td>Fee Receipt No:-</td>
             <td contenteditable ="true"></td>
         </tr>
         <tr>
             <td>Name of the candidate:-</td>
             <td><?php echo strtoupper($first_name .'  '. $last_name);?></td>
         </tr>
         <tr>
             <td>Class:-</td>
             <td><?php echo $standard; ?></td>
             <td>Division:-</td>
             <td><?php echo strtoupper($div); ?></td>
             <td>Date:-</td>
             <td><?php echo date('d-m-y'); ?></td>
         </tr>
         <tr></tr>
         <tr>
                    <th class ="border top center" colspan ="2">Fees Details</th>
                    <th class ="border top center"  colspan ="2">Month/Details</th>
                    <th class ="border top center"  colspan ="2">Amount</th>
                   
         </tr>

         <?php  if(isset($global_arr['data']) && count($global_arr['data'])>0)


$fine_list = [];

foreach ($global_arr['data'] as $key => $value) {

if(isset($_SESSION['fee_fine_data'][$stud_id][$value['partner_class_fee_id']])){

  $fine_list[$value['partner_class_fee_id']]['amount'] = $_SESSION['fee_fine_data'][$stud_id][$value['partner_class_fee_id']]['amount'];
  $fine_list[$value['partner_class_fee_id']]['description'] = $_SESSION['fee_fine_data'][$stud_id][$value['partner_class_fee_id']]['description'];

}
$fee_name =  strtoupper($value['partner_fee_name']);
if($value['cycle'] == 4){
     $months = $monthly_arr[$value['cyclvalue']];
}elseif($value['cycle'] == 2){


    $months = $half_yearly_arr[$value['cyclvalue']];

}else{
    $months = "Annual";
}

$fee_name =  $value['partner_fee_name'];

echo "<tr>";
echo "<td class = 'center border top' colspan ='2'>" .$fee_name."</td>";
echo "<td class = 'center border top' colspan ='2'>".$months."</td>";
echo "<td class = 'center border top' colspan ='2'>".$value['amount'] . "</td>";
echo "</tr>";
}
?>
<?php   




foreach ($fine_list as $k => $v) {

  echo "<tr>";
  echo "<td class = 'center border top' colspan ='2'>".$v['description']."</td>";
  echo "<td class = 'center border top' colspan ='2' contenteditable = 'true'></td>";
  echo "<td class = 'center border top' colspan ='2'>".$v['amount']. "</td>";
 
  echo "</tr>";

  $grand_total += $v['amount'];
}




?>
<tr>
    <td class = 'center border top' colspan ='2'>Total Fee Paid</td>
    <td class = 'center border top' colspan ='2'></td>
    <td class = 'center border top' colspan ='2'><?php echo $grand_total ;?></td>
</tr> 
<tr>
    <td colspan ="2" class = 'center border top'>Desciption of charges if any:-</td>
    <td class = 'center border top' colspan ="4"></td>
</tr>   
<tr>
    <td colspan ="2" class = 'center border top'>Mode of Payment &emsp;<?php echo $payment_mode[$value['mop']]?></td>
    <td class = 'center border top' colspan ="4"></td>
</tr>   
<tr>
    <td colspan ="2" class = 'center border top'>Total Fees:-</td>
    <td class = 'center border top' colspan ="4"><?php echo $grand_total ;?></td>
</tr>
<tr>
    <td colspan ="6" class = 'center border top'>Total fees Paid in Words:- <?php echo convert_number_to_words($grand_total);
       unset($_SESSION['fee_fine_data'][$stud_id]); ?></td>
</tr>
<tr>
    <td colspan ="6" class ="border top">Terms and Conditions:-</td>
</tr>
<tr>
    <td colspan ="6" class ="border top">1.Parents are requested to Properly check the fee reciept after paying the fees.</td>
</tr>
<tr>
    <td colspan ="6" class ="border top">2.In case of any issues kindly inform at the counter immediately.No further issues will be entertained after the fees reciept has been issued.</td>
</tr>
<tr>
    <td colspan ="6" class ="border top">3.Parents are always supposed to bring their fees cards and reciepts both at the time of fees submissions.</td>
</tr>
<tr>
    <td colspan ="6" class ="border top">4.Incase of any major concerns can mail us finance@rimtedu.org/principal.rphs@gmail.com</td>
</tr>
<tr>
    <td colspan ="6" class ="border top">5.Fees once paid will not be returned under any circumstances</td>
</tr>
<tr>
    <td colspan ="6" class ="border top">6.Fees paid in the the form of cheque should in the favour of "Relevant Education Society".No other cheques are accepted</td>
</tr>
<tr>
    <td colspan ="6" class ="border top">7.Parents are informed to pay theor monthly fees before 15 th of every month.Failing to which a fne of Rs:10/per day will be charged after the due date.</td>
</tr>
<tr>
    <td colspan ="6" class ="border top">8.All the activity fees ,Transportation fees are to be paid at the fees counter only and not supposed to be paid to any other staffs or any other member.School Management will be not responsible for any such complaints.</td>
</tr>
<tr>
    <td colspan ="6" class ="border top">9.Subject to Thane Juridiction</td>
</tr>



     </table>




 </div>
        </section>