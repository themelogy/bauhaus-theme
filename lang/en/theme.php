<?php

return [
  'header' => [

  ],
  'footer' => [
      'copyrights' => setting('theme::company-name')." © ".\Carbon\Carbon::now()->year."."
  ],
  'buttons' => [
      'all'     => 'All',
      'project' => 'See Project'
  ]
];
