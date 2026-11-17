<?php

use zstd\Strategy;
use function zstd\compress;
use function zstd\decompress;

$compressed = compress(<<<INPUT
    To-morrow, and to-morrow, and to-morrow,
    Creeps in this petty pace from day to day,
    To the last syllable of recorded time;
    And all our yesterdays have lighted fools
    The way to dusty death. Out, out, brief candle!
    Life's but a walking shadow, a poor player,
    That struts and frets his hour upon the stage,
    And then is heard no more. It is a tale
    Told by an idiot, full of sound and fury,
    Signifying nothing.
INPUT, strategy: Strategy::btultra);
$decompressed = decompress($compressed);
echo $decompressed;
