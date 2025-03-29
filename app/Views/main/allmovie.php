<?= $this->extend(config('SiteLayout')->viewLayout) ?>
<?= $this->Section('main') ?>

<div class="container" style="margin-top: 5rem;">
    <!-- First row of movies -->
    <div class="row justify-content-center movie_parent">
        <?php if (!empty($movies)) : ?>
            <?php
            foreach ($movies as $movie) {
                $uri = new \CodeIgniter\HTTP\URI(site_url($movie->slug));
                echo '<div class="col-md-3 col-sm-6 movie_component">
                    <div class="row">
                        <div class="col-6 col-sm-12">
                            <a href=' . $uri->setQuery('id=' . $movie->movie_id) . '><img src="' . site_url('images/' . $movie->cover_img) . '" class="img-thumbnail" width="180px" alt="no image loading" loading="lazy"></a>
                            <h6 class="mt-3">' . $movie->title . '</h6>
                        </div>
                        <div class="col-6 col-sm-12">
                            
                            <a href="' . $uri->setQuery('id=' . $movie->movie_id) . '">
                                <h6 class="mt-1">' . $movie->Genre . '</h6>
                                <h6 class="mt-3">' . $movie->description . '</h6>
                            </a>
                        </div>
                    </div>
                </div>';
            } ?>
        <?php else : ?>
            <div class="container">
                <h3>No Data Found</h3>
            </div>
        <?php endif; ?>
    </div>
</div>
<?= $this->endSection() ?>