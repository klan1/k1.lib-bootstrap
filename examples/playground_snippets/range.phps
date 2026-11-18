use k1lib\html\bootstrap\components\range;
use k1lib\html\html_document;
use k1lib\html\label;

$doc = new html_document();
$doc->body()->append_child(new label('Example range', 'range2', 'form-label'));
$doc->body()->append_child(new range('range', 'range2', 0, 5, 0.5, 2));
echo $doc->generate();
