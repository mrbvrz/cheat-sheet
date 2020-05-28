# Install pbcopy and pbpaste on Ubuntu

**pbcopy** and **pbpaste**. These commands are exclusively available only on Mac OS X platform, The pbcopy command will copy the standard input into clipboard. You can then paste the clipboard contents using pbpaste command wherever you want. Of course, there could be some Linux alternatives to the above commands, for example Xclip.

## Install xclip / xsel

Like I already said, pbcopy and pbpaste commands are not available in Linux. However, we can replicate the functionality of pbcopy and pbpaste commands using xclip and/or xsel commands via shell aliasing. Both xclip and xsel packages available in the default repositories of most Linux distributions. Please note that you need not to install both utilities. Just install any one of the above utilities.

```console
$ sudo apt install xclip xsel
```

Once installed, you need create aliases for pbcopy and pbpaste commands. To do so, edit your `~/.bashrc` file:

```console
$ vi ~/.bashrc
```

If you want to use xclip, paste the following lines:

```bash
alias pbcopy='xclip -selection clipboard'
alias pbpaste='xclip -selection clipboard -o'
```

If you want to use xsel, paste the following lines in your `~/.bashrc` file.

```bash
alias pbcopy='xsel --clipboard --input'
alias pbpaste='xsel --clipboard --output'
```

Save and close the file.

Next, run the following command to update the changes in `~/.bashrc` file.

```console
$ source ~/.bashrc
```

## Use pbcopy and pbpaste Commands On Linux

The pbcopy command will copy the text from stdin into clipboard buffer.

```console
$ echo "Hello World!" | pbcopy
```

You can access this content later and paste them anywhere you want using pbpaste command.

```console
$ echo `pbpaste`
Hello World!
```

Here are some other use cases, I have a file named `file.txt` with the following contents.

```console
$ cat file.txt 
Hello World!
```

You can directly copy the contents of a file into a clipboard.

```console
$ pbcopy < file.txt
```

Now, the contents of the file is available in the clipboard as long as you updated it with another file’s contents. To retrieve the contents from clipboard.

```console
$ pbpaste 
Hello World!
```

<br>

​		[Source](https://www.ostechnix.com/how-to-use-pbcopy-and-pbpaste-commands-on-linux/)


