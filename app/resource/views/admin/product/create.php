<?php require_once('app/resource/views/admin/dashboard/dashboard.php'); ?>
<section>
    <h1>Hello from create product</h1>
    <form class="productCreate" action="" method="post" enctype="multipart/form-data">
        <input type="text" name="name" value="" placeholder="Product name">

        <select name="productStatus">
            <?php foreach ($productStatuses as $status) { ?>
                <option value="<?= $status['id_status'] ?>"><?= $status['name'] ?></option>
            <?php } ?>
        </select>
        
        <textarea type="text" name="description" value="" placeholder="Product description"></textarea>
        <input type="number" name="quantity" value="" placeholder="Quantity">
        <div class="file_product">
            <input type="file" name="main_image" id="main_image">
            <label for="main_image">File</label>
        </div>
        <select name="pricesStatus">
            <?php foreach ($priceStatuses as $status) { ?>
                <option value="<?= $status['id_status'] ?>"><?= $status['name'] ?></option>
            <?php } ?>
        </select>
        <input type="number" name="price" value="" placeholder="Price">
        
        <button type="submit" name="create" value="1">Create</button>
    </form>

</section>

<?php require('app/resource/views/templates/footerDash.php'); ?>