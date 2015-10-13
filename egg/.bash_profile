# Setting PATH for Python 3.5
# The orginal version is saved in .bash_profile.pysave
PATH="/Library/Frameworks/Python.framework/Versions/3.5/bin:${PATH}"
export PATH

music()
{
open https://www.youtube.com/watch?v=dQw4w9WgXcQ
}

function cd() { builtin cd "$@" && ls -a; }
