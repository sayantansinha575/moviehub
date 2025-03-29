<?= $this->extend(config('SiteLayout')->singleLayout) ?>
<?= $this->Section('main') ?>
<div class="container mt-5">
    <!-- First row of movies -->
    <div class="row justify-content-center align-items-center">
        <div class="col-12 col-md-3 col-sm-6 text-center">
            <!-- Add text-center class for center alignment -->
            <!-- Movie 1 content -->
            <!-- <a href="/"><button class="bn29">Download</button></a> -->
            <a href="#">
                <h2 class="mt-3"><?= $row->title ?></h2> <!-- Movie Title -->
                <img src="<?= site_url('images/' . $row->cover_img) ?>" class="img-thumbnail" width="180px" alt="no image loading" loading="lazy">
            </a>
            <!-- Centered text -->
            <p class="text-center fs-6">Description: <span class="movie-info text-center"><?= $row->description ?></span></p>
            <!-- Centered text -->
            <p class="text-center fs-6">Genere: <span class="movie-info text-center"><?= $row->Genre ?></span></p>
            <!-- Centered text -->
            <p class="text-center fs-6">Stars: <span class="movie-info text-center">Robbie Amell, Andy Allo, Allegra
                    Edwards</span></p>
            <!-- Centered text -->
            <p class="text-center fs-6">Genres: <span class="movie-info text-center"><?= $row->Genre ?></span></p>
            <!-- Centered text -->
            <p class="text-center fs-6">Quality: <span class="movie-info text-center">480p | 720p | 1080p (HD)</span></p>
            <!-- Centered text -->
            <p class="text-center fs-6">Language: <span class="movie-info text-center">Hindi Dubbed | English</span></p>
            <!-- Centered text -->
            <div class="rating">
                <input value="5" name="rate" id="star5" data-id="<?= $row->movie_id ?>" class="add-rating" type="radio" <?php if ($row->rating == 5) {
                                                                                                                            echo "checked";
                                                                                                                        } ?>>
                <label title="text" for="star5"></label>
                <input value="4" name="rate" id="star4" data-id="<?= $row->movie_id ?>" class="add-rating" type="radio" <?php if ($row->rating == 4) {
                                                                                                                            echo "checked";
                                                                                                                        } ?>>
                <label title="text" for="star4"></label>
                <input value="3" name="rate" id="star3" data-id="<?= $row->movie_id ?>" class="add-rating" type="radio" <?php if ($row->rating == 3) {
                                                                                                                            echo "checked";
                                                                                                                        } ?>>
                <label title="text" for="star3"></label>
                <input value="2" name="rate" id="star2" data-id="<?= $row->movie_id ?>" class="add-rating" type="radio" <?php if ($row->rating == 2) {
                                                                                                                            echo "checked";
                                                                                                                        } ?>>
                <label title="text" for="star2"></label>
                <input value="1" name="rate" id="star1" data-id="<?= $row->movie_id ?>" class="add-rating" type="radio" <?php if ($row->rating == 1) {
                                                                                                                            echo "checked";
                                                                                                                        } ?>>
                <label title="text" for="star1"></label>
            </div>
            <a onclick="document.location='index.php';"><button class="bn29 mt-2">Download</button></a>
            <div class="text-center mt">
                <em class="text-center"><strong>720p Links [625MB]</strong></em>
            </div>
        </div>
    </div>
    <div class="row" style="margin-top: 20px;">
        <div class="col-lg-4 col-md-6">
            <h2>screen shot<h2>
        </div>
        <div class="col-lg-4 col-md-6">
            <h2>screen shot<h2>
        </div>
        <div class="col-lg-4 col-md-6">
            <h2>screen shot<h2>
        </div>
    </div>
</div>
<?= $this->endSection('main') ?>