<?php
include "./Services/common.php";



function Carousel($list, $name="carousel name"){
    $MAX_ITEM = 3;
    $temp = array(
        new Suit("Áo MU sân nhà 2022 ", "120 000 VNĐ", "../Assets/Images/MU.jpg"),
        new Suit("Áo Barca sân nhà 2022 ", "120 000 VNĐ", "../Assets/Images/Barca.jpg"),
        new Suit("Áo MU sân nhà 2022 ", "120 000 VNĐ", "../Assets/Images/MU.jpg"),
        new Suit("Áo Barca sân nhà 2022 ", "120 000 VNĐ", "../Assets/Images/Barca.jpg"),
        new Suit("Áo MU sân nhà 2022 ", "120 000 VNĐ", "../Assets/Images/MU.jpg"),
        new Suit("Áo Barca sân nhà 2022 ", "120 000 VNĐ", "../Assets/Images/Barca.jpg"),
        new Suit("Áo MU sân nhà 2022 ", "120 000 VNĐ", "../Assets/Images/MU.jpg"),
        new Suit("Áo Barca sân nhà 2022 ", "120 000 VNĐ", "../Assets/Images/Barca.jpg"),
        new Suit("Áo Real sân nhà 2022 ", "120 000 VNĐ", "../Assets/Images/Real.jpg")
    );

    $printArray = array();
    $tArray = array();
    $t = 0;

    foreach ($temp as $value) {
        array_push($tArray, $value);
        if (count($tArray) == $MAX_ITEM) {
            $t++;
            $tArray = array();
        }
    }
    echo 't = ' .$t.'</br>';

    echo'
    <div class="row">
    <h3>'.$name.'</h3>
        <div class="col-md-10 mx-auto">
            <div id="carouselExampleCaptions" class="carousel carousel-dark slide" data-bs-ride="false">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <div class="container">
                            <div class="row">
                            '.CardList($list).'
                            </div>
                        </div>
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
        </div>
    </div>

    ';
}

function CardList($list){
    $res='';
    $index = 0;
    while ($index < count($list)) {
        //CardInCarousel($list[$index]);
        $res .='
        <div class="col-sm-4">
            <div class="card border-success mb-3 thumb-wrapper" style="max-width: 16rem;">
                <img class="card-img-top" height="200px" src="'.$list[$index]->image.'">
                <div class="card-body text-success my-text-align-center">
                    <h5 class="card-title">'.$list[$index]->name.'</h5>
                    <button href="#" class="btn btn-primary">Buy now</button>
                </div>
                <div class="card-footer bg-transparent border-success my-text-align-right">$'.$list[$index]->price.'</div>
            </div>
        </div>
        ';
        $index++;
    }
    return $res;
}

?>
<?php
?>
