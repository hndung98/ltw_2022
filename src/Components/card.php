<?php
function Card(Suit $item){
    echo '
        <div class="card border-success mb-3 thumb-wrapper" style="max-width: 16rem;">
            <img class="card-img-top" height="200px" src="'.$item->image.'">
            <div class="card-body text-success my-text-align-center">
                <h5 class="card-title">'.$item->name.'</h5>
                <button class="btn btn-outline-primary">Buy now</button>
            </div>
            <div class="card-footer bg-transparent border-success my-text-align-right">$'.$item->price.'</div>
        </div>
    ';
}
function CardInCarousel(Suit $item){
    echo '
        <div class="col-sm-4">
            <div class="card border-success mb-3 thumb-wrapper" style="max-width: 16rem;">
                <img class="card-img-top" height="200px" src="'.$item->image.'">
                <div class="card-body text-success my-text-align-center">
                    <h5 class="card-title">'.$item->name.'</h5>
                    <button href="#" class="btn btn-outline-primary">Buy now</button>
                </div>
                <div class="card-footer bg-transparent border-success my-text-align-right">$'.$item->price.'</div>
            </div>
        </div>
    ';
}
?>
