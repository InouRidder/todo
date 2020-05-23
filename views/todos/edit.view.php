<h4>Create a new TODO</h4>
<form action="/todos/<?= $todo->id ?>" method='PATCH'>
    <label for="title">Title</label>
    <input type="text" id='title' name='title' placeholder='title' value="<?= $todo->title ?>">
    <label for="description">Description</label>
    <input type="text" name='description' id='description' placeholder='description' value="<?= $todo->description ?>">
    <label for="completed">Completed</label>
    <input type="checkbox" id='completed' <?= $todo->completed ? 'checked' : '' ?>">
    <input type="submit" value='Submit!'>
</form>