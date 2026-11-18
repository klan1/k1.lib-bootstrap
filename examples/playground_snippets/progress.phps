use k1lib\html\bootstrap\components\progress;
use k1lib\html\html_document;

$doc = new html_document();
$progress = new progress([
    ['value' => 25, 'type' => 'success', 'label' => '25%'],
    ['value' => 50, 'type' => 'info', 'striped' => true, 'label' => '50%'],
]);
$doc->body()->append_child($progress);
echo $doc->generate();
