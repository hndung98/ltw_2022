<?php
class Suit
{
    public $name;
    public $price;

    function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    // Methods
    function set_name($name)
    {
        $this->name = $name;
    }
    function get_name()
    {
        return $this->name;
    }
}

$list = array(
    new Suit("Áo PSG sân nhà 2022 ", "120 000 VNĐ"),
    new Suit("Áo MU sân nhà 2022 ", "120 000 VNĐ"),
    new Suit("Áo Barca sân nhà 2022 ", "120 000 VNĐ"),
    new Suit("Áo Real sân nhà 2022 ", "120 000 VNĐ")
);

function ProductItem(Suit $item){
    echo '                        
    <div class="col-3 col-sm-3 col-md-3 col-">
        <div class="card shadow-sm">
            <svg class="bd-placeholder-img card-img-top" width="100%" height="325" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                <title>Placeholder</title>
                <rect width="100%" height="100%" fill="#55595c" /><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
            </svg>

            <div class="card-body">
                <p class="card-text">
                '.$item->name.'</p>
                <div class="d-flex justify-content-between align-items-center">
                    <div class="btn-group">
                        <button type="button" class="btn btn-sm btn-outline-secondary">Details</button>
                    </div>
                    <small class="text-muted">9 mins</small>
                </div>
            </div>
        </div>
    </div>
    ';
}

?>

<div id="carouselExampleCaptions" class="carousel carousel-dark slide" data-bs-ride="false">
    <div class="carousel-inner">
        <div class="carousel-item active">
            <div class="container">
                <div class="row">
                    <?php
                    $index = 0;
                    while ($index < count($list)) {
                        ProductItem($list[$index]);
                        $index++;
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="carousel-item">
            <?php
            ?>
        </div>
        <div class="carousel-item">
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>