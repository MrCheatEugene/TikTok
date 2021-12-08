# TikTok
THIS IS NOT A FINISHED PRODUCT! TikTok-styled video handler. Can overlay text, comment replies and remove copyrighted sound.
## How it works - Software list
- FFMpeg handles and converts videos,and basically does everything.
- "Screen"(apt install screen) executes FFMpeg and other apps in other session.
- Songrec(https://github.com/marin-m/SongRec/) is basically Shazam with CLI interface. Checks if video has music
- My own Discogs licensors API checks if there is any song with X name, and if there is one - gives licensers info(source will be somewhere in profile, I didn't uploaded it yet)
- SVG Library(https://github.com/meyfa/php-svg) generates SVG files, because PNG and GD won't work. Idk why.
- SWF Checker(https://github.com/EugenCepoi/nsfw_api/) that checks is image safe-for-work.
- Modified NodeServer(https://github.com/MrCheatEugene/NodeServer/) that can give you files from hard drive using http. Because SWF checker needs remote file. Gives response only if remoteAddress is 127.0.0.1 - localhost.
- PHP controls all of this stuff that was listed above.
## How it works - mainlib.php
### chunk_split_unicode 
Function written by some good guy at PHP.net i think, if you're reading this - THANKS! Splits unicode text by chunks.
### comment
Generates Reply-styled SVG and returns it.
### commentPlus
Controls comment function and generates SH file that will add that SVG to video and executes it.
### setText
Generates text with splitting. Returns SVG.
### setTextPlus
Controls settext function and generates SH file that will add that SVG text to video and executes it.
### setTextApi
I don't know what it does, but it's nessecarry i think.. Similar to setText
### uploadvid
Controls video conversion.
### cccopy
Checks is there copyrighted stuff, if there is - remove it.
### removeMusic
Removes copyrighted stuff by dumbest method ever - gain down all of the sections except for a small part of "THE MIDS(vocals,instruments,etc.)"(400-700 HZ)
### recSong  
Checks is there any copyrighted stuff - access songrec.
### getLicensers
Uses my own discogs api to get licensers list and more.
### isSFW
Splits video to pics and uses SWF checker to remove or keep file(right now it just checks the state)
## THIS IS A PROTOTYPE
I am not saying that this will work for you, i'm not saying that this is tiktok leaked code, no! This is just a prototype that can be used to build your own tiktok-styled app!

## Please donate
I developed this from semptember and this is not ready yet. if you want to give me a cup of coffee - go to https://www.donationalerts.ru/r/mrcheatt 
