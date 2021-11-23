<?php
/* Smarty version 3.1.39, created on 2021-11-11 14:34:13
  from 'E:\OpenServer\domains\localhost\views\default\menu.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_618cffb591fd76_27503535',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '887e234e8ca176a5ce874ee0f6da6afc0bf34472' => 
    array (
      0 => 'E:\\OpenServer\\domains\\localhost\\views\\default\\menu.tpl',
      1 => 1636630450,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_618cffb591fd76_27503535 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="sidebar">
    <div class="inner">
        <section class="alt" style>
            <span class="image fit logo">
                <a href="/"><img src="/templates/default/images/logo_rus.jpg" alt="logo"></a>
            </span>
            <br>


            <?php if ((isset($_smarty_tpl->tpl_vars['arUser']->value))) {?>
                <div id="userBox">
                    <a href="/user/" id="userLink"> <?php echo $_smarty_tpl->tpl_vars['arUser']->value['displayName'];?>
</a><br />
                    <a href="/user/logout/">Выход</a>
                </div>

            <?php } else { ?>
                <?php if (!(isset($_smarty_tpl->tpl_vars['hideLoginBox']->value))) {?>
                    <div id="regBox" class="align-center">
                        <a href="#authorization" class="popups-link">Вход</a>
                        |
                        <a href="#registerBox" class="popups-link">Регистрация</a>
                        <p>Авторизуйтесь для получения расширенных возможностей </p>
                    </div>
                <?php }?>
                <div id="userBox" class="hideme">
                    <a href="#" id="userLink"></a><br />
                    <a href="/user/logout/">Выход</a>
                </div>
            <?php }?>

        </section>
        <nav id="menu">
            <ul>
                <li>
                    <span class="opener">Каталог товаров</span>
                    <ul>
                        <li><a style="font-weight: bold;" href="/category/">Все категории</a></li>
                        <li>
                            <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['MenuCategory']->value, 'itemCategory');
$_smarty_tpl->tpl_vars['itemCategory']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['itemCategory']->value) {
$_smarty_tpl->tpl_vars['itemCategory']->do_else = false;
?>
                                <span>
                                    <a style="font-weight: bold;"
                                        href="/category/<?php echo $_smarty_tpl->tpl_vars['itemCategory']->value['Category_URL'];?>
/"><?php echo $_smarty_tpl->tpl_vars['itemCategory']->value['Category_Name_RU'];?>

                                    </a>
                                </span>
                                <?php if ((isset($_smarty_tpl->tpl_vars['itemCategory']->value['TypeDevice']))) {?>
                                    <ul>
                                        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['itemCategory']->value['TypeDevice'], 'itemTypeDevice');
$_smarty_tpl->tpl_vars['itemTypeDevice']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['itemTypeDevice']->value) {
$_smarty_tpl->tpl_vars['itemTypeDevice']->do_else = false;
?>
                                            <li>
                                                <a
                                                    href="/typedevice/<?php echo $_smarty_tpl->tpl_vars['itemTypeDevice']->value['TD_URL'];?>
/"><?php echo $_smarty_tpl->tpl_vars['itemTypeDevice']->value['TD_Name_RU'];?>
</a>
                                            </li>

                                        <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
                                    </ul>
                                <?php }?>

                            <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>


                        </li>
                    </ul>
                </li>
                <li>
                    <span class="opener">Сферы применения</span>
                    <ul>
                        <li><a href="/video-surveillance-in-shops/">Видеонаблюдение в магазинах</a></li>
                        <li><a href="/video-surveillance-in-offices/">Видеонаблюдение в офисах</a></li>
                        <li><a href="/video-surveillance-at-enterprises/">Видеонаблюдение на предприятиях</a></li>
                        <li><a href="/video-surveillance-in-schools-and-kindergartens/">Видеонаблюдение в школах и
                                детских садах</a></li>
                        <li><a href="/video-surveillance-in-a-private-house/">Видеонаблюдение в частном доме</a></li>
                        <li><a href="/video-surveillance-in-parking-lots/">Видеонаблюдение на автостоянках</a></li>
                        <li><a href="/video-surveillance-in-restaurants/">Видеонаблюдение в ресторанах</a></li>
                        <li><a href="/osbb-security-video/">Видеонаблюдение для ОСББ и жилых комплексов под ключ</a>
                        </li>
                    </ul>
                </li>
                <li><a href="/news/">Новости</a></li>
                <?php if ((isset($_smarty_tpl->tpl_vars['arUser']->value))) {?>
                    <li><a href="/orders/">Мои заказы</a></li>
                <?php }?>

                <li><a href="/contacts/">Контакты</a></li>
            </ul>

            <a href="#popups_shopping_basket" class="popups-link" onclick="load_shopping_basket();">Корзина</a>
            <span id="cartCntItems">
                <?php if ($_smarty_tpl->tpl_vars['cartCntItems']->value > 0) {?>
                    <?php echo $_smarty_tpl->tpl_vars['cartCntItems']->value;?>

                <?php } else { ?>
                    0
                <?php }?>
            </span>
        </nav>
        <section>
            <ul class="contact">
                <li class="icon solid fas fa-phone-alt" style="display: block;"><a href="tel:+380 99 300 01 02"><span
                            class="label">+38(099) 300 01 02</span></a></li>
                <li class="icon solid fas fa-phone-alt" style="display: block;"><a href="tel:+380 44 334 32 92"> <span
                            class="label">+38(044) 334 32 92</span></a></li>
            </ul>
        </section>
    </div>
</div><?php }
}
