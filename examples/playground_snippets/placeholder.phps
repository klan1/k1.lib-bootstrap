use k1lib\html\bootstrap\components\placeholder;
use k1lib\html\html_document;
use k1lib\html\div;

$doc = new html_document();
$doc->body()->append_child(new placeholder(6));
$doc->body()->append_child(new placeholder('w-75'));

// [Klan1-Developer IA] Glow and wave from the Bootstrap docs
$glow = new div('placeholder-glow');
$glow->append_child(new placeholder(12));
$doc->body()->append_child($glow);

$wave = new div('placeholder-wave');
$wave->append_child(new placeholder(12));
$doc->body()->append_child($wave);

$doc->body()->append_child(new placeholder(12, 'primary', 'lg'));
echo $doc->generate();
