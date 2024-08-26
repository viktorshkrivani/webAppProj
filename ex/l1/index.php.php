<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Scripting/EmptyPHPWebPage.php to edit this template
-->
<html>
    <head>
        
        
        
        <meta charset="UTF-8">
        <title>PAY</title>
    </head>
    <body>
        <h1>Weekly Pay Calculator</h1>
        <form method="post" action="">
          <label for="hourly_wage">Hourly Wage    :</label>
          <input type="text" id="hourly_wage" name="hourly_wage" required><br><br>
          <label for="hours_worked">Weekly Hours:</label>
          <input type="text" id="hours_worked" name="hours_worked" required><br><br>
          <label for="tax_rate">Tax R Est(%)  :</label>
          <input type="text" id="tax_rate" name="tax_rate" required><br><br> 
          <input type="submit" value="Calculate Pay">
        </form>
        
        <?php
          if ($_SERVER["REQUEST_METHOD"] == "POST") {
               $hourly_wage = $_POST['hourly_wage'];
               $hours_worked = $_POST['hours_worked'];
               $tax_rate = $_POST['tax_rate'];
               
               $overtime_hours = $hours_worked > 40 ? $hours_worked - 40 : 0;
               $regular_hours = $hours_worked > 40 ? 40 : $hours_worked;            
               $overtime_pay = $overtime_hours * $hourly_wage * 1.5;               
               $regular_pay = $regular_hours * $hourly_wage;
               

               $gross_pay = $regular_pay + $overtime_pay;
               
               
               $taxes_owed = $gross_pay * ($tax_rate / 100);
               $net_pay = $gross_pay - $taxes_owed;
               
               echo "<h2>Results</h2>";
               echo "Gross Pay: $" . number_format($gross_pay, 2) . "<br>";
               echo "Taxes Owed: $" . number_format($taxes_owed, 2) . "<br>";
               echo "Net Pay: $" . number_format($net_pay, 2) . "<br>";
                
              
          }
        
        ?>
    </body>
</html>
