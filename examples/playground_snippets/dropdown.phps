use k1lib\html\bootstrap\components\dropdown;
use k1lib\html\html_document;

$doc = new html_document();
$dropdown = new dropdown('Actions', [
    ['text' => 'Edit', 'href' => '#'],
    ['text' => 'Delete', 'href' => '#'],
    ['divider' => true],
    ['text' => 'Share', 'href' => '#'],
]);
$doc->body()->append_child($dropdown);
echo $doc->generate();
