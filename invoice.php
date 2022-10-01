<html>
<head>
<h1>INVOICE APPLICATION</h2>
<style>
table, th, td {
  border: 1px solid black;
}
h1 {text-align: center;}
</style>
</head>
<body>
<form name='invoiceform' method='post' action ="report.php">
<table id="tbl_invoice" name="tbl_invoice">
                <thead>
                    <tr>
                      <th>Name</th>
                       <th>Quantity</th>
                       <th>Unit Price (in $)</th>
                       <th>Tax</th>
                       <th>Total</th>
                    </tr>
                </thead>
                    <tbody>
                    <tr>
                       <td><input type="text" name="name[]" id="name"></td>
                       <td><input type="text" name="quantity[]" id="quantity" class="quantity" onchange="myFunction(id)"></td>
                       <td><input type="text" name="price[]" id="price" class="price" onchange="myFunctionNew(id)"></td>
                       <td><select id="tax" name="tax[]" onchange= calculateTax(id)>
                           <option value="0">0%</option>
                           <option value="1">1%</option>
                           <option value="5">5%</option>
                           <option value="10">10%</option>
                           </select>
                      </td>
                      <td id="total" class="total" name="total">
                      </td>
                    </tr>
                    </tbody>
                    </table></br>
                
                <input type="button" class="buttonCreateInv" id="btn_Add"  value="Add More"></br></br>
                Sub Total without tax :<input type="text" name="sub_total" id="sub_total" class="sub_total" readonly></br>
                Sub Total with tax    :<input type="text" name="sub_total_tax" id="sub_total_tax" readonly></br>
                Discount              :
                <select id="discount_type" name="discount_type" onchange="myDiscount()">
                    <option value="1">%</option>
                    <option value="2">$</option>
                </select>
                <input type="text" name="discount" id="discount" onchange="myDiscount()"></br>
                <b>Grand Total        :</b><input type="text" name="grand_total" id="grand_total" readonly></br></br>

               
                <button type="submit" class="btn cat-btn btn-primary">Generate Invoice</button>

                </body>
                
                
</form>

</html> 
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script type="text/javascript">

function myFunction(id)
 {       
   
         var quantity = document.getElementById(id).value;

         var replace= id.replace("quantity", "");
          
         if(replace !=0)
         {
           var id = "price";
           id += replace;
           var price = document.getElementById(id).value;
           var total = quantity * price;
           var idnew = "#total";
           idnew += replace;
           $(idnew).html(total);

           var tax_new = "tax";
           tax_new += replace;
           var tax_percentage = document.getElementById(tax_new).value;
       
         }
         else
         {
            var price = document.getElementById("price").value;
            var total = quantity * price;
            $('#total').html(total);
            var tax_percentage = document.getElementById("tax").value;
            
         }


         var sub_total = document.getElementsByName('sub_total')[0].value;
         var subtotal = +sub_total + +total;
         document.getElementsByName('sub_total')[0].value = subtotal;
       
       
        
       
         if(tax_percentage != 0)
        {
            var tax_value = subtotal * tax_percentage/100;
            var sub_total_tax = +subtotal + +tax_value;
            document.getElementsByName('sub_total_tax')[0].value = sub_total_tax;
            var subtotal = sub_total_tax;
        }
        else
        {
            document.getElementsByName('sub_total_tax')[0].value = subtotal;
        }


        var discount = document.getElementById("discount").value;
        if(discount)
        {
        var discount_type = document.getElementById("discount_type").value;
        if(discount_type == 1)
        {
            var dis_amount = subtotal * discount/100;
           
        }
        else
        {
            var dis_amount = discount;
        }
     
        }


         if(dis_amount) {
          document.getElementsByName('grand_total')[0].value = subtotal - dis_amount;
        }
        else
        {
            document.getElementsByName('grand_total')[0].value = subtotal;

        }

        
}


function myFunctionNew(id)
{
    
         var price = document.getElementById(id).value;

          var replace= id.replace("price", "");
          
         if(replace !=0)
         {
           var id = "quantity";
           id += replace;
           var quantity = document.getElementById(id).value;
           var total = quantity * price;
           var idnew = "#total";
           idnew += replace;
           $(idnew).html(total);


           var tax_new = "tax";
           tax_new += replace;
           var tax_percentage = document.getElementById(tax_new).value;
         }
         else
         {
            var quantity = document.getElementById("quantity").value;
            var total = quantity * price;
            $('#total').html(total);


            var tax_percentage = document.getElementById("tax").value;
         }





         var sub_total = document.getElementsByName('sub_total')[0].value;
         var subtotal = +sub_total + +total;
         document.getElementsByName('sub_total')[0].value = subtotal;
       

         if(tax_percentage != 0)
        {
            var tax_value = subtotal * tax_percentage/100;
            var sub_total_tax = +subtotal + +tax_value;
            document.getElementsByName('sub_total_tax')[0].value = sub_total_tax;
            var subtotal = sub_total_tax;
        }
        else
        {
            document.getElementsByName('sub_total_tax')[0].value = subtotal;
        }


        var discount = document.getElementById("discount").value;
        if(discount)
        {
        var discount_type = document.getElementById("discount_type").value;
        if(discount_type == 1)
        {
            var dis_amount = subtotal * discount/100;
           
        }
        else
        {
            var dis_amount = discount;
        }

       
        }
        if(dis_amount)
        {

           document.getElementsByName('grand_total')[0].value = subtotal - dis_amount;
        }
        else
        {
            document.getElementsByName('grand_total')[0].value = subtotal;

        }
       

}

function myDiscount()
{
 
    var discount = document.getElementById("discount").value;
    var subtotal =  document.getElementById("sub_total_tax").value;
   
    if(discount)
        {
            var discount_type = document.getElementById("discount_type").value;
            if(discount_type == 1)
            {
            var dis_amount = subtotal * discount/100;
                
            }
            else
             {
              var dis_amount = discount;
            }

       
        }
        if(dis_amount)
        {

           document.getElementsByName('grand_total')[0].value = subtotal - dis_amount;
        }
        else
        {
            document.getElementsByName('grand_total')[0].value = subtotal;

        }
       

}



function calculateTax(id)
{
    
        var tax_percentage = document.getElementById(id).value;
        
        
        var replace= id.replace("tax", "");
        
         if(replace !=0)
         {
           var id = "price";
           id += replace;
           var quantity_id = "quantity";
           quantity_id += replace;
           var price = document.getElementById(id).value;
           var quantity = document.getElementById(quantity_id).value;
           var total = quantity * price;
           
          
           
       
         }
         else
         {
            var price = document.getElementById("price").value;
            var quantity = document.getElementById("quantity").value;
            var total = quantity * price;
            var tax_percentage = document.getElementById("tax").value;
            
         }


        
       
        
       
         if(tax_percentage != 0)
        {
            var tax_value = total * tax_percentage/100;
            var sub_total =  document.getElementsByName('sub_total_tax')[0].value;
            var sub_total_tax = +sub_total + +tax_value;
            document.getElementsByName('sub_total_tax')[0].value = sub_total_tax;
            var grand_total = document.getElementsByName('grand_total')[0].value;
            document.getElementsByName('grand_total')[0].value = +grand_total + +tax_value;
           
        }
       


     
}

function resetForms() {
    document.forms['invoiceform'].reset();
}


$(document).ready(function () {
    resetForms();
    $("#btn_Add").click(function () {
               var $tableBody = $('#tbl_invoice').find("tbody"),
                $trLast = $tableBody.find("tr:last"),
                $trNew = $trLast.clone();
                $trNew.find('[id]').each(function () {
                    var num = this.id.replace(/\D/g, '');
                    if (!num) {
                        num = 0;
                    }
                    this.id = this.id.replace(/\d/g, '') 
                        + (1 + parseInt(num, 10));
                });
        
                $trLast.after($trNew); 
                $('#tbl_invoice tr:last input').val('');
            });
        });

    </script>



