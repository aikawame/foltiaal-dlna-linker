#!/usr/bin/php
<?php
$format     = 'MP4-HD';
$sourcePath = '/home/foltia/php/DLNAroot/01-全録画';
$linkedPath = '/home/foltia/php/DLNAroot/99-番組別';

$ym    = isset($argv[1]) ? $argv[1] : date('Ym');
$year  = substr($ym, 0, 4);
$month = substr($ym, 4, 2);

if (!file_exists($linkedPath)) {
  mkdir($linkedPath);
}

foreach (glob("{$sourcePath}/{$year}/{$month}/{$format}/*") as $sourceFilePath) {
  if (is_file($sourceFilePath)) {
    $sourceFilePathStrs = explode('/', $sourceFilePath);
    $fileName = $sourceFilePathStrs[9];
    preg_match('/[0-9]{4}-[0-9]{4}_(.*?)_(.*?)_(.*?)_(TS|HD|SD)_.+\.(MP4|ts)/', $fileName, $fileElements);
    $program = $fileElements[1];
    $title   = $fileElements[2] . '.' . $fileElements[3] . '.' . strtolower($fileElements[5]);
    $linkedProgramPath = "{$linkedPath}/{$program}";
    if (!file_exists($linkedProgramPath)) {
      mkdir($linkedProgramPath);
    }
    $linkedFilePath = "{$linkedPath}/{$program}/{$title}";
    if (!file_exists($linkedFilePath)) {
      symlink($sourceFilePath, $linkedFilePath);
    }
  }
}
