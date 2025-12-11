{extends file="main.tpl"}

{block name=content}

<div class="pure-menu pure-menu-horizontal bottom-margin">
	<a href="{$conf->action_url}logout"  class="pure-menu-heading pure-menu-link">wyloguj</a>
	<span style="float:right;">użytkownik: {$user->login}, rola: {$user->role}</span>
</div>

<form action="{$conf->action_url}calcCompute" method="post" class="pure-form pure-form-stacked bottom-margin">
    <legend>Kalkulator kredytowy</legend>
    <fieldset>
        <label for="id_kwota">Kwota kredytu: </label>
        <input id="id_kwota" class="pure-input-1" type="text" placeholder="kwota kredytu" name="kwota" value="{$form->kwota}">
        
        <label for="id_lata">Liczba lat: </label>
        <input id="id_lata" class="pure-input-1" type="text" name="lata" value="{$form->lata}">

        <label for="op">Oprocentowanie</label>
        <select id="op" class="pure-input-1" name="op">

{if isset($res->op_name)}
<option value="{$form->op}">ponownie: {$res->op_name}</option>
<option value="" disabled="true">---</option>
{/if}
			<option value="0.05">5%</option>
			<option value="0.06">6%</option>
			<option value="0.07">7%</option>
			<option value="0.08">8%</option>
		</select>
					
	</fieldset>
	<button type="submit" class="pure-button pure-button-primary">Oblicz</button>
</form>

{include file='messages.tpl'}

{if isset($res->result)}
    <div class="res">
        <h4>Wynik</h4>
        
        <div class="res">
            <strong>Rata miesięczna:</strong> {$res->result|number_format:2:',':' '} zł
        </div>
        
        <div class="res">
            <strong>Całkowita kwota kredytu:</strong> {$res->calkowita|number_format:2:',':' '} zł
        </div>
        
        <div class="res">
            <strong>Odsetki:</strong> {$res->odsetki|number_format:2:',':' '} zł
        </div>
    </div>
{/if}

{/block}