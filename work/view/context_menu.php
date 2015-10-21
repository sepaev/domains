<body style="height: 500px;">
<ul class="tasks">
    <li class="task" data-id="3">
        <div class="task__content">
            Go To Grocery
        </div>
        <div class="task__actions">
            <i class="fa fa-eye"></i>
            <i class="fa fa-edit"></i>
            <i class="fa fa-times"></i>
        </div>
    </li>
    <!-- more task items here... -->
</ul>
<script src="<?=SITE?>lib/js/context-menu.js"></script>
<link href="<?=SITE?>lib/css/context-menu.css" rel="stylesheet" type="text/css">
</body>

<nav id="context-menu" class="context-menu">
    <ul class="context-menu__items">
        <li class="context-menu__item">
            <a href="#" class="context-menu__link" data-action="View">
                <i class="fa fa-eye"></i> View Task
            </a>
        </li>
        <li class="context-menu__item">
            <a href="#" class="context-menu__link" data-action="Edit">
                <i class="fa fa-edit"></i> Edit Task
            </a>
        </li>
        <li class="context-menu__item">
            <a href="#" class="context-menu__link" data-action="Delete">
                <i class="fa fa-times"></i> Delete Task
            </a>
        </li>
    </ul>
</nav>