<!-- <?php require('app/resource/views/admin/temlates/header.php'); ?> -->

<form action='status/create' method='post'>
    <input type='text' name='name'>
    <input type='text' name='category'>
    <input type='submit' value='create'>
</form>
<table>
    <?php foreach ($allStatuses as $item) { ?>
        <tr>
            <td><?= $item['id_status'] ?></td>
            <td><?= $item['name'] ?></td>
            <td><?= $item['category'] ?></td>
        </tr>
    <?php } ?>
</table>
