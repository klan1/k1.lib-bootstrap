use k1lib\html\bootstrap\components\button;
use k1lib\html\bootstrap\components\tooltip;
use k1lib\html\html_document;

$doc = new html_document();
$target = new button('Hover me');
new tooltip($target, 'Tooltip text', tooltip::PLACEMENT_TOP);
$doc->body()->append_child($target);
echo $doc->generate();
