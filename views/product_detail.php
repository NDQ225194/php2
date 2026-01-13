<?php include 'layout/header.php'; ?>

<h3><?= $item['name'] ?></h3>
<img src="<?= $item['image'] ?>" width="300">
<p>Giá: <?= number_format($item['price']) ?> đ</p>

<?php include 'layout/footer.php'; ?>
