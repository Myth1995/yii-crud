<?php

/** @var yii\web\View $this */

use yii\helpers\Html;


$this->title = 'Books Info';
$this->params['breadcrumbs'][] = $this->title;

/** @var $books array */
?>

<div class="site-list">
    <h1><?= Html::encode($this->title) ?></h1>

    <br>
    <div class="group-btn">
        <button type="button" class="btn btn-primary" onClick>Add</button>
        
        <button type="button" class="btn btn-warning">Update</button>
    </div>
    <table class="book-table">
        <thead>
            <th>#</th>
            <th>Book</th>
            <th>Author</th>
            <th></th>
        </thead>
        <tbody>
        <?php foreach ($books as $book) { ?>
            <tr>
                <td><?=$book->id?></td>
                <td><?=$book->title?></td>
                <td><?=$book->author?></td>
                <td>
                    <a type="button"  class="btn btn-danger" onclick="onDelete(<?=$book->id?>)">Delete</a>
                </td>
            </tr>
        <?php } ?>
        </tbody>
    </table>

</div>

<script>
    async function postData(url = '', data = {}) {
        // Default options are marked with *
        const response = await fetch(url, {
            method: 'POST', // *GET, POST, PUT, DELETE, etc.
            mode: 'cors', // no-cors, *cors, same-origin
            headers: {
            'Content-Type': 'application/json'
            // 'Content-Type': 'application/x-www-form-urlencoded',
            },
            body: JSON.stringify(data) // body data type must match "Content-Type" header
        });
        // return response.json(); // parses JSON response into native JavaScript objects
    }
    
    function onDelete(id) {

        $.ajax({url: '/yii/web/site/delete/', type: 'POST', data: {id: id}})
         .done(function (data) {
        //     // console.log(data); // JSON data parsed by `data.json()` call
            alert(data)
        });

    }
</script>