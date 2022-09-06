from moviepy.editor import *
import sys
clips = []

for i in range(int(VideoFileClip("./media/" + sys.argv[1] + "/" + sys.argv[2]).duration/10)):
    clip = (VideoFileClip("./media/" + sys.argv[1] + "/" + sys.argv[2]).subclip((i*10),(i*10+0.25)).speedx(0.4))
    clips.append(clip)


final_clip = concatenate_videoclips(clips)

final_clip.write_gif("./media/" + sys.argv[1] + "_gif/" + sys.argv[2] + ".gif" )


clip = (VideoFileClip("./media/" + sys.argv[1] + "_gif/" + sys.argv[2] + ".gif").resize(height=100))
clip.write_gif("./media/" + sys.argv[1] + "_gif/" + sys.argv[2] + ".gif" )


print("ok")
