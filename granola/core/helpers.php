<?php

namespace Granola;

function startsWith($haystack, $needle): bool
{
     $length = strlen($needle);
     return substr($haystack, 0, $length) === $needle;
}
