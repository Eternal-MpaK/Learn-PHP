<div class="sidebar">
    <div class="sidebar__sidebar-item">
        <div class="sidebar-item__title">Теги</div>
        <div class="sidebar-item__content">
            <ul class="tags-list">

                <?php wp_tag_cloud(); ?>

<!--                <li class="tags-list__item"><a href="#" class="tags-list__item__link">путешествия по россии</a></li>-->
<!--                <li class="tags-list__item"><a href="#" class="tags-list__item__link">турция</a></li>-->
<!--                <li class="tags-list__item"><a href="#" class="tags-list__item__link">гоа</a></li>-->
<!--                <li class="tags-list__item"><a href="#" class="tags-list__item__link">авиабилеты</a></li>-->
<!--                <li class="tags-list__item"><a href="#" class="tags-list__item__link">отели</a></li>-->
<!--                <li class="tags-list__item"><a href="#" class="tags-list__item__link">европа</a></li>-->
<!--                <li class="tags-list__item"><a href="#" class="tags-list__item__link">азия</a></li>-->
<!--                <li class="tags-list__item"><a href="#" class="tags-list__item__link">тайланд</a></li>-->
<!--                <li class="tags-list__item"><a href="#" class="tags-list__item__link">хостелы</a></li>-->
<!--                <li class="tags-list__item"><a href="#" class="tags-list__item__link">шоппинг</a></li>-->
            </ul>
        </div>
    </div>
    <div class="sidebar__sidebar-item">
        <div class="sidebar-item__title">Категории</div>
        <?php wp_list_categories();?>
    </div>
    <?php get_calendar();?>
</div>