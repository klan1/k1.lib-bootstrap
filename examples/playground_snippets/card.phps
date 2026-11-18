use k1lib\html\bootstrap\components\card;
use k1lib\html\html_document;

$doc = new html_document();
$card = new card('Card Title', 'Subtitle', 'Some quick example text.');
$card->set_header('Header');
$card->set_footer('Footer');
$doc->body()->append_child($card);
echo $doc->generate();
