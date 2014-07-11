<?php /* Smarty version Smarty-3.1.19, created on 2014-07-11 17:33:11
         compiled from "templates\main.tpl" */ ?>
<?php /*%%SmartyHeaderCode:3136353c0039340c714-74050419%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '73be1ff0f83089533c5658fe2c80bf9f81132411' => 
    array (
      0 => 'templates\\main.tpl',
      1 => 1405092788,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '3136353c0039340c714-74050419',
  'function' => 
  array (
  ),
  'cache_lifetime' => 3600,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_53c003934d6360_01792381',
  'variables' => 
  array (
    'data' => 0,
    'itm' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53c003934d6360_01792381')) {function content_53c003934d6360_01792381($_smarty_tpl) {?><!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Поиск</title>
    <link rel="stylesheet" type="text/css" href="/static/css/styles.css" />
</head>
<body>
    <div id="page">
        <form id="searchForm" action="/search/" method="get">
            <h1>Поиск</h1>
            <fieldset>
                <input id="s" type="text" value="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['data']->value['extended']['query'], ENT_QUOTES, 'UTF-8', true);?>
" name="query" />
                <input type="submit" value="Submit" id="submitButton" />
                <div id="searchInContainer">
                    <input type="radio" name="api" value="google" id="searchSite" checked />
                    <label for="searchSite" id="siteNameLabel">Поиск в Google</label>
                    <input type="radio" name="api" value="yandex" id="searchWeb" />
                    <label for="searchWeb">Поиск в Yandex</label>
                </div>
            </fieldset>
        </form>

        <?php echo var_dump($_smarty_tpl->tpl_vars['data']->value);?>

        <?php if (!empty($_smarty_tpl->tpl_vars['data']->value['data'])) {?>
            <div id="resultsDiv">
                <div style="display: block;" class="pageContainer">
                    <?php  $_smarty_tpl->tpl_vars['itm'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['itm']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['data']->value['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['itm']->key => $_smarty_tpl->tpl_vars['itm']->value) {
$_smarty_tpl->tpl_vars['itm']->_loop = true;
?>
                        <div class="webResult">
                            <h2>
                                <a href="<?php echo htmlspecialchars($_smarty_tpl->tpl_vars['itm']->value['url'], ENT_QUOTES, 'UTF-8', true);?>
" target="_blank">
                                    <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['itm']->value['title'], ENT_QUOTES, 'UTF-8', true);?>

                                </a>
                            </h2>
                            <p>
                                <?php echo htmlspecialchars($_smarty_tpl->tpl_vars['itm']->value['content'], ENT_QUOTES, 'UTF-8', true);?>

                            </p>
                        </div>
                    <?php } ?>
                    <div class="clear"></div>
                </div>
            </div>
        <?php }?>
    </div>
</body>
</html><?php }} ?>
