use k1lib\html\bootstrap\components\alert;
use k1lib\html\html_document;

$doc = new html_document();
$primaryAlert = new alert('A simple primary alert.', 'primary');
$dangerAlert = new alert('A dismissible danger alert.', 'danger', true);
$doc->body()->append_child($primaryAlert);
$doc->body()->append_child($dangerAlert);
echo $doc->generate();
