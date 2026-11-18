use k1lib\html\bootstrap\components\toast;
use k1lib\html\html_document;

$doc = new html_document();
$toast = new toast('Header', 'This is a toast message.', true, 5000);
$doc->body()->append_child($toast);
echo $doc->generate();
