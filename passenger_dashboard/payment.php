<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Payment Details</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 900px;
            margin: auto;
            background-color: #fff;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            border-radius: 10px;
        }

        h2 {
            text-align: center;
            color: #333;
            margin-bottom: 30px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 30px;
        }

        th, td {
            border: 1px solid #aaa;
            padding: 12px;
            text-align: left;
            font-size: 15px;
        }

        th {
            background-color: #004080;
            color: #fff;
            text-transform: uppercase;
        }

        td:first-child {
            font-weight: bold;
        }

        .bkash {
            background-color: #e5f7e0;
            text-align: center;
            font-weight: bold;
            font-size: 16px;
            padding: 14px;
            border: 1px solid #aaa;
        }

        .note {
            display: flex;
            justify-content: space-between;
            align-items: center;
            background-color: #e1f5e1;
            padding: 15px 20px;
            border-radius: 8px;
            border-left: 6px solid #25d366;
            font-size: 16px;
            margin-top: 30px;
        }

        .note-text {
            flex: 1;
        }

        .note img {
            width: 28px;
            height: 28px;
            margin-left: 10px;
        }

        @media (max-width: 600px) {
            table, tr, td, th {
                display: block;
                width: 100%;
            }

            .note {
                flex-direction: column;
                align-items: flex-start;
            }

            .note img {
                margin: 10px 0 0 0;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Company Bank Details</h2>
        <table>
            <tr>
                <th>BRAC Bank</th>
                <th>Bank Asia</th>
            </tr>
            <tr>
                <td>
                    A/C Name: TRAVEL DESTINATION B.D<br>
                    A/C Number: 1551204209750001<br>
                    Bank: BRAC BANK<br>
                    Branch: UTTARA BRANCH
                </td>
                <td>
                    A/C Name: TRAVEL DESTINATION BD<br>
                    A/C Number: 01233053881<br>
                    Bank: BANK ASIA<br>
                    Branch: BANANI BRANCH
                </td>
            </tr>
            <tr>
                <th>Dutch Bangla Bank Ltd</th>
                <th>City Bank</th>
            </tr>
            <tr>
                <td>
                    A/C Name: TRAVEL DESTINATION BD<br>
                    A/C Number: 1171100041455<br>
                    Bank: DUTCH BANGLA BANK LTD<br>
                    Branch: UTTARA JOSHIMODDIN
                </td>
                <td>
                    A/C Name: TRAVEL DESTINATION B.D<br>
                    A/C Number: 1502731074001<br>
                    Bank: CITY BANK<br>
                    Branch: UTTARA
                </td>
            </tr>
        </table>
        <div class="bkash">
            BKASH MERCHANT: 01967-686861 (Make payment)
        </div>

        <div class="note">
            <div class="note-text">
                Once the payment is transferred, kindly share a screenshot as confirmation to our WhatsApp: <strong>01967-686862</strong>
            </div>
        </div>
    </div>
</body>
</html>
