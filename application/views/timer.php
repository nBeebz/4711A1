<table>
	<tr>
		<td colspan=2>
		<h1>
			<span id="hours">0</span>h
			<span id="minutes">0</span>m
			<span id="seconds">0</span>.<span id="msecs">0</span>s
		</h1>
		</td>
	</tr>
	<tr>
		<td><button style="width:100%" id="start">Start</button></td>
		<td><button style="width:100%" id="stop">Stop</button></td>
	</tr>
</table>
<br/>

<div id="saveDialog" style="display:none">
	{open_form}
		<select name="client">
			{clients}
		  		<option value={id}>{company}</option>
		  	{/clients}
		</select>
		<input type="hidden" name="hours"/>
		<input type="submit" />
	</form>
</div>