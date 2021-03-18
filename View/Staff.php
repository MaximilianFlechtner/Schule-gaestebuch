<div class="row">
    <div class="col-6">
        <h1>Mitarbeiter</h1>
    </div>
    <div class="col-6">
        <a class="btn btn-primary" href="/staffCreate">Neu</a>
    </div>
</div>

<div class="row mt-2">

    <?php
    if (isset($staffList) && !empty($staffList)) {
        foreach ($staffList as $staff) {
            include('templates/list/staff-single.php');
        }
    }
    ?>

</div>
