{{ content() }}

<div align="center">

	{{ form('class': 'form-search') }}

		<div align="left">
			<h2>Sign Up</h2>
		</div>

		<table class="signup">
			<tr>
				<td align="right">{{ form.label('name') }}</td>
				<td>
					{{ form.render('name') }}
					{{ form.messages('name') }}
				</td>
			</tr>
			<tr>
				<td align="right">{{ form.label('email') }}</td>
				<td>
					{{ form.render('email') }}
					{{ form.messages('email') }}
				</td>
			</tr>
			<tr>
				<td align="right">{{ form.label('password') }}</td>
				<td>
					{{ form.render('password') }}
					{{ form.messages('password') }}
				</td>
			</tr>
			<tr>
				<td align="right">{{ form.label('confirmPassword') }}</td>
				<td>
					{{ form.render('confirmPassword') }}
					{{ form.messages('confirmPassword') }}
				</td>
			</tr>
			<tr>
				<td align="right"></td>
				<td>
					{{ form.render('isAdmin') }} {{ form.label('isAdmin') }}
					{{ form.messages('isAdmin') }}
				</td>
			</tr>
			<tr>
				<td align="right"></td>
				<td>{{ form.render('Sign Up') }}</td>
			</tr>
		</table>

		<hr>

	</form>

</div>