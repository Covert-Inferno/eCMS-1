<?php
/**
 * Filename: index.php
 * User: 'Barracuda'
 * Date: 06.01.14
 * Time: 15:43
 */

require_once 'inc/prepend.php';

$EveAPI = new \eCMS\EveAPI\EveAPI('1490636', 'AVkLU7aKz4LvKYbBRynNGJesTmhUXBt9i8vGuF59sdCGdIuSDZIQMGNnrf2lP4Y7');

#\eCMS\Page\page::createPage(array('name' => 'imprint', 'title' => 'German Kings Impressum &amp; Datenschutz', 'content' => 'Das ist ein Test mit &auml;hnlicher Struktur wie in der Datenbank'));

require_once 'inc/append.php';
