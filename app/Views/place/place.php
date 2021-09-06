<?= $this->extend("templates/main"); ?>
<?= $this->section("content"); ?>
<h3 class="display-3 text-center"><?= $title ?></h3>
<h5 class="display-5 text-center"><?= base64_decode($place["place_shortdesc"]); ?></h5>

<p class="display-6 place-desc rounded text-wrap text-break">
    <?= base64_decode($place["place_description"]); ?>
</p>
<?= $this->endSection(); ?>