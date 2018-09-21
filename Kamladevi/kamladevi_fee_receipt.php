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
/*.fee-receipt-div2{
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
.slip-input1 {
        min-width: 100px;
        border-bottom: 1px solid black;
        display: inline-block;
                }
                 @page {
        size:  Portrait;
        margin:0;
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
 <div class="fee_receipt-div2" style="width:95%;height:95%; display:inline-block;">
    <!--header-->
    <div class="head-div" style="border:1px solid black; border-radius:25px; height:12%; margin-top:5%">
         <img class="left"  width="80" height="70" src="<?php echo $stud_school_logo ; ?>">
         <center style="margin-top:2%;">
             <span style="font-weight:500;font-size:1.1em;">SHREE MAULI SHIKSHAN PRASARAK MANDAL'S</span><br><br>
             <span style="font-size:1.4em;font-weight:700;"><?php echo $stud_school_name ; ?></span><br><br>
             <span style="font-size:1em;font-weight:300;"><?php echo $stud_school_addr ; ?> </span><br>
         </center>
    </div><br>
    <!--start of section div-->
    <div class="section_div" style="border:1px solid black; border-radius:25px; height:7%;">
     <div class="tab_container">
                <div class="div_tab">

                    <div class="div_tab_row" style="margin-top:2%;"><!--row-->
                            <div class="div_tab_col1">
                                 No  &emsp;  &emsp; &emsp;
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
                                Name  &emsp;  &emsp; &emsp; 
                            </div>
                            <div class="div_tab_col2">
                              : <b><?php echo $first_name." " . $last_name ?> &emsp;</b>
                            </div>
                    </div><!--row-->

                    <div class="div_tab_row"><!--row-->
                           <div class="div_tab_col1">
                                Std  &emsp;  &emsp; &emsp;
                            </div>
                            <div class="div_tab_col2">
                              : <b> <?php echo $standard ?> </b>
                            </div>
                            <div class="div_tab_col1">
                                Div  &emsp;  &emsp; &emsp;
                            </div>
                            <div class="div_tab_col2">
                              : <?php echo $section ?> 
                            </div>
                    </div><!--row-->

                  </div><!-- main table-->
            </div><!--table container-->
            </div><br>
            <!--end of section div-->


<!--start of footer div-->

 <div class="footer_div" style="border:1px solid black; border-radius:25px; height:40%;"><br><br>
            <table border="1" style="width:100%">
            <thead>
                <th>Particulars</th>
                <th>Rs</th>
            </tr>
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

<div class="tab_container">
                <div class="div_tab">

                    <div class="div_tab_row"><!--row-->
                            <div class="div_tab_col1">
                                Cash/Cheque No   &emsp;  &emsp; &emsp;
                            </div>
                            <div class="div_tab_col2">
                              : <b></b>
                            </div>
                    </div><!--row-->

                    <div class="div_tab_row"><!--row-->
                           <div class="div_tab_col1">
                               Bank Name  &emsp;  &emsp; &emsp; 
                            </div>
                            <div class="div_tab_col2">
                              : <b></b>
                            </div>
                    </div><!--row-->

                    <div class="div_tab_row"><!--row-->
                           <div class="div_tab_col1">
                               Amount in Words   &emsp;  &emsp; &emsp;
                            </div>
                            <div class="div_tab_col2">
                              : <b><?php echo convert_number_to_words($grand_total); ?> </b>
                            </div>
                    </div><br><br><!--row-->

                          <div class="div_tab_row"><!--row-->
                           <div class="div_tab_col1">
                              Receiver's Sign    &emsp;  &emsp; &emsp;
                            </div>
                            <div class="div_tab_col2">
                              : <b>________________ </b>
                            </div>
                    </div><!--row-->

                  </div><!-- main table-->
            </div><br><br><!--table container-->



</div>
<!--end of footer-->


   
   </div>
  </section>

    <!--end-->