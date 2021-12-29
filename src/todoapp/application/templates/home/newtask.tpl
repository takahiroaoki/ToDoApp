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
        <h1>Let me know your new task.</h1>
    </div>
    <div class="container">
        <div class="d-grid gap-3 col-4 mx-auto">
            <form method="POST" action="/kanban/home/newtask">
                <input class="form-control" type="text" placeholder="Title" name="{$TASK_TITLE}"><br>
                <input class="form-control" type="text" placeholder="Content" name="{$TASK_CONTENT}"><br>
                <select class="form-select" name="{$TASK_STATUS}">
                    <option value="{$TASK_TO_DO}" selected>{$TASK_TO_DO}</option>
                    <option value="{$TASK_IN_PROGRESS}">{$TASK_IN_PROGRESS}</option>
                    <option value="{$TASK_DONE}">{$TASK_DONE}</option>
                </select><br>
                <input class="btn btn-primary" type="submit" value="Register">
            </form>
        </div>
    </div>
    <br>
    <div class="container">
        <div class="d-grid gap-3 col-2 mx-auto">
            <a class="btn btn-primary" href="/kanban/home/index" role="button">Back to home</a>
        </div>
    </div>
</div>
{/block}

<!-- inside <script></script> -->
{block name="scriptTag"}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
{/block}