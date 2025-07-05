<!DOCTYPE html>
<html>
<head>
    <title>Stripe Payment</title>
</head>
<body>
@if(session('success'))
    <p style="color:green">{{ session('success') }}</p>
@endif
@if(session('error'))
    <p style="color:red">{{ session('error') }}</p>
@endif

<form action="{{ route('payment') }}" method="POST">
    @csrf
    <input type="hidden" name="name" value="{{ $name }}">
    <input type="hidden" name="address" value="{{ $address }}">
    <input type="hidden" name="phone" value="{{ $phone }}">

    <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
        data-key="{{ env('STRIPE_KEY') }}"
        data-amount="{{ $amount * 100 }}"
        data-name="Laravel Shop"
        data-description="Confirm Order"
        data-currency="usd">
    </script>
</form>
</body>
</html>
