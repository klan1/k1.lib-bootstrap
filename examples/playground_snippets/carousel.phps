use k1lib\html\bootstrap\components\carousel;
use k1lib\html\html_document;

$svg1 = 'data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%22800%22 height=%22400%22%3E%3Crect width=%22800%22 height=%22400%22 fill=%22%230d6efd%22/%3E%3C/svg%3E';
$svg2 = 'data:image/svg+xml,%3Csvg xmlns=%22http://www.w3.org/2000/svg%22 width=%22800%22 height=%22400%22%3E%3Crect width=%22800%22 height=%22400%22 fill=%22%23198754%22/%3E%3C/svg%3E';

$doc = new html_document();
$carousel = new carousel([
    ['image' => $svg1, 'caption' => 'First', 'active' => true],
    ['image' => $svg2, 'caption' => 'Second'],
], true, true, true, ['id' => 'demoCarousel']);
$doc->body()->append_child($carousel);
echo $doc->generate();
