use k1lib\html\bootstrap\components\spinner;
use k1lib\html\html_document;

$doc = new html_document();
$borderSpinner = new spinner(spinner::TYPE_BORDER, 'primary', spinner::SIZE_MD, false);
$growSpinner = new spinner(spinner::TYPE_GROW, 'success', spinner::SIZE_SM, false);
$doc->body()->append_child($borderSpinner);
$doc->body()->append_child($growSpinner);
echo $doc->generate();
