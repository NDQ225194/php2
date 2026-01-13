<h2>Đăng ký tài khoản</h2>

<?php if(isset($error)): ?>
<p style="color:red"><?= $error ?></p>
<?php endif; ?>

<form method="post">
    <input type="text" name="name" placeholder="Họ tên" required><br><br>
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="password" name="password" placeholder="Mật khẩu" required><br><br>
    <button type="submit">Đăng ký</button>
</form>

<p>
    Đã có tài khoản?
    <a href="index.php?controller=auth&action=login">Đăng nhập</a>
</p>
