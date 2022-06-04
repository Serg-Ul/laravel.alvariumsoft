<?php

function rate_testimonial($rating)
{
    $rating_img = 'rating_zero.png';

    $rating = (int)round($rating);

    switch ($rating) {
        case 1 :
            $rating_img = "rating_one.png";
            break;
        case 2 :
            $rating_img = "rating_two.png";
            break;
        case 3 :
            $rating_img = "rating_three.png";
            break;
        case 4 :
            $rating_img = "rating_four.png";
            break;
        case 5 :
            $rating_img = "rating_five.png";
    }

    return "<img src='" . asset("/images/testimonials/$rating_img") . "' alt='Rating'>";
}
