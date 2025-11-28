<?php
/* Smarty version 3.1.30, created on 2025-11-28 22:44:19
  from "/Applications/XAMPP/xamppfiles/htdocs/php_05_uproszczony/app/CalcView.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_692a17b3919b46_36029264',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f7fb47a769c8f4e1b64e091225de789db56ff9ab' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/php_05_uproszczony/app/CalcView.html',
      1 => 1764366256,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:../templates/main.html' => 1,
  ),
),false)) {
function content_692a17b3919b46_36029264 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_387601557692a17b38ee076_36890993', 'footer');
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2048627367692a17b3916eb2_53521020', 'content');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:../templates/main.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'footer'} */
class Block_387601557692a17b38ee076_36890993 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>
Kalkulator kredytowy zrealizowany na zajęciach Aplikacji Sieciowych<?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_2048627367692a17b3916eb2_53521020 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<h3>Prosty kalkulator</h2>

<form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->tpl_vars['app_url']->value;?>
/app/calc.php" method="post">
	<fieldset>
		<label for="id_kwota">Kwota kredytu: </label>
		<input id="id_kwota" type="text" placeholder="kwota kredytu" name="kwota" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->kwota;?>
">
		
		<label for="id_lata">Liczba lat: </label>
		<input id="id_lata" type="text" name="lata" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->lata;?>
">

		<label for="op">Oprocentowanie</label>
		<select id="op" name="op">

<?php if (isset($_smarty_tpl->tpl_vars['res']->value->op_name)) {?>
<option value="<?php echo $_smarty_tpl->tpl_vars['form']->value->op;?>
">ponownie: <?php echo $_smarty_tpl->tpl_vars['res']->value->op_name;?>
</option>
<option value="" disabled="true">---</option>
<?php }?>
			<option value="0.05">5%</option>
			<option value="0.06">6%</option>
			<option value="0.07">7%</option>
			<option value="0.08">8%</option>
		</select>
					
	</fieldset>
	<button type="submit" class="pure-button pure-button-primary">Oblicz</button>
</form>


<div class="messages">


<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isError()) {?>
	<h4>Wystąpiły błędy: </h4>
	<ol class="err">
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getErrors(), 'err');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['err']->value) {
?>
	<li><?php echo $_smarty_tpl->tpl_vars['err']->value;?>
</li>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

	</ol>
<?php }?>


<?php if ($_smarty_tpl->tpl_vars['msgs']->value->isInfo()) {?>
	<h4>Informacje: </h4>
	<ol class="inf">
	<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['msgs']->value->getInfos(), 'inf');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['inf']->value) {
?>
	<li><?php echo $_smarty_tpl->tpl_vars['inf']->value;?>
</li>
	<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

	</ol>
<?php }?>

<?php if (isset($_smarty_tpl->tpl_vars['res']->value->result)) {?>
	<h4>Wynik</h4>
	<p class="res">
	<?php echo $_smarty_tpl->tpl_vars['res']->value->result;?>

	</p>
<?php }?>

</div>

<?php
}
}
/* {/block 'content'} */
}
