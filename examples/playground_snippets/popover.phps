use k1lib\html\bootstrap\components\popover;
use k1lib\html\html_document;

$doc = new html_document();
$trigger = new popover('Click to toggle', popover::VARIANT_PRIMARY, 'Popover title', 'Popover body content.', 'right');
$doc->body()->append_child($trigger);
echo $doc->generate();
