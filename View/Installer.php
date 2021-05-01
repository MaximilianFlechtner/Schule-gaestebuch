<?php if (!Installer::check()): ?>
    <div class="row">
        <div class="col-12 mb-4 mt-2">
            <h1>Instalieren</h1>
        </div>
        <?php if (isset($message) && !empty($message)): ?>
            <div class="col-12">
                <?= $message ?>
            </div>
        <?php endif; ?>
        <div class="col-12">
            <form action="installerCheck" method="post">
                <div class="form-group">
                    <label for="tech-host">Host</label>
                    <input placeholder="localhost" type="text" class="form-control" id="tech-host" name="tech-host" required>
                </div>
                <div class="form-group">
                    <label for="tech-db">Database</label>
                    <input placeholder="schule" type="text" class="form-control" id="tech-db" name="tech-db" required>
                </div>
                <div class="form-group">
                    <label for="tech-user">User</label>
                    <input placeholder="schule" type="text" class="form-control" id="tech-user" name="tech-user" required>
                </div>
                <div class="form-group">
                    <label for="tech-password">Passwort</label>
                    <input placeholder="schule" type="password" class="form-control" id="tech-password" name="tech-password" required>
                </div>
                <button type="submit" class="btn btn-primary mt-2">Submit</button>
            </form>

        </div>
    </div>
<?php else: ?>

<div class="row">
    <div class="col-12 text-center mb-2">
        <h1>Datenbank Tabellen erstellen</h1>
    </div>
    <div class="col-12">
        <div class="alert alert-warning text-center">
            Achtung das Könnte alle Daten löschen, bitte ziehen sie sich ein Backup von der Datenbank "<?= DBNAME ?>"
        </div>
    </div>
    <?php if (isset($message) && !empty($message)): ?>
        <div class="col-12">
            <?= $message ?>
        </div>
    <?php endif; ?>
    <div class="col-12 text-center mb-2 mt-2">
        <div class="alert alert-info">
            Aktuell wird nur die Datenbank für das gästebuch erstellt!!
        </div>
    </div>
    <div class="col-4 text-center">
        <a href="/installerDataTest" class="btn btn-primary">
            Mit Test Daten
        </a>
    </div>
    <div class="col-4 text-center">
        <a href="/installerData" class="btn btn-primary">
            Nur Tabellen
        </a>
    </div>
    <div class="col-4 text-center">
        <a href="/installerDataVersicherung" class="btn btn-primary">
            Versicherung
        </a>
    </div>
    <div class="col-12 mt-5 text-center">
        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#done">
            Instalation abschließen
        </button>
    </div>
</div>




    <!-- Modal -->
    <div class="modal fade" id="done" tabindex="-1" aria-labelledby="doneLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="doneModalLabel">Instalation Beenden</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Achtung nach dem sie die Installation abgeschlossen haben können sie diese nicht wieder öffnen
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Schließen</button>
                    <a href="/installerDone" class="btn btn-success">
                        Abschließen
                    </a>
                </div>
            </div>
        </div>
    </div>


<?php endif ?>
