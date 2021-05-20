<?php if (isset($staff) && !empty($staff) && $staff instanceof StaffModel): ?>

    <div class="col-lg-4 col-12 col-md-6 mt-4">
        <div class="card">
            <div class="card-header">
                <div class="row">
                    <div class="col-6">
                        <?= $staff->name ?> <?= $staff->firstName ?>
                    </div>
                    <div class="col-6">
                        <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModal<?= $staff->id ?>"><i class="fas fa-trash"></i></button>
                        <button class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#editModal<?= $staff->id ?>"><i class="fas fa-edit"></i></button>
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
                <p>Abteilung: <?= Department::getById($staff->departmentID)->name ?></p>
                <?php if (CompanyCar::getByStaff($staff->id)): ?>
                    <p>Dienstwagen: <?= CompanyCar::getByStaff($staff->id)->indicator ?></p>
                <?php endif; ?>
            </div>
        </div>
    </div>


    <!-- Modal Delete -->
    <div class="modal fade" id="deleteModal<?= $staff->id ?>" tabindex="-1"
         aria-labelledby="deleteModalLabel-<?= $staff->id ?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"
                        id="deleteModalLabel-<?= $staff->id ?>">  <?= $staff->name ?> <?= $staff->firstName ?> Löschen
                        ?</h5>
                    <button type="button" class="btn-close btn" data-bs-dismiss="modal" aria-label="Close"></button>
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

    <!-- Modal Edit -->
    <div class="modal fade" id="editModal<?= $staff->id ?>" tabindex="-1" aria-labelledby="editModalLabel-<?= $staff->id ?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel-<?= $staff->id ?>">  <?= $staff->name ?> <?= $staff->firstName ?> Ändern ?</h5>
                    <button type="button" class="btn-close btn" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form method="post" action="/staffUpdate">
                    <div class="modal-body">
                        <div class="form-group mb-2">
                            <label for="tech-personalnummer">Personalnummer</label>
                            <input value="<?= $staff->staffNumber ?>" id="tech-personalnummer"
                                   name="tech-personalnummer" type="number" required="required" class="form-control">
                        </div>
                        <div class="form-group mb-2">
                            <label for="tech-name">Name</label>
                            <input value="<?= $staff->name ?>" id="tech-name" name="tech-name" type="text"
                                   required="required" class="form-control">
                        </div>
                        <div class="form-group mb-2">
                            <label for="tech-vorname">Vorname</label>
                            <input value="<?= $staff->firstName ?>" id="tech-vorname" name="tech-vorname" type="text"
                                   required="required" class="form-control">
                        </div>
                        <div class="form-group mb-2">
                            <label for="tech-geburtsdatum">Geburtsdatum</label>
                            <input value="<?= $staff->birth ?>" id="tech-geburtsdatum" name="tech-geburtsdatum"
                                   type="date" required="required" class="form-control">
                        </div>
                        <div class="form-group mb-2">
                            <label for="tech-telefon">Telefon</label>
                            <input value="<?= $staff->phone ?>" id="tech-telefon" name="tech-telefon" type="text"
                                   class="form-control" required="required">
                        </div>
                        <div class="form-group mb-2">
                            <label for="tech-mobile">Mobile</label>
                            <input value="<?= $staff->mobile ?>" id="tech-mobile" name="tech-mobile" type="text"
                                   class="form-control">
                        </div>
                        <div class="form-group mb-2">
                            <label for="tech-email">Email</label>
                            <input value="<?= $staff->mail ?>" id="tech-email" name="tech-email" type="text"
                                   class="form-control" required="required">
                        </div>
                        <div class="form-group mb-2">
                            <label for="tech-raum">Raum</label>
                            <input value="<?= $staff->room ?>" id="tech-raum" name="tech-raum" type="number"
                                   class="form-control" required="required">
                        </div>
                        <div class="form-group mb-2">
                            <label>Ist Leiter</label>
                            <div>
                                <div class="custom-control custom-checkbox custom-control-inline">
                                    <input <?= $staff->getIsManager() ? 'checked' : '' ?> name="tech-ist-leiter" id="tech-ist-leiter_0" type="checkbox" class="custom-control-input" value="true">
                                    <label for="tech-ist-leiter_0" class="custom-control-label">Ja</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group mb-2">
                            <label for="tech-abteilung">Abteilung</label>
                            <div>
                                <select id="tech-abteilung" name="tech-abteilung" class="custom-select"
                                        required="required">
                                    <option value=""></option>
                                    <?php
                                    $departments = Department::getAll();

                                    if ($departments):
                                        foreach ($departments as $department):?>
                                            <option <?= $staff->departmentID == $department->id ? 'selected' : '' ?>
                                                    value="<?= $department->id ?>"><?= $department->name ?></option>
                                        <?php endforeach; endif; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Schließen</button>
                        <input name="tech-staff-id" type="hidden" value="<?= $staff->id ?>">
                        <button name="submit" type="submit" class="btn btn-primary">Bestätigen</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


<?php endif; ?>