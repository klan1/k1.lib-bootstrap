use k1lib\html\bootstrap\components\form_control;
use k1lib\html\bootstrap\components\validation;
use k1lib\html\html_document;
use k1lib\html\label;

$doc = new html_document();
$doc->body()->append_child(new label('First name', 'validationCustom01', 'form-label'));
$first_name = new form_control('text', 'firstName', 'Mark', 'validationCustom01');
$first_name->set_state('valid');
$doc->body()->append_child($first_name);
$doc->body()->append_child(new validation('Looks good!', 'valid'));
$doc->body()->append_child(new validation('Please provide a valid first name.', 'invalid'));
echo $doc->generate();
