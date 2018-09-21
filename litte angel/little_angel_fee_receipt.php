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
$session_data = $this->session->all_userdata();
$global_arr = array();
$cycle_arr[1] = "Annual";
$cycle_arr[2] = "Half yearly";
$cycle_arr[3] = "Quarterly";
$cycle_arr[4] = "Monthly";
$half_yearly_arr[1] = "Half Yearly-1";
$half_yearly_arr[2] = "Half Yearly-2";
$monthly_arr = ["Jan","Feb","March","April","May","June","July","August","Sept","Oct","Nov","Dec"];

$quarterly_arr[1] = "Quarter 1";
$quarterly_arr[2] = "Quarter 2";
$quarterly_arr[3] = "Quarter 3";
$quarterly_arr[4] = "Quarter 4";
$global_arr = unserialize(base64_decode($session_data['myfeedata']));
$fee_fine_data = [];
$fine_amount = 0;
$grand_total =  (isset($global_arr['data']) && count($global_arr['data'])>0)?array_sum(array_column($global_arr['data'], 'amount')):0;
$g_total =  $grand_total + $fine_amount;
$first_name = isset($global_arr['data'][0]['first_name'])?$global_arr['data'][0]['first_name']:'';
$last_name = isset($global_arr['data'][0]['last_name'])?$global_arr['data'][0]['last_name']:'';
$stud_id = isset($global_arr['data'][0]['student_id'])?$global_arr['data'][0]['student_id']:'';






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
$global_arr = unserialize(base64_decode($session_data['myfeedata']));
 //echo print_array($global_arr);die();

$payment_receipts = 9200 + count(array_unique(array_column(get_fee_payment_info_with_transactions(),'payment_id')));

$grand_total =  (isset($global_arr['data']) && count($global_arr['data'])>0)?array_sum(array_column($global_arr['data'], 'amount')):0;
$first_name = isset($global_arr['data'][0]['first_name'])?$global_arr['data'][0]['first_name']:'';
$last_name = isset($global_arr['data'][0]['last_name'])?$global_arr['data'][0]['last_name']:'';
$roll_no = isset($global_arr['data'][0]['rollno'])?$global_arr['data'][0]['rollno']:'';
$standard = isset($global_arr['data'][0]['standard'])?$global_arr['data'][0]['standard']:'';
$div = isset($global_arr['data'][0]['section'])?$global_arr['data'][0]['section']:'';
$date = isset($global_arr['data'][0]['added_on'])?$global_arr['data'][0]['added_on']:'';
$gr_no = isset($global_arr['data'][0]['gr_number'])?$global_arr['data'][0]['gr_number']:'';
$section = 'Pre Primary';
$section_sec = ['8th','9th','10th'];
$section_pri = ['1st','2nd','3rd','4th','5th','6th','7th'];
(in_array($standard,$section_pri))? $section ='Primary'    :FALSE;
(in_array($standard,$section_sec))? $section ='Secondary'  :FALSE;
?>
<section onload="setTimeout(myFunction(), 3000)">
<script>
 $('.common_input').keyup(function(){
        $(this).attr('value',$(this).val()); 
    });
</script>
<style>
    
.fee-receipt-div3{ width:75%;  margin: 0 auto;}
#fine-div{display:none;}
table{ width:100%; }
.b_left{border-left:1px solid black;}
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
<div class="fee_receipt-div3">
    <!--header-->
    <div class="head-div">
         <center><br>
          <?php
          if(get_session_data()['user']['type'] != 3){
            $school_name =  get_session_data()['profile']['partner_name'] ;
          }
          else{$school_name =  $global_arr['partner_data'][0]['partner_name'] ;}
          ?>
                   <span style="font-size:1.2em;font-weight:700;">SHRI RAMNIKLAL NAGJI CHHEDA (GAJODWALA) CHARITABLE TRUST'S </span><br>
                   <span style="font-size:1em;font-weight:700;">REGD.(E/1584/THANE) (GOVT.RECOGNIZED) (ESTD 1992) </span><br>
                 <img src ="https://s3-ap-southeast-1.amazonaws.com/digimkey-assets/43/images/logo.png" class ="left">
                <span style="font-size:1.4em;font-weight:700;">LITTLE ANGEL'S</span><br>       
                <span style="font-size:1em;font-weight:400;">SHREEE.GANGJI MEKAN SATRA (SUVAIWALA) ENGLISH MEDIUM HIGH SCHOOL </span><br>
                <span style="font-size:1em;font-weight:400;">MATUSHRI RAMABEN GANGJI SATRA (SUVAIWALA) ENGLISH MEDIUM SECONDARY SCHOOL </span><br>
                <span style="font-size:1em;font-weight:400;">MATUSHRI  TARABEN NAGJI CHHEDA (GAJODWALA) ENGLISH MEDIUM PRIMARY SCHOOL </span><br><br>
         </center>
    </div><hr style ="border-bottom:1px solid black;">
    <center><span style="font-size:1em;font-weight:300;">Kasar Wadawali, Ghodbunder Road,Thane(West)-400 615 Phone:-25970547  </span><br></center><hr style ="border-bottom:1px solid black;"><br><br>
        <div id ="main-div">
            <table>
                <tr>
                 <div style ="text-align:center;margin-top:2%;">FEE RECEIPT</div>
                </tr><br>
                <tr>
                    <td>Receipt No :</td>
                    <td contenteditable ="true"></td>
                    <td>Date:</td>
                    <td><?php echo date('d-m-y'); ?></td>
                </tr>
                <tr>
                    <td>Received From:</td>
                    <td><?php echo strtoupper($first_name .'  '. $last_name);?></td>
                    <td>Student-ID</td>
                    <td contenteditable ="true"></td>
                </tr>
                <tr>
                  <td></td>
                  <td></td>
                  <td>class</td>
                  <td><?php echo $standard; ?></td>
                </tr>
                <tr>
                   <td>Mother Name</td>
                   <td contenteditable ="true"></td>
                   <td>Division</td>
                   <td><?php echo strtoupper($div); ?></td>
                </tr>
                <tr>
                 <td>Section</td>
                 <td><?php echo strtoupper($section); ?></td>
                 <td></td>

                 <td></td>
                </tr>
                <tr>
                    <th class ="border top center">Description</th>
                    <th class ="border top center">Amount &#8377;</th>
                    <th class ="border top center">Description</th>
                    <th class ="border top center">Amount &#8377;</th>
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
            $fee_name =  strtoupper($value['partner_fee_name']).  " (".$monthly_arr[$value['cyclvalue']].")";
        }

        echo "<tr>";
        echo "<td class = 'center border top'>" .$fee_name."</td>";
        echo "<td class = 'center border top'>".$value['amount'] . "</td>";
        echo "<td class = 'center border top' contenteditable = 'true'></td>";
        echo "<td class = 'center border top' contenteditable = 'true'></td>";
        echo "</tr>";
    }
    ?>
    <?php   
    
        // if ($stud_id == $fee_fine_data['student_id']){
        // echo "<tr>";
        // echo "<td class = 'center border top'>".$fee_fine_data['description']. "</td>";
        // echo "<td class = 'center border top'>".$fee_fine_data['fine_amount']. "</td>";
        // echo "<td class = 'center border top' contenteditable = 'true'></td>";
        // echo "<td class = 'center border top' contenteditable = 'true'></td>";
        // echo "</tr>";
        // }else{
        //     echo "<tr></tr>";
        // }
    

        foreach ($fine_list as $k => $v) {

            echo "<tr>";
            echo "<td class = 'center border top'>".$v['description']."</td>";
            echo "<td class = 'center border top'>".$v['amount']. "</td>";
            echo "<td class = 'center border top' contenteditable = 'true'></td>";
            echo "<td class = 'center border top' contenteditable = 'true'></td>";
            echo "</tr>";
    
            $grand_total += $v['amount'];
        }
        



      ?>

    <tr>
        <td class = 'center top'></td>
        <td class = 'center top'></td>
        <td class = 'center top'>TOTAL</td>
        <?php
        // if ($stud_id == $fee_fine_data['student_id']){
        //    echo  " <td class = 'center top'>&#8377;$g_total</td>";
        // }else{
           echo  " <td class = 'center top'>&#8377;$grand_total</td>";
        // }


        unset($_SESSION['fee_fine_data'][$stud_id]);
        ?>
        
   </tr>
       <td class = "top" colspan = "2">
       <div>Mode of Payment:Cash
        </div><br>
        <div>Amount in Words:</div><br>
        <div style ="margin-left:-4%;"> &emsp;INR <?php echo convert_number_to_words($grand_total); ?></div>

       </td>
       <td class = "top" colspan = "2">
       <div style ="float:right;margin-top:-10%;">Name Of User: TALLY User</div><br>
       <div style ="float:right;padding-right:20%;">Signature<div>
       </td>
       </tr>

            </table>

        </div><br>
        <div style ="float:left;">DD/Cheque subject to be realisation.</div>

</div> 
</section>