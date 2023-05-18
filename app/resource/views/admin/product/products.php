<?php // echo '<pre>'; var_dump($products); die;?>

<?php require_once('app/resource/views/admin/dashboard/dashboard.php'); ?>
<section>
    <div class="table-container">
        <a href="<?= $this->getBaseURL('product/create')?>">Create product</a>
        <table class="product-table wrapper-dash">
            <thead>
                <tr>
                    <th>id_prod</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Main Image</th>
                    <th>Quantity</th>
                    <th>Product Status</th>
                    <th>Prices</th>
                    <th>View</th>
                    <th>Update</th>
                    <th>Delete</th>
                </tr>
            </thead>
        </table>        
        <?php foreach ($products as $product){ ?>
            <form action="products/change" method="post">
                <table class="product-table wrapper-dash">
                    <tbody>
                        <tr class="row">
                            <td><input type="text" name="id_product" value="<?= $product['id_product']; ?>" readonly></td>
                            <td><input type="text" name="name" value="<?= $product['name']; ?>" readonly></td>
                            <td><input type="text" name="description" value="<?= $product['description']; ?>" readonly></td>
                            <td><?= $this->getImage(['name' => $product['main_image']]) ?></td>
                            <td><input type="text" name="quantity" value="<?= $product['quantity']; ?>" readonly></td>
                                <?php foreach ($product['prices'] as $prices){ ?>
                                    <?php foreach ($prices as $status => $price){ ?>
                                            <td><input type="text" name="status" value="<?= $status; ?>" readonly></td>
                                            <td><input type="text" name="price" value="<?= $price; ?>" readonly></td>
                                    <?php } ?>
                                <?php } ?>
                            <td>
                                <a href="<?= $this->getBaseURL('product') . '?id=' . $product['id_product']; ?>">View</a>
                            </td>
                            <td>
                            <button class="update" type="button">Update</button>
                                <button class="save" type="submit" style="display: none;" name="update">Save</button>
                            </td>
                            <td>
                                <button type="submit" name="delete" value="<?= $product['id_product'] ?>">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </form>
        <?php } ?>
    </div>
</section>

<?php require('app/resource/views/templates/footerDash.php'); ?>