<h3>Thanh toán</h3>

<form method="post" action="index.php?controller=order&action=process">
    <label>Tên:</label><br>
    <input type="text" name="name" required><br>

    <label>Email:</label><br>
    <input type="email" name="email" required><br>

    <label>Điện thoại:</label><br>
    <input type="text" name="phone"><br>

    <label>Địa chỉ:</label><br>
    <textarea name="address" required></textarea><br><br>

    <button type="submit">Đặt hàng</button>
</form>
