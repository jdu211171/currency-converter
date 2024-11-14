<?php
require_once 'Currency.php';
$currency = new Currency();
$currencies = $currency->getCurrencies();
$convertedAmount = null;

$amount = $_POST['amount'] ?? 10000;
$fromCurrency = $_POST['from_currency'] ?? 'USD';
$toCurrency = $_POST['to_currency'] ?? 'USD';
$error = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($fromCurrency !== $toCurrency) {
        $exchangeRate = $currency->getExchangeRate($fromCurrency, $toCurrency);

        if ($exchangeRate) {
            $convertedAmount = $amount * $exchangeRate;
        }
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .currency-card {
            max-width: 600px;
            margin: 0 auto;
            padding: 30px;
            background: #fff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        .currency-section {
            padding: 60px 0;
        }

        .info-section {
            padding: 60px 0;
            text-align: center;
        }

        .btn-primary-custom {
            background-color: #d32f2f;
            border: none;
        }
    </style>
</head>
<body>
<div class="currency-section text-center pt-5 bg-primary-subtle">
    <h1>Currency Converter</h1>
    <p>Need to make an international business payment? Take a look at our live foreign exchange rates.</p>
    <div class="currency-card">
        <h3>Make fast and affordable international business payments</h3>
        <p>Send secure international business payments in XX currencies, all at competitive rates with no hidden
            fees.</p>
        <form method="post">
            <div class="row g-3 align-items-center">
                <div class="col-md-5">
                    <label for="amount" class="form-label visually-hidden">Amount</label>
                    <input type="number" id="amount" name="amount" class="form-control" placeholder="Amount"
                           value="<?= htmlspecialchars($amount) ?>">
                </div>
                <div class="col-md-3">
                    <select class="form-select" id="to_currency" name="to_currency">
                        <?php foreach ($currencies as $currency): ?>
                            <option value="<?= $currency->Ccy ?>" <?= $currency->Ccy == $toCurrency ? 'selected' : '' ?>><?= $currency->Ccy ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-1 text-center">
                    <button id="swap-currencies" class="btn btn-link">⇆</button>
                </div>
                <div class="col-md-3 text-center">
                    <select class="form-select" id="from_currency" name="from_currency">
                        <?php foreach ($currencies as $currency): ?>
                            <option value="<?= $currency->Ccy ?>" <?= $currency->Ccy == $fromCurrency ? 'selected' : '' ?>><?= $currency->Ccy ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <p id="error-message" class="text-danger mt-2"><?= $error ?></p>
            <p class="rate-info mt-2">1.00 USD = 12,862.73 UZS <i class="bi bi-info-circle"></i></p>
            <button type="submit" class="btn btn-primary btn-primary-custom mt-3">Convert</button>
        </form>
        <?php if ($convertedAmount !== null): ?>
            <p class="mt-3">Converted Amount: <?= number_format($convertedAmount, 2) ?></p>
        <?php endif; ?>
    </div>
</div>
<div class="info-section bg-light">
    <h4 class="fw-bold">Let’s see the weather</h4>
    <p class="text-muted">Stay updated with the latest weather information.</p>
    <button class="btn btn-outline-danger"><a href="weather.php" class="btn">Find out more</a></button>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const swapButton = document.getElementById('swap-currencies');
        const fromCurrencySelect = document.getElementById('from_currency');
        const toCurrencySelect = document.getElementById('to_currency');
        const form = document.querySelector('form');
        const errorElement = document.getElementById('error-message');

        swapButton.addEventListener('click', function (e) {
            e.preventDefault();
            const fromCurrency = fromCurrencySelect.value;
            fromCurrencySelect.value = toCurrencySelect.value;
            toCurrencySelect.value = fromCurrency;
        });

        form.addEventListener('submit', function (e) {
            if (fromCurrencySelect.value === toCurrencySelect.value) {
                e.preventDefault();
                errorElement.textContent = 'Please select different currencies for conversion.';
            }
        });
    });
</script>
</body>
</html>