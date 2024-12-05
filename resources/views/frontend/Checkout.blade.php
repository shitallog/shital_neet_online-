<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEET Exam Checkout</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 2px 15px rgba(0, 0, 0, 0.1);
        }
        .checkout-form {
            text-align: center;
        }
        .checkout-form h2 {
            color: #333;
            font-size: 28px;
            margin-bottom: 30px;
        }
        .form-group {
            margin-bottom: 20px;
            text-align: left;
        }
        .form-group label {
            font-weight: 500;
            color: #555;
        }
        .form-group input {
            width: 100%;
            padding: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            font-size: 16px;
            box-sizing: border-box;
            transition: border-color 0.3s;
        }
        .form-group input:focus {
            border-color: #007bff;
            outline: none;
        }
        .btn-primary {
            background-color: #007bff;
            color: #fff;
            font-size: 16px;
            padding: 12px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        .btn-primary:hover {
            background-color: #0056b3;
        }
        hr {
            margin: 30px 0;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="checkout-form">
        <hr>
        <h2>Pay with PhonePe</h2>
        <!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<title>Phonepay Payment</title>
</head>
<body>
<form action="{{ route('pay') }}" method="POST">
    @csrf
    <section style="background-color: #eee;">
        <div class="container py-5">
            <div class="row d-flex justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-4">
                    <div class="card rounded-3">
                        <div class="card-body mx-1 my-2">
                            <div class="pt-3">
                                <div class="d-flex flex-row pb-3">
                                    <div class="rounded border border-primary border-2 d-flex w-100 p-3 align-items-center" style="background-color: rgba(18, 101, 241, 0.07);">
                                        <div class="d-flex align-items-center pe-3">
                                            <input class="form-check-input" type="radio" name="radioNoLabelX" id="radioNoLabel11" value="" aria-label="..." checked />
                                        </div>
                                        <div class="d-flex flex-column">
                                            <p class="mb-1 small text-primary">Total amount due</p>
                                            <input type="number" id="amount" name="amount" value="1600" class="form-control" readonly required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="package_id" value="{{ $package->id }}">
                            <div class="d-flex justify-content-between align-items-center pb-1">
                                <a href="{{ route('exam.index') }}" class="text-muted">Go back</a>
                                <button type="submit" class="btn btn-danger btn-lg">Pay amount</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>

<section style="background-color: #d5d4d4;">
<div class="container py-5">
    <div class="row d-flex justify-content-center">
    	<h3 class="text-center">CHECKOUT RESPONSE</h3>
      {{ $res_data }}
      <?php if (isset($res_data_status)) {echo $res_data_status;}?>
    </div>
</div>
</section>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>


        <hr>
    </div>
</div>

</body>
</html>
