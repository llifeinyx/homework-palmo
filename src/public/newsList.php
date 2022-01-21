<?php
class NewsPost {
    private $newsData = [];
    public function __construct($newsData){
        $this->newsData = $newsData;
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
if (isset($_COOKIE['news-array'])){
    $tmpArray = json_decode($_COOKIE['news-array'], true);
    foreach ($tmpArray as $item){
        $newsItem = new NewsPost($item);
        $newsItem->printNewsPost();
    }
}