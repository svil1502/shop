<?php
use app\models\Category;
?>
<option
    value="<?= $category['id']?>"
    <?php if($category['id'] == $this->model->category_id) echo ' selected'?>



    <?php
//выбираем категории, которые надо скрыть, так как надо выбирать их подкатегории
//    $categ = Category::find()->select(['id','parent_id'])->all();
//    foreach ($categ as $m){
//        $arr_cat_id[]=$m->id;
//        $arr_par_id[]=$m->parent_id;
//    }
//    $col=count($arr_cat_id);
//    for($i=0;$i<$col;$i++){
//        for($j=0;$j<$col;$j++) {
//            if ($arr_cat_id[$i] == $arr_par_id[$j]) {
//                if($category['id'] == $arr_cat_id[$i]) echo ' disabled';
//                break;
//            }
//        }
//    }
    //конец выборки скрытых категорий
    ?>



    <?php
    // исправленный код более совершенный
    $tblCat = Category::tableName();
    $categ = Category::find()
        ->innerJoin(['innerTblCat' => $tblCat], "innerTblCat.id = $tblCat.parent_id")
        ->select("innerTblCat.*")
        ->all();
    foreach ($categ as $m){
        if($category['id'] == $m->id) echo ' disabled';
    }
    ?>
    ><?= $tab . $category['name']?></option>
<?php if( isset($category['childs']) ): ?>
    <ul>
        <?= $this->getMenuHtml($category['childs'], $tab . '-')?>
    </ul>
<?php endif;?>