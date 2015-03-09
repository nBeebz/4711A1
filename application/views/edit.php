<table class="clients">
	<thead>
		<tr>
			<td>
				Image
			</td>
			<td>
				Name
			</td>
			<td>
				Company
			</td>
			<td>
				Email
			</td>
			<td>
				Rate
			</td>
			<td>
				Description
			</td>
		</tr>
	</thead>
	{open_form}
	<tr>
		<td>
			<input type="file" name="image"/>
		</td>
		<td>
			<input type="text" name="name" value="{name}">
		</td>
		<td>
			<input type="text" name="company" value="{company}">
		</td>
		<td>
			<input type="text" name="email" value="{email}">
		</td>
		<td>
			<input type="text" name="rate" value="{rate}">
		</td>
		<td>
			<textarea form="save" name="description">{description}</textarea>
		</td>
		<td>
			<input type="submit" value="Save">
			<input type="hidden" name='id' value={id}>
		</td>
	</tr>
	</form>
</table>