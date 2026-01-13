<h3>Giỏ hàng của bạn</h3>

<form method="post" action="index.php?controller=cart&action=update">
<table border="1" cellpadding="8" cellspacing="0">
    <tr>
        <th>Hình</th>
        <th>Tên</th>
        <th>Giá</th>
        <th>Số lượng</th>
        <th>Thành tiền</th>
        <th>Xóa</th>
    </tr>

<?php
$total = 0;
foreach ($cart as $id => $item):
    $subtotal = $item['price'] * $item['qty'];
    $total += $subtotal;
?>
<tr>
    <td><img src="public/images/<?= $item['image'] ?>" width="60"></td>
    <td><?= $item['name'] ?></td>
    <td><?= number_format($item['price']) ?> đ</td>
    <td>
        <input type="number" name="qty[<?= $id ?>]" value="<?= $item['qty'] ?>" min="1">
    </td>
    <td><?= number_format($subtotal) ?> đ</td>
    <td>
        <a href="index.php?controller=cart&action=remove&id=<?= $id ?>">
            Xóa
        </a>
    </td>
</tr>
<?php endforeach; ?>

<tr>
    <td colspan="4"><b>Tổng tiền</b></td>
    <td colspan="2"><b><?= number_format($total) ?> đ</b></td>
</tr>
</table>

<button type="submit">Cập nhật giỏ hàng</button>
</form>

<br>
<a href="index.php?controller=product&action=index">⬅ Tiếp tục mua</a>


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

