use k1lib\html\bootstrap\components\form_control;
use k1lib\html\bootstrap\components\form_text;
use k1lib\html\html_document;
use k1lib\html\label;

$doc = new html_document();
$doc->body()->append_child(new label('Email address', 'exampleFormControlInput1', 'form-label'));
$email = new form_control('email', 'email', '', 'exampleFormControlInput1', 'name@example.com');
$email->set_attrib('aria-describedby', 'emailHelp');
$doc->body()->append_child($email);
$doc->body()->append_child(new form_text("We'll never share your email with anyone else.", 'emailHelp'));
echo $doc->generate();
