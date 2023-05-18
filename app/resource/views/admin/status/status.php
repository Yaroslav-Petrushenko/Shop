<?php require_once('app/resource/views/admin/dashboard/dashboard.php'); ?>
<section>
    <div class="table-container wrapper">
        <div class="statusForm">
            <form class='form-status' action="status/create" method="post">
                <input type="text" name="name" value="<?= isset($name['name']) ? $name['name'] : '' ?>" placeholder="Status Name">
                <input type="text" name="category" value="<?= isset($category['category']) ? $category['category'] : '' ?>" placeholder="Status Category">
                <button type="submit">Create</button>
            </form>
        
            <?php foreach ($allStatuses as $status) { ?>
                <form action="status/change" method="post">
                    <table class="status_change">
                        <tr class="row">
                            <td><input type="text" name="id_status" value="<?= $status['id_status']; ?>" readonly></td>
                            <td><input type="text" name="name" value="<?= $status['name']; ?>" readonly></td>
                            <td><input type="text" name="category" value="<?= $status['category']; ?>" readonly></td>
                            <td>
                                <button class="update" type="button">Update</button>
                                <button class="save" type="submit" style="display: none;" name="update">Save</button>
                            </td>
                            <td>
                                <button type="submit" name="delete" value="<?= $status['id_status'] ?>">Delete</button>
                            </td>
                        </tr>
                    </table>
                </form>
            <?php } ?>
        </div>
    </div>
</section>

<?php require('app/resource/views/templates/footerDash.php'); ?>