#!/bin/bash
ffmpeg -i "$1" -r 5 -vf scale=-1:80 -loop 0 -ss 00:00:03 -to 00:00:55 "$2"
