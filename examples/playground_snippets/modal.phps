use k1lib\html\bootstrap\components\modal;
use k1lib\html\bootstrap\components\button;
use k1lib\html\html_document;

$doc = new html_document();
$trigger = button::primary('Open Modal');
$trigger->set_attrib('data-bs-toggle', 'modal');
$trigger->set_attrib('data-bs-target', '#demoModal');
$doc->body()->append_child($trigger);

$modal = new modal('Modal Title', '<p>This is the modal body.</p>', [
    'id' => 'demoModal',
    'btn_cancel' => 'Cancel',
    'btn_ok' => 'Confirm',
]);
$doc->body()->append_child($modal);
echo $doc->generate();
