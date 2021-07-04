<option
    value="<?= $category['id'] ?>"
    <?php if($category['id'] == $this->model->seller_id) echo ' selected' ?>
>
    <?= " {$tab} {$category['username']} " ?>
</option>
<?php if(isset($category['children'])): ?>
    <?= $this->getMenuHtml($category['children'], $tab . '-') ?>
<?php endif; ?>
