<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

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
</body>
</html>