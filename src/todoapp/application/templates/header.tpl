{block name=header}
<nav class="content_header navbar navbar-expand-lg navbar-dark bg-primary" style="background-color: #e3f2fd;">
    <div class="container-fluid">
        <a href="/kanban/welcome/index">
            <p class="navbar-brand fs-1">Your Kanban</p>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav fs-6">
                {if $isLogin}
                <li class="nav-item">
                    <a class="nav-link active" href="/kanban/welcome/signout">Sign out</a>
                </li>
                {else}
                <li class="nav-item">
                    <a class="nav-link active" href="/kanban/welcome/signin">Sign in</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" href="/kanban/welcome/signup">Sign up</a>
                </li>
                {/if}
            </ul>
        </div>
    </div>
</nav>

<!-- style -->
<style>
    {include file="../css/header.css"}
</style>
{/block}