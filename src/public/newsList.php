<?php
class NewsPost {
    private $newsData = [];
    public function __construct($newsData){
        $this->newsData = json_decode($newsData, true);
    }

    public function printNewsPost(){
        echo "<form method='post' name='{$this->newsData['name']}' action='newsFull.php' enctype='multipart/form-data'>";
        echo
        "<div>" . $this->newsData['name'] . "</div>"    ;
        echo
        "<div>" . $this->newsData['news-author'] . "           " . $this->newsData['news-date'] . "</div>";
        echo
        "<div>" . $this->newsData['news-description'] . "</div>";
        echo
        "<input type='submit' name='{$this->newsData['id']}' value='подробнее'>";
        echo "</form>";
    }
}
foreach ($_COOKIE as $item){
    $newsItem = new NewsPost($item);
    $newsItem->printNewsPost();
}