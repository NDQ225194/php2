<h3>Thiết bị vệ sinh</h3>

<h4>Danh mục</h4>
<ul>
<?php while($c = $categories->fetch_assoc()): ?>
    <li><?= $c['name'] ?></li>
<?php endwhile; ?>
</ul>

<hr>

<div style="display:flex;gap:20px">
<?php while($p = $products->fetch_assoc()): ?>
    <div style="border:1px solid #ccc;padding:10px;width:200px">
        <img src="public/images/<?= $p['image'] ?>" width="180">
        <h4><?= $p['name'] ?></h4>
        <p><?= number_format($p['price']) ?> đ</p>
        <a href="index.php?controller=product&action=detail&id=<?= $p['id'] ?>">
            Chi tiết
        </a>
    </div>
<?php endwhile; ?>
</div>
