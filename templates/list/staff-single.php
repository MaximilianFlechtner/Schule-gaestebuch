<?php if (isset($staff) && !empty($staff) && $staff instanceof StaffModel): ?>

    <div class="col-lg-4 col-12 col-md-6 mt-4">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <?= $staff->name ?> <?= $staff->firstName ?>
                    </div>
                    <div class="col-6 text-right">
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal<?= $staff->id ?>"><i class="fas fa-trash"></i></button>
                        <a class="btn btn-success" href=""><i class="fas fa-edit"></i></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <p>Geburtsdatum: <?= $staff->birth ?></p>
                <p>Personalnummer: <?= $staff->staffNumber ?></p>
                <p>Mobile: <?= $staff->mobile ?></p>
                <p>E-Mail: <?= $staff->mail ?></p>
                <p>Raum: <?= $staff->room ?></p>
                <p>Leiter: <?= $staff->getIsManager() ? 'Ja' : 'Nein' ?></p>
                <p>Abteilungs ID: <?= $staff->departmentID ?></p>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="deleteModal<?= $staff->id ?>" tabindex="-1" aria-labelledby="deleteModalLabel-<?= $staff->id ?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="deleteModalLabel-<?= $staff->id ?>">  <?= $staff->name ?> <?= $staff->firstName ?> Löschen ?</h5>
                    <button type="button" class="btn-close btn" data-bs-dismiss="modal" aria-label="Close"><i class="far fa-times"></i></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger">Achtung damit wird der Mitarbeiter komplett gelöscht</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Schließen</button>
                    <form action="/staffDelete" method="post">
                        <input name="tech-staff-id" type="hidden" value="<?= $staff->id ?>">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


<?php endif; ?>