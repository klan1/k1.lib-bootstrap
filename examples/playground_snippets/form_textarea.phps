use k1lib\html\bootstrap\components\form_textarea;
use k1lib\html\html_document;
use k1lib\html\label;

$doc = new html_document();
$doc->body()->append_child(new label('Example textarea', 'exampleFormControlTextarea1', 'form-label'));
$doc->body()->append_child(new form_textarea('textarea', 'exampleFormControlTextarea1', 3));
echo $doc->generate();
