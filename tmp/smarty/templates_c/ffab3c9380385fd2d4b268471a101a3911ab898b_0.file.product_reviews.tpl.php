<?php
/* Smarty version 3.1.39, created on 2021-11-02 17:17:15
  from 'E:\OpenServer\domains\localhost\views\default\product_reviews.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6181486b9e7ab2_98960407',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ffab3c9380385fd2d4b268471a101a3911ab898b' => 
    array (
      0 => 'E:\\OpenServer\\domains\\localhost\\views\\default\\product_reviews.tpl',
      1 => 1635862634,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6181486b9e7ab2_98960407 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="result">
    <h1>Отзывы покупателей о <?php echo $_smarty_tpl->tpl_vars['Product']->value['M_Name'];?>
 <?php echo $_smarty_tpl->tpl_vars['Product']->value['Model_Name'];?>
</h1>

    <div class="row">
        <div class="col-6 col-12-small">
            <div>
                <ul class="actions">
                    <li><a href="/product/<?php echo $_smarty_tpl->tpl_vars['Product']->value['Model_ID'];?>
/">Все о товаре</a></li>
                    <li><a href="/product/<?php echo $_smarty_tpl->tpl_vars['Product']->value['Model_ID'];?>
/characteristic/">Характеристики</a></li>
                    <li><a href="/product/<?php echo $_smarty_tpl->tpl_vars['Product']->value['Model_ID'];?>
/comments/">Отзывы</a></li>
                </ul>
            </div>
        </div>
    </div>



    <div class="row">
        <div class="col-8 col-12-small">
            <div class="row">
                <div class="col-12 col-12-small">
                    <?php if (((isset($_smarty_tpl->tpl_vars['GetCOUNTRatingByProduct']->value['Rating'])) && $_smarty_tpl->tpl_vars['GetCOUNTRatingByProduct']->value['Rating'] > 0)) {?>
                        <b>Рейтинг товара:</b>
                        <div class="rating-result">
                            <span <?php if ((floor($_smarty_tpl->tpl_vars['GetAverageRatingByProduct']->value['RatintDevice']) > 0)) {?> class="active" <?php }?>></span>
                            <span <?php if ((floor($_smarty_tpl->tpl_vars['GetAverageRatingByProduct']->value['RatintDevice']) > 1)) {?> class="active" <?php }?>></span>
                            <span <?php if ((floor($_smarty_tpl->tpl_vars['GetAverageRatingByProduct']->value['RatintDevice']) > 2)) {?> class="active" <?php }?>></span>
                            <span <?php if ((floor($_smarty_tpl->tpl_vars['GetAverageRatingByProduct']->value['RatintDevice']) > 3)) {?> class="active" <?php }?>></span>
                            <span <?php if ((floor($_smarty_tpl->tpl_vars['GetAverageRatingByProduct']->value['RatintDevice']) > 4)) {?> class="active" <?php }?>></span>
                        </div>

                        <p>Всего оценок:<?php echo $_smarty_tpl->tpl_vars['GetCOUNTRatingByProduct']->value['Rating'];?>
 Средний рейтинг:
                            <?php echo $_smarty_tpl->tpl_vars['GetAverageRatingByProduct']->value['RatintDevice'];?>
</p>
                        <?php $_smarty_tpl->_assignInScope('star5', sprintf("%d",(($_smarty_tpl->tpl_vars['GetCOUNTRatingByProduct']->value['Rating5']/$_smarty_tpl->tpl_vars['GetCOUNTRatingByProduct']->value['Rating'])*100)));?>
                        <?php $_smarty_tpl->_assignInScope('star4', sprintf("%d",(($_smarty_tpl->tpl_vars['GetCOUNTRatingByProduct']->value['Rating4']/$_smarty_tpl->tpl_vars['GetCOUNTRatingByProduct']->value['Rating'])*100)));?>
                        <?php $_smarty_tpl->_assignInScope('star3', sprintf("%d",(($_smarty_tpl->tpl_vars['GetCOUNTRatingByProduct']->value['Rating3']/$_smarty_tpl->tpl_vars['GetCOUNTRatingByProduct']->value['Rating'])*100)));?>
                        <?php $_smarty_tpl->_assignInScope('star2', sprintf("%d",(($_smarty_tpl->tpl_vars['GetCOUNTRatingByProduct']->value['Rating2']/$_smarty_tpl->tpl_vars['GetCOUNTRatingByProduct']->value['Rating'])*100)));?>
                        <?php $_smarty_tpl->_assignInScope('star1', sprintf("%d",(($_smarty_tpl->tpl_vars['GetCOUNTRatingByProduct']->value['Rating1']/$_smarty_tpl->tpl_vars['GetCOUNTRatingByProduct']->value['Rating'])*100)));?>
                    <?php } else { ?>
                        <p>Всего оценок: 0 Средний рейтинг: 0</p>
                        <div style="text-align: center; width: 100%">
                            <p><b>Отзывов для даного товара еще нет</b></p>
                        </div>
                    <?php }?>
                </div>
                <?php if (((isset($_smarty_tpl->tpl_vars['GetCOUNTRatingByProduct']->value['Rating'])) && $_smarty_tpl->tpl_vars['GetCOUNTRatingByProduct']->value['Rating'] > 0)) {?>
                    <div class="col-12 col-12-small">
                        <div class="row">
                            <div class="side right">
                                <div>5</div>
                            </div>
                            <div class="middle">
                                <div class="bar-container">
                                    <div class="bar-5" style="width: <?php echo $_smarty_tpl->tpl_vars['star5']->value;?>
%"></div>
                                </div>
                            </div>
                            <div class="side left">
                                <div><?php echo $_smarty_tpl->tpl_vars['GetCOUNTRatingByProduct']->value['Rating5'];?>
 - <?php echo $_smarty_tpl->tpl_vars['star5']->value;?>
%</div>
                            </div>
                            <div class="side right">
                                <div>4</div>
                            </div>
                            <div class="middle">
                                <div class="bar-container">
                                    <div class="bar-4" style="width: <?php echo $_smarty_tpl->tpl_vars['star4']->value;?>
%"></div>
                                </div>
                            </div>
                            <div class="side left">
                                <div><?php echo $_smarty_tpl->tpl_vars['GetCOUNTRatingByProduct']->value['Rating4'];?>
 - <?php echo $_smarty_tpl->tpl_vars['star4']->value;?>
%</div>
                            </div>
                            <div class="side right">
                                <div>3</div>
                            </div>
                            <div class="middle">
                                <div class="bar-container">
                                    <div class="bar-3" style="width: <?php echo $_smarty_tpl->tpl_vars['star3']->value;?>
%"></div>
                                </div>
                            </div>
                            <div class="side left">
                                <div><?php echo $_smarty_tpl->tpl_vars['GetCOUNTRatingByProduct']->value['Rating3'];?>
 - <?php echo $_smarty_tpl->tpl_vars['star3']->value;?>
%</div>
                            </div>
                            <div class="side right">
                                <div>2</div>
                            </div>
                            <div class="middle">
                                <div class="bar-container">
                                    <div class="bar-2" style="width: <?php echo $_smarty_tpl->tpl_vars['star2']->value;?>
"></div>
                                </div>
                            </div>
                            <div class=" side left">
                                <div><?php echo $_smarty_tpl->tpl_vars['GetCOUNTRatingByProduct']->value['Rating2'];?>
 - <?php echo $_smarty_tpl->tpl_vars['star2']->value;?>
%</div>
                            </div>
                            <div class="side right">
                                <div>1</div>
                            </div>
                            <div class="middle">
                                <div class="bar-container">
                                    <div class="bar-1" style="width: <?php echo $_smarty_tpl->tpl_vars['star1']->value;?>
%"></div>
                                </div>
                            </div>
                            <div class="side left">
                                <div><?php echo $_smarty_tpl->tpl_vars['GetCOUNTRatingByProduct']->value['Rating1'];?>
 - <?php echo $_smarty_tpl->tpl_vars['star1']->value;?>
%</div>
                            </div>
                        </div>
                        <br>
                    </div>
                <?php }?>
                <div class="col-12 col-12-small">
                    <br>
                    <?php if (!(isset($_smarty_tpl->tpl_vars['arUser']->value))) {?>
                        <div id="regBox" style="text-align: center;">
                            <p>
                                <a href="#authorization" class="popups-link">Вход</a>
                                |
                                <a href="#registerBox" class="popups-link">Регистрация</a>
                            </p>
                            <p>Для того чтобы опубликовать отзыв необходимо войти в личный кабинет.</p>
                        </div>
                    <?php }?>

                    <div id="product-add-comments" <?php if (!(isset($_smarty_tpl->tpl_vars['arUser']->value))) {?>class="hideme" <?php }?>>
                        <h2>Оставьте свой отзыв об этом товаре</h2>
                        <div class="row gtr-uniform">
                            <div class="col-12 col-12-small">
                                <input id="device" name="device" type="hidden" value="<?php echo $_smarty_tpl->tpl_vars['Product']->value['Model_ID'];?>
" />
                            </div>
                            <div class="col-12 col-12-small">
                                <div class="rating-area">
                                    <input type="radio" id="star-5" name="rating" value="5">
                                    <label for="star-5" title="Оценка «5»"></label>
                                    <input type="radio" id="star-4" name="rating" value="4">
                                    <label for="star-4" title="Оценка «4»"></label>
                                    <input type="radio" id="star-3" name="rating" value="3">
                                    <label for="star-3" title="Оценка «3»"></label>
                                    <input type="radio" id="star-2" name="rating" value="2">
                                    <label for="star-2" title="Оценка «2»"></label>
                                    <input type="radio" id="star-1" name="rating" value="1">
                                    <label for="star-1" title="Оценка «1»"></label>
                                </div>
                            </div>
                            <div class="col-12 col-12-small">
                                <textarea id="text_comment" placeholder="Комментарий" rows="5"></textarea>
                            </div>
                            <div class="col-12 col-12-small">
                                <ul class="actions">
                                    <li><input type="submit" value="Оставить отзыв" class="primary"
                                            onclick="CreateCommets()"></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-4 col-12-small">
            <div class="row">
                <div class="col-12 col-12-small">
                    <div class="container-picture">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Product']->value['Picture'], 'item', false, NULL, 'picture', array (
  'iteration' => true,
));
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_picture']->value['iteration']++;
?>
                            <div class="mySlides-images">
                                <img src="/templates/default/images/products/<?php echo $_smarty_tpl->tpl_vars['item']->value['DP_Device'];?>
/<?php echo $_smarty_tpl->tpl_vars['item']->value['DP_Image'];?>
"
                                    style="width:100%">
                            </div>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['Product']->value['Picture'], 'item', false, NULL, 'picture', array (
  'iteration' => true,
));
$_smarty_tpl->tpl_vars['item']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['item']->do_else = false;
$_smarty_tpl->tpl_vars['__smarty_foreach_picture']->value['iteration']++;
?>
                            <div class="column-images">
                                <img class="demo-images cursor"
                                    src="/templates/default/images/products/<?php echo $_smarty_tpl->tpl_vars['item']->value['DP_Device'];?>
/<?php echo $_smarty_tpl->tpl_vars['item']->value['DP_Image'];?>
"
                                    style="width:100%" onclick="currentSlide(<?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_picture']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_picture']->value['iteration'] : null);?>
)">
                            </div>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                    </div>
                </div>
            </div>
            <div>
                <hr>
                <p><i class="fas fa-clipboard-check"></i> Есть в наличии</p>
                <h2><?php echo $_smarty_tpl->tpl_vars['Product']->value['Model_Price'];?>
 ₴</h2>
                <ul class="actions">
                    <li>
                        <a id="removeCart_<?php echo $_smarty_tpl->tpl_vars['Product']->value['Model_ID'];?>
" <?php if (!$_smarty_tpl->tpl_vars['itemInCart']->value) {?> style="display: none;" <?php }?>
                            alt="Удалить из корзины" class="button"
                            onclick="removeFromCart(<?php echo $_smarty_tpl->tpl_vars['Product']->value['Model_ID'];?>
); return false;">
                            Удалить из корзины</a>

                        <a id="addCart_<?php echo $_smarty_tpl->tpl_vars['Product']->value['Model_ID'];?>
" <?php if ($_smarty_tpl->tpl_vars['itemInCart']->value) {?> style="display: none;" <?php }?>
                            alt="Добавить в корзину" class="button primary"
                            onclick="addToCart(<?php echo $_smarty_tpl->tpl_vars['Product']->value['Model_ID'];?>
); return false;"> Добавить в корзину</a>
                    </li>
                    <li>
                        <ul class="icons">
                            <li>
                                <a class="like-active fa fa-heart" aria-hidden="true"></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <hr>


    <?php if (($_smarty_tpl->tpl_vars['GetCOUNTRatingByProduct']->value && ($_smarty_tpl->tpl_vars['GetCOUNTRatingByProduct']->value['Rating'] > 0))) {?>
        <h2>Отзывы</h2>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['GetReviewsByProduct']->value, 'itemReviews');
$_smarty_tpl->tpl_vars['itemReviews']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['itemReviews']->value) {
$_smarty_tpl->tpl_vars['itemReviews']->do_else = false;
?>
            <div id="Comment_<?php echo $_smarty_tpl->tpl_vars['itemReviews']->value['DR_ID'];?>
" class="box">
                <div style="width: 100%; height: 100px; padding: 5px;">
                    <div style="width: 10%; float:left">
                        <img src="/templates/default/images/user.png" alt="Avatar" style="width:100%">
                    </div>
                    <div style="width: 90%; float:left; padding: 5px;">
                        <div style="text-align: right;"><?php echo $_smarty_tpl->tpl_vars['itemReviews']->value['DR_Date'];?>
</div>
                        <div>Клиент: <span><?php echo $_smarty_tpl->tpl_vars['itemReviews']->value['U_Login'];?>
</span></div>
                        <div>Оценка:
                            <div class="rating-mini">
                                <span <?php if (($_smarty_tpl->tpl_vars['itemReviews']->value['DR_Rating'] > 0)) {?> class="active" <?php }?>></span>
                                <span <?php if (($_smarty_tpl->tpl_vars['itemReviews']->value['DR_Rating'] > 1)) {?> class="active" <?php }?>></span>
                                <span <?php if (($_smarty_tpl->tpl_vars['itemReviews']->value['DR_Rating'] > 2)) {?> class="active" <?php }?>></span>
                                <span <?php if (($_smarty_tpl->tpl_vars['itemReviews']->value['DR_Rating'] > 3)) {?> class="active" <?php }?>></span>
                                <span <?php if (($_smarty_tpl->tpl_vars['itemReviews']->value['DR_Rating'] > 4)) {?> class="active" <?php }?>></span>
                            </div>
                        </div>
                    </div>
                </div>
                <?php if ($_smarty_tpl->tpl_vars['itemReviews']->value['DR_Comment'] != null) {?>
                    <div style="width: 100%; padding: 5px;">
                        <p><?php echo $_smarty_tpl->tpl_vars['itemReviews']->value['DR_Comment'];?>
</p>
                    </div>

                <?php }?>
                <?php if ((isset($_smarty_tpl->tpl_vars['itemReviews']->value['Answer'])) && ($_smarty_tpl->tpl_vars['itemReviews']->value['Answer'] == "34232")) {?>
                    <a class="accordion">Показать ответы</a>
                    <div class="panel">
                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['itemReviews']->value['Answer'], 'itemAnswer');
$_smarty_tpl->tpl_vars['itemAnswer']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['itemAnswer']->value) {
$_smarty_tpl->tpl_vars['itemAnswer']->do_else = false;
?>
                            <div class="container-message darker">
                                <div style="width: 100%; height: 100px; padding: 5px;">
                                    <div>
                                        <img src="/templates/default/images/user.png" alt="Avatar" style="width:100%;">
                                    </div>
                                    <div style="width: 90%; float:left; padding: 5px;">
                                        <div class="right"><?php echo $_smarty_tpl->tpl_vars['itemAnswer']->value['DRA_Date'];?>
</div>
                                        <div>Клиент: <span><?php echo $_smarty_tpl->tpl_vars['itemAnswer']->value['U_Login'];?>
</span></div>
                                    </div>
                                </div>
                                <div style="width: 100%; padding: 5px;">
                                    <p><?php echo $_smarty_tpl->tpl_vars['itemAnswer']->value['DRA_Comment'];?>
</p>
                                </div>
                            </div>
                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                        <br>
                    </div>
                <?php }?>
            </div>
        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    <?php }?>

</div>






    <?php echo '<script'; ?>
>
        function CreateCommets() {
            var postData;
            var radios = document.getElementsByName('rating');
            for (var i = 0, length = radios.length; i < length; i++) {
                if (radios[i].checked) {
                    postData = {
                        'device': document.getElementById('device').value,
                        'rating': radios[i].value,
                        'text_comment': document.getElementById('text_comment').value
                    };
                }
            }

            $.ajax({
                type: 'POST',
                async: false,
                url: "/product/addcomments/200/",
                data: postData,
                dataType: 'json',
                success: function(data) {
                    if (data['success']) {
                        document.location.reload();
                    } else {
                        alert(data['message']);
                    }
                }
            });
        }
    <?php echo '</script'; ?>
>
<?php }
}
