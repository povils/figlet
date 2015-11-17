# Figlet
  ______   _           _          _                                 _
 |  ____| (_)         | |        | |                               | |
 | |__     _    __ _  | |   ___  | |_     _ __    ___   _ __     __| |   ___   _ __
 |  __|   | |  / _` | | |  / _ \ | __|   | '__|  / _ \ | '_ \   / _` |  / _ \ | '__|
 | |      | | | (_| | | | |  __/ | |_    | |    |  __/ | | | | | (_| | |  __/ | |
 |_|      |_|  \__, | |_|  \___|  \__|   |_|     \___| |_| |_|  \__,_|  \___| |_|
                __/ |
               |___/
[![SensioLabsInsight](https://insight.sensiolabs.com/projects/4ff60a14-e810-493e-9997-c77d99ffcd32/mini.png)](https://insight.sensiolabs.com/projects/4ff60a14-e810-493e-9997-c77d99ffcd32)
[![Build Status](https://scrutinizer-ci.com/g/povils/figlet/badges/build.png?b=master)](https://scrutinizer-ci.com/g/povils/figlet/build-status/master)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/povils/figlet/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/povils/figlet/?branch=master)
[![Total Downloads](https://poser.pugx.org/povils/figlet/downloads)](https://packagist.org/packages/povils/figlet)
[![License](https://poser.pugx.org/povils/figlet/license)](https://packagist.org/packages/povils/figlet)

Not stable

[FIGlet](http://www.figlet.org/) is an awesome tool for generating
text-based ascii art. I discovered it a few months go when
[Scott Gonzalez](http://scottgonzalez.com/) showed me his wonderful
[FIGlet parser written in Javascript](https://github.com/scottgonzalez/figlet-js).
It's a perfect example of code which is usable both in the browser and server.

I love the results, but I will say that finding the right font can
take time. Some text simply doesn't render well with particular fonts,
and constantly flipping back and forth between Emacs and the terminal
(even the built in terminal) is a total killjoy.

### Did I mention trial and error sucks?

Well I'm not one for one for blind repetition, so I've created a [simple web service](http://figlet.nodejitsu.com)
to both convert text into FIGlet art and browse all the available
options. All one has to do is specify the text and font they'd like to
use (`?text=Foobar&font=standard`), or [browse a gallery of all fonts](http:figlet.nodejitsu.com/browse), which also takes similar query parameters.

[![figlet.nodejitsu.com](/img/articles/figlet.jpg)](http://figlet.nodejitsu.com)

### More than just ascii art

Perhaps just as superficial, but FIGlet can be used to do some other
cool stuff. What if you wanted to convert text into binary data, or
morse code?

`01100101 01110110 01100101 01101110  01100010 01101001 01101110 01100001 01110010 01111001  01100100 01100001 01110100 01100001`

`. ...- . -.    -... .. -. .- .-. -.--    -.. .- - .-`

                                __           __                   __            _
                               /\ \__       /\ \                 /\ \         /'_`\
      ___       __      __     \ \ ,_\      \ \ \___     __  __  \ \ \___    /\_\/\`\
    /' _ `\   /'__`\  /'__`\    \ \ \/       \ \  _ `\  /\ \/\ \  \ \  _ `\  \/_//'/'
    /\ \/\ \ /\  __/ /\ \L\.\_   \ \ \_  __   \ \ \ \ \ \ \ \_\ \  \ \ \ \ \    /\_\
    \ \_\ \_\\ \____\\ \__/.\_\   \ \__\/\ \   \ \_\ \_\ \ \____/   \ \_\ \_\   \/\_\
     \/_/\/_/ \/____/ \/__/\/_/    \/__/\ \/    \/_/\/_/  \/___/     \/_/\/_/    \/_/
                                         \/