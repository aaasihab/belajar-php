<?php

// akan true karena string 166 akan dibaca integer
echo "true : ";
echo ("166" == 10) . PHP_EOL;

// akan false karena string 19 tidak sama nilainya dengan 10
echo "false : ";
echo ("19" == 10) . PHP_EOL;

// akan false karena string abjad tidak akan dibaca integer
echo "false : ";
echo ("aaa" == 10) . PHP_EOL;

// akan true karena whitespace akan diabaikan
echo "true : ";
echo ("    10" == 10) . PHP_EOL;

// akan false karena ada abjad dan angka dalam string
echo "false : ";
echo ("aaa10" == 10) . PHP_EOL;
