<li <?php if ($category['main_category']) echo 'class="vertical-item level1 vertical-drop"' ?>>
    <a href="<?= \yii\helpers\Url::to(['/category/' . $category['id']]) ?>" <?php if (isset($category['children'])) echo 'class="dropdown-toggle" data-toggle="dropdown"' ?>>
        <?= $category['title'] ?>
    </a>
    <?php if (isset($category['children'])): ?>
        <div class="menu-level-1 dropdown-menu vertical-menu v2"
             style="background: url('<?= $category["img"] ?>'), #fff no-repeat center;">
            <ul class="level1">

                <?php foreach ($category['children'] as $child): ?>
                    <li class="level2 col-md-4">
                        <a href="/category/<?=$child['id']?>"><?= $child['title'] ?></a>
                        <ul class="menu-level-2">
                            <?php
                            if (gettype($child['children']) == 'array')
                                foreach ($child['children'] as $item):
                                    ?>
                                    <li class="level3"><a href="/category/<?=$item['id']?>" title=""><?=$item['title']?></a></li>
                                <?php endforeach; ?>
                        </ul>
                    </li>
                <?php endforeach; ?>
            </ul>

        </div>
    <?php endif; ?>
</li>
