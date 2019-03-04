<h3 class="page-header">Log in Page</h3>
<?php
if (!isset($_POST['login_btn'])): ?>
    <div class="row">
        <div class="col-md-6 col-md-offset-1">
            <form action="index.php?page=5" method="post">
                <div class="form-group">
                    <label for="login">Login</label>
                    <input type="text" name="login" id="login" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" name="password" id="password" class="form-control">
                </div>
                <button type="submit" class="btn btn-success" name="login_btn">Register</button>
            </form>
        </div>
    </div>

<?php else: ?>
    <?php
    if (login($_POST['login'], $_POST['password'])){
        if ($_SESSION['is_login']){
            echo '<script>window.location = "index.php?page=2"</script>';
        }
    }
    ?>

<?php endif; ?>