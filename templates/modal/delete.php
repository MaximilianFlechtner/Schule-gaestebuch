<?php if (isset($id) && isset($name) && isset($post)): ?>
    <!-- Modal Delete -->
    <div class="modal fade" id="deleteModal<?= $id ?>" tabindex="-1"
         aria-labelledby="deleteModalLabel-<?= $id ?>" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"
                        id="deleteModalLabel-<?= $id ?>">  <?= $name ?> Löschen
                        ?</h5>
                    <button type="button" class="btn-close btn" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="alert alert-danger">Achtung damit wird der Mitarbeiter komplett gelöscht</div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Schließen</button>
                    <form action="<?= $post ?>" method="post">
                        <input name="tech-model-id" type="hidden" value="<?= $id ?>">
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>