   <!--pagination start  -->
   <div class="navigation justify-content-center">
       <!-- if ($currentPage > 1) :  -->
       <a class="prev page-numbers" href="<?= site_url('movie/page/' . ($currentPage - 1)); ?>">&laquo; Previous </a>
       <!-- endif;  -->
       <?php for ($i = 1; $i <= $totalPages; $i++) : ?>
           <?php if ($i == 1) {
                $disable = 'disable';
            } else {
                $disable = '';
            } ?>
           <a class="page-numbers <?= ($currentPage == $i) ? 'current' : '' ?>  <?= $disable ?>" href="<?= isset($_GET['serch_filter']) && isset($_GET['search_term']) && isset($_GET['order_by'])   ? base_url('movie/page/' . $i . '?' . 'serch_filter=' . $_GET['serch_filter'] . '&' . 'search_term=' . $_GET['search_term'] . '&' . 'order_by=' . $_GET['order_by']) : base_url('movie/page/' . $i); ?>"><?= $i; ?></a>
       <?php endfor; ?>
       <span class="page-numbers dots">&hellip;</span>
       <!-- ($currentPage < $totalPages) :  -->
       <a class="next page-numbers" href="<?= site_url('movie/page/' . ($currentPage + 1)); ?>">Next &raquo;</a>
       <!-- endif;  -->
   </div>
   <!-- base_url('movie/page/' . $i . '?' . 'filtr=' . $filter) -->
   <?php
    $filterBy = [
        [
            'alphabet' => 'A'
        ],
        [
            'alphabet' => 'B'
        ],
        [
            'alphabet' => 'C'
        ],
        [
            'alphabet' => 'D'
        ],
        [
            'alphabet' => 'E'
        ],
        [
            'alphabet' => 'F'
        ],
        [
            'alphabet' => 'G'
        ],
        [
            'alphabet' => 'H'
        ],
        [
            'alphabet' => 'I'
        ],
        [
            'alphabet' => 'J'
        ],
        [
            'alphabet' => 'K'
        ],
        [
            'alphabet' => 'L'
        ],
        [
            'alphabet' => 'M'
        ],
        [
            'alphabet' => 'N'
        ],
        [
            'alphabet' => 'O'
        ],
        [
            'alphabet' => 'P'
        ],
        [
            'alphabet' => 'Q'
        ],
        [
            'alphabet' => 'X'
        ],
        [
            'alphabet' => 'Y'
        ],
        [
            'alphabet' => 'Z'
        ],
    ];

    ?>
   <form action="<?= site_url(); ?>" id="big_search" method="GET">
       <input type="hidden" name="serch_filter" value="<?= isset($_GET['serch_filter']) ? htmlspecialchars($_GET['serch_filter']) : '' ?>">
       <input type="hidden" name="search_term" value="<?= isset($_GET['search_term']) ? htmlspecialchars($_GET['search_term']) : '' ?>">
       <input type="hidden" name="order_by" value="<?= isset($_GET['order_by']) ? htmlspecialchars($_GET['order_by']) : '' ?>">
   </form>
   <div class="container">
       <div class="col-lg-12 col-md-4 col-sm-6">
           <div class="pagination" style="gap: 8px;flex-wrap: wrap;">
               <?php foreach ($filterBy as $key => $value) : ?>
                   <li class="page-item"><a data-al="<?= $value['alphabet'] ?>" class="page-link filter_box filter_by_al" href="javascript:void(0)"><?= $value['alphabet']; ?></a></li>
               <?php endforeach; ?>
           </div>
       </div>
   </div>
   <!--pagination end  -->
   <!-- href="<?= site_url() . '?' . 'filtr=' . $value['alphabet']; ?>" -->