use k1lib\html\bootstrap\components\scrollspy;
use k1lib\html\html_document;
use k1lib\html\nav;

$doc = new html_document();
$nav = new nav('Scroll', 'nav nav-pills mb-3', 'scrollspy-nav');
$nav->append_a('#section-1', 'Section 1');
$nav->append_a('#section-2', 'Section 2');
$doc->body()->append_child($nav);

$scroll = new scrollspy('#scrollspy-nav', '200px');
$section_1 = $scroll->append_div()->set_id('section-1');
$section_1->set_value('Section 1 content');
$section_2 = $scroll->append_div()->set_id('section-2');
$section_2->set_value('Section 2 content');
$doc->body()->append_child($scroll);
echo $doc->generate();
