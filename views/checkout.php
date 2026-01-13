<?php include 'layout/header.php'; ?>

<h3>🧾 Thanh toán</h3>

<form method="post" action="index.php?controller=checkout&action=placeOrder">

<label>Họ tên</label><br>
<input name="name" required><br><br>

<label>Số điện thoại</label><br>
<input name="phone" required><br><br>

<label>Địa chỉ giao hàng</label><br>
<textarea name="address" required></textarea><br><br>

<button>✅ Đặt hàng</button>

</form>

<?php include 'layout/footer.php'; ?>
