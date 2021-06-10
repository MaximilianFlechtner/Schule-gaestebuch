<div class="row">
    <div class="col-12">
        <h1>Neuen Mitarbeiter erstellen</h1>
    </div>
</div>


<div class="row">
    <div class="col-12">
        <form method="post">
            <div class="form-group mb-2">
                <label for="tech-personalnummer">Personalnummer</label>
                <input id="tech-personalnummer" name="tech-personalnummer" type="number" required="required"
                       class="form-control">
            </div>
            <div class="form-group mb-2">
                <label for="tech-name">Name</label>
                <input id="tech-name" name="tech-name" type="text" required="required" class="form-control">
            </div>
            <div class="form-group mb-2">
                <label for="tech-vorname">Vorname</label>
                <input id="tech-vorname" name="tech-vorname" type="text" required="required" class="form-control">
            </div>
            <div class="form-group mb-2">
                <label for="tech-geburtsdatum">Geburtsdatum</label>
                <input id="tech-geburtsdatum" name="tech-geburtsdatum" type="date" required="required"
                       class="form-control">
            </div>
            <div class="form-group mb-2">
                <label for="tech-telefon">Telefon</label>
                <input id="tech-telefon" name="tech-telefon" type="text" class="form-control" required="required">
            </div>
            <div class="form-group mb-2">
                <label for="tech-mobile">Mobile</label>
                <input id="tech-mobile" name="tech-mobile" type="text" class="form-control">
            </div>
            <div class="form-group mb-2">
                <label for="tech-email">Email</label>
                <input id="tech-email" name="tech-email" type="text" class="form-control" required="required">
            </div>
            <div class="form-group mb-2">
                <label for="tech-raum">Raum</label>
                <input id="tech-raum" name="tech-raum" type="number" class="form-control" required="required">
            </div>
            <div class="form-group mb-2">
                <label>Ist Leiter</label>
                <div>
                    <div class="custom-control custom-checkbox custom-control-inline">
                        <input name="tech-ist-leiter" id="tech-ist-leiter_0" type="checkbox"
                               class="custom-control-input" value="true">
                        <label for="tech-ist-leiter_0" class="custom-control-label">Ja</label>
                    </div>
                </div>
            </div>
            <div class="form-group mb-2">
                <label for="tech-abteilung">Abteilung</label>
                <div>
                    <select id="tech-abteilung" name="tech-abteilung" class="custom-select" required="required">
                        <option value=""></option>
                        <?php
                        $departments = Department::getAll();

                        if ($departments):
                            foreach ($departments as $department):?>
                                <option value="<?= $department->id ?>"><?= $department->name ?></option>
                            <?php endforeach; endif; ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <button name="submit" type="submit" class="btn btn-primary">Bestätigen</button>
            </div>
        </form>
    </div>
</div>
