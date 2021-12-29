{extends file="../base.tpl"}

<!-- inside <head></head> -->
{block name="headTag"}
<title>Error Page</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
{/block}


<!-- content -->
{block name="content"}
<div class="content">
    <div class="container page-title">
        <h1>Sorry, this is error page.</h1>
    </div>
    <div class="container">
        <div class="another-page">
            <a href="/kanban/welcome/signup">Back to the top page.</a>
        </div>
    </div>
</div>

<!-- style -->
<style>
    {include file="{$CSS_PATH}/error/error.css"}
</style>
{/block}