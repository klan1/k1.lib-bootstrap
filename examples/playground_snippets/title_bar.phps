use k1lib\html\bootstrap\components\title_bar;
use k1lib\html\bootstrap\components\button;
use k1lib\html\html_document;

$doc = new html_document();
$titleBar = new title_bar();
$titleBar->title()->set_value('Page Title');
$actionButton = new button('Action', button::VARIANT_PRIMARY);
$titleBar->right()->append_child($actionButton);
$doc->body()->append_child($titleBar);
echo $doc->generate();
