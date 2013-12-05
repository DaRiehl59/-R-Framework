{include file="header.tpl"}
		<h1>Tests</h1>
		<pre>
{section name=test loop=$msgs}
			{$msgs[test]}
{/section}
		</pre>
{include file="footer.tpl"}
