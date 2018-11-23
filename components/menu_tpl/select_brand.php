<option
        value="<?= $brand['id']?>"


        id="<?= $brand['category_id']?>"
    <?php if($brand['id'] == $this->model->brand_id) echo ' selected'?>
><?= $brand['name']?>

</option>
