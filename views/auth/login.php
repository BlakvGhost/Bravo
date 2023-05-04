<div>
    <?php if (session('error', false)) : ?>
        <div class="p-2 mx-2 bg-danger" style="padding: 2%;margin-bottom: 2%">
            <?= session('error') ?>
        </div>
    <?php endif ?>
    <form action="" method="post">
        <h3>Login Page</h3>
    </form>
</div>