<h4>Create a new TODO</h4>
<form action="/todos" method='POST'>
    <label for="title">Title</label>
    <input type="text" id='title' name='title' placeholder='title'>
    <label for="description">Description</label>
    <input type="text" name='description' id='description' placeholder='description'>
    <label for="completed">Completed</label>
    <input type="checkbox" id='completed'>
    <input type="submit" value='Submit!'>
</form>