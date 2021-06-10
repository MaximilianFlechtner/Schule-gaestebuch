<div class="row">
    <div class="col-6">
        <h1>Schadensfall</h1>
    </div>
</div>
<div class="row mt-2">
    <?php
    if (isset($damageList) && !empty($damageList)) {
        foreach ($damageList as $damage) {
            include('templates/list/damage-single.php');
        }
    }
    ?>
</div>

