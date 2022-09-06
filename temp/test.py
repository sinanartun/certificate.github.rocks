from moviepy.editor import *
import sys
clips = []

for i in range(int(VideoFileClip(sys.argv[1]).duration/10)):
    clip = (VideoFileClip(sys.argv[1])
        .subclip((i*10),(i*10+0.25)).speedx(0.4)
        .resize(height=100))
    clips.append(clip)


final_clip = concatenate_videoclips(clips)

final_clip.write_gif(sys.argv[1]+".gif")
print("ok")
