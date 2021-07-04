<li class="level1 dropdown <?php if (isset($category['children'])) echo 'has-child'?>">
    <a href="/store/<?=$_GET['id']. \yii\helpers\Url::to(['category/' . $category['url']]) ?>">
        <?= $category['title'] ?>
    </a>
    <?php if (isset($category['children'])): ?>
            <ul class="dropdown-menu">
                <?= $this->getMenuHtml($category['children']) ?>
            </ul>
    <?php endif; ?>
</li>