<?php
namespace App;
use Spatie\Csp\Directive;
use Spatie\Csp\Policies\Basic;
class ContentPolicy extends Basic
{
public function configure()
{
parent::configure();

$this->addDirective(Directive::DEFAULT, '*.facebook.net');
$this->addDirective(Directive::SCRIPT, '*.cdn.tailwindcss.com');
$this->addDirective(Directive::DEFAULT, '*.code.jquery.com');
$this->addDirective(Directive::STYLE, 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css');
$this->addDirective(Directive::SCRIPT, 'https://code.jquery.com/jquery-3.2.1.slim.min.js');
$this->addDirective(Directive::SCRIPT, 'https://cdn.tailwindcss.com/');
$this->addDirective(Directive::SCRIPT, 'https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js');
$this->addDirective(Directive::FONT, 'https://fonts.gstatic.com');
$this->addDirective(Directive::STYLE, 'https://fonts.googleapis.com');
$this->addDirective(Directive::SCRIPT, 'https://www.google.com/recaptcha/api.js');
$this->addDirective(Directive::SCRIPT, 'https://www.gstatic.com/recaptcha/releases/CHIHFAf1bjFPOjwwi5Xa4cWR/recaptcha__en.js');
$this->addDirective(Directive::SCRIPT, 'https://code.jquery.com/jquery-3.2.1.slim.min.js');
}
}