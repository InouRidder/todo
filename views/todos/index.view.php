<h1>All the Todo's!</h1>
<?php foreach($todos as $todo) { ?>
    <h1>
        <?php if ($todo->isCompleted()) { ?>
            <strike>
                <?= $todo->title ?>
            </strike>
        <?php } else { ?>
                <?= $todo->title ?>
            <? } ?>
    </h1>
    <p>
        <?= $todo->description ?>
    </p>
<?php } ?>