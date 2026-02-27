<script src="https://app.sandbox.midtrans.com/snap/snap.js"
        data-client-key="{{ config('services.midtrans.client_key') }}">
</script>

<script>
    window.onload = function () {
        snap.pay('{{ $snapToken }}', {
            onSuccess: function(result){
                window.location.href = "/anggota/iuran/transaksi/" + result.order_id;
            },
            onPending: function(result){
                alert('Menunggu pembayaran');
            },
            onError: function(result){
                alert('Pembayaran gagal');
            }
        });
    };
</script>
