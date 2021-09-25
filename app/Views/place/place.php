<?= $this->extend("templates/main"); ?>
<?= $this->section("content"); ?>
<h5 class="display-5 text-center"><?= base64_decode($place["place_shortdesc"]); ?></h5>

<p class="display-6 place-desc rounded text-wrap text-break text-justify">
    <?= base64_decode($place["place_description"]); ?>
</p>

<div class="float-right">
    <a class="btn btn-primary" href="/contribute/edit/<?= $place["id"]; ?>">Edit</a>
</div>
<?= $this->endSection(); ?>