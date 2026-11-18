use k1lib\html\bootstrap\components\callout;
use k1lib\html\html_document;

$doc = new html_document();
$callout = new callout('This is a callout message.', 'Callout title', true, 'info');
$doc->body()->append_child($callout);
echo $doc->generate();
