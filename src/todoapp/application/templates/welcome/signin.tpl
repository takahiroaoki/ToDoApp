{extends file="../base.tpl"}


<!-- inside <head></head> -->
{block name="headTag"}
<title>Sign In</title>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
{/block}


<!-- content -->
{block name="content"}
<div class="content">
    <div class="container page-title">
        <h1>This is the Sign-in page.</h1>
    </div>
    <div class="container form-container">
        <!-- [START] error message area -->
        {if !is_null($errMsg)}
        <div class="container error-message-area">
            {foreach from=$errMsg item=msg}
            <p>
                {$msg}
            </p>
            {/foreach}
        </div>
        {/if}
        <!-- [END] error message area -->
        <div class="d-grid gap-3 col-4 mx-auto">
            <form method="POST" action="/kanban/welcome/signin">
                <input class="form-control" type="email" placeholder="Email" name="{$USER_EMAIL}"><br>
                <input class="form-control" type="password" placeholder="Password" name="{$USER_PASSWORD}"><br>
                <input class="form-control btn btn-primary" type="submit" value="Sign in">
            </form>
        </div>
    </div>
    <div class="container">
        <div class="another-page">
            <p>Do you have no accounts?</p>
            <a href="/kanban/welcome/signup">Sign up</a>
        </div>
    </div>
</div>
<!-- style -->
<style>
    {include file="{$CSS_PATH}/welcome/signin.css"}
</style>
{/block}

<!-- inside <script></script> -->
{block name="scriptTag"}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
{/block}