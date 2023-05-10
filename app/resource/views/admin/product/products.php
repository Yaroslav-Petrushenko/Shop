<?php require_once('app/resource/views/admin/dashboard/dashboard.php'); ?>

<table class="product-table wrapper-dash">
    <thead>
        <tr>
            <th>Назва</th>
            <th>Опис</th>
            <th>Головне зображення</th>
            <th>Кількість</th>
            <th>Статус продукту</th>
            <th>Ціни</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($products as $product){ ?>
        <tr>
            <td><?= $product['name']; ?></td>
            <td><?= $product['description']; ?></td>
            <td><?= $product['main_image']; ?></td>
            <td><?= $product['quantity']; ?></td>
            <td><?= $product['product_status_name']; ?></td>
            <td>
                <table>
                    <thead>
                        <tr>
                            <th>Статус ціни</th>
                            <th>Ціна</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($product['prices'] as $price){ ?>
                        <tr>
                            <td><?= $price['status']; ?></td>
                            <td><?= $price['price']; ?></td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </td>
        </tr>
        <?php } ?>
    </tbody>
</table>


