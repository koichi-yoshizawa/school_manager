
    <h3>コース申し込み完了</h3>
    <h3>ありがとうございました</h3>
    <h3>今すぐ決済{{ $booking->amount }}円</h3>

    <form action="{{route('user.payment.finish')}}" method="post" class="center">
        @csrf
        <script type="text/javascript" src="https://checkout.pay.jp/" class="payjp-button"
            data-key="pk_test_efc741f0940ab8762ef3e1fb" data-text="クレジットカード登録"></script>
        <input type="hidden" name="price" value={{ $booking->amount }}>
    </form>
