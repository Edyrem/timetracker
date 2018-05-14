<?php

$loader = new \Phalcon\Loader();

/**
 * We're a registering a set of directories taken from the configuration file
 */
$loader->registerNamespaces(
  [
    'TimeTracker\Forms' => $config->application->formsDir,
    'TimeTracker\Library' => $config->application->libraryDir,
    'TimeTracker\Models' => $config->application->modelsDir,
  ]
);

$loader->registerDirs(
    [
        $config->application->controllersDir,
        $config->application->modelsDir
    ]
)->register();

if (!function_exists('print_arr')) {
  function print_arr($var, $return = false)
  {
    $type = gettype($var);

    $out = print_r($var, true);
    $out = htmlspecialchars($out);
    $out = str_replace(' ', '&nbsp; ', $out);
    if ($type == 'boolean')
      $content = $var ? 'true' : 'false';
    else
      $content = nl2br($out);

    $out = '<div style="
    border:2px inset #666;
    background:black;
    font-family:Verdana;
    font-size:11px;
    color:#6F6;
    text-align:left;
    margin:20px;
    padding:16px">
    <span style="color: #F66">(' . $type . ')</span> ' . $content . '</div><br /><br />';

    if (!$return)
      echo $out;
    else
      return $out;
  }
}

if (!function_exists('print_die')) {
  function print_die($var, $return = false, $ip = null)
  {
    if (($ip && $_SERVER['REMOTE_ADDR'] == $ip) || !$ip) {
      print_arr($var, $return);
      die;
    }
  }
}