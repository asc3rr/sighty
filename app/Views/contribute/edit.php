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
<!-- end validation messages -->

<form action="/contribute/edit/<?= $place["id"]; ?>" method="post">
    <h4 class="display-6 text-center">Location</h4>
    <div class="form-group">
        <label for="latitude">Latitude</label>
        <input require  id="latitude" type="text" class="form-control" name="latitude" value="<?= $place["latitude"]; ?>">
    </div>
    <div class="form-group">
        <label for="longitude">Longitude</label>
        <input require id="longitude" type="text" class="form-control" name="longitude" value="<?= $place["longitude"]; ?>">
    </div>
    
    <h4 class="text-center">Place information</h4>
    <div class="form-group">
        <label for="title">Title</label>
        <input require id="title" type="text" class="form-control" name="title" value="<?= $place["place_name"]; ?>">
    </div>
    <div class="form-group">
        <label for="shortdesc">Short description</label>
        <textarea require id="shortdesc" class="form-control" name="shortdesc"><?= base64_decode($place["place_shortdesc"]); ?></textarea>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea require id="description" class="form-control" name="description"><?= base64_decode($place["place_description"]); ?></textarea>
    </div>
    <div class="form-group text-center">
        <input type="submit" class="btn btn-lg btn-success" value="Edit this place">
    </div>
</form>
<?= $this->endSection(); ?>