{extends file="../base.tpl"}


<!-- inside <head></head> -->
{block name="headTag"}
<title>Welcome Page</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
{/block}


<!-- content -->
{block name="content"}
<div class="content">
    <div class="container page-title">
        <h1>Your Kanban will simplify your busy life.</h1>
    </div>
    <div class="container sign-in-up-page">
        <div class="d-grid gap-3 col-3 mx-auto">
            <a class="btn btn-primary btn-sm" href="/kanban/welcome/signin" role="button">Sign in</a>
            <a class="btn btn-primary btn-sm" href="/kanban/welcome/signup" role="button">Sign up</a>
        </div>
    </div>
</div>

<!-- style -->
<style>
    {include file="{$CSS_PATH}/welcome/index.css"}
</style>
{/block}

<!-- inside <script></script> -->
{block name="scriptTag"}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
{/block}