<?= $this->extend("templates/main"); ?>
<?= $this->section("content"); ?>
<p class="text-justify text-wrap">
    <h3 class="display-6">Rules</h3>
    First of all, respect copyright. I recommend you to copy articles from wikipedia (english version).
    When copying, attach a link to the resource at the beggining or end of description.
</p>

<form action="/contribute/new" method="post">
    <h4 class="display-6 text-center">Location</h4>
    <div class="form-group">
        <label for="latitude">Latitude</label>
        <input id="latitude" type="text" class="form-control" name="latitude">
    </div>
    <div class="form-group">
        <label for="longitude">Longitude</label>
        <input id="longitude" type="text" class="form-control" name="longitude">
    </div>
    
    <h4 class="text-center">Place information</h4>
    <div class="form-group">
        <label for="title">Title</label>
        <input id="title" type="text" class="form-control" name="title">
    </div>
    <div class="form-group">
        <label for="shortdesc">Short description</label>
        <textarea id="shortdesc" class="form-control" name="shortdesc"></textarea>
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea id="description" class="form-control" name="description"></textarea>
    </div>
    <div class="form-group text-center">
        <input type="submit" class="btn btn-lg btn-success" value="Add a place">
    </div>
</form>
<?= $this->endSection(); ?>