<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Hyperpay</title>
</head>
<body>

    <div class="container my-5 py-5">
        <div class="row justify-content-center">
            <div class="col-6">
                <script src="https://eu-test.oppwa.com/v1/paymentWidgets.js?checkoutId={{ $checkoutId }}"></script>
                <form action="{{ route('hyperpay.result') }}" class="paymentWidgets" data-brands="VISA MASTER AMEX MADA"></form>

            </div>
        </div>
    </div>

</body>
</html>
