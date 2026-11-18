use k1lib\html\bootstrap\components\floating_label;
use k1lib\html\bootstrap\components\form_control;
use k1lib\html\bootstrap\components\form_select;
use k1lib\html\bootstrap\components\form_textarea;
use k1lib\html\html_document;

$doc = new html_document();

// [Klan1-Developer IA] Email and password from the Bootstrap docs
$email = new form_control('email', 'email', '', 'floatingInput', 'name@example.com');
$doc->body()->append_child(new floating_label('Email address', $email));

$password = new form_control('password', 'password', '', 'floatingPassword', 'Password');
$doc->body()->append_child(new floating_label('Password', $password));

// [Klan1-Developer IA] Textarea from the Bootstrap docs
$textarea = new form_textarea('comments', 'floatingTextarea', NULL, 'Leave a comment here');
$doc->body()->append_child(new floating_label('Comments', $textarea));

// [Klan1-Developer IA] Select from the Bootstrap docs
$select = new form_select('select', 'floatingSelect');
$select->set_attrib('aria-label', 'Floating label select example');
$select->append_option(NULL, 'Open this select menu', TRUE);
$select->append_option('1', 'One');
$select->append_option('2', 'Two');
$select->append_option('3', 'Three');
$doc->body()->append_child(new floating_label('Works with selects', $select));

echo $doc->generate();
