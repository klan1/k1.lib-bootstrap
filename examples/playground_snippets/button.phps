use k1lib\html\bootstrap\components\button;
use k1lib\html\html_document;

$doc = new html_document();
$primaryButton = button::primary('Primary');
$secondaryButton = button::secondary('Secondary');
$successButton = button::success('Success');
$dangerButton = button::danger('Danger');
$warningButton = button::warning('Warning');
$infoButton = button::info('Info');
$lightButton = new button('Light', button::VARIANT_LIGHT);
$darkButton = new button('Dark', button::VARIANT_DARK);

$doc->body()->append_child($primaryButton);
$doc->body()->append_child($secondaryButton);
$doc->body()->append_child($successButton);
$doc->body()->append_child($dangerButton);
$doc->body()->append_child($warningButton);
$doc->body()->append_child($infoButton);
$doc->body()->append_child($lightButton);
$doc->body()->append_child($darkButton);
echo $doc->generate();
