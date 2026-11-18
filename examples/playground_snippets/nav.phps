use k1lib\html\bootstrap\components\nav;
use k1lib\html\html_document;

$doc = new html_document();
$nav = new nav([
    ['text' => 'Home', 'href' => '#', 'active' => true],
    ['text' => 'Features', 'href' => '#'],
    ['text' => 'Pricing', 'href' => '#'],
], 'tabs');
$doc->body()->append_child($nav);
echo $doc->generate();
