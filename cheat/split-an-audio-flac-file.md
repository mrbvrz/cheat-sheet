# Split an audio .flac file

install the following packages `cuetools shntool flac`

```console
sudo apt-get install cuetools shntool flac
```

split the .flac audio file as follows:

```console
cuebreakpoints file.cue | shnsplit -o flac file.flac

shnsplit -f *.cue -t "%n - %p - %t" -o "flac flac -s -8 -o %f -" *.flac

cuetag *.cue *.flac
```
