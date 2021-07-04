<li class="<?php if (isset($category['children'])) echo 'active dropdown '; if ($category['parent_id']) echo 'level2'; else echo 'level1'; ?>">
    <a href="<?= \yii\helpers\Url::to(['/category/' . $category['id']]) ?>" <?php if (isset($category['children'])) echo 'class="dropdown-toggle" data-toggle="dropdown"' ?>>
        <?= $category['title'] ?>
    </a>
    <?php if (isset($category['children'])): ?>
        <span class="icon-sub-menu"></span>
    <?php endif; ?>
    <?php if (isset($category['children'])): ?>
        <ul class="menu-level1 js-open-menu">
            <?= $this->getMenuHtml($category['children'], $tab . '-') ?>
        </ul>
    <?php endif; ?>
</li>
