<?= $this->extend("templates/main"); ?>
<?= $this->section("content"); ?>
<div class="row">
<?php
foreach($places as $place){
    $place_id = $place["id"];
    $place_name = $place["place_name"];
    $place_description = $place["place_description"];

    echo <<<ENDL
    <div class="col-sm-6">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">$place_name</h5>
                <p class="card-text">$place_description</p>
                <a href="/place?id=$place_id" class="btn btn-primary">See more</a>
            </div>
        </div>
    </div>
    ENDL;
}

// TODO: sprawdzić więcej pozycji. Zmienić routing z `result`, dodać grupę `places` a w niej `places/result`
?>
</div>
<?= $this->endSection(); ?>