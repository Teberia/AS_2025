<?php
/* Smarty version 3.1.30, created on 2025-12-11 21:53:57
  from "/Applications/XAMPP/xamppfiles/htdocs/php_07_role/app/views/CalcView.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_693b2f6532a729_26098707',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'bce336a73b0fc3060ad3d75a0d829013eeac2497' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/php_07_role/app/views/CalcView.tpl',
      1 => 1765486078,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:main.tpl' => 1,
    'file:messages.tpl' => 1,
  ),
),false)) {
function content_693b2f6532a729_26098707 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_653846805693b2f65328377_48155942', 'content');
$_smarty_tpl->inheritance->endChild();
$_smarty_tpl->_subTemplateRender("file:main.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 2, false);
}
/* {block 'content'} */
class Block_653846805693b2f65328377_48155942 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<div class="pure-menu pure-menu-horizontal bottom-margin">
	<a href="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
logout"  class="pure-menu-heading pure-menu-link">wyloguj</a>
	<span style="float:right;">użytkownik: <?php echo $_smarty_tpl->tpl_vars['user']->value->login;?>
, rola: <?php echo $_smarty_tpl->tpl_vars['user']->value->role;?>
</span>
</div>

<form action="<?php echo $_smarty_tpl->tpl_vars['conf']->value->action_url;?>
calcCompute" method="post" class="pure-form pure-form-stacked bottom-margin">
    <legend>Kalkulator kredytowy</legend>
    <fieldset>
        <label for="id_kwota">Kwota kredytu: </label>
        <input id="id_kwota" class="pure-input-1" type="text" placeholder="kwota kredytu" name="kwota" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->kwota;?>
">
        
        <label for="id_lata">Liczba lat: </label>
        <input id="id_lata" class="pure-input-1" type="text" name="lata" value="<?php echo $_smarty_tpl->tpl_vars['form']->value->lata;?>
">

        <label for="op">Oprocentowanie</label>
        <select id="op" class="pure-input-1" name="op">

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

<?php $_smarty_tpl->_subTemplateRender("file:messages.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


<?php if (isset($_smarty_tpl->tpl_vars['res']->value->result)) {?>
    <div class="res">
        <h4>Wynik</h4>
        
        <div class="res">
            <strong>Rata miesięczna:</strong> <?php echo number_format($_smarty_tpl->tpl_vars['res']->value->result,2,',',' ');?>
 zł
        </div>
        
        <div class="res">
            <strong>Całkowita kwota kredytu:</strong> <?php echo number_format($_smarty_tpl->tpl_vars['res']->value->calkowita,2,',',' ');?>
 zł
        </div>
        
        <div class="res">
            <strong>Odsetki:</strong> <?php echo number_format($_smarty_tpl->tpl_vars['res']->value->odsetki,2,',',' ');?>
 zł
        </div>
    </div>
<?php }?>

<?php
}
}
/* {/block 'content'} */
}
