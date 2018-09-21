
<section onload="setTimeout(myFunction(), 3000)">

<style>
.record-acad-div2{
    width:95%;
    height:95%;
    display:inline-block; 
    /*background-color:#FFF176;*/
    background: #FFF176; /* For browsers that do not support gradients */
    background: -webkit-linear-gradient(#FFF176, white); /* For Safari 5.1 to 6.0 */
    background: -o-linear-gradient(#FFF176, white); /* For Opera 11.1 to 12.0 */
    background: -moz-linear-gradient(#FFF176, white); /* For Firefox 3.6 to 15 */
    background: linear-gradient(#FFF176, white);  Standard syntax (must be last) 
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
    }

         @media print
   {
       span{border:none}
    * {-webkit-print-color-adjust:exact;} 
    
         
   }
</style>
 <!--main div-->
 <div class="record-acad-div2">
    <!--header-->
    <div class="head-div">
         <center>
            <img  width="650" height="30" src="<?=base_url()?>assets/images/header.jpg" ><br><br>
             <span style="font-weight:700;font-size:1.2em;color:#e57373;">ATTENDANCE</span><br>
         </center>
    </div><br><br>
    <table border="1">
        <tr>
            <td>Month</td>
            <td>June</td>
            <td>July</td>
            <td>Aug</td>
            <td>Sept</td>
            <td>Oct</td>
            <td>Nov</td>
            <td>Dec</td>
            <td>Jan</td>
            <td>Feb</td>
            <td>March</td>
            <td>April</td>
        </tr>
        <tr>
            <td>Total No of Working days</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Total No of present days</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Class Teacher's Sign</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Parent's Sign</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td>Head Master's Sign</td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
    </table><br><br>



<table border="1">
    <tr>
        <td>GRADATION TABLE</td>
    </tr>
    <tr>
        <td>Marks</td>
        <td>91% to 100%</td>
        <td>81% to 90%</td>
        <td>71% to 80%</td>
        <td>61% to 70%</td>
        <td>51% to 60%</td>
        <td>41% to 50%</td>
        <td>33% to 40%</td>
        <td>21% to 32% </td>
        <td>Less than 20%</td>
    
    </tr>
    <tr>
        <td style="color=blue;">Grade</td>
        <td>A-1</td>
        <td>A-2</td>
        <td>B-1</td>
        <td>B-2</td>
        <td>C-1</td>
        <td>C-2</td>
        <td>D</td>
        <td>E-1</td>
        <td>E-2</td>
    </tr>
</table>

 
         <img  width="650" height="90" src="<?=base_url()?>assets/images/footer.jpg" >
   </div>
  </section>

    <!--end-