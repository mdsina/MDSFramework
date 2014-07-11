<?php /* Smarty version Smarty-3.1.19, created on 2014-07-11 17:23:36
         compiled from "templates\404.tpl" */ ?>
<?php /*%%SmartyHeaderCode:1260553c00159471674-83228572%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'be25ace6ec433216f42187e20094af944e9960b0' => 
    array (
      0 => 'templates\\404.tpl',
      1 => 1405092213,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '1260553c00159471674-83228572',
  'function' => 
  array (
  ),
  'cache_lifetime' => 3600,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_53c001594c30d5_05499464',
  'variables' => 
  array (
    'data' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53c001594c30d5_05499464')) {function content_53c001594c30d5_05499464($_smarty_tpl) {?><html>
<head>
    <title>ERROR 404</title>
</head>

<body>
<?php echo var_dump($_smarty_tpl->tpl_vars['data']->value);?>

<table align="center" border="0" height="100%" width="100%"><tr><td>
    <center>
        <img src="http://www.nowals.ru/img/error/404.jpg" border="0">
    </center>
</td></tr>
</table>

</body>
</html><?php }} ?>
