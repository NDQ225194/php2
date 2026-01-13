<h3><?= $product['name'] ?></h3>
<img src="public/images/<?= $product['image'] ?>" width="300">
<p><?= $product['description'] ?></p>
<h4><?= number_format($product['price']) ?> đ</h4>

<a href="index.php?controller=product&action=index">⬅ Quay lại</a>

<a href="index.php?controller=cart&action=add&id=<?= $product['id'] ?>"
   style="padding:8px;background:green;color:white">
   Thêm vào giỏ hàng
</a>

