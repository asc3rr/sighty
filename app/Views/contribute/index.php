<?= $this->extend("templates/main"); ?>
<?= $this->section("content"); ?>
<p class="text-justify text-wrap">
    <h3 class="display-6">Rules</h3>
    First of all, respect copyright. I recommend you to copy articles from wikipedia (english version).
    When copying, attach a link to the resource at the beggining or end of description.
</p>
<!-- validation messages -->
<?php if(isset($validation) && !is_null($validation)) : ?>
    <div class="text-danger">
        <div id="errors">
            <?= $validation->listErrors(); ?>
        </div>
    </div>
<?php endif;?>
<form action="/contribute/new" method="post">
    <h4 class="display-6 text-center">Location</h4>
    <div class="form-group">
        <label for="latitude">Latitude</label>
        <input require id="latitude" type="text" class="form-control" pattern="^-?([0-8]?[0-9]|90)(\.[0-9]{1,10})$" name="latitude">
    </div>
    <div class="form-group">
        <label for="longitude">Longitude</label>
        <input require id="longitude" type="text" class="form-control" pattern="^-?([0-8]?[0-9]|90)(\.[0-9]{1,10})$" name="longitude">
    </div>
    
    <h4 class="text-center">Place information</h4>
    <div class="form-group">
        <label for="title">Title</label>
        <input require id="title" type="text" class="form-control" name="title">
    </div>
    <div class="form-group">
        <label for="shortdesc">Short description</label>
        <textarea require id="shortdesc" class="form-control" name="shortdesc"></textarea>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea require id="description" class="form-control" name="description"></textarea>
    </div>
    <div class="form-group text-center">
        <input type="submit" class="btn btn-lg btn-success" value="Add a place">
    </div>
</form>
<?= $this->endSection(); ?>