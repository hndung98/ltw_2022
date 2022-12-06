<?php

function showToast($title, $msg){
    echo '
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="liveToast" class="toast text-bg-success" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <!-- <img src="..." class="rounded me-2" alt="..."> -->
                <strong class="me-auto">'.$title.'</strong>
                <small>vừa xong</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body" id ="toast-msg">
                '.$msg.'
            </div>
        </div>
    </div>
    ';
}

function showRedToast($title, $msg){
    echo '
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <div id="liveRedToast" class="toast text-bg-danger" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="toast-header">
                <!-- <img src="..." class="rounded me-2" alt="..."> -->
                <strong class="me-auto">'.$title.'</strong>
                <small>vừa xong</small>
                <button type="button" class="btn-close" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
            <div class="toast-body" id="red-toast-msg">
                '.$msg.'
            </div>
        </div>
    </div>
    ';
}