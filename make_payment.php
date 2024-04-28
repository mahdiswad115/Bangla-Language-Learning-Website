<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Make Payment</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            max-width: 400px;
            width: 100%;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
        }
        h2 {
            text-align: center;
            color: #007bff;
            margin-bottom: 20px;
        }
        form {
            display: flex;
            flex-direction: column;
            align-items: center;
        }
        label {
            font-weight: bold;
            margin-bottom: 8px;
        }
        input[type="text"],
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 16px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            font-size: 16px;
        }
        input[type="submit"] {
            width: 50%;
            padding: 12px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
        #bkash_phone_number {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Make Payment</h2>
        <form action="process_payment.php" method="POST">
            <label for="amount">Enter Amount:</label>
            <input type="text" id="amount" name="amount" value="50" readonly>

            <label for="payment_method">Select Payment Method:</label>
            <select id="payment_method" name="payment_method">
                <option value="credit_card">Credit Card</option>
                <option value="debit_card">Debit Card</option>
                <option value="bkash">bKash</option>
            </select>

            <div id="bkash_phone_number">
                <label for="phone_number">Enter bKash Phone Number:</label>
                <input type="text" id="phone_number" name="phone_number">
            </div>

            <div id="card_number">
                <label for="card_number">Enter Card Number:</label>
                <input type="text" id="card_number" name="card_number">
            </div>

            <input type="submit" value="Pay Now">
        </form>
    </div>

    <script>
        document.getElementById("payment_method").addEventListener("change", function() {
            var bkashPhoneNumberDiv = document.getElementById("bkash_phone_number");
            var cardNumberDiv = document.getElementById("card_number");
            if (this.value === "bkash") {
                bkashPhoneNumberDiv.style.display = "block";
                cardNumberDiv.style.display = "none";
            } else if (this.value === "credit_card" || this.value === "debit_card") {
                bkashPhoneNumberDiv.style.display = "none";
                cardNumberDiv.style.display = "block";
            } else {
                bkashPhoneNumberDiv.style.display = "none";
                cardNumberDiv.style.display = "none";
            }
        });
    </script>
</body>
</html>
