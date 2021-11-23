<?php
/* Smarty version 3.1.39, created on 2021-10-26 12:07:28
  from 'E:\OpenServer\domains\localhost\views\admin\adminHeader.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.39',
  'unifunc' => 'content_6177c550635896_48890688',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '9593bb82cff996e098a7e46fd64291bf485e0af7' => 
    array (
      0 => 'E:\\OpenServer\\domains\\localhost\\views\\admin\\adminHeader.tpl',
      1 => 1635238953,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:css.tpl' => 1,
  ),
),false)) {
function content_6177c550635896_48890688 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <title><?php echo $_smarty_tpl->tpl_vars['Page_Title']->value;?>
</title>
    <meta name="description" content="<?php echo $_smarty_tpl->tpl_vars['Page_Description']->value;?>
">
    <base href="<?php echo $_smarty_tpl->tpl_vars['Page_URL']->value;?>
" />
    <link rel="shortcut icon" href="/templates/default/images/favicon.png" />
    <meta name="google-site-verification" content="hDKcA-7-iRH8KBeBXhpSnE7sdsnWkwkSe3z43XXRHxQ" />
    <meta property="og:url" content="<?php echo $_smarty_tpl->tpl_vars['Page_URL']->value;?>
" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="<?php echo $_smarty_tpl->tpl_vars['Page_Title']->value;?>
" />
    <meta property="og:description" content="<?php echo $_smarty_tpl->tpl_vars['Page_Description']->value;?>
" />
    <meta property="og:image" content="<?php echo $_smarty_tpl->tpl_vars['Page_Image']->value;?>
" />
    <?php $_smarty_tpl->_subTemplateRender('file:css.tpl', $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>
</head>

<body class="is-preload">
    <div id="wrapper">
        <div id="main">
            <div class="inner">
                <header id="header">

                    <ul class="icons">
                        <li><a href="https://www.facebook.com/zorkiy.com.ua/" class="icon brands fa-facebook-f"><span
                                    class="label">Facebook</span></a></li>
                        <li><a href="https://www.instagram.com/zorkiy.com.ua/?igshid=1thxrgoq3hw6m"
                                class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
                    </ul>

</header>
<?php }
}
