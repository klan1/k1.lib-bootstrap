use k1lib\html\bootstrap\components\button;
use k1lib\html\bootstrap\components\collapse;
use k1lib\html\html_document;

$doc = new html_document();
$trigger = button::primary('Toggle');
$doc->body()->append_child($trigger);
$collapse = new collapse('demo', $trigger, '<p>Collapsible content</p>');
$doc->body()->append_child($collapse);
echo $doc->generate();
