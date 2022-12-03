<?php

function SingleCarousel($list, $id){
    
    $printStr = '';
    $isActive = true;
    $active = 'active';
    $temp = array();
    foreach ($list as $value) {
        $printStr .= '
        <div class="carousel-item '.$active.'">
        <img src="'.$value->image.'" class="d-block w-100" height="410px" alt="...">
        <div class="carousel-caption d-none d-md-block">
          <h5>First slide label</h5>
          <p>Some representative placeholder content for the first slide.</p>
        </div>
        </div>
        ';
        if($isActive == true){
            $active = '';
            $isActive = false;
        }

    }

    echo'
    <div id="carouselExampleIndicators'.$id.'" class="carousel slide" data-bs-ride="true">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators'.$id.'" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators'.$id.'" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators'.$id.'" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">'
    .$printStr.
    '
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators'.$id.'" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators'.$id.'" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
    </div>
    ';
}

function Carousel($list, $id, $name="carousel name"){
    $MAX_ITEM = 3;
    $MAX_PANEL = 5;

    $printStr = '';
    $isActive = true;
    $active = 'active';
    $temp = array();
    foreach ($list as $value) {
        array_push($temp, $value);
        if (count($temp) == $MAX_ITEM) {
            $printStr .= Panel($temp, $active);
            $temp = array();
            if($isActive == true){
                $active = '';
                $isActive = false;
            }
        }
    }
    

    echo'
    <div class="row">
        <h2 class="my-text-align-center">'.$name.'</h2>
        <div class="col-md-10 mx-auto">
            <div id="carouselExampleCaptions'.$id.'" class="carousel carousel-dark slide" data-bs-ride="false">
                <div class="carousel-inner">
                    '.$printStr.'
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions'.$id.'" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions'.$id.'" data-bs-slide="next">
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
            <div class="card border-success mb-3 thumb-wrapper my-cursor-pointer" style="max-width: 16rem;">
                <img class="card-img-top" height="200px" src="'.$list[$index]->image.'">
                <div class="card-body text-success my-text-align-center">
                    <h5 class="card-title">'.$list[$index]->name.'</h5>
                    <button class="btn btn-outline-primary"><i class="fa-solid fa-cart-shopping fa-fw" style="color:#0d6efd;"></i></button>
                </div>
                <div class="card-footer bg-transparent border-success my-text-align-right">$'.$list[$index]->price.'</div>
            </div>
        </div>
        ';
        $index++;
    }
    return $res;
}

function Panel($list, $active){
    $res='';
    $res .='
    <div class="carousel-item '.$active.'">
        <div class="container">
            <div class="row">
            '.CardList($list).'
            </div>
        </div>
    </div>
    ';
    return $res;
}

?>
<?php
?>
