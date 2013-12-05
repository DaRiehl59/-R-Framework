<!DOCTYPE html>
<html>
	<head>
		<title>{$head_title}</title>
		<meta charset="{$head_charset}">
		<meta name="generator" content="D. [R]iehl Framework 1.0">
{section name=head_sec0 loop=$head_metas}
		<meta name="{$head_metas[head_sec0].name}" content="{$head_metas[head_sec0].content}">
{/section}
{section name=head_sec1 loop=$head_styles}
		<link rel="stylesheet" type="text/css" href="{$head_styles[head_sec1]}">
{/section}
{section name=head_sec2 loop=$head_scripts}
		<script src="{$head_scripts[head_sec2]}"></script>
{/section}
{if $head_favicon}
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
{/if}
	</head>
	<body>