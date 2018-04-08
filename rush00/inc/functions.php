<?php
function get_item_html($id, $data) {
    if ($data['category'] == "Movies") {
        $catID = 1;
    }
    if ($data['category'] == "Music") {
        $catID = 2;
    }
    if ($data['category'] == "Books") {
        $catID = 3;
    }
        $output = "<li><a href='details.php?id="
            . $id . "&catID=".$catID."'><img src='"
            . $data['img'] . "' alt='"
            . $data['title'] . "' />"
            . "<p>View Details</p>"
            . "</a></li>";
        return $output;
}
