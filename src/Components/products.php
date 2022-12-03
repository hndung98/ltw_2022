<div class="my-container my-bg-color-content" style="min-height: 1320px;">
    <h3 class="my-text-align-center">Products</h3>
    <div class="album py-5 bg-light">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <div class="col">
                    <?php 
                    Card(new Suit("0", "Áo MC sân nhà", "2022", "120 000", "../Assets/Images/MC.jpg"));
                    ?>
                </div>
                <div class="col">
                    <?php 
                    Card(new Suit("1", "Áo PSG sân nhà", "2022", "120 000", "../Assets/Images/PSG.jpg"));
                    ?>
                </div>
                <div class="col">
                    <?php 
                    Card(new Suit("2", "Áo MU sân nhà", "2022", "120 000", "../Assets/Images/MU.jpg"));
                    ?>
                </div>
                <div class="col">
                    <?php 
                    Card(new Suit("3", "Áo MC sân nhà", "2022", "120 000", "../Assets/Images/MC.jpg"));
                    ?>
                </div>
                <div class="col">
                    <?php 
                    Card(new Suit("4", "Áo PSG sân nhà", "2022", "120 000", "../Assets/Images/PSG.jpg"));
                    ?>
                </div>
                <div class="col">
                    <?php 
                    Card(new Suit("5", "Áo MU sân nhà", "2022", "120 000", "../Assets/Images/MU.jpg"));
                    ?>
                </div>
            </div>
        </div>
    </div>
    <nav aria-label="Page navigation example">
        <ul class="pagination justify-content-center">
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                    <span aria-hidden="true">&laquo;</span>
                </a>
            </li>
            <li class="page-item"><a class="page-link" href="#">1</a></li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                    <span aria-hidden="true">&raquo;</span>
                </a>
            </li>
        </ul>
    </nav>
</div>