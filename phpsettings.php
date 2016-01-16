<?php
$env = APPLICATION_ENV ?: 'development';

if ('production' === $env) {
    error_reporting(0);
    ini_set('display_errors', 'off');
    ini_set('display_startup_errors', false);
} else {
    error_reporting(-1);
    ini_set('display_errors', 'on');
    ini_set('display_startup_errors', true);
}

ini_set('arg_separator.output', '&amp;');
ini_set('session.use_cookies', true);
ini_set('session.use_only_cookies', true);
ini_set('session.use_trans_sid', false);
ini_set('session.name', 'sessid');
ini_set('url_rewriter.tags', 'a=href,area=href,frame=src,fieldset=fakeentry');

ini_set('date.timezone', 'Europe/Warsaw');
setlocale(LC_ALL, 'pl_PL.UTF8');

ini_set('mbstring.language', 'uni');

ini_set('default_charset', 'UTF-8');
ini_set('input_encoding', 'UTF-8');
ini_set('output_encoding', 'UTF-8');