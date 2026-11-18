use k1lib\html\bootstrap\components\alert;
use k1lib\html\bootstrap\components\close_button;
use k1lib\html\html_document;

$doc = new html_document();

// [Klan1-Developer IA] Dismissible alert from the Bootstrap docs
$primary = new alert('Alerta con close_button reutilizable.', 'primary');
$primary->append_close_button('alert');
$doc->body()->append_child($primary);

// [Klan1-Developer IA] White close button variant on a dark alert
$dark = new alert('Alerta oscura con close_button blanco.', 'dark');
$dark->append_child_tail(new close_button('alert', true));
$doc->body()->append_child($dark);

echo $doc->generate();
