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
  'cache_lifetime' => 3600,
  'version' => 'Smarty-3.1.19',
  'unifunc' => 'content_53c003b7415815_84080803',
  'variables' => 
  array (
    'data' => 0,
    'itm' => 0,
  ),
  'has_nocache_code' => false,
),true); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_53c003b7415815_84080803')) {function content_53c003b7415815_84080803($_smarty_tpl) {?><!DOCTYPE html>
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
                <input id="s" type="text" value="" name="query" />
                <input type="submit" value="Submit" id="submitButton" />
                <div id="searchInContainer">
                    <input type="radio" name="api" value="google" id="searchSite" checked />
                    <label for="searchSite" id="siteNameLabel">Поиск в Google</label>
                    <input type="radio" name="api" value="yandex" id="searchWeb" />
                    <label for="searchWeb">Поиск в Yandex</label>
                </div>
            </fieldset>
        </form>

        <pre class='xdebug-var-dump' dir='ltr'>
<b>array</b> <i>(size=2)</i>
  'data' <font color='#888a85'>=&gt;</font> <font color='#3465a4'>null</font>
  'extended' <font color='#888a85'>=&gt;</font> 
    <b>array</b> <i>(size=1)</i>
      'query' <font color='#888a85'>=&gt;</font> <small>string</small> <font color='#cc0000'>''</font> <i>(length=0)</i>
</pre>
            </div>
</body>
</html><?php }} ?>
