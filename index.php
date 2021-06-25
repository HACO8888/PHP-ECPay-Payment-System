<html>

<head>
    <title>PHP ECPay Payment System</title>
    <style>
        h1 {
            display: block;
            text-align: center;
        }

        h2 {
            font-size: 20px;
            display: block;
            text-align: center;
        }

        input {
            text-align: center;
            width: 265px;
            height: 50px;
            padding: 10px;
            margin: 5px auto;
            font-size: 20px;
            border: 2px solid black;
            border-radius: 10px;
            display: block;
        }

        select {
            width: 265px;
            height: 50px;
            padding: 10px;
            margin: 5px auto;
            font-size: 20px;
            border: 2px solid black;
            border-radius: 10px;
            display: block;
            text-align: center;
        }

        button {
            height: 50px;
            padding: 10px;
            margin: 5px auto;
            font-size: 20px;
            border: 2px solid black;
            border-radius: 10px;
            display: block;
        }
    </style>
</head>

<body>
    <div>
        <form id="" method="post" action="Ecpay.php">
            <br>
            <hr>
            <h1>PHP ECPay Payment System</h1>
            <hr>
            <br>
            <h2>商品名稱</h2>
            <input type="text" name="ItemName" placeholder="請輸入商品名稱" Required>
            <br>
            <h2>贊助金額</h2><input type="text" name="TotalAmount" placeholder="30 ~ 30000(元)" Required>
            <br>
            <h2>付款方式</h2>
            <select name="ChoosePayment">
                <option value="ALL">請選擇付款方式</option>
                <option value="Credit">信用卡</option>
                <option value="WebATM">網路ATM</option>
                <option value="ATM">自動櫃員機</option>
                <option value="CVS">超商代碼</option>
                <option value="BARCODE">超商條碼</option>
            </select>
            <br>
            <button type="submit" class="btn">付款</button>
        </form>
    </div>
</body>

</html>