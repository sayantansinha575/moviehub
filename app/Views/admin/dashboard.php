<?= $this->extend(config('SiteLayout')->adminLayout) ?>
<?= $this->section('content'); ?>
<div class="container">
    <div class="col-12">
        <button type="button" class="btn btn-primary add-movie">Add Movie</button>
    </div>
    <table class="table table-dark table-striped" id="ajax-movie-table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Genere</th>
                <th scope="col">Image</th>
                <th scope="col">Action</th>
            </tr>
        </thead>
    </table>
</div>
<!-- modal -->
<div class="modal" id="movieModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= site_url('admin/dashboard/add-update-movie') ?>" id="movie_add_update">
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Movie Title</label>
                        <input type="text" class="form-control" name="movie_title" id="movie_title" aria-describedby="emailHelp">
                        <div class="error-feedback"></div>

                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">Decription</label>
                        <textarea class="form-control" name="movie_description" id="movie_description" rows="3"></textarea>
                        <div class="error-feedback"></div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Genere</label>
                        <input type="text" class="form-control" name="movie_genere" id="movie_genere">
                        <div class="error-feedback"></div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Slug</label>
                        <input type="text" class="form-control" name="slug" id="movie_slug">
                        <div class="error-feedback"></div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlTextarea1" class="form-label">upload Image</label>
                        <input type="file" name="movie_image" id="#">
                        <div class="error-feedback"></div>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Image</label>
                        <img src="#" style="width: 120px;" class="form-control" id="movie_image" aria-describedby="emailHelp">
                    </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="id" name="id" readonly>
                <button type="button" class="btn btn-secondary" data-type="reset">Close</button>
                <button type="submit" class="btn btn-primary btnProgress">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- modal -->
<?= $this->endSection() ?>