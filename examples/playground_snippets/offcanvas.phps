use k1lib\html\bootstrap\components\button;
use k1lib\html\bootstrap\components\offcanvas;
use k1lib\html\html_document;

$doc = new html_document();
$trigger = button::primary('Open Offcanvas');
$trigger->set_attrib('data-bs-toggle', 'offcanvas');
$trigger->set_attrib('data-bs-target', '#demoOffcanvas');
$doc->body()->append_child($trigger);
$offcanvas = new offcanvas('start', 'Offcanvas Title', '<p>Offcanvas body.</p>', 'demoOffcanvas');
$doc->body()->append_child($offcanvas);
echo $doc->generate();
