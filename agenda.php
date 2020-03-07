<?php
  $date = $argv[1];

  $inFile = 'agenda.txt';
  $outFile = 'agendaOut.txt';

  $agenda = file_get_contents($inFile);
  // Split input file into an array of gigs
  $auxGigs = explode("\n\n",str_replace(array("\r\n","\n\r","\r"),"\n",$agenda));

  $gigs = [];
  foreach($auxGigs as $auxGig) {
    // Split each gig into parts
    $auxGig = explode("\n", $auxGig);
    if (count($auxGig) <= 1) {
      continue;
    }
    $gig = [];
    $gig['title'] = formatTitle($auxGig[0]);
    $gig['info'] = formatInfo($auxGig[1]);
    $musicians = [];
    for ($i = 2; $i < count($auxGig); $i++) {
      $musicians[] = $auxGig[$i];
    }
    $gig['musicians'] = formatMusicians($musicians);
    $gigs[] = formatGig($gig);
  }

  $page = formatPage($date, $gigs);
  file_put_contents($outFile, $page);

  ////////////////////////////////////////////////////////////////////////////////

  function formatPage($title, $gigs) {
      $page = [
        '<div style="text-align: center;">',
        '<h1 style="text-align: left;">'.$title.'</h1>'.PHP_EOL,
        formatGigs($gigs),
        '</div>',
      ];
      return implode(PHP_EOL, $page);
  }

  function formatTitle($title) {
    $format = '<div style="color:#156711;">REPLACE</div>';
    return str_replace('REPLACE', $title, $format);
  }
  function formatInfo($info) {
    $format = '<div style="font-size:.9em;color:grey;"><em>REPLACE</em></div>';
    return str_replace('REPLACE', $info, $format);
  }
  function formatMusicians($musicians) {
    $formatted = [];
    foreach($musicians as $musician) {
        $formatted[] = '<div style="font-size:.9em;color:#555555;">'.$musician.'</div>';
    }
    return implode(PHP_EOL, $formatted);
  }
  function formatGig($gig) {
    return implode(PHP_EOL, $gig);
  }
  function formatGigs($gigs) {
    return implode(PHP_EOL.PHP_EOL, $gigs);
  }
?>
