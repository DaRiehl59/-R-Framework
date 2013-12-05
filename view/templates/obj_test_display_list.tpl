{include file="header.tpl"}
		<table>
			<tr><th>id</th><th>nom</th></tr>
{section name=obj_test_list loop=$rows}
			<tr><td>{$rows[obj_test_list].id}</td><td>{$rows[obj_test_list].nom}</td></tr>
{/section}
		</table>
{include file="footer.tpl"}
