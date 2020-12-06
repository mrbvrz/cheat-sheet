# Install, Update and Command List Youtube-dl

**youtube-dl** is a command-line program to download videos from YouTube.com and a few more sites. It requires the Python interpreter, version 2.6, 2.7, or 3.2+, and it is not platform specific. It should work on your Unix box, on Windows or on macOS. It is released to the public domain, which means you can modify it, redistribute it or use it however you like.

## Windows 10

### install youtube-dl & ffmpeg

1. Download [youtube-dl](https://ytdl-org.github.io/youtube-dl/download.html)
2. Download [FFmpeg](https://www.ffmpeg.org/download.html), extract and copy file to `C:/Program Files` and setting path on environment variables.

## Linux (Ubuntu)

### install youtube-dl and ffmpeg

1. Open terminal and run 

   ```
   sudo apt install youtube-dl ffmpeg
   ```

2. Update youtube-dl (optional) 

   ```
   sudo curl -L https://yt-dl.org/downloads/latest/youtube-dl -o /usr/local/bin/youtube-dl && sudo chmod a+rx /usr/local/bin/youtube-dl
   ```

## Command List (often used for)

These are some of the commands that i use often with youtube-dl, the command below does not use all the commands in youtube-dl, if you want to learn more commands please visit the [youtube-dl github page](https://github.com/ytdl-org/youtube-dl). 

*note: if can't download using the full video url (**https://www.youtube.com/watch?v=xxxxx**), then download with a short url (**https://youtu.be/xxxxx**), or you can use video id, which is at the end of the url (**xxxxx**). - this happened to me when using fish-shell* 

* Check video and audio quality 
	```
	youtube-dl -F https://www.youtube.com/watch?v=xxxxx
	```

* Download youtube with custom video and audio quality 
    ```
	 youtube-dl -f 137+251 https://www.youtube.com/watch?v=xxxxx
    ```

    or for clean-name video :

 	```
	youtube-dl -f 137+251 -o '%(title)s.%(ext)s https://www.youtube.com/watch?v=xxxxx
	```
	
* Download youtube video with auto subtittle and embed in video 
	```
	youtube-dl -f 137+251 https://www.youtube.com/watch?v=xxxxx --write-auto-sub --embed-subs
	```

* Download video from external link file (with quality option) 
	```
	youtube-dl -f 248+140 -a list.txt
	```

* Download youtube playlist videos in separate directory indexed by video order in a playlist 
	```
	youtube-dl -f 22+278 -o '%(playlist)s/%(playlist_index)s - %(title)s.%(ext)s' https://www.youtube.com/watch\?v\=xxxxx\&list\=xxxxx
	```

* Download all playlists of youtube channel/user keeping each playlist in separate directory
	```
	youtube-dl -o '%(uploader)s/%(playlist)s/%(playlist_index)s - %(title)s.%(ext)s' https://www.youtube.com/user/TheLinuxFoundation/playlists
	```
