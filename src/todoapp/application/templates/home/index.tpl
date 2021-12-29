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
        <h1>Your Tasks</h1>
    </div>
    <div class="container newtask-button">
        <div class="d-grid d-md-flex justify-content-md-end">
            <a class="btn btn-primary" href="/kanban/home/newtask" role="button">New task</a>
        </div>
    </div>
    <div class="container card-area">
        <div class="row align-items-start">
        {foreach from=$taskStatus item=status}
            <div class="col task-col">
                <h2 class="fs-2 task-status">{$status}</h2>
            {foreach from from=$allTasks item=task}
                {if $task->getTaskStatus() == $status}
                <div class="card bg-light border border-dark task-card">
                    <div class="card-body">
                        <div class="card-title fs-4 task-title">
                            <span class="notation">Title</span>
                            {$task->getTaskTitle()}
                        </div>
                        <hr>
                        <div class="card-text fs-5">
                            <span class="notation">Content</span>
                            {$task->getTaskContent()}
                        </div>
                    </div>
                    <div class="card-button-area">
                        <span class="card-button">
                            <a
                            class="btn btn-success"
                            data-bs-toggle="collapse"
                            href="#id_{$task->getTaskId()}"
                            role="button"
                            aria-expanded="false"
                            >Edit</a>
                        </span>
                        <span class="card-button">
                            <form method="POST" action="/kanban/home/deletetask">
                                <input type="hidden" name="task_id" value="{$task->getTaskId()}">
                                <input class="btn btn-secondary" type="submit" value="Delete">
                            </form>
                        </span>
                    </div>
                    <!-- [START] Shown when 'Edit' button is pushed -->
                    <div class="collapse collapsed-area" id="id_{$task->getTaskId()}">
                        <form method="POST" action="/kanban/home/updatetask">
                            <input type="hidden" name="task_id" value="{$task->getTaskId()}">
                            
                            <span class="notation">Title</span>
                            <input class="form-control" type="text" name="task_title" value="{$task->getTaskTitle()}" ><br>
                            
                            <span class="notation">Content</span>
                            <input class="form-control" type="text" name="task_content" value="{$task->getTaskContent()}" ><br>
                            
                            <span class="notation">Status</span>
                            <select class="form-select" name="task_status">
                                <option value="{$TASK_TO_DO}"{if $task->getTaskStatus() == $TASK_TO_DO} selected{/if}>{$TASK_TO_DO}</option>
                                <option value="{$TASK_IN_PROGRESS}"{if $task->getTaskStatus() == $TASK_IN_PROGRESS} selected{/if}>{$TASK_IN_PROGRESS}</option>
                                <option value="{$TASK_DONE}"{if $task->getTaskStatus() == $TASK_DONE} selected{/if}>{$TASK_DONE}</option>
                            </select><br>
                            <div class="update-button">
                            <input class="btn btn-success" type="submit" value="Update">
                            </div>
                        </form>
                    </div>
                    <!-- [END] Shown when 'Edit' button is pushed -->
                </div>
                {/if}
            {/foreach}
            </div>
        {/foreach}
        </div>
    </div>
</div>

<!-- style -->
<style>
    {include file="../../css/home/index.css"}
</style>
{/block}

<!-- inside <script></script> -->
{block name="scriptTag"}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
{/block}