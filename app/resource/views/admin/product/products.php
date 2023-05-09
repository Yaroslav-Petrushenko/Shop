<?php foreach ($products as $productId => $product){ ?>
    <div>
        <h2><?= $product['product']['name'] ?></h2>
        <p><?= $product['product']['description'] ?></p>
        <?php if (!empty($product['prices']['price'])){ ?>
            <p>Price: <?= $product['prices']['price'] ?></p>
        <?php } ?>
    </div>
<?php } ?>
