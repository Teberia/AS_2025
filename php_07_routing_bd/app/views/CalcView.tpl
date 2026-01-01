{extends file="main.tpl"}

{block name=content}

<div class="pure-menu pure-menu-horizontal bottom-margin">
	<a href="{$conf->action_url}logout"  class="pure-menu-heading pure-menu-link">wyloguj</a>
	<span style="float:right;">użytkownik: {$user->login}, rola: {$user->role}</span>
</div>

<form action="{$conf->action_url}calcCompute" method="post" class="pure-form pure-form-aligned bottom-margin">
	<legend>Kalkulator</legend>
	<fieldset>
        <div class="pure-control-group">
			<label for="id_kwota">Kwota kredytu: </label>
			<input id="id_kwota" type="text" name="kwota" value="{$form->kwota}" />
		</div>
 		<div class="pure-control-group">
			<label for="id_lata">Liczba lat: </label>
			<input id="id_lata" type="text" name="lata" value="{$form->lata}" />
		</div>

        <div class="pure-control-group">
			<label for="id_op">Oprocentowanie: </label>
			<select name="op">
				{if isset($res->op_name)}
				<option value="{$form->op}">ponownie: {$res->op_name}</option>
				<option value="" disabled="true">---</option>
				{/if}
			<option value="0.06">6%</option>
			<option value="0.07">7%</option>
			<option value="0.08">8%</option>
				{if $user->role == "admin"}
			<option value="0.05">5%</option>
				{/if}
			</select>
		</div>
		<div class="pure-controls">
			<input type="submit" value="Oblicz" class="pure-button pure-button-primary"/>
		</div>
	</fieldset>
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