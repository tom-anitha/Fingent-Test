
<html>
<head>
<h1>INVOICE DETAILS</h2>
<style>
table, th, td {
  border: 1px solid black;
}
h1 {text-align: center;}
</style>
<div id="divToPrint">

<?php
$name =  $_POST['name'];
$quantity = $_POST['quantity'];
$price  = $_POST['price'];
$tax = $_POST['tax'];
$subtotal = isset($_POST['sub_total']) ? $_POST['sub_total'] : 0;
$sub_total_tax = isset($_POST['sub_total_tax']) ? $_POST['sub_total_tax'] : 0;
$grand_total = isset($_POST['grand_total']) ? $_POST['grand_total'] : 0;
$discount_type=  $_POST['discount_type'] ;
$discount = $_POST['discount'];

?>
<table id="tbl_invoice" name="tbl_invoice" style="width:60%; Height:60;">
 <tr>
                    
                <td><b>Name </b></td>
                       <?php 
                       if(!empty($name)){
                         foreach ($name as $n)
                            {
                                print('<td>'.$n.'</td>');
                            }
                       }
                       ?>
                       </tr><tr><td><b>Quantity </b></td>
                       <?php  $i=0; $total = array(); 
                       if(!empty($quantity))
                       {
                            foreach ($quantity as $n)
                                {
                         
                                    print('<td>'.$n.'</td>');

                                    if(is_numeric($n))
                                    {
                                    $total_amount = $n * $price[$i];
                                    array_push($total,$total_amount);
                                    }
                                    $i++;
                                }
                        }
                       ?>
                       </tr><tr><td><b>Price</b></td>
                       <?php 
                       if(!empty($price))
                       {
                       foreach ($price as $n)
                       {
                          print('<td>'.$n.'</td>');
                       }
                       }
                       ?>
                       </tr> <tr><td><b>Tax</b></td>
                       <?php  if(!empty($price)) {
                       foreach ($price as $n)
                       {
                          print('<td>'.$n.'%</td>');
                       }}
                       
                       ?>
                       </tr>
                       <tr><td><b>Total</b></td>
                       <?php
                       if(!empty($total))
                       {
                       foreach ($total as $n)
                       {
                        print('<td>'.$n.'</td>');

                       }
                       }
                       ?>
                    </tr>
                  
                </table></br>



<b>Sub Total: </b><?=$subtotal; ?></br>
<b>Sub Total With Tax: </b> <?=$sub_total_tax; ?></br>
<b>Discount : </b><?=(isset($discount)) ? $discount : 0; ?><?=($discount_type == 1) ? '%' : '$'; ?></br>
<b>Grand Total : </b><?=$grand_total; ?></br>



</div>
</div>
<div>
                    </br><input type="button" value="Print Invoice" onclick="PrintDiv();" />
</div>


<script type="text/javascript">     
    
    function PrintDiv() {    
                            var divToPrint = document.getElementById('divToPrint');
                            var popupWin = window.open('', '_blank', 'width=300,height=300');
                            popupWin.document.open();
                            popupWin.document.write('<html><body onload="window.print()">' + divToPrint.innerHTML + '</html>');
                            popupWin.document.close();
              }
 </script>
