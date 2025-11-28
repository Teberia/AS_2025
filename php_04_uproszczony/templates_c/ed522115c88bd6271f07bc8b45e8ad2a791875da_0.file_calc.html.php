<?php
/* Smarty version 5.4.2, created on 2025-11-28 22:09:23
  from 'file:/Applications/XAMPP/xamppfiles/htdocs/php_04_uproszczony/app/calc.html' */

/* @var \Smarty\Template $_smarty_tpl */
if ($_smarty_tpl->getCompiled()->isFresh($_smarty_tpl, array (
  'version' => '5.4.2',
  'unifunc' => 'content_692a0f83340141_89642049',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ed522115c88bd6271f07bc8b45e8ad2a791875da' => 
    array (
      0 => '/Applications/XAMPP/xamppfiles/htdocs/php_04_uproszczony/app/calc.html',
      1 => 1764364156,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
))) {
function content_692a0f83340141_89642049 (\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/php_04_uproszczony/app';
$_smarty_tpl->getInheritance()->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_652918069692a0f83306085_97037484', 'footer');
?>


<?php 
$_smarty_tpl->getInheritance()->instanceBlock($_smarty_tpl, 'Block_518075621692a0f833131a4_26897048', 'content');
$_smarty_tpl->getInheritance()->endChild($_smarty_tpl, "../templates/main.html", $_smarty_current_dir);
}
/* {block 'footer'} */
class Block_652918069692a0f83306085_97037484 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/php_04_uproszczony/app';
?>
Kalkulator kredytowy wykonany na zajęcia z Aplikacji Sieciowych<?php
}
}
/* {/block 'footer'} */
/* {block 'content'} */
class Block_518075621692a0f833131a4_26897048 extends \Smarty\Runtime\Block
{
public function callBlock(\Smarty\Template $_smarty_tpl) {
$_smarty_current_dir = '/Applications/XAMPP/xamppfiles/htdocs/php_04_uproszczony/app';
?>


<h3>Kalkulator kredytowy</h2>


<form class="pure-form pure-form-stacked" action="<?php echo $_smarty_tpl->getValue('app_url');?>
/app/calc.php" method="post">
	<fieldset>
		<label for="id_kwota">Kwota kredytu: </label>
		<input id="id_kwota" type="text" placeholder="kwota kredytu" name="kwota" value="<?php echo $_smarty_tpl->getValue('form')['kwota'];?>
">
		
		<label for="id_lata">Liczba lat: </label>
		<input id="id_lata" type="text" name="lata" value="<?php echo $_smarty_tpl->getValue('form')['lata'];?>
">

		<label for="op">Oprocentowanie</label>
		<select id="op" name="op">

<?php if ((null !== ($_smarty_tpl->getValue('form')['op_name'] ?? null))) {?>
<option value="<?php echo $_smarty_tpl->getValue('form')['op'];?>
">ponownie: <?php echo $_smarty_tpl->getValue('form')['op_name'];?>
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

<?php if ((null !== ($_smarty_tpl->getValue('messages') ?? null))) {?>
	<?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('messages')) > 0) {?> 
		<h4>Wystąpiły błędy: </h4>
		<ol class="err">
		<?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('messages'), 'msg');
$foreach0DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('msg')->value) {
$foreach0DoElse = false;
?>
		<li><?php echo $_smarty_tpl->getValue('msg');?>
</li>
		<?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
		</ol>
	<?php }
}?>

<?php if ((null !== ($_smarty_tpl->getValue('infos') ?? null))) {?>
	<?php if ($_smarty_tpl->getSmarty()->getModifierCallback('count')($_smarty_tpl->getValue('infos')) > 0) {?> 
		<h4>Informacje: </h4>
		<ol class="inf">
		<?php
$_from = $_smarty_tpl->getSmarty()->getRuntime('Foreach')->init($_smarty_tpl, $_smarty_tpl->getValue('infos'), 'msg');
$foreach1DoElse = true;
foreach ($_from ?? [] as $_smarty_tpl->getVariable('msg')->value) {
$foreach1DoElse = false;
?>
		<li><?php echo $_smarty_tpl->getValue('msg');?>
</li>
		<?php
}
$_smarty_tpl->getSmarty()->getRuntime('Foreach')->restore($_smarty_tpl, 1);?>
		</ol>
	<?php }
}?>

<?php if ((null !== ($_smarty_tpl->getValue('result') ?? null))) {?>
	<h4>Wynik</h4>
	<p class="res">
        Miesięczna kwota kredytu: <?php echo $_smarty_tpl->getValue('miesieczna');?>
 PLN<br>
        Całkowita spłata: <?php echo $_smarty_tpl->getValue('calkowita');?>
 PLN<br>
        Łączne odsetki: <?php echo $_smarty_tpl->getValue('odsetki');?>
 PLN<br>
	</p>
<?php }?>

</div>

<?php
}
}
/* {/block 'content'} */
}
