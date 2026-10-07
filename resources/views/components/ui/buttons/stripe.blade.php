<form action="{{ route('checkout.stripe', ['payment' => 'stripe']) }}" method="POST">
    @csrf
    <button class="bg-primary text-white border border-primary hover:bg-transparent hover:text-primary py-2 px-4 rounded-full w-full" type="submit">Checkout</button>

</form>
