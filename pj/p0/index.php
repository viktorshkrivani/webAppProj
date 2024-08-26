<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Tax Calc</title>
</head>
<body>
    <h1>Tax Calc</h1>
    <form method="post" action="">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br><br>
        <label for="income">Income:</label>
        <input type="text" id="income" name="income" required><br><br>
        <label for="deductions">Deductions:</label>
        <input type="text" id="deductions" name="deductions" required><br><br>
        <input type="submit" name="submit" value="Calculate Taxes">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $name = htmlspecialchars($_POST['name']);
        $income = $_POST['income'];
        $deductions = $_POST['deductions'];

        if (!is_numeric($income) || !is_numeric($deductions)) {
            echo "<p>Enter numeric values for income and deductions.</p>";
            exit();
        }

        $standard_deduction = 12950;
        if ($deductions < $standard_deduction) {
            $deductions = $standard_deduction;
        }

        $adjusted_income = $income - $deductions;

        // Tax brackets
        $tax_brackets = [
            [10275, 0.10],
            [41775, 0.12],
            [89075, 0.22],
            [170050, 0.24],
            [215950, 0.32],
            [539900, 0.35],
            [PHP_INT_MAX, 0.37]
        ];

        $taxes_owed = 0;
        $remaining_income = $adjusted_income;
        $previous_limit = 0;

        foreach ($tax_brackets as $bracket) {
            $limit = $bracket[0];
            $rate = $bracket[1];
            if ($remaining_income > 0) {
                $taxable_income = min($remaining_income, $limit - $previous_limit);
                $taxes_owed += $taxable_income * $rate;
                $remaining_income -= $taxable_income;
                $previous_limit = $limit;
            } else {
                break;
            }
        }

        // Calculate taxes owed at each bracket
        $taxes_at_brackets = [
            "10%" => min($adjusted_income, 10275) * 0.10,
            "12%" => max(min($adjusted_income - 10275, 41775 - 10275) * 0.12, 0),
            "22%" => max(min($adjusted_income - 41775, 89075 - 41775) * 0.22, 0),
            "24%" => max(min($adjusted_income - 89075, 170050 - 89075) * 0.24, 0),
            "32%" => max(min($adjusted_income - 170050, 215950 - 170050) * 0.32, 0),
            "35%" => max(min($adjusted_income - 215950, 539900 - 215950) * 0.35, 0),
            "37%" => max(($adjusted_income - 539900) * 0.37, 0)
        ];

        echo "<h2>Tax Calculator Results for " . $name . "</h2>";
        echo "<p>Gross Income: $" . number_format($income, 2) . "</p>";
        echo "<p>Total Deductions: $" . number_format($deductions, 2) . "</p>";
        echo "<p>Adjusted Gross Income: $" . number_format($adjusted_income, 2) . "</p>";
        foreach ($taxes_at_brackets as $bracket => $tax) {
            echo "<p>Taxes Owed at $bracket bracket: $" . number_format($tax, 2) . "</p>";
        }
        echo "<p>Total Taxes Owed: $" . number_format($taxes_owed, 2) . "</p>";
        echo "<p>Taxes Owed as percentage of gross income: " . number_format(($taxes_owed / $income) * 100, 2) . "%</p>";
        echo "<p>Taxes Owed as percentage of adjusted gross income: " . number_format(($taxes_owed / $adjusted_income) * 100, 2) . "%</p>";
    }
    ?>
</body>
</html>