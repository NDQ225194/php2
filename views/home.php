<?php include 'layout/header.php'; ?>

<h3>Sản phẩm</h3>
<div style="display:flex;flex-wrap:wrap">
<?php while($row = $products->fetch_assoc()): ?>
    <div style="width:30%;margin:10px">
        <img src="<?= $row['image'] ?>" width="150">
        <h4><?= $row['name'] ?></h4>
        <p><?= number_format($row['price']) ?> đ</p>
        <a href="index.php?controller=product&action=detail&id=<?= $row['id'] ?>">Chi tiết</a>
    </div>
<?php endwhile; ?>
</div>

<?php for($i=1;$i<=$totalPages;$i++): ?>
    <a href="?page=<?= $i ?>"><?= $i ?></a>
<?php endfor; ?>

<?php include 'layout/footer.php'; ?>
